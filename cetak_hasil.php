<?php
include 'aksilogin/config.php';
session_start();

if ($_SESSION['level'] == "") {
    header("location:index.php?pesan=gagal");
}

function getNama($id) {
    include 'aksilogin/config.php';
    $q = mysqli_query($koneksi, "SELECT * FROM tb_coffeshop WHERE id_coffeshop = '$id'");
    $d = mysqli_fetch_array($q);
    return $d['nama'];
}

// Hitung atribut (min dan max)
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
$atribut = mysqli_fetch_array($cr);

// Ambil semua data untuk ditampilkan
$qkriteria = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");
$sql = mysqli_query($koneksi, "SELECT * FROM tb_nilai");

?>
<html>

<head>
    <title>Cetak Hasil Perhitungan Metode SAW</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body onload="window.print();">
    <div style="width:100%;margin:0 auto;text-align:center;">
        <h3>Hasil Perhitungan Metode SAW</h3>
    </div>

    <h3>Matrik Awal</h3>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <?php while ($qk = mysqli_fetch_array($qkriteria)) {
                    echo "<td>".$qk['nama_kriteria']."</td>";
                } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($dt = mysqli_fetch_array($sql)) {
                echo "<tr>
                    <td>$no</td>
                    <td>".getNama($dt['id_coffeshop'])."</td>
                    <td>$dt[kriteria1]</td>
                    <td>$dt[kriteria2]</td>
                    <td>$dt[kriteria3]</td>
                    <td>$dt[kriteria4]</td>
                    <td>$dt[kriteria5]</td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>

    <h3>Matrik Normalisasi</h3>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <?php
                $qkriteria = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");
                while ($k = mysqli_fetch_array($qkriteria)) {
                    echo "<td>".$k['nama_kriteria']."</td>";
                } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_nilai");

            $no = 1;
            while ($dt2 = mysqli_fetch_array($sql2)) {
                echo "<tr>
                    <td>$no</td>
                    <td>".getNama($dt2['id_coffeshop'])."</td>";

                // Normalisasi setiap kriteria
                for ($i = 1; $i <= 5; $i++) {
                    $kriteria = "kriteria$i";
                    $maxK = "maxK$i";
                    $minK = "minK$i";

                    // Sesuaikan logika normalisasi sesuai dengan tipe kriteria
                    if ($i == 1 || $i == 2) { // Cost
                        $normalisasi = $atribut[$minK] / $dt2[$kriteria];
                    } else { // Benefit
                        $normalisasi = $dt2[$kriteria] / $atribut[$maxK];
                    }
                    echo "<td>".round($normalisasi, 4)."</td>";
                }

                echo "</tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>

    <h3>Hasil Akhir</h3>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Nilai</td>
                <td>Peringkat</td>
            </tr>
        </thead>
        <tbody>
            <?php
            // Hitung dan tampilkan hasil akhir
            $data = array(); // Array untuk menyimpan hasil perhitungan
            $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_nilai");

            while ($dt2 = mysqli_fetch_array($sql2)) {
                $poin = 0;
                for ($i = 1; $i <= 5; $i++) {
                    $kriteria = "kriteria$i";
                    $maxK = "maxK$i";
                    $minK = "minK$i";

                    // Normalisasi setiap kriteria
                    if ($i == 1 || $i == 2) { // Cost
                        $normalisasi = $atribut[$minK] / $dt2[$kriteria];
                    } else { // Benefit
                        $normalisasi = $dt2[$kriteria] / $atribut[$maxK];
                    }

                    // Ambil bobot dari database
                    $qb = mysqli_query($koneksi, "SELECT bobot FROM tbl_kriteria WHERE id_kriteria = $i");
                    $bobot = mysqli_fetch_array($qb)['bobot'];

                    // Hitung poin
                    $poin += $normalisasi * $bobot;
                }

                // Simpan hasil ke dalam array data
                $data[] = array(
                    'nama' => getNama($dt2['id_coffeshop']),
                    'poin' => $poin
                );
            }

            // Sorting berdasarkan poin
            usort($data, function($a, $b) {
                return $b['poin'] <=> $a['poin'];
            });

            $no = 1;
            foreach ($data as $item) {
                echo "<tr>
                    <td>$no</td>
                    <td>".$item['nama']."</td>
                    <td>".$item['poin']."</td>
                    <td>$no</td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>

    <!-- Menambahkan tempat, tanggal, dan tanda tangan -->
    <div style="margin-top: 50px;">
        <p>Jakarta Selatan, <?php echo date('l, d F Y'); ?></p>
        <br>
        <div style="text-align: right;">
            <p>Tertanda di bawah ini,</p>
            <br><br><br><br>
            <p>____________________________</p>
            <p>R. Dobry.N.O</p>
        </div>
    </div>

</body>

</html>
