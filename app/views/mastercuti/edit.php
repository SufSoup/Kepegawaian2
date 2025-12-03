<?php
$title = 'Edit Master Cuti';
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h4>Halaman Edit Master Cuti</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/Kepegawaian/mastercuti/edit/<?= $masterCuti['ID_Master_Cuti'] ?>">
                    <div class="mb-3">
                        <label for="Nama_Cuti" class="form-label">Nama Cuti <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="Nama_Cuti" name="Nama_Cuti" 
                               value="<?= htmlspecialchars($masterCuti['Nama_Cuti']) ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Tipe_Cuti" class="form-label">Tipe Cuti <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="Tipe_Cuti" name="Tipe_Cuti" 
                               value="<?= htmlspecialchars($masterCuti['Tipe_Cuti']) ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Jatah_Hari" class="form-label">Jatah Hari <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="Jatah_Hari" name="Jatah_Hari" 
                               value="<?= htmlspecialchars($masterCuti['Jatah_Hari']) ?>" min="0" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Berlaku_Untuk" class="form-label">Berlaku Untuk</label>
                        <input type="text" class="form-control" id="Berlaku_Untuk" name="Berlaku_Untuk" 
                               value="<?= htmlspecialchars($masterCuti['Berlaku_Untuk'] ?? '') ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="Tgl_Libur" class="form-label">Tanggal Libur</label>
                        <input type="date" class="form-control" id="Tgl_Libur" name="Tgl_Libur" 
                               value="<?= $masterCuti['Tgl_Libur'] ? date('Y-m-d', strtotime($masterCuti['Tgl_Libur'])) : '' ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="Deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="Deskripsi" name="Deskripsi" rows="3"><?= htmlspecialchars($masterCuti['Deskripsi'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="/Kepegawaian/mastercuti" class="btn btn-secondary">Kembali</a>
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

