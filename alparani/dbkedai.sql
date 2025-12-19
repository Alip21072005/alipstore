-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2025 pada 08.53
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
(1, 'Pewangi'),
(2, 'Parfum');

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
(6, 2, 'Alpha', 500000, '<p><strong><a href=\"https://www.google.com/search?q=HMNS+Perfume&amp;oq=parfum+alpha&amp;gs_lcrp=EgRlZGdlKgYIABBFGDkyBggAEEUYOdIBCDUzMjRqMGoxqAIAsAIA&amp;sourceid=chrome&amp;ie=UTF-8&amp;mstk=AUtExfAvouFUR_lBzBblThdpgTCxwi4RBX20jm4XJewTbMY_v9gLKMekJglHAr40pyJoxYarof06CuBo_sBJWOKPwPl95WuobqMV1ZRUQlXSfCuVKjGl7rmsAb2NMnz6wKuEFsg&amp;csui=3&amp;ved=2ahUKEwiz8qSljsmRAxW3amwGHbixH9UQgK4QegQIARAD\">HMNS Perfume</a></strong>, parfum pria dengan aroma&nbsp;<strong>fresh, calming, citrus, green tea, dan woody (kayu)</strong>&nbsp;yang elegan, cocok untuk sehari-hari maupun acara spesial, dengan ketahanan lumayan lama dan proyeksi sedang</p>\r\n', 'produk1766128793.jpg', 1, '2025-12-19 07:19:53'),
(7, 2, 'ESSENZA', 200000, '<p>Parfum ini memiliki aroma floral-woody premium yang elegan dan mewah,dengan perpaduan bunga limau,bergamot, dan tuscan wood</p>\r\n', 'produk1766129152.jpg', 1, '2025-12-19 07:25:52'),
(8, 2, 'ABSOLUTE', 500000, '<p>aroma:oriental woody yang kuat dengan top notes apel,prem,dan bergamot</p>\r\n', 'produk1766129317.jpg', 1, '2025-12-19 07:28:37'),
(9, 2, 'Kalvent A Le Mina Extrait de Parfum', 745000, '<p>Aroma bunga segar, manis dan mewah yang memiliki ketahanan parfum hingga seharian saat di gunakan. Terbuat dengan kualitas extrait de parfum yang memberikan kesan wanita feminim, elegan dan percaya diri saat digunakan pengguna parfum A Le Mina akan meninggalkan jejak aroma wangi khas yang sangat berkesan.</p>\r\n', 'produk1766129545.jpg', 1, '2025-12-19 07:32:25'),
(10, 2, 'Y Eau de Parfum Intense', 2460000, '<p>YOUR PASSION AMPLIFIED. THE FRAGRANCE OF SELF-ACCOMPLISHMENT Y EAU DE PARFUM INTENSE mengungkapkan momen yang mendebarkan ketika kamu melepaskan energi kreatifmu. Berbagi ide-ide, bakatmu, dan semangat</p>\r\n', 'produk1766129953.jpg', 1, '2025-12-19 07:39:13');

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
  MODIFY `idkategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
