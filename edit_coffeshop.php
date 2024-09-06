
<?php 

  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
?>

<?php $page = 'data_pasien'; include  './template/header.php';
?>

<?php
 include './template/navbar.php';
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
									<h4 class="card-title">Edit Data Coffeshop</h4>
								</div>
									<div class="card-body">
									<div class="row">
										  <?php 
										  include 'aksilogin/config.php';
										  $id_coffeshop = $_GET['id_coffeshop'];
										  $data1 = mysqli_query($koneksi, "SELECT * FROM tb_coffeshop WHERE id_coffeshop='$id_coffeshop'");
										  $nomor = 1;
										  while($d = mysqli_fetch_array($data1)){
										  ?>
										<div class="col-md-6 pr-1">
											<form action="./coffeshop/update.php" method="post">
											<div class="form-group">
												<label>Nama</label>
												<input type="hidden" name="id_coffeshop" value="<?php echo $d['id_coffeshop'] ?>">
                        						<input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>">
											</div> 
											
</div>
									<button class="btn btn-primary" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i>
							
							</form>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
					</div>
					</div>
				</div>
			</div>

<?php
include './template/footer.php';
?>