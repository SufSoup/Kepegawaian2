# Tutorial Upload Proyek Kepegawaian ke GitHub

Panduan lengkap untuk mengunggah seluruh proyek Kepegawaian ke repositori GitHub Anda.

---

## 📋 Prasyarat

1. **Git terinstall** di komputer Anda

   - Download dari: https://git-scm.com/
   - Verifikasi: buka PowerShell dan ketik `git --version`

2. **Akun GitHub** (gratis)

   - Daftar di: https://github.com
   - Buat akun jika belum ada

3. **Koneksi Internet** yang stabil

---

## 🔧 Langkah 1: Konfigurasi Git (Lakukan Sekali)

Buka **PowerShell** dan jalankan perintah berikut untuk mengatur identitas Git Anda:

```powershell
git config --global user.name "Nama Lengkap Anda"
git config --global user.email "email@gmail.com"
```

**Contoh:**

```powershell
git config --global user.name "Budi Santoso"
git config --global user.email "budi@gmail.com"
```

### Verifikasi Konfigurasi

```powershell
git config --global user.name
git config --global user.email
```

---

## 📁 Langkah 2: Inisialisasi Repository Git Lokal

Buka **PowerShell** dan navigasi ke folder proyek:

```powershell
cd 'C:\xamppp\htdocs\Kepegawaian'
```

Inisialisasi Git repository:

```powershell
git init
```

Output yang muncul:

```
Initialized empty Git repository in C:/xamppp/htdocs/Kepegawaian/.git/
```

---

## 🚫 Langkah 3: Verifikasi .gitignore (PENTING!)

File `.gitignore` sudah ada di folder proyek. **Periksa isinya** sebelum melanjutkan:

```powershell
Get-Content .gitignore
```

### ⚠️ Amankan File Sensitif

Pastikan file berikut **tidak** di-upload (harus diabaikan):

1. **`config/database.php`** — Berisi password database
2. **`.env`** — File konfigurasi sensitif (jika ada)
3. **`upload/`** — Folder file user yang tidak perlu di-backup

Jika ada file sensitif yang perlu disembunyikan, tambahkan ke `.gitignore`:

```powershell
# Buka .gitignore dengan notepad
notepad .gitignore
```

Pastikan berisi:

```
# Database & Credentials
config/database.php
.env
.env.local

# Upload / User Files
/upload/
uploads/
public/upload/
```

**Simpan file setelah mengedit.**

---

## 📦 Langkah 4: Tambahkan Semua File ke Git

Tambahkan semua file ke staging area:

```powershell
git add .
```

Verifikasi file yang akan di-commit:

```powershell
git status
```

Output akan menampilkan file yang siap di-commit (berwarna hijau di PowerShell).

---

## 💾 Langkah 5: Buat Commit Pertama

Commit semua file dengan pesan:

```powershell
git commit -m "Initial commit: Proyek Kepegawaian"
```

Output contoh:

```
[master (root-commit) a1b2c3d] Initial commit: Proyek Kepegawaian
 15 files changed, 450 insertions(+)
 create mode 100644 index.php
 create mode 100644 app/controllers/AuthController.php
 ...
```

---

## 🌐 Langkah 6: Buat Repository di GitHub

### Opsi A: Melalui Web Browser (RECOMMENDED)

1. Buka https://github.com/new
2. **Isi formulir:**

   - **Repository name**: `Kepegawaian` (atau nama lain yang Anda inginkan)
   - **Description**: "Sistem Manajemen Kepegawaian" (opsional)
   - **Public** atau **Private** — pilih sesuai kebutuhan
     - **Public**: Siapa pun bisa lihat
     - **Private**: Hanya Anda yang bisa akses

3. Centang: "Do NOT initialize this repository with README, .gitignore, or license"

   - Karena sudah ada di lokal

4. Klik **Create Repository**

### Opsi B: Menggunakan GitHub CLI (Opsional)

Jika sudah install `gh` dan login:

```powershell
gh repo create Kepegawaian --public --source=. --remote=origin --push
```

---

## 🔐 Langkah 7: Hubungkan Remote Repository

Setelah membuat repository di GitHub, Anda akan mendapat instruksi. Pilih **HTTPS** atau **SSH**.

### Pilihan 1: HTTPS (Lebih Mudah)

```powershell
git branch -M main
git remote add origin https://github.com/USERNAME/Kepegawaian.git
```

**Ganti `USERNAME` dengan username GitHub Anda.**

Contoh:

```powershell
git branch -M main
git remote add origin https://github.com/budisantoso/Kepegawaian.git
```

### Pilihan 2: SSH (Lebih Aman, Butuh Setup)

Jika sudah setup SSH key di GitHub:

```powershell
git branch -M main
git remote add origin git@github.com:USERNAME/Kepegawaian.git
```

---

## 🚀 Langkah 8: Push Ke GitHub

Upload semua commit ke repository GitHub:

```powershell
git push -u origin main
```

**Jika menggunakan HTTPS**, akan ada prompt minta autentikasi:

- Username: **Username GitHub Anda**
- Password: **Gunakan Personal Access Token** (bukan password biasa)

### Cara Membuat Personal Access Token (PAT)

Jika diminta password:

1. Buka https://github.com/settings/tokens
2. Klik **"Generate new token"**
3. **Berikan nama**: "Git CLI"
4. **Pilih scope**:
   - ☑️ `repo` (full control of private repositories)
5. Klik **"Generate token"**
6. **Copy token** dan paste ke PowerShell sebagai "password"

---

## ✅ Langkah 9: Verifikasi Upload

### Check di Terminal

```powershell
git remote -v
```

Harus muncul:

```
origin  https://github.com/USERNAME/Kepegawaian.git (fetch)
origin  https://github.com/USERNAME/Kepegawaian.git (push)
```

### Check di GitHub Web

1. Buka https://github.com/USERNAME/Kepegawaian
2. Pastikan semua file sudah tersedia:
   - `/app` folder
   - `/config` folder
   - `/core` folder
   - `/public` folder
   - `index.php`
   - dll.

---

## 📝 Perintah-Perintah Penting Kedepannya

### Update Code (Setelah Edit)

```powershell
# Lihat perubahan
git status

# Tambahkan perubahan
git add .

# Commit dengan pesan
git commit -m "Deskripsi perubahan"

# Push ke GitHub
git push origin main
```

### Pull (Jika Edit dari Tempat Lain)

```powershell
git pull origin main
```

### Lihat History Commit

```powershell
git log --oneline
```

---

## ❓ Troubleshooting

### Error: "fatal: A git directory already exists"

Folder sudah punya `.git`. Solusi:

```powershell
Remove-Item -Recurse -Force .git
git init
```

### Error: "fatal: remote origin already exists"

Remote sudah ditambahkan. Ubah:

```powershell
git remote remove origin
git remote add origin https://github.com/USERNAME/Kepegawaian.git
```

### Error: "authentication failed" saat push

Gunakan **Personal Access Token**, bukan password biasa (lihat Langkah 8).

### Error: Permission denied (publickey)

Gunakan **HTTPS** bukan SSH, atau setup SSH key (lihat https://docs.github.com/en/authentication/connecting-to-github-with-ssh).

---

## 🎉 Selesai!

Proyek Anda sudah tersimpan di GitHub. Sekarang Anda bisa:

- ✅ Backup otomatis
- ✅ Akses dari mana saja
- ✅ Kolaborasi dengan orang lain
- ✅ Track perubahan kode

---

## 📞 Referensi Tambahan

- **GitHub Getting Started**: https://docs.github.com/en/get-started
- **Git Documentation**: https://git-scm.com/doc
- **Personal Access Token**: https://github.com/settings/tokens

---

**Dibuat untuk proyek Kepegawaian | Terakhir diupdate: Desember 2025**
