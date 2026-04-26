<?php
include './includes/auth.php';
include '../koneksi.php';

$page = basename($_SERVER['PHP_SELF']);

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
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<!-- SIDEBAR -->
<?php include 'includes/sidebar.php'; ?>

<!-- CONTENT -->
<div class="dashboard-content">

    <h1>Edit Pertanyaan</h1>

    <div class="dashboard-card">

        <form method="POST" class="form-pertanyaan">

            <input 
                type="text" 
                name="pertanyaan" 
                class="input-text" 
                value="<?= $row['pertanyaan']; ?>" 
                required
            >

            <button type="submit" name="update" class="pertanyaan-btn-primary">
                Update
            </button>

        </form>

    </div>

</div>

</body>
</html>
