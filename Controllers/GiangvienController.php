<?php 
    class  GiangvienController extends BaseController{
        public function __construct(){
            // $this->loadModel("GiangvienModel");
            // $this->GiangvienModel = new GiangvienModel();
        }
        public function login(){
            return $this->view("frontend.giangvien.login");
        }
        public function index(){
            return $this->view("frontend.giangvien.index");
        }
    }
?>