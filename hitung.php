<?php
 // Koneksi
include 'aksilogin/config.php';
// mengaktifkan session
//   session_start();
 
//   // cek apakah yang mengakses halaman ini sudah login
//   if($_SESSION['level']==""){
//     header("location:index.php?pesan=gagal");
//   }
 
?>

<?php include './template/header.php';
?>      


<?php
include './template/navbar.php';
?>

<?php
$page = 'perhitungan_saw'; include './template/sidebar.php';
?>
<div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="row">
            <div class="col-md-12">
              
                <div class="card-header" >
                  <h4 class="card-title">Hasil Perhitungan Metode SAW</h4>
                </div>
                <div class="card">
                <div class="card-body" >
<?php
                $krr1 = mysqli_query($koneksi, "SELECT 
      min(nilai) as minK1 FROM nilai_saw WHERE id_kriteria='1' ");
 $dd = mysqli_fetch_array($krr1);

 $krr2 = mysqli_query($koneksi, "SELECT 
      min(nilai) as minK2 FROM nilai_saw WHERE id_kriteria='2' ");
 $dd2 = mysqli_fetch_array($krr2);

 $krr3 = mysqli_query($koneksi, "SELECT 
      min(nilai) as minK3 FROM nilai_saw WHERE id_kriteria='3' ");
 $dd3 = mysqli_fetch_array($krr3);

 $krr4 = mysqli_query($koneksi, "SELECT 
      min(nilai) as minK4 FROM nilai_saw WHERE id_kriteria='4' ");
 $dd4 = mysqli_fetch_array($krr4);

 $krr5 = mysqli_query($koneksi, "SELECT 
      min(nilai) as minK5 FROM nilai_saw WHERE id_kriteria='5' ");
 $dd5 = mysqli_fetch_array($krr5);



//  var_dump($dd);
//  echo $dd['minK1']; echo"<br>";
//  echo $dd2['minK2'];
//  echo $dd3['minK3'];
//  echo $dd4['minK4'];
//  echo $dd5['minK5'];
//  echo $dd6['minK6'];
 
 $sql10 = mysqli_query($koneksi, "SELECT *
FROM nilai_saw where id_kriteria" );
 $coba = mysqli_fetch_array($sql10);
var_dump($coba['nil2']);

 $sql2 = mysqli_query($koneksi, "SELECT * FROM nilai_saw where id_kriteria='1' ");
 
 $sql3 = mysqli_query($koneksi, "SELECT * FROM nilai_saw where id_kriteria='2' ");
 $sql4 = mysqli_query($koneksi, "SELECT * FROM nilai_saw where id_kriteria='3' ");
 $sql5 = mysqli_query($koneksi, "SELECT * FROM nilai_saw where id_kriteria='4' ");
 $sql6 = mysqli_query($koneksi, "SELECT * FROM nilai_saw where id_kriteria='5' ");

 
 //Buat tabel untuk menampilkan hasil
$qkriteria = mysqli_query($koneksi, "SELECT * from tbl_kriteria");
echo "<br><H3>Matrik Normalisasi</H3>
 <table class='table table-bordered' >
 <thead>
  <tr>
   <td style='text-align:center;'>No</td>
   <td>Nama</td>";

   while ($k = mysqli_fetch_array($qkriteria)) {
     echo "<td style='text-align:center;'>".$k['nama_kriteria']."</td>";
    // var_dump($k['nama_kriteria']);
   }
   // <td style='text-align:center;'>C1</td>
   // <td style='text-align:center;'>C2</td>
   // <td style='text-align:center;'>C3</td>
   // <td style='text-align:center;'>C4</td>
  echo "</tr>
  </thead>
  <tbody>
  ";

  $bobotArray = array('');

  $qb = mysqli_query($koneksi, "SELECT * from tbl_kriteria");
  
  while ($b = mysqli_fetch_array($qb)) {
    // $bobotArray = $bobot['bobot'];
    array_push($bobotArray, $b['bobot']);
  }


  $k1 = "";
$k2 = "";
$k3 = "";
$k4 = "";
$k5 = "";

$qk = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");
while ($row = mysqli_fetch_array($qk)) {
    if ($row['atribute'] == "benefit") {
    if ($row['id_kriteria'] == 1) {
        $k1 = "benefit";
      } elseif ($row['id_kriteria'] == 2) {
        $k2 = "benefit";
      } elseif ($row['id_kriteria'] == 3) {
        $k3 = "benefit";
      } elseif ($row['id_kriteria'] == 4) {
        $k4 = "benefit";
      } elseif ($row['id_kriteria'] == 5) {
        $k5 = "benefit";
    } else {
      if ($row['id_kriteria'] == 1) {
        $k1 = "cost";
      } elseif ($row['id_kriteria'] == 2) {
        $k2 = "cost";
      } elseif ($row['id_kriteria'] == 3) {
        $k3 = "cost";
      } elseif ($row['id_kriteria'] == 4) {
        $k4 = "cost";
      } elseif ($row['id_kriteria'] == 5) {
        $k5 = "cost";

  }  
}
    }}
$no = 1;
 while ($dt2 = mysqli_fetch_array($sql10)) {
  echo "<tr>
   <td style='text-align:center;'>$no</td>
   
   <td style='text-align:center;'>";
        if ($k1 == "cost") {
          echo round($dd['minK1']/$dt2['nilai'],4);
        } else {
          echo $dt2['nil1'];
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k1 == "cost") {
          echo round($dd2['minK2']/$dt2['nilai'],4);
        } else {
          echo $dt2['nilai']/$dd['minK1'];
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k1 == "cost") {
          echo round($dd['minK1']/$dt2['nilai'],4);
        } else {
          echo $dt2['nilai']/$dd['minK1'];
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k1 == "cost") {
          echo round($dd['minK1']/$dt2['nilai'],4);
        } else {
          echo $dt2['nilai']/$dd['minK1'];
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k1 == "cost") {
          echo round($dd['minK1']/$dt2['nilai'],4);
        } else {
          echo $dt2['nilai']/$dd['minK1'];
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k1 == "cost") {
          echo round($dd['minK1']/$dt2['nilai'],4);
        } else {
          echo $dt2['nilai']/$dd['minK1'];
        }
   echo "</td>
   
  
    
   
      

  
  </tr>";
 $no++;
 }
 echo "</tbody></table>";
?>



<?php

 //Buat fungsi tampilkan nama

 function getNama($id){
  include 'aksilogin/config.php';
  $q =mysqli_query($koneksi, "SELECT * FROm tb_pasien where id_pasien = '$id'");
  $d = mysqli_fetch_array($q);
  return $d['nama'];
 }

    function getId($id){
  include 'aksilogin/config.php';
  $q =mysqli_query($koneksi, "SELECT * FROm tb_pasien where id_pasien = '$id'");
  $d = mysqli_fetch_array($q);
  return $d['id_pasien'];
 }
 

 //Setelah bobot terbuat select semua di tabel Matrik


 $qkriteria = mysqli_query($koneksi, "SELECT * from tbl_kriteria");

 $sql = mysqli_query($koneksi,"SELECT * FROM tb_nilai");
 //Buat tabel untuk menampilkan hasil
 echo "<H3>Matrik Awal</H3>
 <table class='table table-bordered' >
 <thead>
  <tr>
   <td style='text-align:center;'>No</td>
   <td>Nama</td>";
   while ($qk = mysqli_fetch_array($qkriteria)) {
     echo "<td style='text-align:center;'>".$qk['nama_kriteria']."</td>";
   }
   // <td style='text-align:center;'>C1</td>
   // <td style='text-align:center;'>C2</td>
   // <td style='text-align:center;'>C3</td>
   // <td style='text-align:center;'>C4</td>
   echo "
  </tr>
  </thead>
  <tbody>
  ";
 $no = 1;
 while ($dt = mysqli_fetch_array($sql)) {
 
  echo "<tr>
   <td style='text-align:center;'>$no</td>
   <td>".getNama($dt['id_pasien'])."</td>
   <td style='text-align:center;'>$dt[kriteria1]</td>
   <td style='text-align:center;'>$dt[kriteria2]</td>
   <td style='text-align:center;'>$dt[kriteria3]</td>
   <td style='text-align:center;'>$dt[kriteria4]</td>
   <td style='text-align:center;'>$dt[kriteria4]</td>

  
  
  </tr>";
 $no++;
 }
 echo "</tbody></table>";


 //Lakukan Normalisasi dengan rumus pada langkah 2
 //Cari Max atau min dari tiap kolom Matrik
 $cr = mysqli_query($koneksi, "SELECT 
      min(kriteria1) as minK1, 
      min(kriteria2) as minK2,
      min(kriteria3) as minK3,
      min(kriteria4) as minK4,
      min(kriteria5) as minK5,

      max(kriteria1) as maxK1,
      max(kriteria2) as maxK2,
      max(kriteria3) as maxK3,
      max(kriteria4) as maxK4,
      max(kriteria5) as maxK5

   FROM tb_nilai");
 $atribut = mysqli_fetch_array($cr);

 //$kriteria = mysql_query("SELECT (atribute) as atr  FROM kriteria")

$qkriteria = mysqli_query($koneksi, "SELECT * from tbl_kriteria");

$bobotArray = array('');

$qb = mysqli_query($koneksi, "SELECT * from tbl_kriteria");

while ($b = mysqli_fetch_array($qb)) {
  // $bobotArray = $bobot['bobot'];
  array_push($bobotArray, $b['bobot']);
}

//normalisasi bobot

$bt1 = $bobotArray[1]/($bobotArray[1]+$bobotArray[2]+$bobotArray[3]+$bobotArray[4]+$bobotArray[5]+$bobotArray[5]);

$bt2 = $bobotArray[2]/($bobotArray[1]+$bobotArray[2]+$bobotArray[3]+$bobotArray[4]+$bobotArray[5]+$bobotArray[5]);

$bt3 = $bobotArray[3]/($bobotArray[1]+$bobotArray[2]+$bobotArray[3]+$bobotArray[4]+$bobotArray[5]+$bobotArray[5]);

$bt4 = $bobotArray[4]/($bobotArray[1]+$bobotArray[2]+$bobotArray[3]+$bobotArray[4]+$bobotArray[5]+$bobotArray[5]);

$bt5 = $bobotArray[5]/($bobotArray[1]+$bobotArray[2]+$bobotArray[3]+$bobotArray[4]+$bobotArray[5]+$bobotArray[5]);

 //Hitung Normalisasi tiap Elemen
 $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_nilai ");
 //Buat tabel untuk menampilkan hasil
$qkriteria = mysqli_query($koneksi, "SELECT * from tbl_kriteria");
echo "<br><H3>Matrik Normalisasi</H3>
 <table class='table table-bordered' >
 <thead>
  <tr>
   <td style='text-align:center;'>No</td>
   <td>Nama</td>";

   while ($k = mysqli_fetch_array($qkriteria)) {
     echo "<td style='text-align:center;'>".$k['nama_kriteria']."</td>";
    // var_dump($k['nama_kriteria']);
   }
   // <td style='text-align:center;'>C1</td>
   // <td style='text-align:center;'>C2</td>
   // <td style='text-align:center;'>C3</td>
   // <td style='text-align:center;'>C4</td>
  echo "</tr>
  </thead>
  <tbody>
  ";



$k1 = "";
$k2 = "";
$k3 = "";
$k4 = "";
$k5 = "";


$qk = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");
while ($row = mysqli_fetch_array($qk)) {
    if ($row['atribute'] == "benefit") {
    if ($row['id_kriteria'] == 1) {
        $k1 = "benefit";
      } elseif ($row['id_kriteria'] == 2) {
        $k2 = "benefit";
      } elseif ($row['id_kriteria'] == 3) {
        $k3 = "benefit";
      } elseif ($row['id_kriteria'] == 4) {
        $k4 = "benefit";
      } elseif ($row['id_kriteria'] == 5) {
        $k5 = "benefit";
      }
    } else {
      if ($row['id_kriteria'] == 1) {
        $k1 = "cost";
      } elseif ($row['id_kriteria'] == 2) {
        $k2 = "cost";
      } elseif ($row['id_kriteria'] == 3) {
        $k3 = "cost";
      } elseif ($row['id_kriteria'] == 4) {
        $k4 = "cost";
      } elseif ($row['id_kriteria'] == 5) {
        $k5 = "cost";
      }
  }  
}

$no = 1;
 while ($dt2 = mysqli_fetch_array($sql2)) {
  echo "<tr>
   <td style='text-align:center;'>$no</td>
   <td>".getNama($dt2['id_pasien'])."</td>
   <td style='text-align:center;'>";
        if ($k1 == "cost") {
          echo round($atribut['minK1']/$dt2['kriteria1'],4);
        } else {
          echo round($dt2['kriteria1']/$atribut['maxK1'],4);
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k2 == "cost") {
          echo round($atribut['minK2']/$dt2['kriteria2'],4);
        } else {
          echo round($dt2['kriteria2']/$atribut['maxK2'],4);
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k3 == "cost") {
          echo round($atribut['minK3']/$dt2['kriteria3'],4);
        } else {
          echo round($dt2['kriteria3']/$atribut['maxK3'],4);
        }
   echo "</td>
      <td style='text-align:center;'>";
        if ($k4 == "cost") {
          echo round($atribut['minK4']/$dt2['kriteria4'],4);
        } else {
          echo round($dt2['kriteria4']/$atribut['maxK4'],4);
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k5 == "cost") {
          echo round($atribut['minK5']/$dt2['kriteria5'],4);
        } else {
          echo round($dt2['kriteria5']/$atribut['maxK5'],4);
        }
   echo "</td>

  
  </tr>";
 $no++;
 }
 echo "</tbody></table>";

 //Proses perangkingan dengan rumus langkah 3
 $sql3 = mysqli_query($koneksi,"SELECT * FROM tb_nilai");

 //Buat tabel untuk menampilkan hasil
 echo "<H2>Perangkingan Penyakit Pasien</H2>
 <br>
 <table class='table table-bordered'>
  <tr>
   <td style='text-align:center;'>No</td>
   <td>Nama</td>
   <td style='text-align:center;'>Jumlah Perhitungan Metode SAW</td>
   <td style='text-align:center;'>Keterangan</td>
  </tr>
  ";

$bobotArray = array('');

$qb = mysqli_query($koneksi, "SELECT * from tbl_kriteria");

while ($b = mysqli_fetch_array($qb)) {
  // $bobotArray = $bobot['bobot'];
  array_push($bobotArray, $b['bobot']);
}

//Kita gunakan rumus (Normalisasi x bobot)
 while ($dt3 = mysqli_fetch_array($sql3)) {
  //$jumlah= ($dt3['kriteria1'])+($dt3['kriteria2'])+($dt3['kriteria3'])+($dt3['kriteria4']);

  $normalisasi1 = 0;
  $normalisasi2 = 0;
  $normalisasi3 = 0;
  $normalisasi4 = 0;
  $normalisasi5 = 0;

 
if ($k1 == "benefit") {
    $normalisasi1 = $dt3['kriteria1']/$atribut['maxK1'];
} else {
  $normalisasi1 = $atribut['minK1']/$dt3['kriteria1'];
} 
if ($k2 == "benefit") {
    $normalisasi2 = $dt3['kriteria2']/$atribut['maxK2'];
} else {
  $normalisasi2 = $atribut['minK2']/$dt3['kriteria2'];
}
if ($k3 == "benefit") {
    $normalisasi3 = $dt3['kriteria3']/$atribut['maxK3'];
} else {
  $normalisasi3 = $atribut['minK3']/$dt3['kriteria3'];
}
if ($k4 == "benefit") {
    $normalisasi4 = $dt3['kriteria4']/$atribut['maxK4'];
} else {
  $normalisasi4 = $atribut['minK4']/$dt3['kriteria4'];
}
if ($k5 == "benefit") {
    $normalisasi5 = $dt3['kriteria5']/$atribut['maxK5'];
} else {
  $normalisasi5 = $atribut['minK5']/$dt3['kriteria5'];
}


$poin = round(
   ($normalisasi1*$bt1)+
   ($normalisasi2*$bt2)+
   ($normalisasi3*$bt3)+
   ($normalisasi4*$bt4)+
   ($normalisasi5*$bt5),2);
   
  // $poin= round(
  //  (($dt3['kriteria1']/$atribut['minK1'])*$bobotArray[1])+
  //  (($dt3['kriteria2']/$atribut['minK2'])*$bobotArray[2])+
  //  (($dt3['kriteria3']/$atribut['maxK3'])*$bobotArray[3])+
  //  (($dt3['kriteria4']/$atribut['maxK4'])*$bobotArray[4]),3);

  $data[]=array('nama'=>getNama($dt3['id_pasien']),
  'id_pasien'=>getId($dt3['id_pasien']),
    'poin'=>$poin);

}

//mengurutkan data
 foreach ($data as $key => $isi) {
  $nama[$key]=$isi['nama'];
  $id_pasien[$key]=$isi['id_pasien'];
  
  $poin1[$key]=$isi['poin'];
 }
   array_multisort($poin1,SORT_DESC,$data);
   $no=1;
   $h="peringkat";
   $peringkat=1;
   $hr=1;

   foreach ($data as $item) { ?>
   <tr>
   <td style='text-align:center;'><?php echo $no ?></td>
   <td><?php echo $item['nama'] ?></td>
   
   <td style='text-align:center;'><?php echo$item['poin'] ?></td>
   <td style='text-align:center;'><?php echo"$h $peringkat" ?></td>
   </tr>
   <?php
   $no++;
   if ($no>=100) {
    $h="  ";
    $peringkat=" ";
   }else{
    $peringkat++;
   }

   }
   echo "</table>";


?>
<a href="cetak_hasil_saw.php" target="_blank" class="btn btn-danger"><i class="fas fa-print"> Cetak</i></a>
 </div>
  </div>
   </div>
    </div>
      </div>
<?php
include './template/footer.php';
?>