<?php
$title = 'Slip Gaji';
ob_start();
?>

<div class="flex items-center justify-between mb-4">
    <div class="flex items-center gap-3">
        <a href="/Kepegawaian/dashboard" class="inline-flex items-center px-3 py-2 bg-slate-100 text-slate-700 rounded-md">← Kembali</a>
        <h3 class="text-lg font-semibold">Halaman Slip Gaji</h3>
    </div>
    <?php if ($user['role'] === 'HRD'): ?>
        <a href="/Kepegawaian/slipgaji/create" class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white rounded-md">Tambah Slip Gaji</a>
    <?php endif; ?>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="w-full overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500">ID</th>
                    <?php if ($user['role'] === 'HRD'): ?>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500">Nama Karyawan</th>
                    <?php endif; ?>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500">Periode</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500">Gaji Pokok</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500">Gaji Bersih</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-100">
                <?php if (empty($slipGajis)): ?>
                    <tr>
                        <td colspan="<?= $user['role'] === 'HRD' ? '6' : '5' ?>" class="px-4 py-6 text-center text-slate-500">Tidak ada data slip gaji</td>
                    </tr>
                <?php else: ?>
                    <?php $no = 0; foreach ($slipGajis as $sg): $no++; ?>
                        <tr>
                            <td class="px-4 py-3 text-sm"><?= $no ?></td>
                            <?php if ($user['role'] === 'HRD'): ?>
                                <td class="px-4 py-3 text-sm"><?= htmlspecialchars($sg['Nama_Lengkap']) ?></td>
                            <?php endif; ?>
                            <td class="px-4 py-3 text-sm"><?= date('F Y', mktime(0, 0, 0, $sg['Bulan'], 1, $sg['Tahun'])) ?></td>
                            <td class="px-4 py-3 text-sm">Rp <?= number_format($sg['Gaji_Pokok'], 0, ',', '.') ?></td>
                            <td class="px-4 py-3 text-sm">Rp <?= number_format($sg['Gaji_Bersih'], 0, ',', '.') ?></td>
                            <td class="px-4 py-3 text-sm space-x-2">
                                <a href="/Kepegawaian/slipgaji/show/<?= $sg['ID_Slip'] ?>" class="inline-flex items-center px-2 py-1 bg-indigo-50 text-indigo-700 rounded">Lihat</a>
                                <?php if ($user['role'] === 'HRD'): ?>
                                    <a href="/Kepegawaian/slipgaji/edit/<?= $sg['ID_Slip'] ?>" class="inline-flex items-center px-2 py-1 bg-amber-50 text-amber-700 rounded">Edit</a>
                                    <a href="/Kepegawaian/slipgaji/delete/<?= $sg['ID_Slip'] ?>" class="inline-flex items-center px-2 py-1 bg-rose-50 text-rose-700 rounded" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

