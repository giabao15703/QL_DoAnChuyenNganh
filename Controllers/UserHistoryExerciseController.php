<?php

class UserHistoryExerciseController extends BaseController
{
    private $UserHistoryExerciseModel;
    private $ExerciseModel;

    public function __construct()
    {
        $this->loadModel("UserHistoryExerciseModel");
        $this->loadModel("ExerciseModel");
        $this->UserHistoryExerciseModel = new UserHistoryExerciseModel();
        $this->ExerciseModel = new ExerciseModel();
    }
    /* public function index()
    {

        return $this->view("frontend.users.index", ["data" => $this->UserModel->getAll()]);
    } */

    public function getUniqueIdAjax()
    {
        $id = $this->UserHistoryExerciseModel->getUniqueId();
        $result = [
            'id' => $id
        ];
        header('Content-type: application/json');
        echo json_encode($result);
    }

    public function result()
    {
        $id_History_Exercise = $_GET['id'];
        $title = $_GET['title'];
        $HistoryExercise = $this->UserHistoryExerciseModel->findById($id_History_Exercise);
        /* echo "<pre>";
        print_r($HistoryExercise); */
        return $this->view("frontend.user_history_exercises.result", ["HistoryExercise" => $HistoryExercise[0], "title_Exercise" => $title]);
    }

}