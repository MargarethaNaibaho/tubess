<?php
session_start();
if (!isset($_SESSION["pelanggan"])) {
echo"<script>alert ('Silahkan Login Terlebih Dahulu')</script>";
echo"<script>location='login.php'</script>";
}
$id_pelanggan = $_GET['id_pengguna'];
//koneksi ke database
include 'koneksi.php';
error_reporting(0);
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
		<title><?php echo $_SESSION['pelanggan']['nama']; ?></title>
	</head>
	<body>
		<?php include 'menu1.php'; ?>
		<section class="banner-area organic-breadcrumb">
			<div class="container">
				<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
					<div class="col-first">
						<h2><b>< > &nbsp;&nbsp;</b>Profil Pelanggan<b> &nbsp;&nbsp;< ></b></h2><h2>________________</h2>
					</div>
				</div>
			</div>
		</section>
		<?php $ambil = mysqli_query($koneksi, "SELECT * FROM user WHERE id_pengguna='$id_pelanggan'"); ?>
		<?php $pecah = mysqli_fetch_array($ambil); ?>
	<br><br>
	<form method="post" class="form-horizontal">
	<div class="container">
		<table class="table">
			<tr>
				<td><label for="username">Username: </label></td>
				<td><input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username" value="<?php echo $pecah['username'] ?>"></td>
			</tr>
			<tr>
				<td>Nama: </td>
				<td><input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="<?php echo $pecah['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type="email" class="form-control" id="email" placeholder="Masukkan Email" name="email" value="<?php echo $pecah['email'] ?>"></td>
			</tr>
			<tr>
				<td>Nomor Telepon: </td>
				<td><input type="number" class="form-control" id="nomor" placeholder="Masukkan Nomor Telepon" name="nomor" value="<?php echo $pecah['nomor_telepon'] ?>"></td>
			</tr>
			<tr>
				<td>Provinsi: </td>
				<td><input type="text" class="form-control" id="provinsi" placeholder="Masukkan Provinsi" name="provinsi" value="<?php echo $pecah['provinsi'] ?>"></td>
			</tr>
			<tr>
				<td>Kota: </td>
				<td><input type="text" class="form-control" id="kota" placeholder="Masukkan Kota" name="kota" value="<?php echo $pecah['kota'] ?>"></td>
			</tr>
			<tr>
				<td>Kecamatan: </td>
				<td><input type="text" class="form-control" id="kecamatan" placeholder="Masukkan Kecamatan" name="kecamatan" value="<?php echo $pecah['kecamatan'] ?>" required></td>
			</tr>
			<tr>
				<td>Alamat: </td>
				<td><textarea id ="alamat" name="alamat" rows="4" cols="40" class="form-control" placeholder="Masukkan Alamat Lengkap" value="<?php echo $pecah['alamat'] ?>"></textarea></td>
			</tr>
			<tr>
				<td>Kode Pos: </td>
				<td><input type="number" class="form-control" id="kodepos" placeholder="Masukkan Kodepos" name="kodepos" value="<?php echo $pecah['kodepos'] ?> required"></td>
			</tr>
			<tr>
				<td colspan="2"><br><center><button type="submit" class="btn btn-warning btn-lg" name="save">Ubah</button></center>
				</td>
			</tr>
		</table>
	</div>
	</form>
	<br><br>
	<?php include 'footer.php'; ?>
<?php
if(isset($_POST["save"])) {

$koneksi->query("UPDATE user SET username='$_POST[username]',nama='$_POST[nama]',email='$_POST[email]',nomor_telepon='$_POST[nomor]',provinsi='$_POST[provinsi]',kota='$_POST[kota]',kecamatan='$_POST[kecamatan]',alamat='$_POST[alamat]',kodepos='$_POST[kodepos]' WHERE id_pengguna='$id_pelanggan'");
echo "<script>alert('Data Berhasil Diubah');</script>";
echo "<script>location = 'index.php';</script>";
}
?>
</body>
</html>