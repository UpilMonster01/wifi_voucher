<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "
SELECT
voucher.kode_voucher,
paket.nama_paket,
paket.harga,
paket.durasi

FROM voucher

JOIN paket
ON voucher.paket_id = paket.id

WHERE voucher.id='$id'
");

$d = mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html>
<head>

<title>Print Voucher</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body onload="window.print()">

<div class="container mt-5">

<div class="card p-4 text-center">

<h2>Bintang.Net</h2>

<hr>

<h4>Voucher WiFi</h4>

<br>

<h1>

<?= $d['kode_voucher'] ?>

</h1>

<img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?= $d['kode_voucher'] ?>">
<br>

<p>

Paket:
<b><?= $d['nama_paket'] ?></b>

</p>

<p>

Durasi:
<b><?= $d['durasi'] ?></b>

</p>

<p>

Harga:
<b>Rp <?= $d['harga'] ?></b>

</p>

<hr>

<p>
Terima kasih
</p>

</div>

</div>

</body>
</html>