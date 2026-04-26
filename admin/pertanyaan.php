<?php
include './includes/auth.php';
include '../koneksi.php';

$page = basename($_SERVER['PHP_SELF']);

if (isset($_POST['tambah'])) {
    $pertanyaan = $_POST['pertanyaan'];
    mysqli_query($koneksi, "INSERT INTO pertanyaan (pertanyaan) VALUES ('$pertanyaan')");
    header("Location: pertanyaan.php");
    exit();
}

if (isset($_GET['hapus'])) {
    $id_pertanyaan = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM pertanyaan WHERE id_pertanyaan='$id_pertanyaan'");
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
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<!-- SIDEBAR -->
<?php include 'includes/sidebar.php'; ?>

<!-- CONTENT WAJIB -->
<div class="dashboard-content">

    <h1 class="pertanyaan-title">Kelola Pertanyaan</h1>

    <!-- FORM -->
    <form method="POST" class="form-pertanyaan">
        <input type="text" name="pertanyaan" class="input-text" placeholder="Masukkan pertanyaan" required>
        <button type="submit" name="tambah" class="pertanyaan-btn-primary">Tambah</button>
    </form>

    <!-- TABLE CARD -->
    <div class="pertanyaan-card">
        <table>
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
                    <a class="pertanyaan-btn-edit" href="edit_pertanyaan.php?id=<?= $row['id_pertanyaan']; ?>">Edit</a>
                    <a class="pertanyaan-btn-delete" href="pertanyaan.php?hapus=<?= $row['id_pertanyaan']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>


</div>

</body>
</html>
