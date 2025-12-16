<?php
$title = 'Dashboard HRD';
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
          <a href="/Kepegawaian/mastercuti" class="flex items-center px-4 py-2 text-slate-700 hover:bg-indigo-50 rounded-lg transition-colors hover:text-indigo-600">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span>Master Cuti</span>
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
    <!-- Header Dashboard -->
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
            <h1 class="text-2xl font-bold text-slate-800">Dashboard HRD</h1>
            <p class="text-sm text-slate-500">Selamat datang, <span class="font-medium text-indigo-600"><?= htmlspecialchars($user['nama'] ?? $user['username']) ?></span>!</p>
          </div>
        </div>
        <p class="text-sm text-slate-600">Ringkasan data dan aktivitas terkini sistem kepegawaian</p>
      </div>
      <div class="flex items-center gap-2 text-slate-600 bg-slate-50 px-4 py-2 rounded-lg">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <span class="text-sm font-medium"><?= date('d F Y') ?></span>
      </div>
    </div>
  </div>

  <!-- Stats Cards Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Total Karyawan -->
    <div class="bg-gradient-to-br from-indigo-600 to-cyan-500 text-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm font-medium text-indigo-100">Total Karyawan</p>
          <p class="text-3xl font-bold mt-2"><?= $stats['total_karyawan'] ?? 0 ?></p>
          <div class="flex items-center mt-3">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
            </svg>
            <span class="text-xs text-indigo-100">Aktif</span>
          </div>
        </div>
        <div class="p-3 bg-white/20 rounded-lg backdrop-blur-sm">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5 1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
          </svg>
        </div>
      </div>
    </div>

    <!-- Total Departemen -->
    <div class="bg-gradient-to-br from-emerald-500 to-teal-400 text-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm font-medium text-emerald-100">Total Departemen</p>
          <p class="text-3xl font-bold mt-2"><?= $stats['total_departemen'] ?? 0 ?></p>
          <div class="flex items-center mt-3">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path>
            </svg>
            <span class="text-xs text-emerald-100">Organisasi</span>
          </div>
        </div>
        <div class="p-3 bg-white/20 rounded-lg backdrop-blur-sm">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
          </svg>
        </div>
      </div>
    </div>

    <!-- Karyawan Baru -->
    <div class="bg-gradient-to-br from-amber-500 to-orange-400 text-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm font-medium text-amber-100">Karyawan Baru</p>
          <p class="text-3xl font-bold mt-2"><?= $stats['karyawan_baru'] ?? '0' ?></p>
          <div class="flex items-center mt-3">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
            </svg>
            <span class="text-xs text-amber-100">Bulan ini</span>
          </div>
        </div>
        <div class="p-3 bg-white/20 rounded-lg backdrop-blur-sm">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
          </svg>
        </div>
      </div>
    </div>

    <!-- Absensi Hari Ini -->
    <div class="bg-gradient-to-br from-purple-600 to-pink-500 text-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-sm font-medium text-purple-100">Absensi Hari Ini</p>
          <p class="text-3xl font-bold mt-2"><?= $stats['absensi_hari_ini'] ?? '0' ?>%</p>
          <div class="flex items-center mt-3">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <span class="text-xs text-purple-100">Kehadiran</span>
          </div>
        </div>
        <div class="p-3 bg-white/20 rounded-lg backdrop-blur-sm">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
          </svg>
        </div>
      </div>
    </div>
  </div>

  <!-- Pengajuan Cuti Section -->
  <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="p-6 border-b border-slate-100">
      <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
          <h2 class="text-lg font-semibold text-slate-800">Pengajuan Cuti</h2>
          <p class="text-sm text-slate-500">Status pengajuan cuti karyawan</p>
        </div>
        <a href="/Kepegawaian/pengajuancuti" class="inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-600 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors">
          Lihat Semua
          <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    </div>
    
    <div class="p-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Pending -->
        <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-xl p-6 border border-amber-200">
          <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-amber-500/10 rounded-lg">
              <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span class="text-sm font-medium text-amber-800 bg-amber-200 px-3 py-1 rounded-full">
              Menunggu
            </span>
          </div>
          <p class="text-sm text-amber-700">Pengajuan Pending</p>
          <p class="text-3xl font-bold text-amber-900 mt-2"><?= $stats['pengajuan_pending'] ?? 0 ?></p>
          <div class="mt-4 pt-4 border-t border-amber-200">
            <div class="flex items-center text-sm text-amber-600">
              <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
              </svg>
              Perlu review segera
            </div>
          </div>
        </div>

        <!-- Disetujui -->
        <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-xl p-6 border border-emerald-200">
          <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-emerald-500/10 rounded-lg">
              <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span class="text-sm font-medium text-emerald-800 bg-emerald-200 px-3 py-1 rounded-full">
              Selesai
            </span>
          </div>
          <p class="text-sm text-emerald-700">Pengajuan Disetujui</p>
          <p class="text-3xl font-bold text-emerald-900 mt-2"><?= $stats['pengajuan_disetujui'] ?? 0 ?></p>
          <div class="mt-4 pt-4 border-t border-emerald-200">
            <div class="flex items-center text-sm text-emerald-600">
              <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
              </svg>
              Telah diproses
            </div>
          </div>
        </div>

        <!-- Ditolak -->
        <div class="bg-gradient-to-br from-rose-50 to-rose-100 rounded-xl p-6 border border-rose-200">
          <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-rose-500/10 rounded-lg">
              <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span class="text-sm font-medium text-rose-800 bg-rose-200 px-3 py-1 rounded-full">
              Ditolak
            </span>
          </div>
          <p class="text-sm text-rose-700">Pengajuan Ditolak</p>
          <p class="text-3xl font-bold text-rose-900 mt-2"><?= $stats['pengajuan_ditolak'] ?? 0 ?></p>
          <div class="mt-4 pt-4 border-t border-rose-200">
            <div class="flex items-center text-sm text-rose-600">
              <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
              </svg>
              Perlu notifikasi
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Actions & Recent Activity -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Quick Actions -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-slate-100 p-6">
      <h3 class="text-lg font-semibold text-slate-800 mb-4">Aksi Cepat</h3>
      <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <a href="/Kepegawaian/karyawan/create" class="p-4 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors text-center group">
          <div class="p-2 bg-indigo-500 rounded-lg inline-block mb-2 group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
          </div>
          <p class="text-sm font-medium text-slate-700">Tambah Karyawan</p>
        </a>
      </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
      <h3 class="text-lg font-semibold text-slate-800 mb-4">Aktivitas Terbaru</h3>
      <div class="space-y-4">
        <div class="flex items-start gap-3 p-3 bg-slate-50 rounded-lg">
          <div class="p-2 bg-indigo-100 rounded">
            <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-700">Karyawan baru ditambahkan</p>
            <p class="text-xs text-slate-500">2 jam yang lalu</p>
          </div>
        </div>
        
        <div class="flex items-start gap-3 p-3 bg-slate-50 rounded-lg">
          <div class="p-2 bg-emerald-100 rounded">
            <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-700">Pengajuan cuti disetujui</p>
            <p class="text-xs text-slate-500">Hari ini, 10:30</p>
          </div>
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