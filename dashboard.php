<?php
include 'koneksi.php';
include 'layout/header.php';

$paket = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM paket"));
$voucher = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM voucher"));
?>

<div class="card-grid">

    <div class="card">
        <p>Total Paket</p>
        <h2><?= $paket ?></h2>
    </div>

    <div class="card">
        <p>Total Voucher</p>
        <h2><?= $voucher ?></h2>
    </div>

    <div class="card">
        <p>Voucher Aktif</p>
        <h2><?= $voucher ?></h2>
    </div>

</div>

<div class="table-container">

    <canvas id="myChart"></canvas>

</div>

<script>

const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Paket', 'Voucher'],
        datasets: [{
            label: 'Statistik',
            data: [<?= $paket ?>, <?= $voucher ?>]
        }]
    }
});

</script>

<?php include 'layout/footer.php'; ?>