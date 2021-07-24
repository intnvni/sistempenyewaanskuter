<?php
include('includes/config.php');
error_reporting(0);
$id=$_POST['id'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$foto=$_POST['foto'];
$status=$_POST['status'];

$sql 	= "UPDATE skuter SET nama='$nama',harga='$harga',foto='$foto',status='$status' WHERE id_skuter='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil ubah data.'); 
			document.location = 'skuter.php'; 
		</script>";
}else {
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);

	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'skuter_edit.php?id=$id'; 
		</script>";
}
?>