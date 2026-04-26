<?php
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM pertanyaan");
$questions = [];

while ($row = mysqli_fetch_assoc($data)) {
    $questions[] = $row;
}

$perPage = 5;
$totalSteps = ceil(count($questions) / $perPage);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kuesioner</title>

<link rel="stylesheet" href="admin/css/style.css">
</head>

<body>
<header class="header_kuesioner">

<div class="container">
    <h2>Form Kuesioner</h2>

    <form action="simpan.php" method="POST">

        <!-- NAMA -->
        <div class="step active">
            <label>Masukkan Nama Anda Di Bawah</label>
            <input type="text" name="nama" required>
        </div>

        <!-- PERTANYAAN PER 5 -->
        <?php for ($i = 0; $i < count($questions); $i += $perPage): ?>
            <div class="step">

                <?php for ($j = $i; $j < $i + $perPage && $j < count($questions); $j++): ?>
                    <div style="margin-bottom:20px;">
                        <p><strong><?= $questions[$j]['pertanyaan']; ?></strong></p>

                        <label><input type="radio" name="jawaban[<?= $questions[$j]['id_pertanyaan'] ?>]" value="4" required> Sangat Baik</label>
                        <label><input type="radio" name="jawaban[<?= $questions[$j]['id_pertanyaan'] ?>]" value="3"> Baik</label>
                        <label><input type="radio" name="jawaban[<?= $questions[$j]['id_pertanyaan'] ?>]" value="2"> Cukup</label>
                        <label><input type="radio" name="jawaban[<?= $questions[$j]['id_pertanyaan'] ?>]" value="1"> Kurang</label>
                    </div>
                <?php endfor; ?>

            </div>
        <?php endfor; ?>

        <!-- NAV -->
        <div class="nav">
            <button type="button" onclick="prevStep()">Previous</button>
            <button type="button" onclick="nextStep()">Next</button>
            <button type="submit" id="submitBtn" style="display:none;">Kirim</button>
        </div>

    </form>
</div>
</header>   
<script src="./script/script.js"></script>

</body>
</html>
