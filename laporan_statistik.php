<?php
require 'sambung.php';
require 'keselamatan.php';
?>
<html>
<title><?php echo $nama_sistem;?></title>
<body>
<table width="800" border="0">
	<tr><td width="800">
		<table width="800" border="0">
		<tr>
			<td width="80" valign="top">
<img src="<?php echo $lencana;?>" width="85" height="102"
hspace="7" align="left" /></td>
	<td><h5><?php echo $nama_sekolah;?></h5>
	</tr>
	<tr>
	<td colspan="3" valign="top"></hr></td>
	</tr>
	</table></td>
	</tr>
	<tr>
<td><p><strong>REPORT: QUESTION NUMBER ACCORDING TO TOPICS FOR EACH SUBJECT</strong></p> <table width="800"
border="0" align="center"></td>
	</tr>
	<tr>
	<td width="50"><b>No.</b></td>
	<td width="200"><b>Subject</b></td>
	<td width="400"><b>Topic</b></td>
	<td width="150"><b>Question No.</b></td>
	</tr>
	<?php
	$no=1;
$rekod=mysqli_query($hubung,"SELECT* FROM topik");
while ($infoRekod=mysqli_fetch_array($rekod))
{
	//Sambung ke table soalan
	$soalan=mysqli_query($hubung,"SELECT idtopik,COUNT(idtopik) as 'bil' FROM soalan GROUP BY idtopik");
	$infoSoalan=mysqli_fetch_array($soalan);
	//Sambung ke table subjek 
	$subjek=mysqli_query($hubung,"select * from subjek 	where
	idsubjek='$infoRekod[idsubjek]'");
	$infoSubjek=mysqli_fetch_array($subjek);
?>
<!-- Masukkan nilai kedalam lajur yang di tetapkan-->
		<tr style='font-size:16px'>
		<td><?php echo $no; ?></td>
		<td><?php echo $infoSubjek['subjek']; ?></td>
		<td><?php echo $infoRekod['topik']; ?></td>
		<td><?php echo $infoSoalan['bil']; ?></td>
		</tr>
		<?php $no++;
} ?>
</table>
<center><h5>* END *<br/>
Total Record:<?php echo $no-1; ?></h5><br>
<a href="index2.php">Home</a>
<a href="javascript:window.print()">Print Report</a>
<a href="logout.php">Logout</a></center>
</body>
</html>