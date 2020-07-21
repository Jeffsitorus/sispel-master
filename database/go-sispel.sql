-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 04:19 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go-sispel`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul_info` varchar(128) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `id_kategori`, `judul_info`, `tgl_mulai`, `tgl_selesai`, `gambar`, `status`, `user_id`) VALUES
(6, 2, 'lowongan pekerjaan pt. toyota indonesia tbk.', '2020-06-30', '2020-07-10', 'info_04062020.png', 1, 0),
(7, 2, 'lowongan pekerjaan pt. Astra honda indonesia tbk.', '2020-06-30', '2020-07-15', 'info_040620201.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelatihan`
--

CREATE TABLE `jadwal_pelatihan` (
  `id_jadwal` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `tutup_pendaftaran` date NOT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `selesai_pelaksanaan` date NOT NULL,
  `lokasi` text NOT NULL,
  `hari` varchar(30) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_pelatihan`
--

INSERT INTO `jadwal_pelatihan` (`id_jadwal`, `program_id`, `tgl_pendaftaran`, `tutup_pendaftaran`, `tgl_pelaksanaan`, `selesai_pelaksanaan`, `lokasi`, `hari`, `status`) VALUES
(11, 13, '2020-07-03', '2020-07-13', '2020-07-12', '2020-08-02', 'dirumahaja', 'online', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `id_post` int(11) NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `salary` varchar(128) NOT NULL,
  `type_job` varchar(128) NOT NULL,
  `date_post` datetime NOT NULL,
  `foto` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id_post`, `perusahaan_id`, `judul`, `content`, `kategori`, `lokasi`, `salary`, `type_job`, `date_post`, `foto`, `is_active`) VALUES
(6, 6, 'Lowongan Content Writer', '<p><span style=\"font-size:20px\">IniSitus Hiring.</span></p>\r\n\r\n<p>Dibutuhkan seorang Content Writer yang dapat bekerja secara remote dengan kualifikasi sebagai berikut :</p>\r\n\r\n<ul>\r\n	<li>Minimal mempunyai pengalaman -+ 1 tahun</li>\r\n	<li>Pandai merangkai kata</li>\r\n	<li>Anti Plagiarisme</li>\r\n	<li>Jujur</li>\r\n</ul>\r\n\r\n<p>Selain diatas, pelamar harus mempunyai laptop/komputer masing-masing, serta selalu aktif dalam hal komunikasi.</p>\r\n\r\n<p>Jika pelamar berminat, silahkan bisa hubungi WA <strong>089688048342&nbsp;</strong>atau langsung kunjungi web kami inisituss.blogspot.com</p>\r\n\r\n<p>Lorem,&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Voluptatem&nbsp;ea&nbsp;adipisci&nbsp;dolorum,&nbsp;quod&nbsp;fuga&nbsp;reprehenderit&nbsp;voluptatum&nbsp;magnam&nbsp;rerum&nbsp;quaerat&nbsp;perspiciatis&nbsp;voluptates&nbsp;dolore&nbsp;aut&nbsp;eius&nbsp;veniam.</p>\r\n\r\n<p>Quia&nbsp;itaque&nbsp;eveniet&nbsp;pariatur&nbsp;qui.</p>\r\n\r\n<p>Lorem,&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Voluptatem&nbsp;ea&nbsp;adipisci&nbsp;dolorum,&nbsp;quod&nbsp;fuga&nbsp;reprehenderit&nbsp;voluptatum&nbsp;magnam&nbsp;rerum&nbsp;quaerat&nbsp;perspiciatis&nbsp;voluptates&nbsp;dolore&nbsp;aut&nbsp;eius&nbsp;veniam.</p>\r\n\r\n<p>&nbsp;Quia&nbsp;itaque&nbsp;eveniet&nbsp;pariatur&nbsp;qui.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Blog', 'Remote', 'Rp.200,0000 - Rp.300,0000', 'Part-time', '0000-00-00 00:00:00', 'default.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_info`
--

CREATE TABLE `kategori_info` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_info`
--

INSERT INTO `kategori_info` (`id`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Umum', '2020-05-30 19:41:36', '2020-05-30 19:41:36'),
(4, 'Lokal', '2020-06-01 09:22:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pelatihan`
--

CREATE TABLE `kategori_pelatihan` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `id_info` int(11) NOT NULL,
  `deskripsi_kategori` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_pelatihan`
--

INSERT INTO `kategori_pelatihan` (`id`, `keterangan`, `id_info`, `deskripsi_kategori`, `created_at`, `updated_at`, `icon`) VALUES
(5, 'Komputer dan Teknologi', 2, 'Belajar tentang ilmu Komputer dan Teknologi', '2020-05-30 07:39:16', '2020-06-01 10:04:10', 'fas fa-fw fa-laptop-code'),
(6, 'Bahasa dan Komunikasi', 4, 'Belajar tentang ilmu Bahasa dan Komunikasi', '2020-06-01 10:03:15', '2020-06-02 05:53:21', 'fas fa-fw fa-globe-asia'),
(7, 'Keterampilan Seni', 4, 'Belajar tentang Keterampilan Seni', '2020-06-01 10:03:30', '2020-06-02 05:50:41', ''),
(8, 'Administrasi Perkantoran', 2, 'Belajar tentang ilmu Administrasi Perkantoran', '2020-06-01 10:04:00', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_peserta`
--

CREATE TABLE `kategori_peserta` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_peserta`
--

INSERT INTO `kategori_peserta` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Umum', '2020-05-31 17:05:34', '2020-06-05 11:04:40'),
(3, 'Lokal', '2020-05-31 17:47:03', NULL),
(5, 'Khusus', '2020-06-02 05:35:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `no_pelatihan` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `status_pelatihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`no_pelatihan`, `user_id`, `jadwal_id`, `program_id`, `tgl_pendaftaran`, `status_pelatihan`) VALUES
('PL2007210001', 51, 11, 13, '2020-07-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` int(12) NOT NULL,
  `keterangan` text NOT NULL,
  `alamat` text NOT NULL,
  `password` int(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program_pelatihan`
--

CREATE TABLE `program_pelatihan` (
  `id_program` int(11) NOT NULL,
  `judul_program` varchar(100) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `kode_program` varchar(30) NOT NULL,
  `lama_pelaksanaan` int(11) NOT NULL,
  `batas_kuota` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `kapel_id` int(11) NOT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_pelatihan`
--

INSERT INTO `program_pelatihan` (`id_program`, `judul_program`, `kategori_id`, `kode_program`, `lama_pelaksanaan`, `batas_kuota`, `deskripsi`, `gambar`, `kapel_id`, `slug`) VALUES
(13, 'Belajar Dasar-Dasar PHP 7', 1, 'PP2007030001', 30, 100, '<p>Belajar Dasar-Dasar PHP 7 untuk pemula</p>\r\n', 'P_202007071.png', 5, 'belajar-dasar-dasar-php-7');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'Administrator'),
(2, 'Peserta'),
(5, 'Perusahaan'),
(6, 'Pendaftar');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_ktp`, `alamat`, `jk`, `tgl_lahir`, `email`, `foto`, `no_hp`, `agama`, `password`, `id_role`, `is_active`, `date_created`) VALUES
(43, 'Einz Fiore', '1234567890123452', 'Regensi', 'Laki-laki', '2000-02-06', 'einzfiore1412@gmail.com', 'Annotation_2020-05-10_2248261.png', '089688048432', '', '$2y$10$q3c5MTjsdKf7yBdr1kde7eHevIfQ3Cb1S806GEWg3aOEOYQPuTWYG', 1, 1, 1591253875),
(51, 'Jefri Sitorus', '1212071910970001', 'Cikampek', 'Laki-laki', '1997-10-19', 'jefrisitorus22@gmail.com', 'img_20200721.jpg', '081282441221', '', '$2y$10$o7IFN6dDMGGSvNus8Cn3B.Fu/7qvqN8BHHylwPqb9/iVw4H8PQ326', 2, 1, 1595339691);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `id_role`, `menu_id`) VALUES
(1, 1, 1),
(4, 1, 3),
(5, 2, 4),
(7, 3, 2),
(8, 3, 3),
(9, 3, 7),
(12, 1, 8),
(14, 6, 4),
(15, 1, 9),
(17, 1, 10),
(18, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Peserta'),
(8, 'Data Management'),
(9, 'Tools'),
(10, 'Program Pelatihan'),
(11, 'Info Lowongan');

-- --------------------------------------------------------

--
-- Table structure for table `user_submenu`
--

CREATE TABLE `user_submenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_submenu`
--

INSERT INTO `user_submenu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(3, 4, 'Ubah Data Diri', 'peserta/ubah_profil', 'fas fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(9, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(11, 8, 'Data Peserta', 'admin/data_peserta', 'fas fa-fw fa-users', 1),
(13, 9, 'Pengaturan', 'admin/ubah_password', 'fas fa-key', 1),
(14, 10, 'Program Pelatihan', 'pelatihan/program', 'fas fa-layer-group', 1),
(15, 11, 'Info Lowongan', 'info', 'fas fa-info', 1),
(16, 10, 'Kategori Peserta', 'kategori/peserta', 'fas fa-th', 1),
(17, 10, 'Kategori Pelatihan', 'pelatihan/kategori', 'fas fa-th', 1),
(18, 11, 'Kategori Info', 'info/kategori', 'fas fa-th', 1),
(19, 10, 'Jadwal Pelatihan', 'pelatihan/jadwal', 'fas fa-calendar', 1),
(20, 1, 'Profile', 'admin/profil', 'fas fa-user', 1),
(21, 8, 'Data Perusahaan', 'admin/data_perusahaan', 'fas fa-user-tie', 1),
(23, 8, 'Data Pelatihan', 'admin/data_pelatihan', 'fas fa-folder-open', 1),
(24, 4, 'Profile', 'peserta', 'fas fa-user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_pelatihan`
--
ALTER TABLE `jadwal_pelatihan`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `kategori_info`
--
ALTER TABLE `kategori_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_pelatihan`
--
ALTER TABLE `kategori_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_peserta`
--
ALTER TABLE `kategori_peserta`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`no_pelatihan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `program_pelatihan`
--
ALTER TABLE `program_pelatihan`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal_pelatihan`
--
ALTER TABLE `jadwal_pelatihan`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori_info`
--
ALTER TABLE `kategori_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_peserta`
--
ALTER TABLE `kategori_peserta`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_pelatihan`
--
ALTER TABLE `program_pelatihan`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
