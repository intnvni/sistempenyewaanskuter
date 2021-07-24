<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['username'])==1)
	{	
header('location:../index.php');
}
else{
if(isset($_POST['update'])){
	$img=$_FILES["img1"]["name"];
	$str = substr($img,-5);
	$image1 = date('dmYHis').$str;
	$id=$_POST['id'];
	move_uploaded_file($_FILES["img1"]["tmp_name"],"img/".$image1);
	$sql="update skuter set foto='$image1' where id_skuter='$id'";
	$query	= mysqli_query($koneksidb, $sql);
	echo "<script type='text/javascript'>
			alert('Berhasil ganti gambar.');
			document.location = 'skuter_edit.php?id=$id'; 
		</script>";
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
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Foto</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Foto Detail</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal" enctype="multipart/form-data">

											<div class="form-group">
											<label class="col-sm-4 control-label">Foto Skuter Sekarang</label>
												<?php 
												$id=intval($_GET['imgid']);
												$sql ="SELECT foto from skuter where id_skuter='$id'";
												$query	= mysqli_query($koneksidb, $sql);
												$cnt=1;
												while ($result = mysqli_fetch_array($query)){
												?>
												<div class="col-sm-8">
													<img src="img/<?php echo htmlentities($result['foto']);?>" width="300" height="200" style="border:solid 1px #000">
												</div>
											<?php }?>
											</div>

											<div class="form-group">
											<input type="hidden" name="id" value="<?php echo $id; ?>"required>
											<label class="col-sm-4 control-label">Upload Foto Baru<span style="color:red">*</span></label>
												<div class="col-sm-4">
													<input type="file" name="img1" class="form-control" accept="img/*" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
													<button class="btn btn-primary" name="update" type="submit">Update</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
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