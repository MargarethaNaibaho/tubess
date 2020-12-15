<?php

$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = mysqli_fetch_array($ambil);
$fotoproduk = $pecah['foto_produk'];
if (file_exists("foto_produk/$fotoproduk")) {
	unlink ("foto_produk/$fotoproduk");
}

$koneksi->query ("DELETE FROM produk WHERE id_produk='$_GET[id]'");

echo "<script>alert('Produk Terhapus');</script>";
echo "<script>location='index_admin.php?halaman=produk';</script>";

?>