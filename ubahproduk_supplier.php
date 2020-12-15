<h2>Ubah Produk</h2>
<?php

$ambil=mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=mysqli_fetch_array($ambil);

?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
	</div>
	<div class="col-md-6">
		<label>Berat</label>
		<input type="number" name="berat" class="form-control" value="<?php echo $pecah['berat_produk']; ?>">
	</div>
	<div class="col-md-6">
		<label>Kategori Produk</label>
		<select class="form-control" name="kategori">
			<option value="">Pilih Kategori</option>
			<option value="anak">Anak-anak</option>
			<option value="wanita">Wanita</option>
			<option value="pria">Pria</option>
		</select>
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok_produk'] ?>">
	</div>
	<div class="form-group">
		<img src="foto_produk/<?php echo $pecah['foto_produk'];?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label>Deksripsi</label>
		<textarea name="deskripsi" class="form-control" id="konten"rows="10">
			<?php echo $pecah['deskripsi_produk'];?>
		</textarea>
		<script>
                        ClassicEditor
                                .create( document.querySelector( '#konten' ) )
                                .then( konten => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if(isset($_POST['ubah'])) {
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];

	if(!empty($lokasifoto)) {
			move_uploaded_file($lokasifoto, "foto_produk/$namafoto");

			$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]',kategori_produk='$_POST[kategori]',stok_produk='$_POST[stok]' WHERE id_produk='$_GET[id]'");
	}
	else {
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',deskripsi_produk='$_POST[deskripsi]',kategori_produk='$_POST[kategori]',stok_produk='$_POST[stok]'  WHERE id_produk='$_GET[id]'");
	}
	echo "<script>alert('Data Produk Telah Diubah');</script>";
	echo "<script>location='index_supplier.php?halaman=produk_supplier';</script>";
}
?>