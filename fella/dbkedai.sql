-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2025 pada 05.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(3) NOT NULL,
  `namakategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
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
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `namaproduk`, `harga`, `gambar`, `deskripsi`, `status`, `idkategori`) VALUES
(1, 'Donat', 5000, 'produk1766113487.jpg', '<p>Donat labu dan kentang dengan ribuan variasi yang nikmat</p>\r\n', 1, 1),
(2, 'cake coklat', 25000, 'produk1766113797.jpg', '<p>cake coklat yang nyoklat banget</p>\r\n', 1, 1),
(3, 'tiramisu', 30000, 'produk1766114342.jpg', '<p>tiramisu yang ngopi banget</p>\r\n', 1, 1),
(4, 'Macchiato', 25000, 'produk1766114557.jpg', '<p>caramel macchiato yang ngaramel banget</p>\r\n', 1, 2),
(5, 'Dopion', 18000, 'produk1766114902.jpg', '<p>kopi hitam tanpa gula yang sanggat cocock untuk anda yang sakit hati biar sakit lambung sekalian</p>\r\n', 1, 2),
(6, 'Americano', 15000, 'produk1766115233.jpg', '<p>kopi hitam pahit tanpa gula yang cocok untuk penderita maag (disarankan minta 10 shot)</p>\r\n', 1, 2),
(7, 'Latte', 20000, 'produk1766115311.jpg', '<p>coffe latte yang ngelatte banget</p>\r\n', 1, 2),
(8, 'Slow Drip Coffee', 25000, 'produk1766160336.jpg', '<p>kopi yang disajikan dengan cara yang berbeda, cocok untuk anda yang kesabarannya setipis tisu dibagi 7 (Tapi jika anda orang yang penyabar ini cocok)</p>\r\n', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(3) NOT NULL,
  `namauser` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `namauser`, `username`, `password`) VALUES
(1, 'fella', 'fella', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
