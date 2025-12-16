<?php
$title = 'Dashboard Karyawan';
ob_start();
?>

<div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
  <!-- Sidebar Menu -->
  <div class="lg:col-span-1">
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 sticky top-6">
      <h5 class="text-lg font-semibold text-slate-800 mb-4">Menu</h5>
      <ul class="space-y-2">
        <li>
          <a href="/Kepegawaian/karyawan" class="flex items-center px-4 py-2 text-slate-700 hover:bg-indigo-50 rounded-lg transition-colors hover:text-indigo-600">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5 1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <span>Karyawan</span>
          </a>
        </li>
        <li>
          <a href="/Kepegawaian/pengajuancuti" class="flex items-center px-4 py-2 text-slate-700 hover:bg-indigo-50 rounded-lg transition-colors hover:text-indigo-600">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m7 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>Pengajuan Cuti</span>
          </a>
        </li>
        <li>
          <a href="/Kepegawaian/slipgaji" class="flex items-center px-4 py-2 text-slate-700 hover:bg-indigo-50 rounded-lg transition-colors hover:text-indigo-600">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>Slip Gaji</span>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <!-- Main Content -->
  <div class="lg:col-span-3 space-y-6">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="space-y-2">
                <div class="flex items-center gap-3">
                    <div class="p-3 bg-gradient-to-r from-indigo-500 to-cyan-500 rounded-lg shadow">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-slate-800">Dashboard Karyawan</h1>
                        <p class="text-sm text-slate-500">Selamat datang, <span class="font-medium text-indigo-600"><?= htmlspecialchars($user['nama'] ?? $user['username']) ?></span>!</p>
                    </div>
                </div>
                <p class="text-sm text-slate-600">Ringkasan pribadi dan status cuti Anda</p>
            </div>
            <div class="flex items-center gap-2 text-slate-600 bg-slate-50 px-4 py-2 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="text-sm font-medium"><?= date('d F Y') ?></span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-gradient-to-br from-amber-500 to-orange-400 text-white rounded-xl p-6 shadow-lg">
            <p class="text-sm font-medium text-amber-100">Cuti Tahun Ini</p>
            <p class="text-3xl font-bold mt-2"><?= $stats['total_hari_cuti_tahun_ini'] ?? 0 ?> hari</p>
            <p class="text-xs mt-2 text-amber-100">Sisa: <?= max(0, (30 - ($stats['total_hari_cuti_tahun_ini'] ?? 0))) ?> hari</p>
        </div>

        <div class="bg-gradient-to-br from-indigo-600 to-cyan-500 text-white rounded-xl p-6 shadow-lg">
            <p class="text-sm font-medium text-indigo-100">Pengajuan Pending</p>
            <p class="text-3xl font-bold mt-2"><?= $stats['total_cuti_pending'] ?? 0 ?></p>
            <p class="text-xs mt-2 text-indigo-100">Perlu tindak lanjut</p>
        </div>

        <div class="bg-gradient-to-br from-emerald-500 to-teal-400 text-white rounded-xl p-6 shadow-lg">
            <p class="text-sm font-medium text-emerald-100">Pengajuan Disetujui</p>
            <p class="text-3xl font-bold mt-2"><?= $stats['total_cuti_disetujui'] ?? 0 ?></p>
            <p class="text-xs mt-2 text-emerald-100">Telah diproses</p>
        </div>
    </div>

    <?php if ($biodata): ?>
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
            <h3 class="text-lg font-semibold text-slate-800 mb-3">Biodata Pribadi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-slate-600"><strong>Nama:</strong> <?= htmlspecialchars($biodata['Nama_Lengkap']) ?></p>
                    <p class="text-sm text-slate-600"><strong>Email:</strong> <?= htmlspecialchars($biodata['Email_Kantor']) ?></p>
                    <p class="text-sm text-slate-600"><strong>Departemen:</strong> <?= htmlspecialchars($biodata['Nama_Departemen'] ?? '-') ?></p>
                </div>
                <div>
                    <p class="text-sm text-slate-600"><strong>Tgl Lahir:</strong> <?= date('d/m/Y', strtotime($biodata['Tgl_Lahir'])) ?></p>
                    <p class="text-sm text-slate-600"><strong>Tgl Masuk:</strong> <?= date('d/m/Y', strtotime($biodata['Tgl_Masuk'])) ?></p>
                    <p class="text-sm text-slate-600"><strong>Status:</strong> <?= htmlspecialchars($biodata['Status_Kerja']) ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
        <h3 class="text-lg font-semibold text-slate-800 mb-4">Aksi Cepat</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="/Kepegawaian/pengajuancuti/create" class="p-3 bg-indigo-50 rounded-lg text-center hover:bg-indigo-100 transition">
                <div class="p-2 bg-indigo-500 rounded inline-block mb-2">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <p class="text-sm text-slate-700">Ajukan Cuti</p>
            </a>

            <a href="/Kepegawaian/slipgaji" class="p-3 bg-emerald-50 rounded-lg text-center hover:bg-emerald-100 transition">
                <div class="p-2 bg-emerald-500 rounded inline-block mb-2">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3-1.343 3-3S13.657 2 12 2 9 3.343 9 5s1.343 3 3 3zM6 20v-2a4 4 0 014-4h4a4 4 0 014 4v2"></path>
                    </svg>
                </div>
                <p class="text-sm text-slate-700">Slip Gaji</p>
            </a>
        </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

