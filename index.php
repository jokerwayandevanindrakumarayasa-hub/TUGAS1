<?php
require_once 'inc/config.php';
$book = new Book();
$data = $book->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php Utility::showNav(); ?>
    
    <h1>Daftar Koleksi Buku</h1>
    <div><?php Utility::showFlash()?></div>
    <table>
        <thead>
            <tr>
                <th>Cover</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <td>
                    <?php if ($row['cover_path']): ?>
                        <img src="<?= $row['cover_path'] ?>" class="cover">
                    <?php else: ?>
                        <span>-</span>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><?= htmlspecialchars($row['penulis']) ?></td>
                <td><?= $row['tahun_terbit'] ?></td>
                <td><?= $row['kategori'] ?></td>
                <td class="action-links">
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Hapus buku ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>