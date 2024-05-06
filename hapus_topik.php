<?php
require 'sambung.php';
require 'keselamatan.php';

$topik = $_GET['idtopik'];
$del = mysqli_query($hubung,
"SELECT * FROM topik AS t INNER JOIN soalan AS q
ON q.idtopik = t.idtopik INNER JOIN pilihan AS c
ON q.idsoalan = c.idsoalan WHERE t.idtopik=$topik");
$dataDel = mysqli_fetch_array($del);

//LAKSANA DELETE
$result1 = mysqli_query($hubung,"DELETE FROM topik WHERE 
idtopik='$topik'");

$result2 = mysqli_query($hubung,"DELETE FROM soalan WHERE 
idtopik='$topik'");

$result3 = mysqli_query($hubung,"DELETE FROM pilihan WHERE 
idsoalan='$dataDel[idsoalan]'");

$result4 = mysqli_query($hubung,"DELETE FROM perekodan WHERE 
idtopik='$topik'");

//MESEJ POP UP
	echo "<script>alert('Hapus topik berjaya')
	window.location='papar_topik.php'</script>";
	?>