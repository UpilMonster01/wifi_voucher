<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){

    mysqli_query($conn,
    "INSERT INTO paket
    VALUES(
    '',
    '$_POST[nama]',
    '$_POST[harga]',
    '$_POST[durasi]'
    )");

    header("Location: paket.php");
}
?>

<form method="POST">

<input type="text" name="nama" placeholder="Nama Paket">

<input type="number" name="harga" placeholder="Harga">

<input type="text" name="durasi" placeholder="Durasi">

<button name="simpan">Simpan</button>

</form>