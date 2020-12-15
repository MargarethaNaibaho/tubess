<?php
error_reporting(0);
session_start();
//mendapatkan id produk dari url
$id_produk = $_GET['id'];
$id_supplier = $_GET['id_supplier'];

//jika suda ada produk di keranjang, maka produk itu jumlahnya +1
//selain itu (belum ada di keranjang), maka produk dianggap dibeil 1
if ($_SESSION['supplier_awal'] != $id_supplier && isset($_SESSION['supplier_awal']) && !empty($_SESSION['keranjang'])){
	echo "<script>alert('Pilih supplier yang sama');</script>";
	echo "<script>location='index.php'</script>";
}
else if(isset($_SESSION['keranjang'][$id_produk])) {
	$_SESSION['keranjang'][$id_produk]+=1;
}
else {
	$_SESSION['keranjang'][$id_produk] = 1;
	$_SESSION['supplier_awal'] = $id_supplier;
}

//echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

//larika ke keranjang
echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='index.php?laman=keranjang'</script>";
?>