 <?php
session_start();

include 'koneksi.php';

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
	echo "<script>alert('Keranjang Anda Kosong. Silahkan Belanja Terlebih Dahulu');</script>";
	echo "<script>location = 'index.php'; </script>";
}
?>

<br><br><br><br><br><br><br>
<section class="konten">
	<div class="container">
		<h1><b>< >&nbsp;&nbsp;&nbsp;</b>Keranjang Belanja</h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Sub Harga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody> 
				<?php $nomor=1;?>
				<?php foreach($_SESSION["keranjang"] as $id_produk=> $jumlah): ?>
				<!--menampilkan produk yang sedang diperulangkan bera=dasarkan id_produk--> 
				<?php
				$pecah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'"));
				$subharga = $pecah['harga_produk']*$jumlah;
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_produk"]; ?></td>
					<td>Rp. <?php echo number_format($pecah["harga_produk"]);?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
					<td>
						<a href="index.php?laman=hapuskeranjang&id=<?php echo $id_produk; ?>" class="btn btn-danger btn-xs">Hapus</a>
					</td>
				</tr> 
				<?php $nomor+=1; ?> 
				<?php endforeach ?>
			</tbody>
		</table> 
		<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
		<a href="index.php?laman=checkout&id_supplier=<?php echo $pecah['id_supplier'] ?>" class="btn btn-primary">Checkout</a>
	</div>
</section>
<br><br><br>
<?php include 'footer.php'; ?>