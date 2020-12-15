<?php
session_start();
//koneksi ke database
include 'koneksi.php';

if(!isset($_SESSION['admin'])) {
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
    <title>Halaman Admin</title>
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
                <a class="navbar-brand" href="index_admin.php">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">&nbsp; <a href="index_admin.php?halaman=logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a href="index_admin.php"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="index_admin.php?halaman=produk"><i class="fa fa-cubes"></i>Produk</a>
                    </li>
                    <li>
                        <a href="index_admin.php?halaman=konsumen"><i class="fa fa-user"></i>Konsumen</a>
                    </li> 
                    <li>
                        <a href="index_admin.php?halaman=supplier"><i class="fa fa-user"></i>Supplier</a>
                    </li> 
                    <li>
                        <a href="index_admin.php?halaman=komentar"><i class="fa fa-comments"></i>Komentar</a>
                    </li> 
                    <li>
                        <a href="index_admin.php?halaman=logout"><i class="fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                 <?php
                    if (isset($_GET['halaman'])) {
                        if ($_GET['halaman']=="produk") {
                            include 'produk.php';
                            }
                        else if ($_GET['halaman']=="supplier") {
                            include 'supplier.php';
                            }
                        else if ($_GET['halaman']=="pembelian") {
                            include 'pembelian.php';
                            }
                        else if ($_GET['halaman']=="detail") {
                            include 'detail.php';
                    }
                        else if ($_GET['halaman']=="tambahproduk") {
                            include 'tambahproduk.php';
                    }
                        else if($_GET['halaman']=="hapusproduk") {
                            include 'hapusproduk.php';
                    }
                        else if ($_GET['halaman']=="ubahproduk") {
                            include 'ubahproduk.php';
                    }
                        else if ($_GET['halaman']=="logout") {
                            include 'logout_admin.php';
                    }
                        else if ($_GET['halaman']=="komentar") {
                            include 'komentar.php';
                    }
                        else if ($_GET['halaman']=="hapus_komentar") {
                            include 'hapus_komentar.php';
                    }
                        else if ($_GET['halaman']=="pembayaran") {
                            include 'pembayaran_admin.php';
                    }
                        else if ($_GET['halaman']=="konsumen") {
                            include 'konsumen.php';
                    }
                        else if ($_GET['halaman']=="hapus_pelanggan") {
                            include 'hapus_pelanggan.php';
                    }
                        else if ($_GET['halaman']=="supplier") {
                            include 'supplier.php';
                    }
                        else if ($_GET['halaman']=="produk_supplier") {
                            include 'produk_dia.php';
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
