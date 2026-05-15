<?php
include 'koneksi.php';
include 'layout/header.php';

$id = $_GET['id'];

$data = mysqli_fetch_array(
mysqli_query($conn,
"SELECT * FROM paket
WHERE id='$id'")
);

if(isset($_POST['update'])){

    mysqli_query($conn,
    "UPDATE paket SET
    nama_paket='$_POST[nama]',
    harga='$_POST[harga]',
    durasi='$_POST[durasi]'
    WHERE id='$id'");

    echo "
    <script>
        alert('Paket berhasil diupdate');
        window.location='paket.php';
    </script>
    ";
}
?>

<div class="card">

<h2 style="margin-bottom:20px;">
Edit Paket Internet
</h2>

<form method="POST">

<input
type="text"
name="nama"
value="<?= $data['nama_paket'] ?>"
required>

<input
type="number"
name="harga"
value="<?= $data['harga'] ?>"
required>

<input
type="text"
name="durasi"
value="<?= $data['durasi'] ?>"
required>

<button
type="submit"
name="update"
class="btn">
Update Paket
</button>

</form>

</div>

<?php include 'layout/footer.php'; ?>