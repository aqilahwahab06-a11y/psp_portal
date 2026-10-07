<?php include __DIR__ . '/../header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <!-- 1. Tukar bg-primary kpd class card-header-pink -->
            <div class="card-header card-header-pink text-white py-3">
                <h5 class="mb-0 fw-bold">Add New Student</h5>
            </div>
            <div class="card-body p-4">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger py-2"><?= $error; ?></div>
                <?php endif; ?>

                <form action="index.php?action=create_student" method="POST">
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">NRIC</label>
                        <input type="text" name="nric" class="form-control bg-light" required placeholder="Exp: 050202071234">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">Full Name</label>
                        <input type="text" name="name" class="form-control bg-light" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">Program</label>
                        <input type="text" name="program" class="form-control bg-light" required placeholder="Exp: Diploma Teknologi Maklumat">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium text-secondary">Password (Default)</label>
                        <input type="text" name="password" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-dark fw-bold">Marks</label>
                        <input type="number" step="0.01" name="marks" class="form-control bg-light" min="0" max="100" required>
                    </div>
                    
                    <!-- 2. Tukar btn-success kpd class btn-pink -->
                    <button type="submit" class="btn btn-pink w-100 py-2 fw-bold shadow-sm">Save Record</button>
                    <a href="index.php?action=students" class="btn btn-secondary w-100 mt-2 py-2 fw-bold">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

</div></body></html>