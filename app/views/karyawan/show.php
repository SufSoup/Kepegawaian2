<?php
$title = 'Detail Karyawan';
ob_start();
?>

<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-4">
            <a href="/Kepegawaian/karyawan" class="p-2 rounded-lg hover:bg-slate-100 transition-colors">
                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Detail Karyawan</h1>
            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-sm font-medium rounded-full">
                ID: <?= htmlspecialchars($karyawan['ID_Karyawan']) ?>
            </span>
        </div>
        <p class="text-slate-600">Informasi lengkap karyawan</p>
    </div>

    <!-- Profile Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Profile Header -->
        <div class="px-8 py-6 border-b border-slate-100 bg-gradient-to-r from-indigo-50 to-slate-50">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="h-20 w-20 rounded-full bg-gradient-to-r from-indigo-500 to-cyan-500 flex items-center justify-center text-white font-bold text-2xl">
                        <?= htmlspecialchars(substr($karyawan['Nama_Lengkap'], 0, 1)) ?>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-800"><?= htmlspecialchars($karyawan['Nama_Lengkap']) ?></h2>
                        <div class="flex items-center gap-3 mt-1">
                            <span class="text-sm text-slate-600"><?= htmlspecialchars($karyawan['Email_Kantor']) ?></span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-<?= $karyawan['Status_Kerja'] === 'Aktif' ? 'emerald' : 'rose' ?>-100 text-<?= $karyawan['Status_Kerja'] === 'Aktif' ? 'emerald' : 'rose' ?>-800">
                                <?= htmlspecialchars($karyawan['Status_Kerja']) ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="/Kepegawaian/karyawan" class="inline-flex items-center px-4 py-2 text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                    <a href="/Kepegawaian/karyawan/edit/<?= $karyawan['ID_Karyawan'] ?>" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                </div>
            </div>
        </div>

        <!-- Profile Content -->
        <div class="p-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Personal Info -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Personal Information Card -->
                    <div class="bg-slate-50 rounded-xl p-6 border border-slate-200">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="p-2 bg-indigo-100 rounded-lg">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-slate-800">Informasi Pribadi</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-500">Nama Lengkap</label>
                                <div class="p-3 bg-white rounded-lg border border-slate-200">
                                    <p class="font-medium text-slate-800"><?= htmlspecialchars($karyawan['Nama_Lengkap']) ?></p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-500">Tanggal Lahir</label>
                                <div class="p-3 bg-white rounded-lg border border-slate-200">
                                    <p class="font-medium text-slate-800"><?= date('d F Y', strtotime($karyawan['Tgl_Lahir'])) ?></p>
                                </div>
                            </div>
                            <div class="md:col-span-2 space-y-2">
                                <label class="block text-sm font-medium text-slate-500">Email Kantor</label>
                                <div class="p-3 bg-white rounded-lg border border-slate-200">
                                    <p class="font-medium text-slate-800"><?= htmlspecialchars($karyawan['Email_Kantor']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Work Information Card -->
                    <div class="bg-slate-50 rounded-xl p-6 border border-slate-200">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="p-2 bg-indigo-100 rounded-lg">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-slate-800">Informasi Pekerjaan</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-500">Departemen</label>
                                <div class="p-3 bg-white rounded-lg border border-slate-200">
                                    <p class="font-medium text-slate-800"><?= htmlspecialchars($karyawan['Nama_Departemen'] ?? '-') ?></p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-500">Tanggal Masuk</label>
                                <div class="p-3 bg-white rounded-lg border border-slate-200">
                                    <p class="font-medium text-slate-800"><?= date('d F Y', strtotime($karyawan['Tgl_Masuk'])) ?></p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-500">Role</label>
                                <div class="p-3 bg-white rounded-lg border border-slate-200">
                                    <p class="font-medium text-slate-800"><?= htmlspecialchars($karyawan['Role'] ?? 'Karyawan') ?></p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-500">Status Kerja</label>
                                <div class="p-3 bg-white rounded-lg border border-slate-200">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-<?= $karyawan['Status_Kerja'] === 'Aktif' ? 'emerald' : 'rose' ?>-100 text-<?= $karyawan['Status_Kerja'] === 'Aktif' ? 'emerald' : 'rose' ?>-800">
                                        <?= htmlspecialchars($karyawan['Status_Kerja']) ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Address Card -->
                <div class="space-y-6">
                    <!-- Address Card -->
                    <div class="bg-slate-50 rounded-xl p-6 border border-slate-200">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="p-2 bg-indigo-100 rounded-lg">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-slate-800">Alamat</h3>
                        </div>
                        <div class="space-y-3">
                            <div class="p-4 bg-white rounded-lg border border-slate-200 min-h-[120px]">
                                <p class="text-slate-700"><?= htmlspecialchars($karyawan['Alamat'] ?? 'Tidak ada alamat') ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="bg-slate-50 rounded-xl p-6 border border-slate-200">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="p-2 bg-indigo-100 rounded-lg">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-slate-800">Statistik</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-slate-200">
                                <span class="text-sm text-slate-600">Masa Kerja</span>
                                <span class="font-medium text-slate-800">
                                    <?php
                                        $masaKerja = date_diff(date_create($karyawan['Tgl_Masuk']), date_create('now'));
                                        echo $masaKerja->y . ' tahun ' . $masaKerja->m . ' bulan';
                                    ?>
                                </span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-slate-200">
                                <span class="text-sm text-slate-600">Usia</span>
                                <span class="font-medium text-slate-800">
                                    <?php
                                        $usia = date_diff(date_create($karyawan['Tgl_Lahir']), date_create('now'));
                                        echo $usia->y . ' tahun';
                                    ?>
                                </span>
                            </div>
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