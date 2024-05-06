<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
$nokp=$_SESSION['idpengguna'];
?>

<html>
	<head>
<?php include 'menu.php';?>
	</head>
	<body>
		<center>
			<h2><?php echo $pengguna;?></h2>
			</center>
		<main>
		
	<table width="70%" border="0" align="center">
		<tr>
		<td>
	<center>
<h3><b>* WELCOME *</b></h3>
<p>
<?php
//Papar maklumat lengkap pengguna login
$dataA=mysqli_query($hubung, "SELECT * FROM pengguna WHERE
idpengguna='$nokp'");
$infoA=mysqli_fetch_array($dataA);
?>

	YOUR NAME :<?php echo $infoA['nama']; ?><br>
	IC NUMBER :<?php echo $infoA['idpengguna']; ?></br>
</p>
</center>
		</td>
	</tr>
</table>
	</main>
	<?php include 'footer.php';?>
	</body>
	</html>