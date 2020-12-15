<?php
include 'koneksi.php';
?>
<?php
$keyword = $_GET["keyword"];
$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM produk JOIN user ON produk.id_supplier=user.id_pengguna WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%' OR harga_produk LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc()) {
	$semuadata[] = $pecah;
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/logoku.png">
		<!-- Author Meta -->
		<meta name="author" content="CodePixar">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<?php include 'assets.php'; ?>
		<?php include 'script.php'; ?>
		<title>Pencarian</title>
	</head>
	<body>
		<?php include 'menu1.php'; ?><br><br><br><br><br><br><br><br>
		<div class="container">
			<h3>Hasil Pencarian : <?php echo $keyword; ?></h3><br><br>
			<?php if (empty($semuadata)): ?>
				<div class="alert alert-danger">Produk <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
			<?php endif ?>
			<div class="row">
				<?php foreach ($semuadata as $key => $value) :?>
				<div class="col-lg-3 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="foto_produk/<?php echo $value['foto_produk']; ?>" width="100px" height="100px" alt="">
								<div class="product-details">
									<h6><?php echo $value['nama_produk']; ?></h6>
									<div class="price">
										<h6>Rp. <?php echo number_format($value['harga_produk']);?></h6>
									</div>
									<h6>Supplier : <a href="profil_supplier.php?id=<?php echo $perproduk['id_pengguna']; ?>"><?php echo $value['nama'];?></a></h6>
									<div class="prd-bottom">
										<a href="beli.php?id=<?php echo $value['id_produk']; ?>&id_supplier=<?= $value['id_supplier'] ?>" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">Tambah</p>
										</a>
										<a href="detail_produk.php?id=<?php echo $value["id_produk"]; ?>" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">Detail</p>
										</a>
									</div>
								</div>
							</div>
						</div>
				<?php endforeach ?>
			</div>
		</div>
		<?php include 'footer.php'; ?>
	</body>
</html>