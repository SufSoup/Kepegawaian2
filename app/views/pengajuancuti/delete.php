<?php
$title = 'Hapus Pengajuan Cuti';
ob_start();
?>

<div class="max-w-md mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <a href="/Kepegawaian/pengajuancuti" class="flex items-center gap-2 text-sm text-slate-600 hover:text-slate-800 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <!-- Confirmation Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Warning Header -->
        <div class="bg-rose-50 px-6 py-4 border-b border-rose-100">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-rose-100 rounded-lg">
                    <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.342 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-rose-800">Hapus Pengajuan Cuti</h2>
                    <p class="text-sm text-rose-600">Tindakan ini tidak dapat dibatalkan</p>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <p class="text-slate-600 mb-6">Anda akan menghapus pengajuan cuti berikut:</p>

            <!-- Detail Information -->
            <div class="space-y-4 mb-6">
                <div class="flex items-center justify-between py-3 border-b border-slate-100">
                    <span class="text-sm font-medium text-slate-500">ID Pengajuan</span>
                    <span class="font-semibold"><?= htmlspecialchars($pengajuan['ID_Cuti']) ?></span>
                </div>
                
                <div class="flex items-center justify-between py-3 border-b border-slate-100">
                    <span class="text-sm font-medium text-slate-500">Nama Karyawan</span>
                    <span class="font-semibold"><?= htmlspecialchars($pengajuan['Nama_Lengkap']) ?></span>
                </div>
                
                <div class="flex items-center justify-between py-3 border-b border-slate-100">
                    <span class="text-sm font-medium text-slate-500">Tanggal</span>
                    <span class="font-semibold">
                        <?= date('d/m/Y', strtotime($pengajuan['Tgl_Awal'])) ?> - <?= date('d/m/Y', strtotime($pengajuan['Tgl_Akhir'])) ?>
                    </span>
                </div>
                
                <div class="flex items-center justify-between py-3 border-b border-slate-100">
                    <span class="text-sm font-medium text-slate-500">Durasi</span>
                    <span class="font-semibold"><?= htmlspecialchars($pengajuan['Jumlah_Hari']) ?> hari</span>
                </div>
                
                <div class="flex items-center justify-between py-3">
                    <span class="text-sm font-medium text-slate-500">Status</span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= 
                        $pengajuan['Status_Pengajuan'] === 'Disetujui' ? 'bg-emerald-100 text-emerald-800' : 
                        ($pengajuan['Status_Pengajuan'] === 'Ditolak' ? 'bg-rose-100 text-rose-800' : 'bg-amber-100 text-amber-800') 
                    ?>">
                        <?= htmlspecialchars($pengajuan['Status_Pengajuan']) ?>
                    </span>
                </div>
            </div>

            <!-- Warning Message -->
            <div class="p-4 bg-amber-50 border border-amber-200 rounded-lg mb-6">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-amber-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <div class="text-sm text-amber-700">
                        <strong>Perhatian:</strong> Data yang telah dihapus tidak dapat dikembalikan. Pastikan ini adalah pengajuan yang benar sebelum melanjutkan.
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form method="POST" action="/Kepegawaian/pengajuancuti/delete/<?= $pengajuan['ID_Cuti'] ?>">
                <div class="flex items-center justify-between">
                    <a href="/Kepegawaian/pengajuancuti" 
                       class="px-5 py-2.5 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors font-medium">
                        Batalkan
                    </a>
                    <button type="submit" 
                            class="px-6 py-2.5 bg-gradient-to-r from-rose-600 to-rose-700 text-white rounded-lg hover:from-rose-700 hover:to-rose-800 transition-all shadow-sm hover:shadow font-medium flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Ya, Hapus
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