-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2025 pada 05.26
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
(3, 'Keyboard'),
(4, 'Mouse');

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
(5, 'VORTEX MONO SERIES 65%', 300000, 'produk_1766078032.png', '<p>FORTEX MONO Series 65% adalah keyboard mekanikal dengan desain <strong>minimalis modern</strong> yang menggabungkan estetika elegan dan fungsionalitas tinggi. Mengusung layout <strong>65%</strong>, keyboard ini lebih ringkas dibanding full-size namun tetap menyediakan tombol-tombol penting untuk produktivitas dan gaming.</p>\r\n\r\n<p>Desain <strong>monokrom hitam &amp; putih</strong> memberikan kesan clean, profesional, dan mudah dipadukan dengan berbagai setup meja kerja maupun gaming. Cocok untuk pengguna yang mengutamakan tampilan sederhana namun tetap premium.</p>\r\n', 1, 3),
(7, 'AJAZ AK650 PRO 65%', 750000, 'produk_1766078494.jpg', '<p>AJAZZ 65% RGB Mechanical Keyboard hadir dengan desain <strong>compact, modern, dan penuh warna</strong> yang cocok untuk setup gaming maupun kerja profesional. Menggunakan layout <strong>65%</strong>, keyboard ini tetap menyediakan tombol navigasi penting tanpa memakan banyak ruang meja.</p>\r\n\r\n<p>Dilengkapi <strong>RGB backlight full color</strong> yang terang dan dinamis, memberikan tampilan premium sekaligus meningkatkan pengalaman bermain game di kondisi minim cahaya. Keunggulan uniknya adalah <strong>smart screen</strong> di sudut kanan atas yang dapat menampilkan informasi seperti waktu, status keyboard, atau animasi.</p>\r\n', 1, 3),
(8, 'Lamzu maya x', 1789000, 'produk_1766115068.jpg', '<p>LAMZU Maya X adalah mouse gaming <strong>wireless premium</strong> yang dirancang untuk gamer kompetitif maupun pengguna profesional yang mengutamakan <strong>presisi, kecepatan, dan kenyamanan</strong>. Mengusung desain ergonomis dengan balutan warna <strong>hitam matte dan aksen ungu gradasi</strong>, mouse ini tampil elegan sekaligus agresif.</p>\r\n\r\n<p>Mouse ini dilengkapi dengan <strong>sensor berpresisi tinggi</strong> yang responsif dan stabil, memastikan setiap gerakan tangan diterjemahkan secara akurat di layar. Koneksi wireless yang cepat dan minim latency memberikan pengalaman bermain yang mulus tanpa gangguan kabel.</p>\r\n', 1, 3);

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
(1, 'Admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

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
  MODIFY `idkategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
