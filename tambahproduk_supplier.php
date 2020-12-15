<h2>Tambah Produk</h2>
<hr>
<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="col-md-6">
		<label>Berat(Gr)</label>
		<input type="number" class="form-control" name="berat">
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
		<input type="number" class="form-control" name="stok">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" id="konten" name="deskripsi" rows="10"></textarea>
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
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) {
	$nama=$_FILES['foto']['name'];
	$lokasi=$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "foto_produk/".$nama);
	$koneksi->query("INSERT INTO produk(id_supplier,nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,kategori_produk,stok_produk) VALUES ('$_SESSION[supplier]','$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[kategori]','$_POST[stok]')");
	echo "<div class='alert alert-info'>Data Tersimpan</div>";
echo "<script>location = 'index_supplier.php?halaman=produk_supplier';</script>";
}
?>