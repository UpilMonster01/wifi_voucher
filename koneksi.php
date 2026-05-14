<?php 
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "wifi_voucher"
);
if (!$conn) {
    die("koneksi gagal");
}
?>