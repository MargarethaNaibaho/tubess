<h2>Tambah Produk</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Berat(Gr)</label>
		<input type="number" class="form-control" name="berat">
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
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "foto_produk/".$nama);
	$koneksi->query("INSERT INTO produk(nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,kategori_produk) VALUES ('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[kategori]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";

	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}

?>
