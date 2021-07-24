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
if (isset($_GET['id'])) {
	$id_skuter = "";
	$username = "";
	$tgl = "";
	$id = $_GET['id'];
} elseif (isset($_GET['id_skuter']) AND isset($_GET['username']) AND isset($_GET['tgl_pesan'])) {
	$id_skuter = $_GET['id_skuter'];
	$username = $_GET['username'];
	$tgl = $_GET['tgl_pesan'];
	$id = "";
}

$sql = "SELECT max(id_transaksi) AS last FROM transaksi WHERE id_transaksi LIKE '$today%'";
$query = mysqli_query ($koneksidb,$sql);
$result = mysqli_fetch_array($query);
$lastnobooking = $result['last'];
$lastnourut = substr($lastnobooking, 8, 4);
$nextnourut = $lastnourut + 1;
$nextnobooking = $today.sprintf('%04s', $nextnourut);

$sql1 	= "SELECT transaksi.id_transaksi,skuter.id_skuter,skuter.nama,transaksi.lama,transaksi.total,transaksi.username,transaksi.tgl_pesan FROM transaksi JOIN skuter ON skuter.id_skuter=transaksi.id_skuter WHERE transaksi.id_skuter = '".$id_skuter."' AND transaksi.tgl_pesan = '".$tgl."' AND transaksi.username = '".$username."' OR transaksi.id_transaksi = '".$id."'";
//die($sql1);

$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);

?>
<section class="user_profile inner_pages">
			
	<div class="container">
	<div class="user_profile_info">	
		<div class="col-md-9 col-sm-10">
			<center><h3>Detail Sewa</h3></center>
        <form method="post" name="sewa" onSubmit="return valid();">
            <div class="form-group">
			<label>ID Transaksi</label>
				<input type="text" class="form-control" name="id" value="<?php echo htmlentities($result['id_transaksi']);?>"readonly>
            </div>
            <div class="form-group">
			<label>Nama Skuter</label>
				<input type="text" class="form-control" name="nama" value="<?php echo htmlentities($result['nama']);?>"readonly>
            </div>
            <div class="form-group">
			<label>Tanggal Pesan</label>
				<input type="date" class="form-control" name="tgl_pesan" placeholder="From Date(dd/mm/yyyy)" value="<?php echo htmlentities($result['tgl_pesan']);?>"readonly>
            </div>
            <div class="form-group">
			<label>Lama Sewa (Hari)</label>
				<input type="text" class="form-control" name="txtjumlah" placeholder="Lama"  value="<?php echo htmlentities($result['lama']);?> Hari"readonly>
            </div>
            <div class="form-group">
			<label>Biaya Sewa (<?php echo $result['lama'];?> Hari)</label><br/>
				<input type="text" class="form-control" name="total" value="<?php echo format_rupiah($result['total']);?>" readonly>
            </div>			
			<div class="form-group">
				<a href="sewadetail_cetak.php?id=<?php echo $result['id_transaksi'];?>" target="_blank" class="btn btn-primary btn-xs">Cetak</a>
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