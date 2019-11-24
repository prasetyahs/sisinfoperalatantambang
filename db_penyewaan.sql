-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2019 pada 18.35
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penyewaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `id_category` varchar(30) NOT NULL,
  `nama_category` varchar(20) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`id_category`, `nama_category`, `nilai`) VALUES
('KTG-45312', 'Camera', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kualitas`
--

CREATE TABLE `tb_kualitas` (
  `id_kualitas` varchar(30) NOT NULL,
  `nama_kualitas` varchar(30) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kualitas`
--

INSERT INTO `tb_kualitas` (`id_kualitas`, `nama_kualitas`, `nilai`) VALUES
('KLL-44588', 'Bagus', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_merk`
--

CREATE TABLE `tb_merk` (
  `id_merk` varchar(30) NOT NULL,
  `nama_merk` varchar(30) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_merk`
--

INSERT INTO `tb_merk` (`id_merk`, `nama_merk`, `nilai`) VALUES
('KTG-49939', 'Guangdoang', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` varchar(30) NOT NULL,
  `id_sewa` varchar(30) NOT NULL,
  `pembayaran_awal` int(11) NOT NULL,
  `pembayaran_akhir` int(11) NOT NULL,
  `status_pembayaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyewaaan`
--

CREATE TABLE `tb_penyewaaan` (
  `id_sewa` varchar(30) NOT NULL,
  `id_users` varchar(30) NOT NULL,
  `id_product` varchar(30) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `alamat` text NOT NULL,
  `alamat_pt` text NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `status_penyewaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` varchar(30) NOT NULL,
  `nama_product` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_kualitas` varchar(30) NOT NULL,
  `id_merk` varchar(30) NOT NULL,
  `id_tujuan` varchar(30) NOT NULL,
  `id_category` varchar(30) NOT NULL,
  `berat` int(11) NOT NULL,
  `kedalaman` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `nama_product`, `harga`, `id_kualitas`, `id_merk`, `id_tujuan`, `id_category`, `berat`, `kedalaman`, `foto`) VALUES
('PRO-27236', 'Mesin Bor Listrik', 2500000, 'KLL-44588', 'KTG-49939', 'TJ-64930', 'KTG-45312', 2, 0, '06d7c7ec784d300f9a3174f0b3123804.jpg'),
('PRO-31127', 'Mesin Bor', 1000000, 'KLL-44588', 'KTG-49939', 'TJ-64930', 'KTG-45312', 2, 100, '3aaf24f8d182cef27f3ee7e7a679a309.jpg'),
('PRO-49108', 'Dazzer', 1000000, 'KLL-44588', 'KTG-49939', 'TJ-64930', 'KTG-45312', 100, 100, 'a43301568043e1ec870fc95a827d5c9c.jpg'),
('PRO-59130', 'Mobil Semen', 1000000, 'KLL-44588', 'KTG-49939', 'TJ-64930', 'KTG-45312', 2, 100, '5beed6322133a6d0db8ed8860a867279.jpg'),
('PRO-80812', 'borehole camera', 2000000, 'KLL-44588', 'KTG-49939', 'TJ-64930', 'KTG-45312', 50, 0, 'cb37703c04d9861d431159f3ad5b53e5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tujuan`
--

CREATE TABLE `tb_tujuan` (
  `id_tujuan` varchar(30) NOT NULL,
  `nama_tujuan` text NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tujuan`
--

INSERT INTO `tb_tujuan` (`id_tujuan`, `nama_tujuan`, `nilai`) VALUES
('TJ-64930', 'Menyediakan jasa borehole camera untuk sumur bor (deep well), menggunakan alat borehole camera dengan dual kamera (bawah dan samping) untuk menangkap gambar secara maksimal. Dapat digunakan untuk perekaman konstruksi sumur antara lain mengetahui kedalaman sumur, mengetahui jumlah saringan (screen), mengetahui posisi kerusakan pada dinding sumur.', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` varchar(30) NOT NULL,
  `nama_depan` varchar(15) NOT NULL,
  `nama_belakang` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nomor_telp` varchar(13) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `nama_depan`, `nama_belakang`, `email`, `nomor_telp`, `password`, `type`) VALUES
('USR-52', 'prima', 'genta', 'gentaprima600@gmail.com', '088998886169', '41ad1bd82a8744f040c267fdcafa54e8', 0),
('USR-58', 'prasetya', 'google', 'prasetya2421@gmail.com', '089746736284\'', 'b8f8312b939f00abb38eeafd4fd107', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `tb_kualitas`
--
ALTER TABLE `tb_kualitas`
  ADD PRIMARY KEY (`id_kualitas`);

--
-- Indeks untuk tabel `tb_merk`
--
ALTER TABLE `tb_merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indeks untuk tabel `tb_penyewaaan`
--
ALTER TABLE `tb_penyewaaan`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_kualitas` (`id_kualitas`),
  ADD KEY `id_merk` (`id_merk`),
  ADD KEY `id_tujuan` (`id_tujuan`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeks untuk tabel `tb_tujuan`
--
ALTER TABLE `tb_tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `tb_penyewaaan` (`id_sewa`);

--
-- Ketidakleluasaan untuk tabel `tb_penyewaaan`
--
ALTER TABLE `tb_penyewaaan`
  ADD CONSTRAINT `tb_penyewaaan_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tb_product` (`id_product`),
  ADD CONSTRAINT `tb_penyewaaan_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `tb_users` (`id_users`);

--
-- Ketidakleluasaan untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `tb_product_ibfk_1` FOREIGN KEY (`id_kualitas`) REFERENCES `tb_kualitas` (`id_kualitas`),
  ADD CONSTRAINT `tb_product_ibfk_2` FOREIGN KEY (`id_merk`) REFERENCES `tb_merk` (`id_merk`),
  ADD CONSTRAINT `tb_product_ibfk_3` FOREIGN KEY (`id_tujuan`) REFERENCES `tb_tujuan` (`id_tujuan`),
  ADD CONSTRAINT `tb_product_ibfk_4` FOREIGN KEY (`id_category`) REFERENCES `tb_category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
