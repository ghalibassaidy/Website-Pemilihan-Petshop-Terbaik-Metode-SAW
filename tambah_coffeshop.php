<?php 
include 'aksilogin/config.php';

// mengaktifkan session
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php");
  }
 
  ?>

<?php $page = 'pasien'; include './template/header.php';
?>

<?php include './template/navbar.php';
?>

<?php
$page = 'coffe'; include './template/sidebar.php';
?>

<div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Data petshop</h4>
                                </div>
								<div class="card-body">
									<div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <form action="./coffeshop/input.php" method="post">
                                      
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama" required>
                                            </div>
                                    <td><button class="btn btn-primary" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
                            </tr>
                       
                    </form>


<?php
include './template/footer.php';
?>