<?php
//TAMATKAN SESI LOGIN
session_destroy();
//LENCONGKAN KE FAIL LAMAN UTAMA
header("location:index.php");
?>