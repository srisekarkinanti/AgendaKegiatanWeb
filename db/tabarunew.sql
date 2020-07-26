-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 04:34 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabarunew`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `idevent` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `deskripsi` text NOT NULL,
  `peserta` varchar(255) NOT NULL,
  `idtopic` int(11) NOT NULL,
  `idroom` int(11) NOT NULL,
  `reminder` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`idevent`, `Tanggal`, `mulai`, `selesai`, `deskripsi`, `peserta`, `idtopic`, `idroom`, `reminder`) VALUES
(59, '2020-07-11', '06:05:00', '07:06:00', 'upacara 17 agustus', '[\"2\"]', 11, 16, '05:55:00'),
(60, '2020-07-11', '10:01:00', '17:01:00', 'rapat umum', '[\"2\",\"3\"]', 12, 14, '09:51:00'),
(61, '2020-07-18', '09:00:00', '15:04:00', ' Tabligh akbar ', '[\"2\"]', 15, 3, '00:00:00'),
(62, '2020-07-13', '05:00:00', '06:00:00', 'Upacara Peringatan Hardiknas', '[\"2\"]', 11, 16, '04:50:00'),
(63, '2020-07-21', '05:00:00', '07:07:00', 'Upacara idul adha', '[\"2\"]', 11, 11, '04:50:00'),
(64, '2020-07-13', '02:04:00', '04:05:00', 'RPT', '[\"1\",\"2\"]', 12, 15, '01:54:00'),
(65, '2020-07-13', '06:06:00', '22:00:00', 'deskripsi', '[\"2\"]', 11, 16, '05:56:00'),
(66, '2020-07-13', '21:00:00', '22:00:00', 'deskripsi', '[\"2\"]', 11, 17, '20:50:00'),
(67, '2020-07-13', '06:06:00', '22:00:00', 'deskrpispieps', '[\"2\"]', 11, 18, '05:56:00'),
(68, '2020-07-13', '06:06:00', '22:00:00', 'deksprispis', '[\"2\"]', 11, 15, '05:56:00'),
(69, '2020-07-13', '06:06:00', '22:00:00', 'lain', '[\"2\"]', 14, 18, '05:56:00'),
(70, '2020-07-13', '21:00:00', '22:00:00', 'deskripsi', '[\"2\"]', 11, 18, '20:50:00'),
(71, '2020-07-13', '06:06:00', '22:00:00', 'sadsada', '[\"1\",\"2\",\"3\"]', 12, 14, '05:56:00'),
(72, '2020-07-13', '06:06:00', '22:00:00', 'eiwfioewfio', '[\"1\",\"2\",\"3\"]', 12, 16, '05:56:00'),
(73, '2020-07-13', '06:06:00', '22:00:00', 'wd,lwqdklwq', '[\"2\",\"3\"]', 12, 16, '05:56:00'),
(74, '2020-08-17', '05:00:00', '08:00:00', 'Upacara 17 agustus', '[\"2\"]', 11, 18, '04:50:00'),
(75, '2020-07-13', '06:06:00', '22:00:00', 'Rapat divisi akuntansi', '[\"2\"]', 12, 18, '05:56:00'),
(76, '2020-07-13', '23:06:00', '22:00:00', 'wdmwqkdmksm', '[\"2\"]', 11, 17, '22:56:00'),
(77, '2020-07-13', '21:00:00', '22:00:00', 'CIK', '[\"2\",\"3\"]', 11, 15, '20:50:00'),
(78, '2020-07-22', '09:00:00', '13:03:00', 'qwertyuio', '[\"2\",\"3\"]', 14, 17, '08:50:00'),
(79, '2020-07-16', '06:06:00', '22:00:00', 'upc', '[\"1\",\"2\",\"3\"]', 11, 17, '05:56:00'),
(80, '2020-07-14', '08:00:00', '10:00:00', 'Rapat Keuangan', '[\"2\"]', 12, 14, '07:50:00'),
(81, '2020-07-15', '07:00:00', '08:00:00', 'Upacara Peringatan', '[\"2\"]', 11, 19, '06:50:00'),
(82, '2020-07-16', '12:00:00', '13:00:00', 'Tabligh Akbar', '[\"2\"]', 15, 13, '11:50:00'),
(83, '2020-07-14', '07:00:00', '08:00:00', 'Upacara Senin Pagi', '[\"2\"]', 11, 19, '06:50:00'),
(84, '2020-07-14', '07:00:00', '08:00:00', 'Rapat Anggaran', '[\"2\"]', 12, 14, '06:50:00'),
(85, '2020-07-16', '08:00:00', '09:00:00', 'Rapat Umum', '[\"2\"]', 12, 13, '07:50:00'),
(86, '2020-07-20', '08:00:00', '10:00:00', 'Rapat Pegawai', '[\"2\"]', 12, 3, '07:50:00'),
(87, '2020-07-21', '12:00:00', '13:00:00', 'Gotong Royong', '[\"2\"]', 13, 17, '11:50:00'),
(88, '2020-07-13', '23:06:00', '23:25:00', 'mkl', '[\"2\"]', 11, 17, '22:56:00'),
(89, '2020-07-17', '08:00:00', '11:00:00', 'test', '[\"2\",\"3\"]', 17, 21, '07:50:00'),
(90, '2020-07-14', '08:00:00', '11:00:00', 'test', '[\"2\",\"3\"]', 17, 16, '07:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `idnote` int(11) NOT NULL,
  `idtopic` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `catatan` text NOT NULL,
  `oleh_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`idnote`, `idtopic`, `iduser`, `tanggal`, `deskripsi`, `mulai`, `selesai`, `catatan`, `oleh_admin`) VALUES
(43, 12, 2, '2020-07-13', 'Rapat Umum', '09:00:00', '10:00:00', 'Rapat Anggaran Keuangan Daerah', 1),
(44, 11, 2, '2020-07-20', 'Upacara Pagi', '07:00:00', '08:00:00', 'Upacara setiap senin pagi', 1),
(46, 13, 2, '2020-07-17', 'Gotong Royong setiap hari jumat', '08:00:00', '10:00:00', 'Membersihkan kantor', 1),
(47, 12, 2, '2020-07-20', 'Rapat Keuangan', '08:00:00', '03:00:00', 'Perubahan Anggaran', 0),
(48, 11, 3, '2020-07-14', 'qwert', '08:55:00', '10:55:00', 'qwerty', 0),
(49, 17, 2, '2020-07-17', 'test', '08:00:00', '11:00:00', 'test', 1),
(50, 17, 3, '2020-07-17', 'test', '08:00:00', '11:00:00', 'test', 1),
(51, 17, 2, '2020-07-17', 'test', '08:00:00', '11:00:00', 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `idparticipant` int(11) NOT NULL,
  `idevent` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`idparticipant`, `idevent`, `iduser`, `status`) VALUES
(71, 64, 1, 2),
(79, 71, 1, 2),
(82, 72, 1, 2),
(87, 74, 2, 1),
(88, 75, 2, 2),
(94, 79, 1, 0),
(97, 80, 2, 2),
(98, 81, 2, 0),
(100, 83, 2, 1),
(101, 84, 2, 2),
(102, 85, 2, 0),
(103, 86, 2, 0),
(104, 87, 2, 2),
(107, 89, 3, 0),
(108, 90, 2, 2),
(109, 90, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `idreminder` int(11) NOT NULL,
  `idevent` int(11) NOT NULL,
  `status_reminder` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`idreminder`, `idevent`, `status_reminder`) VALUES
(84, 66, 1),
(85, 70, 1),
(86, 77, 1),
(87, 80, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `idroom` int(11) NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `deskripsi` text NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`idroom`, `ruangan`, `gambar`, `deskripsi`, `kapasitas`) VALUES
(3, 'Lantai 7 ', '', 'ruangan rapat', 20),
(11, 'Lantai 6 ', '', 'Bapelitbang', 30),
(12, 'Lantai 5', '', 'ruang rapat', 10),
(13, 'Lantai 4', '', 'ruang rapat', 15),
(14, 'Lantai 3', '', 'ruang rapat', 18),
(15, 'Lantai 2', '', 'ruang rapat', 28),
(16, 'Lantai 1', '', 'ruang rapat', 40),
(17, 'lantai 8', '', 'asdfgh', 20),
(18, 'ballroom hotel', 'SLJ_GRANDBALLROOMTEATRE.jpg', 'ballroom', 1000),
(19, 'Lapangan Alun-alun', '', 'Alun-alun', 100),
(20, 'Lantai 8', '', 'Ruangan Rapat', 12),
(21, 'Ruangan Bersama', '', 'Ruangan Rapat', 30);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `idtopic` int(11) NOT NULL,
  `topik` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`idtopic`, `topik`) VALUES
(11, 'Upacara'),
(12, 'Rapat'),
(13, 'Gotong Royong'),
(14, 'Lainnya'),
(15, 'pengajian'),
(16, 'contoh'),
(17, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','pegawai') NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_activated` tinyint(1) NOT NULL DEFAULT 0,
  `device_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `foto`, `created_at`, `is_activated`, `device_token`) VALUES
(1, 'feli', '$2y$10$NMkD6f5Z7wRA1u5sMyc6Z.M4IH70MD9.Aj12YaHG5vYkv0C1HON9e', 'agustaliafely@gmail.com', 'feliya agustalia', '083801096156', 'admin', '2020-07-14 04:18:41', 'user_no_image.jpg', '2019-12-30 07:36:36', 0, 'eyM9TXb9bRU:APA91bH_9LAUgQSiElETvqrt4FqVf7jn8oFT8qo8aTOqxesHfaTHvVhUwizhRVgEMJC74OH29SOw_Quxjy5gjYLZov-EwCJ2QWOtJbNJE8usXiBP8d0oYAFqhSE-UsPCz7bqoLva0QFb'),
(2, 'crik', '$2y$10$NMkD6f5Z7wRA1u5sMyc6Z.M4IH70MD9.Aj12YaHG5vYkv0C1HON9e', 'kinantisekar15@gmail.com', 'Sri Sekar Kinanti', '0808', 'pegawai', '2020-07-11 03:10:02', 'user_no_image.jpg', '2020-05-06 04:34:35', 0, 'eyM9TXb9bRU:APA91bH_9LAUgQSiElETvqrt4FqVf7jn8oFT8qo8aTOqxesHfaTHvVhUwizhRVgEMJC74OH29SOw_Quxjy5gjYLZov-EwCJ2QWOtJbNJE8usXiBP8d0oYAFqhSE-UsPCz7bqoLva0QFb'),
(3, 'iqbal', '$2y$10$NMkD6f5Z7wRA1u5sMyc6Z.M4IH70MD9.Aj12YaHG5vYkv0C1HON9e', 'iqbaldjaafar99@gmail.com', 'muhammad iqbal', '0808', 'pegawai', '2020-06-03 07:56:53', 'user_no_image.jpg', '2020-06-03 07:56:53', 1, 'eyM9TXb9bRU:APA91bH_9LAUgQSiElETvqrt4FqVf7jn8oFT8qo8aTOqxesHfaTHvVhUwizhRVgEMJC74OH29SOw_Quxjy5gjYLZov-EwCJ2QWOtJbNJE8usXiBP8d0oYAFqhSE-UsPCz7bqoLva0QFb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`idevent`),
  ADD KEY `idtopic` (`idtopic`),
  ADD KEY `idroom` (`idroom`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`idnote`),
  ADD KEY `idtopic` (`idtopic`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`idparticipant`),
  ADD KEY `idevent` (`idevent`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`idreminder`),
  ADD KEY `idevent` (`idevent`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`idroom`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`idtopic`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `idnote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `idparticipant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `idreminder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `idroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `idtopic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`idtopic`) REFERENCES `topics` (`idtopic`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`idroom`) REFERENCES `rooms` (`idroom`) ON DELETE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`idtopic`) REFERENCES `topics` (`idtopic`) ON DELETE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`idevent`) REFERENCES `events` (`idevent`) ON DELETE CASCADE,
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE CASCADE;

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `reminder_ibfk_1` FOREIGN KEY (`idevent`) REFERENCES `events` (`idevent`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
