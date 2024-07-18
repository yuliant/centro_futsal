-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2024 at 12:01 AM
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
-- Database: `jokiskripsi_centro_futsal`
--

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
(2, 2, '2024-01-18', '08.00 - 09.01', 0),
(3, 2, '2024-01-19', '07.00 - 08.01', 1),
(4, 2, '2024-01-21', '09.00 - 10.00', 0),
(5, 2, '2024-01-24', '10.00 - 11.00', 1);

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
(2, 'Lapangan A1', 'Keterangan1', '10001', '8538492.jpg', 1),
(3, 'Lapangan A2', 'Fuga Aliquam et vol', '40000', 'download.png', 1);

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
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0: tunda, \r\n1: konfirmasi, \r\n2: tolak',
  `no_penyewaan` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyewaan`
--

INSERT INTO `tb_penyewaan` (`id_penyewaan`, `id_jadwal`, `id_user`, `id_lapangan`, `no_telp`, `harga`, `bukti_bayar`, `status`, `no_penyewaan`) VALUES
(1, 5, 8, 2, '089695165256', '10001', 'b245530f3fb7c03f81cc400bee672728.jpg', 1, '00001');

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
(8, 'Member', 'member@gmail.com', 'MSC_Atlas.png', '089695165256', '$2y$10$8qiVpGRzdZe0fwAWGQKg/.tidbC5J8uIC2XECBz5mwE8SfZJRDp2G', 3, 1, 1705240367, '00001'),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `role_id` (`role_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  MODIFY `id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_penyewaan`
--
ALTER TABLE `tb_penyewaan`
  MODIFY `id_penyewaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
