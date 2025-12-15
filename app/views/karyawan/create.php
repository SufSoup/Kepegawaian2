<?php
$title = 'Tambah Karyawan';
ob_start();
?>

<div class="mb-3">
    <a href="/Kepegawaian/karyawan" class="btn btn-secondary btn-sm">← Kembali</a>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Halaman Tambah Karyawan</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/Kepegawaian/karyawan/create">
                    <div class="mb-3">
                        <label for="Nama_Lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="Nama_Lengkap" name="Nama_Lengkap" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Tgl_Lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="Tgl_Lahir" name="Tgl_Lahir" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Tgl_Masuk" class="form-label">Tanggal Masuk <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="Tgl_Masuk" name="Tgl_Masuk" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="Karyawan">Karyawan</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="HRD">HRD</option>
                                </select>
                                <small class="form-text text-muted">Email akan otomatis dibuat berdasarkan role</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ID_Departemen" class="form-label">Departemen <span class="text-danger">*</span></label>
                                <select class="form-control" id="ID_Departemen" name="ID_Departemen" required>
                                    <option value="">Pilih Departemen</option>
                                    <?php foreach ($departments as $dept): ?>
                                        <option value="<?= $dept['ID_Departemen'] ?>"><?= htmlspecialchars($dept['Jabatan']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="Alamat" name="Alamat" rows="3"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Status_Kerja" class="form-label">Status Kerja</label>
                        <select class="form-control" id="Status_Kerja" name="Status_Kerja">
                            <option value="Aktif">Aktif</option>
                            <option value="Non-Aktif">Non-Aktif</option>
                            <option value="Resign">Resign</option>
                        </select>
                    </div>
                    
                    <div class="alert alert-info">
                        <strong>Informasi Penting:</strong> Setelah karyawan ditambahkan, akun login akan otomatis dibuat dengan format email sesuai role. Password akan di-generate secara otomatis.
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="/Kepegawaian/karyawan" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
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

