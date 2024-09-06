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
$page = 'home'; include './template/sidebar.php';
?>

      
    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-success-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>                     
                <h2 class="text-white pb-2 fw-bold">Home</h2>
                <h5 class="text-white op-7 mb-2" >Selamat Datang <i><?php echo $_SESSION['username']; ?></i> di Sistem Pendukung Keputusan untuk Pemilihan Petshop</h5>
              
              </div>
            </div>
          </div>
        </div>
         
<?php
$sql = mysqli_query($koneksi, "SELECT * FROM tb_coffeshop");
$jumlah_data = mysqli_num_rows($sql);
?>

        <div class="page-inner mt--5">
          <div class="row">
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center icon-danger bubble-shadow-small">
                        <i class="flaticon-users"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Petshop</p>
                        <h4 class="card-title"><?php echo $jumlah_data; ?></h4>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php
$sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");
$jumlah_data = mysqli_num_rows($sql);
?>

            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center icon-success bubble-shadow-small">
                        <i class="flaticon-interface-6"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Kriteria</p>
                        <h4 class="card-title"><?php echo $jumlah_data; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<?php
$sql = mysqli_query($koneksi, "SELECT * FROM tb_alternatif");
$jumlah_data = mysqli_num_rows($sql);
?>

            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center icon-primary bubble-shadow-small">
                        <i class="flaticon-analytics"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Alternatif</p>
                        <h4 class="card-title"><?php echo $jumlah_data; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php
$sql = mysqli_query($koneksi, "SELECT * FROM tbl_user");
$jumlah_data = mysqli_num_rows($sql);
?>
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center icon-warning bubble-shadow-small">
                        <i class="flaticon-user"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">User</p>
                        <h4 class="card-title"><?php echo $jumlah_data; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
                

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">tentang kami</h4>
                
                </div>
                <div class="card-body">
                  
                   <h5>Dibuat Oleh : R Dobry </h5>  <br>
                   <p>nama: Dobry (Admin) </p>
<img src="assets/img/aa.JPG" height="500px" width="1000px">

                  
                </div>
              </div>
            </div>
          </div>
          </div>
<?php
include './template/footer.php';
?>