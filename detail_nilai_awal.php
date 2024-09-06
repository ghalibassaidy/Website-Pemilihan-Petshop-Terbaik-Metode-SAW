
<?php 

  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
?>

<?php $page = 'data_siswa'; include  './template/header.php';
?>

<?php
 include './template/navbar.php';
?>
<?php
$page = 'hasil_penilaian_siswa'; include './template_siswa/sidebar.php';
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Nilai Awal Siswa</h4>
								</div>
<div class="card-body">
									<div class="row">
										  <?php 
										  include 'aksilogin/config.php';
										  $id_siswa = $_GET['id_siswa'];
										  
										  $data = mysqli_query($koneksi, "SELECT * FROM tb_nilai WHERE id_siswa='$id_siswa'");
										  $nomor = 1;
										  while($d = mysqli_fetch_array($data)){
										  ?>
										<div class="col-md-6 pr-1">
											<form action="./siswa/update_siswa.php" method="post">
														<thead>
												<tr>				<table id="basic-datatables" class="isplay table table-striped table-bordered table-hover">
				
												<?php

												    		$qkriteria = mysqli_query($koneksi,"SELECT * from tbl_kriteria");
												    		while ($k = mysqli_fetch_array($qkriteria)) {
												    			echo "<th style='text-align:center;'>".$k['nama_kriteria']."</th>";
												    		}
												    // <th style='text-align:center;'>C1</th>
												    // <th style='text-align:center;'>C2</th>
												    // <th style='text-align:center;'>C3</th>
												    // <th style='text-align:center;'>C4</th>
													?>	
												</tr>
											</thead>
											<tbody>
											<tr>
												  
												  
												  <td style='text-align:center;'><?php echo $d['kriteria1']; ?></td>
												  <td style='text-align:center;'><?php echo $d['kriteria2']; ?></td>
												  <td style='text-align:center;'><?php echo $d['kriteria3']; ?></td>
												  <td style='text-align:center;'><?php echo $d['kriteria4']; ?></td>
												  <td style='text-align:center;'><?php echo $d['kriteria5']; ?></td>
												  
										
												 </tr>
											</tbody>
											</table>
							
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