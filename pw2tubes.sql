-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2021 pada 05.35
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2tubes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahanbakar`
--

CREATE TABLE `bahanbakar` (
  `id_bahanbakar` varchar(5) NOT NULL,
  `nama_bahanbakar` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `poin` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bahanbakar`
--

INSERT INTO `bahanbakar` (`id_bahanbakar`, `nama_bahanbakar`, `harga`, `poin`) VALUES
('BA001', 'Pertamax', 12000, 2),
('BA002', 'Pertamax Turbo', 15000, 2.5),
('BA003', 'Pertalite', 10000, 1),
('BA004', 'Solar', 13000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bertransaksi`
--

CREATE TABLE `bertransaksi` (
  `id_transaksi` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `id_member` varchar(5) NOT NULL,
  `id_pegawai` varchar(5) NOT NULL,
  `id_bahanbakar` varchar(5) NOT NULL,
  `liter` int(11) NOT NULL,
  `tot_poin` int(11) NOT NULL,
  `tanggal_exp_poin` date NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bertransaksi`
--

INSERT INTO `bertransaksi` (`id_transaksi`, `tanggal`, `id_member`, `id_pegawai`, `id_bahanbakar`, `liter`, `tot_poin`, `tanggal_exp_poin`, `rating`) VALUES
(1, '2020-12-27', 'M0001', 'PG001', 'BA001', 2, 4, '2021-12-27', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` varchar(5) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp_cabang` varchar(12) NOT NULL,
  `id_owner` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `nama_cabang`, `alamat`, `no_telp_cabang`, `id_owner`) VALUES
('C0001', 'Pertamina Sukajadi', 'Jl Sukajadi', '085324789156', 'Ow001'),
('C0002', 'Pertamina Surya Sumantri', 'Jl Suryasumantri', '082324977324', 'Ow001'),
('C0003', 'Pertamina Asia Afrika', 'Jl Asia Afrika', '082345877944', 'Ow001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` varchar(5) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `poin` int(11) NOT NULL,
  `plat_motor` varchar(10) NOT NULL,
  `plat_mobil` varchar(10) NOT NULL,
  `password` varchar(64) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `email`, `no_telp`, `poin`, `plat_motor`, `plat_mobil`, `password`, `jabatan`) VALUES
('M0001', 'Yolanda', 'yolandatrixie@gmail.com', '085234876123', 0, 'D 1234 YH', 'D 4567 AN', '827ccb0eea8a706c4c34a16891f84e7b', 'member'),
('M0002', 'Dinda Ayu', 'dindaayuf8@gmail.com', '085156327827', 0, 'D 1456 DA', 'D 5367 KS', '827ccb0eea8a706c4c34a16891f84e7b', 'member'),
('M0003', 'Vardina Nava', 'vardinanava@gmail.com', '082324877124', 0, 'D 1378 VN', 'null', '827ccb0eea8a706c4c34a16891f84e7b', 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `owner`
--

CREATE TABLE `owner` (
  `id_owner` varchar(5) NOT NULL,
  `nama_owner` varchar(50) NOT NULL,
  `nip` varchar(7) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `owner`
--

INSERT INTO `owner` (`id_owner`, `nama_owner`, `nip`, `password`, `jabatan`) VALUES
('Ow001', 'Santi', '1872043', '827ccb0eea8a706c4c34a16891f84e7b', 'owner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(5) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `nip` varchar(7) NOT NULL,
  `password` varchar(64) NOT NULL,
  `id_cabang` varchar(5) NOT NULL,
  `total_rating` int(20) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `password`, `id_cabang`, `total_rating`, `jabatan`) VALUES
('PG001', 'Tanti', '1872045', 'b345b94e859379fc760ea7f11518cb08', 'C0001', 3, 'pegawai'),
('PG002', 'Dian', '1872025', 'b345b94e859379fc760ea7f11518cb08', 'C0002', 0, 'pegawai'),
('PG003', 'Chris', '1872021', 'b345b94e859379fc760ea7f11518cb08', 'C0003', 0, 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahanbakar`
--
ALTER TABLE `bahanbakar`
  ADD PRIMARY KEY (`id_bahanbakar`);

--
-- Indeks untuk tabel `bertransaksi`
--
ALTER TABLE `bertransaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_bahanbakar` (`id_bahanbakar`);

--
-- Indeks untuk tabel `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`),
  ADD KEY `id_owner` (`id_owner`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bertransaksi`
--
ALTER TABLE `bertransaksi`
  MODIFY `id_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bertransaksi`
--
ALTER TABLE `bertransaksi`
  ADD CONSTRAINT `bertransaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`),
  ADD CONSTRAINT `bertransaksi_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `bertransaksi_ibfk_3` FOREIGN KEY (`id_bahanbakar`) REFERENCES `bahanbakar` (`id_bahanbakar`);

--
-- Ketidakleluasaan untuk tabel `cabang`
--
ALTER TABLE `cabang`
  ADD CONSTRAINT `cabang_ibfk_1` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`id_owner`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
