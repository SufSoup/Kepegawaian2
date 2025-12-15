<?php
$title = 'Dashboard HRD';
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
                    <li><a href="/Kepegawaian/mastercuti">Halaman Master Cuti</a></li>
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
                <h4>Halaman Utama (HRD)</h4>
            </div>
            <div class="card-body">
                <h5>Selamat datang, <?= htmlspecialchars($user['nama'] ?? $user['username']) ?>!</h5>
                <p>Anda sedang berada di dashboard HRD. Silakan pilih menu di sebelah kiri untuk mengelola data.</p>
                
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h6>Manajemen Karyawan</h6>
                                <p>Kelola data karyawan, tambah, edit, atau hapus data karyawan.</p>
                                <a href="/Kepegawaian/karyawan" class="btn btn-light btn-sm">Kelola</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h6>Manajemen Departemen</h6>
                                <p>Kelola data departemen perusahaan.</p>
                                <a href="/Kepegawaian/department" class="btn btn-light btn-sm">Kelola</a>
                            </div>
                        </div>
=======
                <h4>Dashboard HRD</h4>
            </div>
            <div class="card-body">
                <h5>Selamat datang, <?= htmlspecialchars($user['nama'] ?? $user['username']) ?>!</h5>
            </div>
        </div>
        
        <!-- Statistik Section -->
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body text-center">
                        <h6>Total Karyawan</h6>
                        <h2><?= $stats['total_karyawan'] ?? 0 ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body text-center">
                        <h6>Total Departemen</h6>
                        <h2><?= $stats['total_departemen'] ?? 0 ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info text-white">
                    <div class="card-body text-center">
                        <h6>Pengajuan Cuti</h6>
                        <h2><?= $stats['pengajuan_pending'] ?? 0 ?></h2>
                        <small>Menunggu (Pending)</small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Ringkasan Pengajuan Cuti -->
        <div class="card mt-3">
            <div class="card-header bg-warning text-dark">
                <h6 class="mb-0">Ringkasan Pengajuan Cuti</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p>Pending: <span class="badge bg-warning"><?= $stats['pengajuan_pending'] ?? 0 ?></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Disetujui: <span class="badge bg-success"><?= $stats['pengajuan_disetujui'] ?? 0 ?></span></p>
                    </div>
                    <div class="col-md-4">
                        <p>Ditolak: <span class="badge bg-danger"><?= $stats['pengajuan_ditolak'] ?? 0 ?></span></p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Akses Cepat -->
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h6>Manajemen Karyawan</h6>
                        <p>Kelola data karyawan, tambah, edit, atau hapus data karyawan.</p>
                        <a href="/Kepegawaian/karyawan" class="btn btn-light btn-sm">Buka</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h6>Manajemen Departemen</h6>
                        <p>Kelola data departemen perusahaan.</p>
                        <a href="/Kepegawaian/department" class="btn btn-light btn-sm">Buka</a>
>>>>>>> 29c4acf (initial commit project kepegawaian)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

