-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 04:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `berita_ID` char(4) NOT NULL,
  `berita_JUDUL` varchar(120) NOT NULL,
  `berita_ISI` text NOT NULL,
  `berita_SUMBER` varchar(120) NOT NULL,
  `kategori_ID` char(4) NOT NULL,
  `berita_FOTO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`berita_ID`, `berita_JUDUL`, `berita_ISI`, `berita_SUMBER`, `kategori_ID`, `berita_FOTO`) VALUES
('1', 'as', 'qw', 'zx', '', ''),
('123', 'Barca', 'win', 'Gacor Kang', 'KW01', ''),
('123A', 'Barca', '4-1!!!', 'Gacor Kang', '', ''),
('p', 'p', 'p', 'p', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `destinasiwisata`
--

CREATE TABLE `destinasiwisata` (
  `kode_destinasi` int(11) NOT NULL,
  `nama_destinasi` varchar(120) NOT NULL,
  `alamat_destinasi` varchar(30) NOT NULL,
  `keterangan_destinasi` varchar(30) NOT NULL,
  `kode_kecamatan` int(11) NOT NULL,
  `foto_destinasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasiwisata`
--

INSERT INTO `destinasiwisata` (`kode_destinasi`, `nama_destinasi`, `alamat_destinasi`, `keterangan_destinasi`, `kode_kecamatan`, `foto_destinasi`) VALUES
(9, 'xcvasd', 'awewqe', 'hitam', 45, ''),
(56, 'xcvasd', 'asfda', 'jnsjdfknsjdnf', 45, ''),
(123, 'barca', 'neg', 'hitam', 32, '');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kode_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` varchar(120) NOT NULL,
  `kode_provinsi` int(11) NOT NULL,
  `foto_kabupaten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`kode_kabupaten`, `nama_kabupaten`, `kode_provinsi`, `foto_kabupaten`) VALUES
(45, 'legam', 9, ''),
(123, 'jomokerto', 69, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_ID` char(4) NOT NULL,
  `kategori_NAMA` char(30) NOT NULL,
  `kategori_KET` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_ID`, `kategori_NAMA`, `kategori_KET`) VALUES
('KW01', 'Budaya', 'merupakan kelompok obyek wisata yang terjadi pada masa lampau dan masih dilestarikan sampai pada masa sekarang'),
('KW02', 'Alam', 'Kawasan wisata yang berada di bukit dan pegunungan');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kode_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(120) NOT NULL,
  `kode_kabupaten` int(11) NOT NULL,
  `foto_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kode_kecamatan`, `nama_kecamatan`, `kode_kabupaten`, `foto_kecamatan`) VALUES
(32, 'barca', 123, ''),
(45, 'legam', 123, '');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `kode_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(120) NOT NULL,
  `foto_provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`kode_provinsi`, `nama_provinsi`, `foto_provinsi`) VALUES
(9, 'asdjkbas', ''),
(69, 'ngawi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_ID`);

--
-- Indexes for table `destinasiwisata`
--
ALTER TABLE `destinasiwisata`
  ADD PRIMARY KEY (`kode_destinasi`),
  ADD KEY `kode_kecamatan` (`kode_kecamatan`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kode_kabupaten`),
  ADD KEY `kode_provinsi` (`kode_provinsi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_ID`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kode_kecamatan`),
  ADD KEY `kode _kabupaten` (`kode_kabupaten`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`kode_provinsi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destinasiwisata`
--
ALTER TABLE `destinasiwisata`
  ADD CONSTRAINT `destinasiwisata_ibfk_1` FOREIGN KEY (`kode_kecamatan`) REFERENCES `kecamatan` (`kode_kecamatan`);

--
-- Constraints for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`kode_provinsi`) REFERENCES `provinsi` (`kode_provinsi`);

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`kode_kabupaten`) REFERENCES `kabupaten` (`kode_kabupaten`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
