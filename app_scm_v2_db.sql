-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2021 at 09:56 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_scm_v2_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kandang`
--

CREATE TABLE `tb_kandang` (
  `id` int(11) NOT NULL,
  `nomor_kandang` varchar(20) NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kandang`
--

INSERT INTO `tb_kandang` (`id`, `nomor_kandang`, `kuota`) VALUES
(2, 'Kandang-01', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `username`, `password`, `role`) VALUES
(7, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(8, 'kasir1', '29c748d4d8f4bd5cbc0f3f60cb7ed3d0', 'staff-kasir'),
(9, 'kurniawan', '16ca55b4f29157780eabc6244f49d442', 'staff-kandang'),
(10, 'roy', 'd4c285227493531d0577140a1ed03964', 'staff-gudang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `jumlah_telur` int(11) NOT NULL,
  `jenis_telur` varchar(50) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id`, `pengguna_id`, `tanggal`, `nama_konsumen`, `jumlah_telur`, `jenis_telur`, `harga_satuan`, `nominal_pembayaran`, `created_at`) VALUES
(1, 8, '2021-07-23', 'Pak Kadus', 50, 'A+', 1000, 50000, '2021-07-23 14:49:45'),
(2, 8, '2021-07-23', 'Pak Kadus', 50, 'A', 1100, 55000, '2021-07-23 14:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `tb_persediaan_ayam`
--

CREATE TABLE `tb_persediaan_ayam` (
  `id` int(11) NOT NULL,
  `kandang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_persediaan_ayam`
--

INSERT INTO `tb_persediaan_ayam` (`id`, `kandang_id`, `jumlah`, `tanggal_masuk`) VALUES
(2, 2, 998, '2021-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `kandang_id` int(11) DEFAULT NULL,
  `kode_pesanan` varchar(20) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `usia` int(11) DEFAULT NULL,
  `tanggal_sampai` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `kandang_id`, `kode_pesanan`, `supplier`, `deskripsi`, `jumlah`, `tanggal`, `status`, `usia`, `tanggal_sampai`, `updated_at`) VALUES
(2, 2, 'PE123', 'Japfa', 'Pesanan DOC Baru', 1000, '2021-07-20', 'Sampai', 4, '2021-07-23', '2021-07-23 06:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id` int(11) NOT NULL,
  `kandang_id` int(11) NOT NULL,
  `pengguna_id` int(11) DEFAULT NULL,
  `ayam_id` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah_ayam` int(11) NOT NULL,
  `sakit` int(11) DEFAULT NULL,
  `mati` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `produk` int(11) DEFAULT NULL,
  `ikat` int(11) DEFAULT NULL,
  `piring` int(11) DEFAULT NULL,
  `butir` int(11) DEFAULT NULL,
  `pecah` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_riwayat`
--

INSERT INTO `tb_riwayat` (`id`, `kandang_id`, `pengguna_id`, `ayam_id`, `tanggal`, `jumlah_ayam`, `sakit`, `mati`, `keterangan`, `produk`, `ikat`, `piring`, `butir`, `pecah`, `created_at`) VALUES
(2, 2, 7, 2, '2021-07-23', 1000, NULL, NULL, 'DOC Masuk', NULL, NULL, NULL, NULL, NULL, '2021-07-23 11:23:39'),
(3, 2, 9, 2, '2021-07-23', 1000, 0, 2, '-', 0, 0, 0, 0, 0, '2021-07-23 11:28:02'),
(4, 2, 9, 2, '2021-07-23', 998, 2, 0, '-', 800, NULL, NULL, NULL, NULL, '2021-07-23 13:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_telur`
--

CREATE TABLE `tb_riwayat_telur` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_telur` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_riwayat_telur`
--

INSERT INTO `tb_riwayat_telur` (`id`, `pengguna_id`, `tanggal`, `jenis_telur`, `jumlah`, `created_at`) VALUES
(1, 10, '2021-07-23', 'A+', 150, '2021-07-23 14:23:09'),
(2, 10, '2021-07-23', 'A', 150, '2021-07-23 14:23:19'),
(3, 10, '2021-07-23', 'B', 100, '2021-07-23 14:23:32'),
(4, 10, '2021-07-23', 'C', 100, '2021-07-23 14:23:44'),
(5, 10, '2021-07-23', 'D', 150, '2021-07-23 14:24:02'),
(6, 10, '2021-07-23', 'E', 150, '2021-07-23 14:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff`
--

CREATE TABLE `tb_staff` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `kode_karyawan` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_masuk_kerja` date NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_staff`
--

INSERT INTO `tb_staff` (`id`, `pengguna_id`, `kode_karyawan`, `nama`, `alamat`, `tanggal_masuk_kerja`, `no_hp`) VALUES
(1, 8, 'KASIR-001', 'Kasir 1', 'Kisaran', '2021-06-30', '082369378823'),
(2, 9, 'SK-001', 'Kurniawan', 'kisaran', '2021-06-01', '082369378823'),
(3, 10, 'SG-001', 'Roy Suryo', 'Kisaran', '2021-06-02', '0823693788230');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok_telur`
--

CREATE TABLE `tb_stok_telur` (
  `id` int(11) NOT NULL,
  `jenis_telur` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_stok_telur`
--

INSERT INTO `tb_stok_telur` (`id`, `jenis_telur`, `jumlah`, `created_at`) VALUES
(1, 'A+', 150, '2021-07-23'),
(2, 'A', 150, '2021-07-23'),
(3, 'B', 100, '2021-07-23'),
(4, 'C', 100, '2021-07-23'),
(5, 'D', 150, '2021-07-23'),
(6, 'E', 150, '2021-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_telur`
--

CREATE TABLE `tb_telur` (
  `id` int(11) NOT NULL,
  `jenis_telur` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_telur`
--

INSERT INTO `tb_telur` (`id`, `jenis_telur`, `jumlah`, `created_at`) VALUES
(1, 'A+', 150, '2021-07-23 14:23:09'),
(2, 'A', 150, '2021-07-23 14:23:19'),
(3, 'B', 100, '2021-07-23 14:23:32'),
(4, 'C', 100, '2021-07-23 14:23:45'),
(5, 'D', 150, '2021-07-23 14:24:02'),
(6, 'E', 150, '2021-07-23 14:24:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kandang`
--
ALTER TABLE `tb_kandang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `tb_persediaan_ayam`
--
ALTER TABLE `tb_persediaan_ayam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kandang_id` (`kandang_id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kandang_id` (`kandang_id`),
  ADD KEY `pengguna_id` (`pengguna_id`),
  ADD KEY `ayam_id` (`ayam_id`);

--
-- Indexes for table `tb_riwayat_telur`
--
ALTER TABLE `tb_riwayat_telur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `tb_stok_telur`
--
ALTER TABLE `tb_stok_telur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_telur`
--
ALTER TABLE `tb_telur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kandang`
--
ALTER TABLE `tb_kandang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_persediaan_ayam`
--
ALTER TABLE `tb_persediaan_ayam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_riwayat_telur`
--
ALTER TABLE `tb_riwayat_telur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_staff`
--
ALTER TABLE `tb_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_stok_telur`
--
ALTER TABLE `tb_stok_telur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_telur`
--
ALTER TABLE `tb_telur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `tb_pengguna` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tb_persediaan_ayam`
--
ALTER TABLE `tb_persediaan_ayam`
  ADD CONSTRAINT `tb_persediaan_ayam_ibfk_1` FOREIGN KEY (`kandang_id`) REFERENCES `tb_kandang` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD CONSTRAINT `tb_riwayat_ibfk_1` FOREIGN KEY (`kandang_id`) REFERENCES `tb_kandang` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_riwayat_ibfk_2` FOREIGN KEY (`pengguna_id`) REFERENCES `tb_pengguna` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_riwayat_ibfk_3` FOREIGN KEY (`ayam_id`) REFERENCES `tb_persediaan_ayam` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `tb_riwayat_telur`
--
ALTER TABLE `tb_riwayat_telur`
  ADD CONSTRAINT `tb_riwayat_telur_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `tb_pengguna` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD CONSTRAINT `tb_staff_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `tb_pengguna` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
