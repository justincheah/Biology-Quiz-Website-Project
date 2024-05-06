<?php 
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
//PERLUKAN FAIL INI
include 'header.php';
?>
<html>
<head><?php include 'menu.php'; ?></head>
	<body>
<center><h2> REGISTERED TEACHERS LIST	</h2></center>
<main>
<table width ="70%" border "0" align = "center" style ='font-
size:16px'>
	<tr>
		<td width = "2%"><b> No.</b></td> 
		<td width = "44%" ><b>Name of teacher</b></td>
		<td width = "7%"><b> Topic No.</b></td> 
		<td width = "7%" ><b>Question No.</b></td>
		<td width = "5%"><b> Actions</b></td>	
	</tr>
<?php
$no=1;
$data1=mysqli_query($hubung, "SELECT * FROM pengguna WHERE
aras = 'GURU' ORDER BY nama ASC");
while ($info1 = mysqli_fetch_array($data1))
{
//Sambung ke table topik
$topik = mysqli_query($hubung, "SELECT idtopik, COUNT(idtopik)
as 'biltopik' FROM topik WHERE idpengguna ='$info1[idpengguna]' GROUP by idpengguna");
$infoTopik = mysqli_fetch_array($topik);
//Sambung ke soalan soalan
$soalan=mysqli_query($hubung, "SELECT idsoalan, COUNT(idsoalan)
AS 'bilsoalan' FROM soalan WHERE
idtopik ='$infoTopik[idtopik]' GROUP BY idsoalan");
$infoSoalan = mysqli_fetch_array($soalan);
		?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $info1['nama']; ?></td>
		<td><?php echo $infoTopik['biltopik']; ?></td>
		<td><?php echo $infoSoalan['bilsoalan']; ?></td>
		<td><a href ="hapus_guru.php?idpengguna=
		<?php echo $info1['idpengguna']; ?>"
	onclick = "return confirm('WARNING!!!, All the records will be deleted.
Confirm?')"><button>DELETE</button></a>
	</td>
		</tr>
<?php $no++; }?>
</table>
	</main>
<center><font style = 'font-size:14px'>
*End of list * <br/>Total Record: <?php echo $no-1;?>
</font></center>
</body>
</html>
