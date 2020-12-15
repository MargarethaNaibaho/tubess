<?php
session_start(); 
include 'koneksi.php';
error_reporting(0);
$id_pembelian = $_GET["id"];

//echo $id_pembelian;
$ambil = mysqli_query($koneksi, "SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian = pembelian.id_pembelian WHERE pembelian.id_pembelian = '$id_pembelian'");
$detbay = mysqli_fetch_array($ambil);

// echo "<pre>";
// print_r($detbay);
// echo "</pre>";
 

//jika blumada data pembayaran
if(empty($detbay)) {
	echo "<script>alert('Belum Ada Data Pembayaran');</script>";
	echo "<script>location = 'index.php?laman=riwayat'; </script>";
	exit();
}

//jika data pembayaran tidak sesuai denganpelanggan yang login
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

if($_SESSION["pelanggan"]['id_pengguna'] != $detbay["id_pelanggan"]) {
	echo "<script>alert('Anda Tidak Berhak Melihat Pembayaran Orang Lain');</script>";
	echo "<script>location = 'index.php?laman=riwayat'; </script>";
	exit();
}
?>

	<br><br><br><br><br><br><br>
	<div class="container">
		<h3><b>< >&nbsp;&nbsp;&nbsp;</b>Lihat Pembayaran</h3><br>
		<div class="row">
			<div class="col-md-6">
				<table class="table">
					<tr>
						<th>Nama</th>
						<td><?php echo $detbay["nama"]?></td>
					</tr>
					<tr>
						<th>Bank</th>
						<td><?php echo $detbay["bank"]?></td>
					</tr>
					<tr>
						<th>Tanggal</th>
						<td><?php echo $detbay["tanggal"]?></td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td>Rp. <?php echo number_format($detbay["jumlah"]) ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<img src="bukti_pembayaran/<?php echo $detbay['bukti']; ?>" class="img-fluid"></div>
		</div>
	</div>
	<br><br><br>
	<?php include 'footer.php'; ?>