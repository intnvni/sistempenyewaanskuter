<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['username'])==1)
	{	
header('location:../index.php');
}
else{
if(isset($_GET['id'])){
	$id	= $_GET['id'];
	$mySql	= "DELETE FROM tanya WHERE id_cu='$id'";
	$myQry	= mysqli_query($koneksidb, $mySql);
	echo "<script type='text/javascript'>
			alert('Data berhasil dihapus.'); 
			document.location = 'manage-tanya.php'; 
		</script>";
}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'manage-tanya.php'; 
		</script>";
}
}
?>