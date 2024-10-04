-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Okt 2024 pada 03.47
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_bukutamu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_tamu` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_tamu` varchar(255) NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `bertemu` varchar(255) NOT NULL,
  `kepentingan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_tamu`, `tanggal`, `nama_tamu`, `alamat`, `no_hp`, `bertemu`, `kepentingan`) VALUES
('zt001', '2024-09-30', 'ahay', 'errq3r', 'rewrre', 're', 're');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` varchar(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `user_role`) VALUES
('usr01', 'sasa', '$2y$10$lbYcANwxfOUtU57bMMXR8eaAM5kbwlua9UEczlXbqu/tiUSz8jSjy', 'admin'),
('usr02', 'oby', '$2y$10$3M5yYlwU4PqFor1VgJGjv.9mhknnc717ymcE1bggx6xFnOXCMzm4W', 'operator'),
('usr03', 'ahay', '$2y$10$AJeoMLzEmTMJIR/vyBFv.uqOaMl07Th5jVK..Nq5mn1zpEPbvNCPG', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_tamu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
