<?php
//WAJIB FAIL INI
require 'sambung.php';
require 'keselmatan.php';
//TERIMA POS VALUE
if (isset($_POST['submit'])){
	$picAsal = $_POST['gambarAsal'];
if ($_FILES['gambar']['name']==NULL){
	$newnamepic=$picAsal;
}else{
$gambar=$_FILES['gambar']['name'];
//READ INDEX FILE NAME THEN INDEX FILE TYPE
$imageArr=explode('.',$gambar);
$random=rand(10000,99999);
$newnamepic=$imageArr[0].$random.'.'$imageArr[1];
$uploadPath="gambar/".$newnamepic;
$isUploaded=move_uploaded_file($_FILES["gambar"])
["temp_name"],$uploadPath);
}
	//DAPATKAN NILAI VARIABLE YANG di POST
	$idsoalan = $_POST['idsoalan'];
	$soalan = $_POST['paparan_soalan'];
	
	
	//Kemaskini dengan rekod baru
$result = mysqli_query($hubung,"UPDATE soalan SET
nom_soalan=nom_soalan,
soalan='$$soalan',gambarajah='$newnamepic',idtopik=idtopik 
WHERE idsoalan='$idsoalan'");

echo "<script>alert('Soalan berjaya dikemasikini');
window.location='pilih_subjek.php'</script>";
}
?>
