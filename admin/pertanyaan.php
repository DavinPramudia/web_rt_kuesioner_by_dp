<?php
include './includes/auth.php';
include '../koneksi.php';

if (isset($_POST['tambah'])) {
    $pertanyaan = $_POST['pertanyaan'];
    mysqli_query($koneksi, "INSERT INTO pertanyaan (pertanyaan) VALUES ('$pertanyaan')");
    header("Location: pertanyaan.php");
    exit();
}

if (isset($_GET['hapus'])) {
    $id_pertanyaan = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM pertanyaan WHERE id='$id_pertanyaan'");
    header("Location: pertanyaan.php");
    exit();
}

$data = mysqli_query($koneksi, "SELECT * FROM pertanyaan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pertanyaan</title>
</head>
<body>

<h2 class="page-title">Kelola Pertanyaan</h2>

<form method="POST" class="form-pertanyaan">
    <input type="text" name="pertanyaan" class="input-text" placeholder="Masukkan pertanyaan" required>
    <button type="submit" name="tambah" class="btn-primary">Tambah</button>
</form>

<br>

<table class="table-data" border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Pertanyaan</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; ?>
    <?php while ($row = mysqli_fetch_assoc($data)) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['pertanyaan']; ?></td>
        <td>
            <a class="btn-edit" href="edit_pertanyaan.php?id=<?= $row['id_pertanyaan']; ?>">Edit</a>
            <a class="btn-delete" href="pertanyaan.php?hapus=<?= $row['id_pertanyaan']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<br>
<a href="dashboard.php">Kembali</a>

</body>
</html>