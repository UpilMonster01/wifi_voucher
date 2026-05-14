<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

include 'koneksi.php';

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

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
class="btn btn-primary w-100 text-start mb-2">

🏠 Dashboard

</a>

<a href="tambah_paket.php"
class="btn btn-dark w-100 text-start mb-2">

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

<i class="bi bi-speedometer2"></i>

Dashboard

</h2>

<div class="row">

<div class="col-md-4">

<div class="card shadow border-0">

<div class="card-body text-center">

<h5>Total Voucher</h5>

<h1><?= $totalVoucher ?></h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow border-0">

<div class="card-body text-center">

<h5>Voucher Aktif</h5>

<h1><?= $totalAktif ?></h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow border-0">

<div class="card-body text-center">

<h5>Total Paket</h5>

<h1><?= $totalPaket ?></h1>

</div>

</div>

</div>

</div>

<div class="card shadow border-0 p-4 mt-4">

<h4 class="mb-3">

Grafik Statistik

</h4>

<canvas id="myChart"></canvas>

</div>

</div>

</div>

</div>

<script>

const ctx = document.getElementById('myChart');

new Chart(ctx, {

type: 'bar',

data: {

labels: [
'Total Voucher',
'Voucher Aktif',
'Total Paket'
],

datasets: [{

label: 'Statistik',

data: [

<?= $totalVoucher ?>,
<?= $totalAktif ?>,
<?= $totalPaket ?>

],

borderWidth: 1

}]

},

options: {

responsive: true,

scales: {

y: {

beginAtZero: true

}

}

}

});

</script>

</body>
</html>