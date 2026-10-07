<?php include __DIR__ . '/../header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm border-0">
            <!-- Tambah class card-header-pink di sini -->
            <div class="card-header card-header-pink py-3">
                <h5 class="card-title mb-0 fw-bold">
                    <i class="bi bi-shield-lock me-2"></i>Change Password
                </h5>
            </div>

            <div class="card-body p-4">
                <form action="index.php?action=change_password" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">Old Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted"><i class="bi bi-key"></i></span>
                            <input type="password" name="old_password" class="form-control bg-light" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">New Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted"><i class="bi bi-lock"></i></span>
                            <input type="password" name="new_password" class="form-control bg-light" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-dark fw-bold">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" name="confirm_password" class="form-control bg-light" required>
                        </div>
                    </div>

                    <!-- Ganti btn-primary kpd btn-pink di sini -->
                    <button type="submit" class="btn btn-pink w-100 py-2 shadow-sm fw-bold">
                        <i class="bi bi-box-arrow-down me-1"></i> Save Changes
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>

</div>
</body>
</html>