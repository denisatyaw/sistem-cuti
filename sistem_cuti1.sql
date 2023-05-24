-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 03:08 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_cuti1`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_agama`
--

CREATE TABLE `db_agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_agama`
--

INSERT INTO `db_agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Budhha'),
(6, 'Kong Hu Cu');

-- --------------------------------------------------------

--
-- Table structure for table `db_bagian`
--

CREATE TABLE `db_bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_cetak`
--

CREATE TABLE `db_cetak` (
  `id_cetak` int(11) NOT NULL,
  `cetak` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_cuti`
--

CREATE TABLE `db_cuti` (
  `id_cuti` varchar(11) NOT NULL,
  `alasan_cuti` text NOT NULL,
  `lama_cuti` int(11) NOT NULL,
  `tanggal_cuti` varchar(30) NOT NULL,
  `tanggal_selesai` varchar(30) NOT NULL,
  `tanggal_pengajuan` varchar(30) NOT NULL,
  `alamat_cuti` varchar(200) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Menunggu Verifikasi',
  `cetak` varchar(10) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_cuti`
--

INSERT INTO `db_cuti` (`id_cuti`, `alasan_cuti`, `lama_cuti`, `tanggal_cuti`, `tanggal_selesai`, `tanggal_pengajuan`, `alamat_cuti`, `id_jenis`, `status`, `cetak`) VALUES
('', 'Menikah', 5, '25/Agustus/2019', '29/Agustus/2019', '2019-02-02', 'Gemolong', 1, 'Disetujui', 'Y'),
('C01', 'Sakit', 9, '24/Agustus/2019', '01/September/2019', '2019-02-02', 'Solo', 3, 'Ditolak', 'Y'),
('C02', 'Liburan Keluarga', 7, '24/Agustus/2019', '30/Agustus/2019', '2019-02-02', 'Jakarta', 1, 'Disetujui', 'Y'),
('C03', 'Kerumah Saudara', 2, '30/Agustus/2019', '01/September/2019', '0000-00-00', 'Sragen', 1, 'Menunggu', 'N'),
('C04', 'asdf', 10, '30/Agustus/2019', '08/September/2019', '29/August/2019', 'ldakfs', 1, 'Menunggu', 'N'),
('C05', 'nnnn', 2, '30/Agustus/2019', '31/Agustus/2019', '29/August/2019', ',', 2, 'Menunggu', 'N'),
('C06', 'fasf', 7, '07/Desember/2019', '13/Desember/2019', '2019-12-04', 'f', 1, 'Menunggu', 'N'),
('C07', 'Cuti', 3, '18/Desember/2019', '20/Desember/2019', '2019-12-04', 'Tegal', 1, 'Ditolak', 'Y'),
('C08', 'HAHA', 8, '05/Desember/2019', '12/Desember/2019', '12-04-2019', 'jljasf', 1, 'Disetujui', 'Y'),
('C09', 'hg', 2, '05/Desember/2019', '06/Desember/2019', '2019-12-04', ',,', 1, 'Disetujui', 'Y'),
('C10', 'jjkg', 3, '05/Desember/2019', '07/Desember/2019', '2019-12-04', 'jkh', 1, 'Menunggu', 'N'),
('C11', '898', 15, '13/Desember/2019', '27/Desember/2019', '2019-12-04', 'hjg', 1, 'Disetujui', 'Y'),
('C12', 'Ha', 15, '06/Desember/2019', '20/Desember/2019', '2019-12-05', 'Gemolong', 1, 'Menunggu', 'N'),
('C13', 'ilhkadg', 2, '05/Desember/2019', '06/Desember/2019', '2019-12-05', 'hg', 1, 'Disetujui', 'Y'),
('C14', 'we', 2, '07/Desember/2019', '08/Desember/2019', '2019-12-05', 'dfg', 1, 'Menunggu', 'N'),
('C15', 'Lala', 4, '11/Desember/2019', '14/Desember/2019', '2019-12-05', 'fad', 1, 'Menunggu', 'N'),
('C16', 'aslkd', 9, '05/Desember/2019', '13/Desember/2019', '2019-12-05', 's', 3, 'Disetujui', 'Y'),
('C17', 'nbadf', 8, '06/Desember/2019', '13/Desember/2019', '2019-12-05', 'sd', 3, 'Disetujui', 'Y'),
('C18', 'Tidak Ada', 2, '06/Desember/2019', '07/Desember/2019', '2019-12-05', 'Tidak ada', 1, 'Menunggu', 'N'),
('C19', 'Gemolong', 5, '06/Desember/2019', '10/Desember/2019', '2019-12-05', '', 1, 'Disetujui', 'Y'),
('C20', 'Acara Keluarga', 4, '07/Desember/2019', '10/Desember/2019', '2019-12-05', 'Solo', 1, 'Disetujui', 'Y'),
('C21', 'Liburan', 4, '07/Desember/2019', '10/Desember/2019', '2019-12-06', 'Surakarta', 1, 'Disetujui', 'Y'),
('C22', 'Liburan', 3, '07/Desember/2019', '09/Desember/2019', '2019-12-06', 'Solo', 1, 'Disetujui', 'Y'),
('C23', 'Acara Keluarga', 5, '07/Desember/2019', '11/Desember/2019', '2019-12-06', 'Solo', 2, 'Menunggu', 'N'),
('C24', 'Tidak ada', 4, '07/Desember/2019', '10/Desember/2019', '2019-12-06', '', 1, 'Disetujui', 'Y'),
('C25', 'Percobaan', 1, '03/Januari/2020', '03/Januari/2020', '2020-01-02', 'Gemolong', 1, 'Disetujui', 'Y'),
('C26', 'sa', 2, '10/Januari/2020', '11/Januari/2020', '2020-01-02', 'as', 1, 'Menunggu', 'N'),
('C27', 'Ketempat Saudara', 2, '09/Januari/2020', '10/Januari/2020', '2020-01-04', 'Kartasura', 1, 'Disetujui', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `db_data_cuti`
--

CREATE TABLE `db_data_cuti` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `id_cuti` varchar(11) NOT NULL,
  `sisa_cuti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_data_cuti`
--

INSERT INTO `db_data_cuti` (`id`, `nip`, `id_cuti`, `sisa_cuti`) VALUES
(11, '2147483647', '', 0),
(12, '2147483647', 'C01', 0),
(13, '0012421512988720', 'C02', 5),
(14, '0012421512988720', 'C03', 2),
(17, '0012421512988720', 'C06', 12),
(18, '0012421512988720', 'C07', 12),
(19, '0012421512988720', 'C08', 12),
(20, '0012421512988720', 'C09', 10),
(22, '0012421512988720', 'C11', 3),
(30, '196709051990031002', 'C19', 7),
(31, '198605072011011010', 'C20', 8),
(32, '197901282007041001', 'C21', 8),
(33, '99911647129', 'C22', 9),
(34, '99911647129', 'C23', 4),
(35, '2147483647', 'C24', 2),
(36, '198304202009042007', 'C25', 0),
(37, '198304202009042007', 'C26', 8),
(38, '196709051990031002', 'C27', 5);

-- --------------------------------------------------------

--
-- Table structure for table `db_golongan`
--

CREATE TABLE `db_golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_golongan`
--

INSERT INTO `db_golongan` (`id_golongan`, `nama_golongan`) VALUES
(1, 'IA - Juru Muda'),
(2, 'IB - Juru Muda Tingkat I'),
(3, 'IC - Juru'),
(4, 'ID - Juru Tingkat I'),
(5, 'IIA - Pengatur Muda'),
(6, 'IIB - Pengatur Muda Tingkat I'),
(7, 'IIC - Pengatur'),
(8, 'IID - Pengatur Tingkat I'),
(9, 'IIIA - Penata Muda'),
(10, 'IIIB - Penata Muda Tingkat I'),
(11, 'IIIC - Penata'),
(12, 'IIID - Penata Tingkat I'),
(13, 'IVA - Pembina'),
(14, 'IVB - Pembina Tingkat I'),
(15, 'IVC - Pembina Utama Muda'),
(16, 'IVD - Pembina Utama Madya'),
(17, 'IVE - Pembina Utama');

-- --------------------------------------------------------

--
-- Table structure for table `db_jabatan`
--

CREATE TABLE `db_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_jabatan`
--

INSERT INTO `db_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Ketua'),
(2, 'Wakil Ketua'),
(3, 'Hakim'),
(4, 'Sekretaris'),
(5, 'Panitera Muda Perdata'),
(6, 'Panitera Muda Pidana'),
(7, 'Panitera Muda Hukum'),
(8, 'Panitera Pengganti'),
(9, 'Jurusita'),
(10, 'Jurusita Pengganti'),
(11, 'Kasubbag Kepegawaian. Organisasi dan Tatalaksana'),
(12, 'Kasubbag Umum dan Keuangan'),
(13, 'Kasubbag Perencanaan, IT dan Pelaporan'),
(14, 'Staf Kepegawaian'),
(15, 'Staf Umum'),
(16, 'Staf Keuangan'),
(17, 'Staf Kepaniteraan Perdata'),
(18, 'Staf IT');

-- --------------------------------------------------------

--
-- Table structure for table `db_jenis_cuti`
--

CREATE TABLE `db_jenis_cuti` (
  `id_jenis` int(11) NOT NULL,
  `nama_cuti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_jenis_cuti`
--

INSERT INTO `db_jenis_cuti` (`id_jenis`, `nama_cuti`) VALUES
(1, 'Cuti Tahunan'),
(2, 'Cuti Besar'),
(3, 'Cuti Sakit'),
(4, 'Cuti Melahirkan'),
(5, 'Cuti karena alasan penting'),
(6, 'Cuti diluar Tanggungan Negara');

-- --------------------------------------------------------

--
-- Table structure for table `db_pegawai`
--

CREATE TABLE `db_pegawai` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tmt` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `foto` varchar(300) NOT NULL DEFAULT 'default.jpg',
  `id_agama` int(11) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_golongan` int(11) DEFAULT NULL,
  `id_user` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_pegawai`
--

INSERT INTO `db_pegawai` (`nip`, `nama`, `tempat_lahir`, `tanggal_lahir`, `tmt`, `jenis_kelamin`, `no_telp`, `foto`, `id_agama`, `id_jabatan`, `id_golongan`, `id_user`) VALUES
('0012421512988720', 'Harifa Nu\'aeni', 'Tegal', '1999-12-25', '2011-12-25', '', '085487627456', 'LOGO_74_RI1.png', 1, 1, 15, 'U02'),
('112050728923', 'Denisa', 'Bandung', '1999-12-03', '2005-02-04', 'Perempuan', '0812487125986', 'default.jpg', 1, 1, 1, NULL),
('1412', 'Wiratama', 'Surakarta', '2019-08-15', '2019-07-31', 'Laki-laki', '142', 'default.jpg', 1, 1, 1, NULL),
('196009281992032001', 'Ratih Dewanti, SH.', 'Karanganyar', '1960-09-28', '2013-10-01', 'Perempuan', '-', 'user4.png', 1, 7, 12, 'U13'),
('196106121981031002', 'SUPARNO, SH.', 'Karanganyar', '1961-06-12', '2005-06-30', 'Laki-laki', '-', 'user6.png', 1, 8, 12, 'U15'),
('196410041996032001', 'Asminah, SH., MH.', 'Ngawi', '1964-10-04', '2000-06-20', 'Perempuan', '-', 'user14.png', 1, 1, 14, 'U23'),
('196506101993031004', 'Sularno, SH.', 'Karanganyar', '1965-06-10', '2004-03-09', 'Laki-laki', '-', 'user7.png', 1, 8, 12, 'U16'),
('196709051990031002', 'Bambang Supriyanta, SH.', 'Klaten', '1967-09-05', '2015-12-28', 'Laki-laki', '-', 'user8.png', 1, 12, 12, 'U17'),
('196710182002121002', 'Y. Ahus Susamto, SH.', 'Sragen', '1967-10-18', '2015-04-01', 'Laki-laki', '-', 'user5.png', 2, 4, 1, 'U14'),
('196804281989031004', 'Mardiyanto', 'Karanganyar', '1968-04-28', '2009-04-01', 'Laki-laki', '-', 'user10.png', 1, 9, 10, 'U19'),
('197610112006042003', 'Nunik Sri Wahyuni, SH., MH.', 'Boyolali', '1976-10-11', '2009-07-21', 'Perempuan', '-', 'user2.png', 1, 3, 12, 'U11'),
('197710112000122001', 'Ni Wayan Wirawati, SH., M.Si.', 'Manado', '1977-10-11', '2017-04-01', 'Perempuan', '-', 'user13.png', 1, 2, 13, 'U22'),
('197901282007041001', 'Mahendra Prabowo Kusuma Putro, SH., MH', 'Masohi', '1979-01-28', '2010-07-01', 'Laki-laki', '-', 'user3.png', 1, 3, 12, 'U12'),
('198304202009042007', 'Kusuma Ayu Riswahyuni, SE.', 'Rembang', '1983-04-20', '2016-10-10', 'Perempuan', '-', 'user9.png', 1, 16, 11, 'U18'),
('198605072011011010', 'Surya Kusuma, SE.', 'Surakarta', '1986-05-07', '2017-06-20', 'Laki-laki', '-', 'user11.png', 1, 13, 10, 'U20'),
('2147483647', 'Denisatya Wiratama', 'Wonogiri', '1999-07-11', '2011-07-11', '', '082217668183', 'Screenshot_(31).png', 1, 18, 16, 'U01'),
('9921481925981273', 'Harifa', 'Tegal', '1999-12-04', '2008-12-04', 'Perempuan', '08612784681212', 'default.jpg', 1, 1, 1, NULL),
('998217126471821', 'TUF', 'Indo', '2019-12-03', '2019-11-28', 'Laki-laki', '09992266253', 'Screenshot_(239).png', 1, 17, 12, NULL),
('99911647129', 'Faridd', 'Solo', '2019-12-27', '2019-12-25', 'Laki-laki', '08445242', '', 2, 15, 12, 'U25'),
('9992612567123', 'Lulu', 'Solo', '2019-11-26', '2019-12-11', 'Laki-laki', '0882146129523', 'Screenshot_(3)7.png', 1, 1, 1, 'U07'),
('999994646546', 'Faishal', 'Solo', '2019-12-20', '2019-12-26', 'Laki-laki', '08472436712', 'LOGO_74_RI.png', 1, 1, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `db_status_pegawai`
--

CREATE TABLE `db_status_pegawai` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `id_user` varchar(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('pegawai','admin') NOT NULL DEFAULT 'pegawai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id_user`, `username`, `nip`, `password`, `role`) VALUES
('U01', 'denisatya', '2147483647', 'c3875d07f44c422f3b3bc019c23e16ae', 'admin'),
('U02', 'harifa', '0012421512988720', 'bf2f7cc711ac1673d969416d96c1232f', 'pegawai'),
('U03', '99994172531532', NULL, '99994172531532', 'pegawai'),
('U04', '999214812541298', NULL, '999214812541298', 'pegawai'),
('U05', '999214812541298', NULL, '999214812541298', 'pegawai'),
('U06', '999214812541298', NULL, '999214812541298', 'pegawai'),
('U07', '99821712471822', NULL, '99821712471822', 'pegawai'),
('U08', '090127412897', NULL, '31B0DB32FB095FB278D3BE4D5C5BC43D', 'pegawai'),
('U09', '99982', '99982', '1448a4031347cdb293610b8b42d4bd4f', 'pegawai'),
('U10', '196410041996032001', '196410041996032001', 'e9da8f669f49cbad8aefc0014abeb094', 'pegawai'),
('U11', '197610112006042003', '197610112006042003', '178a96fa8f01f6d5dab6a5583ba066df', 'pegawai'),
('U12', '197901282007041001', '197901282007041001', '9cf18312949c37ae09aae6b133acd01c', 'pegawai'),
('U13', '196009281992032001', '196009281992032001', '0042efb0cd3d3d6cda9a3d5e72948a24', 'pegawai'),
('U14', '196710182002121002', '196710182002121002', '2daa8eb13864e8526f5e3923040421e3', 'pegawai'),
('U15', '196106121981031002', '196106121981031002', '9bfcc208faaaad8d04623bfd72579f21', 'pegawai'),
('U16', '196506101993031004', '196506101993031004', '609f2843d69406dfa8fd90b829ac1ef7', 'pegawai'),
('U17', '196709051990031002', '196709051990031002', 'd8408c90752437488543f1cbd640a833', 'pegawai'),
('U18', '198304202009042007', '198304202009042007', '9a41ab4ec3c6cf66ec523a44abb31ce5', 'pegawai'),
('U19', '196804281989031004', '196804281989031004', '312dd73490afbb532dd2d8cc787804d5', 'pegawai'),
('U20', '198605072011011010', '198605072011011010', 'aec0f00e5d85af8e6fdbc65437c1e361', 'pegawai'),
('U21', '196410041996032001', '196410041996032001', 'e9da8f669f49cbad8aefc0014abeb094', 'pegawai'),
('U22', '197710112000122001', '197710112000122001', '8fbd7303a28bb37114a71187cf68bdab', 'pegawai'),
('U23', '196410041996032001', '196410041996032001', 'e9da8f669f49cbad8aefc0014abeb094', 'pegawai'),
('U24', '986', '986', 'fe7ee8fc1959cc7214fa21c4840dff0a', 'pegawai'),
('U25', '99911647129', '99911647129', '9b2f36a2258ca004ff4056120b69d324', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_agama`
--
ALTER TABLE `db_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `db_bagian`
--
ALTER TABLE `db_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `db_cetak`
--
ALTER TABLE `db_cetak`
  ADD PRIMARY KEY (`id_cetak`);

--
-- Indexes for table `db_cuti`
--
ALTER TABLE `db_cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `db_data_cuti`
--
ALTER TABLE `db_data_cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PK_Cuti` (`nip`,`id_cuti`),
  ADD KEY `id_cuti` (`id_cuti`);

--
-- Indexes for table `db_golongan`
--
ALTER TABLE `db_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `db_jabatan`
--
ALTER TABLE `db_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `db_jenis_cuti`
--
ALTER TABLE `db_jenis_cuti`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `db_pegawai`
--
ALTER TABLE `db_pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `PK_Id_User` (`id_user`),
  ADD KEY `PK_Pegawai` (`id_agama`,`id_jabatan`,`id_golongan`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_golongan` (`id_golongan`);

--
-- Indexes for table `db_status_pegawai`
--
ALTER TABLE `db_status_pegawai`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `NIP` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_agama`
--
ALTER TABLE `db_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `db_bagian`
--
ALTER TABLE `db_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_cetak`
--
ALTER TABLE `db_cetak`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_data_cuti`
--
ALTER TABLE `db_data_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `db_golongan`
--
ALTER TABLE `db_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `db_jabatan`
--
ALTER TABLE `db_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `db_jenis_cuti`
--
ALTER TABLE `db_jenis_cuti`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `db_status_pegawai`
--
ALTER TABLE `db_status_pegawai`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_cuti`
--
ALTER TABLE `db_cuti`
  ADD CONSTRAINT `db_cuti_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `db_jenis_cuti` (`id_jenis`);

--
-- Constraints for table `db_data_cuti`
--
ALTER TABLE `db_data_cuti`
  ADD CONSTRAINT `db_data_cuti_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `db_pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_data_cuti_ibfk_2` FOREIGN KEY (`id_cuti`) REFERENCES `db_cuti` (`id_cuti`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `db_pegawai`
--
ALTER TABLE `db_pegawai`
  ADD CONSTRAINT `db_pegawai_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `db_agama` (`id_agama`),
  ADD CONSTRAINT `db_pegawai_ibfk_3` FOREIGN KEY (`id_jabatan`) REFERENCES `db_jabatan` (`id_jabatan`),
  ADD CONSTRAINT `db_pegawai_ibfk_6` FOREIGN KEY (`id_golongan`) REFERENCES `db_golongan` (`id_golongan`),
  ADD CONSTRAINT `db_pegawai_ibfk_7` FOREIGN KEY (`id_user`) REFERENCES `db_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
