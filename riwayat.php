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
?>
	<br><br><br><br><br><br><br><br>
	<section class="riwayat">
		<div class="container">
			<h3><b>< > &nbsp;&nbsp;</b>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama"];?></h3>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Tanggal</th>
						<th>Status</th>
					 	<th>Total</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$nomor=1;
					//mendapatkan id_pelanggan yg login dari session
					$id_pelanggan = $_SESSION["pelanggan"]['id_pengguna'];

					$ambil = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
					while ($pecah = mysqli_fetch_array($ambil)) {

					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah["tanggal_pembelian"];?></td>
						<td><?php echo $pecah["status_pembelian"];?>
							<br>
							<?php if (!empty($pecah["resi_pengiriman"])): { ?>
								No. Resi: <?php echo $pecah["resi_pengiriman"]?>
							<?php } ?>
							<?php endif ?>
						</td>
						<td>Rp. <?php echo number_format($pecah["total_pembelian"]);?></td>
						<td>
							<a href="index.php?laman=nota&id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-info">Nota</a>
							<?php $status = $pecah['status_pembelian']; ?>
							<?php if($status=='Pending') : ?>
							<a href="index.php?laman=pembayaran&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-success">Input Pembayaran</a>
							
							<?php else: ?>  
								<a href="index.php?laman=lihat_pembayaran&id=<?php echo$pecah['id_pembelian']; ?>" class="btn btn-warning">Lihat Pembayaran</a>

						<?php endif?>
						</td>
					</tr>
					<?php $nomor++; ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</section>
	<br><br><br>
	<?php include 'footer.php'; ?>