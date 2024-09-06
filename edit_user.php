<?php 
include 'aksilogin/config.php';

// mengaktifkan session
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
 
?>

<?php $page = 'user'; include  './template/header.php';
?>

<?php
 include './template/navbar.php';
?>

<?php
$page = 'user'; include './template/sidebar.php';
?>

 <div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Edit User</h4>
								
								</div>
								
								<div class="card-body">
									<div class="row">
										  <?php 
										  $id_user = $_GET['id_user'];
										  $query_mysql = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id_user='$id_user'");
										  $nomor = 1;
										  while($dataku = mysqli_fetch_array($query_mysql)){
										  ?>
										<div class="col-md-6 pr-1">
											<form action="./user/update_user.php" method="post">
											<div class="form-group">

												<div class="form-group">
									

												<label>Nama</label>
												<input type="hidden" name="id_user" value="<?php echo $dataku['id_user'] ?>">
                        						<input type="text" class="form-control" name="nama" value="<?php echo $dataku['nama'] ?>">
											</div> 
											<div class="form-group">
												<label>Username</label>
												<input type="text" class="form-control" name="username" value="<?php echo $dataku['username'] ?>">
											</div>
											<div class="form-group">
												<label>Password</label>
												<input type="text" class="form-control" name="password" value="<?php echo $dataku['password'] ?>">
											</div>
											
											
								<div class="form-group">
												<label>Level</label>
												
                        						<select name="level"  placeholder="Pilih Kriteria..." class="form-control">
                                    <option value="">Pilih Level User</option>
                                    
                                    <?php
                              		$query = mysqli_query($koneksi, "SELECT * FROM tbl_user ORDER BY id_user asc");
                                
                                    while ($data = mysqli_fetch_array($query)){
                                      echo "<option value='$data[level]'" ;
                                        if ($dataku['level'] == $data['level']) {
                                            echo "selected";
                                        }
                                        echo ">".$data['level']."</option>"; 

                                        }

                                        ?>
</select>
</div>
									<td><button class="btn btn-primary" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
							
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
