<?php $id_supplier = $_SESSION["supplier"]; ?>
<h2>Komentar</h2>
<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelanggan</th>
				<th>Nama Produk</th>
				<th>Komentar</th>
			</tr>
		</thead>
		<tbody>
			<?php $ambil = $koneksi->query ("SELECT * FROM komentar WHERE id_supplier = '$id_supplier'"); ?>
			<?php while($pecah = $ambil->fetch_assoc()){?>
			<tr>
				<td><?php echo $pecah['id_komentar']; ?></td>
				<td><?php echo $pecah['nama'];?></td>
				<td><?php echo $pecah['nama_produk'];?></td>
				<td><?php echo $pecah['komentar'];?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>