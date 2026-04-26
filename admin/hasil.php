<?php 
include '../koneksi.php';

$page = basename($_SERVER['PHP_SELF']);

$data = mysqli_query($koneksi, "
    SELECT 
        responden.nama,
        AVG(jawaban.jawaban) AS rata_rata,
        CASE 
            WHEN AVG(jawaban.jawaban) >= 4 THEN 'Sangat Baik'
            WHEN AVG(jawaban.jawaban) >= 3 THEN 'Baik'
            WHEN AVG(jawaban.jawaban) >= 2 THEN 'Cukup'
            ELSE 'Kurang'
        END AS kategori,
        MAX(jawaban.tanggal_isi) AS tanggal_isi
    FROM jawaban
    JOIN responden ON jawaban.id_responden = responden.id_responden
    GROUP BY jawaban.id_responden
");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<!-- SIDEBAR -->
<?php include 'includes/sidebar.php'; ?>



<div class="hasil-content">
    <h1>Hasil Kuesioner</h1>

    <div class="hasil-card">
        <table>
            <tr>
                <th>Nama</th>
                <th>Rata-rata</th>
                <th>Kategori</th>
                <th>Waktu Isi</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($data)): ?>
            <tr>
                <td><?= $row['nama'] ?></td>
                <td><?= number_format($row['rata_rata'], 2) ?></td>
                <td><?= $row['kategori'] ?></td>
                <td><?= $row['tanggal_isi'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>

</body>
</html>
