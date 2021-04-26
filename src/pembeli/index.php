<?php

require '../koneksi.php';

session_start();

if(!isset($_SESSION['username'])) {
    die("Anda belum login");
}

if($_SESSION['role'] !="pembeli") {
    die("Anda bukan pembeli");
}

$query = mysqli_query($conn, "SELECT * FROM produk");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page | Pembeli</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container-navbar">
        <div class="navbar">
            <div class="nav-logo">
                <h4>Store</h4>
            </div>
            <div class="nav-links" id="mobile-menu">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="cart.php">Cart</a>
                    </li>
                    <li>
                        <a>Welcome, <?php echo $_SESSION['username'] ?></a>
                    </li>
                    <li>
                        <a href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <div class="container">

        <div class="card">
            <h5 class="text-new-product">New Product</h5>
            <div class="card-product">
                <?php while($data = mysqli_fetch_array($query)) : ?>


                <a href="detail.php?id=<?= $data['id_produk']; ?>" class="card-link">
                    <div class="products" style="background-image: url('foto/<?= $data['image']; ?>')">
                        <div class="products-img">
                            <div class="text-product">
                                <h5><?= $data['name_produk']; ?></h5>
                                <h6>Rp. <?= number_format($data['price']) ?></h6>
                            </div>
                </a>

            </div>
        </div>
        <?php endwhile; ?>
    </div>
    </div>
    </div>
    <a href="../logout.php">Logout</a>
</body>

</html>