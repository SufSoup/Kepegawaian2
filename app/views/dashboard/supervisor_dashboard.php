<?php
$title = 'Dashboard Supervisor';
ob_start();
?>

<div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
  <!-- Sidebar Menu -->
  <div class="lg:col-span-1">
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 sticky top-6">
      <h5 class="text-lg font-semibold text-slate-800 mb-4">Menu</h5>
      <ul class="space-y-2">
        <li>
          <a href="/Kepegawaian/department" class="flex items-center px-4 py-2 text-slate-700 hover:bg-indigo-50 rounded-lg transition-colors hover:text-indigo-600">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <span>Departemen</span>
          </a>
        </li>
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
      </ul>
    </div>
  </div>

  <!-- Main Content -->
  <div class="lg:col-span-3 space-y-6">
    <!-- Header -->
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
                        <h1 class="text-2xl font-bold text-slate-800">Dashboard Supervisor</h1>
                        <p class="text-sm text-slate-500">Selamat datang, <span class="font-medium text-indigo-600"><?= htmlspecialchars($user['nama'] ?? $user['username']) ?></span>!</p>
                    </div>
                </div>
                <p class="text-sm text-slate-600">Pantau pengajuan cuti dan kegiatan departemen Anda</p>
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
        <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-xl p-6 border border-amber-200">
            <div class="flex items-center justify-between mb-2">
                <div>
                    <p class="text-sm font-medium text-amber-800">Menunggu Persetujuan</p>
                    <p class="text-2xl font-bold mt-2"><?= $stats['pengajuan_pending'] ?? 0 ?></p>
                </div>
                <div class="p-3 bg-amber-500/10 rounded-lg">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm text-amber-700">Perlu ditinjau</p>
        </div>

        <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-xl p-6 border border-emerald-200">
            <div class="flex items-center justify-between mb-2">
                <div>
                    <p class="text-sm font-medium text-emerald-800">Disetujui</p>
                    <p class="text-2xl font-bold mt-2"><?= $stats['pengajuan_disetujui'] ?? 0 ?></p>
                </div>
                <div class="p-3 bg-emerald-500/10 rounded-lg">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm text-emerald-700">Telah diproses</p>
        </div>

        <div class="bg-gradient-to-br from-rose-50 to-rose-100 rounded-xl p-6 border border-rose-200">
            <div class="flex items-center justify-between mb-2">
                <div>
                    <p class="text-sm font-medium text-rose-800">Ditolak</p>
                    <p class="text-2xl font-bold mt-2"><?= $stats['pengajuan_ditolak'] ?? 0 ?></p>
                </div>
                <div class="p-3 bg-rose-500/10 rounded-lg">
                    <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm text-rose-700">Butuh perhatian</p>
        </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

