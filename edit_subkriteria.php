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
                                    <h4 class="card-title">Edit Sub Kriteria</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                    $id_sub = $_GET['id_sub'];
                    $result = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id_sub='$id_sub'");
                    
                    $dataku = mysqli_fetch_array($result);
                    $nomor = 1;
                                            ?>
                                        <div class="col-md-6 pr-1">
                                            <form action="./sub_kriteria/update_subkriteria.php?id_sub=<?php echo $id_sub ?>" method="post">
                               <div class="form-group">
                                <label>Nama Kriteria</label>
                                <select name="id_kriteria" placeholder="Pilih Kriteria..." class="form-control" required>
                                    <option value="">Pilih Kriteria...</option>
                                    
                                    <?php
                                    $hasil = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria asc");
                                    
                                    while ($data = mysqli_fetch_array($hasil)){
                                      echo "<option value='$data[id_kriteria]'" ;
                                        if ($data['id_kriteria'] == $dataku['id_kriteria']) {
                                            echo "selected";
                                        }
                                        echo ">".$data['nama_kriteria']."</option>"; 

                                        }
                                        
                                    ?>
                                </select>     
                            </div>
                            <div class="form-group">
                                <label>Nama Sub Kriteria</label>
                                <input type="text" class="form-control"  value="<?php echo $dataku['nama_subkriteria'] ?>" name="nama_subkriteria" value="" required >
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input class="form-control"  value="<?php echo $dataku['nilai'] ?>" name="nilai" value="" required >
                            </div>
                            
                            <div class="form-group">
                                <label>Keterangan Nilai</label>
                                <input class="form-control"  value="<?php echo $dataku['keterangan'] ?>" name="keterangan" value="" required >
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