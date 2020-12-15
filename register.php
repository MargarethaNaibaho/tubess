<?php
include 'koneksi.php';
$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$konfirm_password = $_POST['konfirm_password'];
$email = $_POST['email'];
$nomor = $_POST['nomor'];
$provinsi = $_POST['provinsi'];
$kota = $_POST['kota'];
$kecamatan = $_POST['kecamatan'];
$alamat = $_POST['alamat'];
$kodepos = $_POST['kodepos'];
$query1 = "SELECT username FROM user where username = '$username'";
$data = mysqli_query($koneksi,$query1);
if(isset($_POST['regisuser'])){
	if($password == $konfirm_password){
	if(mysqli_num_rows($data) > 0){
		echo "<script>alert('Username telah terdaftar');</script>";
		echo "<script>location = 'index.php';</script>";
	}
	else{
		$password=sha1($password);
		$query2 = "INSERT INTO user(username,password,nama,email,nomor_telepon,provinsi,kota,kecamatan,alamat,kodepos,level)
		VALUES('$username','$password','$nama','$email','$nomor','$provinsi','$kota','$kecamatan','$alamat','$kodepos',3)";
		mysqli_query($koneksi,$query2);
		echo "<script>alert('Registrasi Berhasil');</script>";
		echo "<script>location = 'index.php';</script>";
	}
}
else{
	echo "<script>alert('Konfirmasi Password tidak sesuai');</script>";
	echo "<script>location = 'index.php';</script>";
}
}
else if(isset($_POST['regissupplier'])){
	if($password == $konfirm_password){
	if(mysqli_num_rows($data) > 0){
		echo "<script>alert('Username telah terdaftar');</script>";
		echo "<script>location = 'index.php';</script>";
	}
	else{
		$password=sha1($password);
		$query2 = "INSERT INTO user(username,password,nama,email,nomor_telepon,provinsi,kota,kecamatan,alamat,kodepos,level)
		VALUES('$username','$password','$nama','$email','$nomor','$provinsi','$kota','$kecamatan','$alamat','$kodepos',2)";
		mysqli_query($koneksi,$query2);
		echo "<script>alert('Registrasi Berhasil');</script>";
		echo "<script>location = 'index.php';</script>";
	}
}
else{
	echo "<script>alert('Konfirmasi Password tidak sesuai');</script>";
	echo "<script>location = 'index.php';</script>";
}
}

?>