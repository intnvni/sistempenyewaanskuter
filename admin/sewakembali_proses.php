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
		$status = $_POST['status'];
		$id = $_POST['id'];
		$mySql	= "UPDATE skuter SET status = '$status' WHERE id_skuter='$id'";
		$myQry	= mysqli_query($koneksidb, $mySql);
		echo "<script type='text/javascript'>
				alert('Transaksi Pengembalian Sukses!'); 
				document.location = 'sewa.php'; 
			</script>";
	}else {
	}
	

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title><?php echo $pagedesc;?></title>
	<link rel="shortcut icon" href="../img/s.jpg">

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
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
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
										<?php 
										$id=$_GET['id'];
										$sqlsewa = "SELECT transaksi.*,skuter.*,user.* FROM transaksi,skuter,user WHERE transaksi.id_skuter=skuter.id_skuter AND transaksi.id_transaksi ='$id'";
										$querysewa = mysqli_query($koneksidb,$sqlsewa);
										$result = mysqli_fetch_array($querysewa);
										$total=$result['lama']*$result['harga'];
										?>

										<form method="post" action="sewakembali_proses2.php" class="form-horizontal" name="theform" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-2 control-label">ID Transaksi</label>
											<div class="col-sm-4">
												<input type="text" name="id" class="form-control" value="<?php echo $id;?>" required readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">ID Skuter</label>
											<div class="col-sm-4">
												<input type="text" name="id_skuter" class="form-control" value="<?php echo $result['id_skuter'];?>" required readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Denda</label>
											<div class="col-sm-4">
												<input type="text" name="denda" class="form-control" value="<?php echo $result['denda'];?>">
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-3">
												<center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="checkbox checkbox-inline">
													<button class="btn btn-primary" type="submit" name="submit" style="margin-top:4%">Submit</button>
												</div></center>
											</div>
										</div>
										</form>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>
			<!-- COntainer Fluid-->			
			</div>
		</div>
	</div>
</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>