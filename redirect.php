<?php
session_start();
$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '':
    case '/':
        $redirect = 'index.php';
        break;

    case '/admin':
        $redirect = 'admin.php';
        break;

    case '/main':
        $redirect = 'main.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . 'error.php';
        exit();
}

$_SESSION['site'] = $redirect;
require_once __DIR__ . '/core/header.php';
require_once __DIR__ . $redirect ?? __DIR__ . 'index.php';
require_once __DIR__ . '/core/footer.php';