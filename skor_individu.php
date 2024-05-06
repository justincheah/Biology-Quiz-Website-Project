<?php 
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
$idpengguna=$_SESSION['idpengguna'];
?>

<html>
<body>
<head><?php include 'menu.php'; ?></head>
<center><h2>ACHIEVED MARKS RECORD</h2></center>
<main>
<table width="70%" border="0" align="center"
style="font-size:16px">

<tr>
<td width="2%"><b>No.</b></td>
<td width="10%"><b>Subject</b></td>
<td width="38%"><b>Topic</b></td>
<td width="10%"><b>Date/Time</b></td>
<td width="5%"><b>Score</b></td>
<td width="5%" ><b>Marks</b></td>
</tr>
<?php

$no=1;
$data1=mysqli_query($hubung, "SELECT * FROM perekodan
WHERE idpengguna='$idpengguna' ORDER BY catatan_masa Desc
limit 0,10");
while ($infol=mysqli_fetch_array($data1))
{
	
//TABLE TOPIK
$dataTopik=mysqli_query($hubung,"SELECT * FROM topik WHERE
idtopik='$infol[idtopik]'");
$getTopik=mysqli_fetch_array($dataTopik);

//TABLE SOALAN
$dataSoalan=mysqli_query($hubung, "SELECT COUNT(idtopik) As
'bil' FROM soalan WHERE idtopik='$infol[idtopik]'");
$getBilSoalan=mysqli_fetch_array($dataSoalan);

//TABLE SUBJEK
$dataSubjek=mysqli_query($hubung, "SELECT * FROM subjek
WHERE idsubjek='$getTopik[idsubjek]'");
$getSubjek=mysqli_fetch_array($dataSubjek);

//PENGIRAAN
$bilSoalan=$getBilSoalan['bil'];
$markah_Topik=$getTopik['markah'];
?>



<tr style='font-size:14px'>
<td ><?php echo $no; ?></td>
	<td><?php echo $getSubjek['subjek']; ?></td> 
	<td><?php echo $getTopik['topik']; ?></td> 
	<td><?php echo date('d-mY g:i A',
strtotime($info1['catatan_masa'])); ?></td> 
	<td><?php echo $info1['skor']; ?></td> 
	<td>
<?php echo number_format(($info1['skor']/$bilSoalan)
*$markah_Topik); ?>%</td>
</tr>

<?php $no++; } ?>
</table>
</main>
<center>

<font style='font-size:14px'>
*End of List *<br />Record Total:<?php echo $no-1; ?>

</font>
</center>
</body>
</html>
