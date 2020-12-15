<h2>Detail Pembelian</h2>
<?php 
include 'koneksi.php';
$ambil = mysqli_query($koneksi, "SELECT * FROM pembelian JOIN user ON pembelian.id_pelanggan=user.id_pengguna WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=mysqli_fetch_array($ambil);
?>

<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>
		Tanggal&nbsp;: <?php echo $detail['tanggal_pembelian']; ?><br>
		Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.<?php echo number_format($detail['total_pembelian']); ?><br>
		Status&nbsp;&nbsp;&nbsp;: <?php echo $detail['status_pembelian']; ?>
</p>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama']; ?></strong>
		<br>
		<p>
			<?php echo $detail['email']; ?><br>
			<?php echo $detail['nomor_telepon']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong><?php echo $detail["nama_kota"]; ?></strong><br>
		<p>
			Tarif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format($detail["tarif"]); ?><br>
			Alamat&nbsp;: <?php echo $detail["alamat_pengiriman"]; ?>
		</p>
	</div>
</div>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nomor</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil =mysqli_query($koneksi, "SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=mysqli_fetch_array($ambil)) { ?>
		<tr>
			<td><?php echo $nomor ;?></td>
			<td><?php echo $pecah['nama_produk'];?></td>
			<td>Rp. <?php echo number_format($pecah['harga_produk']);?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>Rp.<?php echo number_format($pecah['harga_produk']*$pecah['jumlah']);?></td>
		</tr>
		<?php $nomor++ ?>
		<?php }?>
	</tbody>
</table>