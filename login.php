<?php
include 'koneksi.php';
session_start();
error_reporting(0);
?>
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="index.php?laman=login">Login/</a><a href="index.php?laman=register_modal">Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<a class="primary-btn" href="index.php?laman=register_modal">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Login</h3>
						<form class="row login_form" action="" method="post">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" name="login" class="primary-btn">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
<?php
//jk ada tombol simpan(tombol simpan ditekan)
if(isset($_POST["login"])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$password=sha1($password);

	//..lakukan query ngecek akun di tabel pelangga di dn
	$ambil=mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

	//menghitung akun yang terambil
	$akunyangcocok=mysqli_num_rows($ambil);

	//jika 1 akun yang cocok, maka diloginkan
	if($akunyangcocok>0) {
		//anda suda login
		//mendapatkan akun dalam bentuk array
		$akun = $ambil->fetch_assoc();
		//simpan di session pelanggan
		if($akun['level']=="1") {
			$_SESSION["admin"] = $akun;
			$_SESSION['level'] = "1";
			echo "<script>alert('Anda Sukses Login');</script>";
			echo "<script>location='index_admin.php';</script>";
		}
		else if($akun['level']=="2") {
			$_SESSION["supplier"] = $akun['id_pengguna'];
			$_SESSION['level'] = "2";
			echo "<script>alert('Anda Sukses Login');</script>";
			echo "<script>location='index_supplier.php';</script>";
		}
		else if($akun['level']=="3"){
			$_SESSION["pelanggan"] = $akun;
			$_SESSION['level'] = "3";
			echo "<script>alert('Anda Sukses Login');</script>";
			echo "<script>location = 'index.php'; </script>";
		}
	} 
	else {
		//anda gagal login
		echo "<script>alert('Anda Gagal Login, Periksa Akun Anda');</script>";
		echo "<script>location='index.php?laman=login';</script>";
	}
}
?>
<?php include 'footer.php'; ?>