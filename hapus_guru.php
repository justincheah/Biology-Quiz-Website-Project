<?php
require 'sambung.php';
require 'keselamatan.php';
//DAPATKAN ID dari URL
$delguru = $_GET['idpengguna'];

$delete1=mysqli_query($hubung,"SELECT * FROM pengguna AS u INNER JOIN topik AS t
ON u.idpengguna = t.idpengguna INNER JOIN soalan AS q
ON t.idtopik = q.idtopik INNER JOIN perekodan AS r
ON t.idtopik = r.idtopik INNER JOIN pilihan AS c
ON q.idsoalan = c.idsoalan WHERE u.idpengguna=$delguru");
$infoDel=mysqli_fetch_array($delete1);
$delete1=$delguru;
$delete2=$infoDel['idpengguna'];
//HAPUS TOPIK
$hapuskan1 = mysqli_query($hubung,"DELETE FROM topik WHERE 
idpengguna='$delete1'");
//HAPUS PENGGUNA
$hapuskan2 = mysqli_query($hubung,"DELETE FROM pengguna WHERE 
idpengguna='$delete1'");
//HAPUS SOALAN
$hapuskan3 = mysqli_query($hubung,"DELETE FROM soalan WHERE 
idtopik='$delete2'");
//HAPUS JAWAPAN
$hapuskan4 = mysqli_query($hubung,"DELETE FROM pilihan WHERE 
idtopik='$delete2'");
//HAPUS PEREKODAN
$hapuskan5 = mysqli_query($hubung,"DELETE FROM perekodan WHERE 
idtopik='$delete2'");
 //PAPAR mesej jika berjaya hapuskan
	echo "<script>alert('Teacher deleted');
	window.location='guru_senarai.php'</script>";
	?>