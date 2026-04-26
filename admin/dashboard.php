<?php include 'includes/koneksi.php'; ?>
<?php include 'includes/auth.php'; ?>

<?php $page = basename($_SERVER['PHP_SELF']); ?>

<?php
// hitung jumlah responden
$totalResponden = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM responden")
)['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<!-- SIDEBAR -->
<?php include 'includes/sidebar.php'; ?>

<!-- CONTENT -->
<div class="dashboard-content">
    <h1>Dashboard</h1>

    <div class="dashboard-card">
    <h3>Selamat Datang Admin 👋</h3>
    <p>Ini halaman dashboard sistem kuesioner.</p>

    <br>

    <div class="stat-box">
        <h2><?= $totalResponden ?></h2>
        <p>Total Responden Mengisi Kuesioner</p>
    </div>
</div>

</div>


    
</body>
</html>