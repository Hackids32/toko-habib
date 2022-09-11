-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Sep 2022 pada 16.20
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokohabib`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(25) DEFAULT NULL,
  `id_jenis` int(15) DEFAULT NULL,
  `id_satuan` int(15) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `harga_jual` int(10) NOT NULL,
  `stok` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_jenis`, `id_satuan`, `harga`, `harga_jual`, `stok`) VALUES
('BRG-0002', 'Sinar Dunia', 1, 1, 540000, 0, 85),
('BRG-0003', 'Natural A4', 3, 1, 210000, 0, 105),
('BRG-0004', 'Natural F4', 3, 1, 175000, 0, 99),
('BRG-0005', 'My Gel', 2, 2, 600000, 0, 89),
('BRG-0006', 'Pilot', 2, 2, 182000, 0, 109),
('BRG-0007', 'Standar 007', 2, 2, 156000, 0, 110),
('BRG-0008', 'Grebel-12', 4, 4, 205000, 0, 109),
('BRG-0009', 'Fabercastell-12', 4, 4, 220000, 0, 111),
('BRG-0010', 'Joyko', 6, 5, 55000, 65000, 7),
('BRG-0011', 'Snowman', 7, 6, 68000, 72000, 9),
('BRG-0012', 'Paperline', 1, 1, 560000, 600000, 90),
('BRG-0013', 'Bintang Obor', 1, 1, 510000, 550000, 70),
('BRG-0014', 'Copier A4', 3, 1, 192000, 210000, 36),
('BRG-0016', 'Bintang Abadi', 1, 1, 980000, 990000, 100),
('BRG-0017', 'Joyko', 26, 5, 40000, 50000, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` varchar(20) NOT NULL,
  `id_reseller` varchar(20) NOT NULL,
  `id_barang` varchar(25) NOT NULL,
  `id_jenis` varchar(25) NOT NULL,
  `id_satuan` varchar(25) NOT NULL,
  `jumlah_keluar` int(20) NOT NULL,
  `harga_kel` int(25) NOT NULL,
  `tgl_keluar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_reseller`, `id_barang`, `id_jenis`, `id_satuan`, `jumlah_keluar`, `harga_kel`, `tgl_keluar`) VALUES
('BRG-K-0001', 'RES-003', 'BRG-0014', '3', '1', 21, 190000, '2022-02-19'),
('BRG-K-0002', 'RES-004', 'BRG-0014', '3', '1', 19, 192000, '2022-02-28'),
('BRG-K-0003', 'RES-002', 'BRG-0005', '2', '2', 10, 610000, '2022-04-13'),
('BRG-K-0004', 'RES-003', 'BRG-0002', '1', '1', 15, 930000, '2022-07-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` varchar(30) NOT NULL,
  `id_supplier` varchar(30) NOT NULL,
  `id_barang` varchar(30) NOT NULL,
  `id_jenis` varchar(20) NOT NULL,
  `id_satuan` int(25) NOT NULL,
  `jumlah_masuk` int(20) NOT NULL,
  `harga_msk` int(25) NOT NULL,
  `tgl_masuk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_supplier`, `id_barang`, `id_jenis`, `id_satuan`, `jumlah_masuk`, `harga_msk`, `tgl_masuk`) VALUES
('BRG-M-0001', 'SPLY-005', 'BRG-0015', '5', 2, 12, 96000, '2022-01-04'),
('BRG-M-0002', 'SPLY-004', 'BRG-0009', '4', 4, 12, 220000, '2022-03-17'),
('BRG-M-0003', 'SPLY-003', 'BRG-0007', '2', 2, 11, 156000, '2022-05-31'),
('BRG-M-0004', 'SPLY-001', 'BRG-0006', '2', 2, 10, 182000, '2022-05-18'),
('BRG-M-0005', 'SPLY-005', 'BRG-0011', '7', 6, 2, 68000, '2022-01-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(20) NOT NULL,
  `nama_jenis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Buku Tulis'),
(2, 'Pena'),
(3, 'HVS'),
(4, 'Pensil Warna'),
(5, 'Pensil'),
(6, 'Penghapus'),
(7, 'Spidol'),
(9, 'Penggaris'),
(10, 'Stabilo'),
(11, 'Peruncing'),
(12, 'Tipe X'),
(13, 'Kotak Pensil'),
(14, 'Lakban'),
(15, 'Map Ordner'),
(16, 'Kertas'),
(17, 'Buku Gambar'),
(18, 'Tinta Printer'),
(19, 'Klep'),
(20, 'Kalkulator'),
(21, 'Gunting'),
(22, 'Pisau'),
(23, 'Lem'),
(24, 'Jangka'),
(26, 'Crayon'),
(28, 'Map '),
(29, 'Map Kertas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanbarang`
--

CREATE TABLE `pesanbarang` (
  `id` int(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_jenis` int(255) NOT NULL,
  `id_satuan` int(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `reseller` varchar(255) NOT NULL,
  `verifikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanbarang`
--

INSERT INTO `pesanbarang` (`id`, `id_barang`, `id_jenis`, `id_satuan`, `harga`, `jumlah`, `total`, `reseller`, `verifikasi`) VALUES
(16, 'BRG-0011', 7, 6, '72000', '10', '720000', 'Wahyu-RE', 'Dikirim'),
(17, 'BRG-0012', 1, 1, '600000', '2', '1200000', 'Wahyu-RE', 'Dikirim'),
(18, 'BRG-0013', 1, 1, '550000', '3', '1650000', 'Wahyu-RE', 'Ditolak'),
(19, 'BRG-0016', 1, 1, '990000', '94', '93060000', 'Wahyu-RE', 'Dikirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reseller`
--

CREATE TABLE `reseller` (
  `id_reseller` varchar(25) NOT NULL,
  `nama_reseller` varchar(25) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `alamat` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reseller`
--

INSERT INTO `reseller` (`id_reseller`, `nama_reseller`, `notelp`, `alamat`) VALUES
('RES-001', 'Pustaka Ilmu', '08987654321', 'Payakumbuh'),
('RES-002', 'Sinar Harapan', '08123453221', 'Baso'),
('RES-003', 'Toko Habib 1', '23112', 'Jl. Minangkabau Ps.Atas'),
('RES-004', 'Toko Habib 2', '1234', 'Pasar Banto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(20) NOT NULL,
  `nama_satuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Dus'),
(2, 'Gross'),
(4, 'Pak'),
(5, 'Box'),
(6, 'Lusin'),
(7, 'Roll'),
(8, 'Pcs'),
(9, 'Kodi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(25) NOT NULL,
  `nama_supplier` varchar(30) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `alamat` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `notelp`, `alamat`) VALUES
('SPLY-001', 'Toko Hikmah', '08987654321', 'Pekanbaru'),
('SPLY-003', 'Toko Yude Utama', '08123456853', 'Pekanbaru'),
('SPLY-004', 'Jaya Stationery', '08126643600', 'Solok'),
('SPLY-005', 'Standart', '085272727848', 'Padang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `notelp` varchar(25) NOT NULL,
  `level` enum('admin','karyawan','owner','reseller') NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `alamat`, `notelp`, `level`, `password`, `foto`) VALUES
('USR-001', 'Wahyu', 'admin', 'Padang', '082383279460', 'admin', '0192023a7bbd73250516f069df18b500', 'man.png'),
('USR-002', 'Budiman', 'owner', 'Bukittinggi', '081234567890', 'owner', '5be057accb25758101fa5eadbbd79503', 'hitam1.png'),
('USR-003', 'Farel', 'karyawan', 'Bukittinggi', '081234567890', 'karyawan', '9e014682c94e0f2cc834bf7348bda428', 'user.png'),
('USR-004', 'Wahyu-RE', 'reseller', 'Bukittinggi', '081234567890', 'reseller', '9efc4ac970619de711752d818c29884a', 'user.png'),
('USR-005', 'Sinar Harapan', 'sinarharapan', 'Baso', '0082383279460', 'reseller', 'efd45aa8e6687cb6519d926b2faf43f1', 'user.png'),
('USR-006', 'a', 'a', 'a', '1', 'admin', '96e79218965eb72c92a549dd5a330112', 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `pesanbarang`
--
ALTER TABLE `pesanbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`id_reseller`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pesanbarang`
--
ALTER TABLE `pesanbarang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
