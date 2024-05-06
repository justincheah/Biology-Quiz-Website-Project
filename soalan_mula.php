<?php 
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
//DAPATKAN ID SUBJEK
$topik_pilihan = $_GET['idtopik'];
$_SESSION['pilih_topik'] = $topik_pilihan;
//TABLE TOPIK
$dataTopik=mysqli_query($hubung,"SELECT * FROM topik WHERE
idtopik=$topik_pilihan");
$getTopik=mysqli_fetch_array($dataTopik);
//TABLE SOALAN
$dataSoalan=mysqli_query($hubung,"SELECT * FROM soalan
WHERE idtopik=$getTopik[idtopik]");
$getSoalan=mysqli_fetch_array($dataSoalan);
//TABLE SUBJEK
$dataSubjek=mysqli_query($hubung,"SELECT * FROM subjek
WHERE idsubjek=$getTopik[idsubjek]");
$getSubjek=mysqli_fetch_array($dataSubjek);

$total=mysqli_num_rows($dataSoalan);
?>

<html>
<body>
<center>
<h2>SUBJECT: <?php echo $getSubjek['subjek'];?></h2>
<h3>TOPIC: <?php echo $getTopik['topik'];?></h3>
</center>
<main>
<table width="30% border="0" align="center">
<tr>
<td><h3>ATTENTION TO STUDENTS:</h3></td>
</tr> 
<tr>
<td>ANSWER ALL THE QUESTIONS. CHOOSE THE BEST ANSWER</td>
</tr>
<tr>
<td>

	<ul>
	<li>TOTAL OF QUESTIONS: <strong><?php echo $total; ?>
</strong></li>
	<li>TYPE OF QUESTION: <strong>Answers counted and true/false</strong></li>
	<li>TIME ALLOCATED: <strong>
	<?php echo $total*0.5; ?> minute</strong></li>
	</ul>
<br>
<a href="soalan_papar.php?n=1&idtopik=
<?php echo $topik_pilihan;?>&total=
<?php echo $total;?>"><button>START</button></a>
<a href="javascript: history.go(-1)"><button>CANCEL
</button></a>
</td>
</tr>
</table>
</main>
<?php include 'footer.php';?>
</body>
</html>