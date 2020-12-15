<h2>Data Pelanggan</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Alamat</th>
			<th>Tanggal</th>
			<th>Status Pembelian</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody> 
		<?php $nomor=1; ?>
		<?php $ambil=mysqli_query($koneksi, "SELECT * FROM user INNER JOIN pembelian ON user.id_pengguna = pembelian.id_pelanggan WHERE pembelian.id_supplier='$_SESSION[supplier]'"); ?>
		<?php while ($pecah=mysqli_fetch_array($ambil)) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['nomor_telepon']; ?></td>
			<td><?php echo $pecah['alamat_pengiriman'] ?></td>
			<td><?php echo $pecah['tanggal_pembelian'];?></td>
			<td><?php echo $pecah['status_pembelian']?><br>
				<?php if (!empty($pecah["resi_pengiriman"])): { ?>
					No. Resi: <?php echo $pecah["resi_pengiriman"]?>
				<?php } ?>
				<?php endif ?>
			</td>
			<td>
				<a href="index_supplier.php?halaman=detail_pembelian&id=<?php echo $pecah['id_pelanggan']?>" class="btn btn-info">Detail</a>
				<?php if ($pecah['status_pembelian'] != 'Pending' OR $pecah['status_pembelian'] == 'Barang Dikirim'): ?>
					<a href="index_supplier.php?halaman=pembayaran_supplier&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success">Pembayaran</a>
				<?php endif ?>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>