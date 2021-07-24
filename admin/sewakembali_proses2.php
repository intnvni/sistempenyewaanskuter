<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if(!isset($_SESSION['username'])==1)
	{	
header('location:../index.php');
}
else{
	if(isset($_POST['submit'])){
		if(isset($_POST['submit'])){
		$today=date('Ymd');
		$id=$_POST['id_skuter'];
		$denda=$_POST['denda'];

		$sql = "SELECT max(id_transaksi) AS last FROM transaksikembali WHERE id_transaksi LIKE '$today%'";
		$query = mysqli_query ($koneksidb,$sql);
		$result = mysqli_fetch_array($query);
		$lastnobooking = $result['last'];
		$lastnourut = substr($lastnobooking, 8, 4);
		$nextnourut = $lastnourut + 1;
		$nextnobooking = $today.sprintf('%04s', $nextnourut);

		//insert
		$sql 	= "INSERT INTO transaksikembali (id_transaksi,id_skuter,denda) VALUES('$nextnobooking','$id','$denda')";
		//die($sql);
		$query 	= mysqli_query($koneksidb,$sql);
		if($query){

			$sql1 = "SELECT * FROM skuter WHERE id_skuter='$id'";
			$query1 = mysqli_query($koneksidb,$sql1);
			$result = mysqli_fetch_array($query1);
			$status = 'ada';

			$sql2 = "UPDATE skuter SET status='$status' WHERE id_skuter = '$id'";
			$query2 = mysqli_query($koneksidb,$sql2);

			echo " <script> alert ('Skuter berhasil diUpdate!'); </script> ";
			echo "<script type='text/javascript'> document.location = 'sewakembali_detail.php?id=".$nextnobooking."'; </script>";
			} else {
				echo " <script> alert ('Ooops, terjadi kesalahan. Silahkan coba lagi!'); </script> ";
			}
		}
	}
		?>

</body>
</html>
<?php } ?>