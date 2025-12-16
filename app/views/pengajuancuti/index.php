<?php
$title = 'Pengajuan Cuti';
ob_start();
?>

<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div class="flex items-center gap-4">
            <a href="/Kepegawaian/dashboard" 
               class="flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Dashboard
            </a>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Pengajuan Cuti</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola pengajuan cuti karyawan</p>
            </div>
        </div>
        
        <div class="flex flex-wrap items-center gap-2">
            <?php if ($user['role'] === 'Supervisor'): ?>
                <a href="/Kepegawaian/pengajuancuti/history" 
                   class="flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    History
                </a>
            <?php endif; ?>
            
            <?php if ($user['role'] === 'HRD'): ?>
                <a href="/Kepegawaian/pengajuancuti/delete-all" 
                   class="flex items-center gap-2 px-4 py-2.5 bg-rose-50 border border-rose-200 text-rose-700 rounded-lg hover:bg-rose-100 transition-colors font-medium"
                   onclick="return confirm('Yakin ingin menghapus semua pengajuan cuti? Tindakan ini tidak dapat dibatalkan!')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus Semua
                </a>
            <?php endif; ?>
            
            <?php if ($user['role'] === 'Karyawan'): ?>
                <a href="/Kepegawaian/pengajuancuti/create" 
                   class="flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white rounded-lg hover:from-indigo-700 hover:to-indigo-800 transition-all shadow-sm hover:shadow font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Ajukan Cuti Baru
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Total Pengajuan</p>
                    <p class="text-2xl font-bold text-slate-800 mt-1"><?= count($pengajuans) ?></p>
                </div>
                <div class="p-2 bg-indigo-50 rounded-lg">
                    <svg class="w-6 h-6 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Pending</p>
                    <?php 
                    $pending = array_filter($pengajuans, function($p) {
                        return ($p['Status_Pengajuan'] ?? '') === 'Pending';
                    });
                    ?>
                    <p class="text-2xl font-bold text-amber-600 mt-1"><?= count($pending) ?></p>
                </div>
                <div class="p-2 bg-amber-50 rounded-lg">
                    <svg class="w-6 h-6 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Total Hari</p>
                    <?php 
                    $totalHari = array_sum(array_column($pengajuans, 'Jumlah_Hari'));
                    ?>
                    <p class="text-2xl font-bold text-emerald-600 mt-1"><?= $totalHari ?></p>
                </div>
                <div class="p-2 bg-emerald-50 rounded-lg">
                    <svg class="w-6 h-6 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h3 class="text-lg font-semibold text-slate-800">Daftar Pengajuan Cuti</h3>
                    <p class="text-sm text-slate-500 mt-1">Kelola semua pengajuan cuti karyawan</p>
                </div>
                <div class="text-sm text-slate-500">
                    <?php if ($user['role'] === 'Karyawan' && isset($user['ID_Karyawan'])): ?>
                        ID Anda: <?= htmlspecialchars($user['ID_Karyawan']) ?>
                    <?php else: ?>
                        <?= count($pengajuans) ?> data ditemukan
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">No</th>
                        <?php if ($user['role'] !== 'Karyawan'): ?>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Karyawan</th>
                        <?php endif; ?>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Jenis Cuti</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Periode</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Hari</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Keterangan</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Penyetuju</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-100">
                    <?php if (empty($pengajuans)): ?>
                        <tr>
                            <td colspan="<?= $user['role'] === 'Karyawan' ? 8 : 9 ?>" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    <p class="text-slate-500">Tidak ada data pengajuan cuti</p>
                                    <?php if ($user['role'] === 'Karyawan'): ?>
                                        <a href="/Kepegawaian/pengajuancuti/create" class="mt-3 text-indigo-600 hover:text-indigo-700 font-medium">
                                            Ajukan cuti pertama Anda →
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 0; foreach ($pengajuans as $p): $no++; ?>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-slate-900"><?= $no ?></div>
                                </td>
                                <?php if ($user['role'] !== 'Karyawan'): ?>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center">
                                                <span class="text-sm font-medium text-indigo-600">
                                                    <?= substr($p['Nama_Lengkap'] ?? 'U', 0, 1) ?>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-slate-900"><?= htmlspecialchars($p['Nama_Lengkap'] ?? '-') ?></div>
                                                <div class="text-xs text-slate-500"><?= htmlspecialchars($p['ID_Karyawan'] ?? '') ?></div>
                                            </div>
                                        </div>
                                    </td>
                                <?php endif; ?>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-900"><?= htmlspecialchars($p['Nama_Cuti'] ?? '-') ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-900">
                                        <?= date('d/m/Y', strtotime($p['Tgl_Awal'] ?? '2000-01-01')) ?>
                                        <span class="text-slate-400 mx-1">→</span>
                                        <?= date('d/m/Y', strtotime($p['Tgl_Akhir'] ?? '2000-01-01')) ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-slate-900"><?= htmlspecialchars($p['Jumlah_Hari']) ?> hari</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-slate-900 max-w-xs truncate" title="<?= htmlspecialchars($p['Alasan'] ?? '-') ?>">
                                        <?= htmlspecialchars(substr($p['Alasan'] ?? '-', 0, 50)) ?>
                                        <?php if (strlen($p['Alasan'] ?? '') > 50): ?>...<?php endif; ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php
                                    $status = $p['Status_Pengajuan'] ?? 'Pending';
                                    $statusClasses = $status === 'Disetujui' ? 'bg-emerald-100 text-emerald-800' : 
                                                    ($status === 'Ditolak' ? 'bg-rose-100 text-rose-800' : 'bg-amber-100 text-amber-800');
                                    ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold <?= $statusClasses ?>">
                                        <?php if ($status === 'Disetujui'): ?>
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        <?php elseif ($status === 'Ditolak'): ?>
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        <?php else: ?>
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                            </svg>
                                        <?php endif; ?>
                                        <?= htmlspecialchars($status) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if ($p['Status_Pengajuan'] !== 'Pending' && isset($p['Nama_Penyetuju'])): ?>
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 bg-slate-100 rounded-full flex items-center justify-center">
                                                <span class="text-xs text-slate-600">
                                                    <?= substr($p['Nama_Penyetuju'] ?? 'U', 0, 1) ?>
                                                </span>
                                            </div>
                                            <div class="text-sm text-slate-900"><?= htmlspecialchars($p['Nama_Penyetuju'] ?? '-') ?></div>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-sm text-slate-400">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <?php if ($user['role'] === 'Supervisor' && $p['Status_Pengajuan'] === 'Pending'): ?>
                                            <a href="/Kepegawaian/pengajuancuti/approve/<?= $p['ID_Cuti'] ?>" 
                                               class="inline-flex items-center px-3 py-1.5 bg-emerald-50 text-emerald-700 rounded-lg hover:bg-emerald-100 transition-colors text-sm font-medium"
                                               onclick="return confirm('Setujui pengajuan cuti ini?')">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                                Setujui
                                            </a>
                                            <a href="/Kepegawaian/pengajuancuti/reject/<?= $p['ID_Cuti'] ?>" 
                                               class="inline-flex items-center px-3 py-1.5 bg-rose-50 text-rose-700 rounded-lg hover:bg-rose-100 transition-colors text-sm font-medium"
                                               onclick="return confirm('Tolak pengajuan cuti ini?')">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                                Tolak
                                            </a>
                                        <?php endif; ?>

                                        <?php if ($user['role'] === 'Karyawan' && $p['Status_Pengajuan'] === 'Pending'): ?>
                                            <a href="/Kepegawaian/pengajuancuti/edit/<?= $p['ID_Cuti'] ?>" 
                                               class="inline-flex items-center px-3 py-1.5 bg-amber-50 text-amber-700 rounded-lg hover:bg-amber-100 transition-colors text-sm font-medium">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>
                                        <?php endif; ?>

                                        <?php if (($user['role'] === 'Karyawan' && $p['Status_Pengajuan'] === 'Pending') || ($user['role'] !== 'Karyawan')): ?>
                                            <a href="/Kepegawaian/pengajuancuti/delete/<?= $p['ID_Cuti'] ?>" 
                                               class="inline-flex items-center px-3 py-1.5 bg-rose-50 text-rose-700 rounded-lg hover:bg-rose-100 transition-colors text-sm font-medium"
                                               onclick="return confirm('Yakin ingin menghapus pengajuan cuti ini?')">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Hapus
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <?php if (!empty($pengajuans)): ?>
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="text-sm text-slate-500">
                        Menampilkan <span class="font-medium"><?= count($pengajuans) ?></span> pengajuan cuti
                    </div>
                    <div class="text-sm text-slate-500">
                        <?php 
                        $pendingCount = count(array_filter($pengajuans, function($p) {
                            return ($p['Status_Pengajuan'] ?? '') === 'Pending';
                        }));
                        ?>
                        <span class="inline-flex items-center">
                            <span class="w-2 h-2 bg-amber-400 rounded-full mr-2"></span>
                            <?= $pendingCount ?> pending
                        </span>
                        <span class="mx-2">•</span>
                        <?php 
                        $approvedCount = count(array_filter($pengajuans, function($p) {
                            return ($p['Status_Pengajuan'] ?? '') === 'Disetujui';
                        }));
                        ?>
                        <span class="inline-flex items-center">
                            <span class="w-2 h-2 bg-emerald-400 rounded-full mr-2"></span>
                            <?= $approvedCount ?> disetujui
                        </span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>