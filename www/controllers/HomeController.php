<?php
// session_start();

class HomeController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function index() {
        include 'views/home/index.php';
    }

    public function dashboard() {
        if(!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit();
        }
        
        // Get fresh user data
        $userData = $this->user->getUserById($_SESSION['user_id']);
        if(!$userData) {
            // User not found, logout
            session_destroy();
            header("Location: index.php?action=login");
            exit();
        }
        
        include 'views/home/dashboard.php';
    }

    public function profile() {
        if(!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit();
        }
        
        $userData = $this->user->getUserById($_SESSION['user_id']);
        if(!$userData) {
            session_destroy();
            header("Location: index.php?action=login");
            exit();
        }
        
        include 'views/home/profile.php';
    }

    public function updateProfile() {
        if(!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit();
        }

        if($_POST) {
            $username = $_POST['username'];
            $email = $_POST['email'];

            // Check if email already exists for other users
            $existingUser = new User();
            $existingUser->email = $email;
            if($existingUser->emailExists()) {
                $checkQuery = "SELECT id FROM my_users WHERE email = :email AND id != :id";
                $database = new Database();
                $conn = $database->getConnection();
                $stmt = $conn->prepare($checkQuery);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':id', $_SESSION['user_id']);
                $stmt->execute();
                
                if($stmt->rowCount() > 0) {
                    $error = "Email already exists for another user!";
                    $userData = $this->user->getUserById($_SESSION['user_id']);
                    include 'views/home/profile.php';
                    return;
                }
            }

            if($this->user->updateProfile($_SESSION['user_id'], $username, $email)) {
                // Update session data
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                
                $success = "Profile updated successfully!";
                $userData = $this->user->getUserById($_SESSION['user_id']);
                include 'views/home/profile.php';
            } else {
                $error = "Failed to update profile!";
                $userData = $this->user->getUserById($_SESSION['user_id']);
                include 'views/home/profile.php';
            }
        }
    }
}
?>