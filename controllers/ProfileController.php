<?php
// controllers/ProfileController.php
require_once __DIR__ . '/AuthController.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Student.php';

class ProfileController {
    private $db;
    private $studentModel;

    public function __construct() {
        // Semak status session log masuk
        AuthController::checkAuth();
        
        $database = new Database();
        $this->db = $database->getConnection();
        $this->studentModel = new Student($this->db);
    }

    // Papar profil pelajar
    public function index() {
        $studentId = $_SESSION['user_id'];
        $student = $this->studentModel->getById($studentId);
        
        require_once __DIR__ . '/../views/profile/index.php';
    }

    // Tukar kata laluan
    public function changePassword() {
        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $oldPassword = $_POST['old_password'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            $studentId = $_SESSION['user_id'];
            $student = $this->studentModel->getById($studentId);

            // Semak pengesahan kata laluan
            if (!password_verify($oldPassword, $student['password'])) {
                $error = "Incorrect old password!";
            } elseif ($newPassword !== $confirmPassword) {
                $error = "New password confirmation does not match!";
            } else {
                // Kemaskini dengan password hashing
                if ($this->studentModel->updatePassword($studentId, $newPassword)) {
                    $success = "Password updated successfully!";
                } else {
                    $error = "Failed to update password.";
                }
            }
        }

        require_once __DIR__ . '/../views/profile/change_password.php';
    }
}
?>