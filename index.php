<?php
session_start();
error_reporting(0);
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/logoku.png">
		<!-- Author Meta -->
		<meta name="author" content="CodePixar">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<?php include 'assets.php'; ?>
		<?php include 'script.php'; ?>
		<title>Tupatu Store</title>
		<!--
			CSS
		============================================= -->

	</head>
	<body>
		<?php 
		$laman = $_GET['laman']; 
		include 'menu1.php';
		if (!isset($laman)) {
			include 'daftarBarang.php';
		}
		else {
			include $laman.'.php';
		}
		?>
</body>
</html>