

<?php $page = 'kriteria'; include './template/header.php';
?>      


<?php
include './template/navbar.php';
?>

<?php
$page = 'kriteria'; include './template/sidebar.php';
?>


<?php 
  if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if($pesan == "input"){
      echo "Data berhasil di input.";
    }else if($pesan == "update"){
      echo "Data berhasil di update.";
    }else if($pesan == "hapus"){
      echo "Data berhasil di hapus.";
    }
  }
  ?>





      <!-- End Navbar -->
      <div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="row">
            <div class="col-md-12">
              
                <div class="card-header">
                  <h4 class="card-title">Data Kriteria</h4>
                </div>
                <div class="card">
                <div class="card-body">
                  <div class="card-header">
    <h4 class="card-title">Data Kriteria</h4>
    <a href="cetak_kriteria.php" class="btn btn-primary btn-sm" target="_blank">Cetak</a>
</div>

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
      <th  class="text-center">No</th>
      <th>Nama Kriteria</th>
      <th>Atribute</th>
      <th>Bobot</th>
      <th class="text-center">Opsi</th>   
    </tr>
  </thead>
  <?php 
  include 'aksilogin/config.php';
  $data = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");
  $nomor = 1;
  while($d = mysqli_fetch_array($data)){ ?>
  <tr>
    <td class="text-center"><?php echo $nomor++; ?></td>
    <td><?php echo $d['nama_kriteria']; ?></td>
    <td><?php echo $d['atribute']; ?></td>
    <td><?php echo $d['bobot']; ?></td>
    <td class="text-center"> <a class="btn btn-warning btn-sm" href="edit_kriteria.php?id_kriteria=<?php echo $d['id_kriteria']; ?>"><i class="far fa-edit"> Edit</i></a> | <a class="btn btn-primary btn-sm" href="data_sub_kriteria.php?id_kriteria=<?php echo $d['id_kriteria']; ?>"><i class="far fa-edit"> Sub Kriteria</i></td>
  </tr>
  <?php } ?>
</table>
   

<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
      

  

              </div>
              <div class="card-body ">
                <div id="map" class="map"></div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>

          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Raden Dobry</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative R Dobry</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
<?php
include './template/footer.php';
?>
