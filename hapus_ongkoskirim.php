<?php

$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query ("DELETE FROM ongkir WHERE id_ongkir='$_GET[id]'");

echo "<script>alert('Tarif Terhapus');</script>";
echo "<script>location='index_supplier.php?halaman=ongkoskirim_supplier';</script>";

?>