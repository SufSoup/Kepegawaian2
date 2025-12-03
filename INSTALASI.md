# Petunjuk Instalasi Sistem Manajemen Kepegawaian

## Langkah-langkah Instalasi

### 1. Persiapkan Environment
- Pastikan XAMPP sudah terinstall dan MySQL service berjalan
- Pastikan folder proyek sudah berada di `C:\xampp\htdocs\Kepegawaian`

### 2. Install Database

**Opsi A: Menggunakan Script Install (Paling Mudah)**
1. Buka browser
2. Akses: `http://localhost/Kepegawaian/database/install.php`
3. Tunggu sampai proses instalasi selesai

**Opsi B: Manual via phpMyAdmin**
1. Buka phpMyAdmin: `http://localhost/phpmyadmin`
2. Buat database baru dengan nama `kepegawaian_db`
3. Import file `database/schema.sql`

### 3. Konfigurasi Database (Jika Perlu)
Buka file `config/database.php` dan sesuaikan jika diperlukan:
```php
'host' => 'localhost',
'dbname' => 'kepegawaian_db',
'username' => 'root',
'password' => '',  // Sesuaikan dengan password MySQL Anda
```

### 4. Akses Aplikasi
1. Buka browser
2. Akses: `http://localhost/Kepegawaian`
3. Login dengan kredensial default:
   - **Username:** `hrd`
   - **Password:** `admin123`

## Default User

Setelah instalasi database, user HRD default sudah dibuat:
- Username: `hrd`
- Password: `admin123`

## Fitur yang Tersedia

### Role HRD
- ✅ Manajemen Departemen (CRUD)
- ✅ Manajemen Karyawan (CRUD)
- ✅ Manajemen Master Cuti (CRUD)
- ✅ Manajemen Pengajuan Cuti (CRUD)
- ✅ Manajemen Slip Gaji (CRUD)

### Role Supervisor
- ✅ Melihat Data Departemen
- ✅ Melihat dan Edit Data Karyawan
- ✅ Approve/Reject Pengajuan Cuti

### Role Karyawan
- ✅ Melihat dan Edit Data Sendiri
- ✅ Membuat dan Edit Pengajuan Cuti
- ✅ Melihat Slip Gaji

## Troubleshooting

### Error: Database connection failed
- Pastikan MySQL service berjalan di XAMPP
- Cek konfigurasi di `config/database.php`
- Pastikan database sudah dibuat

### Error: 404 Page Not Found
- Pastikan mod_rewrite aktif di Apache
- Cek file `.htaccess` sudah ada
- Pastikan URL yang diakses benar

### Error: Controller not found
- Pastikan semua file controller sudah ada di folder `app/controllers/`
- Cek permission file

## Struktur Folder

```
Kepegawaian/
├── app/
│   ├── controllers/     # Semua controller
│   ├── models/          # Semua model
│   └── views/           # Semua view
├── config/              # Konfigurasi
├── core/                # Core classes
├── database/            # SQL files
├── helpers/             # Helper functions
├── public/              # Assets (CSS, JS)
├── index.php            # Entry point
└── .htaccess            # Apache config
```

## Catatan Penting

1. Pastikan semua file permission sudah benar
2. Jika menggunakan password MySQL, update di `config/database.php`
3. Untuk production, disable error reporting di `index.php`
4. Selalu backup database sebelum update

## Support

Jika ada masalah, cek:
1. Error log PHP di XAMPP
2. Error log Apache di XAMPP
3. Konsol browser (F12) untuk error JavaScript

