<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $u = $_POST['username'];
    $p = $_POST['password'];

    $cek = mysqli_query($conn,
    "SELECT * FROM admin
    WHERE username='$u'
    AND password='$p'");

    if(mysqli_num_rows($cek) > 0){

        $_SESSION['login'] = true;

        header("Location: dashboard.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Login</title>

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="login-page">

    <form method="POST" class="login-box">

        <h1>Admin Login</h1>

        <input type="text"
        name="username"
        placeholder="Username"
        required>

        <input type="password"
        name="password"
        placeholder="Password"
        required>

        <button class="btn"
        name="login">
        Login
        </button>

    </form>

</div>

</body>
</html>