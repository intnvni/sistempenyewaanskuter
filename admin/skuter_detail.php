<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
if(!isset($_SESSION['username'])==1)
	{	
header('location:../index.php');
}
else{
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
	<link rel="shortcut icon" href="img/wb.jpg">

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
<script type="text/javascript">
function valid(theform){
		pola_nama=/^[a-zA-Z]*$/;
		if (!pola_nama.test(theform.vehicletitle.value)){
		alert ('Hanya huruf yang diperbolehkan untuk Nama Skuter!');
		theform.vehicletitle.focus();
		return false;
		}
		return (true);
}
</script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Detail Data Skuter</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Form Detail Data Skuter</div>
									<div class="panel-body">
										<?php 
										$id=intval($_GET['id']);
										$sql ="SELECT * FROM skuter WHERE id_skuter='$id'";
										$query = mysqli_query($koneksidb,$sql);
										$result = mysqli_fetch_array($query);
										?>

										<form method="post" class="form-horizontal" name="theform" action ="skuter_upd.php" onsubmit="return valid(this);" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-2 control-label">Nama Skuter<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" required>
												<input type="text" name="nama" class="form-control" value="<?php echo htmlentities($result['nama']);?>" readonly>
											</div>
											<label class="col-sm-2 control-label">Harga / 2 jam<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="text" name="harga" class="form-control" value="<?php echo format_rupiah($result['harga']);?>" readonly>
											</div>
											<label class="col-sm-2 control-label">Status<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="text" name="status" class="form-control" value="<?php echo htmlentities($result['status']);?>" readonly>
											</div>
										</div>
								
										<div class="col-sm-12">
											<h4 align="Left"><b>Foto Skuter</b></h4>
										</div>									
										<div class="col-sm-4">
											<center>Foto<img src="img/<?php echo htmlentities($result['foto']);?>" width="300" height="200" style="border:solid 1px #000"></center>
										</div>
									</div>
									<div class="hr-dashed"></div>									
										
									</div>
								</div>
							</div>
						</div>
						
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<a href="skuter.php" class="btn btn-default">Kembali</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					</div>
				</div>
				</form>

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