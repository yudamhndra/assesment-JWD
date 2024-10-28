
---

# PORTAL PENDAFTARAN BEASISWA

## Daftar Isi

- [Tentang Proyek](#tentang-proyek)
- [Fitur](#fitur)
- [Prasyarat](#prasyarat)
- [Instalasi](#instalasi)
- [Struktur Proyek](#struktur-proyek)
- [Penggunaan](#penggunaan)
- [Kontributor](#kontributor)
- [Lisensi](#lisensi)

---

## Tentang Proyek

Proyek ini adalah aplikasi web sederhana yang dibuat menggunakan **PHP Native** (tanpa framework) untuk aplikasi manajemen pendaftaran beasiswa. Proyek ini dirancang untuk tugas asesi sertifikasi junior web developer, dan menggunakan PHP untuk backend, HTML, CSS, dan JavaScript untuk frontend.

## Fitur

- CRUD (Create, Read, Update, Delete) data.

## Prasyarat

Sebelum menjalankan proyek ini, pastikan Anda sudah menginstal perangkat berikut:

- **PHP** (minimal versi 7.4) - untuk menjalankan server
- **MySQL** - untuk basis data (atau bisa juga menggunakan MariaDB)
- **Apache** atau **Nginx** - direkomendasikan untuk menggunakan XAMPP atau WAMP jika Anda menjalankan proyek di localhost.

## Instalasi

### 1. Clone Repository

Clone repository ini ke dalam direktori lokal Anda:

```bash
git clone https://github.com/yudamhndra/assesment-JWD.git
cd assesment-JWD
```

### 2. Konfigurasi Database

- Buat database baru di MySQL (misalnya `project_db`).
- Import file SQL yang disertakan di dalam proyek (misalnya `database.sql`) untuk membuat tabel dan mengisi data awal.

### 3. Pengaturan Konfigurasi

Buat file `config.php` di folder `backend/` atau `includes/` (sesuaikan dengan struktur proyek) dan sesuaikan dengan detail database Anda seperti berikut:

```php
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "project_db";

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Koneksi gagal: " . $connection->connect_error);
}
?>
```

### 4. Menjalankan Server

Jika Anda menggunakan XAMPP/WAMP:
- Letakkan folder proyek ini di dalam folder `htdocs` (misalnya, `C:/xampp/htdocs/project-name`).
- Buka browser dan akses `http://localhost/project-name`.

Atau Anda bisa menjalankan server bawaan PHP dengan perintah berikut:

```bash
php -S localhost:8000
```

Kemudian buka browser dan akses `http://localhost:8000`.

## Struktur Proyek

Berikut adalah struktur proyek secara umum:

```
project-name/
├── backend/
│   ├── config.php              # File konfigurasi database
│   ├── RegistrationProcess.php  # Proses pendaftaran
│   └── uploads/                # Folder untuk file yang diunggah
├── frontend/
│   ├── index.php               # Halaman utama
│   ├── registration.php        # Form pendaftaran
│   ├── hasil.php               # Hasil pendaftaran
│   └── includes/
│       ├── Header.php          # Template header
│       └── Footer.php          # Template footer
└── README.md                   # Dokumentasi proyek
```

## Penggunaan

1. **Buka Halaman Utama**: Akses `index.php` di browser untuk masuk ke halaman utama aplikasi.
2. **Registrasi**: Akses `registration.php` untuk melakukan pendaftaran atau input data sesuai kebutuhan aplikasi.
3. **Lihat Hasil**: Akses `hasil.php` untuk melihat data yang telah didaftarkan atau diproses.

### Catatan

- Jika ada batasan khusus atau error saat menjalankan aplikasi, pastikan file `config.php` sudah benar dan database sudah disiapkan.
- Semua file yang diunggah akan disimpan di dalam folder `uploads/`.

## Kontributor

- Nama: Mahendra Yuda Pradana
- Email: mahendrayudapradana@mail.ugm.ac.id

## Lisensi

--- 
