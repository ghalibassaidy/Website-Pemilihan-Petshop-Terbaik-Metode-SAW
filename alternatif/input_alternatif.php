<?php  
include '../aksilogin/config.php';

// Pastikan variabel POST sudah diset sebelum menggunakannya
if(isset($_POST['id_coffeshop']) && isset($_POST['kriteria1']) && isset($_POST['kriteria2']) && isset($_POST['kriteria3']) && isset($_POST['kriteria4']) && isset($_POST['kriteria5'])) {
    
    // Eksekusi query untuk memasukkan data ke dalam tabel tb_nilai
    $sql = mysqli_query($koneksi, "INSERT INTO tb_nilai (id_coffeshop, kriteria1, kriteria2, kriteria3, kriteria4, kriteria5) VALUES ('{$_POST['id_coffeshop']}', '{$_POST['kriteria1']}', '{$_POST['kriteria2']}', '{$_POST['kriteria3']}', '{$_POST['kriteria4']}', '{$_POST['kriteria5']}')");
    
    // Redirect ke halaman alternatif.php dengan pesan sukses
    header("location:../alternatif.php?pesan=input");
} else {
    // Jika data POST tidak lengkap, bisa menampilkan pesan error atau redirect dengan pesan error
    header("location:../alternatif.php?pesan=error");
}

?>
