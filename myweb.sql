-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 09:47 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(3) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `topik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nim`, `nama`, `tanggal_lahir`, `alamat`, `topik`) VALUES
(1, 'M0518006', 'Annisa qr', '2000-11-16', 'solo', 'a'),
(2, 'M0518028', 'Khoirunnisa', '2000-09-20', 'Fajar Indah', 'b'),
(4, 'cd', 'ab', '2000-11-15', 'efgh', 'Sistem Data'),
(6, 'I01121128', 'ab', '0000-00-00', 'cd', 'Pengolahan Citra');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(30) NOT NULL,
  `id_user` int(30) NOT NULL,
  `user` varchar(50) NOT NULL,
  `action` varchar(255) NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `akses` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `nama`, `akses`) VALUES
(0, 'admin', '$2y$10$GNc87hB30mupRFgyHevfiu/WbzdQemKqai7ht.wtBmxP8V/bpDaoO', 'admin superuser', 0),
(1, 'admin2', '$2y$10$GNc87hB30mupRFgyHevfiu/WbzdQemKqai7ht.wtBmxP8V/bpDaoO', 'admin', 1),
(2, 'Operator', '$2y$10$NbX5PWGv8iguPWrAWeLKJu72BD.UNmHbukT6DB9mj5poND74kg2am', 'Operator', 2),
(5, 'Qr', '$2y$10$CaW0f0z0ZiO7e2/LxB7Mr.QS9gMuDYkxvXvBXFoR31XjU27eVK4Ve', 'Annisa Qr', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sop_pengolahan`
--

CREATE TABLE `sop_pengolahan` (
  `id` int(10) NOT NULL,
  `id_divisi` int(5) NOT NULL,
  `nomor` int(5) NOT NULL,
  `nama_sop` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sop_pengolahan`
--

INSERT INTO `sop_pengolahan` (`id`, `id_divisi`, `nomor`, `nama_sop`, `deskripsi`, `file`) VALUES
(1, 1, 1, 'SOP IT', 'sop it', 'a'),
(2, 2, 2, 'kopkop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation', 'c'),
(3, 1, 2, 'IT SOP2', 'it sop 2', 'fotoqr.jpg'),
(5, 3, 1, 'Nantoka dicoba', 'coba upload', 'A_Comparative_Study_of_Classifier_Based_Mispronunciation_Detection_System_for_Confusing_Arabic_Phoneme_Pairs2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_divisi_sop`
--

CREATE TABLE `tbl_divisi_sop` (
  `id` int(5) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_divisi_sop`
--

INSERT INTO `tbl_divisi_sop` (`id`, `divisi`) VALUES
(1, 'IT'),
(2, 'idk'),
(3, 'nantoka'),
(4, 'bocchi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `id_fakultas` int(5) NOT NULL,
  `fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fakultas`
--

INSERT INTO `tbl_fakultas` (`id_fakultas`, `fakultas`) VALUES
(1, 'Ilmu Budaya'),
(2, 'Hukum'),
(3, 'Ekonomi dan Bisnis'),
(4, 'Ilmu Sosial dan Politik'),
(5, 'Kedokteran'),
(6, 'Pertanian'),
(7, 'Teknik'),
(8, 'Keguruan dan Ilmu Pendidikan'),
(9, 'Matematika dan Ilmu Pengetahuan Alam'),
(10, 'Seni Rupa dan Desain'),
(11, 'Keolahragaan'),
(12, 'Teknologi Informasi dan Sains Data'),
(13, 'Psikologi'),
(14, 'Pascasarjana'),
(15, 'Sekolah Vokasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` int(5) NOT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `kode` varchar(4) NOT NULL,
  `id_fakultas` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `prodi`, `kode`, `id_fakultas`) VALUES
(1, 'Ilmu Sejarah', 'C05', 1),
(2, 'Sastra Arab', 'C10', 1),
(3, 'Hukum Keperdataan', '', 2),
(4, 'Hukum Tata Negara', '', 2),
(5, 'Akuntansi', 'F03', 3),
(6, 'Ekonomi Pembangunan', 'F01', 3),
(7, 'Hubungan Internasional', 'D04', 4),
(8, 'Ilmu Komunikasi', 'D02', 4),
(9, 'Kedokteran', 'G00', 5),
(10, 'Agribisnis', 'H08', 6),
(11, 'Ilmu Tanah', 'H02', 6),
(12, 'Arsitektur', 'I02', 7),
(13, 'Teknik Elektro', 'I07', 7),
(14, 'Bimbingan dan Konseling', 'K31', 8),
(15, 'Pendidikan Akuntansi', 'F23', 8),
(16, 'Biologi', 'M04', 9),
(17, 'Fisika', 'M02', 9),
(18, 'Desain Interior', 'C08', 10),
(19, 'Desain Komunikasi Visual', 'C07', 10),
(20, 'Pendidikan Kepelatihan Olahraga', '', 11),
(21, 'Pendidikan Jasmani Kesehatan dan Rekreasi', '', 11),
(22, 'Informatika', 'M05', 12),
(23, 'Psikologi', 'G01', 13),
(24, 'Biosains', 'S90', 14),
(25, 'Ilmu Gizi', 'S53', 14),
(26, 'Teknik Informatika', 'M31', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sop_pengolahan`
--
ALTER TABLE `sop_pengolahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indexes for table `tbl_divisi_sop`
--
ALTER TABLE `tbl_divisi_sop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sop_pengolahan`
--
ALTER TABLE `sop_pengolahan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_divisi_sop`
--
ALTER TABLE `tbl_divisi_sop`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  MODIFY `id_fakultas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sop_pengolahan`
--
ALTER TABLE `sop_pengolahan`
  ADD CONSTRAINT `sop_pengolahan_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `tbl_divisi_sop` (`id`);

--
-- Constraints for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD CONSTRAINT `tbl_prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `tbl_fakultas` (`id_fakultas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
