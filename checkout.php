<?php
session_start();
include 'koneksi.php';
//jika tidak ada session pelanggan(belum login) maka dilarikan ke login.php
if (!isset($_SESSION["pelanggan"])) {
echo"<script>alert ('Silahkan Login Terlebih Dahulu')</script>";
echo"<script>location='index.php?laman=login'</script>";
}
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
echo "<script>alert('Keranjang Anda Kosong. Silahkan Belanja Terlebih Dahulu');</script>";
echo "<script>location = 'index.php'; </script>";
}
$id_supplier = $_GET["id_supplier"];
?> 
<br><br><br><br><br><br><br>
		<section class="konten">
			<div class="container">
				<h1><b>< > &nbsp;&nbsp;</b>Checkout</h1>
				<hr>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Produk</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Sub Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor=1;?>
						<?php $totalbelanja=0; ?>
						<?php foreach($_SESSION["keranjang"] as $id_produk=> $jumlah): ?>
						<!--menampilkan produk yang sedang diperulangkan bera=dasarkan id_produk-->
						<?php
						$pecah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'"));
						$stok_terjual = $pecah["stok_terjual"]+$jumlah;
						$subharga = $pecah["harga_produk"]*$jumlah;
						?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah["nama_produk"]; ?></td>
							<td>Rp. <?php echo number_format($pecah["harga_produk"]);?></td>
							<td><?php echo $jumlah; ?></td>
							<td>Rp. <?php echo number_format($subharga); ?></td>
						</tr>
						<?php $nomor++; ?>
						<?php $totalbelanja += $subharga; ?>
						<?php endforeach ?>
					</tbody>
					<tfoot>
					<tr>
						<th colspan="4">Total Belanja</th>
						<th>Rp. <?php echo number_format($totalbelanja); ?></th>
					</tr>
					</tfoot>
				</table><hr>
				<form method="POST">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama'] ?>" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nomor_telepon'] ?>" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<select class="form-control" name="id_ongkir">
								<option value="">Pilih Ongkos Kirim</option>
								<?php
								$ambil = mysqli_query($koneksi, "SELECT * FROM ongkir WHERE id_supplier = '$id_supplier'");
								while($perongkir = mysqli_fetch_array($ambil)) {
								?>
								<option value="<?php echo $perongkir["id_ongkir"] ?>" required>
									<?php echo $perongkir['nama_kota'] ?> - Rp. <?php echo number_format($perongkir['tarif']) ?>
								</option>
								<?php } ?>
							</select>
						</div>
					</div><hr>
					<div class="form-group">
						<label>Alamat Lengkap Pengiriman</label>
						<textarea class="form-control" name="alamat_pengiriman" placeholder="Masukkan alamat lengkap pengiriman (termasuk kode pos)" required></textarea>
					</div>
					<button class="btn btn-primary" name="checkout">Checkout</button>
				</form>
				<?php
				if(isset($_POST["checkout"] )) {
					$id_pelanggan = $_SESSION["pelanggan"]["id_pengguna"];
					$id_ongkir = $_POST["id_ongkir"];
					$tanggal_pembelian = date("Y-m-d");
					$alamat_pengiriman = $_POST['alamat_pengiriman']; 
					$id_supplier = $_SESSION['supplier_awal'];
					$ambil = mysqli_query($koneksi, "SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
					$arrayongkir = mysqli_fetch_array($ambil);
					$nama_kota = $arrayongkir['nama_kota'];
					$tarif = $arrayongkir['tarif'];
					$total_pembelian = $totalbelanja + $tarif;
					//menyimpan data ke tabel pembelian
					$koneksi->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, id_supplier, tanggal_pembelian, total_pembelian, nama_kota, tarif, alamat_pengiriman) VALUES ('$id_pelanggan', '$id_ongkir', '$id_supplier', '$tanggal_pembelian', '$total_pembelian', '$nama_kota', '$tarif', '$alamat_pengiriman')");
					$id_pembelian_barusan = $koneksi->insert_id;
					foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
						//mendaptkan data produk berdasarkan id_produk
						$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'");
						$perproduk = mysqli_fetch_array($ambil);
						$nama = $perproduk['nama_produk'];
						$harga = $perproduk['harga_produk'];
						$berat = $perproduk['berat_produk'];
						$subberat = $perproduk['berat_produk']*$jumlah;
						$subharga = $perproduk['harga_produk']*$jumlah;
						$koneksi->query("INSERT INTO pembelian_produk(id_pembelian, id_produk, nama, harga, berat, subberat, subharga, jumlah) VALUES ('$id_pembelian_barusan', '$id_produk', '$nama', '$harga', '$berat', '$subberat', '$subharga', '$jumlah')");
						//skrip update stok
						$koneksi->query("UPDATE produk SET stok_produk = stok_produk - $jumlah WHERE id_produk = '$id_produk'");
					}
					//mengkosongkan keranjang belanja
					unset($_SESSION["keranjang"]);
					//tampilan diaihkan ke halaman nota dari pembelian barusan
				echo "<script>alert('Pembelian Sukses!');</script>";
				echo "<script>location = 'index.php?laman=nota&id=$id_pembelian_barusan';</script>";
				}
				
				?>
			</div>
		</section>
		<?php include 'footer.php'; ?>