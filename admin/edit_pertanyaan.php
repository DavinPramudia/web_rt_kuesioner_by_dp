<?php
include './includes/auth.php';
include '../koneksi.php';

$id_pertanyaan = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM pertanyaan WHERE id_pertanyaan='$id_pertanyaan'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $pertanyaan = $_POST['pertanyaan'];

    mysqli_query($koneksi, "UPDATE pertanyaan SET pertanyaan='$pertanyaan' WHERE id_pertanyaan='$id_pertanyaan'");

    header("Location: pertanyaan.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pertanyaan</title>
</head>
<body>

<div class="edit-container">
    <h2 class="page-title">Edit Pertanyaan</h2>

    <form method="POST" class="form-edit">
        <input type="text" name="pertanyaan" class="input-text" value="<?= $row['pertanyaan']; ?>" required>
        <button type="submit" name="update" class="btn-primary">Update</button>
    </form>
</div>

<br>
<a href="pertanyaan.php">Kembali</a>

</body>
</html>