-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 09:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `hak_akses` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `hak_akses`, `nama`, `jenkel`, `username`, `password`, `telp`, `alamat`, `email`, `role_id`) VALUES
(2, 'Staff', 'Abdullah', 'Laki-Laki', 'Bedul', '345', '098754', 'Parung Panjang', 'bedul@gmail.com', 2),
(3, 'Admin', 'Sandith', 'Laki-Laki', 'sanditamah', '123', '0878668', 'Pasar Lama, Tangerang', 'sandith@gmail.com', 1),
(4, 'Pemilik Toko', 'Nuriyani', 'Perempuan', 'Nuri', '789', '23523643', 'Jl. Lontar Raya F1/H20 Kabasiran, Parung Panjang, ', 'nuriyani@gmail.com', 3),
(6, 'Staff', 'Githa Arum', 'Perempuan', 'githa', '0910', '0987545', 'Gading Serpong', 'githaarum@gmail.com', 2),
(11, 'Supplier', 'Husni Mubarok', 'Laki-Laki', 'hushus', '0910', '0987545', 'Ciputat', 'husnimubarok@gmail.com', 4),
(12, 'Staff', 'Chika Arianti', 'Perempuan', 'Chika', '123', '098754', 'Tangerang', 'chika@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(13) NOT NULL,
  `jenkel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `nama`, `username`, `password`, `alamat`, `telp`, `jenkel`) VALUES
(1, 'Jambul Akbar', 'jambul', '123', 'Pasar Lama, Tangerang', '0878668', 'Laki-Laki'),
(2, 'Samsul Aripin', 'samsul', '1234', 'Perum', '0987754', 'Laki-Laki'),
(3, 'Anton Siregar', 'anton', '12345', 'Ciputat', '0878788', 'Laki-Laki'),
(4, 'Adi Pranata', 'adi', '666', 'Jl. Lontar Raya F1/H20 Kabasiran, Parung Panjang, Bogor', '09875456', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `id_customer`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(36, 0, 'Jambul Akbar', 'Pasar Lama, Tangerang', '2022-12-01 18:03:44', '2022-12-02 18:03:44'),
(37, 0, 'Samsul Aripin', 'Perum', '2022-12-02 15:00:36', '2022-12-03 15:00:36'),
(38, 0, 'Anton Siregar', 'Ciputat', '2022-12-02 17:12:59', '2022-12-03 17:12:59'),
(39, 0, 'Jambul Akbar', 'Pasar Lama, Tangerang', '2022-12-07 00:27:21', '2022-12-08 00:27:21'),
(40, 0, 'Jambul Akbar', 'Pasar Lama, Tangerang', '2022-12-07 00:37:08', '2022-12-08 00:37:08'),
(41, 0, 'Sandi Tamalia H', 'Bojong Gede', '2022-12-14 03:55:22', '2022-12-15 03:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `id_supplier`, `kategori`) VALUES
(5, 3, 'Makanan Kering'),
(6, 3, 'Makanan Kaleng'),
(7, 3, 'Peralatan Kucing'),
(8, 5, 'Shampo Kucing'),
(9, 5, 'Obat Kucing'),
(10, 5, 'Susu Kucing'),
(11, 5, 'Vitamin Kucing');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_invoice`, `id_produk`, `nama_produk`, `jumlah`, `harga`) VALUES
(29, 36, 26, 'Royal Canin Recovery', 1, 50000),
(30, 37, 26, 'Royal Canin Recovery', 1, 50000),
(31, 38, 26, 'Royal Canin Recovery', 1, 50000),
(32, 38, 27, 'Bolt Tuna Cat', 1, 25000),
(33, 38, 28, 'Excel Cat Food Tuna Ijo 500gr', 1, 15000),
(34, 39, 47, 'Chester 1kg', 1, 25000),
(35, 39, 49, 'Royal Canin Digrestive Care 2kg', 1, 250000),
(36, 39, 45, 'Bolt Plus Tuna dan Ayam 1kg', 1, 25000),
(37, 39, 44, 'Bolt Salmon Kitten 1kg', 1, 25000),
(38, 39, 48, 'Cleo Cat Food Adult 1kg', 1, 50000),
(39, 41, 28, 'Excel Cat Food Tuna Ijo 500gr', 1, 15000);

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_produk SET stok_produk = stok_produk-NEW.jumlah
    WHERE id_produk = NEW.id_produk;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `harga_produk` int(50) NOT NULL,
  `stok_produk` int(4) NOT NULL,
  `tgl_masuk` datetime NOT NULL DEFAULT current_timestamp(),
  `gambar_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `id_supplier`, `nama_produk`, `keterangan`, `harga_produk`, `stok_produk`, `tgl_masuk`, `gambar_produk`) VALUES
(26, 6, 3, 'Royal Canin Recovery 195gr', 'Recovery adalah makanan diet lengkap untuk kucing, diformulasikan untuk meningkatkan restorasi nutrisi selama masa pemulihan atau pada kasus hepatik lipidosis. Makanan ini mempunyai densitas energi ti', 50000, 24, '2022-12-06 17:59:12', 'Recovery5.jpg'),
(27, 5, 3, 'Bolt Tuna Cat 1kg', 'Bagus untuk pertumbuhan anabul', 25000, 24, '2022-12-06 17:00:00', 'Bolt_Tuna_Cat_Food_Kibble_Ikan2.jpg'),
(28, 5, 3, 'Excel Cat Food Tuna Ijo 500gr', 'Bagus untuk pertumbuhan dan melebatkan bulu anabul kesayangan kita', 15000, 23, '2022-12-02 10:57:36', 'EXCEL_IJO1.jpg'),
(33, 7, 3, 'Liter Box', 'Tempat pasir kucing untuk kotoran kucing', 15000, 10, '2022-12-02 16:13:10', 'literbox2.jpg'),
(34, 6, 3, 'Life Cat Adult 400gr', 'Bagus untuk pertumbuhan dan melebatkan bulu anabul kesayangan kita', 15000, 25, '2022-12-06 08:02:14', 'life_cat_adult.jpg'),
(35, 9, 3, 'Scadix 60ml', 'Obat anti infeksi kulit pada kucing peliharaan dengan spektrum luas yang diformulasikan khusus. Menyembuhkan berbagai jenis luka akibat : Scabies, Demodex, Koreng, Eksim, Kudis, dan Gatal-gatal.', 15000, 10, '2022-12-06 17:05:09', 'scadix.jpeg'),
(36, 10, 3, 'Growssy Milk 20gr', 'Bagus untuk pertumbuhan anabul', 5000, 15, '2022-12-06 17:05:26', 'susukucing.jpg'),
(37, 5, 3, 'Beauty 1kg', 'Menjaga kesehatan mata, kulit, dan bulu. Menjaga sistem metabolisme dan pertumbuhan kucing. Anti hairball.', 25000, 10, '2022-12-06 22:45:43', 'beuty.jpg'),
(38, 11, 3, 'Stimulo 30ml', 'Vitamin penambah nafsu makan kucing', 15000, 10, '2022-12-06 17:28:31', 'stimulo.jpeg'),
(39, 8, 3, 'Rainbow Shampoo Anti Flea And Tick 250 ml', 'Shampo anti kutu, anti jamur.', 20000, 10, '2022-12-06 17:51:57', 'shamporainbow.jpeg'),
(40, 7, 3, 'Sendok Pasir Kucing', 'Untuk mengambil kotoran kucing', 10000, 10, '2022-12-06 23:19:42', 'sendok_pasir.jpg'),
(41, 5, 3, 'Starry 1kg', 'Makanan khusus kucing dengan kibble renyah dan lezat yang disukai kucing. Diperkaya omega 3 dan 6, multivitamin serta taurine untuk kesehatan kucing', 25000, 10, '2022-12-06 23:25:03', 'STARRY.jpg'),
(42, 5, 3, 'Bolt Tuna Cat Bentuk Donut 1kg ', 'Bagus untuk pertumbuhan dan melebatkan bulu anabul kesayangan kita', 25000, 10, '2022-12-06 23:35:01', 'Bolt_Tuna_Cat_Food_Donut_Kibble.jpg'),
(43, 5, 3, 'Bolt Salmon Adult 1kg', 'BOLT Salmon Cat Food merupakan pakan kucing usia di atas 1 tahun, yang diperkaya dengan taurine, antioksidan, vitamin dan mineral. Bermanfaat untuk membuat kulit sehat dan bulu berkilau, serta mengura', 25000, 10, '2022-12-06 17:45:26', 'Bolt_Salmon_Cat_Food_Kibble_Bulat.jpg'),
(44, 5, 3, 'Bolt Salmon Kitten 1kg', 'BOLT Salmon Cat Food merupakan pakan kucing yang diperkaya dengan taurine, antioksidan, vitamin dan mineral. Bermanfaat untuk membuat kulit sehat dan bulu berkilau, serta mengurangi resiko FLUTD (peny', 25000, 9, '2022-12-06 23:48:31', 'Bolt_Salmon_Kitten_Cat_Food_Kibble_Half_Moon.jpg'),
(45, 5, 3, 'Bolt Plus Tuna dan Ayam 1kg', 'Bolt Plus memiliki palatabilitas lebih baik dibanding bolt yang sudah ada berdasarkan hasil riset dengan jenis kibble yang dipakai yaitu spinner. Rasa lebih menggugah selera (Chicken and Tuna)', 25000, 9, '2022-12-06 23:51:22', 'Bolt_Plus_Tuna_Chicken_Cat_Food_Kibble_Spinner1.jpg'),
(46, 5, 3, 'Cat Choize Kitten 1kg', 'CAT CHOIZE KITTEN merupakan makanan khusus untuk anak kucing yang mengandung nutrisi harian lengkap, vitamin dan mineral yang membantu memperkuat sistem kekebalan tubuh, serta mendukung pertumbuhan da', 25000, 10, '2022-12-07 00:04:40', 'cat_choize.jpg'),
(47, 5, 3, 'Chester 1kg', 'Chester mengandung Asam lemak Omega-6, Asam Linoleat, Biotin dan Zinc Yang Berfungsi meningkatkan Kesehatan Kulit dan Kilau Pada Bulu Kucing.', 25000, 9, '2022-12-07 00:07:55', 'chester.png'),
(48, 5, 3, 'Cleo Cat Food Adult 1kg', 'Cleo ini juga diformulasikan menggunakan nutrisi sehat dan seimbang yang juga mendukung pertumbuhan anak kucing.', 50000, 9, '2022-12-06 18:25:58', 'cleo_cat.jpeg'),
(49, 5, 3, 'Royal Canin Digrestive Care 2kg', 'Royal Canin Digrestive Care merupakan makanan khusus untuk kucing dengan formula dengan nutrisi seimbang untuk mendukung kesehatan pencernaan melalui nutrisi pilihan dan bentuk kibble khusus.', 250000, 9, '2022-12-07 00:15:16', 'Digestive.jpg'),
(52, 8, 5, 'dasdasasdas', 'asdas', 1000, 12, '2022-12-15 03:14:48', ''),
(53, 7, 3, 'sacsc', 'ascsdc', 10000, 10, '2022-12-15 15:03:47', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `role_id` tinyint(1) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Staff'),
(3, 'Pemilik Toko'),
(4, 'Supplier');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama`, `jenkel`, `username`, `password`, `telp`, `alamat`, `email`, `role_id`) VALUES
(3, 'Husni Mubarok', 'Laki-Laki', 'hushus', '0910', '0987545', 'Ciputat', 'husnimubarok@gmail.com', 4),
(5, 'Sri Mulyati', 'Perempuan', 'sri', '123', '087882', 'Gorontalo', 'sri@gmail.com', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD CONSTRAINT `tb_kategori_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
