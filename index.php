<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $durasi = $_POST['durasi'];
    $harga = $_POST['harga'];

    mysqli_query($conn, "INSERT INTO paket VALUES(
        null,
        '$nama',
        '$durasi',
        '$harga'
    )");

    header("Location: index.php");
}
?>

<h1>Tambah Paket</h1>

<form method="POST">

<input type="text" name="nama" placeholder="Nama Paket">
<br><br>

<input type="text" name="durasi" placeholder="Durasi">
<br><br>

<input type="number" name="harga" placeholder="Harga">
<br><br>

<button name="simpan">
    Simpan
</button>

</form>