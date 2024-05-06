<?php
require 'sambung.php';
include 'header.php';
?>

<html>
<head><?php include 'menu1.php' ?></head>
<body>
	<center><h2>LOGIN AS TEACHER/STUDENT</h2></center>
	 <main>
<table width="70%" border="0" align="center">
  <tr>
	  <td align="center">
  <form action="proseslogin.php" method="post">
  IC. Number:<br>
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
<br><br>
Password: <br>
<input type="password" name="password"
  placeholder="4 Digit" maxlength='4'size="10"
  onkeypress='return event.charCode >= 48 &&
 event.charCode <= 57' required>
 <br><br>
	<button type="submit">Login</button>
	<button type="reset">Reset</button>
	<br>
	<h5>*Click here, <a href="daftar_baru.php">
	To register</a></h5></br>
	</form>
	</td>
	</tr>
	</table>
	</main>
<?php include 'footer.php';?>
</body>
</html>