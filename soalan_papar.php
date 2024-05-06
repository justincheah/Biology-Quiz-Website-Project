<?php
require 'sambung.php';
include 'header.php';
?>
<?php session_start();?>
<?php 
//DAPATKAN ID TOPIK
$topik_pilihan=$_SESSION['pilih_topik'];
//TABLE TOPIK
$dataTopik=mysqli_query($hubung, "SELECT * FROM soalan As q
INNER JOIN topik AS t ON t.idtopik = q.idtopik
INNER JOIN subjek AS s ON s.idsubjek = t.idsubjek
WHERE t.idtopik=$topik_pilihan GROUP BY q.idsoalan");
$getSoalan=mysqli_fetch_array($dataTopik);
//JUMLAH BILANGAN SOALAN
$total = mysqli_num_rows($dataTopik);
//TETAPKAN NOM SOALAN
$number = (int) $_GET['n'];
// DAPATKAN SOALAN
$query1 = mysqli_query($hubung,"SELECT * FROM soalan
WHERE nom_soalan = $number AND idtopik=$topik_pilihan");
$question=mysqli_fetch_assoc($query1);
// PILIHAN JAWAPAN
$query2 = mysqli_query($hubung, "SELECT * FROM pilihan AS c
INNER JOIN soalan AS q ON c.idsoalan = q.idsoalan
WHERE q.nom_soalan = $number AND c.idsoalan=
$question[idsoalan]");
//PAPAR PILIHAN
$choices = $query2;
?>

<html>
<body>
<center>
<h2>SUBJECT: <?php echo $getSoalan['subjek'];?></h2>
<h3>TOPIC: <?php echo $getSoalan['topik'];?></h3>
</center>
<table width="70%" border="0" align="center">
<tr>
<td>
<hr>
<?php
//RESPON JAWAPAN BETUL ATAU TIDAK
if($number == 1){
echo"Please read the questions carefully";
}else{
$jawapan=$_GET['semakan'];
if($jawapan=="TEPAT"){
echo "Congrats, the answer ";
echo $number-1;
echo " is <font color='blue' size='+3'>ACCURATE</font>";
}else{
	echo "Sorry, the answer ";
	echo $number-1;
	echo " is <font color='red' size='+3'>INCORRECT
</font>";
}
}
?>
</td>
</tr>
<tr>
<td>
<hr>
QUESTION <?php echo $number; ?> FROM <?php echo $total; ?>
<br><br>
<?php echo $question['soalan'] ?><br>
<?php
if ($question['gambarajah']==NULL){
}else{
echo "<img src='gambar/".$question['gambarajah']."'
width='30%' height='30%'/>";
}
?>
</p>
<form method="post" action="soalan_semak.php">
<ul>
<?php while($row=mysqli_fetch_assoc($choices)): ?>
<li><input name="choice" type="radio" required
value="<?php echo $row['idpilihan']; ?>" />
<?php echo $row['pilihan_jawapan']; ?>
</li>
<?php endwhile; ?>
</ul>

<input type="submit" value="CHOOSE" />
<input type="hidden" name="number"
value="<?php echo $number; ?>" />
<input type="hidden" name="idsoalan"
value="<?php echo $question['idsoalan']; ?>" />
</form>
</td>
</tr>
</table>
<?php include 'footer.php';?>
</body>
</html>
