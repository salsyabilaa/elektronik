<?php

require '../../koneksi.php';

session_start();

if(!isset($_SESSION['username'])) {
    die("Anda belum login");
}

if($_SESSION['role'] !="penjual") {
    die("Anda bukan penjual");
}


$query = mysqli_query($conn, "SELECT * FROM produk");


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

    <h1>Data Produk</h1>
    <a href="tambah_produk.php">Tambah Produk</a>
    <table>
        <tr>
            <th>No</th>
            <th>Name Produk</th>
            <th>Image</th>
            <th>Price</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php while( $data = mysqli_fetch_array($query)) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $data['name_produk']; ?></td>
            <td><img src="foto/<?= $data['image']; ?>" width="80" alt=""></td>
            <td>Rp <?= number_format($data['price']); ?></td>
            <td>
                <a href="edit_produk.php?id=<?= $data['id_produk']; ?>" style="text-decoration: none; padding: 10px; background: #000; color: #fff;">Edit</a>
                <a href="hapus_produk.php?id=<?= $data['id_produk']; ?>" style="text-decoration: none; padding: 10px; background: red; color: #fff;">Hapus</a>
            </td>
        </tr>

        <?php $i++; ?>
        <?php endwhile; ?>

    </table>
    <a href="../../logout.php">Logout</a>
</body>
</html>