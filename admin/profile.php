<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['username'])==1)
	{	
header('location:../index.php');
}
else{

// Code for change password	
if(isset($_POST['submit'])){
$username=$_SESSION['username'];
	if($file==""){
		$con="UPDATE admin set username='$username' where username='$username'";
		$done = mysqli_query($koneksidb,$con);
		if($done){
			$msg="Your Profile succesfully changed";
		}else{
			$error="Your Profile unsuccesfully changed";		
		}
	}else{
		$con="update admin set username='$username' where username='$username'";
		$done = mysqli_query($koneksidb,$con);
		if($done){
			$msg="Your Profile succesfully changed";
		}else{
			$error="Your Profile unsuccesfully changed";		
		}
	}
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
<script type="text/javascript">
function valid()
{
	if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
	{
		alert("New Password and Confirm Password Field do not match!");
		document.chngpwd.confirmpassword.focus();
		return false;
	}
	return true;
}
</script>
<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>


</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
	<?php
	$user=$_SESSION['username'];
	$sql ="SELECT * FROM admin WHERE username='$user'";
	$query= mysqli_query($koneksidb,$sql);
	$data=mysqli_fetch_array($query);

	?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Profile</h2>
						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Update Profile</div>
									<div class="panel-body">
										<form method="post" name="chngprfl" class="form-horizontal" onSubmit="return valid();" enctype="multipart/form-data">
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
											<div class="form-group">
												<label class="col-sm-4 control-label">Nama</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="username" id="username" value=<?php echo $data['username'];?> required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
											<div class="form-group">
												<label class="col-sm-4 control-label">Email</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="email" id="email" value=<?php echo $data['email'];?> required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Telepon</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="telp" id="telp" value=<?php echo $data['telp'];?> required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Alamat</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="alamat" id="alamat" value=<?php echo $data['alamat'];?> required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">								
													<button class="btn btn-primary" name="submit" type="submit">Simpan Perubahan</button>
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