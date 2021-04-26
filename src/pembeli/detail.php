<?php

session_start();
require 'app.php';
if(!isset($_SESSION['username'])) 
{
    die("Anda belum login!");
}
if($_SESSION['role']!="pembeli"){
    die("Anda bukan pembeli");
}

$id = $_GET["id"];

$data = queryData("SELECT * FROM produk WHERE id_produk = $id")[0];


?>


<!DOCTYPE html>
<html lang=" en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page User</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
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

        <div class="wrapper-detail">

            <div class="item">
                <img src="foto/<?= $data['image']; ?>" alt="">
            </div>
            <form action="" method="post">
                <div class="item-2">
                    <h5 class="name_product"><?= $data['name_produk']; ?></h5>
                    <h5 class="price"><?= number_format($data['price'])?></h5>
                    <p class="description">Deskripsi Barang
                        </br>
                        <?= $data['deskripsi']; ?>
                    </p>
                    <div>
                        <input type="number" value="1" name="qty">
                    </div>

                    <button type="submit" name="buy" class="btn-detail">Beli Sekarang</button>
                </div>
            </form>
        </div>


        <?php
    if (isset($_POST["buy"])) {
        $qty = $_POST["qty"];
        $_SESSION["cart"][$id] = $qty;
        echo "<script>alert('Produk telah ditambahkan ke keranjang belanja')</script>";
        echo "<script>location='cart.php'</script>";
    }
    ?>

    </div>


</body>

</html>