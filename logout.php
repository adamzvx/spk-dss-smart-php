<?php
session_start();
echo "<script>alert('anda berhasil keluar')</script>";
session_destroy();
header("location:login.php");
?>