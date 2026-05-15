<?php
include 'koneksi.php';
include 'layout/header.php';

$data = mysqli_query($conn,
"SELECT voucher.*, paket.nama_paket,
paket.harga, paket.durasi
FROM voucher
JOIN paket
ON voucher.paket_id=paket.id
WHERE voucher.status='Belum Digunakan'
ORDER BY voucher.id DESC");
?>

<form action="print_voucher.php" method="POST">

<div class="table-container">

<div style="
display:flex;
justify-content:space-between;
margin-bottom:20px;
">

<h2>Data Voucher</h2>

<button class="btn">
    Print Selected
</button>

</div>

<table>

<tr>
    <th></th>
    <th>Username</th>
    <th>Paket</th>
    <th>Harga</th>
    <th>Durasi</th>
    <th>Status</th>
    <th>Dibuat</th>
    <th>Aksi</th>
</tr>

<?php while($d=mysqli_fetch_array($data)){ ?>

<tr>

<td>
<input
type="checkbox"
name="voucher[]"
value="<?= $d['id'] ?>">
</td>

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

<?php if($d['status']=="Belum Digunakan"){ ?>

<span style="
background:#22c55e;
padding:8px 15px;
border-radius:20px;
font-size:13px;
">
Aktif
</span>

<?php } else { ?>

<span style="
background:#ef4444;
padding:8px 15px;
border-radius:20px;
font-size:13px;
">
Digunakan
</span>

<?php } ?>

</td>

<td>
<?= $d['created_at'] ?>
</td>

<td style="display:flex; gap:10px;">

<a href="gunakan_voucher.php?id=<?= $d['id'] ?>"
class="btn">
Gunakan
</a>

<a href="hapus_voucher.php?id=<?= $d['id'] ?>"
class="btn"
onclick="return confirm('Hapus voucher ini?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</form>

<?php include 'layout/footer.php'; ?>