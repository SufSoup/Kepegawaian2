# Perubahan dan Update Sistem Kepegawaian

## Ringkasan Perubahan Utama

Proyek Sistem Manajemen Kepegawaian telah diupdate dengan fitur-fitur baru dan perbaikan sesuai dengan requirement yang telah diminta.

### 1. **Sistem Login Berbasis Email (Role-Based)**
- Login sekarang menggunakan email dengan format yang sesuai role:
  - **Karyawan**: `nama@karyawan.com`
  - **Supervisor**: `nama@supervisor.com`
  - **HRD**: `nama@hrd.com`
- File yang diubah: `helpers/Auth.php`, `app/views/auth/login.php`, `app/controllers/AuthController.php`

### 2. **Akses Data Karyawan Terbatas**
- Karyawan hanya bisa melihat data pribadi mereka sendiri
- HRD dan Supervisor bisa melihat data semua karyawan
- File yang diubah: `app/controllers/KaryawanController.php`, `app/views/karyawan/index.php`

### 3. **Tombol Kembali di Semua Halaman**
- Setiap halaman utama memiliki tombol "← Kembali" untuk navigasi yang lebih mudah
- File yang diubah: Semua views di folder `app/views/`

### 4. **Sistem Login Otomatis untuk Karyawan Baru**
- Ketika HRD menambah karyawan baru, sistem otomatis membuat akun login
- Email dan password otomatis di-generate berdasarkan role yang dipilih
- File yang diubah: `app/controllers/KaryawanController.php`, `app/views/karyawan/create.php`

### 5. **ID Generation dari Aplikasi**
- ID tidak lagi hanya dari auto_increment database
- Dibuat helper `IDGenerator.php` untuk generate ID unik dengan format: `PREFIX-TIMESTAMP-RANDOM`
- File yang dibuat: `helpers/IDGenerator.php`

### 6. **Filter dan Sorting Halaman Karyawan**
- Tambahan sorting options:
  - Nama (A-Z atau Z-A)
  - Departemen
  - Tanggal Masuk (Terlama atau Terbaru)
- File yang diubah: `app/controllers/KaryawanController.php`, `app/views/karyawan/index.php`

### 7. **Validasi Maksimal Cuti Tahunan (30 Hari)**
- Sistem mengecek total cuti yang sudah disetujui dalam satu tahun
- Jika pengajuan melebihi 30 hari, otomatis ditolak
- File yang diubah: `app/models/pengajuancuti.php`, `app/controllers/PengajuanCutiController.php`

### 8. **Kolom Lengkap di Halaman Pengajuan Cuti**
- Halaman pengajuan cuti sekarang menampilkan kolom:
  - Nama Karyawan (yang mengajukan)
  - Jenis Cuti
  - Tanggal Mulai
  - Tanggal Selesai
  - Keterangan/Alasan
- File yang diubah: `app/views/pengajuancuti/index.php`

### 9. **History Pengajuan Cuti untuk Supervisor**
- Supervisor bisa melihat history dari semua pengajuan cuti yang sudah diproses (disetujui/ditolak)
- Menampilkan siapa yang mengajukan, siapa yang menyetujui, dan kapan diproses
- Route: `/pengajuancuti/history`
- File yang dibuat: `app/views/pengajuancuti/history.php`
- File yang diubah: `app/controllers/PengajuanCutiController.php`, `config/routes.php`

### 10. **Dashboard Menjadi Ringkasan/Analisis**
- **HRD Dashboard**: Menampilkan statistik total karyawan, departemen, dan pengajuan cuti
- **Supervisor Dashboard**: Menampilkan statistik pengajuan cuti yang perlu ditindaklanjuti
- **Karyawan Dashboard**: Menampilkan biodata pribadi dan statistik cuti tahun ini
- File yang diubah: 
  - `app/controllers/AuthController.php`
  - `app/views/dashboard/hrd_dashboard.php`
  - `app/views/dashboard/supervisor_dashboard.php`
  - `app/views/dashboard/karyawan_dashboard.php`

### 11. **Biodata Karyawan di Dashboard Karyawan**
- Halaman dashboard karyawan sekarang menampilkan:
  - Informasi biodata lengkap (nama, email, departemen, tanggal lahir, dll)
  - Statistik cuti tahun ini (sudah diambil, sisa jatah)
  - Status pengajuan cuti (pending, disetujui, ditolak)
  - Progress bar untuk visualisasi penggunaan jatah cuti
- File yang diubah: `app/views/dashboard/karyawan_dashboard.php`

## File-File yang Dimodifikasi

### Helper Files
- `helpers/Auth.php` - Update login untuk email-based
- `helpers/IDGenerator.php` - **[BARU]** Generate ID dari aplikasi

### Controller Files
- `app/controllers/AuthController.php` - Update dashboard dengan statistik
- `app/controllers/KaryawanController.php` - Batasi akses, auto create user, tambah sorting
- `app/controllers/PengajuanCutiController.php` - Validasi cuti maksimal, tambah method history

### Model Files
- `app/models/user.php` - Tambah method delete
- `app/models/pengajuancuti.php` - Tambah method validasi cuti tahunan

### View Files
- `app/views/auth/login.php` - Update label dan placeholder
- `app/views/karyawan/index.php` - Tambah sorting, back button, "Lihat" button
- `app/views/karyawan/create.php` - Tambah role selection, back button
- `app/views/karyawan/edit.php` - Tambah back button
- `app/views/karyawan/delete.php` - Tambah back button
- `app/views/karyawan/show.php` - Tambah back button
- `app/views/pengajuancuti/index.php` - Tambah kolom lengkap, back button
- `app/views/pengajuancuti/create.php` - Tambah info jatah cuti, back button
- `app/views/pengajuancuti/edit.php` - Tambah back button
- `app/views/pengajuancuti/history.php` - **[BARU]** Halaman history
- `app/views/dashboard/hrd_dashboard.php` - Update dengan statistik dan kartu ringkasan
- `app/views/dashboard/supervisor_dashboard.php` - Update dengan statistik dan history link
- `app/views/dashboard/karyawan_dashboard.php` - Update dengan biodata dan statistik cuti

### Config Files
- `config/routes.php` - Tambah route untuk history

## Testing Checklist

- [ ] Login dengan email format role-based (nama@karyawan.com, dll)
- [ ] Karyawan hanya bisa lihat data pribadi
- [ ] HRD bisa melihat semua karyawan
- [ ] Tambah karyawan baru -> akun login otomatis dibuat
- [ ] Sorting halaman karyawan bekerja (A-Z, departemen, tanggal masuk)
- [ ] Pengajuan cuti > 30 hari otomatis ditolak
- [ ] Dashboard menampilkan statistik dengan benar
- [ ] Supervisor bisa akses halaman history
- [ ] Back button ada di semua halaman utama
- [ ] Biodata muncul di dashboard karyawan

## Default Test Accounts

Setelah implementasi, test dengan:
- Nama: Budi Santoso → Email: budi@hrd.com (HRD)
- Nama: Rina Kusuma → Email: rina@supervisor.com (Supervisor)
- Nama: Agus Wijaya → Email: agus@karyawan.com (Karyawan)

Password untuk semua: `password123`

## Notes

- ID auto_increment database masih digunakan untuk identitas utama
- IDGenerator.php tersedia untuk custom ID jika diperlukan di masa depan
- Sistem validasi cuti 30 hari per tahun dari tanggal tahun kalender (1 Jan - 31 Des)
- History pengajuan cuti hanya bisa diakses oleh Supervisor
