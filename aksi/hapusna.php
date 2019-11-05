<?php
	session_start();
	include '../onek.php';

	if (isset($_GET['name'])) {
		
		$id = $_GET['name'];
		mysqli_query($dbcon,"DELETE FROM penilaian WHERE id_penilaian = '$id'");
		echo "<script>alert ('berhasil menghapus')</script>";
		header("location:../nilai.php");

	}else{
		echo "<h1>NGAPAIN WOI</h1>";
	}

?>