<?php 
 
include '../aksilogin/config.php';

	

$sql = mysqli_query($koneksi, "insert into tb_nilai(id_siswa, kriteria1,kriteria2,kriteria3,kriteria4,kriteria5,kriteria6) values ('{$_POST['id_siswa']}','{$_POST['kriteria1']}','{$_POST['kriteria2']}','{$_POST['kriteria3']}','{$_POST['kriteria4']}','{$_POST['kriteria5']}','{$_POST['kriteria6']}')");
mysqli_query($sql);
header("location:../tambah_penilaian_guru.php?pesan=input");
 
?>