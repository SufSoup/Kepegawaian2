<?php
$title = 'Edit Data Karyawan';
ob_start();
?>

<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-4">
            <a href="/Kepegawaian/karyawan" class="p-2 rounded-lg hover:bg-slate-100 transition-colors">
                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Edit Data Karyawan</h1>
            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-sm font-medium rounded-full">
                ID: <?= htmlspecialchars($karyawan['ID_Karyawan']) ?>
            </span>
        </div>
        <p class="text-slate-600">Perbarui informasi karyawan di bawah ini</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Card Header -->
        <div class="px-8 py-6 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white">
            <h2 class="text-lg font-semibold text-slate-800">Edit Informasi Karyawan</h2>
            <p class="text-sm text-slate-500 mt-1">Ubah data sesuai kebutuhan</p>
        </div>

        <!-- Form Content -->
        <div class="p-8">
            <form method="POST" action="/Kepegawaian/karyawan/edit/<?= $karyawan['ID_Karyawan'] ?>" class="space-y-6">
                <!-- Profile Summary -->
                <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-lg border border-slate-200">
                    <div class="h-14 w-14 rounded-full bg-gradient-to-r from-indigo-500 to-cyan-500 flex items-center justify-center text-white font-bold text-lg">
                        <?= htmlspecialchars(substr($karyawan['Nama_Lengkap'], 0, 1)) ?>
                    </div>
                    <div>
                        <p class="font-medium text-slate-800"><?= htmlspecialchars($karyawan['Nama_Lengkap']) ?></p>
                        <p class="text-sm text-slate-600"><?= htmlspecialchars($karyawan['Email_Kantor']) ?></p>
                    </div>
                </div>

                <!-- Nama Lengkap -->
                <div class="space-y-2">
                    <label for="Nama_Lengkap" class="block text-sm font-medium text-slate-700">
                        Nama Lengkap <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            id="Nama_Lengkap" 
                            name="Nama_Lengkap" 
                            required 
                            value="<?= htmlspecialchars($karyawan['Nama_Lengkap']) ?>"
                            class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-700 placeholder-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 p-3 transition duration-200"
                        />
                    </div>
                </div>

                <!-- Tanggal Lahir & Masuk -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="Tgl_Lahir" class="block text-sm font-medium text-slate-700">
                            Tanggal Lahir <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input 
                                type="date" 
                                id="Tgl_Lahir" 
                                name="Tgl_Lahir" 
                                required 
                                value="<?= $karyawan['Tgl_Lahir'] ?>"
                                class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 p-3 transition duration-200"
                            />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="Tgl_Masuk" class="block text-sm font-medium text-slate-700">
                            Tanggal Masuk <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <input 
                                type="date" 
                                id="Tgl_Masuk" 
                                name="Tgl_Masuk" 
                                required 
                                value="<?= $karyawan['Tgl_Masuk'] ?>"
                                class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 p-3 transition duration-200"
                            />
                        </div>
                    </div>
                </div>

                <!-- Role & Departemen -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="role" class="block text-sm font-medium text-slate-700">
                            Role <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <select 
                                id="role" 
                                name="role" 
                                required 
                                class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 p-3 transition duration-200 appearance-none"
                            >
                                <option value="Karyawan" <?= ($karyawan['Role'] ?? '') === 'Karyawan' ? 'selected' : '' ?>>Karyawan</option>
                                <option value="Supervisor" <?= ($karyawan['Role'] ?? '') === 'Supervisor' ? 'selected' : '' ?>>Supervisor</option>
                                <option value="HRD" <?= ($karyawan['Role'] ?? '') === 'HRD' ? 'selected' : '' ?>>HRD</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="ID_Departemen" class="block text-sm font-medium text-slate-700">
                            Departemen <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <select 
                                id="ID_Departemen" 
                                name="ID_Departemen" 
                                required 
                                class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 p-3 transition duration-200 appearance-none"
                            >
                                <option value="">Pilih Departemen</option>
                                <?php foreach ($departments as $dept): ?>
                                    <option value="<?= $dept['ID_Departemen'] ?>" <?= $dept['ID_Departemen'] == $karyawan['ID_Departemen'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($dept['Jabatan']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="space-y-2">
                    <label for="Alamat" class="block text-sm font-medium text-slate-700">
                        Alamat
                    </label>
                    <div class="relative">
                        <div class="absolute top-3 left-3 pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <textarea 
                            id="Alamat" 
                            name="Alamat" 
                            rows="3" 
                            class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-700 placeholder-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 p-3 transition duration-200"
                        ><?= htmlspecialchars($karyawan['Alamat'] ?? '') ?></textarea>
                    </div>
                </div>

                <!-- Status Kerja -->
                <div class="space-y-2">
                    <label for="Status_Kerja" class="block text-sm font-medium text-slate-700">
                        Status Kerja
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <select 
                            id="Status_Kerja" 
                            name="Status_Kerja" 
                            class="pl-10 block w-full rounded-lg border-slate-300 bg-white text-slate-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 p-3 transition duration-200 appearance-none"
                        >
                            <option value="Aktif" <?= $karyawan['Status_Kerja'] === 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="Non-Aktif" <?= $karyawan['Status_Kerja'] === 'Non-Aktif' ? 'selected' : '' ?>>Non-Aktif</option>
                            <option value="Resign" <?= $karyawan['Status_Kerja'] === 'Resign' ? 'selected' : '' ?>>Resign</option>
                        </select>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-slate-100">
                    <a href="/Kepegawaian/karyawan" class="inline-flex items-center px-5 py-2.5 text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors duration-200 font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                    <div class="flex gap-3">
                        <a href="/Kepegawaian/karyawan/delete/<?= $karyawan['ID_Karyawan'] ?>" class="inline-flex items-center px-5 py-2.5 text-rose-700 bg-rose-50 hover:bg-rose-100 rounded-lg transition-colors duration-200 font-medium">
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