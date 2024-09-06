<?php

include '../aksilogin/config.php';

$nama = $_POST['nama'];

mysqli_query($koneksi, "INSERT INTO tb_coffeshop VALUES ('', '$nama')");
header('location:../coffeshop.php?pesan=input');

?>