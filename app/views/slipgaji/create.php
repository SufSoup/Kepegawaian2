<?php
$title = 'Tambah Slip Gaji';
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Halaman Tambah Slip Gaji</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="/Kepegawaian/slipgaji/create">
                    <div class="mb-3">
                        <label for="ID_Karyawan" class="form-label">Karyawan <span class="text-danger">*</span></label>
                        <select class="form-control" id="ID_Karyawan" name="ID_Karyawan" required>
                            <option value="">Pilih Karyawan</option>
                            <?php foreach ($karyawans as $k): ?>
                                <option value="<?= $k['ID_Karyawan'] ?>"><?= htmlspecialchars($k['Nama_Lengkap']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="Periode_Bulan" class="form-label">Bulan <span class="text-danger">*</span></label>
                                <select class="form-control" id="Periode_Bulan" name="Periode_Bulan" required>
                                    <?php for ($i = 1; $i <= 12; $i++): ?>
                                        <option value="<?= $i ?>"><?= date('F', mktime(0, 0, 0, $i, 1)) ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="Periode_Tahun" class="form-label">Tahun <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="Periode_Tahun" name="Periode_Tahun" 
                                       value="<?= date('Y') ?>" min="2000" max="2100" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="Tgl_Dibuat" class="form-label">Tanggal Dibuat <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="Tgl_Dibuat" name="Tgl_Dibuat" 
                                       value="<?= date('Y-m-d') ?>" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Gaji_Pokok" class="form-label">Gaji Pokok <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="Gaji_Pokok" name="Gaji_Pokok" min="0" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="Tunjangan_Jabatan" class="form-label">Tunjangan Jabatan</label>
                        <input type="number" class="form-control" id="Tunjangan_Jabatan" name="Tunjangan_Jabatan" min="0" value="0">
                    </div>
                    
                    <div class="mb-3">
                        <label for="Potongan_BPJS" class="form-label">Potongan BPJS</label>
                        <input type="number" class="form-control" id="Potongan_BPJS" name="Potongan_BPJS" min="0" value="0">
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="/Kepegawaian/slipgaji" class="btn btn-secondary">Kembali</a>
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

