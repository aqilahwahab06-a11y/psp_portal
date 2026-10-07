<?php include __DIR__ . '/../header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <!-- Mesej Pemberitahuan (Success / Error) -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i><?= htmlspecialchars($_SESSION['success']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i><?= htmlspecialchars($_SESSION['error']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div class="card shadow-sm border-0">
            <!-- 1. Header Card Warna Pink (#ff69b4) -->
            <div class="card-header text-white py-3" style="background-color: #ff69b4;">
                <h5 class="card-title mb-0 fw-bold">
                    <i class="bi bi-person-badge-fill me-2"></i>Student Profile Information
                </h5>
            </div>
            
            <div class="card-body p-4">
                <!-- BAHAGIAN GAMBAR PROFIL & BORANG UPLOAD -->
                <div class="text-center mb-4 pb-3 border-bottom">
                    <div class="mb-3">
                        <?php if (!empty($student['profile_image']) && file_exists(__DIR__ . '/../../uploads/' . $student['profile_image'])): ?>
                            <img src="uploads/<?= htmlspecialchars($student['profile_image']); ?>" alt="Profile Picture" class="rounded-circle img-thumbnail shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/150?text=No+Image" alt="Default Profile Picture" class="rounded-circle img-thumbnail shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                        <?php endif; ?>
                    </div>

                    <!-- Form Muat Naik Gambar Profil -->
                    <form action="index.php?action=upload_profile" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 400px;">
                        <div class="input-group input-group-sm mb-2">
                            <input type="file" name="profile_picture" id="profile_picture" class="form-control" accept=".jpg,.jpeg,.png" required>
                            <button class="btn text-white fw-bold" type="submit" name="upload" style="background-color: #ff69b4;">
                                <i class="bi bi-upload me-1"></i> Upload
                            </button>
                        </div>
                        <small class="text-muted d-block">Format: JPG, JPEG, PNG sahaja | Saiz Maksimum: 2MB</small>
                    </form>
                </div>

                <!-- Name -->
                <div class="row mb-3 align-items-center">
                    <div class="col-sm-4 text-dark fw-bold">
                        <i class="bi bi-person me-2"></i>Name
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <?= htmlspecialchars($student['name'] ?? 'Ali Bin Ahmad') ?>
                    </div>
                </div>

                <!-- NRIC -->
                <div class="row mb-3 align-items-center">
                    <div class="col-sm-4 text-dark fw-bold">
                        <i class="bi bi-card-text me-2"></i>NRIC
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <?= htmlspecialchars($student['nric'] ?? '050101071234') ?>
                    </div>
                </div>

                <!-- Program -->
                <div class="row mb-3 align-items-center">
                    <div class="col-sm-4 text-dark fw-bold">
                        <i class="bi bi-book me-2"></i>Program
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <?= htmlspecialchars($student['program'] ?? 'Diploma Teknologi Maklumat') ?>
                    </div>
                </div>

                <!-- Current Marks -->
                <div class="row align-items-center">
                    <div class="col-sm-4 text-dark fw-bold">
                        <i class="bi bi-award me-2"></i>Current Marks
                    </div>
                    <div class="col-sm-8 text-secondary">
                        <?= htmlspecialchars($student['marks'] ?? '85.50') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</body>
</html>