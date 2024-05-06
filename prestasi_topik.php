<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
//DAPATKAN ID GURU
$guru = $_SESSION['idpengguna'];
?>

<html>
<head><?php include 'menu.php'; ?></head>
<body>
<center>
<h2>STUDENTS' PERFORMANCE BASED ON SUBJECT-TOPIC</h2>
</center>
<main>
<table width="70%" border="0" align="center" style'font-size:16px'>
<tr>
	<td width="2%"><b>No.</b></td>
	<td width="15%"><b>Subject</b></td>
	<td width="35%"><b>Topic</b></td>
	<td width="8%"><b>No. answer</b></td>
	<td width="10%"><b>Complete Report</b></td>
	</tr>
	<?php
	$no=1;
$topik=mysqli_query($hubung,"SELECT * FROM topik
WHERE idpengguna='$guru'");
while ($infoTopik=mysqli_fetch_array($topik))
{
$subjek=mysqli_query($hubung,"SELECT * FROM subjek
WHERE idsubjek='$infoTopik[idsubjek]'");
$infoSubjek=mysqli_fetch_array($subjek);
$rekod=mysqli_query($hubung,"SELECT idtopik,COUNT(idtopik)
as 'bil' FROM perekodan
WHERE idtopik='$infoTopik[idtopik]'");
$infoJawab=mysqli_fetch_array($rekod);
?>
<tr>
	<td><?php echo $no; ?></td>
	<td><?php echo $infoSubjek['subjek']; ?></td>
	<td><?php echo $infoTopik['topik']; ?></td>
	<td><?php echo $infoJawab['bil']; ?></td>
	<td><a href="laporan_guru.php?idtopik=
	<?php echo $infoTopik['idtopik'];?>"><button>Open
</button></a></td>
</tr>
<?php $no++; } ?>
</table>
</main>
<center><font style='font-size:14px'>
*End of List*<br />Total Record:<?php echo $no-1; ?>
</font></center>
</body> 
</html>