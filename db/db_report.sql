-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Sep 2024 pada 05.10
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_report`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_laporan`
--

CREATE TABLE `tabel_laporan` (
  `id_laporan` int(11) NOT NULL,
  `no_laporan` varchar(15) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `line` varchar(10) NOT NULL,
  `mesin` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `status_kerja` varchar(20) NOT NULL,
  `lampiran` text,
  `waktu_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_laporan`
--

INSERT INTO `tabel_laporan` (`id_laporan`, `no_laporan`, `nama_lengkap`, `tanggal`, `waktu`, `line`, `mesin`, `keterangan`, `status_kerja`, `lampiran`, `waktu_post`) VALUES
(1, 'I10092024340', 'Budi', '2024-09-10', '00:00:00', 'Line 1', 'Shellpress', '<p>testing 1</p>', 'Unfixed', NULL, '2024-09-10 05:23:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pegawai`
--

CREATE TABLE `tabel_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_status_laporan`
--

CREATE TABLE `tabel_status_laporan` (
  `id_status` int(11) NOT NULL,
  `no_laporan` varchar(15) NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_status_laporan`
--

INSERT INTO `tabel_status_laporan` (`id_status`, `no_laporan`, `status`, `nama_lengkap`, `keterangan`, `waktu`) VALUES
(1, 'I05092024270', 'Solve', NULL, NULL, '2024-09-05 03:00:20'),
(2, 'I10092024748', 'Unfixed', NULL, NULL, '2024-09-10 04:41:36'),
(3, 'I10092024748', NULL, NULL, NULL, '2024-09-10 04:43:10'),
(4, 'I10092024340', 'Solve', 'Budi', 'testing', '2024-09-10 05:23:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `nama_lengkap`, `username`, `password`, `hak_akses`, `waktu`) VALUES
(4, 'staff 123', 'staff', '1253208465b1efa876f982d8a9e73eef', 'Staff', '2024-09-11 03:02:22'),
(5, 'inspektor', 'inspektor', 'd3bdc44d424e58da42c2dce023d0d4fe', 'Inspektor', '2024-09-11 03:06:16'),
(6, 'manager', 'manager', '1d0258c2440a8d19e716292b231e3190', 'Manager', '2024-09-12 01:57:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_laporan`
--
ALTER TABLE `tabel_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tabel_status_laporan`
--
ALTER TABLE `tabel_status_laporan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_laporan`
--
ALTER TABLE `tabel_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_status_laporan`
--
ALTER TABLE `tabel_status_laporan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
