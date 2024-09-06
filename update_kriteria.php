<?php 
 
include 'aksilogin/config.php';
$id = $_POST['id'];
$code = $_POST['code'];
$nama_kriteria = $_POST['nama_kriteria'];
$atribute = $_POST['atribute'];
$bobot = $_POST['bobot'];
 
mysql_query("UPDATE kriteria SET nama_kriteria='$nama_kriteria', atribute='$atribute', bobot='$bobot' WHERE id='$id'");
 
header("location:kriteria.php");
 
?>