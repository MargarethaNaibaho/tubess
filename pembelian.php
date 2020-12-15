<h2>Data Pembelian</h2>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelanggan</th>
				<th>Tanggal</th>
				<th>Status Pembelian</th>
				<th>Total</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor=1; ?>
			<?php $ambil = $koneksi->query ("SELECT * FROM pembelian JOIN user on pembelian.id_pelanggan=user.id_pengguna"); ?>
			<?php while($pecah = $ambil->fetch_assoc()){?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama'];?></td>
				<td><?php echo $pecah['tanggal_pembelian'];?></td>
				<td><?php echo $pecah['status_pembelian']?><br>
					<?php if (!empty($pecah["resi_pengiriman"])): { ?>
								No. Resi: <?php echo $pecah["resi_pengiriman"]?>
							<?php } ?>
							<?php endif ?>
				</td>
				<td><?php echo $pecah['total_pembelian'];?></td>
				<td>
					<a href="index_admin.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">Detail</a>

					<?php if ($pecah['status_pembelian'] != 'Pending'): ?>
					<a href="index_admin.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success">Pembayaran</a>
				<?php endif ?>
				</td>
			</tr>
			<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</table>