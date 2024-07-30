<?php
session_start();

require './Core/Database.php';
require './Models/BaseModel.php';
require './Controllers/BaseController.php';
require './config.php';

// Phân tích URL để lấy thông tin về controller và action
// https//Website.vn/index.php/controller/action?id=...&&name=...&&.....
$parts = explode('/', $_SERVER['REQUEST_URI']);
$actionName = isset($parts[4]) && $parts[4] != '' ? explode('?', $parts[4])[0] : 'login';
$controllerName = (ucfirst(isset($parts[3]) && $parts[3] != '' ? $parts[3] : 'giangvien') . 'Controller');
// Require controller
require "./Controllers/$controllerName.php";
// Tạo controller và gọi action tương ứng
$controllerObject = new $controllerName;

$controllerObject->$actionName();
//$controllerObject->$actionName();
/* require './Core/Database.php';
require './Models/BaseModel.php';
require './Controllers/BaseController.php';
$controllerName = ucfirst((strtolower($_REQUEST['controller']) ?? 'Base') . 'Controller');
$actionName = $_REQUEST['action'] ?? 'index';
echo $controllerName;
require "./Controllers/$controllerName.php";

$controllerObject = new $controllerName;

$controllerObject->$actionName(); */