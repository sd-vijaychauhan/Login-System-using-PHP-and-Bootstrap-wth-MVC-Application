<?php
session_start();
require_once 'models/User.php';

class AuthController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function showLogin() {
        if(isset($_SESSION['user_id'])) {
            header("Location: index.php?action=dashboard");
            exit();
        }
        include 'views/auth/login.php';
    }

    public function showRegister() {
        if(isset($_SESSION['user_id'])) {
            header("Location: index.php?action=dashboard");
            exit();
        }
        include 'views/auth/register.php';
    }

    public function login() {
        if($_POST) {
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];

            $userData = $this->user->login();
            if($userData) {
                // Start session and store user data
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['username'] = $userData['username'];
                $_SESSION['email'] = $userData['email'];
                $_SESSION['created_at'] = $userData['created_at'];
                $_SESSION['login_time'] = date('Y-m-d H:i:s');
                
                header("Location: index.php?action=dashboard");
                exit();
            } else {
                $error = "Invalid email or password!";
                include 'views/auth/login.php';
            }
        }
    }

    public function register() {
        if($_POST) {
            if($_POST['password'] !== $_POST['confirm_password']) {
                $error = "Passwords do not match!";
                include 'views/auth/register.php';
                return;
            }

            $this->user->username = $_POST['username'];
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];

            if($this->user->emailExists()) {
                $error = "Email already exists!";
                include 'views/auth/register.php';
                return;
            }

            if($this->user->register()) {
                $success = "Registration successful! Please login.";
                include 'views/auth/login.php';
            } else {
                $error = "Registration failed!";
                include 'views/auth/register.php';
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
?>