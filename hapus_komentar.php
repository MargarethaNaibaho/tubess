<?php

$ambil = $koneksi->query("SELECT * FROM komentar WHERE id_komentar='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query ("DELETE FROM komentar WHERE id_komentar='$_GET[id]'");

echo "<script>alert('Komentar Terhapus');</script>";
echo "<script>location='index_admin.php?halaman=komentar';</script>";

?>