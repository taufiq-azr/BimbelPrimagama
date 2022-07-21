-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2022 pada 15.21
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pendaftar`
--

CREATE TABLE `data_pendaftar` (
  `id_pendaftar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `kelas` int(11) NOT NULL,
  `jenis_kelamin` varchar(99) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(99) NOT NULL,
  `agama` varchar(99) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `program_bimbel` int(11) NOT NULL,
  `biaya_bimbel` int(11) NOT NULL,
  `nama_ayah` varchar(99) NOT NULL,
  `pekerjaan_ayah` varchar(99) NOT NULL,
  `no_telpon_ayah` varchar(99) NOT NULL,
  `nama_ibu` varchar(99) NOT NULL,
  `pekerjaan_ibu` varchar(99) NOT NULL,
  `no_telpon_ibu` varchar(99) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Verified',
  `tanggal_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pendaftar`
--

INSERT INTO `data_pendaftar` (`id_pendaftar`, `id_user`, `nama`, `kelas`, `jenis_kelamin`, `tanggal_lahir`, `no_hp`, `agama`, `kecamatan`, `program_bimbel`, `biaya_bimbel`, `nama_ayah`, `pekerjaan_ayah`, `no_telpon_ayah`, `nama_ibu`, `pekerjaan_ibu`, `no_telpon_ibu`, `status`, `tanggal_daftar`) VALUES
(24, 15, 'Taufiq Al Azhar', 8, 'Laki-laki', '2005-08-10', '082294160400', 'Islam', 'Benai', 33, 33, 'Al', 'PNS', '0823435522', 'Zhar', 'IRT', '0839273423', 'Verified', 1658246058),
(27, 16, 'Taufiq', 7, 'Laki-laki', '2022-07-07', '2342', 'Buddha', 'Kuantan Mudik', 26, 26, 'dawda', 'fsefs', '324532', 'efs', '3543', 'des', 'Verified', 1658383597);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `desc_kelas` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `desc_kelas`) VALUES
(3, 'Kelas 9'),
(4, 'Kelas 10'),
(5, 'Kelas 7'),
(6, 'Kelas 8'),
(7, 'Kelas 11'),
(8, 'Kelas 12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pembayaran` varchar(99) NOT NULL,
  `jenis_kelamin` varchar(99) NOT NULL,
  `program_bimbel` varchar(99) NOT NULL,
  `tanggal_bayar` varchar(99) NOT NULL,
  `total_pembayaran` varchar(99) NOT NULL,
  `status` varchar(99) NOT NULL DEFAULT 'Belum Lunas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pendaftar`, `id_user`, `nama_pembayaran`, `jenis_kelamin`, `program_bimbel`, `tanggal_bayar`, `total_pembayaran`, `status`) VALUES
(196, 24, 15, 'Taufiq Al Azhar', 'Laki-laki', 'Paket Belajar Komplit - (Biologi , Matematika, Fisika, Kimia) + UASBN', '2022-07-13', '800000', 'Lunas'),
(198, 27, 16, 'Taufiq', 'Laki-laki', 'Paket Belajar Komplit - (Biologi,Matematika,Fisika,Kimia) ', '2022-07-19', '800000', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_bimbel`
--

CREATE TABLE `program_bimbel` (
  `id_program_bimbel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `program_bimbel` varchar(99) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program_bimbel`
--

INSERT INTO `program_bimbel` (`id_program_bimbel`, `id_kelas`, `program_bimbel`, `harga`) VALUES
(3, 3, 'Paket Belajar Komplit - (Biologi,Matematika,Fisika,Kimia) + UASBN', 600000),
(6, 5, 'Paket Belajar Komplit - (Biologi,Matematika,Fisika,Kimia) ', 400000),
(12, 6, 'Paket Belajar Komplit - (Biologi , Matematika, Fisika, Kimia)', 400000),
(21, 4, 'Paket Belajar Komplit - (Biologi,Matematika,Fisika,Kimia) ', 800000),
(26, 7, 'Paket Belajar Komplit - (Biologi,Matematika,Fisika,Kimia) ', 800000),
(33, 8, 'Paket Belajar Komplit - (Biologi , Matematika, Fisika, Kimia) + UASBN', 800000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `tanggal_daftar` int(11) NOT NULL,
  `role` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `tanggal_daftar`, `role`) VALUES
(11, 'Admin', 'admin@gmail.com', '$2y$10$h/dMNxsVBwbrYff/Eujk1up1eRT2dTKlMbOqgNj4RTOVoaop4PfMO', 1657897643, 'Admin'),
(15, 'Taufiq Al Azhar', 'taufiqdewa91@gmail.com', '$2y$10$Kp.BrbBu1dd49EF6JsR/aO1sDEoT6imBy.sAFwQz9/nD6z8gcibNy', 1657941853, 'User'),
(16, 'TaufiqA', 'taufiqdewa92@gmail.com', '$2y$10$5hEdu//wL3hjloTm41RGau8RhoQmPSqfCbNPyZgzbId89EPR6H3ii', 1657973473, 'User'),
(18, 'taufiq', 'taufiq@gmail.com', '$2y$10$czPFFdx1v3X7Sr1PFBrD8eLQrZEuAaGwWDKYbrmXi31V9zjURluKy', 1658370786, 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pendaftar`
--
ALTER TABLE `data_pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kelas_fk` (`kelas`),
  ADD KEY `program_fk` (`program_bimbel`),
  ADD KEY `biaya_fk` (`biaya_bimbel`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pendaftar` (`id_pendaftar`),
  ADD KEY `id_fk` (`id_user`);

--
-- Indeks untuk tabel `program_bimbel`
--
ALTER TABLE `program_bimbel`
  ADD PRIMARY KEY (`id_program_bimbel`),
  ADD KEY `id_kelas_fk` (`id_kelas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pendaftar`
--
ALTER TABLE `data_pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT untuk tabel `program_bimbel`
--
ALTER TABLE `program_bimbel`
  MODIFY `id_program_bimbel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pendaftar`
--
ALTER TABLE `data_pendaftar`
  ADD CONSTRAINT `biaya_fk` FOREIGN KEY (`biaya_bimbel`) REFERENCES `program_bimbel` (`id_program_bimbel`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `kelas_fk` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `program_fk` FOREIGN KEY (`program_bimbel`) REFERENCES `program_bimbel` (`id_program_bimbel`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `id_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `id_pendaftar` FOREIGN KEY (`id_pendaftar`) REFERENCES `data_pendaftar` (`id_pendaftar`);

--
-- Ketidakleluasaan untuk tabel `program_bimbel`
--
ALTER TABLE `program_bimbel`
  ADD CONSTRAINT `id_kelas_fk` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
