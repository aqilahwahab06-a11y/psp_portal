<?php
// controllers/StudentController.php
require_once __DIR__ . '/AuthController.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Student.php';

class StudentController {
    private $db;
    private $studentModel;

    public function __construct() {
        // Pastikan hanya user logged-in boleh akses
        AuthController::checkAuth();

        $database = new Database();
        $this->db = $database->getConnection();
        $this->studentModel = new Student($this->db);
    }

    // READ: Senarai Pelajar
    public function index() {
        $students = $this->studentModel->getAll();
        require_once __DIR__ . '/../views/students/index.php';
    }

    // CREATE: Tambah Pelajar Baru
    public function create() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nric = trim($_POST['nric']);
            $name = trim($_POST['name']);
            $program = trim($_POST['program']);
            $password = $_POST['password'];
            $marks = $_POST['marks'];

            if ($this->studentModel->create($nric, $name, $program, $password, $marks)) {
                header("Location: index.php?action=students");
                exit;
            } else {
                $error = "Failed to add student record.";
            }
        }
        require_once __DIR__ . '/../views/students/create.php';
    }

    // UPDATE: Kemaskini Pelajar/Markah
    public function edit() {
        $error = '';
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: index.php?action=students");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $program = trim($_POST['program']);
            $marks = $_POST['marks'];

            if ($this->studentModel->update($id, $name, $program, $marks)) {
                header("Location: index.php?action=students");
                exit;
            } else {
                $error = "Failed to update record.";
            }
        }

        $student = $this->studentModel->getById($id);
        require_once __DIR__ . '/../views/students/edit.php';
    }

    // DELETE: Padam Rekod Pelajar
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->studentModel->delete($id);
        }
        header("Location: index.php?action=students");
        exit;
    }

    // UPLOAD: Muat Naik Gambar Profil Pelajar (Ditambah untuk Mini Project 2)
    public function uploadProfile() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $studentId = $_SESSION['user_id'] ?? null;

        if (!$studentId) {
            header("Location: index.php?action=login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
            $file = $_FILES['profile_picture'];

            // Semak jika ada ralat asas muat naik fail
            if ($file['error'] !== UPLOAD_ERR_OK) {
                $_SESSION['error'] = "Ralat semasa muat naik fail. Sila cuba lagi.";
                header("Location: index.php?action=profile");
                exit;
            }

            // 1. Semak Format Fail (.jpg, .jpeg, .png sahaja)
            $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $allowedExts = ['jpg', 'jpeg', 'png'];

            if (!in_array($fileExt, $allowedExts)) {
                $_SESSION['error'] = "Format fail tidak dibenarkan! Hanya .jpg, .jpeg, dan .png sahaja.";
                header("Location: index.php?action=profile");
                exit;
            }

            // 2. Semak Saiz Fail (Maksimum 2MB = 2,097,152 bytes)
            $maxFileSize = 2 * 1024 * 1024; // 2MB
            if ($file['size'] > $maxFileSize) {
                $_SESSION['error'] = "Saiz fail melebihi had 2MB yang dibenarkan!";
                header("Location: index.php?action=profile");
                exit;
            }

            // 3. Penamaan Fail Selamat Menggunakan uniqid()
            $newFileName = uniqid('profile_', true) . '.' . $fileExt;
            $uploadDir = __DIR__ . '/../uploads/';

            // Pastikan folder uploads wujud
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $destination = $uploadDir . $newFileName;

            // 4. Pindahkan Fail & Kemaskini Database
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                // Padam gambar lama jika ada (pilihan kebersihan server)
                $currentStudent = $this->studentModel->getById($studentId);
                if (!empty($currentStudent['profile_image'])) {
                    $oldImage = $uploadDir . $currentStudent['profile_image'];
                    if (file_exists($oldImage)) {
                        unlink($oldImage);
                    }
                }

                // Simpan nama gambar baru ke pangkalan data
                if ($this->studentModel->updateProfileImage($studentId, $newFileName)) {
                    $_SESSION['success'] = "Gambar profil berjaya dikemaskini!";
                } else {
                    $_SESSION['error'] = "Gagal mengemas kini pangkalan data.";
                }
            } else {
                $_SESSION['error'] = "Gagal memindahkan fail yang dimuat naik.";
            }

            header("Location: index.php?action=profile");
            exit;
        }
    }
}
?>