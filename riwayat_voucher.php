<?php
include 'koneksi.php';
include 'layout/header.php';

$data = mysqli_query($conn,
"SELECT voucher.*, paket.nama_paket,
paket.harga, paket.durasi
FROM voucher
JOIN paket
ON voucher.paket_id = paket.id
WHERE voucher.status='Sudah Digunakan'
ORDER BY voucher.used_at DESC");
?>

<div class="table-container">

<div style="
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
">

<h2>Riwayat Voucher Digunakan</h2>

</div>

<table>

<tr>
    <th>Username</th>
    <th>Paket</th>
    <th>Harga</th>
    <th>Durasi</th>
    <th>Status</th>
    <th>Digunakan Pada</th>
</tr>

<?php while($d=mysqli_fetch_array($data)){ ?>

<tr>

<td>
<?= $d['username'] ?>
</td>

<td>
<?= $d['nama_paket'] ?>
</td>

<td>
Rp <?= number_format($d['harga']) ?>
</td>

<td>
<?= $d['durasi'] ?>
</td>

<td>

<span style="
background:#ef4444;
padding:8px 15px;
border-radius:20px;
font-size:13px;
">
Digunakan
</span>

</td>

<td>
<?= $d['used_at'] ?>
</td>

</tr>

<?php } ?>

</table>

</div>

<?php include 'layout/footer.php'; ?>