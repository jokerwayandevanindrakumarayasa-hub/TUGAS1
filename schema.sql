CREATE DATABASE IF NOT EXISTS perpustakaan_crud;
USE perpustakaan_crud;

CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    tahun_terbit INT NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    cover_path VARCHAR(255) DEFAULT NULL, -- Menyimpan path gambar (misal: uploads/gambar.jpg)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);