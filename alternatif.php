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

$page = 'alternatif'; include './template/sidebar.php';
?>





<?php
 include './aksilogin/config.php';
$sql = mysqli_query($koneksi, "SELECT * FROM tb_coffeshop INNER JOIN tb_nilai ON tb_coffeshop.id_coffeshop = tb_nilai.id_coffeshop");

$nomor = 1;
?>
<div class="card-header">
  <h4 class="card-title">Data Alternatif</h4>
  <a href="cetak_alternatif.php" target="_blank" class="btn btn-primary btn-sm">Cetak</a>
</div>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Data Alternatif</h4>
								</div>

								<div class="card-body">

									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
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
                            <th style='text-align:center;'>No</th>
                            <th>Nama Alternatif</th>
                            <?php
                                include './aksilogin/config.php'; 
                                $qkriteria = mysqli_query($koneksi, "SELECT * from tbl_kriteria");
                                while ($k = mysqli_fetch_array($qkriteria)) {
                                  echo "<th style='text-align:center;'>".$k['nama_kriteria']."</th>";
                                }
                            // <th style='text-align:center;'>C1</th>
                            // <th style='text-align:center;'>C2</th>
                            // <th style='text-align:center;'>C3</th>
                            // <th style='text-align:center;'>C4</th>
                          ?>
                          <th style='text-align:center;'>Opsi</th>                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php while ($data = mysqli_fetch_array($sql)) {
                        ?>
                      
                          <tr>
                          <td style='text-align:center;'><?php echo $nomor++; ?></td>
                          <td><?php echo $data['nama']; ?></td>
                          <td style='text-align:center;'><?php echo $data['kriteria1']; ?></td>
                          <td style='text-align:center;'><?php echo $data['kriteria2']; ?></td>
                          <td style='text-align:center;'><?php echo $data['kriteria3']; ?></td>
                          <td style='text-align:center;'><?php echo $data['kriteria4']; ?></td>
                          <td style='text-align:center;'><?php echo $data['kriteria5']; ?></td>
               
                          
                          
                          
                        <td style='text-align:center;'><a class="btn btn-danger btn-sm" href="./alternatif/hapus_alternatif.php?id_nilai=<?php echo $data['id_nilai']; ?>"><i class="fa fa-window-close"> Hapus</i></a></td>
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

