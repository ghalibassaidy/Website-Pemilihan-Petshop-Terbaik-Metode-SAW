 <?php 
include './aksilogin/config.php'; 

?>

<?php $page = 'data_siswa'; include './template/header.php';
?>

<?php include './template/navbar.php';
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

 <h3>Tambah Data User</h3>

               <div class="card-body">
									<div class="row">
										<div class="col-md-6 pr-1">
											<form action="./user/input_user.php" method="post">
											<div class="form-group">
												<label>Nama</label>
												
                        						<input type="text" class="form-control" name="nama" required>
											</div> 
											<div class="form-group">
												<label>Username</label>
												<input type="text" class="form-control" name="username" required>
											</div>
											<div class="form-group">
												<label>Password</label>
												<input type="text" class="form-control" name="password" required>
											</div>
											<div class="form-group">
												<label>Level</label>
												<select name="level"  placeholder="Pilih Kriteria..." class="form-control" required>
                                                <option value="">Pilih Level User</option>
                                                <option value="admin">admin</option>
												<option value="user">User</option>
											</select>
											</div>
											
											
								
									 <td><button class="btn btn-primary" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
                            </tr>
                       
                    </form>
								
							</div>
						</div>
					</div>

					                                   


<?php
include './template/footer.php';
?>