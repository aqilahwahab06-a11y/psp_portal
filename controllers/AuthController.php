<?php
// controllers/AuthController.php
session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Student.php';

class AuthController {
    private $db;
    private $studentModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->studentModel = new Student($this->db);
    }

    // Fungsi Login Normal
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nric = trim($_POST['nric']);
            $password = $_POST['password'];

            $user = $this->studentModel->getByNric($nric);

            if ($user && password_verify($password, $user['password'])) {
                // Simpan maklumat penting ke dlm SESSION
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                
                header("Location: index.php?action=profile");
                exit;
            } else {
                $error = "NRIC or Password is incorrect!";
                require_once __DIR__ . '/../views/auth/login.php';
            }
        } else {
            require_once __DIR__ . '/../views/auth/login.php';
        }
    }

    // Semakan Akses Keselamatan (Access Control)
    public static function checkAuth() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }
    }

    // Fungsi Logout
    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    }
}
?>