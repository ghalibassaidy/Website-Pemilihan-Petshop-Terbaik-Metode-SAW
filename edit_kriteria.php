

<?php $page = 'kriteria'; include './template/header.php';

// mengaktifkan session
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }

?>

<?php include './template/navbar.php';
?>
<?php
$page = 'kriteria'; include './template/sidebar.php';
?>
                  <!-- End Navbar -->
 <div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Edit Kriteria</h4>
								</div>
                <?php 
										  include 'aksilogin/config.php'; 

										  $id = $_GET['id_kriteria'];
									      $data = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria where id_kriteria='$id'");
	                                      $nomor = 1;
	                                      while($d = mysqli_fetch_array($data)){
										 
										  ?>

<div class="card-body">
									<div class="row">
										  
										<div class="col-md-6 pr-1">
											<form action="./kriteria/update_kriteria.php" method="post">
										
												
                        						
											<div class="form-group">
												<label>Nama Kriteria</label>
												<input type="hidden" name="id_kriteria" value="<?php echo $d['id_kriteria'] ?>">
												<input type="text" class="form-control" name="nama_kriteria" value="<?php echo $d['nama_kriteria'] ?>">
												
											</div>
											<div class="form-group">
												<label>Atribute</label>
												<input type="text" class="form-control" name="atribute" value="<?php echo $d['atribute'] ?>">
												
											</div>
											<h6><div class="text-danger">*Catatan : Hanya bisa mengisi cost / benefit</div></h6>
											<div class="form-group">
												<label>Bobot</label>
												<input class="form-control" class="form-control" name="bobot" value="<?php echo $d['bobot'] ?>">
											</div>
											
								
									<td><button class="btn btn-primary" type="submit" value="Simpan"><i class="far fa-check-circle">Simpan</i></td>
							
							</form>
							
							</div>

						</div>

					</div>
						<?php

							}
							?>
				</div>
			</div>
					</div>
					</div>
				</div>
			</div>

<?php
include './template/footer.php';
?>