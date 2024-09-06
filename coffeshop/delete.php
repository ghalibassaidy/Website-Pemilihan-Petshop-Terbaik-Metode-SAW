<?php
include '../aksilogin/config.php';

$id_coffeshop = $_GET['id_coffeshop'];

mysqli_query($koneksi, "DELETE FROM tb_coffeshop WHERE id_coffeshop = '$id_coffeshop'");
header('location:../coffeshop.php?pesan=hapus')
?>