<?php
include 'koneksi.php';

if(!isset($_POST['voucher'])){
    die("Tidak ada voucher dipilih");
}

$id = implode(",", $_POST['voucher']);

$data = mysqli_query($conn,
"SELECT voucher.*, paket.nama_paket,
paket.harga, paket.durasi
FROM voucher
JOIN paket
ON voucher.paket_id=paket.id
WHERE voucher.id IN ($id)");
?>

<!DOCTYPE html>
<html>
<head>

<title>Print Voucher</title>

<link rel="stylesheet"
href="assets/css/style.css">

<style>

body{
    background:white;
    padding:20px;
}

.print-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
}

.print-card{
    border:2px dashed #555;
    border-radius:20px;
    padding:20px;
    color:#111;
    page-break-inside:avoid;
}

.print-title{
    font-size:18px;
    font-weight:700;
    margin-bottom:15px;
}

.print-user{
    font-size:30px;
    font-weight:700;
    color:#4f46e5;
    margin:20px 0;
}

.small{
    font-size:14px;
    margin-top:8px;
}

</style>

</head>

<body onload="window.print()">

<div class="print-grid">

<?php while($d=mysqli_fetch_array($data)){ ?>

<div class="print-card">

<div class="print-title">
Wifi Voucher
</div>

<div>
<?= $d['nama_paket'] ?>
</div>

<div class="print-user">
<?= $d['username'] ?>
</div>

<div class="small">
Durasi : <?= $d['durasi'] ?>
</div>

<div class="small">
Harga : Rp <?= number_format($d['harga']) ?>
</div>

<div class="small">
Status : <?= $d['status'] ?>
</div>

</div>

<?php } ?>

</div>

</body>
</html>