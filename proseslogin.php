<?php
//WAJIB FAIL INI
require 'sambung.php';
//PERLUKAN FAIL INI
include 'header.php';
//MULA SESI
session_start();
if(isset($_POST['idpengguna'])) {
	$user = $_POST['idpengguna'];
	$pass = $_POST['password'];
	$query = mysqli_query($hubung,"SELECT * FROM pengguna WHERE idpengguna='$user' AND password='$pass'");
	$row = mysqli_fetch_assoc($query);
	
if(mysqli_num_rows($query) == 0|| $row['password'] != $pass)
{
echo "<script>alert('User ID or password is invalid');
window.location='login.php'</script>";
}
else
{
$_SESSION['idpengguna']=$row['idpengguna'];
$_SESSION['level'] = $row['aras'];
header("Location: index2.php");
}	
}
?>	
