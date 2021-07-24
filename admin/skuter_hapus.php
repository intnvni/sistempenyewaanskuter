<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['status'])==1)
	{	
header('location:../index.php');
}
else{
if(isset($_GET['id'])){
	$id	= $_GET['id'];
	$mySql	= "DELETE FROM skuter WHERE id_skuter='$id'";
	$myQry	= mysqli_query($koneksidb, $mySql);
	echo "<script type='text/javascript'>
			alert('Data berhasil dihapus.'); 
			document.location = 'skuter.php'; 
		</script>";
}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'skuter.php'; 
		</script>";
}
}
?>