<h2>Data Produk</h2>
<table class="table table-bordered">
	<thead>
		<tr> 
			<th>No</th>
			<th>Nama Produk</th>
			<th>Nama Supplier</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php while($pecah=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk JOIN user ON produk.id_supplier = user.id_pengguna"))) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['harga_produk'];?></td>
			<td><?php echo $pecah['berat_produk'];?></td>
			<td>
				<img src="foto_produk/<?php echo $pecah['foto_produk'];?>" width="100">
			</td>
			<td><a href="index_admin.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn">Hapus</a>
		</tr>
	<?php $nomor++;?>
	<?php } ?>
	</tbody>
</table>