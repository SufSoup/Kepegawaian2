<?php
$title = 'Dashboard Supervisor';
ob_start();
?>

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Menu</h5>
                <ul class="sidebar-menu">
                    <li><a href="/Kepegawaian/department">Halaman Departemen</a></li>
                    <li><a href="/Kepegawaian/karyawan">Halaman Karyawan</a></li>
                    <li><a href="/Kepegawaian/pengajuancuti">Halaman Pengajuan Cuti</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-md-9">
        <div class="card">
            <div class="card-header bg-primary text-white">
<<<<<<< HEAD
                <h4>Halaman Utama (Supervisor)</h4>
            </div>
            <div class="card-body">
                <h5>Selamat datang, <?= htmlspecialchars($user['nama'] ?? $user['username']) ?>!</h5>
                <p>Anda sedang berada di dashboard Supervisor. Silakan pilih menu di sebelah kiri.</p>
=======
                <h4>Dashboard Supervisor</h4>
            </div>
            <div class="card-body">
                <h5>Selamat datang, <?= htmlspecialchars($user['nama'] ?? $user['username']) ?>!</h5>
            </div>
        </div>
        
        <!-- Statistik Pengajuan Cuti -->
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card bg-warning text-dark">
                    <div class="card-body text-center">
                        <h6>Menunggu Persetujuan</h6>
                        <h2><?= $stats['pengajuan_pending'] ?? 0 ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body text-center">
                        <h6>Disetujui</h6>
                        <h2><?= $stats['pengajuan_disetujui'] ?? 0 ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-danger text-white">
                    <div class="card-body text-center">
                        <h6>Ditolak</h6>
                        <h2><?= $stats['pengajuan_ditolak'] ?? 0 ?></h2>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Ringkasan Cuti -->
        <div class="card mt-3">
            <div class="card-header bg-info text-white">
                <h6 class="mb-0">Ringkasan Pengajuan Cuti</h6>
            </div>
            <div class="card-body">
                <p class="mb-2">Sebagai supervisor, Anda memiliki tanggung jawab untuk menyetujui atau menolak pengajuan cuti dari karyawan dalam departemen Anda.</p>
                <p class="mb-0"><strong>Total pengajuan yang menunggu persetujuan: <?= $stats['pengajuan_pending'] ?? 0 ?></strong></p>
            </div>
        </div>
        
        <!-- Akses Cepat -->
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h6>Lihat Pengajuan Cuti</h6>
                        <p>Lihat dan kelola pengajuan cuti dari karyawan.</p>
                        <a href="/Kepegawaian/pengajuancuti" class="btn btn-light btn-sm">Buka</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h6>History Pengajuan Cuti</h6>
                        <p>Lihat riwayat pengajuan cuti yang sudah diproses.</p>
                        <a href="/Kepegawaian/pengajuancuti/history" class="btn btn-light btn-sm">Buka</a>
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

