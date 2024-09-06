
<?php 

// mengaktifkan session
// mengaktifkan session
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
 
  ?>


<?php include  './template/header.php';
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
							
								<div class="card-header">
									<h4 class="card-title">Data Petshop</h4>
								</div>
								<div class="card">
								<div class="card-body">
									<h4><a class="btn btn-primary btn-sm" href="tambah_coffeshop.php">+ Tambah data</a></h4>
									<div class="table-responsive">
										<table id="basic-datatables" class="isplay table table-striped table-bordered table-hover" >
										<div class="card-header">
  <h4 class="card-title">Data Petshop</h4>
  <a href="cetak_petshop.php" target="_blank" class="btn btn-primary btn-sm">Cetak</a>
</div>
<?php 
if(isset($_GET['pesan'])){
	$pesan = $_GET['pesan'];
	if($pesan == "input"){
		echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di tambah.</div>';
	}else if($pesan == "update"){
		echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di update.</div>';
	}else if($pesan == "hapus"){
		echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di hapus.</div>';
	}
}
?>
											<thead>
												<tr>
												    <th>No</th>
												    <th>Nama</th>
													<th style='text-align:center;'>Opsi</th>												
												</tr>
											</thead>
											<tbody>
											<?php 
											
											include 'aksilogin/config.php';
											$nomor = 1;
											$data = mysqli_query($koneksi, "SELECT * FROM tb_coffeshop");
											while ($a = mysqli_fetch_array($data)) { ?>
												<tr>
												  <td><?php echo $nomor++; ?></td>
												  <td><?php echo $a['nama']; ?></td>
												  <td style='text-align:center;'><a class="btn btn-warning btn-sm" href="edit_coffeshop.php?id_coffeshop=<?php echo $a['id_coffeshop']; ?>"><i class="far fa-edit"> Edit</i></a> | <a class="btn btn-danger btn-sm" href="./coffeshop/delete.php?id_coffeshop=<?php echo $a['id_coffeshop']; ?>"><i class="far fa-window-close"> Hapus</i></a></td>
												</tr>
											<?php } ?>
											</tbody>	
										</table>
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
