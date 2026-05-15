<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
"UPDATE voucher SET
status='Sudah Digunakan',
used_at=NOW()
WHERE id='$id'");

header("Location: voucher_list.php");
?>