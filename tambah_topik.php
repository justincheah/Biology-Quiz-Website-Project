<?php
require 'keselamatan.php';
require 'sambung.php';
include 'header.php';
//sesi 
$guru = $_SESSION['idpengguna'];
?>
<?php 
if (isset ($_POST['submit'])){
	//Nilai variable yang di POST
	$nom_soalan = $_POST['nom_soalan'];
	$topik= $_POST['paparan_topik'];
	$idsubjek = $_POST['subjek'];
	$markah = $_POST['markah'];
//QUERY TOPIK
$query = "INSERT INTO TOPIK
(idtopik, topik, markah, idsubjek, idpengguna)
values(NULL, '$topik','$markah','$idsubjek','$guru')";
$insert_row = mysqli_query($hubung,$query);
$last_id = mysqli_insert_id($hubung);
//POP UP MSG
echo "<script>alert('New topic added');
window.location = 'tambah_soalan.php?idtopik=$last_id'</script>";
}
$subjek_pilihan = $_GET['idsubjek'];
//KIRA JUMLAH TOPIK
$query = "SELECT * FROM topik WHERE 
idsubjek = '$subjek_pilihan'";
$topik = mysqli_query($hubung, $query);
$total = mysqli_num_rows($topik);
$next = $total+1;
?> 
<html>
	<head>
<?php include 'menu.php'; ?>
</head><body>
<center><h2>ADD TOPIC</h2></center>
<main>
<table width = "70%" border ="0" align ="center">
<tr>
	<td>
<form method = "post" action= "tambah_topik.php">
<p>
<label>Subject :</label>
<?php 
$result = mysqli_query($hubung, "SELECT * FROM subjek 
WHERE idsubjek = '$subjek_pilihan'");
while ($res = mysqli_fetch_array($result))
{ 
//Paparkan nilai asal
$paparsubjek = $res['subjek'];
}
echo $paparsubjek;
?>
<input type = "text" value = "<?php echo $subjek_pilihan; ?>"
name = "nom_soalan" hidden />
</p>
<p>
<label>Topic Total :</label>
<?php echo $next; ?>
<input type = "text" value = "<?php echo $next; ?>"
name = "nom_soalan" hidden />
</p>
<p>
<label>Topic </label>
<input type = "text" name = "paparan_topik" size = "60" 
required />
</p>
<p>
<label>Marks </label>
<input type = "text" name ="markah" size ="10" required />
</p>
<p>
<input type = "submit" name = "submit" value = "ADD" />
</P>
</form>
		</td>
	</tr>
</table>
	</main>
<?php include 'footer.php';?>
	</body>
</html>