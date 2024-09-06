<?php 
 
include '../aksilogin/config.php';
if($_POST){// jika tombol update ditekan
    //update data di tabel product
    $sql = mysqli_query($koneksi, "update tb_alternatif set nama_alternatif='{$_POST['nama_alternatif']}' 
    where id_alternatif='{$_POST['id_alternatif']}'");
    mysqli_query($sql);
    //update data di tabel buku
    $sql = mysqli_query($koneksi,"update tb_nilai set kriteria1='{$_POST['kriteria1']}',kriteria2='{$_POST['kriteria2']}',
    kriteria3='{$_POST['kriteria3']}',kriteria4='{$_POST['kriteria4']}',kriteria5='{$_POST['kriteria5']}',kriteria6='{$_POST['kriteria6']}',kriteria7='{$_POST['kriteria7']}',kriteria8='{$_POST['kriteria8']}',kriteria9='{$_POST['kriteria9']}',kriteria10='{$_POST['kriteria10']}' where id_alternatif='{$_POST['id_alternatif']}'");
    mysqli_query($sql);
    echo "Data telah di edit";
}

header("location:../input_alternatif.php?pesan=update");
 
?>