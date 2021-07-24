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
?>
<!DOCTYPE HTML>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title><?php echo $pagedesc;?></title>
	<link rel="shortcut icon" href="img/s.jpg">

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
        
<!--Header-->
<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
<?php
$id=$_GET['id'];
$id_skuter=$_GET['id_skuter'];
$denda=$_GET['denda'];

/*$sql = "SELECT max(id_transaksi) AS last FROM transaksikembali WHERE id_transaksi LIKE '$today%'";
$query = mysqli_query ($koneksidb,$sql);
$result = mysqli_fetch_array($query);
$lastnobooking = $result['last'];
$lastnourut = substr($lastnobooking, 8, 4);
$nextnourut = $lastnourut + 1;
$nextnobooking = $today.sprintf('%04s', $nextnourut);*/

$sql1 	= "SELECT transaksikembali.id_transaksi,skuter.id_skuter,skuter.nama,transaksikembali.denda FROM transaksikembali JOIN skuter ON skuter.id_skuter=transaksikembali.id_skuter WHERE transaksikembali.id_skuter = '".$id_skuter."' AND transaksikembali.denda = '".$denda."' OR transaksikembali.id_transaksi = '".$id."'";
//die($sql1);

$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);

?>
<section class="user_profile inner_pages">
			
	<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Pengembalian Skuter</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Info Sewa</div>
									<div class="panel-body">
        								<form method="post" action="skuter.php" class="form-horizontal" name="theform" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-2 control-label">ID Transaksi</label>
											<div class="col-sm-4">
												<input type="text" name="id" class="form-control" value="<?php echo $id;?>" required readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Nama Skuter</label>
											<div class="col-sm-4">
												<input type="text" name="nama" class="form-control" value="<?php echo $result['nama'];?>" required readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Denda</label>
											<div class="col-sm-4">
												<input type="text" name="denda" class="form-control" value="<?php echo $result['denda'];?>" required readonly>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-3">
												<center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="checkbox checkbox-inline">
													<button class="btn btn-primary" type="submit" name="submit" style="margin-top:4%">Cek Data Skuter</button>
												</div></center>
											</div>
										</div>
        </form>
		</div>
		</div>
      </div>
</section>
<!--/my-vehicles--> 
<?php include('includes/footer.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php } ?>