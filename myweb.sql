-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 11:04 AM
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
-- Table structure for table `list_ebook`
--

CREATE TABLE `list_ebook` (
  `id` int(5) NOT NULL,
  `nama_buku` varchar(50) DEFAULT NULL,
  `tahun` varchar(20) NOT NULL,
  `link_buku` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_ebook`
--

INSERT INTO `list_ebook` (`id`, `nama_buku`, `tahun`, `link_buku`) VALUES
(1, 'ScienceDirect', '2015', 'https://library.uns.ac.id/sciencedirect-e-book/'),
(2, 'SpringerLink', '2005', 'https://library.uns.ac.id/wp-content/uploads/2016/02/SPRINGERLINK-Ebook-2005x.xlsx'),
(3, 'SpringerLink', '2013-2016', 'https://library.uns.ac.id/wp-content/uploads/2017/06/eBook-list-2013-2016.xlsx'),
(4, 'SpringerLink', '2016', 'https://library.uns.ac.id/wp-content/uploads/2016/02/b.-SPRINGERLINK-Ebook_2017_website.xlsx'),
(5, 'SpringerLink', '2017', 'https://library.uns.ac.id/wp-content/uploads/2018/12/pengadaan-2018.xlsx'),
(6, 'SpringerLink', '2019', 'https://library.uns.ac.id/wp-content/uploads/2020/01/SpringerLink-e_book-2019.xlsx'),
(7, 'EBSCO', '2013 - 2014', 'https://library.uns.ac.id/ebsco-e-book/'),
(8, 'ProQuest', '2014 - 2015', 'https://library.uns.ac.id/ebrary-e-book/');

-- --------------------------------------------------------

--
-- Table structure for table `list_ejournal`
--

CREATE TABLE `list_ejournal` (
  `id` int(5) NOT NULL,
  `nama_jurnal` varchar(50) DEFAULT NULL,
  `link_jurnal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_ejournal`
--

INSERT INTO `list_ejournal` (`id`, `nama_jurnal`, `link_jurnal`) VALUES
(1, 'ScienceDirect', 'https://www.elsevier.com/solutions/sciencedirect/content/journal-title-lists');

-- --------------------------------------------------------

--
-- Table structure for table `list_koran`
--

CREATE TABLE `list_koran` (
  `id` int(5) NOT NULL,
  `nama_koran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_koran`
--

INSERT INTO `list_koran` (`id`, `nama_koran`) VALUES
(1, 'Bisnis Indonesia'),
(2, 'Jakarta Post'),
(3, 'Jawa Pos'),
(4, 'Kedaulatan Rakyat'),
(5, 'Kompas'),
(6, 'Media Indonesia'),
(7, 'Republika'),
(8, 'Solo Pos'),
(9, 'Suara Merdeka'),
(12, 'coba');

-- --------------------------------------------------------

--
-- Table structure for table `list_majalah`
--

CREATE TABLE `list_majalah` (
  `id` int(5) NOT NULL,
  `nama_majalah` varchar(50) DEFAULT NULL,
  `tahun_dari` varchar(10) DEFAULT NULL,
  `tahun_hingga` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_majalah`
--

INSERT INTO `list_majalah` (`id`, `nama_majalah`, `tahun_dari`, `tahun_hingga`) VALUES
(1, 'National Geographic', '1993', 'present'),
(2, 'Bola (Bulletin)', '2014', '2017'),
(3, 'Horizon', '2000', '2016'),
(4, 'Info Komputer', '1993', 'present'),
(5, 'Intisari', '1978', 'present'),
(6, 'Peluang Usaha (Bulletin)', '2014', '2016'),
(7, 'Penjebar Semangat', '1989', 'present'),
(8, 'Properti', '2010', 'present'),
(9, 'SWA', '1993', 'present'),
(10, 'Tempo', '1977', 'present'),
(11, 'National Geographic', '1976', '1980'),
(12, NULL, '2011', 'present'),
(13, 'National Geographic Traveler', '2009', 'present'),
(14, 'National Geographic Kids', '2011', 'present'),
(15, 'Laras', '2010', '2015'),
(16, 'Nirmala', '2000', '2013'),
(17, 'Warta Ekonomi', '1993', '2016');

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
(2, 'Operator', '$2y$10$UDcvYFLgAa5ShBpB6WUl1uMuyKJSjOW/6E0hLBf7Hba1oAdtG1Yie', 'Operator', 2),
(5, 'Qr', '$2y$10$CaW0f0z0ZiO7e2/LxB7Mr.QS9gMuDYkxvXvBXFoR31XjU27eVK4Ve', 'Annisa Qr', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `program_studi` varchar(100) NOT NULL,
  `judul_buku` varchar(500) NOT NULL,
  `nama_pengarang` varchar(500) NOT NULL,
  `penerbit` varchar(500) NOT NULL,
  `tahun_publikasi` year(4) NOT NULL,
  `isbn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sop_pengolahan`
--

CREATE TABLE `sop_pengolahan` (
  `id` int(10) NOT NULL,
  `id_divisi` int(5) NOT NULL,
  `nomor` varchar(40) NOT NULL,
  `nama_sop` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sop_pengolahan`
--

INSERT INTO `sop_pengolahan` (`id`, `id_divisi`, `nomor`, `nama_sop`, `deskripsi`, `file`) VALUES
(1, 1, '01.TIK/UN27.34/OT.01.00/2023', 'SOP IT', 'sop it', 'a'),
(2, 2, '01.Pengolahan/UN27.34/OT.01.00/2023', 'Pengolahan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation', 'c'),
(3, 1, '02.TIK/UN27.34/OT.01.00/2023', 'IT SOP2', 'it sop 2', 'fotoqr.jpg'),
(5, 3, '01.Sirkulasi/UN27.34/OT.01.00/2023', 'Sirkulasi', 'coba upload', 'A_Comparative_Study_of_Classifier_Based_Mispronunciation_Detection_System_for_Confusing_Arabic_Phoneme_Pairs2.pdf');

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
(2, 'Pengolahan'),
(3, 'Sirkulasi');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pustakawan`
--

CREATE TABLE `tbl_pustakawan` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pangkat` varchar(5) NOT NULL,
  `fungsional` varchar(50) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pendidikan_lain` varchar(50) NOT NULL,
  `pendidikan_tertinggi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pustakawan`
--

INSERT INTO `tbl_pustakawan` (`id`, `nama`, `pangkat`, `fungsional`, `pendidikan`, `pendidikan_lain`, `pendidikan_tertinggi`) VALUES
(1, 'Dra. Tri Hardiningtyas, M.Si.', 'IV/c	', 'Pustakawan Madya', 'S2 Ilmu Perpustakaan', '', 'Master'),
(2, 'Daryono, S.Sos.,  MIP.', 'IV/b', 'Pustakawan Madya', 'S2 Ilmu Perpustakaan', '', 'Master'),
(3, 'Bambang Hermanto, S.Pd. MIP.', 'IV/c', 'Pustakawan Madya', 'S2 Ilmu Perpustakaan', '', 'Master'),
(4, 'Dinar Puspitadewi, MIP.', 'III/d', 'Pustakawan Muda', 'S2 Ilmu Perpustakaan', '', 'Master'),
(5, 'Masriyatun, MIP.', 'IV/b', 'Pustakawan Madya', 'S2 Ilmu Perpustakaan', '', 'Master'),
(6, 'Haryanto, MIP.', 'III/c', 'Pustakawan Muda', 'S2 Ilmu Perpustakaan', '', 'Master'),
(7, 'Dian Hapsari, MIP.', 'III/c', 'Pustakawan Muda', 'S2 Ilmu Perpustakaan', '', 'Master'),
(8, 'Suroto, S.Sos., MIP.', 'III/c', 'Pustakawan Muda', 'S2 Ilmu Perpustakaan', '', 'Master'),
(9, 'Sri Anawati, S.Sos.,MIP.', 'III/d', 'Pustakawan Muda', 'S2 Ilmu Perpustakaan', '', 'Master'),
(10, 'Sri Utari, SE., M.A.', 'III/d', 'Pustakawan Muda', 'S2 Ilmu Perpustakaan', '', 'Master'),
(11, 'Henny Perwitosari, S.I.Pust.', 'III/d', 'Pustakawan Muda', 'S1 Ilmu Perpustakaan', '', 'Sarjana'),
(12, 'Aris Suprihadi, SIP.', 'III/d', 'Pustakawan Muda', 'S1 Ilmu Perpustakaan', '', 'Sarjana'),
(13, 'Muhammad Sholihin, S.Ag., SIP.', 'III/b', 'Pustakawan Muda', 'S1 Ilmu Perpustakaan', '', 'Sarjana'),
(14, 'Riah Wiratningsih, M.Si.', 'IV/b', 'Pustakawan Madya', 'D3 Ilmu Perpustakaan + Diklat Alih Jalur', 'S2 Komunikasi', 'Master'),
(15, 'Hermy Yuliati. S.Sos.', 'III/b', 'Pustakawan Pertama', 'D3 Ilmu Perpustakaan + Diklat Alih Jalur', 'S1 Administrasi Negara', 'Sarjana'),
(16, 'Aji Hartono, SE.', 'III/a', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', 'S1 Ekonomi', 'Sarjana'),
(17, 'Novi Tri Astuti, A.Md.', 'III/a', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', '', 'Diploma'),
(18, 'Dewi Tri Pujiastuti, A.Md.', 'III/b', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', '', 'Diploma'),
(19, 'Agus Sriyono, A.Md.', 'II/d', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', '', 'Diploma'),
(20, 'Wiji Lestari, A.Md.', 'III/a', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', '', 'Diploma'),
(21, 'Nurul Hidayah, A.Md.', 'III/c', 'Pustakawan Penyelia', 'D3 Ilmu Perpustakaan', '', 'Diploma'),
(22, 'Sri Maryati Ratnaningsih, A.Md.', 'III/b', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', '', 'Diploma'),
(23, 'Utami Wisnu Wardhani, A.Md.', 'III/a', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', '', 'Diploma'),
(24, 'Achmad Nur Chamdi, S.Pt., M.Si.', 'III/d', 'Pustakawan Muda', 'Inpassing', 'S2 Ekonomi Pertanian', 'Master'),
(25, 'Sugeng Widaryatno, S.IP..', 'III/d', 'Pustakawan Muda', 'Inpassing', 'S1 Administrasi Negara', 'Sarjana'),
(26, 'Lilis Sulistyaningsih, SH.', 'III/d', 'Pustakawan Madya', 'Diklat Alih Jalur', 'S1 Ilmu Hukum', 'Sarjana'),
(27, 'Suyanto, SE.', 'III/b', 'Pustakawan Muda', 'Diklat Alih Jalur', 'S1 Ekonomi	', 'Sarjana'),
(28, 'Nurindrastuti, SS.', 'III/b', 'Pustakawan Pertama', 'Diklat Alih Jalur', 'S1 Sastra', 'Sarjana'),
(29, 'Retno Indarwati', 'III/d', 'Pustakawan Penyelia', 'Inpassing', 'SMEA', 'SMA/Sederajat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_ebook`
--
ALTER TABLE `list_ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_ejournal`
--
ALTER TABLE `list_ejournal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_koran`
--
ALTER TABLE `list_koran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_majalah`
--
ALTER TABLE `list_majalah`
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
-- Indexes for table `tbl_pustakawan`
--
ALTER TABLE `tbl_pustakawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `list_ebook`
--
ALTER TABLE `list_ebook`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `list_ejournal`
--
ALTER TABLE `list_ejournal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `list_koran`
--
ALTER TABLE `list_koran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `list_majalah`
--
ALTER TABLE `list_majalah`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `tbl_pustakawan`
--
ALTER TABLE `tbl_pustakawan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
