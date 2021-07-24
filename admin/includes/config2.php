<?php
# Konek ke Web Server Lokal
$myHost	= "localhost";
$myUser	= "root";
$myPass	= "";
$myDbs	= "db_sewaskuter";
$pagedesc = "Sistem Penyewaan Gedung Berbasis Web";
$mysqli = new mysqli_connect($myHost,$myUser,$myPass,$myDbs);
if (! $mysqli) {
  echo "Failed Connection !";
}

return $mysqli;
?>