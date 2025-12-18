-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2025 pada 07.03
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
(1, 'admin toko', 'admin_toko', '827ccb0eea8a706c4c34a16891f84e7b', '085357617915', 'admin@gmail.com');

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
(1, 'Makanan'),
(2, 'Minuman'),
(5, 'Cemilan');

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
(3, 1, 'Nasi Liwet Kemangi', 22000, 'hidangan nasi gurih khas Jawa (khususnya Solo dan Sunda) yang dimasak dengan santan, kaldu ayam, dan rempah seperti daun salam, sereh, serta bawang, membuatnya harum dan kaya rasa', 'produk1766034667.jpg', 1, '2025-12-18 05:56:58'),
(4, 1, 'Nila bakar + Nasi', 13000, '<p>Gurih, manis , pedas, dengan aroma khas bakaran arang yang smoky.</p>\r\n', 'produk1766034914.jpg', 1, '2025-12-18 05:56:49'),
(5, 1, 'Ayam Suwir + Nasi', 10000, '<p>Perpaduan nasi hangat dengan ayam suwir yang dibumbui pedas manis, disajikan dengan irisan mentimun segar. Pilihan tepat untuk makan siang cepat dan lezat.</p>\r\n', 'produk1766035062.jpg', 1, '2025-12-18 05:56:37'),
(6, 1, 'Nasi Kebuli Ayam', 15000, '<p>hidangan yang kaya rasa yang memadukan nasi berbumbu gurih dengan potongan daging ayam yang empuk. Bumbu rempahnya yang kuat, seperti kapulaga, cengkeh, dan kayu manis, memberikan aroma yang khas</p>\r\n', 'produk1766035224.jpg', 1, '2025-12-18 05:56:26'),
(7, 5, 'Mie Jebew', 12000, '<p>Mie pedas dengan bumbu khas yang gurih dan nendang. Mienya kenyal, pedasnya bisa pilih level, dan rasanya bikin nagih</p>\r\n', 'produk1766035401.jpg', 1, '2025-12-18 05:56:15'),
(8, 5, 'Cireng Ayam Suwir', 10000, '<p>Camilan gurih dengan tekstur renyah di luar dan kenyal di dalam, berisi ayam suwir berbumbu lezat. Cocok dinikmati hangat sebagai teman santai atau camilan favorit kapan saja.</p>\r\n', 'produk1766036372.jpg', 1, '2025-12-18 05:56:04'),
(9, 5, 'Kentang Goreng', 10000, '<p>Renyah di luar dan lembut di dalam, digoreng hingga keemasan dan disajikan hangat. Cocok dinikmati sebagai camilan atau pelengkap menu favorit, makin nikmat dengan saus sambal</p>\r\n', 'produk1766036458.jpg', 1, '2025-12-18 05:55:42'),
(10, 2, 'Es Mojito', 8000, '<p>Minuman segar dengan perpaduan rasa asam, manis, dan soda yang menyegarkan.</p>\r\n', 'produk1766036543.jpg', 1, '2025-12-18 05:55:31'),
(11, 2, 'Es Teh', 5000, '<p>Disajikan dingin dengan rasa segar dan ringan, cocok dinikmati kapan saja sebagai pelepas dahaga dan pendamping berbagai hidangan.</p>\r\n', 'produk1766036625.jpg', 1, '2025-12-18 05:55:18'),
(13, 2, 'Es Jeruk', 5000, '<p>Terbuat dari perasan jeruk segar dengan rasa manis dan sedikit asam yang menyegarkan.</p>\r\n', 'produk1766036775.jpg', 1, '2025-12-18 05:55:07'),
(14, 2, 'Es Kopi', 7000, '<p>Minuman kopi dingin dengan aroma khas dan rasa seimbang antara pahit dan manis. Disajikan dengan es batu, cocok dinikmati kapan saja untuk menambah semangat.</p>\r\n', 'produk1766036843.jpg', 1, '2025-12-18 05:54:58');

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
  MODIFY `idkategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
