<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSP Student Portal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS (Fail Pusat) -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="<?= ($_GET['action'] ?? '') === 'login' ? 'login-body' : '' ?>">

<?php 
$action = $_GET['action'] ?? '';
if (isset($_SESSION['user_id']) && $action !== 'login'): 
?>
<nav class="navbar navbar-expand-lg navbar-light custom-navbar shadow-sm mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold text-dark" href="index.php?action=profile">
      <i class="bi bi-mortarboard-fill me-2"></i>PSP Portal
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link <?= $action === 'profile' ? 'active fw-bold' : '' ?>" href="index.php?action=profile">
            <i class="bi bi-person-badge me-1"></i> My Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $action === 'change_password' ? 'active fw-bold' : '' ?>" href="index.php?action=change_password">
            <i class="bi bi-key me-1"></i> Change Password
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= strpos($action, 'student') !== false ? 'active fw-bold' : '' ?>" href="index.php?action=students">
            <i class="bi bi-journal-bookmark me-1"></i> Grade Management
          </a>
        </li>
      </ul>
      <a href="index.php?action=logout" class="btn btn-danger text-white btn-sm">
        <i class="bi bi-box-arrow-right me-1"></i> Logout
      </a>
    </div>
  </div>
</nav>
<?php endif; ?>

<div class="container py-3">