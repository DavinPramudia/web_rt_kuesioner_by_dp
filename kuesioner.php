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

            <label>
                <input type="radio" name="jawaban[<?php echo $row['id_pertanyaan']; ?>]" value="Sangat Baik" required>
                Sangat Baik
            </label><br>

            <label>
                <input type="radio" name="jawaban[<?php echo $row['id_pertanyaan']; ?>]" value="Baik">
                Baik
            </label><br>

            <label>
                <input type="radio" name="jawaban[<?php echo $row['id_pertanyaan']; ?>]" value="Cukup">
                Cukup
            </label><br>

            <label>
                <input type="radio" name="jawaban[<?php echo $row['id_pertanyaan']; ?>]" value="Kurang">
                Kurang
            </label>
        </div>
    <?php endwhile; ?>

    <button type="submit">Kirim</button>
</form>

</body>
</html>