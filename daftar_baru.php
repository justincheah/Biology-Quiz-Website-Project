<?php
//WAJIB FAIL INI
require 'sambung.php';
//PERLUKAN FAIL INI
include 'header.php';
//POST VALUE
if (isset($_POST['idpengguna'])) {
	//pembolehubah untuk memegang data yang dihantar
	$idpengguna = $_POST['idpengguna'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$jantina = $_POST['jantina'];
$daftar= "INSERT INTO pengguna
(idpengguna,password,nama,jantina,aras) VALUES
('$idpengguna','$password','$nama','$jantina','PELAJAR')";
$hasil = mysqli_query($hubung, $daftar);
	if ($hasil) {
		echo "<script>alert('Registration completed!');
		window.location='login.php'</script>";
	}else{
		echo "<script>alert('Registration failed!');
		window.location='daftar_baru.php'</script>";
	}
}
?>

<html>
	<head><?php include 'menu1.php' ?></head>
	<body><center><h2>REGISTRATION</h2>
	</center>
<table width="70%" border="0" align="center">
	<tr>
		<td>
<!-- Papar Borang Pendaftaran --> 
<form method="POST">
		<label>IC NUMBER</label></h2>
	<input onblur="checkLength(this)" type="text"
name="idpengguna"
	placeholder="Without dash -" maxlength='12'size="25"
	onkeypress='return event.charCode >= 48 &&
event.charCode <= 57' required autofocus />	
	  <script>
			function checkLength(el) {
			if (el.value.length != 12) {
					alert("IC Number must be in 12 digits!")
			}
			}
	  </script>
<br><label>PASSWORD</label><br><input type="password"
name="password" id="password" placeholder="4 digit only"
maxlength='4' onkeypress='return event.charCode >= 48 && 
event.charCode <= 57'required>
<br><label>STUDENT NAME</label><br><input type="text" size="50" name="nama" placeholder="Full name" required ><br>
<label>GENDER</label><br><select name="jantina">
	<option value="">---CHOOSE---</option>
	<option value="LELAKI">MALE</option>
	<option value="PEREMPUAN">FEMALE</option>
	</select><br><br>
<input type="reset" value="Reset">
<button type="submit">REGISTER</button><br><br>
<font color='blue'>*Ensure all your informations are correct.</font>
</form>
		</td>
	</tr>
</table>
<?php include 'footer.php';?>
	</body>
</html>