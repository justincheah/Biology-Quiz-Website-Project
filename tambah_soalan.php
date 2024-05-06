<?php
require 'keselamatan.php';
require 'sambung.php';
include 'header.php';
?>

<?php
if (isset($_POST['submit'])){
if ($_FILES['gambar']['name']==NULL)
{
	$newnamepic="";
}
else
{
	
//PROSES GAMBAR
$gambar=$_FILES['gambar']['name'];
$imageArr=explode('.',$gambar);
$random=rand(10000,99999);
$newnamepic=$imageArr[0].random.'.'.$imageArr[1];
$uploadPath="gambar/".$newnamepic;
$isUploaded=move_uploaded_file($_FILES["gambar"]
["tmp_name"],$uploadPath);
}
	//VARIABLE POSTED
	$nom_soalan = $_POST['nom_soalan'];
	$idtopik = $_POST['idtopik'];
	$soalan = $_POST['paparan_soalan'];
	$jawapan_betul = $_POST['jawapan_betul'];
//ARRAY VALUE
	$pilihan = array();
	$pilihan[1] = $_POST['pilih1'];
	$pilihan[2] = $_POST['pilih2'];
	$pilihan[3] = $_POST['pilih3'];
	$pilihan[4] = $_POST['pilih4'];
//TAMBAH SOALAN
$query="INSERT INTO soalan
(nom_soalan,soalan,gambarajah,idtopik)
values('$nom_soalan','$soalan','$newnamepic','$idtopik')";
$insert_row=mysqli_query($hubung,$query);
$last_id= mysqli_insert_id($hubung);
//POP UP MSG
echo "<script>alert('New question added!');
window.location='tambah_soalan.php?idtopik=$idtopik'
</script>";
	//TAMBAH JAWAPAN
	if($insert_row){
		foreach($pilihan as $pilihan_jawapan => $pilih){
			if($pilih != ''){
				if($jawapan_betul == $pilihan_jawapan){
					$jawapan = 1;
				} else {
						$jawapan = 0;
				}

$query="INSERT INTO pilihan
(nom_soalan,jawapan,pilihan_jawapan,idsoalan)
values('$nom_soalan','$jawapan','$pilih','$last_id')";
$insert_row=mysqli_query($hubung, $query);
			}
		}
	}
}
$topik_pilihan = $_GET['idtopik'];
$_SESSION['topik_semasa'] = $topik_pilihan;
//JUMLAH SOALAN
$query = "SELECT * FROM soalan WHERE
idtopik='$topik_pilihan'";
$soalan=mysqli_query($hubung, $query);
$total=mysqli_num_rows($soalan);
$next=$total+1;
?>

<html>
	<head><?php include 'menu.php'; ?></head>
	<body>
	<center><h2>Add Question</h2></center>
	<main>
<table width="70%" border"0" align="center">
<tr>
<td>
<form method="post" enctype="multipart/form-data">
<p>
<label>Question Number</label>
<input type="text" value="<?php echo $next; ?>"
name="nom_soalan" size="5" readonly />
<input type="text" value="<?php echo $topik_pilihan; ?>"
name="idtopik" hidden />
</p>
<p>
<label>Question</label>
<textarea id="papar_soalan" name="paparan_soalan"
rows="7" cols="105" required></textarea>
</p>

<p>
<label>Picture</label>
<small style="color:red">if neccessary</small></label>
<input type="file" name="gambar"/>
</p>
<p>
<label>Choice 1: </label>
<input type="text" name="pilih1" size="50"/>
</p>
<p>
<label>Choice 2: </label>
<input type="text" name="pilih2" size="50"/>
</p>
<p>
<label>Choice 3: </label>
<input type="text" name="pilih3" size="50"/>
</p>
<p>
<label>Choice 4: </label>
<input type="text" name="pilih4" size="50"/>
</p>
<p>
<label>Choose answer [1-4] </label>
<input type="text" name="correct_answer" size="5"
required/>
</p>
<p>
<input type="submit" name="submit" value="CREATE"/>
<button onclick="window.location.href='index2.php'">
END</button>
</p>
</form>
</td>
</tr>
</table>
</main>
<?php include 'footer.php';?>
</body>
</html>

