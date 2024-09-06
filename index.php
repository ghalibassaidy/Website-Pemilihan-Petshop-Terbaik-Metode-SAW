<!DOCTYPE html>
<html>
<head>
	<title>Login | SPK Penentuan Petshop Terbaik</title>
	<link rel="icon" href="assets/img/bg1.jpeg" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="assets/logins/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<h2><center><br> Sistem Pendukung Keputusan untuk Pemilihan Petshop Terbaik</center></h2>
	<img class="wave" src="assets/logins/img/wave.png">
	<div class="container">
		<div class="img">
			
			
		</div>
		<div class="login-content">
			<form action="login.php" method="post">
				
				<h2 class="title">Login</h2>
        <?php 
if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if($pesan == "input"){
        echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di tambah.</div>';
    }else if($pesan == "error"){
        echo '<div class="alert alert-success alert-dismissible">Username atau password salah!</div>';
    }
}
?>
               <h5>Username</h5>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
                 <div class="div">
           		   		<input type="text" name="username" class="input" placeholder="Masukkan username">
           		   </div>
           		</div>
              <h5>Password</h5>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	
           		    	<input type="password" name="password" class="input" placeholder="Masukkan password">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" name="Submit" class="btn" value="Login">
            </form>
        </div>
    </div>

    <script type="text/javascript" src="assets/logins/s/main.js"></script>
</body>
</html>

    