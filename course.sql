-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 07:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course`
--

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `idkursus` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `durasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`idkursus`, `judul`, `deskripsi`, `durasi`) VALUES
(3, 'Android', 'Android adalah sistem operasi (OS) yang dikembangkan oleh Google dan dirancang khusus untuk perangkat mobile seperti smartphone, tablet, smartwatch, dan perangkat elektronik lainnya. Android menggunakan kernel Linux sebagai dasar sistem operasinya dan menyediakan lingkungan yang kaya untuk pengembangan aplikasi mobile.', 100),
(4, 'Front End', 'Front-end adalah bagian dari pengembangan perangkat lunak yang berfokus pada pengembangan antarmuka pengguna (user interface) dan interaksi pengguna pada sebuah aplikasi atau situs web. Front-end melibatkan desain visual, tata letak (layout), dan logika tampilan yang dapat dilihat dan digunakan oleh pengguna.\r\n\r\nTugas utama dari seorang front-end developer adalah mengimplementasikan desain dan fungsionalitas yang dibuat oleh desainer atau tim desain ke dalam bentuk kode HTML, CSS, dan JavaScript. Mereka bertanggung jawab untuk menciptakan pengalaman pengguna yang menarik, responsif, dan mudah digunakan di berbagai perangkat dan browser.', 122);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `idmateri` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `idkursus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`idmateri`, `judul`, `deskripsi`, `link`, `idkursus`) VALUES
(10, 'Retrofit', 'Retrofit adalah sebuah library HTTP client yang populer digunakan dalam pengembangan aplikasi Android. Library ini dikembangkan oleh Square Inc. dan dirancang untuk membuat pemanggilan API HTTP menjadi lebih sederhana dan efisien dalam aplikasi Android.\r\n\r\nRetrofit memungkinkan pengembang untuk dengan mudah mengintegrasikan komunikasi dengan API web ke dalam aplikasi Android. Dengan menggunakan Retrofit, pengembang dapat mendefinisikan endpoint API dan mengkonversikan respon dari server ke dalam objek Java secara otomatis. Ini menghilangkan kebutuhan untuk menulis kode boilerplate yang berulang-ulang untuk memproses respons API.', 'https://www.figma.com/file/bAtYU3qGbB8qdhTVbFcdlO/Pre-Test-YHC?type=design&node-id=0-1&mode=design&t=3GFvcBehQBiItLVq-0', 3),
(11, 'JavaScript', 'JavaScript adalah bahasa pemrograman yang sering digunakan untuk mengembangkan aplikasi web interaktif. Dibuat oleh Brendan Eich pada tahun 1995, JavaScript awalnya diciptakan untuk meningkatkan interaktivitas pada halaman web dengan menambahkan skrip yang dapat dijalankan di sisi klien (client-side).', 'https://www.javascript.com/', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`idkursus`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`idmateri`),
  ADD KEY `idkursus` (`idkursus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `idkursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `idmateri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`idkursus`) REFERENCES `kursus` (`idkursus`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
