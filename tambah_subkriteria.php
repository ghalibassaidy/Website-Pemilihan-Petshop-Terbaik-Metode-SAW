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

<?php include './template/navbar.php';
?>

<?php
$page = 'kriteria'; include './template/sidebar.php';
?>

<div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Data Sub Kriteria</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <form action="./sub_kriteria/input_subkriteria.php" method="post">
                                <div class="form-group">
                                <label>Nama Kriteria</label>
                                <select name="id_kriteria" placeholder="Pilih Kriteria..." class="form-control" required>
                                    <option value="">Pilih Kriteria...</option>
                                    
                                    <?php
                                    $hasil = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria asc");
                                    
                                    while ($data = mysqli_fetch_array($hasil)){
                                        if ($_GET['id_kriteria'] == $data['id_kriteria']) {
                                            echo "<option selected value='".$data['id_kriteria']."'>".$data['nama_kriteria']."</option>";
                                        } 
                                            echo ">".$data['nama_kriteria']."</option>"; 
                                        }
                                        
                                    
                                    ?>

                                    
                                </select>
                                
                            </div>

                             <div class="form-group">
                                <label>Nama Sub Kriteria</label>
                                <input type="text" class="form-control" name="nama_subkriteria" placeholder="Masukkan keterangan nilai yang yang dibutuhkan" required >
                            </div> 

                          
                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="text" class="form-control" name="nilai" placeholder="Masukkan nilai dari 0-100" required >
                            </div>
                            
                              <div class="form-group">
                                                <label>Keterangan Nilai</label>
                                                <input type="text" class="form-control" name="keterangan" placeholder="masukkan keterangan" required>
                                            </div>
                        
                           
                            
                            <tr> 
                                <td><button class="btn btn-success" name="Submit" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
                            </tr>
                       
                    </form>
 


                   
  <br>
   </div>

    <?php
include './template/footer.php';
?>