<?php
$title = 'Edit Pengajuan Cuti';
ob_start();
?>

<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <a href="/Kepegawaian/pengajuancuti" class="flex items-center gap-2 text-sm text-slate-600 hover:text-slate-800 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar Cuti
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Edit Pengajuan Cuti</h1>
        </div>
        <span class="px-3 py-1 bg-amber-100 text-amber-800 text-sm font-medium rounded-full">
            ID: <?= htmlspecialchars($pengajuan['ID_Cuti']) ?>
        </span>
    </div>

    <!-- Status Info -->
    <div class="mb-6 p-4 bg-slate-50 border border-slate-200 rounded-xl">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-white rounded-lg border border-slate-200">
                    <svg class="w-5 h-5 text-slate-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-slate-700">Status Saat Ini</h3>
                    <div class="flex items-center gap-3 mt-1">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= 
                            $pengajuan['Status_Pengajuan'] === 'Disetujui' ? 'bg-emerald-100 text-emerald-800' : 
                            ($pengajuan['Status_Pengajuan'] === 'Ditolak' ? 'bg-rose-100 text-rose-800' : 'bg-amber-100 text-amber-800') 
                        ?>">
                            <?= htmlspecialchars($pengajuan['Status_Pengajuan']) ?>
                        </span>
                        <?php if ($pengajuan['Status_Pengajuan'] !== 'Pending' && isset($pengajuan['Nama_Penyetuju'])): ?>
                            <span class="text-sm text-slate-600">Disetujui oleh: <?= htmlspecialchars($pengajuan['Nama_Penyetuju']) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="text-sm text-slate-500">
                Diajukan pada: <?= date('d/m/Y H:i', strtotime($pengajuan['Tgl_Pengajuan'])) ?>
            </div>
        </div>
    </div>

    <!-- Form Edit -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <form method="POST" action="/Kepegawaian/pengajuancuti/edit/<?= $pengajuan['ID_Cuti'] ?>" class="space-y-6">
            <?php if ($user['role'] === 'HRD'): ?>
                <!-- Pilih Karyawan -->
                <div class="space-y-2">
                    <label for="ID_Karyawan" class="block text-sm font-medium text-slate-700">
                        Pilih Karyawan
                        <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="ID_Karyawan" name="ID_Karyawan" required 
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all appearance-none bg-white">
                            <option value="">-- Pilih Karyawan --</option>
                            <?php foreach ($karyawans as $k): ?>
                                <option value="<?= $k['ID_Karyawan'] ?>" <?= $pengajuan['ID_Karyawan'] == $k['ID_Karyawan'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($k['Nama_Lengkap']) ?> (<?= htmlspecialchars($k['ID_Karyawan']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Status Pengajuan -->
                <div class="space-y-2">
                    <label for="Status_Pengajuan" class="block text-sm font-medium text-slate-700">
                        Status Pengajuan
                        <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="Status_Pengajuan" name="Status_Pengajuan" required 
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all appearance-none bg-white">
                            <option value="Pending" <?= $pengajuan['Status_Pengajuan'] === 'Pending' ? 'selected' : '' ?>>⏳ Pending</option>
                            <option value="Disetujui" <?= $pengajuan['Status_Pengajuan'] === 'Disetujui' ? 'selected' : '' ?>>✅ Disetujui</option>
                            <option value="Ditolak" <?= $pengajuan['Status_Pengajuan'] === 'Ditolak' ? 'selected' : '' ?>>❌ Ditolak</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Jenis Cuti -->
            <div class="space-y-2">
                <label for="ID_Master_Cuti" class="block text-sm font-medium text-slate-700">
                    Jenis Cuti
                    <span class="text-rose-500">*</span>
                </label>
                <div class="relative">
                    <select id="ID_Master_Cuti" name="ID_Master_Cuti" required 
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all appearance-none bg-white">
                        <option value="">-- Pilih Jenis Cuti --</option>
                        <?php foreach ($masterCutis as $mc): ?>
                            <option value="<?= $mc['ID_Master_Cuti'] ?>" <?= $pengajuan['ID_Master_Cuti'] == $mc['ID_Master_Cuti'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($mc['Nama_Cuti']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Tanggal Mulai & Selesai -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="Tgl_Mulai" class="block text-sm font-medium text-slate-700">
                        Tanggal Mulai
                        <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="date" id="Tgl_Mulai" name="Tgl_Mulai" required 
                               value="<?= !empty($pengajuan['Tgl_Awal']) ? date('Y-m-d', strtotime($pengajuan['Tgl_Awal'])) : '' ?>"
                               class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                        <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="Tgl_Selesai" class="block text-sm font-medium text-slate-700">
                        Tanggal Selesai
                        <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="date" id="Tgl_Selesai" name="Tgl_Selesai" required 
                               value="<?= !empty($pengajuan['Tgl_Akhir']) ? date('Y-m-d', strtotime($pengajuan['Tgl_Akhir'])) : '' ?>"
                               class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                        <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Keterangan -->
            <div class="space-y-2">
                <label for="Keterangan" class="block text-sm font-medium text-slate-700">
                    Keterangan / Alasan
                </label>
                <textarea id="Keterangan" name="Keterangan" rows="4"
                          class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all resize-none"><?= htmlspecialchars($pengajuan['Keterangan'] ?? '') ?></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                <a href="/Kepegawaian/pengajuancuti" 
                   class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors font-medium">
                    Batalkan
                </a>
                <button type="submit" 
                        class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white rounded-lg hover:from-indigo-700 hover:to-indigo-800 transition-all shadow-sm hover:shadow font-medium flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>