<?php
$title = 'Tambah Pengajuan Cuti';
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
            <h1 class="text-2xl font-bold text-slate-800">Tambah Pengajuan Cuti</h1>
        </div>
        <?php if ($user['role'] === 'Karyawan'): ?>
            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-sm font-medium rounded-full">
                ID: <?= htmlspecialchars($user['ID_Karyawan'] ?? '') ?>
            </span>
        <?php endif; ?>
    </div>

    <!-- Info Jatah Cuti -->
    <?php if ($user['role'] === 'Karyawan' && $cutiInfo): ?>
        <div class="mb-6 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-100 rounded-xl shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-slate-700">Informasi Jatah Cuti Anda</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="text-center p-3 bg-white rounded-lg border border-blue-100">
                    <div class="text-xs text-slate-500 mb-1">Total Disetujui</div>
                    <div class="text-2xl font-bold text-blue-600"><?= $cutiInfo['total_disetujui'] ?></div>
                    <div class="text-xs text-slate-500">hari</div>
                </div>
                <div class="text-center p-3 bg-white rounded-lg border border-green-100">
                    <div class="text-xs text-slate-500 mb-1">Sisa Jatah</div>
                    <div class="text-2xl font-bold text-green-600"><?= $cutiInfo['sisa_jatah'] ?></div>
                    <div class="text-xs text-slate-500">hari</div>
                </div>
                <div class="text-center p-3 bg-white rounded-lg border border-amber-100">
                    <div class="text-xs text-slate-500 mb-1">Maksimal Per Tahun</div>
                    <div class="text-2xl font-bold text-amber-600"><?= $cutiInfo['maksimal'] ?></div>
                    <div class="text-xs text-slate-500">hari</div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Form Pengajuan -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <form method="POST" action="/Kepegawaian/pengajuancuti/create" class="space-y-6">
            <?php if ($user['role'] === 'HRD'): ?>
                <!-- Pilih Karyawan (HRD Only) -->
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
                                <option value="<?= $k['ID_Karyawan'] ?>"><?= htmlspecialchars($k['Nama_Lengkap']) ?> (<?= htmlspecialchars($k['ID_Karyawan']) ?>)</option>
                            <?php endforeach; ?>
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
                            <option value="<?= $mc['ID_Master_Cuti'] ?>"><?= htmlspecialchars($mc['Nama_Cuti']) ?></option>
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
                          placeholder="Jelaskan alasan pengajuan cuti Anda secara detail..."
                          class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all resize-none"></textarea>
                <p class="text-xs text-slate-500">Maksimal 500 karakter</p>
            </div>

            <!-- Warning Box -->
            <div class="p-4 bg-amber-50 border border-amber-200 rounded-lg">
                <div class="flex items-start gap-3">
                    <div class="p-1 bg-amber-100 rounded">
                        <svg class="w-5 h-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-amber-800">Perhatian Penting</h4>
                        <p class="text-sm text-amber-700 mt-1">
                            Jika total pengajuan cuti Anda melebihi 30 hari dalam satu tahun, pengajuan akan otomatis ditolak oleh sistem.
                            Pastikan sisa jatah cuti Anda mencukupi sebelum mengajukan.
                        </p>
                    </div>
                </div>
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
                    Ajukan Cuti
                </button>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>