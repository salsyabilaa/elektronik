<?php

require '../../koneksi.php';

$name_produk = $_POST['name_produk'];
$foto = $_FILES['image']['name'];
$files = $_FILES['image']['tmp_name'];
$price = $_POST['price'];
$deskripsi = $_POST['deskripsi'];

$query = mysqli_query($conn, "INSERT INTO produk(id_produk,name_produk,image,price,deskripsi) VALUES(NULL, '$name_produk', '$foto', '$price', '$deskripsi')");

move_uploaded_file($files, "foto/".$foto);

if($query) {
    echo "
<script type='text/javascript'>
    alert('Data berhasil ditambahkan');
    window.location = 'produk.php';
</script>
";
}


?>