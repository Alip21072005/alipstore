-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2025 at 04:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkedai`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(3) NOT NULL,
  `namakategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`) VALUES
(1, 'Alat Musik');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(3) NOT NULL,
  `namaproduk` varchar(100) NOT NULL,
  `harga` int(6) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `idkategori` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `namaproduk`, `harga`, `gambar`, `deskripsi`, `status`, `idkategori`) VALUES
(1, 'gitar', 700000, 'produk_1766046317.jpg', '<p>Menggunakan perpaduan mewah antara <strong>Solid Sitka Spruce</strong> untuk bagian depan dan <strong>East Indian Rosewood</strong> untuk bagian belakang dan samping.</p>\r\n', 1, 1),
(2, 'suling', 200000, 'produk_1766046544.jpg', '<p>Rasakan kemurnian suara dari bambu pilihan terbaik. Suling kami dibuat dengan ketelitian tangan para pengrajin ahli, menghasilkan nada yang <strong>bulat, merdu, dan akurat</strong>. Cocok untuk Anda yang ingin mendalami musik tradisional atau sekadar mencari ketenangan melalui alunan nada organik.</p>\r\n', 1, 1),
(3, 'cajon', 250000, 'produk_1766046690.jpg', '<p>Lagi ngumpul bareng temen tapi merasa ada yang kurang? Lengkapi momen akustikan kamu dengan <strong>[Nama Brand] Cajon</strong>! Nggak perlu ribet bawa drum set besar, cukup bawa &#39;kotak ajaib&#39; ini, dan kamu siap jadi pusat perhatian.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Suara Bass Mantap:</strong> Gak cuman asal bunyi, suara <em>low</em>-nya nendang banget!</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Crispy Snare:</strong> Efek <em>snare</em> yang garing, bikin tempo musik makin hidup.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Desain Ergonomis:</strong> Nyaman diduduki berjam-jam tanpa pegal.</p>\r\n	</li>\r\n</ul>\r\n', 1, 1),
(4, 'piano', 3500000, 'produk_1766046897.jpg', '<p>Sebuah piano bukan sekadar instrumen, ia adalah warisan. Piano Upright kami menawarkan resonansi kayu alami yang tidak bisa digantikan oleh teknologi digital manapun. Dibuat dengan presisi tinggi untuk menghasilkan harmoni yang sempurna.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Material Premium:</strong> Papan suara (<em>soundboard</em>) dari kayu Spruce pilihan untuk resonansi maksimal.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Durabilitas:</strong> Rangka besi cor yang kokoh, menjamin kestabilan nada hingga puluhan tahun.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Sentuhan Artistik:</strong> Finishing <em>Polished Ebony</em> yang memukau, mempercantik estetika interior rumah Anda.</p>\r\n	</li>\r\n</ul>\r\n', 1, 1),
(5, 'biola', 1000000, 'produk_1766047118.jpg', '<p>Lagi cari biola pertama untuk sekolah atau hobi? Jangan sampai salah pilih! Biola <strong>[Nama Produk/Merk]</strong> dirancang khusus agar pemula bisa menghasilkan nada yang jernih dengan lebih mudah.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Setup Profesional:</strong> Jarak senar sudah diatur pas, jari nggak bakal cepat sakit!</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Suara Stabil:</strong> <em>Pegs</em> (pemutar) yang pakem, biola jadi nggak gampang fals.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Paket Lengkap:</strong> Sudah termasuk Hardcase, Bow (penggesek), Rosin, dan Shoulder Rest. Tinggal main!</p>\r\n	</li>\r\n</ul>\r\n', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(3) NOT NULL,
  `namauser` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `namauser`, `username`, `password`) VALUES
(1, 'user', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
