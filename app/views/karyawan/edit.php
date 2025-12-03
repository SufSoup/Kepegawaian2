<?php
$title = 'Edit Karyawan';
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h4>Halaman Edit Karyawan</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/Kepegawaian/karyawan/edit/<?= $karyawan['ID_Karyawan'] ?>">
                    <div class="mb-3">
                        <label for="Nama_Lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="Nama_Lengkap" name="Nama_Lengkap" 
                               value="<?= htmlspecialchars($karyawan['Nama_Lengkap']) ?>" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Tgl_Lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="Tgl_Lahir" name="Tgl_Lahir" 
                                       value="<?= date('Y-m-d', strtotime($karyawan['Tgl_Lahir'])) ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Tgl_Masuk" class="form-label">Tanggal Masuk <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="Tgl_Masuk" name="Tgl_Masuk" 
                                       value="<?= date('Y-m-d', strtotime($karyawan['Tgl_Masuk'])) ?>" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Email_Kantor" class="form-label">Email Kantor <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="Email_Kantor" name="Email_Kantor" 
                               value="<?= htmlspecialchars($karyawan['Email_Kantor']) ?>" required>
                    </div>
                    
                    <?php if ($user['role'] === 'HRD'): ?>
                        <div class="mb-3">
                            <label for="ID_Departemen" class="form-label">Departemen <span class="text-danger">*</span></label>
                            <select class="form-control" id="ID_Departemen" name="ID_Departemen" required>
                                <option value="">Pilih Departemen</option>
                                <?php foreach ($departments as $dept): ?>
                                    <option value="<?= $dept['ID_Departemen'] ?>" 
                                        <?= $karyawan['ID_Departemen'] == $dept['ID_Departemen'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($dept['Jabatan']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="Status_Kerja" class="form-label">Status Kerja</label>
                            <select class="form-control" id="Status_Kerja" name="Status_Kerja">
                                <option value="Aktif" <?= $karyawan['Status_Kerja'] === 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                                <option value="Non-Aktif" <?= $karyawan['Status_Kerja'] === 'Non-Aktif' ? 'selected' : '' ?>>Non-Aktif</option>
                                <option value="Resign" <?= $karyawan['Status_Kerja'] === 'Resign' ? 'selected' : '' ?>>Resign</option>
                            </select>
                        </div>
                    <?php endif; ?>
                    
                    <div class="mb-3">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="Alamat" name="Alamat" rows="3"><?= htmlspecialchars($karyawan['Alamat'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="/Kepegawaian/karyawan" class="btn btn-secondary">Kembali</a>
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

