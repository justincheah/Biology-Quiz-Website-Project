<?php require 'sambung.php'; ?>
<hr>
<table width="100%" border="0" align="center">
	<tr style='font-size:14px'>
	<td width="3%"><b>No.</b></td>
	<td width="30%"><b>Subject</b></td>
	<td width="57%"><b>Topic</b></td>
	<td width="10%"><b>Question numbers</b></td>
	</tr>
<?php
$no=1;
$topik=mysqli_query($hubung, "SELECT * FROM topik ORDER BY idtopik desc limit 0,10");
while ($infoTopik=mysqli_fetch_array($topik)){
$soalan=mysqli_query($hubung, "SELECT COUNT(idtopik) AS 'bil' FROM soalan WHERE idtopik='$infoTopik[idtopik]'");
$infoSoalan=mysqli_fetch_array($soalan);
$subjek=mysqli_query($hubung, "SELECT * FROM subjek WHERE idsubjek='$infoTopik[idsubjek]'");
$infoSubjek=mysqli_fetch_array($subjek);
?>

	<tr style='font-size:14px'>
	<td><?php echo $no; ?></td>
	<td><?php echo $infoSubjek['subjek']; ?></td>
	<td><?php echo $infoTopik['topik']; ?></td>
	<td><?php echo $infoSoalan['bil']; ?></td>
</tr>
<?php $no++; } ?>
</table><center>
<font style='font-size:14px'>
* The Record displays 10 latest topics/questions only
*<br />Total Record:<?php echo $no-1; ?>
</font>
	</center>
	