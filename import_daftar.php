<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>

<html>
<head><?php include 'menu.php'; ?></head>
<body>
<center><h2>IMPORT NAME FROM CSV FILE</h2>
</center>
<main>
<table width="70%" border="0> align="center">
<tr>
<td>
<label>Then register student names by group</label>
<br>
<label>Choose csv/excel file location:</label>
<!-- PANGGIL FAIL IMPORT CSV-->
<form action="import_csv.php" method="post"
name="upload_excel" enctype="multipart/form-data">
<input type="file" name="file" id="file"
class="input-large"></br>
<button type="submit" id="submit" name="import" >Upload</button>
</center>
</form>
*CREATE a Ms Excel file and save it as CSV following the format below*
<br><br>

<table width="70%" border="1" align="center" >
<tr>
<td>111213031234</td>
<td>1234</td>
<td>SITI NORHALIZA BINTI SAMAD</td>
<td>FEMALE</td>
</tr>
</table>
</td>
</tr>
</table>
</main>
<?php include 'footer.php';?>
</body>
</html>