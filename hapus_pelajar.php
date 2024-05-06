<?php
require 'sambung.php';
require 'keselamatan.php';
//DAPATKAN ID dari URL
$Delpelajar = $_GET['idpengguna'];
//Hapus rekod pengguna semasa
$hapuskan1 = mysqli_query($hubung,"DELETE FROM pengguna
WHERE idpengguna='$Delpelajar'");
//Hapus rekod perekodan semasa
$hapuskan2 = mysqli_query($hubung,"DELETE FROM perekodan
WHERE idpengguna='$Delpelajar'");
//Papar mesej jika berjaya hapuskan
echo "<script>alert('Student deleted');
window.location='pelajar_senarai.php'</script>";
?>