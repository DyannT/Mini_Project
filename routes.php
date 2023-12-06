<?php
$controllers = array(
    'Login' => ['viewForm', 'mainActionForm', 'Logout'],
    'Post' => ['addForm', 'addAction', 'deleteAction', 'editForm', 'editAction'],
    'Register' => ['viewForm','mainActionForm']
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'Page';
    $action = 'error';
}

include_once('controllers/' . $controller . 'Controller.php');

$klass = $controller . 'Controller';

$controller = new $klass();
$controller->$action();
