<?php
class NewController extends BaseController
{
    private $NewModel;

    public function __construct()
    {
        $this->loadModel("NewModel");
        $this->NewModel = new NewModel();
    }
    public function index()
    {
        if (!isset($_GET['page'])) {
            return $this->view("frontend.news.index");
        }
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pageSize = 5;
        $offset = ($page - 1) * $pageSize;
        $sql = "SELECT * FROM news ORDER BY created_at DESC LIMIT $pageSize OFFSET $offset";
        $newsItems = $this->NewModel->_query($sql);
        $newsItems = $newsItems->fetch_all(MYSQLI_ASSOC);
        $countResult = $this->NewModel->_query("SELECT COUNT(*) as total FROM news");
        $count = $countResult->fetch_assoc();
        $totalPages = ceil($count['total'] / $pageSize);
        header('Content-type: application/json');
        echo json_encode(
            [
                'newsItems' => $newsItems,
                'currentPage' => $page,
                'totalPages' => $totalPages
            ]
        );
    }

    public function detail()
    {
        $id = $_GET['id'];
        $new = $this->NewModel->findById($id);
        return $this->view("frontend.news.detail", ['new' => $new[0]]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $fileName = '';
            if (isset($_FILES['image'])) {
                $targetDir = 'img/news/';
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

            $data = [
                'id' => $this->NewModel->getUniqueId(),
                'title' => $title,
                'content' => $content,
                'image' => $fileName,
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => $_COOKIE['user_id']
            ];
            $status = $this->NewModel->create($data);
            $result = [
                'status' => $status,
                'data' => $data
            ];
            header('Content-type: application/json');
        }
        return $this->view("frontend.news.create");
    }
}