<?php
session_start();

include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn, "
    SELECT * FROM admin
    WHERE username='$username'
    AND password='$password'
    ");

    if(mysqli_num_rows($cek) > 0){

        $_SESSION['login'] = true;

        header("Location: voucher.php");

    }else{

        echo "Login gagal";

    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-4">

<div class="card shadow p-4">

<h3 class="text-center mb-4">
Login Admin
</h3>

<form method="POST">

<input type="text"
name="username"
class="form-control"
placeholder="Username">

<br>

<input type="password"
name="password"
class="form-control"
placeholder="Password">

<br>

<button name="login"
class="btn btn-primary w-100">

Login

</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>