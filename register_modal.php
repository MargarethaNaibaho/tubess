<?php
session_start();
include 'koneksi.php';
error_reporting(0);
?>

<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="index.php?laman=login">Login/</a><a href="index.php?laman=register_modal">Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section><br>
<form action="register.php" method="post" class="form-horizontal">
<center><h2><b>< > &nbsp;&nbsp;</b>Registrasi</h2><b>------------------------------------------------</b></center><br>
<div class="container">
	<table class="table">
		<tr>
			<td><label for="username">Username: </label></td>
			<td><input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username" required></td>
		</tr>
		<tr>
			<td>Nama: </td>
			<td><input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" required></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password" required></td>
		</tr>
		<tr>
			<td>Konfirmasi Password: </td>
			<td><input type="password" class="form-control" id="konfirm_password" placeholder="Masukkan Konfirmasi Password" name="konfirm_password" required></td>
		</tr>
		<tr>
			<td>Email: </td>
			<td><input type="email" class="form-control" id="email" placeholder="Masukkan Email" name="email" required></td>
		</tr>
		<tr>
			<td>Nomor Telepon: </td>
			<td><input type="number" class="form-control" id="nomor" placeholder="Masukkan Nomor Telepon" name="nomor" required></td>
		</tr>
		<tr>
			<td>Provinsi: </td>
			<td><input type="text" class="form-control" id="provinsi" placeholder="Masukkan Provinsi" name="provinsi" required></td>
		</tr>
		<tr>
			<td>Kota: </td>
			<td><input type="text" class="form-control" id="kota" placeholder="Masukkan Kota" name="kota" required></td>
		</tr>
		<tr>
			<td>Kecamatan: </td>
			<td><input type="text" class="form-control" id="kecamatan" placeholder="Masukkan Kecamatan" name="kecamatan" required></td>
		</tr>
		<tr>
			<td>Alamat: </td>
			<td><textarea id ="alamat" name="alamat" rows="4" cols="40" class="form-control" placeholder="Masukkan Alamat Lengkap" required></textarea></td>
		</tr>
		<tr>
			<td>Kode Pos: </td>
			<td><input type="number" class="form-control" id="kodepos" placeholder="Masukkan Kodepos" name="kodepos" required></td>
		</tr>
		<tr>
			<td colspan="2"><center><br>
				<button type="submit" class="btn btn-primary" name="regisuser">&nbsp;&nbsp;Daftar Sebagai User&nbsp;&nbsp;</button>&nbsp;&nbsp;atau&nbsp;
				<button type="submit" class="btn btn-warning" name="regissupplier">Daftar Sebagai Supplier</button></center>
			</td>
		</tr>
	</table>
</div>
</form>
<br><br><br>
<?php include 'footer.php'; ?>