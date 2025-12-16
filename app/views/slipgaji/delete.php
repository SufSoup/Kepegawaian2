<?php
$title = 'Hapus Slip Gaji';
ob_start();
?>

<div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-6">
  <div class="flex items-center justify-between mb-4">
    <h2 class="text-lg font-semibold text-rose-600">Hapus Slip Gaji</h2>
    <a href="/Kepegawaian/slipgaji" class="text-sm text-slate-500 hover:underline">← Kembali</a>
  </div>

  <p class="text-sm text-slate-600 mb-4">Apakah Anda yakin ingin menghapus slip gaji berikut?</p>

  <div class="grid grid-cols-2 gap-4 mb-4">
    <div class="text-sm text-slate-500">ID</div>
    <div class="font-medium"><?= htmlspecialchars($slipGaji['ID_Slip']) ?></div>
    <div class="text-sm text-slate-500">Nama Karyawan</div>
    <div class="font-medium"><?= htmlspecialchars($slipGaji['Nama_Lengkap']) ?></div>
    <div class="text-sm text-slate-500">Periode</div>
    <div class="font-medium"><?= date('F Y', mktime(0, 0, 0, $slipGaji['Bulan'], 1, $slipGaji['Tahun'])) ?></div>
  </div>

  <form method="POST" action="/Kepegawaian/slipgaji/delete/<?= $slipGaji['ID_Slip'] ?>">
    <div class="flex justify-between">
      <a href="/Kepegawaian/slipgaji" class="inline-flex items-center px-3 py-2 bg-slate-100 text-slate-700 rounded-md">Batal</a>
      <button type="submit" class="inline-flex items-center px-4 py-2 bg-rose-600 text-white rounded-md">Ya, Hapus</button>
    </div>
  </form>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

