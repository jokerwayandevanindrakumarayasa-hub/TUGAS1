-----

# Aplikasi Manajemen Koleksi Buku (CRUD Sederhana)

## 1\. Deskripsi Aplikasi

Aplikasi ini adalah sistem back-end sederhana berbasis web untuk memanajemen data koleksi buku perpustakaan. Aplikasi ini dikembangkan untuk memenuhi Tugas 1 (Implementasi Aplikasi Back-End CRUD Sederhana).

  * *Entitas Domain:* *Buku*.
  * *Fungsi Utama:* Aplikasi memungkinkan pengguna untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data buku. Setiap buku memiliki atribut judul, penulis, tahun terbit, kategori, dan gambar sampul (cover) yang dapat diunggah.

## 2\. Spesifikasi Teknis

### Lingkungan Pengembangan

  * *Bahasa Pemrograman:* PHP 8.14.3.
  * *DBMS:* MySQL.
  * *Driver Database:* PDO (PHP Data Objects).
  * *Server:* PHP Built-in Web Server.

### Struktur Folder

Berikut adalah ringkasan struktur folder aplikasi:

```text
TUGAS1/
├── class/              # Berisi definisi Class (OOP)
│   ├── Book.php        # Model utama untuk entitas Buku dan logika bisnis
│   ├── Database.php    # Wrapper koneksi database menggunakan PDO
│   └── Utility.php     # Fungsi bantuan (Flash message, Redirect, Navigasi)
├── css/
│   └── style.css       # Styling dasar antarmuka
├── inc/
│   └── config.php      # Konfigurasi DB, Session, dan Autoloader
├── uploads/            # Direktori penyimpanan file gambar cover buku
├── create.php          # Form tambah data
├── delete.php          # Logika penghapusan data
├── edit.php            # Form ubah data
├── index.php           # Halaman utama (Menampilkan daftar buku)
├── save.php            # Logika penyimpanan data baru
├── schema.sql          # Skema database untuk pembuatan tabel
└── update.php          # Logika pembaruan data
```


### Penjelasan Class Utama

1.  **Database (class/Database.php): Bertanggung jawab membuat koneksi ke database MySQL menggunakan PDO dan menangani eksekusi prepared statements.
2.  **Book (class/Book.php): Merepresentasikan entitas "Buku". Class ini menangani properti objek buku serta seluruh operasi database (CRUD) seperti create(), getAll(), setById(), update(), dan delete().
3.  **Utility (class/Utility.php): Class statis yang berisi helper untuk menampilkan pesan notifikasi (flash message), navigasi halaman, dan fungsi redirect.

## 3\. Instruksi Menjalankan Aplikasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi di komputer lokal (Localhost):

### 1\. Persiapan Database

1.  Buat database baru di MySQL (misalnya melalui phpMyAdmin atau terminal).
2.  Impor file schema.sql yang disertakan dalam proyek ini ke dalam database tersebut.
      * File ini akan membuat database bernama perpustakaan_crud dan tabel buku.

### 2\. Konfigurasi Koneksi

Buka file inc/config.php dan sesuaikan bagian konstanta database dengan konfigurasi lokal Anda:
```
php
const DB_HOST = 'localhost';
const DB_USER = 'root';       // Sesuaikan username database
const DB_PASS = '';           // Sesuaikan password database
const DB_NAME = 'perpustakaan_crud';
```

### 3\. Menjalankan Server

Buka terminal/command prompt, arahkan ke direktori root folder proyek ini, lalu jalankan perintah:
```
bash
php -S localhost:8000
```

### 4\. Akses Aplikasi

Buka browser dan kunjungi URL:
```
http://localhost:8000/index.php
```
## 4\. Contoh Skenario Uji Singkat

Berikut adalah skenario pengujian fungsionalitas aplikasi:

1.  *Tambah Data (Create)*

      * Klik menu "Tambah Buku".
      * Isi Judul, Penulis, Tahun Terbit, dan pilih Kategori.
      * Unggah file gambar untuk cover (format .jpg/.png).
      * Klik tombol "Simpan Buku". Data akan tersimpan dan muncul di tabel utama.

2.  *Tampilkan Data (Read)*

      * Buka halaman utama (index.php).
      * Pastikan data buku yang baru dimasukkan tampil pada tabel, lengkap dengan gambar thumbnail cover-nya.

3.  *Ubah Data (Update)*

      * Klik tombol "Edit" pada salah satu baris buku.
      * Ubah data (misalnya mengganti Kategori atau Judul).
      * (Opsional) Unggah cover baru untuk mengganti yang lama.
      * Klik "Update". Perubahan akan tersimpan dan file cover lama akan terhapus otomatis digantikan yang baru.

4.  *Hapus Data (Delete)*

      * Klik tombol "Hapus" pada salah satu buku.
      * Konfirmasi pada browser alert ("Hapus buku ini?").
      * Data akan hilang dari tabel dan file gambar terkait akan dihapus dari folder uploads/.
