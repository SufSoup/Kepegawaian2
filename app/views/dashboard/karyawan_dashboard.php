<?php
$title = 'Dashboard Karyawan';
ob_start();
?>

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Menu</h5>
                <ul class="sidebar-menu">
                    <li><a href="/Kepegawaian/karyawan">Halaman Karyawan</a></li>
                    <li><a href="/Kepegawaian/pengajuancuti">Halaman Pengajuan Cuti</a></li>
                    <li><a href="/Kepegawaian/slipgaji">Halaman Slip Gaji</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-md-9">
        <div class="card">
            <div class="card-header bg-primary text-white">
<<<<<<< HEAD
                <h4>Halaman Utama (Karyawan)</h4>
            </div>
            <div class="card-body">
                <h5>Selamat datang, <?= htmlspecialchars($user['nama'] ?? $user['username']) ?>!</h5>
                <p>Anda sedang berada di dashboard Karyawan. Silakan pilih menu di sebelah kiri.</p>
=======
                <h4>Dashboard Karyawan</h4>
            </div>
            <div class="card-body">
                <h5>Selamat datang, <?= htmlspecialchars($user['nama'] ?? $user['username']) ?>!</h5>
            </div>
        </div>
        
        <!-- Biodata Section -->
        <?php if ($biodata): ?>
        <div class="card mt-3">
            <div class="card-header bg-info text-white">
                <h5>Biodata Pribadi</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nama Lengkap:</strong> <?= htmlspecialchars($biodata['Nama_Lengkap']) ?></p>
                        <p><strong>Email Kantor:</strong> <?= htmlspecialchars($biodata['Email_Kantor']) ?></p>
                        <p><strong>Departemen:</strong> <?= htmlspecialchars($biodata['Nama_Departemen'] ?? '-') ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Tanggal Lahir:</strong> <?= date('d/m/Y', strtotime($biodata['Tgl_Lahir'])) ?></p>
                        <p><strong>Tanggal Masuk:</strong> <?= date('d/m/Y', strtotime($biodata['Tgl_Masuk'])) ?></p>
                        <p><strong>Status Kerja:</strong> <span class="badge bg-<?= $biodata['Status_Kerja'] === 'Aktif' ? 'success' : 'danger' ?>"><?= htmlspecialchars($biodata['Status_Kerja']) ?></span></p>
                    </div>
                </div>
                <p><strong>Alamat:</strong> <?= htmlspecialchars($biodata['Alamat']) ?></p>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Statistik Cuti Section -->
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Cuti Tahun Ini</h6>
                        <p>Sudah Diambil: <strong><?= $stats['total_hari_cuti_tahun_ini'] ?> hari</strong></p>
                        <p>Sisa Jatah: <strong><?= (30 - $stats['total_hari_cuti_tahun_ini']) ?> hari</strong></p>
                        <p>Maksimal: <strong>30 hari</strong></p>
                        <div class="progress mt-2">
                            <div class="progress-bar" style="width: <?= ($stats['total_hari_cuti_tahun_ini'] / 30) * 100 ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Status Pengajuan Cuti</h6>
                        <p>Pending: <span class="badge bg-warning"><?= $stats['total_cuti_pending'] ?></span></p>
                        <p>Disetujui: <span class="badge bg-success"><?= $stats['total_cuti_disetujui'] ?></span></p>
                        <p>Ditolak: <span class="badge bg-danger"><?= $stats['total_cuti_ditolak'] ?></span></p>
                    </div>
                </div>
>>>>>>> 29c4acf (initial commit project kepegawaian)
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

