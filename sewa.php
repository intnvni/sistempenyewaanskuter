<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');

if(!isset($_SESSION['status'])==1)
	{	
header('location:../index.php');
}
else{
	$today   = date('Y-m-d');
	$tglpesan = strtotime($today);
	$lama  = $_POST['lama'];
	
if(isset($_POST['submit'])){
	$tglpesan=$_POST['tgl_pesan'];
	$id=$_POST['id'];

	//die($tglpesan);

	if ($tglpesan > date('Y-m-d')) {
		//cek skuter	
		$sql 	= "SELECT * FROM skuter WHERE id_skuter='$id'";
		$query 	= mysqli_query($koneksidb,$sql);
		$result = mysqli_fetch_array($query);

		$sqla = "SELECT `id_transaksi`,`id_skuter`,`lama`,`total`,`email`,`tgl_pesan`,DATE_ADD(`tgl_pesan`, INTERVAL `lama` DAY) AS DateAdd FROM sewa WHERE id_skuter = '$id'";
		$querya= mysqli_query($koneksidb,$sqla);
		$resulta = mysqli_fetch_array($querya);
		$status = $result['status'];
		if($status=='disewa' AND $resulta['DateAdd'] == date('Y-m-d')){
			echo " <script> alert ('Skuter tidak tersedia di tanggal yang anda pilih, silahkan pilih tanggal atau kategori lain!'); </script> ";
		} else {
			echo "<script type='text/javascript'> document.location = 'sewa_ready.php?id=$id&tgl_pesan=$tglpesan'; </script>";
		}
	} else {
		die("Maaf tanggal pesan tidak bisa dipakai!");
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
<!--Page Header-->
<!-- /Header --> 

<?php 
$id=$_GET['id'];
$username=$_SESSION['username'];
$sql1 = "SELECT * FROM skuter WHERE id_skuter='$id'";
$query1 = mysqli_query($koneksidb,$sql1);
$result = mysqli_fetch_array($query1);
?>
<script type="text/javascript">
function valid()
{
	var sewa = document.getElementById("tglpesan").value;
	var nowADate = '<?=date('Y-m-d')?>';
	if(sewa < nowADate){
		alert("Tanggal selesai harus lebih besar dari tanggal mulai sewa!");
		return false;
	}

	if(sewa === nowADate){
		alert("Tanggal sewa minimal H-1!");
		return false;
	}

return true;
}
</script>

	<section class="user_profile inner_pages">
	<div class="container">
	<div class="col-md-5 col-sm-8">
	      <div class="product-listing-img"><img src="admin/img/<?php echo htmlentities($result['foto']);?>" class="img-responsive" alt="Image" /> </a> </div>
          <div class="product-listing-content">
            <h5><?php echo htmlentities($result['nama']);?></a></h5>
            <p class="list-price"><?php echo htmlentities(format_rupiah($result['harga']));?> / Hari</p>
          </div>	
	</div>
	
	<div class="user_profile_info">	
		<div class="col-md-7 col-sm-10">
        <form method="post" name="sewa" onSubmit="return valid();"> 
			<input type="hidden" class="form-control" name="id"  value="<?php echo $id;?>"required>
            <div class="form-group">
			<label>Pilih Tanggal</label>
				<input type="date" class="form-control" name="tgl_pesan" placeholder="(yyyy/mm/dd)" id="tglpesan" required>
				<input type="hidden" name="now" class="form-control" value="<?php echo $now;?>">
            </div>
			<br/>			
			<div class="form-group">
                <input type="submit" name="submit" value="Cek Ketersediaan" onclick="valid()" class="btn btn-block">
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
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php }?>