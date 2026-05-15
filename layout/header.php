<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Wifi Voucher</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

</head>

<body>

<div class="wrapper">

<?php include 'layout/sidebar.php'; ?>

<div class="main">

<div class="topbar">
    <h2>Wifi Voucher Management</h2>

    <div>
        Admin Panel
    </div>
</div>