<?php
class UserController extends BaseController
{
    private $UserModel;
    private $ExerciseModel;
    private $UserHistoryExerciseModel;

    public function __construct()
    {
        $this->loadModel("UserModel");
        $this->loadModel("ExerciseModel");
        $this->loadModel("UserHistoryExerciseModel");
        $this->UserModel = new UserModel();
        $this->ExerciseModel = new ExerciseModel();
        $this->UserHistoryExerciseModel = new UserHistoryExerciseModel();
    }

    public function existsEmail()
    {
        $email = $_POST['email'];
        $user = $this->UserModel->findByEmail($email);
        $status = 0;
        if ($user != null) {
            $status = 1;
        }
        $result = [
            'status' => $status
        ];
        header('Content-type: application/json');
        echo json_encode($result);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hashpass = hash('sha256', $password);
            $user = $this->UserModel->findByEmail($email);
            $status = 0;
            if ($user != null && $hashpass == $user[0]['password']) {
                setcookie("user_id", $user[0]['id'], time() + (86400 * 30), "/");
                setcookie("user_displayName", $user[0]['display_name'], time() + (86400 * 30), "/");
                setcookie("user_email", $user[0]['email'], time() + (86400 * 30), "/");
                setcookie("user_phone", $user[0]['phone'], time() + (86400 * 30), "/");
                setcookie("user_avata", $user[0]['avata'], time() + (86400 * 30), "/");
                setcookie("user_role", $user[0]['role'], time() + (86400 * 30), "/");
                $status = 1;
            }
            $result = [
                'status' => $status,
                'user' => $user[0]
            ];
            header('Content-type: application/json');
            echo json_encode($result);
        } else {
            return $this->view("frontend.users.login");
        }
    }

    public function forgotpassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $newPassword = $_POST['newPassword'];
            $hashNewPass = hash('sha256', $newPassword);
            $user = $this->UserModel->findByEmail($email);
            //insert new password to database
            $status = 0;
            if ($user != null) {
                $result = $this->UserModel->update_Data("'" . $user[0]['id'] . "'", ['password' => $hashNewPass]);
                /* $sql = "UPDATE Users SET (password) WHERE id = $id"; */
                /* $id = $user[0]['id'];
                $sql = "UPDATE Users SET password = '$hashNewPass' WHERE id = '$id'";
                $result = $this->UserModel->_query($sql); */
                if ($result) {
                    $status = 1;
                }
            }
            header('Content-type: application/json');
            echo json_encode($status);
        } else {
            return $this->view("frontend.users.forgotpassword");
        }
    }

    public function LogOut()
    {
        if ($_COOKIE['user_id']) {
            setcookie("user_id", "", time() - 3600, "/");
            setcookie("user_displayName", "", time() - 3600, "/");
            setcookie("user_email", "", time() - 3600, "/");
            setcookie("user_phone", "", time() - 3600, "/");
            setcookie("user_avata", "", time() - 3600, "/");
            setcookie("user_role", "", time() - 3600, "/");
            header('Location: /Nhom3/index.php/home/index');
        }
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['image'])) {
                $targetDir = 'img/User_image/';
                $fileName = basename($_FILES['image']['name']);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                // Allow certain file formats
                $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
                if (in_array($fileType, $allowedTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                        $data['avata'] = $targetFilePath;
                    } else {
                    }
                }
            }
            $id = $this->UserModel->getUniqueId();
            $password = hash('sha256', $_POST['password']);
            $data = [
                'id' => $id,
                'display_name' => $_POST['display_name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'password' => $password,
                'role' => $_POST['role'],
                'avata' => $_FILES['image']['name'] ?? 'default_avata.png'
            ];

            $result = $this->UserModel->create($data);
            header('Content-type: application/json');
            echo json_encode($result);
        } else {
            return $this->view("frontend.users.signup");
        }
    }

    public function detail()
    {
        $id = $_GET['id'];
        $user = $this->UserModel->findById($id);
        $createdExercises = $this->ExerciseModel->findByUserId($id);
        $userHistoryExercises = $this->UserHistoryExerciseModel->findByUserId($id);
        if ($user[0]['role'] == 'student') {
            return $this->view("frontend.users.detailStudent", ['user' => $user, 'userHistoryExercises' => $userHistoryExercises]);
        } else {
            return $this->view("frontend.users.detailTeacher", ['user' => $user, 'createdExercises' => $createdExercises, 'userHistoryExercises' => $userHistoryExercises]);
        }
    }

    public function updateDetail()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = "'" . $_POST['id'] . "'";
            $data = [
                'display_name' => $_POST['displayName'],
                'birthday' => $_POST['dateOfBirth'],
                'email' => $_POST['emailAddress'],
                'role' => $_POST['role'],
                'phone' => $_POST['phoneNumber'],
                'sex' => $_POST['gender'],
            ];
            $result = $this->UserModel->update_Data($id, $data);
            $result = [
                'status' => $result,
                'data' => $data
            ];
            header('Content-type: application/json');
            echo json_encode($result);
        }
    }

    public function showChart()
    {
        $sql = "SELECT DATE(date_completed) AS date_completed, COUNT(*) AS task_count, AVG(score) AS average_score FROM user_exercise_history  where user_ids = '" . $_GET['id'] . "' GROUP BY DATE(date_completed)";
        $result = $this->UserModel->_query($sql);

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        // Chuyển dữ liệu thành JSON và trả về
        header('Content-Type: application/json');
        echo json_encode($data);
    }

}