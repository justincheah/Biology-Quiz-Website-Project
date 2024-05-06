<?php
if ($_SESSION['level']=="ADMIN"){
?>
<!-- ADMIN -->
<center><p>
<a href="index2.php"><button>Home</button></a>
<a href="subjek_senarai.php"><button>Subject list</button></a>
<a href="guru_senarai.php"><button>Teacher list</button></a>
<a href="pelajar_senarai.php"><button>Student list</button></a>
<a href="laporan_statistik.php"><button>Statistic</button></a>
<a href="logout.php"><button>Logout</button></a>
</p></br>
<?php $pengguna="DASHBOARD: ADMIN";?>
</center>
<?php
}elseif ($_SESSION['level']=="GURU"){
?>

<!-- GURU -->
<center><p>
<a href="index2.php"><button>Home</button></a>
<a href="papar_topik.php"><button>Quiz</button></a>
<a href="prestasi_topik.php"><button>Performance</button></a>
<a href="import_daftar.php"><button>Import</button></a>
<a href="logout.php"><button>Logout</button></a>
</p></br>
<?php $pengguna="DASHBOARD: TEACHER";?>
</center>
<?php
}else{
?>

<!-- PELAJAR -->
<center></br>
<p>
<a href="index2.php"><button>Home</button></a>
<a href="kuiz_subjek.php"><button>Start Quiz</button></a>
<a href="skor_individu.php"><button>Performance</button></a>
<a href="logout.php"><button>Logout</button></a>
</p>
</br>
<?php $pengguna="DASHBOARD: STUDENT";?>
</center>
<?php
}
?>