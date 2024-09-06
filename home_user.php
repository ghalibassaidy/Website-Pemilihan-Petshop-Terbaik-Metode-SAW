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
$page = 'home'; include './template/sidebar_user.php';
?>

      
    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-success-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>                     
                <h2 class="text-white pb-2 fw-bold">Home</h2>
                <h5 class="text-white op-7 mb-2" >Selamat Datang <i><?php echo $_SESSION['username']; ?></i> Sistem Pendukung Keputusan untuk Pemilihan Coffeshop Terbaik</h5>
              </div>
            </div>
          </div>
        </div>
        
          
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">

                </div>
     
                  
                </div>
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