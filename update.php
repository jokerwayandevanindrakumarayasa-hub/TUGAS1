<?php
require_once 'inc/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book = new Book();
    $id = $_POST['id'];
    
    if ($book->setById($id)) {
        $book->judul = $_POST['judul'];
        $book->penulis = $_POST['penulis'];
        $book->tahun_terbit = $_POST['tahun_terbit'];
        $book->kategori = $_POST['kategori'];

        // Cek jika ada file baru
        if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
            $targetDir = "uploads/";
            $fileName = time() . "_" . basename($_FILES["cover"]["name"]);
            $targetFile = $targetDir . $fileName;

            if (move_uploaded_file($_FILES["cover"]["tmp_name"], $targetFile)) {
                // Hapus file lama
                if ($book->cover_path && file_exists($book->cover_path)) {
                    unlink($book->cover_path);
                }
                $book->cover_path = $targetFile;
            }
        } else {
            $book->cover_path = null; // Tidak ada file baru, Model akan mengabaikan update cover
        }

        if ($book->update()) {
            header("Location: index.php");
        } else {
            echo "Gagal Update";
        }
    }
}