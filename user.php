<?php 
include 'aksilogin/config.php';

// mengaktifkan session

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
              
                <div class="card-header">
                  <h4 class="card-title">Data User</h4>
                </div>
                <div class="card">
                <div class="card-body">
                  <h4><a class="btn btn-primary btn-sm" href="tambah_user.php">+ Tambah data</a></h4>
                  <div class="table-responsive">
                    <table id="basic-datatables" class="isplay table table-striped table-bordered table-hover" >
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
                            <th style='text-align:center;'>Nama</th>
                            <th style='text-align:center;'>Username</th>
                            <th style='text-align:center;'>Password</th>
                            <th style='text-align:center;'>Level</th>
                          <th style='text-align:center;'>Opsi</th>                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      include 'aksilogin/config.php';
                        $query = mysqli_query($koneksi, "SELECT * FROM tbl_user");
                        $nomor = 1;
                        while($data = mysqli_fetch_array($query))
                        { 
                      ?>
                      
                          <tr>
                          <td style='text-align:center;'><?php echo $nomor++; ?></td>
                          <td style='text-align:center;'><?php echo $data['nama']; ?></td>
                          <td style='text-align:center;'><?php echo $data['username']; ?></td>
                          <td style='text-align:center;'><?php echo $data['password']; ?></td>
                          <td style='text-align:center;'><?php echo $data['level']; ?></td>
                          
                          
                        <td style='text-align:center;'><a class="btn btn-warning btn-sm" href="edit_user.php?id_user=<?php echo $data['id_user']; ?>"><i class="far fa-edit"> Edit</i></a> | <a class="btn btn-danger btn-sm" href="./user/hapus_user.php?id_user=<?php echo $data['id_user']; ?>"><i class="far fa-window-close"> Hapus</i></a></td>
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
