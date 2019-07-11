-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2019 pada 13.30
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_election`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'asd', 'ceedf12f8fe3dc63d35b2567a59b93bd62ff729a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=On 0=Off'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `kode`, `nama`, `status`) VALUES
(2, 'Y1lIFINAE', 'Pemilihan Ketua Kelas 10A', 1),
(3, 'gUBfdMHRF', 'Jualan Motor', 1),
(4, 'h46FhcwzLJ', 'Hewan Fav', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `id` int(11) NOT NULL,
  `id_event` varchar(100) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `foto` text NOT NULL,
  `jumlah_suara` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`id`, `id_event`, `nama`, `foto`, `jumlah_suara`) VALUES
(4, 'Y1lIFINAE', 'jokowi', 'ntaranaa', 0),
(5, 'Y1lIFINAE', 'prabowo', 'ntaran', 0),
(6, 'Y1lIFINAE', 'aldiii', 'ntaran', 0),
(7, 'gUBfdMHRF', 'Motor1', 'http://localhost/si_election/assett/foto_uploaded/Motor3-d6d5c.jpg', 0),
(8, 'gUBfdMHRF', 'Motor2', 'http://localhost/si_election/assett/foto_uploaded/Motor3-d6d5c.jpg', 0),
(9, 'gUBfdMHRF', 'Motor3', 'localhost/si_election/assett/foto_uploaded/Motor3-d6d5c.jpg', 0),
(10, 'h46FhcwzLJ', 'Kucing', 'https://cdn.pixabay.com/photo/2016/03/28/12/35/cat-1285634_960_720.png', 3),
(11, 'h46FhcwzLJ', 'Macan', 'https://i.pinimg.com/originals/5a/e5/8f/5ae58f5036997cfd4636917403c3c951.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_election`
--

CREATE TABLE `log_election` (
  `id` int(11) NOT NULL,
  `eid` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_election`
--

INSERT INTO `log_election` (`id`, `eid`, `uid`) VALUES
(2, 'h46FhcwzLJ', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=On 0=Off'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `user`, `pass`, `status`) VALUES
(1, 'nepska@gg.com', 'callestasia', 'd0c5513c5d6ecdba656225f0fffff14c7e2bdb7a', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_election`
--
ALTER TABLE `log_election`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `log_election`
--
ALTER TABLE `log_election`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
