<?php

$ambil = $koneksi->query("SELECT * FROM user WHERE id_pengguna='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query ("DELETE FROM produk WHERE id_produk='$_GET[id]'");

echo "<script>alert('Produk Terhapus');</script>";
echo "<script>location='index_admin.php?halaman=supplier';</script>";

?>