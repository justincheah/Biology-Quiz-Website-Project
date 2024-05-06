<?php 
//WAJIB DAN PERLUKAN FAIL INI
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

//DAPATKAN ID SUBJEK
$subjek_pilihan = $_GET['idsubjek'];
$guru = $_SESSION['idpengguna'];

//SAMBUNG KE TABLE

$result = mysqli_query($hubung,"SELECT * FROM subjek WHERE idsubjek='$subjek_pilihan'");

while($res = mysqli_fetch_array($result))
{
//Paparkan nilai asal
$subjek = $res['subjek'];
}
?>

<html>
<head><?php include 'menu.php'; ?></head>
<body>

<center>
<h2>SUBJECT TOPIC LIST: <?php echo $subjek; ?></h2>
	</center>

<main>
<table width="70%" border="0" align="center"
style='font-size:18px'>
	<tr>
	<td colspan="4" valign="middle" align="right"><b>
	<a href="tambah_topik.php?idsubjek=<?php echo
$subjek_pilihan;?>"><button>Create topic</button></a></b>
</td>

</tr>
<tr>
	<td width="2%"><b>No.</b></td>
	<td width="40%"><b>Topic</b></td>
	<td width="14%"><b>Question management</b></td>
	<td width="14%"><b>Topic management</b></td>
</tr>

<?php
	$no=1;
	$data1=mysqli_query($hubung,"SELECT * FROM topik WHERE
idsubjek='$subjek_pilihan' AND idpengguna='$guru'");
while ($info1=mysqli_fetch_array($data1))
{
	?>
<tr>
	<td><?php echo $no; ?></td>
	<td><?php echo $info1['idtopik'];?></td>
	<td><a href="tambah_soalan.php?idtopik=
	<?php echo $info1['idtopik'];?>"><button>Add
	</button></a>
	<a href="papar_soalan.php?idtopik=
	<?php echo $info1['idtopik'];?>"><button>Show Question
	</button></a>
		</td>
	<td>
	<a href="edit_topik.php?idtopik=
	<?php echo $info1['idtopik'];?>"><button>Edit
	</button></a>
	<a href="hapus_Topik.php?idtopik=
	<?php echo $info1['idtopik'];?>"><button>Delete
	</button></a>
	</td>
	</tr>
	<?php $no++; } ?>
</table>
	</main>
<br>
<center><font style='font-size:14px'>
* End *<br />Record Total:<?php echo $no-1; ?>
</font>
</center>
</body>
</html>