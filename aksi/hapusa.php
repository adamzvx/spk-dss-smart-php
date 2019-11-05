<?php
	session_start();
	include '../onek.php';

	if (isset($_GET['name'])) {
		
		$nisn = $_GET['name'];
		mysqli_query($dbcon,"DELETE FROM siswa WHERE nisn = '$nisn'");
		mysqli_query($dbcon,"DELETE FROM penilaian WHERE nisn='$nisn'");
		echo "<script>confirm('berhasil menghapus beserta nilai')</script>";
		header("location:../alternatif.php");

	}else{
		echo "<h1>NGAPAIN WOI</h1>";
	}

?>