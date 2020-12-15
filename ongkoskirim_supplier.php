<?php

$id_supplier = $_SESSION["supplier"];

?>

<h2>Ongkos Kirim</h2>
<hr>
<table class="table">
	<thead>
		<th>No.</th>
		<th>Kota</th>
		<th>Ongkos Kirim</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = mysqli_query($koneksi, "SELECT * FROM ongkir WHERE id_supplier='$id_supplier'");?>
		<?php while($pecah=mysqli_fetch_array($ambil)) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_kota']; ?></td>
			<td><?php echo $pecah['tarif']; ?></td>
			<td><a href="index_supplier.php?halaman=hapus_ongkoskirim&id=<?php echo$pecah['id_ongkir']; ?>" class="btn-danger btn">Hapus</a></td>
		</tr>
	<?php $nomor++;?>
	<?php } ?>
	</tbody>
</table>
<a href="index_supplier.php?halaman=tambah_ongkos" class="btn btn-primary">Tambah Tarif Ongkir</a>