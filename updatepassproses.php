<?php
session_start();
error_reporting(0);
include('includes/config.php');
	$passw=$_POST['pass'];
	$pass=$passw;
	$new=$_POST['new'];
	$confirm=$_POST['confirm'];
	$mail=$_POST['mail'];
	
	$sql="SELECT * FROM user WHERE email='$mail' AND password='$pass'";
	$query = mysqli_query($koneksidb,$sql);
	if(mysqli_num_rows($query)==1){
		if($confirm==$new){
			$newpass=$new;
			$sqlup="UPDATE user SET password='$newpass' WHERE email='$mail'";
			$queryup= mysqli_query($koneksidb,$sqlup);
			if($queryup){
				echo 
				"<script type='text/javascript'>
				alert('Berhasil update password.'); 
				document.location = 'updatepass.php'; 
				</script>";
			}else{
				echo 
				"<script type='text/javascript'>
				alert('Gagal update password!'); 
				document.location = 'updatepass.php'; 
				</script>";
			}
		}else{
			echo 
				"<script type='text/javascript'>
				alert('Password baru dan konfirmasi password tidak sama!'); 
				document.location = 'updatepass.php'; 
				</script>";
		}
	}else{
		
		echo 
				"<script type='text/javascript'>
				alert('Password salah!'); 
				document.location = 'updatepass.php'; 
				</script>";
	}
?>