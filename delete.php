<?php
require_once 'inc/config.php';
$id = $_GET['id'] ?? 0;
$book = new Book();

if ($book->delete($id)) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data.";
}