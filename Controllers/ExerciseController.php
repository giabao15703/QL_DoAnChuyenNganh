<?php

class ExerciseController extends BaseController
{
   private $exerciseModel;
   private $levelModel;
   private $topicModel;
   private $questionModel;
   private $userHistoryExerciseModel;

   public function __construct()
   {
      $this->loadModel("ExerciseModel");
      $this->loadModel("LevelModel");
      $this->loadModel("TopicModel");
      $this->loadModel("QuestionModel");
      $this->loadModel("UserHistoryExerciseModel");
      $this->exerciseModel = new ExerciseModel();
      $this->levelModel = new LevelModel();
      $this->topicModel = new TopicModel();
      $this->questionModel = new QuestionModel();
      $this->userHistoryExerciseModel = new UserHistoryExerciseModel();
   }

   public function index()
   {
      $exercises = $this->exerciseModel->getAll(['*'], []);
      return $this->view("frontend.exercises.index", ["exercises" => $exercises]);
   }

   public function show()
   {
      if (!isset($_COOKIE['user_id'])) {
         return header('Location: /Project_1/index.php/user/login');
      }
      $id = $_GET['id'];
      $questions = $this->questionModel->getQuestionByExerciseId($id);
      $exercise = $this->exerciseModel->findById($id);
      $userHistoryExercise = $this->userHistoryExerciseModel->countExercise($_COOKIE['user_id'], $id);

      if (count($exercise) == 0) {
         return $this->view("frontend.exercises.shownoti", ["message" => "Exercise does not exist",]);
      }
      if ($userHistoryExercise[0]['count'] < $exercise[0]['has_time_limit'])
         return $this->view("frontend.exercises.show", ["questions" => $questions, "exercise" => $exercise, "userHistoryExercise" => $userHistoryExercise]);
      else
         return $this->view("frontend.exercises.shownoti", ["message" => "You have used up all your attempts for this exercise",]);
   }

   public function search()
   {
      return $this->view('frontend.exercises.search');
   }

   public function result()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         if (isset($_POST['answers'])) {
            // Kiểm tra dữ liệu có tồn tại
            $answersJson = $_POST['answers'];
            $answers = json_decode($answersJson, true);
            $id = $_POST['dataIdHistory'];
            $exercise_title = $_POST['exercise_title'];
            // kiểm tra id lịch sử bài tập
            $check_id_history = $this->userHistoryExerciseModel->findById($id);
            if (json_last_error() === JSON_ERROR_NONE) {
               if (count($check_id_history) == 0) {
                  // Giải mã JSON thành công
                  $user_id = $_COOKIE['user_id'];
                  $result = $this->checkAnswers($answers);
                  $date_completed = $answers[0]['date_completed'];

                  $data = [
                     'id' => $id,
                     'user_ids' => $user_id,
                     'score' => $result['score'],
                     'date_completed' => $date_completed,
                     'question_answers' => $result['question_answer'],
                     'exercise_id' => $answers[0]['exerciseId'],
                  ];
                  $this->userHistoryExerciseModel->create($data);
               } else {
                  $result = [
                     'score' => $check_id_history[0]['score'],
                     'question_answer' => $check_id_history[0]['question_answers'],
                     'exercise_title' => $exercise_title,
                  ];
               }
               $this->view('frontend.exercises.result', ['result' => $result, 'id' => $id, 'count' => $check_id_history]);
            } else {
               // Giải mã JSON thất bại
               echo "Invalid JSON data.";
            }
         } else {
            // Dữ liệu không tồn tại
            echo "No answers data received.";
         }
      } else {
         $id = $_GET['id'];
         $getByID = $this->userHistoryExerciseModel->findById($id);
         $result = [
            'score' => $getByID[0]['score'],
            'question_answer' => $getByID[0]['question_answers'],
         ];
         return $this->view('frontend.exercises.result', ['result' => $result]);
      }
   }

   public function checkAnswers($answers)
   {
      $score = 0;
      $correct = 0;
      $question_answer = [];
      foreach ($answers as $answer) {
         $exerciseId = $answer['exerciseId'];
         $questionId = $answer['questionId'];
         $answerIndex = $answer['answerIndex'];
         $question = $this->questionModel->findById($questionId);
         $answersArray = json_decode($question[0]['answers'], true);
         $answerCorrect = "";
         if ($answerIndex != -1 && $answersArray[$answerIndex]['isCorrect'] == 1) {
            $answerCorrect = $answersArray[$answerIndex]['answer'];
            $correct++;
         } else {
            foreach ($answersArray as $answer) {
               if ($answer['isCorrect'] == 1) {
                  $answerCorrect = $answer['answer'];
                  break;
               }
            }
         }
         $question_answer[] = [
            'question' => $question[0]['question'],
            'user_answer' => $answerIndex != -1 ? $answersArray[$answerIndex]['answer'] : 'null',
            'correct_answer' => $answerCorrect,
         ];
      }
      $score = $correct / count($answers) * 100;
      return [
         'score' => $score,
         'question_answer' => json_encode($question_answer, JSON_UNESCAPED_UNICODE),
      ];
   }

   public function create()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $status = 0;
         $codeExercise = '';
         $message = '';
         $topic = $_POST['topic'];
         $level = $_POST['level'];
         $title = $_POST['title'];
         $has_limit_time = $_POST['hasLimitTime']; // Check if time limit checkbox is checked
         $time_limit_minutes = $_POST['timeLimit']; // Ensure this matches the field name in the form

         // Decode the JSON-encoded questions array from the form
         $questions = json_decode($_POST['questions'], true);

         $exerciseId = $this->exerciseModel->getUniqueId();
         $exercise = [
            'id' => $exerciseId,
            'topic_id' => $topic,
            'level_id' => $level,
            'title' => $title,
            'has_time_limit' => $has_limit_time,
            'time_limit_minutes' => $time_limit_minutes,
            'user_id' => $_COOKIE['user_id'],
         ];
         $resultInsertExercise = $this->exerciseModel->create($exercise);
         $questionArray = [];
         if ($resultInsertExercise > 0) {
            foreach ($questions as $question) {
               $questionData = [
                  'id' => $this->questionModel->getUniqueId(),
                  'exercise_id' => $exerciseId,
                  'question' => $question['question'],
                  'answers' => json_encode($question['answers'], JSON_UNESCAPED_UNICODE), // Assuming you store answers in JSON format
                  'isDel' => 0
               ];
               $questionArray[] = $questionData;
               $result = $this->questionModel->create($questionData);
               if (!$result) {
                  $status = 0;
                  $message = "Failed to create question.";
                  break;
               } else {
                  $status = 1;
                  $codeExercise = $exerciseId;
                  $message = "Exercise created successfully.";
               }
            }
         } else {
            $status = 0;
            $message = "Failed to create exercise.";
         }
         $result = [
            'status' => $status,
            'message' => $message,
            'codeExercise' => $codeExercise,
         ];
         header('Content-type: application/json');
         echo json_encode($result);
      } else {
         $topics = $this->topicModel->getAll();
         $levels = $this->levelModel->getAll();
         return $this->view('frontend.exercises.create', ['topics' => $topics, 'levels' => $levels]);
      }
   }

   public function update()/*  */
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $exerciseId = $_POST['id'];
         $topic = $_POST['topic'];
         $level = $_POST['level'];
         $title = $_POST['title'];
         $has_limit_time = $_POST['hasLimitTime']; // Check if time limit checkbox is checked
         $time_limit_minutes = $_POST['timeLimit']; // Ensure this matches the field name in the form

         // Decode the JSON-encoded questions array from the form
         $questions = json_decode($_POST['questions'], true);

         $exercise = [
            'topic_id' => $topic,
            'level_id' => $level,
            'title' => $title,
            'has_time_limit' => $has_limit_time,
            'time_limit_minutes' => $time_limit_minutes,
         ];
         $this->exerciseModel->update_Data("'" . $exerciseId . "'", $exercise);

         foreach ($questions as $question) {
            $questionData = [
               'question' => $question['question'],
               'answers' => json_encode($question['answers'], JSON_UNESCAPED_UNICODE),
            ];
            $this->questionModel->update_Data("'" . $question['id'] . "'", $questionData);
         }

         header('Content-type: application/json');
         echo json_encode(['status' => 1, 'message' => 'Exercise updated successfully.']);
      } else {
         $id = $_GET['id'];
         $exercise = $this->exerciseModel->findById($id)[0];
         $questions = $this->questionModel->getQuestionByExerciseId($id);
         $topics = $this->topicModel->getAll();
         $levels = $this->levelModel->getAll();
         return $this->view('frontend.exercises.update', ['exercise' => $exercise, 'questions' => $questions, 'topics' => $topics, 'levels' => $levels]);
      }
   }

   public function delete()
   {
      $id = $_POST['id'];
      $sqlUpdateExercise = "Update exercises Set isDel = 1 Where id = '$id'";
      $sqlUpdateQuestion = "Update questions Set isDel = 1 Where exercise_id = '$id'";
      $this->exerciseModel->_query($sqlUpdateExercise);
      $this->questionModel->_query($sqlUpdateQuestion);
      header('Content-type: application/json');
      echo json_encode(['status' => 1, 'message' => 'Exercise deleted successfully.']);
   }
   public function detail()
   {
      $id = $_GET['id'];
      $exercise = $this->exerciseModel->findById($id)[0];
      $questions = $this->questionModel->getQuestionByExerciseId($id);
      $topics = $this->topicModel->getAll();
      $levels = $this->levelModel->getAll();
      $historyCompleteds = $this->userHistoryExerciseModel->findByExerciseId($id);
      return $this->view('frontend.exercises.detail', ['exercise' => $exercise, 'questions' => $questions, 'topics' => $topics, 'levels' => $levels, 'historyCompleteds' => $historyCompleteds]);
   }



}