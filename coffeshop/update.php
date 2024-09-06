<?php
include '../aksilogin/config.php';

$id_coffeshop = $_POST['id_coffeshop'];
$nama = $_POST['nama'];

mysqli_query ($koneksi, "UPDATE tb_coffeshop SET nama = '$nama' WHERE id_coffeshop = '$id_coffeshop'");
header('location:../coffeshop.php?pesan=update');
?>