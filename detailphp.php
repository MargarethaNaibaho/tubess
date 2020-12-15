<?php
session_start();
include "koneksi.php";
$nama=$_SESSION["pelanggan"]["nama"];
	$komentar=$_POST["komentar"];
	$nama_produk=$_POST["nama_produk"];
	$id_produk = $_POST['id_produk'];
	$id_supplier=$_POST["id_supplier"];
	$bintang=$_POST["bintang"];
	echo "<script>alert('Komentar berhasil dimasukkan')</script>";
	echo "<script>location='index.php'</script>";
	$query="INSERT INTO komentar(id_komentar,komentar,nama,id_produk,nama_produk,id_supplier, nilai)VALUES('','$komentar','$nama','$id_produk','$nama_produk','$id_supplier','$bintang')";
	$hasil=mysqli_query($koneksi,$query);
?>