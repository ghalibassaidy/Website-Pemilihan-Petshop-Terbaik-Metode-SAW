<?php 
 
include '../aksilogin/config.php';
$id= $_POST['id_kriteria'];
// $code = $_POST['code'];
$nama_kriteria = $_POST['nama_kriteria'];
$atribute = $_POST['atribute'];
$bobot = $_POST['bobot'];

mysqli_query($koneksi, "UPDATE tbl_kriteria SET id_kriteria='$id', nama_kriteria='$nama_kriteria', atribute='$atribute', bobot='$bobot' WHERE id_kriteria='$id'");
 
header("location:../kriteria_kepala.php?pesan=update");
 
?>