<h2>Detail Pembelian</h2>
<?php 

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN user ON pembelian.id_pelanggan=user.id_pengguna WHERE pembelian.id_pelanggan='$_GET[id]'");
$detail=$ambil->fetch_assoc();
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
		<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN pembelian ON pembelian_produk.id_pembelian = pembelian.id_pembelian WHERE pembelian.id_pelanggan='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor ;?></td>
			<td><?php echo $pecah['nama'];?></td>
			<td>Rp. <?php echo number_format($pecah['harga']);?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>Rp.<?php echo number_format($pecah['harga']*$pecah['jumlah']);?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>