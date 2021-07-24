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
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title><?php echo $pagedesc;?></title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="img/s.jpg">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body> 
        
<!--Header-->
<?php include('includes/header.php');?>

<?php
$email=$_SESSION['username'];  
$id=$_GET['id'];
$sql1 	= "SELECT transaksi.*, skuter.* FROM transaksi, skuter WHERE transaksi.id_skuter=skuter.id_skuter";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
$harga	= $result['harga'];
$lama = $result['lama'];
$totalsewa = $lama*$harga;
$tglpesan = strtotime($result['tgl_pesan']);
$tglbooking = date('Y-m-d');
?>
<section class="user_profile inner_pages">
<center><h3><u>Riwayat Sewa</u></h3></center>
	<div class="container">
	<div class = "table-responsive">
	<table class="table table-striped table-bordered">
	<thead>
		<tr>    
			<th width="23" align="center">No</th>
			<th width="100">Kode Sewa</th>
			<th width="120">Nama Skuter</th>
			<th width="80">Tgl. Pesan</th>
			<th width="50">Lama Sewa</th>
			<th width="100">Biaya Sewa</th>
			<th width="90">Opsi</th>
		</tr>
	</thead>
	<?php
	$username=$_SESSION['username'];
	$id_transaksi = $_GET['id'];  
	$sql1 	= "SELECT transaksi.*, skuter.*, user.* FROM transaksi, skuter, user WHERE transaksi.id_skuter=skuter.id_skuter AND transaksi.username=user.username and transaksi.username='$username'";
	//die($sql1);
	$query1 = mysqli_query($koneksidb,$sql1);
	if(mysqli_num_rows($query1)!=0){
		
		while($result = mysqli_fetch_array($query1)){
			
			$id_transaksi=$_GET['id_transaksi'];
			$harga	= $result['harga'];
			$lama = $result['lama'];
			$totalsewa = $lama*$harga;
			$tglpesan = strtotime($result['tgl_pesan']);
			$nomor++;
		?>
			<tr>
				<td align="center"><?php echo $nomor; ?></td>
				<td><?php echo $result['id_transaksi']; ?></td>
				<td><?php echo $result['nama']; ?></td>
				<td><?php echo IndonesiaTgl($result['tgl_pesan']); ?></td>
				<td><?php echo $result['lama']; ?> Hari</td>
				<td><?php echo format_rupiah($totalsewa); ?></td>
				<td align="center">
				<?php 
					if($result['status']=="Sudah Dibayar"||$result['status']=="Selesai"){
					?>
					<a href="sewa_details.php?id=<?php echo $result['id_transaksi'];?>" class="glyphicon glyphicon-eye-open"></a>
					<?php 
					}else{
					?>
					<a href="sewa_details.php?id=<?php echo $result['id_transaksi'];?>" class="glyphicon glyphicon-eye-open"></a><br><u>Lihat Detail<u/><br/>
					<?php }?>
				</td>
			</tr>
		<?php } ?>
		
	<?php
	}else{
	?>
		<tr>
			<td colspan="11" align="center"><b>Belum ada riwayat sewa</b></td>
		</tr>
<?php }?>
	</table>
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