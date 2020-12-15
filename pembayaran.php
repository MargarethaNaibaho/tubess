<?php
session_start(); 
//koneksi ke database
include 'koneksi.php';
error_reporting(0);
//jika tidak ada session pelanggan/blum login
if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
	echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";
	echo "<script>location = 'index.php?laman=login';</script>";
	exit();
}
 
//mendapatkan id_pembelian dari url

$idpem = $_GET["id"];
$ambil = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = mysqli_fetch_array($ambil);

//mendaptakan id_pelnggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
//mendaptkan id_pelanggan yang login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pengguna"];


if($id_pelanggan_login != $id_pelanggan_beli) {
	echo "<script>alert('Anda Tidak Berhak Melihat Pembayaran Orang Lain');</script>";
	echo "<script>location = 'index.php?laman=riwayat';</script>";
	exit();
}
?>
	<br><br><br><br><br><br><br>
	<div class="container">
		<h2>Konfirmasi Pembayaran</h2>
		<p>Kirim bukti pembayran Anda disini</p>
		<div class="alert alert-info">
			Total tagihan Anda Rp. <strong><?php echo number_format($detpem['total_pembelian']); ?></strong>
		</div>
		<form method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Penyetor</label>
				<input type="text" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Bank</label>
				<input type="text" class="form-control" name="bank">
			</div>
			<div class="form-group">
				<label>Jumlah</label>
				<input type="number" min="1" class="form-control" name="jumlah">
			</div>
			<div class="form-group">
				<label>Foto Bukti</label>
				<input type="file" class="form-control" name="bukti">
				<p class="text-danger">Foto bukti dalam file .jpg maks. 2MB</p>
			</div>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>
	</div>

	<?php

	//jika ada tombol kirim
	if(isset($_POST["kirim"])){
		//upoad dulu foto buktinya
		$namabukti = $_FILES["bukti"]["name"];
		$lokasibukti = $_FILES["bukti"]["tmp_name"];
		$namafiks = date("YmdHis").$namabukti;
		move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");
		$nama = $_POST["nama"];
		$bank = $_POST["bank"];
		$jumlah = $_POST["jumlah"];
		$tanggal = date("Y-m-d");

		$koneksi->query("INSERT INTO pembayaran (id_pembelian, nama, bank, jumlah, tanggal, bukti) VALUES ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

		//update data pembelian dari pending menjadi sudah kirim pembayaran
		$koneksi->query("UPDATE pembelian SET status_pembelian = 'Sudah kirim pembayaran' WHERE id_pembelian = '$idpem'");
		echo "<script>alert('Terimakasih, Anda telah melakukan pembayaran.');</script>";
		echo "<script>location = 'index.php?laman=riwayat';</script>";
	}

	?>
	<br><br><br>
	<?php include 'footer.php'; ?>