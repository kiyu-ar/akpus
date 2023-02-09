-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Feb 09, 2023 at 06:34 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6
=======
-- Waktu pembuatan: 08 Feb 2023 pada 04.23
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2
>>>>>>> 260eb6eb19dff255c50a6ee00a64953486cf80b2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
<<<<<<< HEAD
-- Table structure for table `changelog`
=======
-- Struktur dari tabel `anggota`
>>>>>>> 260eb6eb19dff255c50a6ee00a64953486cf80b2
--

CREATE TABLE `changelog` (
  `id` int(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_tabel` varchar(20) NOT NULL,
  `item_id` int(50) NOT NULL,
  `action` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `file` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
<<<<<<< HEAD
-- Dumping data for table `changelog`
=======
-- Dumping data untuk tabel `anggota`
>>>>>>> 260eb6eb19dff255c50a6ee00a64953486cf80b2
--

INSERT INTO `changelog` (`id`, `id_user`, `nama_tabel`, `item_id`, `action`, `tanggal`, `file`) VALUES
(1, 0, '', 0, 'input awal', '2023-02-08 16:39:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `list_anggaran`
--

CREATE TABLE `list_anggaran` (
  `id` int(11) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `nominal` int(20) NOT NULL,
  `jenis` int(1) NOT NULL COMMENT '(0:internal, 1:external)',
  `update_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_anggaran`
--

INSERT INTO `list_anggaran` (`id`, `asal`, `nominal`, `jenis`, `update_id`) VALUES
(1, 'UNS Pusat', 2000000, 0, 0),
(2, 'UPT Perpustakaan', 500000, 0, 0),
(3, 'Pemkot Surakarta', 35000000, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_ebook`
--

CREATE TABLE `list_ebook` (
  `id` int(5) NOT NULL,
  `nama_buku` varchar(50) DEFAULT NULL,
  `tahun` varchar(20) NOT NULL,
  `link_buku` varchar(255) DEFAULT NULL,
  `update_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_ebook`
--

INSERT INTO `list_ebook` (`id`, `nama_buku`, `tahun`, `link_buku`, `update_id`) VALUES
(1, 'ScienceDirect', '2015', 'https://library.uns.ac.id/sciencedirect-e-book/', 0),
(2, 'SpringerLink', '2005', 'https://library.uns.ac.id/wp-content/uploads/2016/02/SPRINGERLINK-Ebook-2005x.xlsx', 0),
(3, 'SpringerLink', '2013-2016', 'https://library.uns.ac.id/wp-content/uploads/2017/06/eBook-list-2013-2016.xlsx', 0),
(4, 'SpringerLink', '2016', 'https://library.uns.ac.id/wp-content/uploads/2016/02/b.-SPRINGERLINK-Ebook_2017_website.xlsx', 0),
(5, 'SpringerLink', '2017', 'https://library.uns.ac.id/wp-content/uploads/2018/12/pengadaan-2018.xlsx', 0),
(6, 'SpringerLink', '2019', 'https://library.uns.ac.id/wp-content/uploads/2020/01/SpringerLink-e_book-2019.xlsx', 0),
(7, 'EBSCO', '2013 - 2014', 'https://library.uns.ac.id/ebsco-e-book/', 0),
(8, 'ProQuest', '2014 - 2015', 'https://library.uns.ac.id/ebrary-e-book/', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_ejournal`
--

CREATE TABLE `list_ejournal` (
  `id` int(5) NOT NULL,
  `nama_jurnal` varchar(50) DEFAULT NULL,
  `link_jurnal` varchar(255) DEFAULT NULL,
  `update_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_ejournal`
--

INSERT INTO `list_ejournal` (`id`, `nama_jurnal`, `link_jurnal`, `update_id`) VALUES
(1, 'ScienceDirect', 'https://www.elsevier.com/solutions/sciencedirect/content/journal-title-lists', 0);

-- --------------------------------------------------------

--
-- Table structure for table `list_kerjasama`
--

CREATE TABLE `list_kerjasama` (
  `id` int(10) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `tanggal_dari` date NOT NULL,
  `tanggal_hingga` date NOT NULL,
  `update_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_kerjasama`
--

INSERT INTO `list_kerjasama` (`id`, `instansi`, `tanggal_dari`, `tanggal_hingga`, `update_id`) VALUES
(1, 'Prodi Informatika', '2023-02-01', '2023-02-03', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_koran`
--

CREATE TABLE `list_koran` (
  `id` int(5) NOT NULL,
  `nama_koran` varchar(50) DEFAULT NULL,
  `update_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_koran`
--

INSERT INTO `list_koran` (`id`, `nama_koran`, `update_id`) VALUES
(1, 'Bisnis Indonesia', 0),
(2, 'Jakarta Post', 0),
(3, 'Jawa Pos', 0),
(4, 'Kedaulatan Rakyat', 0),
(5, 'Kompas', 0),
(6, 'Media Indonesia', 0),
(7, 'Republika', 0),
(8, 'Solo Pos', 0),
(9, 'Suara Merdeka', 0),
(12, 'coba', 0);

-- --------------------------------------------------------

--
-- Table structure for table `list_kunjungan`
--

CREATE TABLE `list_kunjungan` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `instansi` text NOT NULL,
  `tujuan` varchar(500) NOT NULL,
  `jumlah_tamu` int(11) NOT NULL,
  `dokumentasi` varchar(500) NOT NULL,
  `update_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_kunjungan`
--

INSERT INTO `list_kunjungan` (`id`, `tanggal`, `instansi`, `tujuan`, `jumlah_tamu`, `dokumentasi`, `update_id`) VALUES
(1, '2023-02-07 11:40:00', 'Instansi Uji Coba 1', 'Uji Coba 1', 50, 'JADWAL_KULIAH_SEMESTER_GENAP_2022-2023.pdf', 0),
(2, '2023-02-07 11:41:00', 'Instansi Uji Coba 2', 'Uji Coba 2', 30, 'Pembagian_ruang_tempat_magang.pdf', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_kunjungan`
--

CREATE TABLE `list_kunjungan` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `instansi` text NOT NULL,
  `tujuan` varchar(500) NOT NULL,
  `jumlah_tamu` int(11) NOT NULL,
  `dokumentasi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `list_kunjungan`
--

INSERT INTO `list_kunjungan` (`id`, `tanggal`, `instansi`, `tujuan`, `jumlah_tamu`, `dokumentasi`) VALUES
(12, '2023-02-07 11:40:00', 'Instansi Uji Coba 1', 'Uji Coba 1', 50, 'JADWAL_KULIAH_SEMESTER_GENAP_2022-2023.pdf'),
(13, '2023-02-07 11:41:00', 'Instansi Uji Coba 2', 'Uji Coba 2', 30, 'Pembagian_ruang_tempat_magang.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_majalah`
--

CREATE TABLE `list_majalah` (
  `id` int(5) NOT NULL,
  `nama_majalah` varchar(50) DEFAULT NULL,
  `tahun_dari` varchar(10) DEFAULT NULL,
  `tahun_hingga` varchar(10) DEFAULT NULL,
  `update_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_majalah`
--

INSERT INTO `list_majalah` (`id`, `nama_majalah`, `tahun_dari`, `tahun_hingga`, `update_id`) VALUES
(1, 'National Geographic', '1993', 'present', 0),
(2, 'Bola (Bulletin)', '2014', '2017', 0),
(3, 'Horizon', '2000', '2016', 0),
(4, 'Info Komputer', '1993', 'present', 0),
(5, 'Intisari', '1978', 'present', 0),
(6, 'Peluang Usaha (Bulletin)', '2014', '2016', 0),
(7, 'Penjebar Semangat', '1989', 'present', 0),
(8, 'Properti', '2010', 'present', 0),
(9, 'SWA', '1993', 'present', 0),
(10, 'Tempo', '1977', 'present', 0),
(11, 'National Geographic', '1976', '1980', 0),
(12, NULL, '2011', 'present', 0),
(13, 'National Geographic Traveler', '2009', 'present', 0),
(14, 'National Geographic Kids', '2011', 'present', 0),
(15, 'Laras', '2010', '2015', 0),
(16, 'Nirmala', '2000', '2013', 0),
(17, 'Warta Ekonomi', '1993', '2016', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_pegawai`
--

CREATE TABLE `list_pegawai` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pangkat` varchar(5) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `fungsional` varchar(50) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pendidikan_lain` varchar(50) NOT NULL,
  `pendidikan_tertinggi` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `update_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_pegawai`
--

INSERT INTO `list_pegawai` (`id`, `nama`, `pangkat`, `jabatan`, `fungsional`, `pendidikan`, `pendidikan_lain`, `pendidikan_tertinggi`, `status`, `update_id`) VALUES
(1, 'Dra. Tri Hardiningtyas, M.Si.', '4c', 'pustakawan', 'Pustakawan Madya', 'S2 Ilmu Perpustakaan', '', 'Master', 'aktif', 0),
(2, 'Daryono, S.Sos.,  MIP.', '4b', 'pustakawan', 'Pustakawan Madya', 'S2 Ilmu Perpustakaan', '', 'Master', 'aktif', 0),
(3, 'Bambang Hermanto, S.Pd. MIP.', '4c', 'pustakawan', 'Pustakawan Madya', 'S2 Ilmu Perpustakaan', '', 'Master', 'aktif', 0),
(4, 'Dinar Puspitadewi, MIP.', '3d', 'pustakawan', 'Pustakawan Muda', 'S2 Ilmu Perpustakaan', '', 'Master', 'aktif', 0),
(5, 'Masriyatun, MIP.', '4b', 'pustakawan', 'Pustakawan Madya', 'S2 Ilmu Perpustakaan', '', 'Master', 'aktif', 0),
(6, 'Haryanto, MIP.', '3c', 'pustakawan', 'Pustakawan Muda', 'S2 Ilmu Perpustakaan', '', 'Master', 'aktif', 0),
(7, 'Dian Hapsari, MIP.', '3c', 'pustakawan', 'Pustakawan Muda', 'S2 Ilmu Perpustakaan', '', 'Master', 'aktif', 0),
(8, 'Suroto, S.Sos., MIP.', '3c', 'pustakawan', 'Pustakawan Muda', 'S2 Ilmu Perpustakaan', '', 'Master', 'aktif', 0),
(9, 'Sri Anawati, S.Sos.,MIP.', '3d', 'pustakawan', 'Pustakawan Muda', 'S2 Ilmu Perpustakaan', '', 'Master', 'aktif', 0),
(10, 'Sri Utari, SE., M.A.', '3d', 'pustakawan', 'Pustakawan Muda', 'S2 Ilmu Perpustakaan', '', 'Master', 'aktif', 0),
(11, 'Henny Perwitosari, S.I.Pust.', '3d', 'pustakawan', 'Pustakawan Muda', 'S1 Ilmu Perpustakaan', '', 'Sarjana', 'aktif', 0),
(12, 'Aris Suprihadi, SIP.', '3d', 'pustakawan', 'Pustakawan Muda', 'S1 Ilmu Perpustakaan', '', 'Sarjana', 'aktif', 0),
(13, 'Muhammad Sholihin, S.Ag., SIP.', '3b', 'pustakawan', 'Pustakawan Muda', 'S1 Ilmu Perpustakaan', '', 'Sarjana', 'aktif', 0),
(14, 'Riah Wiratningsih, M.Si.', '4b', 'pustakawan', 'Pustakawan Madya', 'D3 Ilmu Perpustakaan + Diklat Alih Jalur', 'S2 Komunikasi', 'Master', 'aktif', 0),
(15, 'Hermy Yuliati. S.Sos.', '3b', 'pustakawan', 'Pustakawan Pertama', 'D3 Ilmu Perpustakaan + Diklat Alih Jalur', 'S1 Administrasi Negara', 'Sarjana', 'aktif', 0),
(16, 'Aji Hartono, SE.', '3a', 'pustakawan', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', 'S1 Ekonomi', 'Sarjana', 'aktif', 0),
(17, 'Novi Tri Astuti, A.Md.', '3a', 'pustakawan', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', '', 'Diploma', 'aktif', 0),
(18, 'Dewi Tri Pujiastuti, A.Md.', '3b', 'pustakawan', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', '', 'Diploma', 'aktif', 0),
(19, 'Agus Sriyono, A.Md.', '2d', 'pustakawan', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', '', 'Diploma', 'aktif', 0),
(20, 'Wiji Lestari, A.Md.', '3a', 'pustakawan', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', '', 'Diploma', 'aktif', 0),
(21, 'Nurul Hidayah, A.Md.', '3c', 'pustakawan', 'Pustakawan Penyelia', 'D3 Ilmu Perpustakaan', '', 'Diploma', 'aktif', 0),
(22, 'Sri Maryati Ratnaningsih, A.Md.', '3b', 'pustakawan', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', '', 'Diploma', 'aktif', 0),
(23, 'Utami Wisnu Wardhani, A.Md.', '3a', 'pustakawan', 'Pustakawan Pelaksana Lanjutan', 'D3 Ilmu Perpustakaan', '', 'Diploma', 'aktif', 0),
(24, 'Achmad Nur Chamdi, S.Pt., M.Si.', '3d', 'pustakawan', 'Pustakawan Muda', 'Inpassing', 'S2 Ekonomi Pertanian', 'Master', 'aktif', 0),
(25, 'Sugeng Widaryatno, S.IP..', '3d', 'pustakawan', 'Pustakawan Muda', 'Inpassing', 'S1 Administrasi Negara', 'Sarjana', 'aktif', 0),
(26, 'Lilis Sulistyaningsih, SH.', '3d', 'pustakawan', 'Pustakawan Madya', 'Diklat Alih Jalur', 'S1 Ilmu Hukum', 'Sarjana', 'aktif', 0),
(27, 'Suyanto, SE.', '3b', 'pustakawan', 'Pustakawan Muda', 'Diklat Alih Jalur', 'S1 Ekonomi	', 'Sarjana', 'aktif', 0),
(28, 'Nurindrastuti, SS.', '3b', 'pustakawan', 'Pustakawan Pertama', 'Diklat Alih Jalur', 'S1 Sastra', 'Sarjana', 'aktif', 0),
(29, 'Retno Indarwati', '3d', 'pustakawan', 'Pustakawan Penyelia', 'Inpassing', 'SMEA', 'SMA/Sederajat', 'aktif', 0),
(30, 'Burhanudin Harahap, S.H., M.H., M.Si., Ph.D.', '4a', 'Kepala Perpustakaan', '-', '', 'S3 Ilmu Hukum', 'Doktor', 'aktif', 0),
(31, 'Emi Indrawati, S.E., MM', '3b', 'KTU/Non Pustakawan', '-', '', 'S2 Manajemen', 'Master', 'aktif', 0),
(32, 'Tri Hardian Satiawardana, ST., M.A.', '3d', 'Staf IT', '-', 'S2 Ilmu Perpustakaan', '', 'Master', 'aktif', 0),
(33, 'Surip', '2d', 'Non Pustakawan', '-', '', 'STM', 'SMA/Sederajat', 'aktif', 0),
(34, 'Akbar Kurniawan. SE., Ak., MT.', '-', 'Non PNS', '-', '', 'S1 Ekonomi', 'Sarjana', 'aktif', 0),
(35, 'Rina Yuliati, A.Md.', '-', 'Non PNS', '-', '', 'D3 Manajemen Informatika', 'Diploma', 'aktif', 0),
(36, 'Sri Sumarni Handayani, A.Md.', '-', 'Non PNS', '-', 'D3 Ilmu Perpustakaan', '', 'Diploma', 'aktif', 0),
(37, 'Bahar  Dani Arias, S.Hum.', '-', 'Non PNS', '-', 'S1 Ilmu Perpustakaan', '', 'Sarjana', 'aktif', 0),
(38, 'Setiaji Adhi Purwoko, A.Md.', '-', 'Non PNS', '-', 'D3 Ilmu Perpustakaan', '', 'Diploma', 'aktif', 0),
(39, 'Isnaini Suryani, A.Md.', '-', 'Non PNS', '-', 'D3 Ilmu Perpustakaan', '', 'Diploma', 'aktif', 0),
(40, 'Arif  Prasetyo Utomo, A.Md.', '-', 'Non PNS', '-', 'D3 Ilmu Perpustakaan', '', 'Diploma', 'aktif', 0),
(41, 'Dwi Cahyo Yanuargo, S.Hum.', '-', 'Non PNS', '-', 'S1 Ilmu Perpustakaan', '', 'Sarjana', 'aktif', 0),
(42, 'Ahmad Nur Rais, S.IP.', '-', 'Non PNS', '-', 'S1 Ilmu Perpustakaan', '', 'Sarjana', 'aktif', 0),
(43, 'Sigit Budianto', '-', 'Non PNS', '-', '', 'SMA', 'SMA/Sederajat', 'aktif', 0),
(44, 'Sudadi', '-', 'Non PNS', '-', '', 'SD', 'SD/Sederajat', 'aktif', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_psdm`
--

CREATE TABLE `list_psdm` (
  `id` int(3) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `peserta` varchar(500) NOT NULL,
  `tanggal_dari` date NOT NULL,
  `tanggal_hingga` date NOT NULL,
  `file` varchar(500) NOT NULL,
  `update_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_psdm`
--

INSERT INTO `list_psdm` (`id`, `jenis`, `nama`, `peserta`, `tanggal_dari`, `tanggal_hingga`, `file`, `update_id`) VALUES
(1, 'Diklat', 'diklat perpustakaan', 'annisa qr\r\nmeu', '0000-00-00', '0000-00-00', 'A_Comparative_Study_of_Classifier_Based_Mispronunciation_Detection_System_for_Confusing_Arabic_Phoneme_Pairs.pdf', 0),
(2, 'Seminar', 'seminar buku', 'nohara shintaro', '0000-00-00', '0000-00-00', 'chibi_childe_s_whale_by_yohchii_dex25n9-pre.jpg', 0),
(3, 'Seminar', 'Seminar bahasa', 'Miyu', '2023-02-01', '0000-00-00', 'a', 0),
(4, 'Sertifikasi', 'Sertifikasi PHP', 'nisa', '2023-02-01', '0000-00-00', 'chibi_childe_s_whale_by_yohchii_dex25n9-pre.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `list_sarpras`
--

CREATE TABLE `list_sarpras` (
  `id` int(6) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `update_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `list_sarpras2`
--

CREATE TABLE `list_sarpras2` (
  `id` int(6) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` int(2) NOT NULL COMMENT '0:sarana, 1:prasarana',
  `subjenis` int(2) DEFAULT NULL,
  `jumlah` varchar(20) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_sarpras2`
--

INSERT INTO `list_sarpras2` (`id`, `nama`, `jenis`, `subjenis`, `jumlah`, `deskripsi`) VALUES
(1, 'Luas total perpustakaan', 1, 0, '6200 m&sup2', NULL),
(2, 'Luas area koleksi', 1, 0, '350 m&sup2', NULL),
(3, 'Luas area staf', 1, 0, '1200 m&sup2', NULL),
(4, 'Luas area lain', 1, 0, '3100 m&sup2', NULL),
(5, 'Luas area pemustaka', 1, 0, '4000 m&sup2', NULL),
(6, 'Area lain', 1, 1, '', NULL),
(7, 'Koleksi', 1, 1, '250 m&sup2', NULL),
(8, 'Baca', 1, 1, '2650 m&sup2', NULL),
(9, 'Sirkulasi', 1, 1, '300 m&sup2', NULL),
(10, 'Kerja', 1, 1, '200 m&sup2', NULL),
(11, 'Multimedia', 1, 1, '20 m&sup2', NULL),
(12, 'Diskusi', 1, 1, '50 m&sup2', NULL),
(13, 'Ruang Baca Khusus', 1, 1, '20 m&sup2', NULL),
(14, 'Rak buku', 0, 0, '5 buah', NULL),
(15, 'Jurnal', 0, 0, '200 buah', NULL),
(16, 'Koran', 0, 0, '350 buah', NULL),
(17, 'Multimedia', 0, 0, '35 buah', NULL),
(18, 'Referensi', 0, 0, '98 buah', NULL),
(19, 'Display buku baru', 0, 0, '3 ruang', NULL),
(20, 'Audio Visual', 0, 0, '90 buah', NULL),
(21, 'Sarana Lain', 0, 1, '', NULL),
(22, 'TV', 0, 1, '300 buah', NULL),
(23, 'VCD Player', 0, 1, '20 unit', NULL),
(24, 'Scanner', 0, 1, '10 unit', NULL),
(25, 'Komputer', 0, 1, '35 unit', NULL),
(26, 'Laptop', 0, 1, '15 unit', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_sop`
--

CREATE TABLE `list_sop` (
  `id` int(10) NOT NULL,
  `id_divisi` int(5) NOT NULL,
  `nomor` varchar(40) NOT NULL,
  `nama_sop` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `file` varchar(500) NOT NULL,
  `update_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_sop`
--

<<<<<<< HEAD
INSERT INTO `list_sop` (`id`, `id_divisi`, `nomor`, `nama_sop`, `deskripsi`, `file`, `update_id`) VALUES
(1, 1, '01.TIK/UN27.34/OT.01.00/2023', 'TIK-', '2023', '', 0),
(2, 2, '01.Pengolahan/UN27.34/OT.01.00/2023', 'Pengolahan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation', 'c', 0),
(3, 1, '02.TIK/UN27.34/OT.01.00/2023', 'IT SOP2', 'it sop 2', 'fotoqr.jpg', 0),
(4, 1, '04.TIK/UN27.34/OT.01.00/2023', 'TIK-4', '2022', '', 0),
(5, 3, '01.Sirkulasi/UN27.34/OT.01.00/2023', 'Sirkulasi', 'coba upload', 'A_Comparative_Study_of_Classifier_Based_Mispronunciation_Detection_System_for_Confusing_Arabic_Phoneme_Pairs2.pdf', 0),
(6, 1, '03.TIK/UN27.34/OT.01.00/2023', 'IT2', 'ooo', 'dd', 0),
(7, 1, '06.TIK/UN27.34/OT.01.00/2023', 'TIK-4', 'coba2', '', 0);
=======
INSERT INTO `list_sop` (`id`, `id_divisi`, `nomor`, `nama_sop`, `deskripsi`, `file`) VALUES
(1, 1, '01.TIK/UN27.34/OT.01.00/2023', 'SOP IT', 'sop it', 'a'),
(2, 2, '01.Pengolahan/UN27.34/OT.01.00/2023', 'Pengolahan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation', 'c'),
(3, 1, '02.TIK/UN27.34/OT.01.00/2023', 'IT SOP2', 'it sop 2', 'fotoqr.jpg'),
(5, 3, '01.Sirkulasi/UN27.34/OT.01.00/2023', 'Sirkulasi', 'coba upload', 'A_Comparative_Study_of_Classifier_Based_Mispronunciation_Detection_System_for_Confusing_Arabic_Phoneme_Pairs2.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(30) NOT NULL,
  `id_user` int(30) NOT NULL,
  `user` varchar(50) NOT NULL,
  `action` varchar(255) NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
>>>>>>> 260eb6eb19dff255c50a6ee00a64953486cf80b2

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `akses` int(2) NOT NULL,
  `update_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `nama`, `akses`, `update_id`) VALUES
(0, 'admin', '$2y$10$GNc87hB30mupRFgyHevfiu/WbzdQemKqai7ht.wtBmxP8V/bpDaoO', 'admin superuser', 0, 0),
(1, 'admin2', '$2y$10$GNc87hB30mupRFgyHevfiu/WbzdQemKqai7ht.wtBmxP8V/bpDaoO', 'admin', 1, 0),
(2, 'Operator', '$2y$10$UDcvYFLgAa5ShBpB6WUl1uMuyKJSjOW/6E0hLBf7Hba1oAdtG1Yie', 'Operator', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan`
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
  `isbn` varchar(30) NOT NULL,
  `tanggal_input` date NOT NULL,
  `update_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id`, `nama`, `fakultas`, `program_studi`, `judul_buku`, `nama_pengarang`, `penerbit`, `tahun_publikasi`, `isbn`, `tanggal_input`, `update_id`) VALUES
(0, 'aaa', 'aaa', 'S1 aaa', '12345aaa', 'abcde', '123321ppp', 2001, '111-111-111', '0000-00-00', 0),
(0, 'bbb', 'bbb', 'S1 bbb', '12345bbb', 'abcde', '123321ppp', 2002, '111-111-112', '0000-00-00', 0),
(0, 'ccc', 'ccc', 'S1 ccc', '12345ccc', 'abcde', '123321ppp', 2003, '111-111-113', '0000-00-00', 0),
(0, 'ddd', 'ddd', 'S1 ddd', '12345ddd', 'abcde', '123321ppp', 2004, '111-111-114', '0000-00-00', 0),
(0, 'eee', 'eee', 'S1 eee', '12345eee', 'abcde', '123321ppp', 2005, '111-111-115', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_divisi_sop`
--

CREATE TABLE `tbl_divisi_sop` (
  `id` int(5) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_divisi_sop`
--

INSERT INTO `tbl_divisi_sop` (`id`, `divisi`) VALUES
(1, 'IT'),
(2, 'Pengolahan'),
(3, 'Sirkulasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `id_fakultas` int(5) NOT NULL,
  `fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_fakultas`
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
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` int(5) NOT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `kode` varchar(4) NOT NULL,
  `id_fakultas` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_prodi`
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
<<<<<<< HEAD
-- Indexes for table `changelog`
=======
-- Indeks untuk tabel `anggota`
>>>>>>> 260eb6eb19dff255c50a6ee00a64953486cf80b2
--
ALTER TABLE `changelog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_anggaran`
--
ALTER TABLE `list_anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_ebook`
--
ALTER TABLE `list_ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_ejournal`
--
ALTER TABLE `list_ejournal`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- Indexes for table `list_kerjasama`
--
ALTER TABLE `list_kerjasama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_koran`
=======
-- Indeks untuk tabel `list_koran`
>>>>>>> 260eb6eb19dff255c50a6ee00a64953486cf80b2
--
ALTER TABLE `list_koran`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- Indexes for table `list_kunjungan`
=======
-- Indeks untuk tabel `list_kunjungan`
>>>>>>> 260eb6eb19dff255c50a6ee00a64953486cf80b2
--
ALTER TABLE `list_kunjungan`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- Indexes for table `list_majalah`
=======
-- Indeks untuk tabel `list_majalah`
>>>>>>> 260eb6eb19dff255c50a6ee00a64953486cf80b2
--
ALTER TABLE `list_majalah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_pegawai`
--
ALTER TABLE `list_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_psdm`
--
ALTER TABLE `list_psdm`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- Indexes for table `list_sarpras`
--
ALTER TABLE `list_sarpras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_sarpras2`
--
ALTER TABLE `list_sarpras2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_sop`
=======
-- Indeks untuk tabel `list_sop`
>>>>>>> 260eb6eb19dff255c50a6ee00a64953486cf80b2
--
ALTER TABLE `list_sop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_divisi` (`id_divisi`);

--
<<<<<<< HEAD
-- Indexes for table `login`
=======
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
>>>>>>> 260eb6eb19dff255c50a6ee00a64953486cf80b2
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `tbl_divisi_sop`
--
ALTER TABLE `tbl_divisi_sop`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `changelog`
=======
-- AUTO_INCREMENT untuk tabel `anggota`
>>>>>>> 260eb6eb19dff255c50a6ee00a64953486cf80b2
--
ALTER TABLE `changelog`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `list_anggaran`
--
ALTER TABLE `list_anggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `list_ebook`
--
ALTER TABLE `list_ebook`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `list_ejournal`
--
ALTER TABLE `list_ejournal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `list_kerjasama`
--
ALTER TABLE `list_kerjasama`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `list_koran`
=======
-- AUTO_INCREMENT untuk tabel `list_koran`
>>>>>>> 260eb6eb19dff255c50a6ee00a64953486cf80b2
--
ALTER TABLE `list_koran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `list_kunjungan`
--
ALTER TABLE `list_kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `list_majalah`
--
ALTER TABLE `list_majalah`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `list_pegawai`
--
ALTER TABLE `list_pegawai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `list_psdm`
--
ALTER TABLE `list_psdm`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `list_sarpras`
--
ALTER TABLE `list_sarpras`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `list_sarpras2`
--
ALTER TABLE `list_sarpras2`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `list_sop`
--
ALTER TABLE `list_sop`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
=======
-- AUTO_INCREMENT untuk tabel `list_sop`
--
ALTER TABLE `list_sop`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
>>>>>>> 260eb6eb19dff255c50a6ee00a64953486cf80b2

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_divisi_sop`
--
ALTER TABLE `tbl_divisi_sop`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  MODIFY `id_fakultas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `list_sop`
--
ALTER TABLE `list_sop`
  ADD CONSTRAINT `list_sop_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `tbl_divisi_sop` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD CONSTRAINT `tbl_prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `tbl_fakultas` (`id_fakultas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
