<?php
include 'koneksi.php';
include 'layout/header.php';

$data = mysqli_query($conn,
"SELECT * FROM paket
ORDER BY id DESC");
?>

<div class="table-container">

<div style="
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
">

<h2>Paket Internet</h2>

<a href="tambah_paket.php" class="btn">
    Tambah Paket
</a>

</div>

<table>

<tr>
    <th>No</th>
    <th>Nama Paket</th>
    <th>Harga</th>
    <th>Durasi</th>
    <th>Aksi</th>
</tr>

<?php
$no=1;
while($d=mysqli_fetch_array($data)){
?>

<tr>

<td>
<?= $no++ ?>
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

<td style="display:flex; gap:10px;">

<a href="edit_paket.php?id=<?= $d['id'] ?>"
class="btn">
Edit
</a>

<a href="hapus_paket.php?id=<?= $d['id'] ?>"
class="btn"
onclick="return confirm('Hapus paket ini?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<?php include 'layout/footer.php'; ?>