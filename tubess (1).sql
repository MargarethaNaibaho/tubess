-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2020 pada 15.54
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubess`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(10) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `komentar`, `nama`, `id_produk`, `id_supplier`, `nama_produk`, `nilai`) VALUES
(54, 'cantik', 'test1', 20, 16, 'Adidas 4dOnix ', 3),
(55, 'asik', 'test2', 20, 16, 'Adidas 4dOnix ', 3),
(56, 'Blablabla', 'test1', 21, 16, 'Adidas Ultraboost Woodwood 1.0 ', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_kota` varchar(200) NOT NULL,
  `tarif` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `id_supplier`, `nama_kota`, `tarif`) VALUES
(5, 16, 'Medan', 32000),
(7, 16, 'Jakarta', 23000),
(8, 18, 'Padang', 12000),
(9, 18, 'Bandung', 12000),
(10, 18, 'Medan', 120);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(7, 31, 'test1', 'mandiri', 12732000, '2020-01-13', '202001130449512.jpg'),
(8, 33, 'jv', 'mandiri', 36932000, '2020-01-13', '20200113052447image005.jpg'),
(9, 35, 'MARTHA', 'MANDIRI', 25432000, '2020-01-16', '20200116050252image065.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_supplier`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(31, 21, 16, 5, '2020-01-12', 12732000, 'Medan', 32000, 'enwwwwwwwwv', 'Barang Dikirim', '96764thdytv'),
(32, 22, 16, 5, '2020-01-13', 25432000, 'Medan', 32000, 'arehqer', 'Pending', ''),
(33, 26, 16, 5, '2020-01-13', 36932000, 'Medan', 32000, 'ucuccco', 'Sudah kirim pembayaran', ''),
(34, 21, 18, 8, '2020-01-14', 2812000, 'Padang', 12000, 'hgchjc', 'Pending', ''),
(35, 21, 0, 5, '2020-01-16', 25432000, 'Medan', 32000, 'JALAN NURI 12 SIMLAINGKAR\r\n', 'Sudah kirim pembayaran', ''),
(36, 21, 16, 5, '2020-04-16', 12732000, 'Medan', 32000, 'efbe', 'Pending', ''),
(39, 26, 18, 8, '2020-05-01', 2812000, 'Padang', 12000, 'jj', 'Pending', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(45, 31, 20, 1, 'Adidas 4dOnix ', 12700000, 120, 120, 12700000),
(46, 32, 20, 2, 'Adidas 4dOnix ', 12700000, 120, 240, 25400000),
(47, 33, 20, 2, 'Adidas 4dOnix ', 12700000, 120, 240, 25400000),
(48, 33, 21, 1, 'Adidas Ultraboost Woodwood 1.0 ', 11500000, 120, 120, 11500000),
(49, 34, 25, 1, 'Adidas Originals POD-S3.1 Sepatu Olahraga Pria [EE7212]', 2800000, 149, 149, 2800000),
(50, 35, 20, 2, 'Adidas 4dOnix ', 12700000, 120, 240, 25400000),
(51, 36, 20, 1, 'Adidas 4dOnix ', 12700000, 120, 120, 12700000),
(54, 34, 22, 1, 'Adidas Originals Men X_PLR Shoes Sepatu Olahraga Pria [F34037]', 1200000, 120, 120, 1200000),
(55, 34, 21, 1, 'Adidas Ultraboost Woodwood 1.0 ', 11500000, 120, 120, 11500000),
(56, 39, 25, 1, 'Adidas Originals POD-S3.1 Sepatu Olahraga Pria [EE7212]', 2800000, 149, 149, 2800000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `kategori_produk` varchar(50) NOT NULL,
  `stok_produk` int(5) NOT NULL,
  `stok_terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_supplier`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `kategori_produk`, `stok_produk`, `stok_terjual`) VALUES
(20, 16, 'Adidas 4dOnix ', 12700000, 120, 'image001.jpg', '<p>Sesuai Gambar SIZE : 39-43&nbsp;</p><p>KUALITAS : Import Vietnam&nbsp;</p><p>STOK : Ready (limited/terbatas)&nbsp;</p><p>PESAN SEKARANG JUGA (Tulis dalam&nbsp;alamat: warna, dan ukuran)&nbsp;</p><p>Contoh : Order warna hitam foto no 2, size 40</p>', 'pria', 4, 0),
(21, 16, 'Adidas Ultraboost Woodwood 1.0 ', 11500000, 120, 'image003.jpg', '<p>Sepatu 100% Real Pict ( Beda Boleh Dikembalikan ) Size : 39-44&nbsp;</p><p>Kualitas : IMPORT Sudah lengkap dengan Box.&nbsp;</p><p>Untuk order jangan lupa sertakan size dan warna pada kolom alamat. Contoh : size 40 warna hitam</p>', 'pria', 10, 0),
(22, 16, 'Adidas Originals Men X_PLR Shoes Sepatu Olahraga Pria [F34037]', 1200000, 120, 'image005.jpg', '<p>Fitur Produk</p><ul><li>Sepatu olahraga pria</li><li>Didesain trendy sporty</li><li>Dirancang untuk aktivitas sehari-hari</li><li>Memiliki upper tekstil yang dihiasi 3-Stripes</li><li>Bahan kulit imitasi pada sepatu ini memiliki aksen tampilan distress dan worn-in</li></ul><p>PESAN SEKARANG JUGA (Tulis dalam&nbsp;alamat: warna, dan ukuran)&nbsp;</p>', 'pria', 11, 0),
(23, 16, 'Adidas Men Running Cloudfoam Ultimate Shoes [CG5800]', 1200000, 120, 'image007.jpg', '<p>Fitur Produk</p><ul><li>Cloudfoam Ultimate Shoes</li><li>Mengikuti bentuk kaki Anda dengan bagian atas sock-like rajut</li><li>Potongan outsole menonjolkan pola celah pada bantalan cloudfoam</li><li>Menghasilkan kenyamanan tiada tara</li><li>Material :&nbsp;Furing tekstil / Outsole sintetis</li></ul>', 'pria', 12, 0),
(25, 18, 'Adidas Originals POD-S3.1 Sepatu Olahraga Pria [EE7212]', 2800000, 149, 'image011.jpg', '<p>Fitur Produk</p><ul><li>Sepatu olahraga pria</li><li>Desain trendy</li><li>Neat stiching, eyelate dan outsole yang nyaman saat digunakan</li></ul><p>Material : Suede upper</p>', 'pria', 31, 0),
(26, 18, 'Adidas Men Running Ultraboost S&l Shoes[EF2026]', 2800000, 122, 'image013.jpg', '<p>Fitur Produk</p><ul><li>Sepatu olahraga pria</li><li>Desain trendy</li><li>Neat stiching, eyelate dan outsole yang nyaman saat digunakan</li><li>Material : Suede upper</li></ul>', 'pria', 56, 0),
(27, 18, 'Adidas Original EQT Gazelle sepatu Olahrag Wanita[EE5153]', 1500000, 234, 'image017.jpg', '<p>Fitur Produk</p><ul><li>Sepatu olahraga wanita</li><li>Desain trendy</li><li>Neat stiching, eyelate dan outsole yang nyaman saat digunakan</li><li>Material : Synthetic outsole</li></ul>', 'wanita', 20, 0),
(28, 18, 'Adidas Original Superstar Woman Slip on Shoes', 1400000, 432, 'image019.jpg', '<p>Fitur Produk</p><p>Slip on shoes</p><p>Didesain sporty</p><p>Detail neat stitching&nbsp;&nbsp;</p><p>Outsole yang nyaman saat digunakan</p><p>Material : Upper berbahan tekstil</p>', 'wanita', 22, 0),
(29, 18, 'Adidas Fantastic Beasts Sneakers Shoes Pria-Black', 900000, 123, 'image021.jpg', '<p>Fitur Produk</p><ul><li>Sneakers shoes</li><li>Didesain trendy</li><li>Berdetail neat stitching, eyelets</li><li>Outsole kuat, awet, dan nyaman saat digunakan</li><li>Material : Synthetic leather</li></ul>', 'pria', 34, 0),
(30, 17, 'Rimas LID5019 Kuncing Pre-Walker Shoes', 75000, 96, 'image0011.jpg', '<ul><li>Pre-Walker shoes</li><li>Dengan warna abu-abu</li><li>Desain cute</li><li>Bahan empuk</li><li>Nyaman dipakai</li></ul>', 'anak', 22, 0),
(31, 17, 'Rimas LID5019 Motif Anjing Pre-Walker Shoes', 75000, 63, 'image002.jpg', '<p>Fitur Produk</p><ul><li>Pre-Walker shoes</li><li>Dengan tambahan boneka kucing</li><li>Desain cute</li><li>Bahan empuk</li><li>Nyaman dipakai</li></ul>', 'anak', 13, 0),
(32, 17, 'Blackkelly HBH Sepatu Sneakers Anak Laki-Laki', 270000, 56, 'image0031.jpg', '<p>Fitur Produk</p><ul><li>Sneaker</li><li>Didesain trendy</li><li>Detail elayes, round toe</li><li>Outsole yang nyaman pada saat digunakan</li><li>Material : PU kombinasi canvas</li></ul>', 'anak', 12, 0),
(33, 0, '', 0, 0, '', '', '', 0, 1),
(34, 0, '', 0, 0, '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_telepon` int(15) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kodepos` int(5) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_pengguna`, `username`, `password`, `nama`, `email`, `nomor_telepon`, `provinsi`, `kota`, `kecamatan`, `alamat`, `kodepos`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'admin@gmail.com', 0, 'admin', 'admin', 'admin', 'admin', 12345, 1),
(16, 'milpa', 'beb8c625152ebd1fd9132dab802cc83d5b4dacfc', 'Milpa Wahyuni SIregar', 'milpa@gmail.com', 9867665, 'Sumatera Utara', 'Tapanuli Tengah', 'Tapanuli', 'Tapanuli', 20222, 2),
(17, 'margaretha', 'ac1ee8dee0bbf5cfa350c271c8a9013a837d8bc2', 'Margaretha Gok Asi Naibaho', 'margaretha@gmail.com', 8117587, 'Sumatera Utara', 'Medan', 'Medan Tembung', 'Jalan Sering', 20222, 2),
(18, 'dwiki', 'a7d1757677e91c8878439d3c6eeba0e96c0b82bf', 'Dwiki Affandi', 'dwiki@gmail.com', 831341, 'Sumatera Utara', 'Pakam', 'Pakam', 'Pakam', 235112, 2),
(19, 'michael', '17b9e1c64588c7fa6419b4d29dc1f4426279ba01', 'Michael', 'michael@gmail.com', 2147483647, 'Sumatera Utara', 'Medan', 'Medan', 'Medan', 23512, 2),
(20, 'jonathan', '3692bfa45759a67d83aedf0045f6cb635a966abf', 'Brillian Jonathan Tantri', 'jonathan@gmail.com', 3524512, 'Riau', 'Riau', 'Riau', 'Riau', 34622, 2),
(21, 'test1', 'b444ac06613fc8d63795be9ad0beaf55011936ac', 'test1', 'test1@gmail.com', 431616, 'Sumatera Utara', 'Medan', 'Medan', 'Medan', 20222, 3),
(22, 'test2', '109f4b3c50d7b0df729d299bc6f8e9ef9066971f', 'test2', 'test2@gmail.com', 2356352, 'Sumatera Barat', 'Padang', 'Padang', 'awra,wkrnh', 24444, 3),
(23, 'test3', '3ebfa301dc59196f18593c45e519287a23297589', 'test3', 'test3@gmail.com', 24625722, 'Kepulauan Riau', 'Batam', 'Batam Tengah', 'Jalan Hangkasturi', 12425, 3),
(24, 'test4', '1ff2b3704aede04eecb51e50ca698efd50a1379b', 'test4', 'test4@gmail.com', 244416, 'D.K.I. Jakarta', 'Bekasi', 'Bekasi', 'Bekasi ', 12412, 3),
(25, 'test5', '911ddc3b8f9a13b5499b6bc4638a2b4f3f68bf23', 'test5', 'test5@gmail.com', 24414661, 'Kalimantan Barat', 'Samarinda', 'Samarinda', 'Jalan Gatot Kaca', 33525, 3),
(26, 'martha', '10c4b89638b8f2cbb543c5e2401c5dff58eab917', 'martha', 'supersekali@gamail.com', 123456, 'sumatera utara', 'medan', 'medan kota', '', 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
