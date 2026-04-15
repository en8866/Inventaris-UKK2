# Sistem Inventaris CRUD

Aplikasi web sederhana untuk mengelola inventaris dengan sistem login berbasis role (Admin dan Staff).

## Fitur Utama

- ✅ **Autentikasi Login** - Sistem login dengan email dan password
- ✅ **Role-based Access Control** - Pembedaan hak akses antara Admin dan Staff
- ✅ **CRUD Inventaris** - Tambah, Lihat, Edit, Hapus data inventaris
- ✅ **Dashboard** - Menampilkan statistik inventaris
- ✅ **Responsive Design** - Interface yang user-friendly dengan Bootstrap 5

## Hak Akses

### Admin
- Dapat melihat daftar inventaris
- Dapat menambah inventaris baru
- Dapat mengedit inventaris
- Dapat menghapus inventaris
- Dapat melihat dashboard lengkap

### Staff
- Hanya dapat melihat daftar inventaris
- Dapat melihat detail inventaris
- **TIDAK** dapat menambah, mengedit, atau menghapus inventaris

## Instalasi

### 1. Clone Repository
```bash
cd inventaris-app2
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup
Update file `.env` dengan konfigurasi database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventaris
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migrations & Seeding
```bash
php artisan migrate
php artisan db:seed
```

Ini akan membuat tabel-tabel yang diperlukan dan membuat dua user demo:
- **Admin:** admin@example.com (password: password)
- **Staff:** staff@example.com (password: password)

### 6. Start Development Server
```bash
php artisan serve
npm run dev
```

Aplikasi akan berjalan di: `http://localhost:8000`

## Struktur Database

### Table Users
- id
- name
- email
- password
- role (admin/staff)
- timestamps

### Table Inventaris
- id
- nama (nama barang)
- kode_inventaris (kode unik)
- deskripsi
- jumlah
- lokasi
- kondisi (baik/rusak/hilang)
- tanggal_masuk
- harga
- timestamps

## Cara Penggunaan

### Login
1. Buka aplikasi di `http://localhost:8000/login`
2. Masukkan email dan password
3. Klik tombol "Login"

### Lihat Daftar Inventaris
1. Setelah login, klik "Daftar Inventaris" di sidebar
2. Daftar semua inventaris akan ditampilkan dalam bentuk tabel

### Lihat Detail Inventaris
1. Klik icon "👁️" pada baris inventaris
2. Detail lengkap inventaris akan ditampilkan

### Tambah Inventaris (Admin Only)
1. Klik "Tambah Inventaris" di sidebar
2. Isi form dengan data inventaris:
   - Nama Inventaris (wajib)
   - Kode Inventaris (wajib, unik)
   - Deskripsi (opsional)
   - Jumlah (wajib)
   - Lokasi (wajib)
   - Kondisi (wajib: Baik/Rusak/Hilang)
   - Tanggal Masuk (wajib)
   - Harga (opsional)
3. Klik "Simpan Inventaris"

### Edit Inventaris (Admin Only)
1. Buka detail inventaris
2. Klik tombol "✏️ Edit Inventaris"
3. Ubah data yang diperlukan
4. Klik "Perbarui Inventaris"

### Hapus Inventaris (Admin Only)
1. Buka detail inventaris
2. Klik tombol "🗑️ Hapus Inventaris"
3. Konfirmasi penghapusan
4. Data akan dihapus dari database

### Logout
1. Klik dropdown dengan nama pengguna di navbar
2. Klik "Logout"
3. Anda akan kembali ke halaman login

## File-File Penting

```
inventaris-app2/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php        # Controller untuk login/logout
│   │   │   ├── InventarisController.php  # Controller untuk CRUD inventaris
│   │   └── Middleware/
│   │       └── RedirectIfAuthenticated.php
│   ├── Models/
│   │   ├── User.php                      # Model User
│   │   └── Inventaris.php                # Model Inventaris
│   └── Policies/
│       └── InventarisPolicy.php          # Policy untuk authorization
├── database/
│   ├── migrations/                       # Database migrations
│   └── seeders/
│       └── DatabaseSeeder.php            # Database seeder
├── resources/views/
│   ├── auth/
│   │   └── login.blade.php               # Halaman login
│   ├── inventaris/
│   │   ├── index.blade.php               # Daftar inventaris
│   │   ├── create.blade.php              # Form tambah inventaris
│   │   ├── edit.blade.php                # Form edit inventaris
│   │   └── show.blade.php                # Detail inventaris
│   ├── layouts/
│   │   └── app.blade.php                 # Layout utama
│   └── dashboard.blade.php               # Dashboard
└── routes/
    └── web.php                           # Routes aplikasi
```

## Troubleshooting

### Error: "SQLSTATE[HY000]: General error: 1030"
Pastikan database sudah dibuat sebelum menjalankan migrations.

### Error: "No application encryption key has been generated"
Jalankan: `php artisan key:generate`

### Error: "Class not found"
Jalankan: `composer dump-autoload`

### Tidak bisa login
- Pastikan sudah menjalankan `php artisan db:seed`
- Cek kembali email dan password sesuai dengan data seeder
- Pastikan database sudah dimigrasi

## Catatan Pengembangan

- Policy untuk CRUD menggunakan Laravel Authorization
- Validasi input dilakukan di Controller menggunakan Form Request Validation
- Middleware `auth` melindungi routes yang memerlukan login
- Database timestamps digunakan untuk tracking created_at dan updated_at
- Currency formatting untuk harga dalam format Rupiah

## Lisensi

Bebas digunakan untuk keperluan pendidikan dan komersial.

---

**Dibuat untuk memenuhi kebutuhan sistem manajemen inventaris sederhana.**
