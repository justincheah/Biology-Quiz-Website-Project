<?php
//PERLUKAN FAIL2 INI
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>

<html>
<head><?php include 'menu.php'; ?></head>
	<body>
<center><h2>LIST OF REGISTERED SUBJECTS</h2></center>
	<main>
<table width="70%" border="0" align="center"
style='font-size:16px'>
<tr>
<td colspan="3" valign="middle" align="right"><b>
<a href="subjek_daftar.php"><button>REGISTER SUBJECT
</button></a></b></td>
	</tr>
	<tr>
		<td width="2%"><b>No.</b></td>
		<td width="60%"><b>Subject name</b></td>
		<td width="8%"><b>Actions</b></td>
	</tr>
<?php
$no=1;
$data1=mysqli_query($hubung,"SELECT * FROM subjek 
ORDER BY subjek ASC");
while ($info1=mysqli_fetch_array($data1))
{
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1['subjek']; ?></td>
<td align="center"><a href="hapus_subjek.php?idsubjek=
<?php echo $info1['idsubjek'];?>"
onclick="return confirm('WARNING!!!, Topics, Questions and Answers will be deleted.
Confirm?')"><button>DELETE</button> </a></td>
</tr>
<?php $no++; } ?>
</table>
		</main>
	<center>
<font style='font-size:14px'>
* END OF LIST *<br />TOTAL RECORD:<?php echo $no-1; ?>
</font></center></body>
</html>