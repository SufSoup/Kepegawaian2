<?php
$title = 'Tambah Departemen Baru';
ob_start();
?>

<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-4">
            <a href="/Kepegawaian/department" class="p-2 rounded-lg hover:bg-slate-100 transition-colors">
                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Tambah Departemen Baru</h1>
        </div>
        <p class="text-slate-600">Tambahkan data departemen baru ke dalam sistem</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Card Header -->
        <div class="px-8 py-6 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white">
            <h2 class="text-lg font-semibold text-slate-800">Informasi Departemen</h2>
            <p class="text-sm text-slate-500 mt-1">Isi form di bawah untuk menambah departemen baru</p>
        </div>

        <!-- Form Content -->
        <div class="p-8">
            <?php if (isset($error)): ?>
                <div class="mb-6 rounded-xl bg-gradient-to-r from-rose-50 to-rose-100 border border-rose-200 p-4">
                    <div class="flex items-center">
                        <div class="p-2 bg-rose-500 rounded-lg mr-3">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-rose-800">Terjadi Kesalahan</p>
                            <p class="text-sm text-rose-600 mt-1"><?= htmlspecialchars($error) ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <form method="POST" action="/Kepegawaian/department/create" class="space-y-6">
                <!-- Jabatan Field -->
                <div class="space-y-2">
                    <label for="Jabatan" class="block text-sm font-medium text-slate-700">
                        Nama Jabatan <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            id="Jabatan" 
                            name="Jabatan" 
                            required 
                            placeholder="Contoh: Manager IT, Staff HRD, dll."
                            class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-700 placeholder-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 p-3 transition duration-200"
                        />
                    </div>
                </div>

                <!-- Keterangan Field -->
                <div class="space-y-2">
                    <label for="Keterangan" class="block text-sm font-medium text-slate-700">
                        Keterangan / Deskripsi
                    </label>
                    <div class="relative">
                        <div class="absolute top-3 left-3 pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                        </div>
                        <textarea 
                            id="Keterangan" 
                            name="Keterangan" 
                            rows="4" 
                            placeholder="Deskripsikan tugas dan tanggung jawab departemen ini..."
                            class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-700 placeholder-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 p-3 transition duration-200"
                        ></textarea>
                    </div>
                    <p class="text-xs text-slate-500">Opsional: tambahkan deskripsi tentang departemen ini</p>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-slate-100">
                    <a href="/Kepegawaian/department" class="inline-flex items-center px-5 py-2.5 text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors duration-200 font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                    <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-medium rounded-lg hover:from-indigo-700 hover:to-indigo-600 focus:ring-2 focus:ring-indigo-300 focus:ring-offset-2 transition-all duration-200 shadow-sm hover:shadow">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                        </svg>
                        Simpan Departemen
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