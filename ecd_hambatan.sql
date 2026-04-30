-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2026 pada 04.54
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
-- Database: `ecd_hambatan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hambatan`
--

CREATE TABLE `hambatan` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `produk` varchar(100) DEFAULT NULL,
  `negara` varchar(100) DEFAULT NULL,
  `hambatan` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hambatan`
--

INSERT INTO `hambatan` (`id`, `nama_perusahaan`, `produk`, `negara`, `hambatan`, `status`) VALUES
(12, 'PT Mayora Indah Tbk', 'Mie instan', 'Taiwan', 'Penolakan produk karena kandungan etilen oksida (EtO) melebihi batas', 'Diproses'),
(13, 'PT Indofood CBP Sukses Makmur Tbk', 'Indomie', 'Hong Kong', 'Larangan sementara karena dugaan kandungan etilen oksida', 'Baru'),
(14, 'Multi eksportir', 'Suplemen herbal', 'Uni Eropa', 'Tidak memenuhi standar European Food Safety Authority', 'Baru'),
(15, 'Multi eksportir', 'Makanan olahan', 'Amerika Serikat', 'Penolakan oleh U.S. Food and Drug Administration (label & registrasi)', 'Baru'),
(16, 'Eksportir Madu', 'Madu', 'Korea Selatan', 'Standar kemurnian & residu ketat', 'Diproses'),
(17, 'Eksportir Seafood', 'Produk Perikanan', 'Jepang', 'Residu antibiotik/pestisida tinggi (Ministry of Health, Labour and Welfare Japan)', 'Diproses'),
(18, 'Produsen Jamu', 'Obat Tradisional', 'Uni Eropa', 'Tidak memenuhi standar European Medicines Agency', 'Selesai'),
(19, 'UMKM Indonesia', 'Snack & Minuman', 'Amerika Serikat', 'Tidak memenuhi standar label allergen & nutrition facts', 'Selesai'),
(20, 'Eksportir Makanan', 'Produk Olahan', 'Arab Saudi', 'Sertifikasi halal & registrasi SFDA', 'Selesai'),
(21, 'Eksportir Makanan', 'Produk Olahan', 'Australia', 'Biosecurity & food safety ketat', 'Baru'),
(22, 'Eksportir Makanan', 'Produk Kemasan', 'Kanada', 'Label bilingual wajib (Inggris & Perancis)', 'Diproses'),
(23, 'UMKM Makanan', 'Frozen Food', 'Singapura', 'Tidak memenuhi standar Singapore Food Agency', 'Baru'),
(24, 'Eksportir Makanan', 'Produk Olahan', 'India', 'Registrasi produk wajib di otoritas lokal', 'Diproses'),
(25, 'Eksportir Minuman', 'Minuman Herbal', 'Thailand', 'Kandungan bahan aktif tidak sesuai regulasi', 'Selesai'),
(26, 'Eksportir Rempah', 'Rempah', 'Uni Eropa', 'Aflatoksin melebihi batas', 'Selesai'),
(27, 'Eksportir Teh', 'Teh', 'Jepang', 'Residu pestisida tinggi', 'Baru'),
(28, 'Eksportir Seafood', 'Udang', 'Amerika Serikat', 'Kontaminasi bakteri (Import refusal FDA)', 'Baru'),
(29, 'Eksportir Kopi', 'Kopi', 'Korea Selatan', 'Standar mutu & keamanan ketat', 'Selesai'),
(30, 'Eksportir Coklat', 'Produk Kakao', 'Uni Eropa', 'Traceability & sustainability requirement', 'Diproses');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hambatan`
--
ALTER TABLE `hambatan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hambatan`
--
ALTER TABLE `hambatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
