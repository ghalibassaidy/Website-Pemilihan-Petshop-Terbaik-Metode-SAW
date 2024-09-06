<?php
// Koneksi
include 'aksilogin/config.php';
session_start();

// Cek apakah sudah login
if (empty($_SESSION['level'])) {
    header("location:index.php?pesan=gagal");
    exit();
}

include './template/header.php';
include './template/navbar.php';

$page = 'perhitungan_saw'; 
include './template/sidebar.php';
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-header">
                        <h4 class="card-title">Hasil Perhitungan Metode SAW</h4>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <?php
                            function getNama($id){
                                global $koneksi;
                                $q = mysqli_query($koneksi, "SELECT nama FROM tb_coffeshop WHERE id_coffeshop = '$id'");
                                $d = mysqli_fetch_assoc($q);
                                return $d['nama'];
                            }

                            // Setiap data kriteria, nilai, dan bobot diambil dari database
                            $qkriteria = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_nilai");

                            echo "<h3>Matrik Awal</h3>
                            <table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <td style='text-align:center;'>No</td>
                                    <td>Nama</td>";
                                    while ($qk = mysqli_fetch_assoc($qkriteria)) {
                                        echo "<td style='text-align:center;'>".$qk['nama_kriteria']."</td>";
                                    }
                                    echo "
                                </tr>
                            </thead>
                            <tbody>";

                            $no = 1;
                            while ($dt = mysqli_fetch_assoc($sql)) {
                                echo "<tr>
                                    <td style='text-align:center;'>$no</td>
                                    <td>".getNama($dt['id_coffeshop'])."</td>
                                    <td style='text-align:center;'>$dt[kriteria1]</td>
                                    <td style='text-align:center;'>$dt[kriteria2]</td>
                                    <td style='text-align:center;'>$dt[kriteria3]</td>
                                    <td style='text-align:center;'>$dt[kriteria4]</td>
                                    <td style='text-align:center;'>$dt[kriteria5]</td>
                                </tr>";
                                $no++;
                            }
                            echo "</tbody></table>";

                            $cr = mysqli_query($koneksi, "SELECT 
                                MIN(kriteria1) as minK1, 
                                MIN(kriteria2) as minK2,
                                MIN(kriteria3) as minK3,
                                MIN(kriteria4) as minK4,
                                MIN(kriteria5) as minK5,
                                MAX(kriteria1) as maxK1,
                                MAX(kriteria2) as maxK2,
                                MAX(kriteria3) as maxK3,
                                MAX(kriteria4) as maxK4,
                                MAX(kriteria5) as maxK5
                            FROM tb_nilai");
                            $atribut = mysqli_fetch_assoc($cr);

                            $bobotArray = array();
                            $qb = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");
                            while ($b = mysqli_fetch_assoc($qb)) {
                                $bobotArray[] = $b['bobot'];
                            }

                            // Inisialisasi variabel bobot untuk kriteria
                            $bt1 = $bobotArray[0];
                            $bt2 = $bobotArray[1];
                            $bt3 = $bobotArray[2];
                            $bt4 = $bobotArray[3];
                            $bt5 = $bobotArray[4];

                            // Tampilkan tabel normalisasi
                            $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_nilai");
                            echo "<br><h3>Matrik Normalisasi</h3>
                            <table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <td style='text-align:center;'>No</td>
                                    <td>Nama</td>";
                                    $qkriteria = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");
                                    while ($k = mysqli_fetch_assoc($qkriteria)) {
                                        echo "<td style='text-align:center;'>".$k['nama_kriteria']."</td>";
                                    }
                                    echo "</tr>
                            </thead>
                            <tbody>";

                            $no = 1;
                            $data = array(); // Inisialisasi array data untuk perhitungan akhir

                            while ($dt2 = mysqli_fetch_assoc($sql2)) {
                                $normalisasi = array();
                                echo "<tr>
                                    <td style='text-align:center;'>$no</td>
                                    <td>".getNama($dt2['id_coffeshop'])."</td>";

                                // Normalisasi setiap kriteria
                                for ($i = 1; $i <= 5; $i++) {
                                    $kriteria = "kriteria$i";
                                    $maxK = "maxK$i";
                                    $minK = "minK$i";

                                    // Sesuaikan logika normalisasi sesuai dengan tipe kriteria
                                    if ($i == 1 || $i == 2) { // Cost
                                        if ($dt2[$kriteria] == 0) {
                                            $normalisasi[$i] = 0; // Avoid division by zero
                                        } else {
                                            $normalisasi[$i] = $atribut[$minK] / $dt2[$kriteria];
                                        }
                                    } else { // Benefit
                                        if ($atribut[$maxK] == 0) {
                                            $normalisasi[$i] = 0; // Avoid division by zero
                                        } else {
                                            $normalisasi[$i] = $dt2[$kriteria] / $atribut[$maxK];
                                        }
                                    }
                                    echo "<td style='text-align:center;'>".round($normalisasi[$i], 4)."</td>";
                                }

                                // Menghitung total poin berdasarkan bobot
                                $poin = round(
                                    ($normalisasi[1] * $bt1) +
                                    ($normalisasi[2] * $bt2) +
                                    ($normalisasi[3] * $bt3) +
                                    ($normalisasi[4] * $bt4) +
                                    ($normalisasi[5] * $bt5), 5
                                );

                                // Simpan hasil ke dalam array data untuk sorting
                                $data[] = array(
                                    'nama' => getNama($dt2['id_coffeshop']),
                                    'poin' => $poin
                                );

                                echo "</tr>";
                                $no++;
                            }
                            echo "</tbody></table>";

                            // Sorting berdasarkan poin
                            usort($data, function($a, $b) {
                                return $b['poin'] <=> $a['poin'];
                            });

                            // Tampilkan hasil akhir
                            echo "<br><h3>Hasil Akhir</h3>
                            <table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <td style='text-align:center;'>No</td>
                                    <td>Nama</td>
                                    <td style='text-align:center;'>Nilai</td>
                                    <td style='text-align:center;'>Peringkat</td>
                                </tr>
                            </thead>
                            <tbody>";

                            $no = 1;
                            foreach ($data as $item) {
                                echo "<tr>
                                    <td style='text-align:center;'>$no</td>
                                    <td>".$item['nama']."</td>
                                    <td style='text-align:center;'>".$item['poin']."</td>
                                    <td style='text-align:center;'>$no</td>
                                </tr>";
                                $no++;
                            }

                            echo "</tbody></table>";
                            ?>
                            <!-- Tambahkan Tombol Cetak -->
                            <button onclick="window.open('cetak_hasil.php', '_blank')">Cetak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './template/footer.php'; ?>
