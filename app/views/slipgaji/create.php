<?php
$title = 'Tambah Slip Gaji';
ob_start();
?>

<div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
    <h2 class="text-lg font-semibold mb-4">Tambah Slip Gaji</h2>

    <form method="POST" action="/Kepegawaian/slipgaji/create" class="space-y-4">
        <div>
            <label for="ID_Karyawan" class="block text-sm font-medium text-slate-600">Karyawan <span class="text-rose-500">*</span></label>
            <select id="ID_Karyawan" name="ID_Karyawan" required class="mt-1 block w-full rounded-md border-slate-200 p-2">
                <option value="">Pilih Karyawan</option>
                <?php foreach ($karyawans as $k): ?>
                    <option value="<?= $k['ID_Karyawan'] ?>"><?= htmlspecialchars($k['Nama_Lengkap']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label for="Bulan" class="block text-sm font-medium text-slate-600">Bulan <span class="text-rose-500">*</span></label>
                <select id="Bulan" name="Bulan" required class="mt-1 block w-full rounded-md border-slate-200 p-2">
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <option value="<?= $i ?>"><?= date('F', mktime(0, 0, 0, $i, 1)) ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div>
                <label for="Tahun" class="block text-sm font-medium text-slate-600">Tahun <span class="text-rose-500">*</span></label>
                <input type="number" id="Tahun" name="Tahun" value="<?= date('Y') ?>" min="2000" max="2100" required class="mt-1 block w-full rounded-md border-slate-200 p-2" />
            </div>
            <div>
                <label for="Tanggal_Dibuat" class="block text-sm font-medium text-slate-600">Tanggal Dibuat <span class="text-rose-500">*</span></label>
                <input type="date" id="Tanggal_Dibuat" name="Tanggal_Dibuat" value="<?= date('Y-m-d') ?>" required class="mt-1 block w-full rounded-md border-slate-200 p-2" />
            </div>
        </div>

        <div>
            <label for="Gaji_Pokok" class="block text-sm font-medium text-slate-600">Gaji Pokok <span class="text-rose-500">*</span></label>
            <input type="number" id="Gaji_Pokok" name="Gaji_Pokok" min="0" required class="mt-1 block w-full rounded-md border-slate-200 p-2" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label for="Tunjangan_Transportasi" class="block text-sm font-medium text-slate-600">Tunjangan Transportasi</label>
                <input type="number" id="Tunjangan_Transportasi" name="Tunjangan_Transportasi" min="0" value="0" class="mt-1 block w-full rounded-md border-slate-200 p-2" />
            </div>
            <div>
                <label for="Tunjangan_Kesehatan" class="block text-sm font-medium text-slate-600">Tunjangan Kesehatan</label>
                <input type="number" id="Tunjangan_Kesehatan" name="Tunjangan_Kesehatan" min="0" value="0" class="mt-1 block w-full rounded-md border-slate-200 p-2" />
            </div>
            <div>
                <label for="Tunjangan_Lainnya" class="block text-sm font-medium text-slate-600">Tunjangan Lainnya</label>
                <input type="number" id="Tunjangan_Lainnya" name="Tunjangan_Lainnya" min="0" value="0" class="mt-1 block w-full rounded-md border-slate-200 p-2" />
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="Potongan_Tetap" class="block text-sm font-medium text-slate-600">Potongan Tetap</label>
                <input type="number" id="Potongan_Tetap" name="Potongan_Tetap" min="0" value="0" class="mt-1 block w-full rounded-md border-slate-200 p-2" />
            </div>
            <div>
                <label for="Potongan_Lainnya" class="block text-sm font-medium text-slate-600">Potongan Lainnya</label>
                <input type="number" id="Potongan_Lainnya" name="Potongan_Lainnya" min="0" value="0" class="mt-1 block w-full rounded-md border-slate-200 p-2" />
            </div>
        </div>

        <div class="flex justify-between">
            <a href="/Kepegawaian/slipgaji" class="inline-flex items-center px-3 py-2 bg-slate-100 text-slate-700 rounded-md">Kembali</a>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Simpan Data</button>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>

