<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

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

    header("Location: tambah_paket.php");
}

$data = mysqli_query($conn, "SELECT * FROM paket");

?>

<!DOCTYPE html>
<html>
<head>

<title>Paket Internet</title>

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

<a href="voucher.php"
class="btn btn-dark w-100 text-start mb-2">

🏠 Dashboard

</a>

<a href="tambah_paket.php"
class="btn btn-primary w-100 text-start mb-2">

📦 Paket Internet

</a>

<a href="voucher.php"
class="btn btn-dark w-100 text-start mb-2">

🎫 Voucher

</a>

<a href="logout.php"
class="btn btn-danger w-100 text-start">

🚪 Logout

</a>

</div>

<div class="col-md-10 p-4">

<h2 class="mb-4">

<i class="bi bi-box"></i>

Paket Internet

</h2>

<div class="card shadow border-0 p-4 mb-4">

<h4 class="mb-3">

Tambah Paket

</h4>

<form method="POST">

<input type="text"
name="nama"
class="form-control mb-3"
placeholder="Nama Paket">

<input type="text"
name="durasi"
class="form-control mb-3"
placeholder="Durasi">

<input type="number"
name="harga"
class="form-control mb-3"
placeholder="Harga">

<button name="simpan"
class="btn btn-primary">

Simpan

</button>

</form>

</div>

<div class="card shadow border-0 p-4">

<table class="table table-hover">

<tr>

<th>No</th>
<th>Nama Paket</th>
<th>Durasi</th>
<th>Harga</th>

</tr>

<?php

$no = 1;

while($d = mysqli_fetch_array($data)){

?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['nama_paket'] ?></td>

<td><?= $d['durasi'] ?></td>

<td>Rp <?= $d['harga'] ?></td>

</tr>

<?php } ?>

</table>

</div>

</div>

</div>

</div>

</body>
</html>