<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselmatan.php';
//DAPATKAN ID dari URL
$soalanDel = $_GET['idsoalan'];
//Hapus rekod soalan + pilihan
$hapuskan1 = mysqli_query($hubung,"DELETE FROM soalan
WHERE idsoalan='$soalanDel'");
$hapuskan2 = mysqli_query($hubung,"DELETE FROM pilihan 
WHERE idsoalan='$soalanDel'");
//Papar mesej jika berjaya hapus
	echo "<script>alert('Hapus soalan berjaya');
	window.location='pilih_subjek.php'</script>";
	?>