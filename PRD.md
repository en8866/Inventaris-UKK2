# Product Requirements Document: Aplikasi Inventaris Sederhana

Dokumen ini menjelaskan persyaratan fungsional dan non-fungsional untuk aplikasi manajemen inventaris berbasis web.

## 1. Latar Belakang

Tujuan proyek ini adalah untuk membangun sebuah aplikasi CRUD (Create, Read, Update, Delete) sederhana untuk manajemen data inventaris. Aplikasi ini ditujukan untuk pengguna internal dengan dua level akses: **Admin** dan **Staff**. Desain aplikasi akan dibuat simpel dan fungsional menggunakan Bootstrap agar mudah digunakan dan tidak memerlukan waktu pengembangan yang lama untuk antarmuka.

## 2. Fitur Utama

### 2.1. Autentikasi dan Manajemen Pengguna
- **Login:** Pengguna harus dapat login menggunakan email dan password.
- **Peran (Roles):** Akan ada dua peran pengguna:
    1.  `admin`: Memiliki akses penuh ke semua fitur aplikasi, termasuk manajemen data inventaris.
    2.  `staff`: Memiliki akses terbatas. Dapat melihat data inventaris dan menambahkan data baru, tetapi tidak dapat mengedit atau menghapus data yang sudah ada.
- **Notifikasi Login:** Setelah berhasil login, pengguna akan disambut dengan notifikasi sederhana (misalnya, "Selamat datang, [Nama Pengguna]!").

### 2.2. Manajemen Inventaris (CRUD)
- **Data Inventaris:** Setiap item inventaris akan memiliki atribut berikut:
    - Nama Barang
    - Tanggal (tanggal barang dicatat/masuk)
    - Ditambahkan Oleh (nama pengguna yang menambahkan item tersebut)
- **Create:** Pengguna (Admin dan Staff) dapat menambahkan item inventaris baru.
- **Read:** Semua pengguna dapat melihat daftar item inventaris.
- **Update:** Hanya Admin yang dapat mengedit informasi item inventaris.
- **Delete:** Hanya Admin yang dapat menghapus item inventaris.

### 2.3. Dashboard
- **Informasi Pengguna:** Menampilkan informasi dasar pengguna yang sedang login (nama dan peran).
- **Notifikasi:** Menampilkan notifikasi sistem, seperti notifikasi setelah login.
- **Tampilan Sederhana:** Dashboard awal tidak akan berisi grafik atau ringkasan data yang kompleks, fokus pada fungsionalitas dasar terlebih dahulu.

## 3. Desain & Teknologi

- **Backend Framework:** Laravel
- **Frontend Framework:** Blade (template engine Laravel) dengan Bootstrap 5 untuk styling.
- **Database:** MySQL atau database relasional lain yang didukung oleh Laravel.
- **Desain UI:** Simpel, bersih, dan intuitif. Mengutamakan fungsionalitas dan kemudahan penggunaan daripada estetika yang berlebihan.

## 4. Rencana Implementasi

1.  **Setup Awal:**
    -   Konfigurasi proyek Laravel.
    -   Membuat sistem autentikasi bawaan.
    -   Menambahkan kolom `role` pada tabel `users`.
2.  **Modul Inventaris:**
    -   Membuat Model, Migration, dan Controller untuk `Inventaris`.
    -   Membuat halaman untuk menampilkan daftar inventaris (`index`).
    -   Membuat form untuk menambah (`create`) dan mengubah (`edit`) data.
3.  **Implementasi Hak Akses:**
    -   Membuat middleware untuk membatasi akses `staff` pada fitur edit dan hapus.
    -   Menyesuaikan tampilan berdasarkan peran pengguna (misalnya, menyembunyikan tombol edit/hapus untuk `staff`).
4.  **Dashboard dan Notifikasi:**
    -   Membuat halaman Dashboard sederhana.
    -   Mengimplementasikan sistem notifikasi session-based untuk pesan selamat datang.
5.  **Finalisasi:**
    -   Membersihkan kode dan memastikan UI konsisten.
