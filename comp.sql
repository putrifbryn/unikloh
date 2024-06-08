-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 06:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comp`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `nama`, `password`, `role`) VALUES
(1, 'admin1', 'admin1', '123', 'Admin'),
(2, 'putrifbryn', 'putrifbryn', '111', 'Admin'),
(7, 'user1', 'user1', '123', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `gambar`, `judul`, `penulis`, `isi`, `tanggal`) VALUES
(3, 'jaket hoodie.jpg', 'Lorem ipsum dolor sit amet.', 'putrifbryn', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti nobis iure, culpa deserunt ipsam error perspiciatis sequi aut rem numquam optio recusandae adipisci quaerat facere dolorum veniam asperiores rerum architecto aliquid voluptatem dignissimos molestias. Aliquam sed quae nisi, iste distinctio esse maxime quas odio modi tempora. Ipsum neque dolorum, exercitationem ex quis esse maiores similique, voluptate, soluta obcaecati quisquam perspiciatis. Quod, id mollitia! Minima asperiores ipsum nemo quos vitae, ut sint adipisci alias mollitia consequuntur quisquam commodi quas repellat ea modi rem eaque molestias molestiae, similique ullam praesentium aut distinctio culpa. Hic deleniti provident, cum ratione quos laudantium atque animi?', '2024-06-02'),
(8, 'jaket parka.jpg', 'artikel1', 'putrifbryn', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat accusamus recusandae necessitatibus voluptatem nulla delectus ullam optio a, neque veniam quia tempora vero harum asperiores, explicabo, quam repellendus? Dignissimos porro ducimus nulla, eveniet quisquam, veritatis sapiente fugiat quasi molestiae velit aperiam ex repellat corrupti fuga aut officiis vero fugit similique.', '2024-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `komen_artikel`
--

CREATE TABLE `komen_artikel` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komen_artikel`
--

INSERT INTO `komen_artikel` (`id`, `id_artikel`, `judul_artikel`, `gambar`, `username`, `isi`, `tanggal`) VALUES
(12, 3, '', '', 'putrifbryn', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta dignissimos unde, aut reprehenderit dolorum labore nulla facilis et ipsum!', '2024-06-02'),
(13, 3, '', '', 'putrifbryn', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus provident consequuntur at voluptatibus optio deleniti odit odio rem vero voluptatem officiis accusamus qui saepe dolorum omnis, possimus pariatur maxime magnam quia, nostrum praesentium illum reprehenderit suscipit eius? Incidunt non vero nobis earum magnam totam consequatur hic voluptatibus expedita reiciendis. Esse!', '2024-06-02'),
(14, 8, '', '', 'putrifbryn', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, minus.', '2024-06-02'),
(15, 3, '', '', 'user1', 'kiw', '2024-06-02'),
(17, 3, '', '', 'user1', 'samlekom', '2024-06-02'),
(18, 8, '', '', 'user1', 'haiii', '2024-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `komen_produk`
--

CREATE TABLE `komen_produk` (
  `id_komen` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jenis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `gambar`, `nama`, `harga`, `jenis`) VALUES
(999006, 'AIRism T-shirt Proteksi UV.jpg', 'AIRism T-shirt Proteksi UV', 199000, 'Wanita'),
(999007, 'Celana Chino.jpg', 'Celana Chino', 299000, 'Pria'),
(999008, 'Celana Legging AIRism Proteksi UV.jpg', 'Celana Legging AIRism Proteksi UV', 299000, 'Wanita'),
(999009, 'Celana Pendek DRY-EX.jpg', 'Celana Pendek DRY-EX', 199000, 'Pria'),
(999010, 'Jaket Boxy Tailored.jpg', 'Jaket Boxy Tailored', 599000, 'Unisex'),
(999011, 'Jaket Hoodie Utilitas.jpg', 'Jaket Hoodie Utilitas', 499000, 'Pria'),
(999012, 'jaket hoodie.jpg', 'Jaket Hoodie', 299000, 'Unisex'),
(999013, 'jaket parka.jpg', 'Jaket Parka', 399000, 'Pria'),
(999014, 'katun t-shirt.jpg', 'Katun T-shirt', 129000, 'Pria'),
(999015, 'Kemeja Flanel.jpg', 'Kemeja Flanel', 199000, 'Pria'),
(999016, 'T-shirt DRY-EX.jpg', 'T-shirt DRY-EX', 149000, 'Pria'),
(999017, 'T-shirt Lengan Panjang.jpg', 'T-shirt Lengan Panjang', 179000, 'Wanita'),
(999018, 'T-shirt Supima Katun.jpg', 'T-shirt Supima Katun', 129000, 'Wanita');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komen_artikel`
--
ALTER TABLE `komen_artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `komen_produk`
--
ALTER TABLE `komen_produk`
  ADD PRIMARY KEY (`id_komen`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komen_artikel`
--
ALTER TABLE `komen_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `komen_produk`
--
ALTER TABLE `komen_produk`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=999019;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komen_artikel`
--
ALTER TABLE `komen_artikel`
  ADD CONSTRAINT `komen_artikel_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `komen_produk`
--
ALTER TABLE `komen_produk`
  ADD CONSTRAINT `komen_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
