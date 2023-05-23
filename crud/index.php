<?php
require_once __DIR__ . '/app/controllers/UserController.php';
$config = require 'config/database.php';
define('BASE_PATH', '/darrebni/crud/');
$db = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);
if (!$db) {
    die('Connection failed: ' . mysqli_connect_error());
}
if ($_SERVER['REQUEST_URI'] === BASE_PATH) {
    $controller = new UserController($db);
    $controller->index();
} elseif ($_SERVER['REQUEST_URI'] === BASE_PATH . 'create') {
    $controller = new UserController($db);
    $controller->create();
} elseif (strpos($_SERVER['REQUEST_URI'], BASE_PATH . 'edit/') === 0) {
    $id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'edit/'));
    $controller = new UserController($db);
    $controller->edit($id);
} elseif (strpos($_SERVER['REQUEST_URI'], BASE_PATH . 'delete/') === 0) {
    $id = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH . 'delete/'));
    $controller = new UserController($db);
    $controller->delete($id);
}

