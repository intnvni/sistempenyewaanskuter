<?php
# Konek ke Web Server Lokal
$myHost	= "localhost";
$myUser	= "root";
$myPass	= "";
$myDbs	= "db_sewaskuter";
$pagedesc = "Sistem Penyewaan Skuter Berbasis Web";
$koneksidb = mysqli_connect( $myHost, $myUser, $myPass, $myDbs);
if (! $koneksidb) {
  echo "Failed Connection !";
}

?>