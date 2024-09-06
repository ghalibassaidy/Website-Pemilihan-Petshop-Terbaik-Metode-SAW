<?php 
include './aksilogin/config.php'; 


// mengaktifkan session
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
 
  ?>



<?php include './template/header.php';
?>

<?php include './template/navbar.php';
?>
<?php
$page = 'input_penilaian'; include './template/sidebar.php';
?>
<div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Tambah Penilaian</h4>
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
								<div class="card-body">
									<div class="row">
										<div class="col-md-6 pr-1">
                                        <form action="./alternatif/input_alternatif.php" method="post">
                       <div class="form-group">
                                <label>Nama Alternatif</label>
                                <select name="id_coffeshop" placeholder="Pilih Kriteria..." class="form-control" required>
                                    <option value="">Pilih Alternatif...</option>
                                    
                                    <?php
                                    $hasil = mysqli_query($koneksi, "SELECT * FROM tb_coffeshop ORDER BY id_coffeshop asc");
                                   
                                    while ($data = mysqli_fetch_array($hasil)){
                                        echo "<option value='".$data['id_coffeshop']."'>".$data['nama']."</option>";
                                    }
                                    

                                    ?>
                                 </select>
                            </div>
                            <?php
                                $kriteria = array();
                                    $kq = mysqli_query($koneksi, "SELECT * from tbl_kriteria");
                                    while ($k = mysqli_fetch_array($kq)) {
                                      array_push($kriteria, $k['nama_kriteria']);
                                    }
                            ?>
                            <label><?php echo $kriteria[0] ?></label>
                                <div>
                                    <select name="kriteria1" class="form-control">
                                        <option>--- Pilih ---</option>
                                        <?php
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id_kriteria='1' ORDER BY id_sub asc");
                                      
                                        while ($data = mysqli_fetch_array($hasil)){
                                            echo "<option value='".$data['nilai']."'>".$data['nama_subkriteria']."</option>";
                                        }
                                        ?>
                                    </select>




                                </div>
                                <br>
                                <label><?php echo $kriteria[1] ?></label>
                                <div>
                                    <select name="kriteria2" class="form-control">
                                        <option>--- Pilih ---</option>
                                        <?php
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id_kriteria='2' ORDER BY id_sub asc");
                                      
                                        while ($data = mysqli_fetch_array($hasil)){
                                            echo "<option value='".$data['nilai']."'>".$data['nama_subkriteria']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <br>
                                <label><?php echo $kriteria[2] ?></label>
                                <div>
                                    <select name="kriteria3" class="form-control">
                                        <option>--- Pilih ---</option>
                                        <?php
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id_kriteria='3' ORDER BY id_sub asc");
                                      
                                        while ($data = mysqli_fetch_array($hasil)){
                                            echo "<option value='".$data['nilai']."'>".$data['nama_subkriteria']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <br>
                                <label><?php echo $kriteria[3] ?></label>
                                <div>
                                    <select name="kriteria4" class="form-control">
                                        <option>--- Pilih ---</option>
                                        <?php
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id_kriteria='4' ORDER BY id_sub asc");
                                      
                                        while ($data = mysqli_fetch_array($hasil)){
                                            echo "<option value='".$data['nilai']."'>".$data['nama_subkriteria']."</option>";
                                        }
                                        ?>
                                    </select>
                                    <br>
                              </div>
                         <br>
                                <label><?php echo $kriteria[4] ?></label>
                                <div>
                                    <select name="kriteria5" class="form-control">
                                        <option>--- Pilih ---</option>
                                        <?php
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id_kriteria='5' ORDER BY id_sub asc");
                                      
                                        while ($data = mysqli_fetch_array($hasil)){
                                            echo "<option value='".$data['nilai']."'>".$data['nama_subkriteria']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <br>
                               
                         <br> 
                            <tr> 
                                <td></td>
                                <td><button class="btn btn-success" type="submit" value="Simpan"><i class="fa fa-check-circle"> Simpan</i></td>
                            </tr>
                       
                    </form>


<?php
include './template/footer.php';
?>