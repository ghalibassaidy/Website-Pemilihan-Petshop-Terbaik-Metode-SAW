<?php 
include 'aksilogin/config.php';

// mengaktifkan session
session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:index.php?pesan=gagal");
}
 
$data = mysqli_query($koneksi, "SELECT * FROM tb_coffeshop");
$nomor = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Data Petshop</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid black;
      text-align: center;
      padding: 8px;
    }
    th {
      background-color: #f2f2f2;
    }
    .no-print {
      display: none;
    }
    .footer {
      margin-top: 50px;
      text-align: right;
    }
    .signature {
      margin-top: 80px;
      text-align: right;
    }
  </style>
</head>
<body>

<h2 style="text-align:center;">Data Petshop</h2>

<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($a = mysqli_fetch_array($data)) { ?>
    <tr>
      <td><?php echo $nomor++; ?></td>
      <td><?php echo $a['nama']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<div class="footer">
  <p>Jakarta, <?php echo date('d-m-Y'); ?></p>
</div>

<div class="signature">
  <p><br><br>_____________________<br>R.Dobry</p>
</div>

<script>
  window.print(); // Mencetak halaman secara otomatis ketika dibuka
</script>

</body>
</html>
