<?php
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM pertanyaan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kuesioner</title>
</head>
<body>

    <h2>Form Kuesioner</h2>

    <form action="simpan.php" method="POST">
        <label>Nama</label><br>
        <input type="text" name="nama" required><br><br>

        <?php while($row = mysqli_fetch_assoc($data)) : ?>
            <div style="margin-bottom:20px;">
                <p><strong><?php echo $row['pertanyaan']; ?></strong></p>

                <input type="radio" name="jawaban[<?= $row['id_pertanyaan'] ?>]" value="4" required> Sangat Baik

                <input type="radio" name="jawaban[<?= $row['id_pertanyaan'] ?>]" value="3"> Baik

                <input type="radio" name="jawaban[<?= $row['id_pertanyaan'] ?>]" value="2"> Cukup

                <input type="radio" name="jawaban[<?= $row['id_pertanyaan'] ?>]" value="1"> Kurang

            </div>
        <?php endwhile; ?>

        <button type="submit">Kirim</button>
    </form>

</body>
</html>