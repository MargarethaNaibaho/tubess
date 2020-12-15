<?php
session_start();
include 'koneksi.php';
error_reporting(0);
?>
 
<br><br><br><br><br><br><br>
<section class="konten">
	<div class="container">
		<!--nota copas dari nota admin-->
		<h2><b>< >&nbsp;&nbsp;&nbsp;</b>Detail Pembelian</h2><br>
<?php 
$ambil = mysqli_query($koneksi, "SELECT * FROM pembelian JOIN user ON pembelian.id_pelanggan=user.id_pengguna WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=mysqli_fetch_array($ambil);
?>

<!--jika pelanggan yang beli tidak sama dengan pelanggan yang login, maka dilarikan ke riwayat.php karna dia tidak berhak melihat nota orang lain. pelanggan yang beli harus pelanggan yang login-->
<?php
//mendapatkan id_pelanggan yang membli
$idpelangganyangbeli = $detail["id_pengguna"];

//mendaptakan id pelanggan yang login
$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pengguna"];

if ($idpelangganyangbeli != $idpelangganyanglogin) {
	echo "<script>alert ('Anda tidak berhak melihat nota orang lain');</script>";
	echo "<script>location = 'index.php?laman=riwayat';</script>";
	exit();
}
?>

<p>
	Tanggal&nbsp;&nbsp;&nbsp;:&nbsp;&emsp; <?php echo $detail['tanggal_pembelian']; ?><br>
	Total&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&emsp; <?php echo $detail['total_pembelian']; ?>
</p><hr>
<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>No. Pembelian: <?php echo $detail['id_pembelian']; ?></strong><br>
		Tanggal&nbsp;: <?php echo $detail['tanggal_pembelian']; ?><br>
		Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format($detail['total_pembelian']); ?>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama']; ?></strong><br>
		<p>
			Email&emsp;&emsp;&emsp;: <?php echo $detail['email']; ?><br>
			No. Telepon : <?php echo $detail['nomor_telepon']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong><?php echo $detail['nama_kota']; ?></strong><br>
		Ongkos Kirim&nbsp;: Rp <?php echo number_format($detail['tarif']); ?><br>
		Alamat&emsp;&emsp;&emsp;: <?php echo $detail['alamat_pengiriman']; ?>
	</div>
</div><hr>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nomor</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Jumlah</th>
			<th>Sub Berat</th>
			<th>Sub Total</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = mysqli_query($koneksi, "SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=mysqli_fetch_array($ambil)) { ?>
		<tr>
			<td><?php echo $nomor ;?></td>
			<td><?php echo $pecah['nama'];?></td>
			<td>Rp. <?php echo number_format($pecah['harga']);?></td>
			<td><?php echo $pecah['berat'];?> gram</td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['subberat']; ?> gram</td>
			<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<?php $status = $detail['status_pembelian']; ?>
<?php if($status=='Pending') : {?>
		 <div class="alert alert-info">
		 	<center><p>
		 		Silahkan melakukan pembayaran senilai Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
		 		<strong>BANK MANDIRI 137-001088-3276 AN. Tupatu Store</strong>
		 	</p></center>
		 </div>
<?php }; 
 else : { ?>
		<div class="alert alert-info">
			<center><p><strong>Anda telah melakukan pembayaran</strong></p></center>
		</div>
<?php }; ?>
<?php endif?>
	</div>
</section>
<br><br><br>
<?php include 'footer.php'; ?>