<?php
require_once 'inc/config.php';
$prefill = Utility::getPrefill(['judul', 'penulis', 'tahun_terbit', 'kategori']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku Baru</title>
    <style>body { font-family: sans-serif; padding: 20px; } label { display:block; margin-top:10px; }</style>
</head>
<body>
    <h1>Tambah Buku Baru</h1>
    <?php Utility::showNav(); ?>
    <?php Utility::showFlash(); ?>

    <form action="save.php" method="post" enctype="multipart/form-data">
        <label>Judul Buku:</label>
        <input type="text" name="judul" value="<?= $prefill['judul'] ?>" required>

        <label>Penulis:</label>
        <input type="text" name="penulis" value="<?= $prefill['penulis'] ?>" required>

        <label>Tahun Terbit (Angka):</label>
        <input type="number" name="tahun_terbit" value="<?= $prefill['tahun_terbit'] ?>" required min="1900" max="2099">

        <label>Kategori:</label>
        <select name="kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="Novel" <?= $prefill['kategori'] == 'Novel' ? 'selected' : '' ?>>Novel</option>
            <option value="Teknologi" <?= $prefill['kategori'] == 'Teknologi' ? 'selected' : '' ?>>Teknologi</option>
            <option value="Sejarah" <?= $prefill['kategori'] == 'Sejarah' ? 'selected' : '' ?>>Sejarah</option>
        </select>

        <label>Cover Buku (Gambar):</label>
        <input type="file" name="cover" accept="image/*">

        <br><br>
        <button type="submit">Simpan Buku</button>
    </form>
</body>
</html>