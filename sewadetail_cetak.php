<?php
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
$id=$_GET['id'];
$sql1 	= "SELECT transaksi.*, skuter.*, user.* FROM transaksi JOIN skuter ON transaksi.id_skuter=skuter.id_skuter JOIN user ON transaksi.username=user.username WHERE transaksi.id_transaksi = '$id'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
$harga	= $result['harga'];
$lama = $result['lama'];
$total = $lama*$harga;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="rental mobil">
	<meta name="author" content="">

	<title>Cetak Detail Sewa</title>

	<link href="img/s.jpg" rel="icon" type="images/x-icon">

	<!-- Bootstrap Core CSS -->
	<link href="assets/new/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="assets/new/offline-font.css" rel="stylesheet">
	<link href="assets/new/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="assets/new/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="assets/new/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td rowspan="3" width="16%" class="text-center">
							<img src="img/s.jpg" alt="logo-dkm" width="80" />
						</td>
						<td class="text-center"><h3>Skuterable</h3></td>
						<td rowspan="3" width="16%">&nbsp;</td>
					</tr>
					<tr>
						<td class="text-center">Phone : +62 857-8966-7838 | E-mail : skuterable@gmail.com</td>
					</tr>
					<tr>
						<td class="text-center">Tangerang</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center"><u>Detail Sewa</u></h4>
			<br />
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td width="23%">ID Transaksi</td>
						<td width="2%">:</td>
						<td><?php echo $result['id_transaksi'];?></td>
					</tr>
					<tr>
						<td>Penyewa</td>
						<td>:</td>
						<td><?php echo $result['username'] ?></td>
					</tr>
					<tr>
						<td>Nama Skuter</td>
						<td>:</td>
						<td><?php echo $result['nama'];?></td>
					</tr>
					<tr>
						<td>Tanggal Pesan</td>
						<td>:</td>
						<td><?php echo IndonesiaTgl($result['tgl_pesan']);?></td>
					</tr>
					<tr>
						<td>Lama Sewa</td>
						<td>:</td>
						<td><?php echo $result['lama'];?> Hari</td>
					</tr>
					<tr>
						<td>Tanggal Selesai</td>
						<td>:</td>
						<td><?php echo IndonesiaTgl(date('Y-m-d', strtotime($result['tgl_pesan']. ' + '.$result['lama'].' days')));?></td>
					</tr>					
					<tr>
						<td>Biaya Sewa (<?php echo $result['lama'];?>) Hari</td>
						<td>:</td>
						<td><?php echo format_rupiah($result['total']);?></td>
					</tr>

					<!--<?php
						if($result['status']=="Menunggu Pembayaran"){
							$sqlrek 	= "SELECT * FROM tblpages WHERE id='5'";
							$queryrek = mysqli_query($koneksidb,$sqlrek);
							$resultrek = mysqli_fetch_array($queryrek);

							echo "
						<tr>
							<td colspan='3'>
								<b>*Silahkan transfer total biaya sewa ke ".$resultrek['detail']." maksimal tanggal "?> <?php echo IndonesiaTgl($tglhasil);?> <?php echo ".
							</td>
						</tr>
							";
						}else{
							
						}?>-->
				</tbody>
			</table>
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#jumlah').terbilang({
				'style'			: 3, 
				'output_div' 	: "jumlah2",
				'akhiran'		: "Rupiah",
			});

			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="assets/new/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="assets/new/jTerbilang.js"></script>

</body>
</html>