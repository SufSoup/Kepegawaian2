<?php
$title = 'Hapus Master Cuti';
ob_start();
?>

<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-rose-50 to-rose-100 p-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-rose-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-rose-800">Hapus Master Cuti</h2>
                    <p class="text-rose-600">Konfirmasi penghapusan data</p>
                </div>
            </div>
            <a href="/Kepegawaian/mastercuti" class="text-slate-600 hover:text-slate-800 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>
    </div>

    <div class="p-8">
        <div class="bg-rose-50 border border-rose-100 rounded-lg p-6 mb-8">
            <div class="flex items-center gap-3 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.998-.833-2.732 0L4.204 16.5c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
                <p class="text-lg font-semibold text-rose-700">Peringatan!</p>
            </div>
            <p class="text-rose-600 mb-2">Apakah Anda yakin ingin menghapus master cuti ini?</p>
            <p class="text-sm text-rose-500">Data yang sudah dihapus tidak dapat dikembalikan.</p>
        </div>

        <div class="bg-slate-50 rounded-xl p-6 mb-8">
            <h3 class="font-medium text-slate-700 mb-4">Detail Master Cuti</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-slate-500 mb-1">ID Master Cuti</p>
                    <p class="font-medium text-slate-800"><?= htmlspecialchars($masterCuti['ID_Master_Cuti']) ?></p>
                </div>
                <div>
                    <p class="text-sm text-slate-500 mb-1">Nama Cuti</p>
                    <p class="font-medium text-slate-800"><?= htmlspecialchars($masterCuti['Nama_Cuti']) ?></p>
                </div>
                <div>
                    <p class="text-sm text-slate-500 mb-1">Tipe Cuti</p>
                    <p class="font-medium text-slate-800"><?= htmlspecialchars($masterCuti['Tipe_Cuti']) ?></p>
                </div>
                <div>
                    <p class="text-sm text-slate-500 mb-1">Jumlah Hari</p>
                    <p class="font-medium text-slate-800"><?= htmlspecialchars($masterCuti['Jumlah_Hari'] ?? '-') ?> hari</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500 mb-1">Status</p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= ($masterCuti['Status'] ?? 'Aktif') === 'Aktif' ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' ?>">
                        <?= htmlspecialchars($masterCuti['Status'] ?? 'Aktif') ?>
                    </span>
                </div>
            </div>
        </div>

        <form method="POST" action="/Kepegawaian/mastercuti/delete/<?= $masterCuti['ID_Master_Cuti'] ?>">
            <div class="flex justify-between items-center pt-6 border-t border-slate-200">
                <a href="/Kepegawaian/mastercuti" 
                    class="inline-flex items-center gap-2 px-6 py-3 text-slate-700 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-colors duration-200 border border-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Batalkan
                </a>
                <button type="submit" 
                    class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-rose-600 to-rose-700 text-white font-medium rounded-lg hover:from-rose-700 hover:to-rose-800 focus:ring-2 focus:ring-rose-300 focus:ring-opacity-50 transition-all duration-200 shadow-sm hover:shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    Ya, Hapus Data
                </button>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>