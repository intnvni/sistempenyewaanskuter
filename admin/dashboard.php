<?php
session_start();
error_reporting(0);
include('includes/config.php');
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
	
	<title>Sistem Informasi Penyewaan Skuter</title>
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

						<h2 class="page-title">Dashboard Master</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="row">

									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
												$sql1 = "SELECT id_skuter FROM skuter";
												$query1 = mysqli_query($koneksidb,$sql1);
												$jumlah=mysqli_num_rows($query1);
												?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($jumlah);?></div>
													<div class="stat-panel-title text-uppercase">Jumlah Skuter</div>
												</div>
											</div>
											<a href="skuter.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
												<?php
												$sql = "SELECT id FROM user";
												$query = mysqli_query($koneksidb,$sql);
												$regusers=mysqli_num_rows($query);
												?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regusers);?></div>
													<div class="stat-panel-title text-uppercase">Jumlah User</div>
												</div>
											</div>
											<a href="user.php" class="block-anchor panel-footer text-center">Rincian <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
												$sql5 = "SELECT id_cu FROM tanya";
												$query5 = mysqli_query($koneksidb,$sql5);
												$query=mysqli_num_rows($query5);
												?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Menghubungi</div>
												</div>
											</div>
											<a href="manage-tanya.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>


									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
												<?php 
												$sql2 = "SELECT id_transaksi FROM transaksi";
												$query2 = mysqli_query($koneksidb,$sql2);
												$bookings=mysqli_num_rows($query2);
												?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($bookings);?></div>
													<div class="stat-panel-title text-uppercase">Total Sewa</div>
												</div>
											</div>
											<a href="sewa.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
												$sql2 = "SELECT id_transaksi FROM transaksikembali";
												$query2 = mysqli_query($koneksidb,$sql2);
												$bookings=mysqli_num_rows($query2);
												?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($bookings);?></div>
													<div class="stat-panel-title text-uppercase">Sewa Kembali</div>
												</div>
											</div>
											<a href="sewakembali.php" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
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
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php }?>