<?php include __DIR__ . '/../header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <!-- 1. Header Card Tukar Warna Pink -->
            <div class="card-header text-white py-3" style="background-color: #ff69b4 !important;">
                <h5 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2"></i>Update Student Record</h5>
            </div>
            <div class="card-body p-4">
                <form action="index.php?action=edit_student&id=<?= $student['id']; ?>" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">NRIC (Read-only)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-card-text"></i></span>
                            <input type="text" class="form-control bg-light" value="<?= htmlspecialchars($student['nric']); ?>" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($student['name']); ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">Program</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-book"></i></span>
                            <input type="text" name="program" class="form-control" value="<?= htmlspecialchars($student['program']); ?>" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-dark fw-bold">Marks</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-award"></i></span>
                            <input type="number" step="0.01" name="marks" class="form-control" value="<?= htmlspecialchars($student['marks']); ?>" required>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <!-- 2. Button Update Record Warna Pink -->
                        <button type="submit" class="btn text-white py-2 fw-bold shadow-sm" style="background-color: #ff69b4 !important;">
                            <i class="bi bi-check-circle me-1"></i> Update Record
                        </button>
                        <!-- 3. Button Cancel Warna Grey Padu -->
                        <a href="index.php?action=students" class="btn btn-secondary py-2 fw-bold text-white">
                            <i class="bi bi-x-circle me-1"></i> Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</div>
</body>
</html>