<h2>Data Konsumen </h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nomor</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody> 
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM user WHERE level=3"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['nomor_telepon']; ?></td>
			<td>
				<a href="index_admin.php?halaman=hapus_pelanggan&id=<?php echo $pecah['id_pengguna'] ?>" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>