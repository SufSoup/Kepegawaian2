<?php
$title = 'Detail Karyawan';
ob_start();
?>

<div class="mb-3">
    <a href="/Kepegawaian/karyawan" class="btn btn-secondary btn-sm">← Kembali</a>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <!-- Biodata Card -->
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">📋 Biodata Karyawan</h4>
            </div>
            <div class="card-body">
                <!-- Nama dan Status -->
                <div class="mb-4 pb-3 border-bottom">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="mb-1"><?= htmlspecialchars($karyawan['Nama_Lengkap']) ?></h3>
                            <p class="text-muted mb-0">ID: <?= htmlspecialchars($karyawan['ID_Karyawan']) ?></p>
                        </div>
                        <div class="col-md-4 text-end">
                            <span class="badge bg-<?= $karyawan['Status_Kerja'] === 'Aktif' ? 'success' : 'danger' ?> fs-6">
                                <?= htmlspecialchars($karyawan['Status_Kerja']) ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Data Pribadi -->
                <div class="mb-4">
                    <h5 class="text-dark mb-3">
                        <i class="bi bi-person"></i> Data Pribadi
                    </h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="text-muted small mb-1">Tanggal Lahir</p>
                            <p class="mb-0"><strong><?= date('d/m/Y', strtotime($karyawan['Tgl_Lahir'])) ?></strong></p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted small mb-1">Email Kantor</p>
                            <p class="mb-0"><strong><?= htmlspecialchars($karyawan['Email_Kantor']) ?></strong></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-muted small mb-1">Alamat</p>
                            <p class="mb-0"><strong><?= htmlspecialchars($karyawan['Alamat'] ?? '-') ?></strong></p>
                        </div>
                    </div>
                </div>

                <!-- Data Pekerjaan -->
                <div class="mb-4 pb-3 border-bottom">
                    <h5 class="text-dark mb-3">
                        <i class="bi bi-briefcase"></i> Data Pekerjaan
                    </h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="text-muted small mb-1">Departemen</p>
                            <p class="mb-0"><strong><?= htmlspecialchars($karyawan['Nama_Departemen'] ?? '-') ?></strong></p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted small mb-1">Tanggal Masuk</p>
                            <p class="mb-0"><strong><?= date('d/m/Y', strtotime($karyawan['Tgl_Masuk'])) ?></strong></p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-2 justify-content-between">
                    <a href="/Kepegawaian/karyawan" class="btn btn-secondary">← Kembali</a>
                    <a href="/Kepegawaian/karyawan/edit/<?= $karyawan['ID_Karyawan'] ?>" class="btn btn-primary">✏️ Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

