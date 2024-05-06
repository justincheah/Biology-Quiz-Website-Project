<?php
require 'sambung.php';
include 'header.php';
session_start();
?>
<?php 
//query soalan
	$query="INSERT INTO perekodan
	(idperekodan,idpengguna,idtopik,skor,catatan_masa)
	values(NULL,'$_SESSION[idpengguna]',
	'$_SESSION[pilih_topik];','$_SESSION[score]',NULL)";
	$insert_row=mysqli_query($hubung,$query);
	?>
	
	<html>
	<body>
	<center><h2>End of Question</h2></center>
	<main>
	<table width="70%" border="0" align="center">
	<tr>
	<td>
	<p>Congratulations! You've made it to the end!</p>
	<p>Total corrects: <?php echo $_SESSION['score']; ?></p>
	</td>
	</tr>
	<tr>
	<td>
	<button onclick="window.location.href='soalan_papar.php?
	n=1'">Try Again</button>
	<button onclick="window.location.href='index2.php'">
	End</button>
	<button onclick="window.location.href=
	'skor_individu.php'">Performance</button>
	<?php $_SESSION['score']=0; ?>
		</td>
		</tr>
	</table>
	<?php include 'footer.php';?>
	</body>
	</html>
	