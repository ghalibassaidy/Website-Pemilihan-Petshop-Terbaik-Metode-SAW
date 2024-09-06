<?php
include '../aksilogin/config.php';

$id_user = $_GET['id_user'];
mysqli_query($koneksi, "DELETE FROM tbl_user WHERE id_user='$id_user'");
 
header("location:../user_kepala.php?pesan=hapus");

?>