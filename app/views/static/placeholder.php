<?php
$title = $title ?? 'Placeholder';
ob_start();
?>

<div class="max-w-2xl mx-auto mt-8">
  <div class="bg-white rounded-xl shadow p-6 text-center">
    <h1 class="text-2xl font-semibold text-slate-800 mb-2"><?= htmlspecialchars($title) ?></h1>
    <p class="text-slate-600"><?= htmlspecialchars($message ?? 'Halaman ini belum tersedia.') ?></p>
    <div class="mt-6">
      <a href="/Kepegawaian/dashboard" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Kembali ke Dashboard</a>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>
