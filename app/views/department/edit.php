<?php
$title = 'Edit Departemen';
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
            <h1 class="text-2xl font-bold text-slate-800">Edit Departemen</h1>
            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-sm font-medium rounded-full">
                ID: <?= htmlspecialchars($department['ID_Departemen']) ?>
            </span>
        </div>
        <p class="text-slate-600">Perbarui informasi departemen di bawah ini</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Card Header -->
        <div class="px-8 py-6 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white">
            <h2 class="text-lg font-semibold text-slate-800">Edit Informasi Departemen</h2>
            <p class="text-sm text-slate-500 mt-1">Ubah data sesuai kebutuhan</p>
        </div>

        <!-- Form Content -->
        <div class="p-8">
            <form method="POST" action="/Kepegawaian/department/edit/<?= $department['ID_Departemen'] ?>" class="space-y-6">
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
                            value="<?= htmlspecialchars($department['Jabatan']) ?>"
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
                            class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-700 placeholder-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 p-3 transition duration-200"
                        ><?= htmlspecialchars($department['Keterangan'] ?? '') ?></textarea>
                    </div>
                    <p class="text-xs text-slate-500">Opsional: tambahkan deskripsi tentang departemen ini</p>
                </div>

                <!-- Additional Info -->
                <?php if (isset($department['Jumlah_Karyawan'])): ?>
                <div class="rounded-xl bg-slate-50 border border-slate-200 p-5">
                    <div class="flex items-center">
                        <div class="p-2 bg-indigo-100 rounded-lg mr-4">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5 1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-700">Informasi Terkait</p>
                            <p class="text-sm text-slate-600 mt-1">
                                Departemen ini memiliki <span class="font-semibold text-indigo-600"><?= htmlspecialchars($department['Jumlah_Karyawan']) ?></span> karyawan terdaftar.
                            </p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Form Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-slate-100">
                    <a href="/Kepegawaian/department" class="inline-flex items-center px-5 py-2.5 text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors duration-200 font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                    <div class="flex gap-3">
                        <a href="/Kepegawaian/department/delete/<?= $department['ID_Departemen'] ?>" class="inline-flex items-center px-5 py-2.5 text-rose-700 bg-rose-50 hover:bg-rose-100 rounded-lg transition-colors duration-200 font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Hapus
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-medium rounded-lg hover:from-indigo-700 hover:to-indigo-600 focus:ring-2 focus:ring-indigo-300 focus:ring-offset-2 transition-all duration-200 shadow-sm hover:shadow">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>