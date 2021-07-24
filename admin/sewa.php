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
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Kelola Sewa</h2>
						
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Daftar Sewa</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
							else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
							<div class = "table-responsive">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr align="center">
										<th>No</th>
										<th>Kode Sewa</th>
										<th>Nama Skuter</th>
										<th>Lama Sewa</th>
										<th>Total Sewa</th>
										<th>Penyewa</th>
										<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$i=0;
										$sqlsewa = "SELECT transaksi.*,skuter.*,user.* FROM transaksi, skuter, user WHERE transaksi.id_skuter=skuter.id_skuter AND transaksi.username=user.username ORDER BY transaksi.id_transaksi DESC";
										//die($sqlsewa);
										$querysewa = mysqli_query($koneksidb,$sqlsewa);
										while ($result = mysqli_fetch_array($querysewa)) {
											$total=$result['lama']*$result['harga'];
											$i++;
											?>
										<tr align="center">
											<td><?php echo $i;?></td>
											<td><?php echo htmlentities($result['id_transaksi']);?></td>
											<td><?php echo htmlentities($result['nama']);?></td>
											<td><?php echo htmlentities($result['lama']);?> hari</td>
											<td><?php echo format_rupiah(htmlentities($total));?></td>
											<td><?php echo $result['username']; ?></td>
											<td>
											<a href="#myModal<?=$result['id_transaksi']?>" data-toggle="modal" data-load-kode="<?php echo $result['id_transaksi']; ?>" data-remote-target="#myModal .modal-body"><span class="glyphicon glyphicon-eye-open"></span></a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								</div>
								<?php
								$sqlsewa = "SELECT transaksi.*,skuter.*,user.* FROM transaksi, skuter, user WHERE transaksi.id_skuter=skuter.id_skuter AND transaksi.username=user.username ORDER BY transaksi.id_transaksi DESC";
								$querysewaa = mysqli_query($koneksidb,$sqlsewa);
								while ($resulta = mysqli_fetch_array($querysewaa)) {
									$total=$resulta['lama']*$resulta['harga']; ?>		
								<!-- Large modal -->
								<div class="modal fade bs-example-modal" id="myModal<?=$resulta['id_transaksi']?>" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">Detail Sewa</div>
											<div class="modal-body">
												<table width="100%">
													<tr>
														<td width="20%"><b>Kode Sewa</b></td>
														<td width="2%"><b>:</b></td>
														<td width="78%"><?php echo $resulta['id_transaksi'];?></td>
													</tr>
													<tr>
														<td colspan="3">&nbsp;</td>
													</tr>
													<tr>
														<td width="20%"><b>Nama Skuter</b></td>
														<td width="2%"><b>:</b></td>
														<td width="78%"><?php echo $resulta['nama'];?></td>
													</tr>
													<tr>
														<td colspan="3">&nbsp;</td>
													</tr>
													<tr>
														<td width="20%"><b>Lama Sewa</b></td>
														<td width="2%"><b>:</b></td>
														<td width="78%"><?php echo $resulta['lama'];?>Hari</td>
													</tr>
													<tr>
														<td colspan="3">&nbsp;</td>
													</tr>
													<tr>
													<td width="20%"><b>Tanggal Pesan</b></td>
													<td width="2%"><b>:</b></td>
													<td width="78%"><?php echo IndonesiaTgl($resulta['tgl_pesan']);?></td>
													</tr>
													<tr>
														<td colspan="3">&nbsp;</td>
													</tr>
													<tr>
														<td width="20%"><b>Penyewa</b></td>
														<td width="2%"><b>:</b></td>
														<td width="78%"><?php echo $resulta['username'];?></td>
													</tr>
													<tr>
														<td colspan="3">&nbsp;</td>
													</tr>
													<tr>
														<td width="20%"><b>Total Biaya Sewa(<?php echo $lama['lama'];?> Hari)</b></td>
														<td width="2%"><b>:</b></td>
														<td width="78%"><?php echo format_rupiah($total);?></td>
													</tr>
													<tr>
														<td colspan="3">&nbsp;</td>
													</tr>
													<tr>
														<td width="20%"><b>Status</b></td>
														<td width="2%"><b>:</b></td>
														<td width="78%"><?php echo $resulta['status'];?></td>
													</tr>
												</table>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Large modal -->
								<?php } ?>
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