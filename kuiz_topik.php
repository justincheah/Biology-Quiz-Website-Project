<?php 
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
//DAPATKAN ID SUBJEK
$subjek_pilihan = $_GET['idsubjek'];
//SAMBUNG KE TABLE
$result = mysqli_query($hubung, "SELECT * FROM subjek
WHERE idsubjek='$subjek_pilihan'");
while($res = mysqli_fetch_array($result))
{
	//Paparkan nilai asal
$paparsubjek = $res['subjek'];
}
?>

<html>
	<head><?php include 'menu.php'; ?></head>
	<body>
	<center><h2>LIST OF TOPIC FOR SUBJECT: <?php echo 
	$paparsubjek; ?><h2></center>
<main>
	<table width="70%" border="0" align="center"
	style='font-size:16px'>
<tr>
	<td width="2%"><b>No.</b></td>
	<td width="50%"><b>Topic</b></td>
	<td width="10%"><b>Question No.</b></td>
	<td width="10%"><b>Question</b></td>
	</tr>
<?php 
$no=1;
$data1=mysqli_query($hubung,"SELECT * FROM topik 
WHERE idsubjek='$subjek_pilihan'");
WHILE ($info1=mysqli_fetch_array($data1))
{
$dataBil=mysqli_query($hubung,"SELECT COUNT(idtopik)
AS 'bil' FROM soalan WHERE idtopik='$info1[idtopik]'");
$getBil=mysqli_fetch_array($dataBil);
?>
<tr>
	<td><?php echo $no; ?></td>
	<td><?php echo $info1['topik']; ?></td>
	<td><?php echo $getBil['bil']; ?></td>
	<td><a href="soalan_mula.php?idtopik=
<?php echo $info1['idtopik'];?>"><button>Open</button>
</a></td>
<?php $no++; } ?>
</table>
</main>
<center><font style='font-size:14px'>
* End of List *<br />Record Total:<?php echo $no-1; ?>
</font></center>
</body>
	</html>