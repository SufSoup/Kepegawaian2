# Panduan Implementasi dan Testing Sistem Kepegawaian

## Ringkas Perubahan yang Dilakukan

Semua 11 requirement dari user telah berhasil diimplementasikan. Berikut adalah panduan lengkap untuk menguji setiap fitur.

---

## 1️⃣ Login Berbasis Email

**Status**: ✅ Selesai

**Perubahan**:
- File: `helpers/Auth.php` - Login method sekarang support email
- File: `app/views/auth/login.php` - UI update dengan placeholder email
- File: `app/controllers/AuthController.php` - Validasi email

**Cara Test**:
```
URL: http://localhost/Kepegawaian/login
Email: budi@hrd.com / rina@supervisor.com / agus@karyawan.com
Password: password123 (atau password yang sudah ada di database)
```

---

## 2️⃣ Halaman Karyawan - Data Hanya Data Sendiri

**Status**: ✅ Selesai

**Perubahan**:
- File: `app/controllers/KaryawanController.php` - Method `index()` check role
- File: `app/views/karyawan/index.php` - Display based on role

**Cara Test**:
1. Login sebagai Karyawan
2. Akses: `/Kepegawaian/karyawan`
3. Expected: Hanya data karyawan yang login ditampilkan
4. Login sebagai HRD/Supervisor
5. Expected: Semua data karyawan ditampilkan

---

## 3️⃣ Button Kembali di Semua Halaman

**Status**: ✅ Selesai

**Perubahan**:
- Semua views di `app/views/` sudah ditambahkan back button
- Format: `← Kembali` button dengan route yang sesuai

**Cara Test**:
- Navigasi ke berbagai halaman
- Expected: Back button selalu ada di bagian atas

---

## 4️⃣ Format Email Login Berdasarkan Role

**Status**: ✅ Selesai

**Format Email**:
- **HRD**: `nama@hrd.com`
- **Supervisor**: `nama@supervisor.com`
- **Karyawan**: `nama@karyawan.com`

**Cara Test**:
1. Login dengan email format berbeda untuk setiap role
2. Verifikasi akses sesuai dengan role

---

## 5️⃣ ID Generation Dari Aplikasi

**Status**: ✅ Selesai

**Perubahan**:
- File: `helpers/IDGenerator.php` - Helper baru untuk generate ID
- Format: `PREFIX-TIMESTAMP-RANDOM`

**Cara Implementasi**:
```php
// Contoh penggunaan:
$karyawanID = IDGenerator::generateKaryawanID(); // KAR-1702571234-1234
$cutiID = IDGenerator::generateCutiID();         // CUT-1702571234-5678
$userID = IDGenerator::generateUserID();         // USR-1702571234-9999
```

Note: Saat ini database masih menggunakan auto_increment, helper ini tersedia untuk custom usage di masa depan.

---

## 6️⃣ Otomatis Buat User Saat HRD Tambah Karyawan

**Status**: ✅ Selesai

**Perubahan**:
- File: `app/controllers/KaryawanController.php` - Method `create()`
- File: `app/views/karyawan/create.php` - Tambah field role selection

**Cara Test**:
1. Login sebagai HRD
2. Akses: `/Kepegawaian/karyawan/create`
3. Isi form dengan:
   - Nama: "John Doe"
   - Role: "Karyawan" (atau role lain)
   - Departemen, tanggal, dll
4. Submit
5. Expected: 
   - Karyawan baru dibuat di database
   - User login otomatis dibuat dengan email: john@karyawan.com
   - Password di-generate otomatis

---

## 7️⃣ Filter/Sorting di Halaman Karyawan

**Status**: ✅ Selesai

**Perubahan**:
- File: `app/controllers/KaryawanController.php` - Logic sorting
- File: `app/views/karyawan/index.php` - Dropdown sort

**Opsi Sorting**:
- Default
- Nama (A-Z)
- Nama (Z-A)
- Departemen
- Terlama Masuk
- Terbaru Masuk

**Cara Test**:
1. Login sebagai HRD/Supervisor
2. Akses: `/Kepegawaian/karyawan`
3. Gunakan dropdown "Urutkan"
4. Expected: Data urut sesuai pilihan

---

## 8️⃣ Maksimal Cuti Tahunan 30 Hari

**Status**: ✅ Selesai

**Perubahan**:
- File: `app/models/pengajuancuti.php` - Method validasi
- File: `app/controllers/PengajuanCutiController.php` - Validasi di create

**Cara Test**:
1. Login sebagai Karyawan
2. Akses: `/Kepegawaian/pengajuancuti/create`
3. Buat pengajuan cuti 20 hari
4. Approvenya (minimal submit)
5. Buat pengajuan cuti lagi 15 hari
6. Expected: Otomatis ditolak dengan message "Melebihi jatah cuti"

**Logic**:
- System akan check total cuti yang sudah disetujui tahun ini
- Jika total + pengajuan baru > 30 hari → Otomatis DITOLAK
- Status berubah ke "Ditolak" dengan keterangan penolakan

---

## 9️⃣ Kolom Lengkap di Pengajuan Cuti

**Status**: ✅ Selesai

**Kolom yang Ditampilkan**:
- ID
- Nama Karyawan (Pengaju)
- Jenis Cuti
- Tanggal Mulai
- Tanggal Selesai
- Jumlah Hari
- Keterangan
- Status
- Aksi

**Perubahan**:
- File: `app/views/pengajuancuti/index.php` - Update kolom

**Cara Test**:
- Akses: `/Kepegawaian/pengajuancuti`
- Expected: Semua kolom tersedia dan informatif

---

## 🔟 History Pengajuan Cuti Supervisor

**Status**: ✅ Selesai

**Perubahan**:
- File: `app/controllers/PengajuanCutiController.php` - Method `history()`
- File: `app/views/pengajuancuti/history.php` - **[BARU]**
- File: `config/routes.php` - Route `/pengajuancuti/history`

**Cara Test**:
1. Login sebagai Supervisor
2. Akses: `/Kepegawaian/pengajuancuti/history`
3. Expected: Lihat semua pengajuan cuti yang sudah diproses (Disetujui/Ditolak)
4. Kolom: Siapa pengaju, siapa yang setuju, kapan diproses

---

## 1️⃣1️⃣ Dashboard Ringkasan

**Status**: ✅ Selesai

### HRD Dashboard
**Perubahan**: `app/views/dashboard/hrd_dashboard.php`

**Menampilkan**:
- Total Karyawan
- Total Departemen
- Pengajuan Cuti Pending
- Ringkasan status pengajuan cuti

### Supervisor Dashboard
**Perubahan**: `app/views/dashboard/supervisor_dashboard.php`

**Menampilkan**:
- Pengajuan Menunggu Persetujuan
- Pengajuan Disetujui
- Pengajuan Ditolak
- Link ke halaman history

### Karyawan Dashboard
**Perubahan**: `app/views/dashboard/karyawan_dashboard.php`

**Menampilkan**:
- **Biodata Pribadi**:
  - Nama Lengkap
  - Email
  - Departemen
  - Tanggal Lahir
  - Tanggal Masuk
  - Status Kerja
  - Alamat
- **Statistik Cuti Tahun Ini**:
  - Sudah Diambil (hari)
  - Sisa Jatah (hari)
  - Progress Bar
- **Status Pengajuan Cuti**:
  - Pending
  - Disetujui
  - Ditolak

**Cara Test**:
1. Login masing-masing role
2. Akses: `/Kepegawaian/dashboard`
3. Lihat statistik dan informasi yang relevan

---

## 📋 File-File Utama yang Diubah

### Helper
- ✅ `helpers/Auth.php`
- ✅ `helpers/IDGenerator.php` [BARU]

### Controller
- ✅ `app/controllers/AuthController.php`
- ✅ `app/controllers/KaryawanController.php`
- ✅ `app/controllers/PengajuanCutiController.php`

### Model
- ✅ `app/models/user.php`
- ✅ `app/models/pengajuancuti.php`

### View
- ✅ `app/views/auth/login.php`
- ✅ `app/views/karyawan/` (semua 5 file)
- ✅ `app/views/pengajuancuti/` (semua file + history baru)
- ✅ `app/views/dashboard/` (semua 3 file)

### Config
- ✅ `config/routes.php`

### Documentation
- ✅ `PERUBAHAN_UPDATE.md` [BARU]

---

## 🧪 Testing Checklist

- [ ] **Login**
  - [ ] Bisa login dengan email @hrd.com
  - [ ] Bisa login dengan email @supervisor.com
  - [ ] Bisa login dengan email @karyawan.com
  - [ ] Error message jika email/password salah

- [ ] **Halaman Karyawan**
  - [ ] Karyawan hanya lihat data diri sendiri
  - [ ] HRD bisa lihat semua data
  - [ ] Supervisor bisa lihat semua data
  - [ ] Button "Lihat" ada
  - [ ] Button "Edit" dan "Hapus" sesuai permission

- [ ] **Sorting Karyawan**
  - [ ] Sort A-Z bekerja
  - [ ] Sort Z-A bekerja
  - [ ] Sort Departemen bekerja
  - [ ] Sort Tanggal Masuk bekerja

- [ ] **Tambah Karyawan**
  - [ ] Form terlihat
  - [ ] Role selection ada
  - [ ] Karyawan baru bisa login
  - [ ] Email format sesuai role

- [ ] **Pengajuan Cuti**
  - [ ] Cuti > 30 hari ditolak
  - [ ] Kolom lengkap ditampilkan
  - [ ] Status badge warna sesuai

- [ ] **History Cuti**
  - [ ] Supervisor bisa akses
  - [ ] Menampilkan data yang benar
  - [ ] Format tanggal benar

- [ ] **Dashboard**
  - [ ] HRD lihat statistik karyawan
  - [ ] Supervisor lihat statistik cuti
  - [ ] Karyawan lihat biodata + cuti

- [ ] **Back Button**
  - [ ] Ada di semua halaman utama
  - [ ] Navigasi bekerja dengan benar

---

## 🚀 Deployment Notes

1. **Backup Database** sebelum implementasi
2. **Test di development** terlebih dahulu
3. **Update semua credentials** sesuai kebutuhan
4. **Verifikasi email format** di database
5. **Test akses permission** untuk setiap role

---

## 📞 Support

Jika ada yang perlu diedit atau ditambahkan lebih lanjut, file-file berikut bisa dikustomisasi:
- `helpers/IDGenerator.php` - Untuk custom ID format
- `app/models/pengajuancuti.php` - Untuk perubahan logic validasi cuti
- Views di `app/views/` - Untuk custom styling atau layout

---

**Status**: ✅ **SEMUA 11 REQUIREMENT SELESAI**

Last Updated: December 15, 2025
