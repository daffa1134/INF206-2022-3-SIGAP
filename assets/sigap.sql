-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2022 pada 05.02
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigap`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_apotek` varchar(50) DEFAULT NULL,
  `link_pp` text DEFAULT 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png',
  `longitude` varchar(50) DEFAULT '0',
  `latitude` varchar(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `nama`, `email`, `password`, `nama_apotek`, `link_pp`, `longitude`, `latitude`) VALUES
(1, 'Yuda', 'yuda@gmail.com', '$2y$10$4Z9Q5CDcRARcMlQWX6wJaOa7Pssf1YlY1iBcQJULS8F62AXUUYTwy', 'Apotek Laris', 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png', '0', '0'),
(2, 'Dey', 'dey@gmail.com', '$2y$10$4Z9Q5CDcRARcMlQWX6wJaOa7Pssf1YlY1iBcQJULS8F62AXUUYTwy', 'Apotek Rasi', 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png', '95.3756344', '5.5295781'),
(3, 'Arip', 'arip@gmail.com', '$2y$10$4Z9Q5CDcRARcMlQWX6wJaOa7Pssf1YlY1iBcQJULS8F62AXUUYTwy', 'Apotek Sejahtera', 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png', '95.32452839863377', '5.549669633601224'),
(4, 'Alan', 'alan@gmail.com', '$2y$10$4Z9Q5CDcRARcMlQWX6wJaOa7Pssf1YlY1iBcQJULS8F62AXUUYTwy', 'Apotek Sehat', 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png', '95.32355932919621', '5.550232917149404'),
(5, 'Sean', 'sean@gmail.com', '$2y$10$4Z9Q5CDcRARcMlQWX6wJaOa7Pssf1YlY1iBcQJULS8F62AXUUYTwy', 'Apotek Baroqah', 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png', '95.32395858580449', '5.549233667197977'),
(6, 'Jaden', 'jaden@gmail.com', '$2y$10$4Z9Q5CDcRARcMlQWX6wJaOa7Pssf1YlY1iBcQJULS8F62AXUUYTwy', 'Klinik Cahaya Bunda', 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png', '95.32287322803442', '5.548816991042327'),
(7, 'Budi', 'budi@gmail.com', '$2y$10$4Z9Q5CDcRARcMlQWX6wJaOa7Pssf1YlY1iBcQJULS8F62AXUUYTwy', 'Apotek Putroe Meuraxa', 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png', '95.32218712687265', '5.548832423497788'),
(8, 'Ami', 'ami@gmail.com', '$2y$10$4Z9Q5CDcRARcMlQWX6wJaOa7Pssf1YlY1iBcQJULS8F62AXUUYTwy', 'Klinik Dental Care', 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png', '95.32299726892242', '5.550128748314628');

-- --------------------------------------------------------

--
-- Struktur dari tabel `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `id_apotek` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `ruangan` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `spesialis` varchar(50) DEFAULT NULL,
  `link_pp` text DEFAULT 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png',
  `jam_mulai` varchar(10) DEFAULT NULL,
  `jam_selesai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `doctors`
--

INSERT INTO `doctors` (`id`, `id_apotek`, `nama`, `nip`, `email`, `alamat`, `ruangan`, `no_hp`, `spesialis`, `link_pp`, `jam_mulai`, `jam_selesai`) VALUES
(1, 1, 'Dr. Asep', '1234567890123', 'asep@gmail.com', 'Jl. Asep No. 1', 'Ruang 1', '08123456789', 'Jantung', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(2, 1, 'Dr. Budi', '1234567890123', 'budi@gmail.com', 'Jl. Budi No. 1', 'Ruang 2', '08123456789', 'Jantung', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(3, 1, 'Dr. Btari', '1234567890123', 'btari@gmail.com', 'Jl. Kasuari No. 2', 'Ruang 3', '08123456789', 'Ortopedi', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(4, 1, 'Dr. Caca', '1234567890123', 'caca@gmail.com', 'Jl. Caca No. 1', 'Ruang 4', '08123456789', 'Jantung', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(5, 2, 'Dr. Dede', '1234567890123', 'dede@gmail.com', 'Jl. Dede No. 1', 'Ruang 1', '08123456789', 'Jantung', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(6, 2, 'Dr. Eka', '1234567890123', 'eka@gmail.com', 'Jl. Dede No. 1', 'Ruang 2', '08123456789', 'Uruologi', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(7, 2, 'Dr. Maulvi', '1234567890123', 'maulvi@gmail.com', 'Jl. Dede No. 3', 'Ruang 3', '08123456789', 'THT', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(8, 2, 'Dr. Asyraf', '1234567890123', 'asyraf@gmail.com', 'Jl. Dede No. 7', 'Ruang 4', '08123456789', 'Penyakit Dalam', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(9, 2, 'Dr. Hamzah', '1234567890123', 'hamzah@gmail.com', 'Jl. Bahtera No. 20', 'Ruang 5', '08123456789', 'Ortopedi', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(10, 3, 'Dr. Ginting', '1234567890123', 'sinting@gmail.com', 'Jl. Dede No. 1', 'Ruang 1', '08123456789', 'Uruologi', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(11, 3, 'Dr. Hap', '1234567890123', 'hap@gmail.com', 'Jl. Dede No. 1', 'Ruang 2', '08123456789', 'Jantung', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(12, 3, 'Dr. Fatih', '1234567890123', 'fatih@gmail.com', 'Jl. Melawai No. 6', 'Ruang 3', '08123456789', 'Saraf', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(13, 3, 'Dr. Nurul', '1234567890123', 'nurul@gmail.com', 'Jl. Mawar No. 25', 'Ruang 4', '08123456789', 'Anak', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(14, 4, 'Dr. Sigit', '1234567890123', 'slebew@gmail.com', 'Jl. Dede No. 1', 'Ruang 1', '08123456789', 'Jantung', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(15, 4, 'Dr. Putri', '1234567890123', 'putri@gmail.com', 'Jl. Dede No. 1', 'Ruang 2', '08123456789', 'Jantung', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(16, 4, 'Dr. Razaq', '1234567890123', 'razaq@gmail.com', 'Jl. Pahlawan No. 5', 'Ruang 3', '08123456789', 'Kandungan', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(17, 4, 'Dr. Purnama', '1234567890123', 'purnama@gmail.com', 'Jl. Melawai No. 8', 'Ruang 4', '08123456789', 'Mata', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(18, 5, 'Dr. Luna', '1234567890123', 'luna@gmail.com', 'Jl. Tulip No. 9', 'Ruang 1', '08123456789', 'Ortopedi', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(19, 5, 'Dr. Mulan', '1234567890123', 'mulan@gmail.com', 'Jl. Pahlawan No. 4', 'Ruang 2', '08123456789', 'Anak', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(20, 5, 'Dr. Ren', '1234567890123', 'ren@gmail.com', 'Jl. Purnama No. 7', 'Ruang 3', '08123456789', 'Penyakit Dalam', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(21, 5, 'Dr. Jasmine', '1234567890123', 'jasmine@gmail.com', 'Jl. Merak No. 16', 'Ruang 4', '08123456789', 'Saraf', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(22, 6, 'Dr. Haydar', '1234567890123', 'haydar@gmail.com', 'Jl. Solo No. 23', 'Ruang 1', '08123456789', 'Saraf', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(23, 6, 'Dr. Sarah', '1234567890123', 'sarah@gmail.com', 'Jl. Tulip No. 18', 'Ruang 2', '08123456789', 'Kandungan', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(24, 6, 'Dr. Zifa', '1234567890123', 'zifa@gmail.com', 'Jl. Mekar No. 17', 'Ruang 3', '08123456789', 'Kulit dan Kelamin', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(25, 6, 'Dr. Zefanya', '1234567890123', 'zefanya@gmail.com', 'Jl. Sabit No. 10', 'Ruang 4', '08123456789', 'Penyakit Dalam', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(26, 7, 'Dr. Irfan', '1234567890123', 'irfan@gmail.com', 'Jl. Bahtera No. 6', 'Ruang 1', '08123456789', 'THT', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(27, 7, 'Dr. Faris', '1234567890123', 'faris@gmail.com', 'Jl. Pemuda No. 3', 'Ruang 2', '08123456789', 'Mata', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(28, 7, 'Dr. Lina', '1234567890123', 'lina@gmail.com', 'Jl. Tgk. Yusuf No. 8', 'Ruang 3', '08123456789', 'Penyakit Dalam', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(29, 7, 'Dr. Zain', '1234567890123', 'zain@gmail.com', 'Jl. Pemuda No. 17', 'Ruang 4', '08123456789', 'Ortopedi', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(30, 8, 'Dr. Saiful', '1234567890123', 'saiful@gmail.com', 'Jl. Mulia No. 11', 'Ruang 1', '08123456789', 'Bedah Mulut', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(31, 8, 'Dr. Swan', '1234567890123', 'swan@gmail.com', 'Jl. Menara No. 20', 'Ruang 2', '08123456789', 'Gigi Anak', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(32, 8, 'Dr. Ahmad', '1234567890123', 'ahmad@gmail.com', 'Jl. Cut Malahayati No. 17', 'Ruang 3', '08123456789', 'Penyakit Mulut', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(33, 8, 'Dr. Kevin', '1234567890123', 'kevin@gmail.com', 'Jl. Purnama No. 13', 'Ruang 4', '08123456789', 'Ortodonti', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00'),
(34, 8, 'Dr. Nur', '1234567890123', 'nur@gmail.com', 'Jl. Melati No. 4', 'Ruang 5', '08123456789', 'Prostodonsia', 'https://i.pinimg.com/originals/e3/7e/14/e37e14e207070d62cfc4d0b050f3ad91.png', '08:00', '16:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT '-',
  `link_pp` text DEFAULT 'https://cdn-icons-png.flaticon.com/512/3011/3011270.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `email`, `password`, `no_hp`, `link_pp`) VALUES
(1, 'Agung', 'agung@gmail.com', '$2y$10$4Z9Q5CDcRARcMlQWX6wJaOa7Pssf1YlY1iBcQJULS8F62AXUUYTwy', '-', 'https://cdn-icons-png.flaticon.com/512/3011/3011270.png'),
(2, 'Dudul', 'dudul@yahool.com', '$2y$10$4Z9Q5CDcRARcMlQWX6wJaOa7Pssf1YlY1iBcQJULS8F62AXUUYTwy', '-', 'https://cdn-icons-png.flaticon.com/512/3011/3011270.png'),
(3, 'Andre', 'dre@gmail.com', '$2y$10$4Z9Q5CDcRARcMlQWX6wJaOa7Pssf1YlY1iBcQJULS8F62AXUUYTwy', '-', 'https://cdn-icons-png.flaticon.com/512/3011/3011270.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_apotek` (`id_apotek`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`id_apotek`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
