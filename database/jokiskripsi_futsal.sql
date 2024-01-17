-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2024 at 04:43 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jokiskripsi_futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `alasan_bap`
--

CREATE TABLE `alasan_bap` (
  `no_alasan_bap` int(11) NOT NULL,
  `alasan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alasan_bap`
--

INSERT INTO `alasan_bap` (`no_alasan_bap`, `alasan`) VALUES
(1, 'Hilang'),
(3, 'Rusak Karena Bencana'),
(4, 'Rusak Karena Kelalaian'),
(5, 'Perubahan / Perbedaan Data');

-- --------------------------------------------------------

--
-- Table structure for table `kedatangan`
--

CREATE TABLE `kedatangan` (
  `id_tgl_kedatangan` int(11) NOT NULL,
  `tgl_kedatangan` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `kuota` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kedatangan`
--

INSERT INTO `kedatangan` (`id_tgl_kedatangan`, `tgl_kedatangan`, `jam_mulai`, `jam_selesai`, `kuota`) VALUES
(1, '2020-12-30', '07:36:00', '00:36:00', 19),
(2, '2020-12-31', '08:00:00', '00:30:00', 14),
(3, '2021-01-13', '08:01:00', '13:00:00', 15),
(4, '2021-01-14', '08:00:00', '12:00:00', 14),
(5, '2021-01-15', '08:00:00', '13:00:00', 15),
(6, '2021-02-24', '08:00:00', '16:02:00', 16),
(7, '2021-02-25', '08:00:00', '18:45:00', 16),
(8, '2021-02-26', '08:06:00', '16:06:00', 15),
(9, '2021-03-01', '08:00:00', '16:05:00', 14),
(10, '2021-03-02', '08:00:00', '16:25:00', 15),
(11, '2021-03-03', '08:00:00', '16:00:00', 15),
(12, '2021-03-04', '08:00:00', '16:15:00', 15),
(13, '2021-03-05', '08:00:00', '16:53:00', 14),
(14, '2023-09-03', '09:58:00', '12:58:00', 12),
(15, '2023-09-07', '20:53:00', '23:54:00', 10),
(16, '2023-09-10', '18:46:00', '21:46:00', 85),
(18, '2023-10-03', '08:00:00', '15:00:00', 3),
(19, '2023-10-07', '09:19:00', '10:19:00', 9),
(20, '2023-10-09', '18:13:00', '23:13:00', 22),
(21, '2023-10-10', '08:01:00', '15:00:00', 10),
(22, '2023-10-11', '08:00:00', '16:00:00', 10),
(23, '2023-11-12', '09:00:00', '15:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id_notif` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `baca` smallint(1) NOT NULL DEFAULT '0' COMMENT '0: blm dibaca,\r\n1: dibaca'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id_notif`, `judul`, `url`, `baca`) VALUES
(1, 'Permohonan Baru dari yogi (3174010707940004)', 'pemohon/cek_berkas/index', 1),
(2, 'Tanggal booking telah dipilih oleh yogi (3174010707940004)', 'pemohon/pemeriksaan/index', 1),
(3, 'Permohonan Baru dari Kurniawan Kega (1472123614781258)', 'pemohon/cek_berkas/index', 1),
(4, 'Tanggal booking telah dipilih oleh Kurniawan Kega (1472123614781258)', 'pemohon/pemeriksaan/index', 1),
(5, 'Permohonan Baru dari fathul (3515031109952121)', 'pemohon/cek_berkas/index', 1),
(6, 'Edit Data Permohonan dari fathul (3515031109952121) diajukan', 'pemohon/cek_berkas/index', 1),
(7, 'Permohonan Baru dari Fugiat nisi autem cu (3521212121211111)', 'pemohon/cek_berkas/index', 1),
(8, 'Tanggal booking telah dipilih oleh Fugiat nisi autem cu (3521212121211111)', 'pemohon/pemeriksaan/index', 1),
(9, 'Permohonan Baru dari Masrizal (3515070407970005)', 'pemohon/cek_berkas/index', 1),
(10, 'Tanggal booking telah dipilih oleh Masrizal (3515070407970005)', 'pemohon/pemeriksaan/index', 1),
(11, 'Permohonan Baru dari YOGI (3174010707940004)', 'pemohon/cek_berkas/index', 1),
(12, 'Tanggal booking telah dipilih oleh YOGI (3174010707940004)', 'pemohon/pemeriksaan/index', 1),
(13, 'Permohonan Baru dari Aliqua Ipsam laboru (3515070407970005)', 'pemohon/cek_berkas/index', 1),
(14, 'Tanggal booking telah dipilih oleh Aliqua Ipsam laboru (3515070407970005)', 'pemohon/pemeriksaan/index', 1),
(15, 'Berkas permohonan dari Masrizal sudah ditanda tangani', 'pemohon/bap/index', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemohon_data_diri`
--

CREATE TABLE `pemohon_data_diri` (
  `id_pemohon_dd` int(11) NOT NULL,
  `id_tgl_kedatangan` int(11) DEFAULT NULL,
  `alasan_bap` int(11) NOT NULL,
  `kode_pendaftaran` varchar(25) DEFAULT NULL,
  `nik` varchar(17) NOT NULL,
  `nama_pemohon` varchar(40) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telpon` varchar(17) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_paspor` varchar(11) DEFAULT NULL,
  `keluaran_kanim` varchar(20) DEFAULT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_sk_polisi` varchar(255) DEFAULT NULL,
  `foto_kk` varchar(255) DEFAULT NULL,
  `foto_lain` varchar(255) DEFAULT NULL COMMENT 'foto lain2 = foto paspor',
  `foto_akte_lahir` varchar(255) DEFAULT NULL,
  `status_laporan` smallint(1) NOT NULL COMMENT '1: pendaftaran,\r\n2: cek berkas,\r\n3: pemeriksaan\r\n4: BAP, \r\n5: Putusan',
  `status` smallint(1) NOT NULL DEFAULT '0' COMMENT '0: pending,\r\n1: diterima,\r\n2: tidak diterima',
  `putusan` text,
  `metode_bap` varchar(12) NOT NULL,
  `tgl_dibuat` date DEFAULT NULL,
  `tgl_ubah_status` date DEFAULT NULL,
  `foto_ttd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemohon_data_diri`
--

INSERT INTO `pemohon_data_diri` (`id_pemohon_dd`, `id_tgl_kedatangan`, `alasan_bap`, `kode_pendaftaran`, `nik`, `nama_pemohon`, `tempat_lahir`, `tanggal_lahir`, `telpon`, `email`, `alamat`, `no_paspor`, `keluaran_kanim`, `foto_ktp`, `foto_sk_polisi`, `foto_kk`, `foto_lain`, `foto_akte_lahir`, `status_laporan`, `status`, `putusan`, `metode_bap`, `tgl_dibuat`, `tgl_ubah_status`, `foto_ttd`) VALUES
(13, 16, 1, 'J32IrfEjBdpFPG7', '3515070407970005', 'qwqwqw1', 'qwqw', '2023-09-09', '089695615256', 'masrizal04@gmail.com', 'kendal', '123123', '123123', '', NULL, NULL, NULL, 'logo2.png', 5, 1, '', 'Walk in', NULL, NULL, NULL),
(16, 18, 1, 'hFKpWoTDobn7KRY', '3174010707940004', 'yogi', 'jakarta', '1994-07-07', '08128406157', 'yfsetiawan@gmail.com', 'Jl. Tebet Utara I', 'x111111', 'jakarta utara', 'KK2.jpg', 'KK21.jpg', 'KK22.jpg', 'KK23.jpg', 'KK24.jpg', 3, 1, 'berkas lengkap', 'Zoom', NULL, NULL, NULL),
(17, 18, 1, 'KE51NhdGzKeAj08', '1472123614781258', 'Kurniawan Kega', 'Jakarta', '1998-08-15', '00000000', 'a@gmail.com', 'awdsadwadasadwadaw', 'c123456', 'jakpus', 'CONTOH_SURAT_KELALAIAN.jpg', NULL, 'CONTOH_SURAT_KELALAIAN1.jpg', NULL, 'CONTOH_SURAT_KELALAIAN2.jpg', 5, 1, 'testing', 'Walk in', NULL, NULL, NULL),
(18, NULL, 3, 'yqELHug4fKzFZmW', '3515031109952121', 'fathul', 'semarang', '1995-02-15', '085576495235', 'fathul@gmail.com', 'dsn ciwideu rt 14 rw 14', 'x24312', 'kanim semarang', 'images.jpg', NULL, 'images1.jpg', NULL, 'images2.jpg', 2, 2, 'upload gambar kk ulang', 'Walk in', NULL, NULL, NULL),
(19, 19, 1, 'fDOwWYMdRNxfmlb', '3521212121211111', 'Fugiat nisi autem cu', 'Molestiae omnis temp', '1988-11-28', '089695615256', 'paqo@mailinator.com', 'Quasi ipsum in et n', 'Ut id dolor', 'Magni dolorem veniam', 'WhatsApp_Image_2023-10-05_at_19_01_30.jpeg', NULL, NULL, NULL, NULL, 3, 1, 'hajsh', 'Walk in', NULL, NULL, NULL),
(20, 20, 1, 'AZ4XDA2cL6nn1LL', '3515070407970005', 'Masrizal', 'Sidoarjo', '2023-10-08', '089695615256', 'masrizal04@gmail.com', 'Kendalpecabean', '123123', '123123', 'IMG-20231008-WA0009.jpg', NULL, NULL, NULL, NULL, 4, 1, 'jos', 'Walk in', NULL, NULL, '652b458bea529.png'),
(21, 23, 3, 'opbVX6XgcMuPLNe', '3174010707940004', 'YOGI', 'JAKARTA', '1994-07-07', '08128406157', 'yfsetiawan@gmail.com', 'jl. tebet', 'x112233', 'jakarta utara', 'IMG-20181029-WA0013.jpg', NULL, 'IMG-20181029-WA00131.jpg', NULL, NULL, 5, 1, '', 'Zoom', NULL, NULL, NULL),
(22, 23, 3, 'VGZOgfVWkOElfZU', '3515070407970005', 'Aliqua Ipsam laboru', 'Qui fugiat adipisic', '2007-12-28', '089695615256', 'lodalypu@mailinator.', 'Nulla aut ut est er', '', 'Veniam accusantium ', 'MSC_Atlas5.png', NULL, NULL, NULL, NULL, 4, 1, 'setuju', 'Walk in', '2023-10-14', '2023-10-14', '652b43666a021.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `tgl_jadwal` date NOT NULL,
  `jam` varchar(125) NOT NULL,
  `status_jadwal` int(1) NOT NULL DEFAULT '0' COMMENT '0: blm ad booking, 1: booked, 2: sewa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_lapangan`, `tgl_jadwal`, `jam`, `status_jadwal`) VALUES
(2, 2, '2024-01-17', '08.00 - 09.01', 1),
(3, 2, '2024-01-17', '07.00 - 08.01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lapangan`
--

CREATE TABLE `tb_lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `nama_lapangan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` varchar(12) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT '1' COMMENT '1: aktif, 0:non aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lapangan`
--

INSERT INTO `tb_lapangan` (`id_lapangan`, `nama_lapangan`, `keterangan`, `harga`, `gambar`, `aktif`) VALUES
(2, 'Lapangan A1', 'Keterangan1', '10001', '8538492.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyewaan`
--

CREATE TABLE `tb_penyewaan` (
  `id_penyewaan` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0: tunda, \r\n1: konfirmasi, \r\n2: batal',
  `no_penyewaan` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyewaan`
--

INSERT INTO `tb_penyewaan` (`id_penyewaan`, `id_jadwal`, `id_user`, `id_lapangan`, `no_telp`, `harga`, `bukti_bayar`, `status`, `no_penyewaan`) VALUES
(5, 2, 8, 2, '089695165256', '10001', 'logo9.png', 0, NULL),
(6, 3, 8, 2, '089695165256', '10001', 'logo9.png', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'email diganti menjadi Nomor NIP',
  `image` varchar(128) NOT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `no_member` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `no_telp`, `password`, `role_id`, `is_active`, `date_created`, `no_member`) VALUES
(6, 'Administrator', 'admin@gmail.com', 'default.jpg', NULL, '$2y$10$bgu5bew9lu/osdKYkZVAH.yHdZA0NBuXhixPGvgygtsWXxXI8WKum', 1, 1, 1606876918, NULL),
(7, 'Developer', 'developer@gmail.com', 'default.jpg', NULL, '$2y$10$bgu5bew9lu/osdKYkZVAH.yHdZA0NBuXhixPGvgygtsWXxXI8WKum', 2, 1, 1607813861, NULL),
(8, 'Member', 'member@gmail.com', 'default.jpg', '089695165256', '$2y$10$8qiVpGRzdZe0fwAWGQKg/.tidbC5J8uIC2XECBz5mwE8SfZJRDp2G', 3, 1, 1705240367, '00001'),
(9, 'Moonton', 'moon@gmail.com', 'default.jpg', NULL, '$2y$10$ZDUgyM5matfmMt1bPhDMb.W0K9C6z3LhOaE.w5HzJIHtjeEA5kEh6', 3, 1, 1705301947, '00010'),
(10, 'Whoopi Roy', 'kimefesyke@mailinator.com', 'default.jpg', NULL, '$2y$10$eumFiWYXYs7n/mPj0hkEeOt2yiFLhnbFszNVxQqoBTCSZVVbTvMaO', 3, 1, 1705302313, '00003'),
(11, 'Chaney Rivas', 'mymuvejotu@mailinator.com', 'default.jpg', '089695615256', '$2y$10$p.wWwORX2/vCJMcPSbFzgueTipGpmIBh8WZbuVSs6Sd64OuNvR8pm', 3, 1, 1705451944, '00004');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(10, 2, 3),
(13, 3, 2);

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
(4, 'Utilitas');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Developer'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 0),
(7, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 1, 'Kelola User', 'admin/kelolaUser', 'fas fa-fw fa-users-cog', 1),
(11, 4, 'Pemeriksaan', 'utilitas/pemeriksaan', 'fas fa-fw fa-search', 1),
(12, 4, 'Kuota', 'utilitas/kuota', 'fas fa-fw fa-box-open', 1),
(13, 4, 'Pendaftaran', 'utilitas/pendaftaran', 'fas fa-fw fa-book', 1),
(14, 4, 'Alasan BAP', 'utilitas/alasan_bap', 'fas fa-fw fa-folder', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alasan_bap`
--
ALTER TABLE `alasan_bap`
  ADD PRIMARY KEY (`no_alasan_bap`);

--
-- Indexes for table `kedatangan`
--
ALTER TABLE `kedatangan`
  ADD PRIMARY KEY (`id_tgl_kedatangan`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `pemohon_data_diri`
--
ALTER TABLE `pemohon_data_diri`
  ADD PRIMARY KEY (`id_pemohon_dd`),
  ADD KEY `id_tgl_kedatangan` (`id_tgl_kedatangan`),
  ADD KEY `alasan_bap` (`alasan_bap`),
  ADD KEY `kode_pendaftaran` (`kode_pendaftaran`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indexes for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `tb_penyewaan`
--
ALTER TABLE `tb_penyewaan`
  ADD PRIMARY KEY (`id_penyewaan`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_lapangan` (`id_lapangan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alasan_bap`
--
ALTER TABLE `alasan_bap`
  MODIFY `no_alasan_bap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kedatangan`
--
ALTER TABLE `kedatangan`
  MODIFY `id_tgl_kedatangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pemohon_data_diri`
--
ALTER TABLE `pemohon_data_diri`
  MODIFY `id_pemohon_dd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  MODIFY `id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_penyewaan`
--
ALTER TABLE `tb_penyewaan`
  MODIFY `id_penyewaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemohon_data_diri`
--
ALTER TABLE `pemohon_data_diri`
  ADD CONSTRAINT `pemohon_data_diri_ibfk_1` FOREIGN KEY (`id_tgl_kedatangan`) REFERENCES `kedatangan` (`id_tgl_kedatangan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `pemohon_data_diri_ibfk_2` FOREIGN KEY (`alasan_bap`) REFERENCES `alasan_bap` (`no_alasan_bap`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`id_lapangan`) REFERENCES `tb_lapangan` (`id_lapangan`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tb_penyewaan`
--
ALTER TABLE `tb_penyewaan`
  ADD CONSTRAINT `tb_penyewaan_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_penyewaan_ibfk_2` FOREIGN KEY (`id_lapangan`) REFERENCES `tb_lapangan` (`id_lapangan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_penyewaan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
