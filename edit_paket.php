<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM paket WHERE id='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $durasi = $_POST['durasi'];
    $harga = $_POST['harga'];

    mysqli_query($conn, "UPDATE paket SET
        nama_paket='$nama',
        durasi='$durasi',
        harga='$harga'
        WHERE id='$id'
    ");

    header("Location: index.php");
}
?>

<h1>Edit Paket</h1>

<form method="POST">

<input type="text"
name="nama"
value="<?= $d['nama_paket'] ?>">
<br><br>

<input type="text"
name="durasi"
value="<?= $d['durasi'] ?>">
<br><br>

<input type="number"
name="harga"
value="<?= $d['harga'] ?>">
<br><br>

<button name="update">
    Update
</button>

</form>