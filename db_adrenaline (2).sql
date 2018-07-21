-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Jul 2018 pada 14.11
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_adrenaline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `warna` varchar(15) NOT NULL,
  `bahan` varchar(15) NOT NULL,
  `M` int(5) NOT NULL,
  `L` int(5) NOT NULL,
  `XL` int(5) NOT NULL,
  `XXL` int(5) NOT NULL,
  `XXXL` int(5) NOT NULL,
  `harga` int(8) NOT NULL,
  `diskon` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=armscii8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_user`, `foto`, `nama_barang`, `warna`, `bahan`, `M`, `L`, `XL`, `XXL`, `XXXL`, `harga`, `diskon`) VALUES
(8, 561, 'black.jpg', 'Black Adrenaline', 'Biru', 'Jeans', 0, 11, 0, 0, 0, 300000, 0),
(11, 1, 'j1.jpg', 'jaket black-blue', 'Hitam', 'Jeans', 0, 11, 0, 0, 0, 300000, 0),
(18, 561, 'black-grey.jpg', 'jaket black-grey adr', 'Hitam-Abu-abu', 'Kain', 0, 30, 0, 0, 0, 350000, 15),
(19, 561, 'j1.jpg', 'jaket black-blue ADR', 'Hitam-Biru', 'Kain', 50, 50, 40, 30, 30, 300000, 30),
(20, 562, 'black-blue01.jpg', 'jaket black-blue ADR', 'Hitam-Biru', 'Kain', 20, 20, 20, 20, 20, 300000, 15),
(21, 561, 'j2.jpg', 'Jaket Dilan', 'Biru', 'Jeans', 1, 1, 1, 1, 1, 300000, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `total_harga` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesan`
--

CREATE TABLE IF NOT EXISTS `pemesan` (
`id_pemesan` int(11) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `jenis_k` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `telepon` varchar(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=armscii8;

--
-- Dumping data untuk tabel `pemesan`
--

INSERT INTO `pemesan` (`id_pemesan`, `Nama`, `jenis_k`, `alamat`, `provinsi`, `kota`, `kode_pos`, `email`, `password`, `telepon`) VALUES
(11, 'a', 'Laki-laki', 'n', 'Banten', 'KABUPATEN SERANG', '1', 'b', '', '2'),
(12, '', 'Laki-laki', '', '', '', '', '', '', ''),
(13, 'mrifqim', 'Laki-laki', 'cimahi', 'Jawa Barat', 'KOTA CIMAHI', '44251', 'akuanakke1@aol.com', '', '085717969046'),
(15, 'andre', 'Laki-laki', 'bandung', 'jabar', 'bandung', '40615', 'andi@yahoo.com', '793fa91849a16094f3eb989ce8a257', '0987588585758'),
(16, 'adelia', '', 'bandung', 'JAWA BARAT', 'BANDUNG', '40615', 'aa@gmail.com', 'aaaa', '081563291353');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `role` enum('Admin','Petugas Barang','Petugas Penjualan') DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `alamat` text,
  `tanggal_lahir` date DEFAULT NULL,
  `kontak` varchar(13) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=564 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `role`, `jenis_kelamin`, `alamat`, `tanggal_lahir`, `kontak`, `username`, `password`) VALUES
(1, 'Admin', 'Admin', 'L', 'Bandung', '2018-05-05', '0821443188911', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(5, 'Lala Karmela', '', 'P', 'Jln.Sakeloa Utara No 40 C', '2018-01-20', '08297789669', 'Lala', '4d13fcc6eda389d4d679602171e11593eadae9b9'),
(561, 'andi', 'Petugas Barang', 'L', 'sdgdg', '2018-05-12', '0859359539599', 'andi', 'dbd122ef7b6a09ffecf5db9c9296320f3c94e707'),
(562, 'maria', 'Petugas Penjualan', 'P', 'bandung', '2018-05-03', '085643224589', 'maria', 'e21fc56c1a272b630e0d1439079d0598cf8b8329'),
(563, 'dfd', '', 'L', 'fff', '2018-07-07', '535353', 'ff', 'e579b508b38723e228b2984136b61b27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id_barang`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
 ADD PRIMARY KEY (`id_pembayaran`), ADD KEY `id_pemesan` (`id_pemesan`), ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
 ADD PRIMARY KEY (`id_pemesan`), ADD KEY `kota` (`kota`), ADD KEY `provinsi` (`provinsi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
MODIFY `id_pemesan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=564;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pemesan`) REFERENCES `pemesan` (`id_pemesan`),
ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
