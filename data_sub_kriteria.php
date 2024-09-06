<?php 
include 'aksilogin/config.php';

// mengaktifkan session
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php");
  }
 
  ?>


<?php include  './template/header.php';
?>

<?php
 include './template/navbar.php';
?>
<?php

$page = 'kriteria'; include './template/sidebar.php';
?>







<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							
								<div class="card-header">
									<h4 class="card-title">Sub Kriteria </h4>
								</div>
								<div class="card">
								<div class="card-body">
									
									  <h4><a class="btn btn-primary btn-sm" href="tambah_subkriteria.php?id_kriteria=<?php echo $_GET['id_kriteria']; ?>">+ Tambah data</a></h4> 
									
									<div class="table-responsive">
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
										<table id="basic-datatables" class="isplay table table-striped table-bordered table-hover" >
											<thead>
												<tr>
												    <th style='text-align:center;'>No</th>
												    
												    <th style='text-align:center;'>Nama Sub kriteria</th>
												    <th style='text-align:center;'>nilai</th>
												    <th style='text-align:center;'>Keterangan</th>
												    <th style='text-align:center;'>Opsi</th>
																									
												</tr>
											</thead>
											<tbody>
										
											<?php
											include 'aksilogin/config.php';
												$id_kriteria = $_GET['id_kriteria'];
												$data = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id_kriteria='$id_kriteria'");
												$nomor = 1;
												while($d = mysqli_fetch_array($data))
												{ 
											?>

										
												  <tr>
												  <td style='text-align:center;'><?php echo $nomor++; ?></td>
												  <td><?php echo $d['nama_subkriteria']; ?></td>
												  <td style='text-align:center;'><?php echo $d['nilai']; ?></td>
												  <td style='text-align:center;'><?php echo $d['keterangan']; ?></td>
												 
												  <td style='text-align:center;'><a class="btn btn-warning btn-sm" href="edit_subkriteria.php?id_sub=<?php echo $d['id_sub']; ?>"><i class="far fa-edit"> Edit</i></a> | <a class="btn btn-danger btn-sm" href="./sub_kriteria/hapus_subkriteria.php?id_sub=<?php echo $d['id_sub'];?>&id_kriteria=<?php echo $d['id_kriteria'];?>"><i class="far fa-window-close"> Hapus</i></a></td>
												  
										
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



