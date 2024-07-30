<?php
class BaseController
{
   const VIEW_FOLDER_NAME = "Views";
   const MODEL_FOLDER_NAME = "Models";


   public function view($viewpath, array $data = [])
   {
      foreach ($data as $key => $value) {
         $$key = $value;
      }
      require (self::VIEW_FOLDER_NAME . '/' . str_replace(".", "/", $viewpath) . '.php');
   }

   public function loadModel($modelpath)
   {
      require (self::MODEL_FOLDER_NAME . '/' . $modelpath . '.php');
   }

}