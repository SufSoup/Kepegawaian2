<?php
$title = 'Tambah Master Cuti';
ob_start();
?>

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-800">Tambah Master Cuti</h2>
        <p class="text-slate-600 mt-2">Tambahkan jenis cuti baru ke dalam sistem</p>
    </div>

    <form method="POST" action="/Kepegawaian/mastercuti/create" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label for="Nama_Cuti" class="block text-sm font-medium text-slate-700">Nama Cuti <span class="text-rose-500">*</span></label>
                <input type="text" id="Nama_Cuti" name="Nama_Cuti" required 
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200"
                    placeholder="Contoh: Cuti Tahunan">
                <p class="text-xs text-slate-500">Nama resmi jenis cuti</p>
            </div>

            <div class="space-y-2">
                <label for="Tipe_Cuti" class="block text-sm font-medium text-slate-700">Tipe Cuti <span class="text-rose-500">*</span></label>
                <input type="text" id="Tipe_Cuti" name="Tipe_Cuti" required 
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200"
                    placeholder="Contoh: Reguler">
                <p class="text-xs text-slate-500">Kategori atau tipe cuti</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label for="Jumlah_Hari" class="block text-sm font-medium text-slate-700">Jumlah Hari <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <input type="number" id="Jumlah_Hari" name="Jumlah_Hari" min="0" required 
                        class="w-full px-4 py-2.5 pl-10 rounded-lg border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200"
                        placeholder="0">
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-slate-500">Durasi cuti dalam hari</p>
            </div>

            <div class="space-y-2">
                <label for="Status" class="block text-sm font-medium text-slate-700">Status</label>
                <div class="relative">
                    <select id="Status" name="Status" 
                        class="w-full px-4 py-2.5 appearance-none rounded-lg border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200 bg-white">
                        <option value="Aktif" selected>Aktif</option>
                        <option value="Non-Aktif">Non-Aktif</option>
                    </select>
                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-slate-500">Status aktif atau non-aktif</p>
            </div>
        </div>

        <div class="space-y-2">
            <label for="Keterangan" class="block text-sm font-medium text-slate-700">Keterangan</label>
            <textarea id="Keterangan" name="Keterangan" rows="4" 
                class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200 resize-none"
                placeholder="Tambahkan keterangan atau catatan penting..."></textarea>
            <p class="text-xs text-slate-500">Opsional. Tambahkan penjelasan atau ketentuan cuti</p>
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
                Simpan Data
            </button>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>