<!-- Printing -->
	<link rel="stylesheet" href="css/printing.css">
		
<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if($_GET) {
	$kode = $_GET['kode'];
	$sqlsewa = "SELECT transaksi.*, skuter.*, user.* FROM transaksi JOIN skuter ON transaksi.id_skuter=skuter.id_skuter JOIN user ON transaksi.email=user.email WHERE transaksi.id_transaksi = '$kode'";
	$querysewa = mysqli_query($koneksidb,$sqlsewa);
	$result = mysqli_fetch_array($querysewa);
	print_r($result);
	$harga	= $result['harga'];
	$lama = $result['lama'];
	$totalsewa=$lama*$harga;
}
else {
	echo "Kode Transaksi Tidak Terbaca";
	exit;
}
?>
<div id="section-to-print">
<div id="only-on-print">
	<h2>Detail Sewa</h2>
</div>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
	<h4 class="modal-title" id="myModalLabel">Detail Sewa</h4>
</div>
<div class="modal-body">
<table width="100%">
	<tr>
		<td width="20%"><b>Kode Sewa</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['id_transaksi'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Nama skuter</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['nama'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Tanggal Pesan</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo IndonesiaTgl($result['tgl_pesan']);?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Lama Sewa</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['lama'];?> Hari</td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<!--<tr>
		<td width="20%"><b>Tanggal Selesai</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo IndonesiaTgl(date('Y-m-d', strtotime($result['tgl_pakai']. ' + '.$result['lama'].' days')));?></td>
	</tr>	
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>-->

	<tr>
		<td width="20%"><b>Penyewa</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['username'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Total Biaya (<?php echo $lama['lama'];?> Hari)</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo format_rupiah($total);?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Status</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['status'];?></td>
	</tr>
	</table>
	</div>
	<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>

</div>
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