<?php
include './includes/auth.php';
include '../koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM responden ORDER BY id_responden DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Kuesioner</title>
</head>
<body>

<h2 class="page-title">Data Responden</h2>

<table class="table-data" border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Tanggal Isi</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($data)) : ?>
    <tr>
        <td><?php echo $row['id_responden']; ?></td>
        <td><?php echo htmlspecialchars($row['nama']); ?></td>
        <td><?php echo $row['tanggal_isi']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<br>
<a href="dashboard.php">Kembali</a>

</body>
</html>