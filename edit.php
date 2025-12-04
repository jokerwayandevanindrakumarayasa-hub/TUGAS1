<?php
require_once 'inc/config.php';
$id = $_GET['id'] ?? 0;
$book = new Book();
if (!$book->setById($id)) header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php Utility::showNav(); ?>

    <form action="update.php" method="POST" enctype="multipart/form-data">
        <h1>Edit Data Buku</h1>
        <input type="hidden" name="id" value="<?= $book->id ?>">

        <label>Judul Buku</label>
        <input type="text" name="judul" value="<?= htmlspecialchars($book->judul) ?>" required>

        <label>Penulis</label>
        <input type="text" name="penulis" value="<?= htmlspecialchars($book->penulis) ?>" required>

        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" value="<?= $book->tahun_terbit ?>" required>

        <label>Kategori</label>
        <select name="kategori" required>
            <option value="Fiksi" <?= ($book->kategori == 'Fiksi') ? 'selected' : '' ?>>Fiksi</option>
            <option value="Sains" <?= ($book->kategori == 'Sains') ? 'selected' : '' ?>>Sains</option>
            <option value="Sejarah" <?= ($book->kategori == 'Sejarah') ? 'selected' : '' ?>>Sejarah</option>
            <option value="Teknologi" <?= ($book->kategori == 'Teknologi') ? 'selected' : '' ?>>Teknologi</option>
        </select>

        <label>Cover Saat Ini</label>
        <?php if ($book->cover_path): ?>
            <img src="<?= $book->cover_path ?>" width="100"><br>
        <?php endif; ?>
        
        <label>Ganti Cover (Opsional)</label>
        <input type="file" name="cover" accept="image/*">

        <button type="submit">Update</button>
    </form>
</body>
</html>