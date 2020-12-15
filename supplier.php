<h2>Data Supplier </h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nomor</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Produk</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody> 
		<?php $nomor=1; ?>
		<?php $ambil=mysqli_query($koneksi, "SELECT * FROM user WHERE level=2"); ?>
		<?php while ($pecah=mysqli_fetch_array($ambil)) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['nomor_telepon']; ?></td>
			<th><a href="index_admin.php?halaman=produk_supplier&id=<?php echo $pecah['id_pengguna']; ?>" class="btn btn-info">Produk</a></th>
			<td>
				<a href="index_admin.php?halaman=hapus_pelanggan&id=<?php echo $pecah['id_pengguna']; ?>"class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>