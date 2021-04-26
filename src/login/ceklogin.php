<?php

require '../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE username= '$username' AND password = '$password' ");
$cek = mysqli_num_rows($query);

if( $cek > 0 ) {
    $data = mysqli_fetch_array($query);
    if($data['role'] == "penjual") {
        session_start();
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['role'] = $data['role'];
        header('Location: ../penjual/index.php');
    }else if($data['role'] == "pembeli") {
        session_start();
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['role'] = $data['role'];
        header('Location: ../pembeli/index.php');
    }
}else {
    echo 'script type="text/javascript">
    alert("username atau password tidak ditemukan);
    window.location = "index.php";
    </script>';
}

?>