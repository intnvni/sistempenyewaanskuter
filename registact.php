<?php
session_start();
error_reporting(0);
include('includes/config.php');
$username=$_POST['username'];
$email=$_POST['email']; 
$telp=$_POST['telp'];
$alamat=$_POST['alamat']; 
$password = $_POST['password'];
$conf = $_POST['conf'];
if($conf!=$password){
	echo "<script>alert('Password tidak sama!');</script>";
	echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";			
}else{
	$sqlcek = "SELECT username FROM user WHERE username='$username'";
	$querycek = mysqli_query($koneksidb,$sqlcek);
		if(mysqli_num_rows($querycek)>0){
			echo "<script>alert('Username sudah terdaftar, silahkan gunakan username lain!');</script>";
			echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";			
		}else{
			$password=$_POST['password'];
			$sql1="INSERT INTO user(username,password,email,telp,alamat) VALUES('$username','$password','$email','$telp','$alamat')";
			$lastInsertId = mysqli_query($koneksidb, $sql1);
				if($lastInsertId){
					echo "<script>alert('Registrasi berhasil! Sekarang anda bisa login!');</script>";
					echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
				}else {
					echo "<script>alert('Ops, terjadi kesalahan! Silahkan coba lagi!');</script>";
					echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";
				}
		}	
}
?>