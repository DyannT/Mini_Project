<?php
require_once('models/DBConnect.php');


if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'] ?? 'index';
} else {
    $controller = 'Login';
    $action = 'viewForm';
}

require_once('routes.php');