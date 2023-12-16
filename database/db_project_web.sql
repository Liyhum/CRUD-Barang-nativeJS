-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2023 pada 07.02
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `jenis` text NOT NULL,
  `status` text NOT NULL,
  `stok_awal` text NOT NULL,
  `harga` text NOT NULL,
  `satuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `jenis`, `status`, `stok_awal`, `harga`, `satuan`) VALUES
(1, 'buku', 'Makanan', '1', '22', '10000', 'Box'),
(3, 'pensil', 'ATK', '', '10', '1000', 'biji');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keluar`
--

CREATE TABLE `tb_keluar` (
  `id_keluar` int(11) NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `jml_keluar` int(11) DEFAULT NULL,
  `updater` text DEFAULT NULL,
  `input_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_keluar`
--

INSERT INTO `tb_keluar` (`id_keluar`, `tgl_keluar`, `barang_id`, `jml_keluar`, `updater`, `input_date`) VALUES
(1, '2023-12-02', 1, 10, 'admin', '2023-12-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masuk`
--

CREATE TABLE `tb_masuk` (
  `id_masuk` int(11) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jml_masuk` int(11) DEFAULT NULL,
  `updater` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_masuk`
--

INSERT INTO `tb_masuk` (`id_masuk`, `tgl_masuk`, `id_barang`, `jml_masuk`, `updater`) VALUES
(1, '2023-12-13', 1, 1, 'admin'),
(2, '2023-12-07', 1, 10, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) DEFAULT NULL,
  `satuan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `satuan`) VALUES
(1, 'biji');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `status`, `create_date`, `id`) VALUES
(2, 'siapa', '132', 1, '2023-11-09', 2),
(5, 'mulki', 'admin', 1, '2023-11-09', 3),
(6, 'admin', 'admin', 1, '2023-11-09', 4),
(954, 'admin2', 'aku aku', 1, '2023-11-09', 5),
(5000, 'adminku', 'akusuka', 1, '2023-11-09', 6),
(132, 'mulki', 'mulki', 1, '2023-11-18', 7);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_keluar`
--
ALTER TABLE `tb_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_masuk`
--
ALTER TABLE `tb_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
