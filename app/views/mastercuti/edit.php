<?php
$title = 'Edit Master Cuti';
ob_start();
?>

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-2">
            <div class="p-2 bg-indigo-100 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-800">Edit Master Cuti</h2>
        </div>
        <p class="text-slate-600">Edit data master cuti yang sudah ada</p>
    </div>

    <form method="POST" action="/Kepegawaian/mastercuti/edit/<?= $masterCuti['ID_Master_Cuti'] ?>" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label for="Nama_Cuti" class="block text-sm font-medium text-slate-700">Nama Cuti <span class="text-rose-500">*</span></label>
                <input type="text" id="Nama_Cuti" name="Nama_Cuti" required 
                    value="<?= htmlspecialchars($masterCuti['Nama_Cuti']) ?>"
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200">
            </div>

            <div class="space-y-2">
                <label for="Tipe_Cuti" class="block text-sm font-medium text-slate-700">Tipe Cuti <span class="text-rose-500">*</span></label>
                <input type="text" id="Tipe_Cuti" name="Tipe_Cuti" required 
                    value="<?= htmlspecialchars($masterCuti['Tipe_Cuti']) ?>"
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label for="Jumlah_Hari" class="block text-sm font-medium text-slate-700">Jumlah Hari <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <input type="number" id="Jumlah_Hari" name="Jumlah_Hari" min="0" required 
                        value="<?= htmlspecialchars($masterCuti['Jumlah_Hari'] ?? '') ?>"
                        class="w-full px-4 py-2.5 pl-10 rounded-lg border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200">
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label for="Status" class="block text-sm font-medium text-slate-700">Status</label>
                <div class="relative">
                    <select id="Status" name="Status" 
                        class="w-full px-4 py-2.5 appearance-none rounded-lg border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200 bg-white">
                        <option value="Aktif" <?= ($masterCuti['Status'] ?? 'Aktif') === 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                        <option value="Non-Aktif" <?= ($masterCuti['Status'] ?? '') === 'Non-Aktif' ? 'selected' : '' ?>>Non-Aktif</option>
                    </select>
                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-2">
            <label for="Keterangan" class="block text-sm font-medium text-slate-700">Keterangan</label>
            <textarea id="Keterangan" name="Keterangan" rows="4" 
                class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200 resize-none"><?= htmlspecialchars($masterCuti['Keterangan'] ?? '') ?></textarea>
        </div>

        <div class="flex justify-between items-center pt-6 border-t border-slate-200">
            <a href="/Kepegawaian/mastercuti" 
                class="inline-flex items-center gap-2 px-5 py-2.5 text-slate-700 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
            <button type="submit" 
                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-medium rounded-lg hover:from-indigo-700 hover:to-indigo-800 focus:ring-2 focus:ring-indigo-300 focus:ring-opacity-50 transition-all duration-200 shadow-sm hover:shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>