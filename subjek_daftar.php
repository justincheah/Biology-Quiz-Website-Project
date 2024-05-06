<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>
<?php
if (isset($_POST['submit'])){
		//NILAI YG DIPOST
		$nom_subjek = $_POST['nom_subjek'];
		$subjek_baru = $_POST['subjek'];
		//QUERY SUBJEK
		$query="INSERT INTO subjek (idsubjek,subjek)
			values('$nom_subjek','$subjek_baru')";
		$insert_row=mysqli_query($hubung,$query);
//POP UP MSG
echo "<script>alert('New subject added');
window.location='subjek_senarai.php'</script>";
}
//JUMLAH SUBJEK
$query = "SELECT * FROM subjek";
$subjek = mysqli_query($hubung,$query);
$total=mysqli_num_rows($subjek);
$next=$total+1;
?>

<html>
<head><?php include 'menu.php'; ?></head>
<body><center><h2>REGISTER SUBJECT</h2></center>
<main>
<table width="70%" border="0" align="center">
	<tr>
		<td>
		<form method="post">
<p>
<label>Subject-</label><?php echo $next; ?>
<input type="text" value="<?php echo $next; ?>"
name="nom_subjek" hidden />
</p>
<p>
<label>Subject :</label>
<input type="text" name="subjek" size="40" required />
</p>
<p>
<input type="submit" name="submit" value="REGISTER" />
</p>
</form>
</td></tr></table>
</main>
<?php include 'footer.php';?>
	</body>
</html>