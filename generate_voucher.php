<?php
include 'koneksi.php';
include 'layout/header.php';

if(isset($_POST['generate'])){

    $paket = $_POST['paket'];
    $jumlah = $_POST['jumlah'];

    for($i=1; $i<=$jumlah; $i++){

        $username = "VC".rand(10000,99999);

        mysqli_query($conn,
        "INSERT INTO voucher(
        paket_id,
        username
        ) VALUES(
        '$paket',
        '$username'
        )");
    }

    echo "<script>
    alert('Voucher berhasil dibuat');
    </script>";
}

$paket = mysqli_query($conn,"SELECT * FROM paket");
?>

<div class="card">

<form method="POST">

<select name="paket">

<?php while($p=mysqli_fetch_array($paket)){ ?>

<option value="<?= $p['id'] ?>">
<?= $p['nama_paket'] ?>
</option>

<?php } ?>

</select>

<input type="number"
name="jumlah"
placeholder="Jumlah Voucher">

<button class="btn"
name="generate">
Generate Voucher
</button>

</form>

</div>

<?php include 'layout/footer.php'; ?>