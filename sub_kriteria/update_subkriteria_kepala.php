<?php 
 
include '../aksilogin/config.php';
$id_sub = $_GET['id_sub'];
$id_kriteria = $_POST['id_kriteria'];
// $code = $_POST['code'];
$nama_subkriteria = $_POST['nama_subkriteria'];
$nilai = $_POST['nilai'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "UPDATE sub_kriteria SET id_kriteria='$id_kriteria', nama_subkriteria='$nama_subkriteria', nilai='$nilai', keterangan='$keterangan' WHERE id_sub='$id_sub'");
 
header("location:../data_sub_kriteria_kepala.php?pesan=updat&id_kriteria=$id_kriteria");
 
?>