<?php
include "koneksi.php";

$nama = $_POST['nama'];

mysqli_query($koneksi, "INSERT INTO responden (nama) VALUES ('$nama')");
$id_responden = mysqli_insert_id($koneksi);

foreach($_POST['jawaban'] as $id_pertanyaan => $jawaban){
    mysqli_query($koneksi, "
        INSERT INTO jawaban (id_responden, id_pertanyaan, jawaban)
        VALUES ('$id_responden', '$id_pertanyaan', '$jawaban')
    ");
}

echo "
<script> alert('Terima kasih sudah mengisi kuesioner'); window.parent.location.href='index.php'; </script>";

?>