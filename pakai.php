<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
"UPDATE voucher
SET status='terpakai'
WHERE id='$id'
");

header("Location: voucher.php");

?>