-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2024 pada 07.44
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
-- Database: `db_kopi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(200) NOT NULL,
  `nilai` text NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nama_subkriteria`, `nilai`, `keterangan`) VALUES
(58, 1, '0 - 2 km', '5', 'sangat dekat'),
(59, 1, '2 - 4 km', '4', 'Cukup Dekat'),
(60, 1, '4 - 6 km', '3', 'Dekat'),
(61, 1, '6 - 8 km', '2', 'Cukup Jauh'),
(62, 1, '8 - 10 km', '1', 'Sangat Jauh'),
(63, 2, 'Rp. 20.000 - 300.000', '5', 'Sangat Murah'),
(64, 2, 'Rp. 22.000 - 350.000', '4', 'Cukup Murah'),
(65, 2, 'Rp. 25.000 - 400.000', '3', 'Murah'),
(66, 2, 'Rp. 27.000 - 450.000', '2', 'Cukup Mahal'),
(67, 2, 'Rp. 30.000 - 500.000', '1', 'Sangat Mahal'),
(68, 3, 'Sangat Lengkap', '5', 'sangat baik'),
(69, 3, 'Cukup Lengkap', '4', 'Cukup Baik'),
(70, 3, 'Lengkap', '3', 'Baik'),
(71, 3, 'kurang lengkap', '2', 'kurang baik'),
(72, 3, 'tidak lengkap', '1', 'Buruk'),
(73, 4, 'Rating 5', '5', 'Sangat Baik'),
(74, 4, 'Rating 4', '4', 'Cukup Baik'),
(75, 4, 'Rating 3', '3', 'Baik'),
(76, 4, 'Rating 2', '2', 'Kurang baik'),
(77, 4, 'Rating 1', '1', 'Buruk'),
(78, 5, 'Sangat Ramah', '5', 'Sangat baik'),
(79, 5, 'Cukup Ramah', '4', 'Cukup Baik'),
(80, 5, 'Ramah', '3', 'Baik'),
(81, 5, 'Kurang Ramah', '2', 'Kurang Baik'),
(82, 5, 'Tidak Ramah', '1', 'Buruk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `atribute` varchar(50) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `atribute`, `bobot`) VALUES
(1, 'Nilai Akademik ', 'benefit', 50),
(2, 'Kehadiran', 'benefit', 30),
(3, 'Sikap ', 'benefit', 20),
(4, 'Ulasan', 'benefit', 20),
(5, 'Pelayanan', 'benefit', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin saja', 'admin', '123', 'admin'),
(8, 'user', 'user', '123', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_coffeshop`
--

CREATE TABLE `tb_coffeshop` (
  `id_coffeshop` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_coffeshop`
--

INSERT INTO `tb_coffeshop` (`id_coffeshop`, `nama`) VALUES
(29, 'Putri Alya'),
(30, 'Cantika Indah '),
(31, 'Aprillia '),
(32, 'Billy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kayu`
--

CREATE TABLE `tb_kayu` (
  `id_kayu` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_kayu`
--

INSERT INTO `tb_kayu` (`id_kayu`, `nama`) VALUES
(1, 'Jati'),
(3, 'Sono Kelling'),
(4, 'Trembesi'),
(5, 'Mahoni'),
(6, 'Meranti'),
(7, 'Pinus'),
(8, 'Cendana'),
(9, 'Sungkai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_coffeshop` int(11) NOT NULL,
  `kriteria1` text NOT NULL,
  `kriteria2` text NOT NULL,
  `kriteria3` text NOT NULL,
  `kriteria4` text NOT NULL,
  `kriteria5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_coffeshop`, `kriteria1`, `kriteria2`, `kriteria3`, `kriteria4`, `kriteria5`) VALUES
(145, 29, '4', '3', '2', '3', '1'),
(146, 30, '4', '2', '4', '2', '3'),
(147, 31, '2', '4', '3', '1', '2'),
(148, 32, '3', '2', '1', '4', '5'),
(149, 33, '1', '3', '5', '2', '4');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indeks untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `tb_coffeshop`
--
ALTER TABLE `tb_coffeshop`
  ADD PRIMARY KEY (`id_coffeshop`);

--
-- Indeks untuk tabel `tb_kayu`
--
ALTER TABLE `tb_kayu`
  ADD PRIMARY KEY (`id_kayu`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT untuk tabel `tb_coffeshop`
--
ALTER TABLE `tb_coffeshop`
  MODIFY `id_coffeshop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_kayu`
--
ALTER TABLE `tb_kayu`
  MODIFY `id_kayu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
