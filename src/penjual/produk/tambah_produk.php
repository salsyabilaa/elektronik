<?php

require '../../koneksi.php';

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
    <h1>Tambah Produk</h1>
    

    <form action="simpan_produk.php" method="post" enctype="multipart/form-data">
        <label>Nama Produk</label>
        <input type="text" name="name_produk">
        <br />

        <label>Foto Produk</label>
        <input type="file" name="image">
        <br />

        <label>Harga</label>
        <input type="text" name="price">
        <br />

        <label>Deskripsi</label>
        <textarea name="deskripsi"></textarea>
        <br />

        <button type="submit">Tambah Data</button>

    </form>
    <a href="../../logout.php">Logout</a>
</body>
</html>