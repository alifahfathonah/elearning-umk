-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 24, 2019 at 05:06 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_umk_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_evaluasi`
--

CREATE TABLE `tabel_evaluasi` (
  `id` varchar(15) NOT NULL,
  `pertanyaan` text NOT NULL,
  `opsi_a` varchar(100) NOT NULL,
  `opsi_b` varchar(100) NOT NULL,
  `opsi_c` varchar(100) NOT NULL,
  `opsi_d` varchar(100) NOT NULL,
  `jawaban` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_guru`
--

CREATE TABLE `tabel_guru` (
  `id` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `mapel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_guru`
--

INSERT INTO `tabel_guru` (`id`, `nama`, `alamat`, `email`, `no_hp`, `jk`, `mapel`) VALUES
('5dcd1763e7de3', 'Wayu Lord Gembol', 'Lrg. Gembol juga', 'wayu_takiya@genjiee.com', '0800696969', 'Laki-Laki', 'Bolos'),
('5dcd9bff4d24d', 'Sahlan Binomo\'s Lord', 'Lihat  Rumah Ini', 'alan@binomo.lol', '08696969', 'Laki-Laki', 'Trading Binomo');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_materi`
--

CREATE TABLE `tabel_materi` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `nama_file` text NOT NULL,
  `rpp_index` varchar(15) NOT NULL,
  `teori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_materi`
--

INSERT INTO `tabel_materi` (`id`, `judul`, `nama_file`, `rpp_index`, `teori`) VALUES
(1, 'Klasifikasi Karbon', '01a_klasifikasi_karbon.mp4', '01-1', '<p><span style=\"font-size:24px\">Klasifikasi Karbon</span></p>\r\n\r\n<p><span style=\"font-size:14px\">bla bla bla</span></p>\r\n'),
(2, 'Senyawa Karbon', '01b_senyawa_karbon.mp4', '01-2', ''),
(3, 'Minyak Bumi', '02_minyak_bumi.mp4', '02', ''),
(4, 'Entalpi', '03a_entalpi.mp4', '03-1', ''),
(5, 'Entalpi', '03b_entalpi.mp4', '03-2', ''),
(6, 'Laju Reaksi', '04a_laju_reaksi.mp4', '04-1', ''),
(7, 'Laju Reaksi', '04b_laju_reaksi.mp4', '04-2', ''),
(8, 'Laju Reaksi', '04c_laju_reaksi.mp4', '04-3', ''),
(9, 'Kesetimbangan', '05_kesetimbangan.mp4', '05', ''),
(10, 'Hidrolisis', '06_hidrolisis.mp4', '06', ''),
(11, 'Larutan Penyangga', '07_larutan_penyagga.mp4', '07', ''),
(12, 'Sistem Koloid', '08_sistem_koloid.mp4', '08', ''),
(13, 'Asam Basa', '09_asam_basa.mp4', '09', ''),
(14, 'Titrasi Asam Basa', '10_titrasi_asam_basa.mp4', '10', ''),
(2147483647, 'Testing', '11-test.mp4', '11', '<p>TestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTest</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pengguna`
--

CREATE TABLE `tabel_pengguna` (
  `id` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_pengguna`
--

INSERT INTO `tabel_pengguna` (`id`, `username`, `email`, `password`) VALUES
('5dc5168e8c544', 'admin', 'admin@admin.com', '55c3b5386c486feb662a0785f340938f518d547f');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_soal`
--

CREATE TABLE `tabel_soal` (
  `id` varchar(15) NOT NULL,
  `pertanyaan` text NOT NULL,
  `opsi_a` varchar(100) NOT NULL,
  `opsi_b` varchar(100) NOT NULL,
  `opsi_c` varchar(100) NOT NULL,
  `opsi_d` varchar(100) NOT NULL,
  `jawaban` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_soal`
--

INSERT INTO `tabel_soal` (`id`, `pertanyaan`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `jawaban`) VALUES
('5de7b6b2e7ed1', 'Siapa Kamu?\r\n', 'Dobleh', 'Taufik', 'Jamal', 'Kabur', 'D'),
('5de7b91146ad3', 'zzzz', 'aa', 'bb', 'cc', 'dd', 'D'),
('5e01acc92250a', 'dsda', 'dsad', 'dasda', 'dsad', 'asda', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_evaluasi`
--
ALTER TABLE `tabel_evaluasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_guru`
--
ALTER TABLE `tabel_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_materi`
--
ALTER TABLE `tabel_materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_pengguna`
--
ALTER TABLE `tabel_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_soal`
--
ALTER TABLE `tabel_soal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_materi`
--
ALTER TABLE `tabel_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
