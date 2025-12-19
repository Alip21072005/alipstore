-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2025 pada 19.12
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

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
(1, 'admin toko', 'princessfina', 'f5a7c10f8eff6432f6468746813fdb77', '083187921476', 'admin@gmail.com');

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
(10, 'Kue Basah'),
(11, 'Kue Kering'),
(12, 'Gorengan'),
(13, 'Jajanan Kukus');

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
(5, 12, 'Bakwan', 10000, '<p>enak</p>\r\n', 'produk1766073162.jpg', 1, '2025-12-18 17:43:21'),
(6, 12, 'Tempe Goreng', 10000, '<p>Tipis, gurih, dan crispy. Tempe versi upgraded.</p>\r\n', 'produk1766073273.jpg', 1, '2025-12-18 17:42:43'),
(7, 12, 'Risol ', 15000, '<p>Kulit tipis, isi creamy dan gurih. Nyaman dimakan kapan pun.</p>\r\n', 'produk1766073371.jpg', 1, '2025-12-18 17:43:09'),
(8, 13, 'Bolu kukus', 35000, '<p>Empuk ringan, manisnya halus. Teman santai yang gak bikin enek.</p>\r\n', 'produk1766073406.jpg', 1, '2025-12-18 15:56:46'),
(9, 13, 'Kue Talam', 20000, '<p>satu porsi, Manis dan gurih dan lembut.</p>\r\n\r\n<p> </p>\r\n', 'produk1766073469.jpg', 1, '2025-12-18 17:45:31'),
(10, 13, 'Kue Mangkok', 10000, '<p>(harga Satu kotak)Mekar cantik, empuk di setiap gigitan</p>\r\n', 'produk1766073543.jpg', 1, '2025-12-18 17:44:51'),
(11, 11, 'Nastar', 55000, '<p>(per satu kotak) Isi nanas legit, adonan buttery. Klasik yang selalu relevan.</p>\r\n', 'produk1766073597.jpg', 1, '2025-12-18 17:42:20'),
(12, 11, 'Cookies', 20000, '<p>Tekstur pas, rasa seimbang. Snack aman buat siapa aja.</p>\r\n', 'produk1766073636.jpg', 1, '2025-12-18 17:42:11'),
(13, 11, 'Kue Kastengel', 35000, '<p>Keju gurih, renyah, dan bold rasanya. Favorit tanpa debat.</p>\r\n', 'produk1766073684.jpg', 1, '2025-12-18 17:41:18'),
(14, 10, 'Klepon', 10000, '<p>Lembut di luar, gula merah lumer di dalam. Manisnya elegan, nagih tanpa ribet.</p>\r\n', 'produk1766073730.jpg', 1, '2025-12-18 17:41:11'),
(15, 10, 'Onde-Onde', 10000, '<p>Kulit renyah berbalut wijen, isi kacang hijau yang smooth.</p>\r\n', 'produk1766073762.jpg', 1, '2025-12-18 17:44:18'),
(16, 10, 'Kue Lapis', 25000, '<p>Kenyal, legit, dan manisnya pas. Tiap lapis bikin pengen lanjut.</p>\r\n', 'produk1766073811.jpg', 1, '2025-12-18 17:40:42');

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
  MODIFY `idkategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
