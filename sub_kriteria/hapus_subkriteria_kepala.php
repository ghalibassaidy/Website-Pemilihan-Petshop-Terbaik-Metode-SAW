<?php 
include '../aksilogin/config.php';
$id_sub = $_GET['id_sub'];
$id = $_GET['id_kriteria'];
mysqli_query($koneksi, "DELETE FROM sub_kriteria WHERE id_sub='$id_sub'");
 
header("location:../data_sub_kriteria_kepala.php?pesan=hapus&id_kriteria=$id");
?>