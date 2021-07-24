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
<script type="text/javascript">
function valid()
{
	if(document.laporan.akhir.value < document.laporan.awal.value)
	{
		alert("Tanggal akhir harus lebih besar dari tanggal awal!");
		return false;
	}
	return true;
}
</script>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
						<h2 class="page-title">Laporan</h2>
						<div class="panel panel-default">
							<div class="panel-body">
					        <form method="get" name="laporan" onSubmit="return valid();"> 
								<div class="form-group">
									<div class="col-sm-4">
										<label>Pilih Tanggal</label>
										<input type="date" class="form-control" name="tgl_pesan" placeholder="From Date(dd/mm/yyyy)time" required>
									</div>
									<div class="col-sm-4">
										<label>&nbsp;</label><br/>
										<input type="submit" name="submit" value="Lihat Laporan" class="btn btn-primary">
									</div>
								</div>
							</form>
							</div>
						</div>
						<?php
							if(isset($_GET['submit'])){
								$no=1;
								$tglpesan = $_GET['tgl_pesan'];
								$sql = "SELECT * FROM transaksi WHERE tgl_pesan='$tglpesan'";
								/*$sqlsewa = "SELECT booking.*,mobil.*,merek.*,users.* FROM booking,mobil,merek,users WHERE booking.id_mobil=mobil.id_mobil
											AND merek.id_merek=mobil.id_merek AND users.email=booking.email AND booking.status='$stt' OR booking.status='$stt1'
											AND booking.tgl_booking BETWEEN '$mulai' AND '$selesai'";*/
								$query = mysqli_query($koneksidb, $sql);
							?>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Laporan Sewa Tanggal <?php echo IndonesiaTgl($tglpesan);?></div>
							<div class="panel-body">
							<div class = "table-responsive">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode Sewa</th>
											<th>Tanggal Sewa</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
									<?php
										while ($result = mysqli_fetch_array($query)) {?>
										<tr>
											<td><?php echo $no;?></td>
											<td><?php echo  $result['id_transaksi'];?></td>
											<td><?php echo IndonesiaTgl($result['tgl_pesan']);?></td>
											<td><?php echo format_rupiah($result['total']);?></td>
										</tr>
												
										<?php $no++;
										 } ?>
										
									</tbody>
								</table>
							</div>	
							</div>
						</div>
							<div class="form-group">
									<a href="laporan_cetak.php?tgl_pesan=<?php echo $tglpesan;?>" target="_blank" class="btn btn-primary">Cetak</a>
							</div>
						<?php }?>
					

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
		var app = {
			code: '0'
		};
		$('[data-load-code]').on('click',function(e) {
					e.preventDefault();
					var $this = $(this);
					var code = $this.data('load-code');
					if(code) {
						$($this.data('remote-target')).load('userview.php?code='+code);
						app.code = code;
						
					}
		});
    </script>

</body>
</html>
<?php } ?>
