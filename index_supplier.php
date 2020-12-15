<?php
session_start();
//koneksi ke database
include 'koneksi.php';

if(!isset($_SESSION['supplier'])) {
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php'</script>";
    header('location:login.php');
    exit();
}

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Supplier</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <script src="ckeditor/ckeditor.js"></script>

   <script src="assets/js/sweetalert2.all.min.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index_supplier.php">Supplier</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;s
float: right;
font-size: 16px;">&nbsp; <a href="index_supplier.php?halaman=logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a href="index_supplier.php"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="index_supplier.php?halaman=produk_supplier"><i class="fa fa-cubes"></i>Produk</a>
                    </li>
                    <li>
                        <a href="index_supplier.php?halaman=ongkoskirim_supplier"><i class="fa fa-cubes"></i>Ongkos Kirim</a>
                    </li>
                    <li>
                        <a href="index_supplier.php?halaman=pelanggan_supplier"><i class="fa fa-user"></i>Pelanggan</a>
                    </li>
                    <li>
                        <a href="index_supplier.php?halaman=laporan"><i class="fa fa-file"></i>Laporan</a>
                    </li>   
                    <li>
                        <a href="index_supplier.php?halaman=komentar_supplier"><i class="fa fa-comments"></i>Komentar</a>
                    </li> 
                    <li>
                        <a href="index_supplier.php?halaman=logout"><i class="fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                 <?php
                    if (isset($_GET['halaman'])) {
                        if ($_GET['halaman']=="produk_supplier") {
                            include 'produk_supplier.php';
                    }
                        else if ($_GET['halaman']=="pelanggan_supplier") {
                            include 'pelanggan_supplier.php';
                    }
                        else if ($_GET['halaman']=="detail_pembelian") {
                            include 'detail_pembelian.php';
                    }
                        else if ($_GET['halaman']=="tambahproduk_supplier") {
                            include 'tambahproduk_supplier.php';
                    }
                        else if($_GET['halaman']=="hapusproduk_supplier") {
                            include 'hapusproduk_supplier.php';
                    }
                        else if ($_GET['halaman']=="ubahproduk_supplier") {
                            include 'ubahproduk_supplier.php';
                    }
                        else if ($_GET['halaman']=="logout") {
                            include 'logout_admin.php';
                    }
                        else if ($_GET['halaman']=="komentar_supplier") {
                            include 'komentar_supplier.php';
                    }
                        else if ($_GET['halaman']=="hapus_komentar") {
                            include 'hapus_komentar.php';
                    }
                        else if ($_GET['halaman']=="pembayaran_supplier") {
                            include 'pembayaran_supplier.php';
                        }
                         else if ($_GET['halaman']=="laporan") {
                            include 'laporan_pembelian.php';
                        }
                        else if ($_GET['halaman']=="ongkoskirim_supplier") {
                            include 'ongkoskirim_supplier.php';
                        }
                        else if ($_GET['halaman']=="hapus_ongkoskirim") {
                            include 'hapus_ongkoskirim.php';
                        }
                        else if ($_GET['halaman']=="hapus_ongkoskirim") {
                            include 'hapus_ongkoskirim.php';
                        }
                        else if ($_GET['halaman']=="tambah_ongkos") {
                            include 'tambah_ongkos.php';
                        }

                }
                    else {
                      include 'home.php';
                }
                 ?>
                </div>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
