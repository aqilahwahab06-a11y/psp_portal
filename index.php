<?php
// index.php - Main Router / Entry Point

require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/ProfileController.php';
require_once __DIR__ . '/controllers/StudentController.php';

// Dapatkan tindakan (action) dari URL, default ke 'login'
$action = $_GET['action'] ?? 'login';

switch ($action) {
    // --- AUTHENTICATION ---
    case 'login':
        $auth = new AuthController();
        $auth->login();
        break;

    case 'logout':
        $auth = new AuthController();
        $auth->logout();
        break;

    // --- PROFILE MANAGEMENT ---
    case 'profile':
        $profile = new ProfileController();
        $profile->index();
        break;

    case 'change_password':
        $profile = new ProfileController();
        $profile->changePassword();
        break;

    // --- STUDENT CRUD MANAGEMENT ---
    case 'students':
        $student = new StudentController();
        $student->index();
        break;

    case 'create_student':
        $student = new StudentController();
        $student->create();
        break;

    case 'edit_student':
        $student = new StudentController();
        $student->edit();
        break;

    case 'delete_student':
        $student = new StudentController();
        $student->delete();
        break;

    // --- DEFAULT ROUTE ---
    default:
        header("Location: index.php?action=login");
        exit;
}
?>