<?php

require '../../koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id'");

if($query) {
    echo "
<script type='text/javascript'>
    alert('Data berhasil dihapus');
    window.location = 'produk.php';
</script>
"; }

?>