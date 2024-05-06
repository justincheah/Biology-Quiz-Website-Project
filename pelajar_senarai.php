<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>

<html>
<head><?php include 'menu.php'; ?></head>
	<body>
		<center><h2>LIST OF REGISTERED STUDENTS</h2></center>
		<main>
<table width="70%" border="0" align="center"
style='font-size:14px'>
	<tr>
		<td width="5%"><b>No.</b></td>
		<td width="10%"><b>Student ID</b></td>
		<td width="5%"><b>Password</b></td>
		<td width="50%"><b>Name of Student</b></td>
		<td width="5%"><b>Gender</b></td>
		<td width="5%"><b>Actions</b></td>
	</tr>
	<?php
$no=1;
$data1=mysqli_query($hubung,"SELECT * FROM pengguna 
WHERE aras='PELAJAR' ORDER BY nama ASC");
while ($info1=mysqli_fetch_array($data1))
{
	?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $info1['idpengguna']; ?></td>
			<td><?php echo $info1['password']; ?></td>
			<td><?php echo $info1['nama']; ?></td>
			<td><?php echo $info1['jantina']; ?></td>
			<td><a href="hapus_pelajar.php?idpengguna=<?php echo $info1['idpengguna'];?>"
onclick="return confirm('WARNING! All the records will be deleted,Confirm?')"><button>DELETE</button>
</a></td>
</tr>
<?php $no++; } ?>
</table>
	</main>
	<center><font style='font-size:14px'>
* End of List *<br />Total Record:<?php echo $no-1; ?>
</font></center></body>
</html>
	