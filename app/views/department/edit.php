<?php
$title = 'Edit Departemen';
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h4>Halaman Edit Departemen</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/Kepegawaian/department/edit/<?= $department['ID_Departemen'] ?>">
                    <div class="mb-3">
                        <label for="Jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="Jabatan" name="Jabatan" 
                               value="<?= htmlspecialchars($department['Jabatan']) ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Tgl_Berdiri" class="form-label">Tanggal Berdiri</label>
                        <input type="date" class="form-control" id="Tgl_Berdiri" name="Tgl_Berdiri" 
                               value="<?= $department['Tgl_Berdiri'] ? date('Y-m-d', strtotime($department['Tgl_Berdiri'])) : '' ?>">
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="/Kepegawaian/department" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

