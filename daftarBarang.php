	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1><b>< > &nbsp;&nbsp;</b>Produk Terbaru<b> &nbsp;&nbsp;< ></b></h1><h1>---------------------</h1>
				</div>
			</div>
		</div>
			<!-- start product Area --><center><!-- 
		<button class="kategori">Anak-anak</button>&nbsp;
		<button class="kategori">Pria</button>&nbsp;
		<button class="kategori">Wanita</button> --></center>
			<!-- single product slide -->
			<div class="single-product-slider">
				<div class="container">
					<div class="row">
						<!-- single product -->
						<?php
						$querySQL = "SELECT * FROM produk JOIN user ON produk.id_supplier=user.id_pengguna";

						if(isset($_GET['kat'])){
							$kat = $_GET['kat'];
							
							if($kat == "anak"){
								$querySQL .= " WHERE kategori_produk = 'anak'";
							} else if ($kat == "pria"){
								$querySQL .= " WHERE kategori_produk = 'pria'";
							} else {
								$querySQL .= " WHERE kategori_produk = 'wanita'";
							}
						}
						else if(isset($_GET['by'])) {
							$by = $_GET['by'];
							if($by == "harga_produk") {
								$querySQL .= " ORDER BY harga_produk";
							}
							else {
								$querySQL .= " ORDER BY nama_produk";
							}
						} 
						else {
							$querySQL .= " ORDER BY rand()";
						}
						$ambil=mysqli_query($koneksi, $querySQL);?>
						<?php while($perproduk=mysqli_fetch_array($ambil)) { ;?>
						<div class="col-lg-3 col-md-6">
							<div class="single-product">
								<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" width="200px" height="200px" alt="">
								<div class="product-details">
									<h6><?php echo $perproduk['nama_produk']; ?></h6>
									<div class="price">
										<h6>Rp. <?php echo number_format($perproduk['harga_produk']);?></h6>
									</div>
									<h6>Supplier : <a href="index.php?laman=profil_supplier&id=<?php echo $perproduk['id_pengguna']; ?>"><?php echo $perproduk['nama'];?></a></h6>
									<div class="prd-bottom">
										<a href="index.php?laman=beli&id=<?php echo $perproduk['id_produk']; ?>&id_supplier=<?= $perproduk['id_supplier'] ?>" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">Tambah</p>
										</a>
										<a href="index.php?laman=detail_produk&id_produk=<?php echo $perproduk["id_produk"]; ?>" class="social-info">
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
			</div>
		<!-- end product Area -->
		</section>
		<?php include 'footer.php'; ?>