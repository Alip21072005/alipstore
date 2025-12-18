-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2025 pada 18.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `namaadmin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `namaadmin`, `username`, `password`, `telpon`, `admin_email`) VALUES
(1, 'admin toko', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '082323322', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(10) NOT NULL,
  `namakategori` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`) VALUES
(13, 'Coffee & Drink'),
(14, 'Cemilan'),
(16, 'Makanan Berat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL,
  `kategori` enum('Coffee','Makanan Berat','Cemilan') DEFAULT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`idmenu`, `kategori`, `nama_menu`, `harga`, `foto`) VALUES
(9, 'Coffee', 'Vanilla Latte', 15000, 'Vanilla Latte.jpg'),
(11, 'Coffee', 'Matcha Green Tea Latte', 20000, 'Matcha Green Tea Latte2.jpg'),
(12, 'Coffee', 'Java Chip Frappuccino', 27000, 'Java Chip Frappuccino2.jpg'),
(13, 'Coffee', 'Cold Brew', 18000, 'Cold Brew.jpg'),
(14, 'Coffee', 'Caramel Frappucino', 17000, 'Caramel Frappuccino2.jpg'),
(15, 'Cemilan', 'Almond Croissant', 19000, 'Almond Croissant 2.jpg'),
(16, 'Cemilan', 'Banana Cake', 22000, 'Banana Cake2.jpg'),
(17, 'Cemilan', 'Beef Puff', 22000, 'Beef Puff.jpg'),
(18, 'Cemilan', 'Blueberry Muffin', 24000, 'Blueberry Muffin.jpg'),
(19, 'Cemilan', 'Chocolate Croissant', 26000, 'Chocolate Croissant2.jpg'),
(20, 'Cemilan', 'Cinnamon Roll2.jpg', 16000, 'Cinnamon Roll2.jpg'),
(21, 'Cemilan', 'Croissant Butter', 25000, 'Croissant Butter 2.jpg'),
(22, 'Cemilan', 'Smoked Beef Quiche', 25000, 'Smoked Beef Quiche2.jpg'),
(23, 'Cemilan', 'New York Cheesecake', 32000, 'New York Cheesecake2.jpg'),
(26, 'Coffee', 'Java Chip Frappuccino', 24000, 'Java Chip Frappuccino.jpg'),
(27, 'Makanan Berat', 'Cap Cay Seafood', 35000, 'Cap Cay Seafood.jpg'),
(28, 'Makanan Berat', 'Chicken Cordon Bleu', 32000, 'Chicken Cordon Bleu.jpg'),
(31, 'Makanan Berat', 'Nasi Goreng Seafood', 42000, 'Nasi Goreng Seafood.jpg'),
(32, 'Makanan Berat', 'Nasi Goreng Bebek Cabe Ijo', 42000, 'Nasi Goreng Bebek Cabe Ijo.jpg'),
(33, 'Makanan Berat', 'Nasi Goreng Bebek Cabe Ijo', 38000, 'Mie Goreng Sapi.jpg'),
(34, 'Makanan Berat', 'Nasi Sapo Tahu Sapi', 46000, 'Nasi Sapo Tahu Sapi.jpg'),
(35, 'Coffee', 'Mocha Frappuccino', 19000, 'Mocha Frappuccino.jpg'),
(36, 'Coffee', 'Caramel Macchiato', 27000, 'Caramel Macchiato2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `namaproduk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `idkategori`, `namaproduk`, `harga`, `deskripsi`, `gambar`, `status`, `tanggal`) VALUES
(9, 13, 'americano caffe', 13000, '', 'produk1766064370.jpg', 1, '2025-12-18 13:26:10'),
(10, 14, 'Almond Croissant', 23000, '', 'produk1766064442.jpg', 1, '2025-12-18 13:27:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
