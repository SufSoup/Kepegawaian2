<?php
$title = 'Data Karyawan';
ob_start();
?>

<?php if ($user['role'] === 'Karyawan' && !empty($karyawans)): ?>
    <?php $karyawan = $karyawans[0]; ?>
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-4">
                <a href="/Kepegawaian/dashboard" class="p-2 rounded-lg hover:bg-slate-100 transition-colors">
                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <h1 class="text-2xl font-bold text-slate-800">Profil Karyawan</h1>
            </div>
        </div>

        <!-- Profile Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <!-- Profile Header -->
            <div class="px-8 py-6 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="h-20 w-20 rounded-full bg-gradient-to-r from-indigo-500 to-cyan-500 flex items-center justify-center text-white font-bold text-2xl">
                            <?= htmlspecialchars(substr($karyawan['Nama_Lengkap'], 0, 1)) ?>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-slate-800"><?= htmlspecialchars($karyawan['Nama_Lengkap']) ?></h2>
                            <div class="flex items-center gap-3 mt-1">
                                <span class="text-sm text-slate-600">ID: <?= htmlspecialchars($karyawan['ID_Karyawan']) ?></span>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-<?= $karyawan['Status_Kerja'] === 'Aktif' ? 'emerald' : 'rose' ?>-100 text-<?= $karyawan['Status_Kerja'] === 'Aktif' ? 'emerald' : 'rose' ?>-800">
                                    <?= htmlspecialchars($karyawan['Status_Kerja']) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <a href="/Kepegawaian/karyawan/edit/<?= $karyawan['ID_Karyawan'] ?>" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Profil
                    </a>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Personal Info Card -->
                    <div class="bg-slate-50 rounded-xl p-5 border border-slate-200">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-2 bg-indigo-100 rounded-lg">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="font-medium text-slate-800">Informasi Pribadi</h3>
                        </div>
                        <div class="space-y-3">
                            <div>
                                <p class="text-xs text-slate-500">Tanggal Lahir</p>
                                <p class="font-medium text-slate-800"><?= date('d F Y', strtotime($karyawan['Tgl_Lahir'])) ?></p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Email Kantor</p>
                                <p class="font-medium text-slate-800"><?= htmlspecialchars($karyawan['Email_Kantor']) ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Work Info Card -->
                    <div class="bg-slate-50 rounded-xl p-5 border border-slate-200">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-2 bg-indigo-100 rounded-lg">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h3 class="font-medium text-slate-800">Informasi Pekerjaan</h3>
                        </div>
                        <div class="space-y-3">
                            <div>
                                <p class="text-xs text-slate-500">Departemen</p>
                                <p class="font-medium text-slate-800"><?= htmlspecialchars($karyawan['Nama_Departemen'] ?? '-') ?></p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Tanggal Masuk</p>
                                <p class="font-medium text-slate-800"><?= date('d F Y', strtotime($karyawan['Tgl_Masuk'])) ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Address Card -->
                    <div class="md:col-span-2 lg:col-span-1 bg-slate-50 rounded-xl p-5 border border-slate-200">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-2 bg-indigo-100 rounded-lg">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h3 class="font-medium text-slate-800">Alamat</h3>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 mb-2">Alamat Lengkap</p>
                            <p class="font-medium text-slate-800"><?= htmlspecialchars($karyawan['Alamat'] ?? 'Tidak ada alamat') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>

<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Data Karyawan</h1>
            <p class="text-slate-600 mt-1">Daftar semua karyawan perusahaan</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="/Kepegawaian/dashboard" class="inline-flex items-center px-4 py-2.5 text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors duration-200 font-medium">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Dashboard
            </a>
            <?php if ($user['role'] === 'HRD'): ?>
                <a href="/Kepegawaian/karyawan/create" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-medium rounded-lg hover:from-indigo-700 hover:to-indigo-600 focus:ring-2 focus:ring-indigo-300 focus:ring-offset-2 transition-all duration-200 shadow-sm hover:shadow">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Karyawan
                </a>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($user['role'] !== 'Karyawan'): ?>
        <!-- Filter Section -->

    <?php endif; ?>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white">
            <h2 class="text-lg font-semibold text-slate-800">Daftar Karyawan</h2>
            <p class="text-sm text-slate-500 mt-1">Total: <span class="font-medium"><?= count($karyawans) ?></span> karyawan</p>
        </div>

        <?php if (empty($karyawans)): ?>
            <div class="p-12 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-slate-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5 1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-slate-700 mb-2">Belum ada karyawan</h3>
                <p class="text-slate-500">Data karyawan akan muncul di sini setelah ditambahkan</p>
                <?php if ($user['role'] === 'HRD'): ?>
                    <a href="/Kepegawaian/karyawan/create" class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors mt-4">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Karyawan Pertama
                    </a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead>
                        <tr class="bg-slate-50">
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Karyawan</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Departemen</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Tanggal Masuk</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php $no = 1; foreach ($karyawans as $karyawan): ?>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center justify-center w-8 h-8 bg-slate-100 text-slate-700 rounded-full text-sm font-medium">
                                    <?= $no++ ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-r from-indigo-500 to-cyan-500 flex items-center justify-center text-white font-medium text-sm">
                                        <?= htmlspecialchars(substr($karyawan['Nama_Lengkap'], 0, 1)) ?>
                                    </div>
                                    <div>
                                        <p class="font-medium text-slate-800"><?= htmlspecialchars($karyawan['Nama_Lengkap']) ?></p>
                                        <p class="text-xs text-slate-500">ID: <?= htmlspecialchars($karyawan['ID_Karyawan']) ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-slate-800"><?= htmlspecialchars($karyawan['Nama_Departemen'] ?? '-') ?></p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-slate-700"><?= htmlspecialchars($karyawan['Email_Kantor']) ?></p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="text-sm text-slate-800"><?= date('d/m/Y', strtotime($karyawan['Tgl_Masuk'])) ?></p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-<?= $karyawan['Status_Kerja'] === 'Aktif' ? 'emerald' : 'rose' ?>-100 text-<?= $karyawan['Status_Kerja'] === 'Aktif' ? 'emerald' : 'rose' ?>-800">
                                    <?= htmlspecialchars($karyawan['Status_Kerja']) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <a href="/Kepegawaian/karyawan/show/<?= $karyawan['ID_Karyawan'] ?>" class="inline-flex items-center px-3 py-1.5 text-sm text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Lihat
                                    </a>
                                    <?php if ($user['role'] === 'HRD' || $user['karyawan_id'] == $karyawan['ID_Karyawan']): ?>
                                    <a href="/Kepegawaian/karyawan/edit/<?= $karyawan['ID_Karyawan'] ?>" class="inline-flex items-center px-3 py-1.5 text-sm text-indigo-700 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition-colors">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </a>
                                    <?php endif; ?>
                                    <?php if ($user['role'] === 'HRD'): ?>
                                    <a href="/Kepegawaian/karyawan/delete/<?= $karyawan['ID_Karyawan'] ?>" class="inline-flex items-center px-3 py-1.5 text-sm text-rose-700 bg-rose-50 hover:bg-rose-100 rounded-lg transition-colors" onclick="return confirm('Yakin ingin menghapus?')">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Footer with Summary -->
            <div class="px-6 py-4 border-t border-slate-100 bg-slate-50">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <p class="text-sm text-slate-600">
                        Menampilkan <span class="font-medium"><?= count($karyawans) ?></span> dari <span class="font-medium"><?= count($karyawans) ?></span> karyawan
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="text-sm text-slate-600">
                            <?php 
                                $aktifCount = array_filter($karyawans, fn($k) => $k['Status_Kerja'] === 'Aktif');
                                echo "Aktif: <span class='font-medium'>" . count($aktifCount) . "</span>";
                            ?>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-slate-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Update: <?= date('H:i') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>