<?php
require '../../koneksi.php';

$name_produk = $_POST['name_produk'];
$foto = $_FILES['image']['name'];
$files = $_FILES['image']['tmp_name'];
$price = $_POST['price'];
$deskripsi = $_POST['deskripsi'];
$id = $_POST['id_produk'];




if(empty($foto)) {
    $query = mysqli_query($conn, "UPDATE produk SET 
    name_produk = '$name_produk',
    price = '$price', 
    deskripsi = '$deskripsi' WHERE id_produk = '$id'");
    
    
    if($query) {
    echo "
    <script type='text/javascript'>
        alert('Data berhasil diubah');
        window.location = 'produk.php';
    </script>
    "; 
    }
    
}else{
$query = mysqli_query($conn, "UPDATE produk SET 
name_produk = '$name_produk',
image = '$foto', 
price = '$price', 
deskripsi = '$deskripsi' WHERE id_produk = '$id'");

move_uploaded_file($files, "foto/".$foto);

if($query) {
echo "
<script type='text/javascript'>
    alert('Data berhasil diubah');
    window.location = 'produk.php';
</script>
"; 
}

}




?>