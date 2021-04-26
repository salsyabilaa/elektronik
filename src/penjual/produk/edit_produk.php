<?php

require '../../koneksi.php';

session_start();

if(!isset($_SESSION['username'])) {
    die("Anda belum login");
}

if($_SESSION['role'] !="penjual") {
    die("Anda bukan penjual");
}


$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page | Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    

    <form action="update_produk.php" method="post" enctype="multipart/form-data">
        <?php while($data = mysqli_fetch_array($query)) : ?>

        <input type="hidden" name="id_produk" value="<?= $data['id_produk'] ?>" 

        <label>Nama Produk</label>
        <input type="text" name="name_produk" value="<?= $data['name_produk'] ?>">
        <br />

        <label>Foto Produk</label>
        <input type="file" name="image" value="<?= $data['image'] ?>">
        <br />

        <label>Harga</label>
        <input type="text" name="price" value="<?= $data['price'] ?>">
        <br />

        <label>Deskripsi</label>
        <textarea name="deskripsi"><?= $data['deskripsi']; ?></textarea>
        <br />

        <button type="submit">Edit Data</button>

        <?php endwhile; ?>

    </form>
    <a href="../../logout.php">Logout</a>
</body>
</html>