<?php
include '../aksilogin/config.php';

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];


mysqli_query($koneksi, "UPDATE tbl_user SET nama='$nama', username='$username', password='$password', level='$level' WHERE id_user='$id_user'");
header("location:../user.php?pesan=update")

?>