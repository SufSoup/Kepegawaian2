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
                <h4>Halaman Utama (Supervisor)</h4>
            </div>
            <div class="card-body">
                <h5>Selamat datang, <?= htmlspecialchars($user['nama'] ?? $user['username']) ?>!</h5>
                <p>Anda sedang berada di dashboard Supervisor. Silakan pilih menu di sebelah kiri.</p>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

