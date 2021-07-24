<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="shortcut icon" href="img/s.jpg">
	<style type="text/css">
body {
  font-family: arial;
  font-size: 14px;
  background-color: #444;
} 

#utama{
  width: 300px;
  margin: 0 auto;
  margin-top: 12%;
}

#judul{
  padding: 15px;
  text-align: center;
  color: #fff;
  font-size: 20px;
  background-color: #339966;
  border-top-right-radius: 10px;
  border-top-left-radius: 10px;
  border-bottom: 3px solid #336666;

}

#inputan{
  background-color: #eaeaec;
  padding: 20px;
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
}

input{
  padding: 10px;
  border: 0;
}

.lg{
  width: 240px;
}

.btn{
  background-color: #339966;
  border-radius: 10px;
  color: #fff;
}


</style>  
</head>
<body>
	<!-- cek pesan notifikasi -->
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "<script>alert('Email atau Password Salah!');</script>";
		}else if($_GET['pesan'] == "belum_login"){
			echo "<script>alert('Anda harus login untuk mengakses halaman admin!');</script>";
		}
	}
	?>
	
<div id="utama">
	<div id="judul">
      Halaman Login
  </div>
	<div id="inputan">
	<center><form method="post" action="cek_login.php">
		<table>
		<div>
      <label>Username</label>
      <input type="text" name="username" placeholder="Masukan Username" class="lg"/>
  		</div>  
    <div style="margin-top: 10px;">
      <label>Password</label>
      <input type="password" name="password" placeholder="Masukan Password" class="lg"/>
    </div>
    <div style="margin-top: 10px;">
      <input type="submit" name="login" value="Login" class="btn" />
    </div>
		</table>			
	</form></center>
  <div class="modal-footer text-center">
        <p>Belum punya akun? <a href="regist.php">Daftar Disini</a></p>
        <!--<p>Lupa Password? <a href="#forgotpassword" data-toggle="modal" data-dismiss="modal">Klik disini</a></p>-->
      </div>
</div>
</div>
</body>
</html>