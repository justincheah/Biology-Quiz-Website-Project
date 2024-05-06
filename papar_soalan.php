<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
//DAPATKAN ID TOPIK
$topik_pilihan = $_GET['idtopik'];
$_SESSION['pilihan'] = $topik_pilihan;

//SAMBUNG KE TABLE TOPIK
$result = mysqli_query($hubung, "SELECT * FROM topik WHERE
idtopik='topik_pilihan'");
while ($res = mysqli_fetch_array($result))
{
//Paparkan nilai asal
$papartopik = $res['topik'];
$paparmarkah = $res['markah'];
}

?>

<html>
<head><?php include 'menu.php'; ?></head>
<body>
<center>
<h2>SENARAI SOALAN BAGI TOPIK <?php echo $papartopik;?>
</h2>
<h3>MARKAH: <?php echo $paparmarkah; ?></h3>
</center>
<main>

<table width="70%" border="0" align="center" style='font-
size:16px'>
<tr>
	<td width="2%"><b>Bil.</b></td>
	<td width="40%"><b>Soalan</b></td>
	<td width="10%"><b>jawapan</b></td>
	<td width="18%"><b>Tindakan</b></td>
</tr>
	<?php
$no=1;
$data1=mysqli_query($hubung,"SELECT * FROM soalan AS q
	INNER JOIN pilihan AS a ON q.idsoalan = a.idsoalan
	WHERE q.idtopik=$topik_pilihan AND a.jawapan=1
	GROUP BY a.idsoalan ORDER BY q.idsoalan ASC");
	while ($info1=mysqli_fetch_array($data1))
	{
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $info1['soalan']; ?></td>
			<td><?php echo $info1['pilihan_jawapan'];?></td>
			<td><a href="edit_soalan.php?idsoalan=
			<?php echo $info1['idsoalan'];?>"><button>EDIT
</button></a>
			<a href="hapus_soalan.php?idsoalan=<?php echo $info1
['idsoalan'];?>" onclick="return confirm('AWAS!, Semua 
rekod yang berkaitan akan dihapuskan, Anda Pasti?')">
<button>HAPUS</button></a>
</td>
</tr>
	<?php $no++; } ?>
	</table>
		</main>
	<center><font style='font-size:14px'>
	* Senarai Tamat *<br />Jumlah Rekod:<?php echo $no-1; ?>
</font></center>
</body>
</html>
