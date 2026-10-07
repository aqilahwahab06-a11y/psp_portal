<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PSP Student Portal</title>
    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Fail CSS Utama Anda -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="background-color: #bdd1f6 !important; background: #bdd1f6 !important;">

<div class="container login-container">
    <div class="login-card card shadow-lg p-3">
        <div class="card-body">
            <div class="text-center mb-4">
                <i class="bi bi-mortarboard-fill text-pink display-4"></i>
                <h3 class="fw-bold text-dark mt-2">PSP Student Portal</h3>
                <p class="text-muted small">Please log in to access your account</p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger d-flex align-items-center py-2" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <div><?= htmlspecialchars($error); ?></div>
                </div>
            <?php endif; ?>

            <form action="index.php?action=login" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-medium text-secondary">NRIC</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-card-text"></i></span>
                        <input type="text" name="nric" class="form-control bg-light" placeholder="Exp: 050101071234" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-medium text-secondary">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control bg-light" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-login-pink w-100 py-2 shadow-sm fw-bold">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>