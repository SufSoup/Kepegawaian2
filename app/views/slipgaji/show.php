<?php
$title = 'Detail Slip Gaji';
ob_start();
?>

<div class="max-w-3xl mx-auto space-y-4">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-lg font-semibold">Slip Gaji</h3>
                <p class="text-sm text-slate-500"><?= htmlspecialchars($slipGaji['Nama_Lengkap']) ?> — <?= date('F Y', mktime(0,0,0, $slipGaji['Bulan'], 1, $slipGaji['Tahun'])) ?></p>
            </div>
            <div class="flex items-center gap-2">
                <a href="/Kepegawaian/slipgaji" class="inline-flex items-center px-3 py-2 bg-slate-100 text-slate-700 rounded-md">Kembali</a>
                <button onclick="window.print()" class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white rounded-md">Cetak</button>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-2 gap-4">
                <div class="text-sm text-slate-600">Gaji Pokok</div>
                <div class="text-sm text-right font-medium">Rp <?= number_format($slipGaji['Gaji_Pokok'], 0, ',', '.') ?></div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="text-sm text-slate-600">Tunjangan Transportasi</div>
                <div class="text-sm text-right">Rp <?= number_format($slipGaji['Tunjangan_Transportasi'], 0, ',', '.') ?></div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="text-sm text-slate-600">Tunjangan Kesehatan</div>
                <div class="text-sm text-right">Rp <?= number_format($slipGaji['Tunjangan_Kesehatan'], 0, ',', '.') ?></div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="text-sm text-slate-600">Tunjangan Lainnya</div>
                <div class="text-sm text-right">Rp <?= number_format($slipGaji['Tunjangan_Lainnya'], 0, ',', '.') ?></div>
            </div>

            <div class="bg-slate-50 p-3 rounded-md grid grid-cols-2 gap-4">
                <div class="text-sm text-slate-700 font-medium">Total Penerimaan</div>
                <div class="text-sm text-right font-semibold">Rp <?= number_format($slipGaji['Total_Penerimaan'], 0, ',', '.') ?></div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="text-sm text-slate-600">Potongan Tetap</div>
                <div class="text-sm text-right">Rp <?= number_format($slipGaji['Potongan_Tetap'], 0, ',', '.') ?></div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="text-sm text-slate-600">Potongan Lainnya</div>
                <div class="text-sm text-right">Rp <?= number_format($slipGaji['Potongan_Lainnya'], 0, ',', '.') ?></div>
            </div>

            <div class="bg-slate-50 p-3 rounded-md grid grid-cols-2 gap-4">
                <div class="text-sm text-slate-700 font-medium">Total Potongan</div>
                <div class="text-sm text-right font-semibold">Rp <?= number_format($slipGaji['Total_Potongan'], 0, ',', '.') ?></div>
            </div>

            <div class="bg-emerald-50 p-4 rounded-md grid grid-cols-2 gap-4">
                <div class="text-base text-slate-800 font-semibold">Gaji Bersih</div>
                <div class="text-base text-right font-semibold text-emerald-800">Rp <?= number_format($slipGaji['Gaji_Bersih'], 0, ',', '.') ?></div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

