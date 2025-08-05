<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/HomeController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'home';
$authController = new AuthController();
$homeController = new HomeController();

switch($action) {
    case 'login':
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login();
        } else {
            $authController->showLogin();
        }
        break;
    case 'register':
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->register();
        } else {
            $authController->showRegister();
        }
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'dashboard':
        $homeController->dashboard();
        break;
    case 'profile':
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $homeController->updateProfile();
        } else {
            $homeController->profile();
        }
        break;
    default:
        $homeController->index();
        break;
}
?>