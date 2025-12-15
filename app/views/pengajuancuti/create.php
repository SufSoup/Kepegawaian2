<?php
$title = 'Tambah Pengajuan Cuti';
ob_start();
?>

<div class="mb-3">
    <a href="/Kepegawaian/pengajuancuti" class="btn btn-secondary btn-sm">← Kembali</a>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Halaman Tambah Pengajuan Cuti</h4>
            </div>
            <div class="card-body">
                <!-- Info Jatah Cuti untuk Karyawan -->
                <?php if ($user['role'] === 'Karyawan' && $cutiInfo): ?>
                <div class="alert alert-info">
                    <strong>Informasi Jatah Cuti Anda Tahun Ini:</strong><br>
                    Total Disetujui: <strong><?= $cutiInfo['total_disetujui'] ?> hari</strong> | 
                    Sisa Jatah: <strong><?= $cutiInfo['sisa_jatah'] ?> hari</strong> | 
                    Maksimal: <strong><?= $cutiInfo['maksimal'] ?> hari</strong>
                </div>
                <?php endif; ?>
                
                <form method="POST" action="/Kepegawaian/pengajuancuti/create">
                    <?php if ($user['role'] === 'HRD'): ?>
                        <div class="mb-3">
                            <label for="ID_Karyawan" class="form-label">Karyawan <span class="text-danger">*</span></label>
                            <select class="form-control" id="ID_Karyawan" name="ID_Karyawan" required>
                                <option value="">Pilih Karyawan</option>
                                <?php foreach ($karyawans as $k): ?>
                                    <option value="<?= $k['ID_Karyawan'] ?>"><?= htmlspecialchars($k['Nama_Lengkap']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    
                    <div class="mb-3">
                        <label for="ID_Master_Cuti" class="form-label">Jenis Cuti <span class="text-danger">*</span></label>
                        <select class="form-control" id="ID_Master_Cuti" name="ID_Master_Cuti" required>
                            <option value="">Pilih Jenis Cuti</option>
                            <?php foreach ($masterCutis as $mc): ?>
                                <option value="<?= $mc['ID_Master_Cuti'] ?>"><?= htmlspecialchars($mc['Nama_Cuti']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Tgl_Mulai" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="Tgl_Mulai" name="Tgl_Mulai" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Tgl_Selesai" class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="Tgl_Selesai" name="Tgl_Selesai" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Keterangan" class="form-label">Keterangan / Alasan</label>
                        <textarea class="form-control" id="Keterangan" name="Keterangan" rows="3" placeholder="Jelaskan alasan pengajuan cuti Anda"></textarea>
                    </div>
                    
                    <div class="alert alert-warning">
                        <strong>Perhatian:</strong> Jika total pengajuan cuti Anda melebihi 30 hari dalam satu tahun, pengajuan akan otomatis ditolak oleh sistem.
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="/Kepegawaian/pengajuancuti" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Pengajuan</button>
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

