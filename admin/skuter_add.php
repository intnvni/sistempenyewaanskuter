<?php
include('includes/config.php');
error_reporting(0);
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$foto=$_FILES["foto"]["name"];
$str1 = substr($img1,-5);
$fotoo = date('dmYHis').$str1;
$status=$_POST['status'];
$sql 	= "INSERT INTO skuter (nama,harga,foto,status)
			VALUES ('$nama','$harga','$fotoo','$status')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	move_uploaded_file($_FILES["img1"]["tmp_name"],"../img".$fotoo);
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'skuter.php'; 
		</script>"; 
}else {
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);

	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'skuter_tambah.php'; 
		</script>";
}
?>