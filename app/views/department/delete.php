<?php
$title = 'Konfirmasi Hapus Departemen';
ob_start();
?>

<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-2">
            <a href="/Kepegawaian/department" class="p-2 rounded-lg hover:bg-slate-100 transition-colors">
                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Konfirmasi Hapus</h1>
        </div>
        <p class="text-slate-600">Tinjau informasi departemen sebelum menghapus</p>
    </div>

    <!-- Warning Card -->
    <div class="mb-6 rounded-xl bg-gradient-to-r from-amber-50 to-orange-50 border border-amber-200 p-5">
        <div class="flex items-start">
            <div class="p-2 bg-amber-500 rounded-lg mr-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.998-.833-2.732 0L4.346 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-amber-800">Peringatan!</h3>
                <p class="text-sm text-amber-700 mt-1">Departemen yang memiliki karyawan tidak dapat dihapus. Pastikan tidak ada karyawan yang terhubung dengan departemen ini sebelum melanjutkan.</p>
            </div>
        </div>
    </div>

    <!-- Department Info Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-8 py-6 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white">
            <h2 class="text-lg font-semibold text-slate-800">Detail Departemen</h2>
            <p class="text-sm text-slate-500 mt-1">Informasi departemen yang akan dihapus</p>
        </div>

        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- ID Departemen -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-slate-500">ID Departemen</label>
                    <div class="p-3 bg-slate-50 rounded-lg border border-slate-200">
                        <p class="font-mono font-medium text-slate-800"><?= htmlspecialchars($department['ID_Departemen']) ?></p>
                    </div>
                </div>

                <!-- Nama Jabatan -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-slate-500">Nama Jabatan</label>
                    <div class="p-3 bg-slate-50 rounded-lg border border-slate-200">
                        <p class="font-medium text-slate-800"><?= htmlspecialchars($department['Jabatan']) ?></p>
                    </div>
                </div>

                <!-- Keterangan -->
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-sm font-medium text-slate-500">Keterangan</label>
                    <div class="p-3 bg-slate-50 rounded-lg border border-slate-200 min-h-[100px]">
                        <p class="text-slate-700"><?= htmlspecialchars($department['Keterangan'] ?? 'Tidak ada keterangan') ?></p>
                    </div>
                </div>

                <!-- Jumlah Karyawan (if available) -->
                <?php if (isset($department['Jumlah_Karyawan'])): ?>
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-sm font-medium text-slate-500">Jumlah Karyawan</label>
                    <div class="p-3 bg-slate-50 rounded-lg border border-slate-200">
                        <div class="flex items-center">
                            <div class="p-2 bg-<?= $department['Jumlah_Karyawan'] > 0 ? 'amber' : 'emerald' ?>-100 rounded-lg mr-3">
                                <svg class="w-5 h-5 text-<?= $department['Jumlah_Karyawan'] > 0 ? 'amber' : 'emerald' ?>-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5 1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-slate-800"><?= htmlspecialchars($department['Jumlah_Karyawan']) ?></p>
                                <p class="text-sm text-slate-500">Karyawan terdaftar</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Action Buttons -->
            <form method="POST" action="/Kepegawaian/department/delete/<?= $department['ID_Departemen'] ?>">
                <div class="flex items-center justify-between pt-8 mt-8 border-t border-slate-100">
                    <a href="/Kepegawaian/department" class="inline-flex items-center px-5 py-2.5 text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors duration-200 font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Batalkan
                    </a>
                    <button 
                        type="submit" 
                        class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-rose-600 to-rose-500 text-white font-medium rounded-lg hover:from-rose-700 hover:to-rose-600 focus:ring-2 focus:ring-rose-300 focus:ring-offset-2 transition-all duration-200 shadow-sm hover:shadow"
                        <?= isset($department['Jumlah_Karyawan']) && $department['Jumlah_Karyawan'] > 0 ? 'disabled' : '' ?>
                    >
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        <?= isset($department['Jumlah_Karyawan']) && $department['Jumlah_Karyawan'] > 0 ? 'Tidak Dapat Dihapus' : 'Ya, Hapus Departemen' ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>