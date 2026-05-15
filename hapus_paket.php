<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM paket
WHERE id='$id'");

header("Location: paket.php");
?>