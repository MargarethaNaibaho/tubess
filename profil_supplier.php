<?php
include 'koneksi.php';
$id = $_GET['id'];
?> 
		<?php
			$pecah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user WHERE id_pengguna='$id'"));
		?>
		<br><br><br><br><br><br><br>
		<div class="container">
			<table class="table">
				<tr>
					<td>Nama Supplier</td>
					<td><?php echo $pecah['nama']; ?></td>
				</tr>
				<tr>
					<td>Nomor Telepon</td>
					<td><?php echo $pecah['alamat']; ?></td>
				</tr>
				<tr>
					<td>Provinsi</td>
					<td><?php echo $pecah['provinsi']; ?></td>
				</tr>
				<tr>
					<td>Kota</td>
					<td><?php echo $pecah['kota']; ?></td>
				</tr>
				<tr>
					<td>Kecamatan</td>
					<td><?php echo $pecah['kecamatan']; ?></td>
				</tr>
			</table>

			<div class="row">
				<?php $ambil=mysqli_query($koneksi, "SELECT * FROM produk WHERE id_supplier = '$id'"); ?>
				<?php while($perproduk=mysqli_fetch_array($ambil)) { ?>
				<div class="col-lg-3 col-md-6">
							<div class="single-product">
								<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" width="200px" height="200px" alt="">
								<div class="product-details">
									<h6><?php echo $perproduk['nama_produk']; ?></h6>
									<div class="price">
										<h6>Rp. <?php echo number_format($perproduk['harga_produk']);?></h6>
									</div> 
									<div class="prd-bottom">
										<a href="index.php?laman=beli&id=<?php echo $perproduk['id_produk']; ?>&id_supplier=<?= $perproduk['id_supplier'] ?>" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">Tambah</p>
										</a> 
										<a href="index.php?laman=detail_produk&id=<?php echo $perproduk["id_produk"]; ?>" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">Detail</p>
										</a>
									</div> 
								</div>
							</div>
						</div>
				<?php } ?>
			</div>
		</div> 
		<?php include 'footer.php'; ?>