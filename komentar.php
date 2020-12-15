<h2>Komentar</h2>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelanggan</th>
				<th>Nama Produk</th>
				<th>Komentar</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $ambil = $koneksi->query ("SELECT * FROM komentar"); ?>
			<?php while($pecah = $ambil->fetch_assoc()){?>
			<tr>
				<td><?php echo $pecah['id_komentar']; ?></td>
				<td><?php echo $pecah['nama'];?></td>
				<td><?php echo $pecah['nama_produk'];?></td>
				<td><?php echo $pecah['komentar'];?></td>
				<td>
					<a href="index_admin.php?halaman=hapus_komentar&id=<?php echo$pecah['id_komentar']; ?>" class="btn-danger btn">Hapus</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>