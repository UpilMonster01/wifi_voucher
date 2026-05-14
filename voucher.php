<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

include 'koneksi.php';

if(isset($_POST['generate'])){

    $paket = $_POST['paket'];

    $jumlah = $_POST['jumlah'];

    for($i=1; $i <= $jumlah; $i++){

        $kode = strtoupper(substr(md5(rand()),0,8));

        mysqli_query($conn, "INSERT INTO voucher VALUES(
            null,
            '$kode',
            '$paket',
            'aktif'
        )");

    }

}

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

<title>Voucher</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container-fluid">

<div class="row">

<div class="col-md-2 bg-dark text-white min-vh-100 p-3">

<h3 class="mb-4">

<i class="bi bi-wifi"></i>

Bintang.Net

</h3>

<a href="dashboard.php"
class="btn btn-dark w-100 text-start mb-2">

🏠 Dashboard

</a>

<a href="tambah_paket.php"
class="btn btn-dark w-100 text-start mb-2">

📦 Paket Internet

</a>

<a href="voucher.php"
class="btn btn-primary w-100 text-start mb-2">

🎫 Voucher

</a>

<a href="logout.php"
class="btn btn-danger w-100 text-start">

🚪 Logout

</a>

</div>

<div class="col-md-10 p-4">

<h2 class="mb-4">

<i class="bi bi-ticket-perforated"></i>

Data Voucher

</h2>

<div class="card shadow border-0 p-4 mb-4">

<h4 class="mb-3">

Generate Voucher

</h4>

<form method="POST">

<input type="number"
name="jumlah"
class="form-control mb-3"
placeholder="Jumlah Voucher"
required>

<select name="paket"
class="form-select">

<?php

$paket = mysqli_query($conn,
"SELECT * FROM paket");

while($p = mysqli_fetch_array($paket)){

?>

<option value="<?= $p['id'] ?>">

<?= $p['nama_paket'] ?> -
Rp <?= $p['harga'] ?>

</option>

<?php } ?>

</select>

<button name="generate"
class="btn btn-primary mt-3">

Generate Voucher

</button>

</form>

</div>

<div class="card shadow border-0 p-4">

<table class="table table-hover align-middle">

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

<td>

<span class="badge bg-dark fs-6">

<?= $d['kode_voucher'] ?>

</span>

</td>

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

<a href="print.php?id=<?= $d['vid'] ?>"
class="btn btn-success btn-sm">

🖨 Print

</a>

<a href="pakai.php?id=<?= $d['vid'] ?>"
class="btn btn-warning btn-sm">

✔ Pakai

</a>

<a href="hapus_voucher.php?id=<?= $d['vid'] ?>"
class="btn btn-danger btn-sm">

🗑 Hapus

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</div>

</div>

</body>
</html>