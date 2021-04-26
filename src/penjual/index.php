<?php

require '../koneksi.php';

session_start();

if(!isset($_SESSION['username'])) {
    die("Anda belum login");
}

if($_SESSION['role'] !="penjual") {
    die("Anda bukan penjual");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page | Penjual</title>
</head>
<body>
    <h1>Welcome <?= $_SESSION["name"]; ?></h1>
    <li><a href="produk/produk.php">Produk</a></li>
    <a href="../logout.php">Logout</a>
</body>
</html>