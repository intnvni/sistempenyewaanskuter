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
$id=$_GET['id'];
$tglpesan=$_POST['tgl_pesan'];
$username=$_POST['username'];
$tglbooking=date('Y-m-d');
$today=date('Ymd');
$harga = intval($_POST['harga']);
$lama = intval($_POST['txtjumlah']);
$total = intval($_POST['total']);
//die($total);

$sql = "SELECT max(id_transaksi) AS last FROM transaksi WHERE id_transaksi LIKE '$today%'";
$query = mysqli_query ($koneksidb,$sql);
$result = mysqli_fetch_array($query);
$lastnobooking = $result['last'];
$lastnourut = substr($lastnobooking, 8, 4);
$nextnourut = $lastnourut + 1;
$nextnobooking = $today.sprintf('%04s', $nextnourut);

//insert
$sql 	= "INSERT INTO transaksi (id_transaksi,id_skuter,lama,total,username,tgl_pesan) VALUES('$nextnobooking','$id','$lama','$total','$username','$tglpesan')";
//die($sql);
$query 	= mysqli_query($koneksidb,$sql);
if($query){

	$sql1 = "SELECT * FROM skuter WHERE id_skuter='$id'";
	$query1 = mysqli_query($koneksidb,$sql1);
	$result = mysqli_fetch_array($query1);
	$status = 'disewa';

	$sql2 = "UPDATE skuter SET status='$status' WHERE id_skuter = '$id'";
	$query2 = mysqli_query($koneksidb,$sql2);

	echo " <script> alert ('Skuter berhasil disewa!'); </script> ";
	echo "<script type='text/javascript'> document.location = 'sewa_details.php?id=".$nextnobooking."&tgl=".$tglpesan."'; </script>";
	} else {
		echo " <script> alert ('Ooops, terjadi kesalahan. Silahkan coba lagi!'); </script> ";
	}
}
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
<link rel="shortcut icon" href="admin/img/wb.jpg">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!--Page Header-->
<!-- /Header --> 

<div>
	<br/>
	<center><h5>Skuter Tersedia untuk disewa!</h5></center>
	<hr>
</div>
<?php
$username=$_SESSION['username']; 
$id=$_GET['id'];
$tglpesan=$_GET['tgl_pesan'];
$lama=$_GET['lama'];
$status=$_GET['status'];
$foto=$_GET['foto'];

$sql1 	= "SELECT * FROM skuter WHERE id_skuter='$id' ";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
$harga	= $result['harga'];

?>
	<section class="user_profile inner_pages">
	<div class="container">
	<div class="col-md-6 col-sm-8">
	      <div class="product-listing-img"><img src="admin/img/<?php echo htmlentities($result['foto']);?>" class="img-responsive" alt="Image" /> </a> </div>
          <div class="product-listing-content">
            <h5><?php echo htmlentities($result['nama']);?></a></h5>
            <p class="list-price"><?php echo htmlentities(format_rupiah($result['harga']));?> / Hari</p>
          </div>	
	</div>

	<div class="user_profile_info">	
		<div class="col-md-12 col-sm-10">
        <form method="post" name="sewa" onSubmit="return valid();"> 
			<input type="hidden" class="form-control" name="id"  value="<?php echo $id;?>"required>
 			<input type="hidden" class="form-control" name="username"  value="<?php echo $username;?>"required>
            <div class="form-group">
				<div class="col-sm-6">										
				<label>Tanggal Pesan</label>
					<input type="date" class="form-control" name="tgl_pesan" placeholder="From Date(dd/mm/yyyy)" value="<?php echo $tglpesan;?>"readonly>
				</div>
				<div class="form-group">
				<div class="col-sm-6">										
				<label>Biaya Sewa per Hari</label>
					<input type="text" class="form-control" name="harga" value="<?php echo $result['harga'];?>" id="hargasewa" readonly>
				</div>
				<div class="col-sm-6">										
				<label>Status</label>
					<input type="text" class="form-control" name="status" value="<?php echo htmlentities($result['status']);?>"readonly>
				</div>				
				<div class="col-sm-6">										
				<label>Lama Sewa (Hari)</label>
					<input type="number" class="form-control" name="txtjumlah" id="lamasewa">
				</div>
				<div class="col-sm-6">										
				<label>Total</label>
					<input type="number" class="form-control" name="total" id="totala" readonly>
				</div>
            <div class="form-group">
				<div class="col-sm-6">		
					&nbsp;
				</div>
				<div class="col-sm-6">										
					&nbsp;
				</div>
			</div>            
            <div class="form-group">
				<div class="col-sm-6">										
					<input type="submit" name="submit" value="Sewa" class="btn btn-block">
				</div>
				<div class="col-sm-6">										
				</div>
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
<script type="text/javascript">
	$('#lamasewa').change(function(){
		var harga = document.getElementById("hargasewa").value;
		var lama = document.getElementById("lamasewa").value;
		var total = harga * lama;

        document.getElementById("totala").value = total;
    });
</script>
</body>
</html>
<?php } ?>