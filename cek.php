<?php
	session_start();
	if ($_SESSION['stat']!='masuk') {
		echo "<script>alert('anda belum login')</script>";
		header("location:login.php?id=out");
	}

?>