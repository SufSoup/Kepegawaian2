# Sistem Manajemen Kepegawaian

Sistem Manajemen Kepegawaian adalah aplikasi web untuk mengelola data karyawan, departemen, pengajuan cuti, dan slip gaji dalam sebuah perusahaan.

## Fitur Utama

### Role HRD
- Manajemen Departemen (CRUD)
- Manajemen Karyawan (CRUD)
- Manajemen Master Cuti (CRUD)
- Manajemen Pengajuan Cuti (CRUD)
- Manajemen Slip Gaji (CRUD)

### Role Supervisor
- Melihat Data Departemen
- Melihat dan Edit Data Karyawan
- Approve/Reject Pengajuan Cuti

### Role Karyawan
- Melihat dan Edit Data Karyawan Sendiri
- Membuat dan Edit Pengajuan Cuti
- Melihat Slip Gaji

## Instalasi

### Prasyarat
- XAMPP (PHP 7.4+ dan MySQL)
- Web Browser

### Langkah Instalasi

1. **Copy folder proyek ke htdocs**
   ```
   C:\xampp\htdocs\Kepegawaian
   ```

2. **Buat database**
   - Buka phpMyAdmin (http://localhost/phpmyadmin)
   - Import file `database/schema.sql` atau jalankan perintah SQL untuk membuat database

3. **Konfigurasi Database**
   - Buka file `config/database.php`
   - Sesuaikan konfigurasi database jika perlu:
   ```php
   'host' => 'localhost',
   'dbname' => 'kepegawaian_db',
   'username' => 'root',
   'password' => '',
   ```

4. **Akses Aplikasi**
   - Buka browser dan akses: http://localhost/Kepegawaian
   - Login dengan:
     - Username: `hrd`
     - Password: `admin123`

## Struktur Database

Database terdiri dari 6 tabel utama:
- `departemen` - Data departemen
- `karyawan` - Data karyawan
- `user` - Data user untuk login
- `master_cuti` - Master jenis cuti
- `pengajuan_cuti` - Pengajuan cuti karyawan
- `slip_gaji` - Slip gaji karyawan

## Struktur Folder

```
Kepegawaian/
├── app/
│   ├── controllers/     # Controller files
│   ├── models/          # Model files
│   └── views/           # View files
├── config/              # Konfigurasi
├── core/                # Core classes
├── database/            # SQL files
├── helpers/             # Helper functions
├── public/              # Public assets (CSS, JS)
└── index.php            # Entry point
```

## Default Login

Setelah import database, default user HRD:
- **Username:** hrd
- **Password:** admin123

## Catatan

- Pastikan MySQL service berjalan di XAMPP
- Pastikan file permission sudah benar
- Jika ada error, cek konfigurasi database di `config/database.php`

## Teknologi yang Digunakan

- PHP 7.4+
- MySQL
- Bootstrap 5 (untuk UI)
- Vanilla JavaScript

