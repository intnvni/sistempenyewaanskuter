<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data user dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
$hasil= mysqli_fetch_array($data);

// menyeleksi data admin dengan username dan password yang sesuai
$data2 = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");
$hasil2= mysqli_fetch_array($data2);

// menghitung jumlah data yang ditemukan
//$cek = mysqli_num_rows($data,$data2);
 
if(mysqli_num_rows($data)==1){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	echo "<script>location='halaman.php';</script>";
}elseif(mysqli_num_rows($data2)==1){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	echo "<script>location='admin/dashboard.php';</script>";
}else{
	echo "<script>alert('Email atau Password Salah!');</script>";
	echo "<script>location='index.php';</script>";
}
?>