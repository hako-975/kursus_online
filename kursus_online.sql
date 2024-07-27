-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2024 pada 17.12
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursus_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(11) NOT NULL,
  `cover_kursus` text NOT NULL,
  `judul_kursus` varchar(100) NOT NULL,
  `deskripsi_kursus` text NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `cover_kursus`, `judul_kursus`, `deskripsi_kursus`, `tanggal_dibuat`, `id_user`) VALUES
(9, 'Capture.PNG', 'asd123', 'asd233', '2024-07-26 07:54:49', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursus_diikuti`
--

CREATE TABLE `kursus_diikuti` (
  `id_kursus_diikuti` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `tanggal_diikuti` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `isi_log` text NOT NULL,
  `tgl_log` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `isi_log`, `tgl_log`, `id_user`) VALUES
(1, 'Profil berhasil diubah', '2024-06-09 05:29:03', 1),
(2, 'Profil berhasil diubah', '2024-06-09 05:29:07', 1),
(3, 'Password berhasil diubah', '2024-06-09 05:29:13', 1),
(4, 'Password berhasil diubah', '2024-06-09 05:29:34', 1),
(5, 'Anggota Andri berhasil ditambahkan', '2024-06-09 05:49:00', 1),
(6, 'Anggota Andri berhasil dihapus', '2024-06-09 05:49:21', 1),
(7, 'Anggota Andri berhasil ditambahkan', '2024-06-09 05:49:31', 1),
(8, 'Anggota Andri berhasil diubah menjadi Andri1', '2024-06-09 05:51:12', 1),
(9, 'Anggota Andri1 berhasil dihapus', '2024-06-09 05:51:23', 1),
(10, 'Anggota Andri Firman Saputra berhasil ditambahkan', '2024-06-09 05:51:41', 1),
(11, 'Buku Al Quran berhasil ditambahkan', '2024-06-09 06:04:48', 1),
(12, 'Buku Al Quran berhasil dihapus', '2024-06-09 06:05:00', 1),
(13, 'Buku Baca 123 berhasil ditambahkan', '2024-06-09 06:05:31', 1),
(14, 'Buku Baca 123 berhasil diubah menjadi Baca 1231', '2024-06-09 06:07:02', 1),
(15, 'Buku Baca 1231 berhasil dihapus', '2024-06-09 06:07:06', 1),
(16, 'Buku Abc berhasil ditambahkan', '2024-06-09 07:41:09', 1),
(17, 'Transaksi Andri Firman Saputra berhasil ditambahkan', '2024-06-09 07:42:13', 1),
(18, 'Transaksi Andri Firman Saputra berhasil dihapus', '2024-06-09 07:43:36', 1),
(19, 'Transaksi Andri Firman Saputra berhasil ditambahkan', '2024-06-09 07:43:45', 1),
(20, 'Anggota Andre berhasil ditambahkan', '2024-06-09 07:54:33', 1),
(21, 'Anggota Andre berhasil dihapus', '2024-06-09 07:59:12', 1),
(22, 'Transaksi Andri Firman Saputra berhasil ditambahkan', '2024-06-09 08:04:31', 1),
(23, 'Transaksi Andri Firman Saputra berhasil dihapus', '2024-06-09 08:24:16', 1),
(24, 'Transaksi Andri Firman Saputra berhasil ditambahkan', '2024-06-09 08:24:21', 1),
(25, 'Transaksi Barbara Clark berhasil ditambahkan', '2024-06-09 13:25:29', 1),
(26, 'Transaksi Andri Firman Saputra berhasil dihapus', '2024-06-09 13:25:34', 1),
(27, 'Transaksi Pengembalian Buku Barbara Clark berhasil', '2024-06-09 13:49:22', 1),
(28, 'Transaksi Andri Firman Saputra berhasil ditambahkan', '2024-06-09 13:55:31', 1),
(29, 'Transaksi Pengembalian Buku Andri Firman Saputra berhasil', '2024-06-09 13:55:59', 1),
(30, 'Buku Asd berhasil ditambahkan', '2024-06-09 14:08:52', 1),
(31, 'Buku Asd berhasil diubah menjadi Asd123', '2024-06-09 14:09:35', 1),
(32, 'Buku Asd123 berhasil dihapus', '2024-06-09 14:09:41', 1),
(33, 'Transaksi Peminjaman Buku Andri Firman Saputra berhasil ditambahkan', '2024-06-09 14:11:44', 1),
(34, 'Buku Asd berhasil ditambahkan', '2024-06-09 14:11:57', 1),
(35, 'Buku Asd berhasil dihapus', '2024-06-09 14:13:49', 1),
(36, 'Transaksi Peminjaman Buku Barbara Clark berhasil ditambahkan', '2024-06-09 14:13:56', 1),
(37, 'Buku 1984 berhasil diubah menjadi 1984', '2024-06-09 14:15:59', 1),
(38, 'Transaksi Peminjaman Buku Christopher Young berhasil ditambahkan', '2024-06-09 14:16:07', 1),
(39, 'Transaksi Pengembalian Buku Christopher Young berhasil', '2024-06-09 14:16:33', 1),
(40, 'Transaksi Pengembalian Buku Barbara Clark berhasil', '2024-06-09 14:16:47', 1),
(41, 'Transaksi Pengembalian Buku Andri Firman Saputra berhasil', '2024-06-09 14:17:25', 1),
(42, 'Transaksi Christopher Young berhasil dihapus', '2024-06-09 14:19:02', 1),
(43, 'Transaksi Peminjaman Buku Andri Firman Saputra berhasil ditambahkan', '2024-06-09 14:19:11', 1),
(44, 'Transaksi Andri Firman Saputra berhasil dihapus', '2024-06-09 14:19:19', 1),
(45, 'Transaksi Peminjaman Buku Andri Firman Saputra berhasil ditambahkan', '2024-06-09 14:19:25', 1),
(46, 'Transaksi Pengembalian Buku Andri Firman Saputra berhasil', '2024-06-09 14:19:28', 1),
(47, 'Transaksi Andri Firman Saputra berhasil dihapus', '2024-06-09 14:19:53', 1),
(48, 'Transaksi Barbara Clark berhasil dihapus', '2024-06-09 14:19:55', 1),
(49, 'Transaksi Andri Firman Saputra berhasil dihapus', '2024-06-09 14:19:58', 1),
(50, 'Transaksi Andri Firman Saputra berhasil dihapus', '2024-06-09 14:20:07', 1),
(51, 'Transaksi Barbara Clark berhasil dihapus', '2024-06-09 14:20:11', 1),
(52, 'Transaksi Peminjaman Buku Andri Firman Saputra berhasil ditambahkan', '2024-06-09 14:20:40', 1),
(53, 'Transaksi Pengembalian Buku Andri Firman Saputra berhasil', '2024-06-09 14:31:44', 1),
(54, 'Transaksi Peminjaman Buku Charles Harris berhasil ditambahkan', '2024-06-09 14:36:37', 1),
(55, 'Transaksi Pengembalian Buku Charles Harris berhasil', '2024-06-09 14:45:02', 1),
(56, 'Transaksi Andri Firman Saputra berhasil dihapus', '2024-06-09 14:45:12', 1),
(57, 'Transaksi Peminjaman Buku Andri Firman Saputra berhasil ditambahkan', '2024-06-09 15:14:08', 1),
(58, 'Transaksi Peminjaman Buku Karen Allen berhasil ditambahkan', '2024-06-09 15:14:16', 1),
(59, 'Transaksi Peminjaman Buku Michael Johnson berhasil ditambahkan', '2024-06-09 15:14:23', 1),
(60, 'Transaksi Pengembalian Buku Karen Allen berhasil', '2024-06-09 15:14:30', 1),
(61, 'Transaksi Pengembalian Buku Brian Scott berhasil', '2024-06-09 15:27:11', 1),
(62, 'Transaksi Pengembalian Buku Brian Scott berhasil', '2024-06-09 15:30:09', 1),
(63, 'Profil berhasil diubah', '2024-07-25 14:05:48', 2),
(64, 'Profil berhasil diubah', '2024-07-25 14:05:58', 2),
(65, 'Profil berhasil diubah', '2024-07-25 14:08:54', 2),
(66, 'Profil berhasil diubah', '2024-07-25 14:09:07', 2),
(67, 'Profil berhasil diubah', '2024-07-25 14:12:10', 2),
(68, 'Profil berhasil diubah', '2024-07-25 14:12:14', 2),
(69, 'Profil berhasil diubah', '2024-07-25 14:12:58', 2),
(70, 'Password gagal diubah, password lama tidak sesuai', '2024-07-25 14:13:25', 2),
(71, 'Password berhasil diubah', '2024-07-25 14:13:46', 2),
(72, 'Password berhasil diubah', '2024-07-25 14:14:09', 2),
(73, 'Profil berhasil diubah', '2024-07-25 15:13:44', 2),
(74, 'Instruktur Instruktur berhasil ditambahkan', '2024-07-26 10:10:04', 1),
(75, 'Instruktur Instruktur berhasil diubah menjadi Andri Firman Saputra', '2024-07-26 10:23:11', 1),
(76, 'Instruktur Andri Firman Saputra berhasil diubah menjadi Andri Firman Saputra', '2024-07-26 10:23:23', 1),
(77, 'Instruktur Andri Firman Saputra berhasil diubah menjadi Andri Firman Saputra123', '2024-07-26 10:23:47', 1),
(78, 'Instruktur Andri Firman Saputra123 berhasil diubah menjadi Andri Firman Saputra123', '2024-07-26 10:24:49', 1),
(79, 'Profil berhasil diubah', '2024-07-26 10:24:58', 1),
(80, 'Instruktur Andri Firman Saputra123 berhasil dihapus', '2024-07-26 10:25:26', 1),
(81, 'Instruktur Instruktur 1 berhasil ditambahkan', '2024-07-26 10:26:52', 1),
(82, 'Kursus asd berhasil ditambahkan', '2024-07-26 14:27:48', 1),
(83, 'Kursus asd berhasil dihapus', '2024-07-26 14:36:18', 1),
(84, 'Kursus Kursus B. Inggris berhasil ditambahkan', '2024-07-26 14:37:13', 1),
(85, 'Kursus asd berhasil ditambahkan', '2024-07-26 14:38:26', 1),
(86, 'Kursus asd berhasil dihapus', '2024-07-26 14:38:29', 1),
(87, 'Kursus Kursus B. Inggris berhasil dihapus', '2024-07-26 14:38:38', 1),
(88, 'Kursus Kursus B. Inggris berhasil ditambahkan', '2024-07-26 14:38:49', 1),
(89, 'Kursus asd berhasil ditambahkan', '2024-07-26 14:39:02', 1),
(90, 'Kursus Kursus B. Inggris berhasil dihapus', '2024-07-26 14:41:18', 1),
(91, 'Kursus asd berhasil dihapus', '2024-07-26 14:41:26', 1),
(92, 'Kursus asd berhasil ditambahkan', '2024-07-26 14:41:33', 1),
(93, 'Kursus asd berhasil dihapus', '2024-07-26 14:41:36', 1),
(94, 'Kursus Kursus B. Inggris berhasil ditambahkan', '2024-07-26 14:43:24', 1),
(95, 'Kursus asd berhasil ditambahkan', '2024-07-26 14:49:23', 1),
(96, 'Kursus asd berhasil dihapus', '2024-07-26 14:52:56', 1),
(97, 'Kursus asd berhasil ditambahkan', '2024-07-26 14:54:49', 1),
(98, 'Kursus asd berhasil diubah menjadi asd123', '2024-07-26 14:55:15', 1),
(99, 'Kursus Kursus B. Inggris berhasil dihapus', '2024-07-26 14:55:28', 1),
(100, 'Peserta Andri Firman Saputra berhasil diubah menjadi Andri Firman Saputra123', '2024-07-26 15:03:59', 1),
(101, 'Peserta Andri Firman Saputra123 berhasil diubah menjadi Andri Firman Saputra', '2024-07-26 15:04:04', 1),
(102, 'Peserta asd berhasil ditambahkan', '2024-07-26 15:04:27', 1),
(103, 'Peserta asd berhasil diubah menjadi asd123', '2024-07-26 15:04:36', 1),
(104, 'Peserta asd123 berhasil dihapus', '2024-07-26 15:04:41', 1),
(105, 'Materi 1 berhasil ditambahkan', '2024-07-27 21:38:29', 1),
(106, 'Materi 2 berhasil ditambahkan', '2024-07-27 21:44:32', 1),
(107, 'Materi 2 berhasil dihapus', '2024-07-27 21:46:07', 1),
(108, 'Materi 1 berhasil dihapus', '2024-07-27 21:46:13', 1),
(109, 'Materi asd berhasil ditambahkan', '2024-07-27 21:46:53', 1),
(110, 'Materi asd berhasil dihapus', '2024-07-27 21:47:02', 1),
(111, 'Materi asd berhasil ditambahkan', '2024-07-27 21:47:38', 1),
(112, 'Materi asd berhasil diubah menjadi asd123', '2024-07-27 21:51:52', 1),
(113, 'Materi asd123 berhasil diubah menjadi asd123', '2024-07-27 22:08:57', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `judul_materi` varchar(100) NOT NULL,
  `deskripsi_materi` text NOT NULL,
  `urutan_materi` int(11) NOT NULL,
  `video_materi` text NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_kursus`, `judul_materi`, `deskripsi_materi`, `urutan_materi`, `video_materi`, `tanggal_dibuat`) VALUES
(5, 9, 'asd123', 'asd123', 123, 'After_school_-_YouTube_Music.mp4', '2024-07-27 21:47:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` enum('Administrator','Instruktur','Peserta') NOT NULL,
  `tanggal_gabung` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `no_telepon`, `email`, `alamat`, `jabatan`, `tanggal_gabung`) VALUES
(1, 'admin', '$2y$10$2iAysNjVDIPbtjLPNIc4eua/s3k3tAWFBG07nFGKs03wlsFj4QT5e', 'Andri Firman Saputra', '123', 'ad123min@gmail.com', '123', 'Administrator', '2024-07-25 15:35:23'),
(2, 'andri123', '$2y$10$IXI0/wzqu05INOSdc4L5deMmqJqImbinP/DoDig.8hZCVqf26ve4i', 'Andri Firman Saputra', '087808675313', 'andrifirmansaputra1@gmail.com', 'Jl. AMD Babakan Pocis No. 88 RT04/RW02, Kelurahan Bakti Jaya, Kecamatan Setu, Kota Tangerang Selatan, Provinsi Banten, Indonesia. Kode Pos 15315', 'Peserta', '2024-07-25 15:35:23'),
(5, 'instruktur1', '$2y$10$ANsp5Eq7ka9H/LzPB2fOYe1atHULYmwEIOic0FovPBCSSpmngR9Tu', 'Instruktur 1', '087808675313', 'instruktur1@gmail.com', 'Jl. AMD Babakan Pocis No. 88 RT04/RW02, Kelurahan Bakti Jaya, Kecamatan Setu, Kota Tangerang Selatan, Provinsi Banten, Indonesia. Kode Pos 15315', 'Instruktur', '2024-07-26 10:26:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kursus_diikuti`
--
ALTER TABLE `kursus_diikuti`
  ADD PRIMARY KEY (`id_kursus_diikuti`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kursus` (`id_kursus`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_kursus` (`id_kursus`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kursus_diikuti`
--
ALTER TABLE `kursus_diikuti`
  MODIFY `id_kursus_diikuti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kursus`
--
ALTER TABLE `kursus`
  ADD CONSTRAINT `kursus_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kursus_diikuti`
--
ALTER TABLE `kursus_diikuti`
  ADD CONSTRAINT `kursus_diikuti_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kursus_diikuti_ibfk_2` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
