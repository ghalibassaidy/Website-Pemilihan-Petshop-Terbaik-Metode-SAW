<?php
include '../aksilogin/config.php';

$id_nilai = $_GET['id_nilai'];
mysqli_query($koneksi, "DELETE FROM tb_nilai WHERE id_nilai='$id_nilai'");
 
header("location:../alternatif_kepala.php?pesan=hapus");

?>