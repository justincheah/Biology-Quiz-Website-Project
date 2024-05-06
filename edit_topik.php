<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>

<?php
if (isset($_POST['update'])){
	$idsubjek = $_POST['idsubjek'];
	$topik = $_POST['idtopik'];
	$topikBaru = $_POST['paparan_topik'];
	$markahBaru = $_POST['markah'];
//KEMASKINI DENGAN REKOD BARU
$result = mysqli_query($hubung,"UPDATE topik SET
topik='$topikBaru', markah='$markahBaru',
idsubjek='$idsubjek'
WHERE idtopik='$idtopik'");
//papar mesej
echo "<script>alert('Kemaskini rekod telah berjaya');
window.location='pilih_subjek.php'</script>";
}
?>

<?php
//DAPATKAN ID SAOALN
$topikEdit = $_GET['idtopik'];
//PILIH DATA BERDASARKAN PADA ID REKOD
$pilihTopik = mysqli_query($hubung, "SELECT *
FROM topik WHERE idtopik=$topikEdit");
while($dataTopik = mysqli_fetch_array($pilihTopik))
{
$pilihSubjek=mysqli_query($hubung, "SELECT * FROM subjek
WHERE idsubjek=$dataTopik[idsubjek]");
$dataSubjek=mysqli_fetch_array($pilihSubjek) ;
//Paparkan nilai asal
$idTOPIK = $topikEdit;
$editTOPIK = $dataTopik['topik'];
$editMARKAH= $dataTopik['markah'];
}
?>

<html>
<head><?php include 'menu.php'; ?></head>
<body>
<center><h2>Update Topic</h2></center>
<main>
<table width="70%" border="0" align="center”
style='font-size:18px'>
<tr>
<td>
<form method="post" action="edit_topik.php">
<p>
<label>Subject :</label>
<select name="idsubjek">
<option selected value="
<?php echo $dataTopik['idsubjek']; ?>">
<?php echo $dataSubjek['subjek']; ?></option>
<?php $data2=mysqli_query($hubung, "SELECT * FROM subjek");
while ($info2=mysqli_fetch_array($data2))
{
echo "<option value='$info2[idsubjek]'>$info2[subjek]
</option>";
}
?>
</p>
</select>
<p>
<label>Topic :</label>
<input type="text" name="paparan_topik" size="60%"
value="<?php echo $editTOPIK; ?>" />
</p>
<p>
<label>Marks :</label>
<input type="text" name="markah" size="5%"
value="<?php echo $editMARKAH; ?>" />
</p>
<p> 
<input type="hidden" name="idtopik"
value="<?php echo $idTOPIK; ?>" />
<input type="submit" name="update" value="UPDATE" />
<input type="button" value="CANCEL" onclick="history.back()"/>
</p>
</form>
</td>
</tr>
</table>
</main>
<?php include'footer.php';?>
</body>
</html>