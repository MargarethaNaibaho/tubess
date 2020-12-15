<h2>Tambah Ongkos</h2>
<hr>
<form method="POST">
	<div class="form-group">
		<label>Nama Kota</label>
		<input type="text" class="form-control" name="kota">
	</div>
	<div class="form-group">
		<label>Tarif</label>
		<input type="number" class="form-control" name="tarif">
	</div>
	<br>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 

if(isset($_POST["save"])) {
	$kota = $_POST["kota"];
	$tarif = $_POST["tarif"];
	$koneksi->query("INSERT INTO ongkir (id_supplier, nama_kota, tarif) VALUES ('$_SESSION[supplier]', '$kota', '$tarif') ");
	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<script>location = 'index_supplier.php?halaman=ongkoskirim_supplier';</script>";
}

?>