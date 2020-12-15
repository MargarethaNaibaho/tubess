<h2>Data Produk</h2>
<table class="table table-bordered">
	<thead>
		<tr> 
			<th>No</th>
			<th>Nama</th>
			<th>Stok</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = mysqli_query ($koneksi, "SELECT * FROM produk INNER JOIN user on produk.id_supplier=user.id_pengguna WHERE produk.id_supplier='$_SESSION[supplier]'");?>
		<?php while($pecah=mysqli_fetch_array($ambil)) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['stok_produk']; ?></td>
			<td><?php echo $pecah['harga_produk'];?></td>
			<td><?php echo $pecah['berat_produk'];?></td>
			<td>
				<img src="foto_produk/<?php echo $pecah['foto_produk'];?>" width="70">
			</td>
			<td><center><a href="index_supplier.php?halaman=hapusproduk_supplier&id=<?php echo$pecah['id_produk']; ?>" class="btn-danger btn">Hapus</a></center><br>
				<center><a href="index_supplier.php?halaman=ubahproduk_supplier&id=<?php echo$pecah['id_produk']; ?> " class="btn btn-warning">Ubah</a></center></td>
		</tr>
	<?php $nomor++;?>
	<?php } ?>
	</tbody>
</table>
<a href="index_supplier.php?halaman=tambahproduk_supplier" class="btn btn-primary">Tambah Produk</a>