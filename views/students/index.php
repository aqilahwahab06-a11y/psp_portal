<?php include __DIR__ . '/../header.php'; ?>

<!-- Balut dengan container/col supaya saiz card mengecil dan berada di tengah -->
<div class="row justify-content-center">
    <div class="col-md-10 col-lg-9">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-dark mb-0 fs-4">
                <i class="bi bi-journal-check me-2"></i>Student Grade Management
            </h3>
            <a href="index.php?action=create_student" class="btn text-white shadow-sm fw-bold btn-sm px-3" style="background-color:  #0a58ca !important;">
                <i class="bi bi-plus-lg me-1"></i> Add Student
            </a>
        </div>

        <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr style="background-color: #ff69b4 !important;">
                                <th class="ps-3 py-2 text-white" style="background-color: #ff69b4 !important;">ID</th>
                                <th class="py-2 text-white" style="background-color: #ff69b4 !important;">NRIC</th>
                                <th class="py-2 text-white" style="background-color: #ff69b4 !important;">Name</th>
                                <th class="py-2 text-white" style="background-color: #ff69b4 !important;">Program</th>
                                <th class="py-2 text-white" style="background-color: #ff69b4 !important;">Marks</th>
                                <th class="text-center py-2 text-white" style="background-color: #ff69b4 !important;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($students)): ?>
                                <?php foreach ($students as $row): ?>
                                    <tr>
                                        <td class="ps-3 fw-bold text-secondary py-2"><?= htmlspecialchars($row['id']); ?></td>
                                        <td class="py-2"><?= htmlspecialchars($row['nric']); ?></td>
                                        <td class="fw-medium text-dark py-2"><?= htmlspecialchars($row['name']); ?></td>
                                        <td class="py-2"><?= htmlspecialchars($row['program']); ?></td>
                                        <td class="fw-bold text-dark py-2"><?= htmlspecialchars($row['marks']); ?></td>
                                        
                                        <td class="text-center py-2">
                                            <a href="index.php?action=edit_student&id=<?= $row['id']; ?>" class="btn btn-sm btn-warning text-dark fw-bold me-1 py-1 px-2">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <a href="index.php?action=delete_student&id=<?= $row['id']; ?>" 
                                               class="btn btn-sm btn-danger text-white fw-bold py-1 px-2" 
                                               onclick="return confirm('Are you sure you want to delete this student record?');">
                                                <i class="bi bi-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="bi bi-inbox display-6 d-block mb-2"></i> No student records found.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
</body>
</html>