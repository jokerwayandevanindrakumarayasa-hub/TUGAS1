<?php
require_once 'inc/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book = new Book();
    $book->judul = $_POST['judul'];
    $book->penulis = $_POST['penulis'];
    $book->tahun_terbit = $_POST['tahun_terbit'];
    $book->kategori = $_POST['kategori'];
    $book->cover_path = null;

    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
        $targetDir = "uploads/";
    
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $originalName = basename($_FILES["cover"]["name"]);
        $imageFileType = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        $fileName = time() . "_" . $originalName;
        $targetFile = $targetDir . $fileName;

        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageFileType, $allowed)) {
            if (move_uploaded_file($_FILES["cover"]["tmp_name"], $targetFile)) {
                $book->cover_path = $targetFile;
            } else {
                echo "Gagal mengupload gambar.";
                exit;
            }
        } else {
            echo "Format file tidak didukung! Hanya JPG, JPEG, PNG, & GIF.";
            exit;
        }
    }

    if ($book->create()) {
        header("Location: index.php");
    } else {
        echo "Gagal menyimpan data ke database.";
    }
} else {
    header("Location: create.php");
}