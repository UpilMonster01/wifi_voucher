<?php
session_start();

if(!isset($_SESSION['login'])){

    header("Location: login.php");

}
include 'koneksi.php';


if(isset($_POST['generate'])){

    $paket = $_POST['paket'];

    $kode = strtoupper(substr(md5(rand()),0,8));

    mysqli_query($conn, "INSERT INTO voucher VALUES(
        null,
        '$kode',
        '$paket',
        'aktif'
    )");
}

$totalVoucher = mysqli_num_rows(
mysqli_query($conn, "SELECT * FROM voucher")
);

$totalPaket = mysqli_num_rows(
mysqli_query($conn, "SELECT * FROM paket")
);

$totalAktif = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM voucher WHERE status='aktif'")
);

$totalPendapatan = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT SUM(harga) as total
FROM voucher
JOIN paket
ON voucher.paket_id = paket.id")
);

$data = mysqli_query($conn, "
SELECT
voucher.id as vid,
voucher.kode_voucher,
voucher.status,
paket.nama_paket,
paket.durasi

FROM voucher

JOIN paket
ON voucher.paket_id = paket.id
");
?>

<!DOCTYPE html>
<html>
<head>

<title>Voucher WiFi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<h1 class="mb-4 text-center">
Bintang.Net Voucher
</h1>
<a href="logout.php"
class="btn btn-dark mb-3">

Logout

</a>
<div class="row mb-4">

<div class="col-md-3">

<div class="card text-center shadow">

<div class="card-body">

<h5>Total Voucher</h5>

<h2>

<?= $totalVoucher ?>

</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-center shadow">

<div class="card-body">

<h5>Voucher Aktif</h5>

<h2>

<?= $totalAktif ?>

</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-center shadow">

<div class="card-body">

<h5>Total Paket</h5>

<h2>

<?= $totalPaket ?>

</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-center shadow">

<div class="card-body">

<h5>Pendapatan</h5>

<h5>

Rp <?= $totalPendapatan['total'] ?>

</h5>

</div>

</div>

</div>

</div>

<form method="POST" class="card p-4 shadow">

<select name="paket" class="form-select">

<?php

$paket = mysqli_query($conn, "SELECT * FROM paket");

while($p = mysqli_fetch_array($paket)){

?>

<option value="<?= $p['id'] ?>">

<?= $p['nama_paket'] ?> -
Rp <?= $p['harga'] ?>

</option>

<?php } ?>

</select>

<button name="generate" class="btn btn-primary mt-3">
Generate Voucher
</button>

</form>

<br><br>

<table class="table table-bordered table-striped mt-4">

<tr>
    <th>No</th>
    <th>Kode Voucher</th>
    <th>Paket</th>
    <th>Durasi</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php

$no = 1;

while($d = mysqli_fetch_array($data)){

?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['kode_voucher'] ?></td>

<td><?= $d['nama_paket'] ?></td>

<td><?= $d['durasi'] ?></td>

<td>

<?php

if($d['status'] == 'aktif'){

    echo "<span class='badge bg-success'>
    Aktif
    </span>";

}else{

    echo "<span class='badge bg-danger'>
    Terpakai
    </span>";

}

?>

</td>
<td>

<a href="hapus_voucher.php?id=<?= $d['vid'] ?>"
class="btn btn-danger btn-sm">

Hapus

</a>
<a href="print.php?id=<?= $d['vid'] ?>"
class="btn btn-success btn-sm">

Print

</a>
<a href="pakai.php?id=<?= $d['vid'] ?>"
class="btn btn-warning btn-sm">

Pakai

</a>

</td>

</tr>

<?php } ?>

</table>

</body>
<div class="container mt-5">
</div>
</html>