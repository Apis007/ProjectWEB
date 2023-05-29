-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2021 at 04:33 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbyoutube`
--

-- --------------------------------------------------------

--
-- Table structure for table `recyclerview`
--

CREATE TABLE IF NOT EXISTS `recyclerview` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar_url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recyclerview`
--

INSERT INTO `recyclerview` (`id`, `judul`, `gambar_url`) VALUES
(1, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut l', 'https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1565938792/nxu9altmvzosylzy2y8o.jpg'),
(2, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut l', 'https://media.suara.com/pictures/336x188/2020/10/03/57216-new-bmw-g-310-gs.jpg'),
(3, 'harga mobil murah penjualan meningkat', 'https://asset.kompas.com/crops/4PicRHAedGDIPRGQ_XPKxEQ2BSo=/68x60:626x432/750x500/data/photo/2020/08/23/5f41e726e2329.jpg'),
(4, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut l', 'https://2.bp.blogspot.com/-iB3LLndbXNY/WYKglkSy6VI/AAAAAAAAkJg/GOMGJ3pkJwMReGBGGORxdHjWo2q10GpkQCLcBGAs/s1600/black-news-blogger-theme-responsive.JPG'),
(6, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut l', 'https://pusatdigitalprintingjepara.com/wp-content/uploads/2019/01/Ingin-Membuat-Desain-Yang-Keren-Baca-Artikel-Desain-Grafis-Ini.jpeg'),
(7, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut l', 'https://asset.kompas.com/crops/4PicRHAedGDIPRGQ_XPKxEQ2BSo=/68x60:626x432/750x500/data/photo/2020/08/23/5f41e726e2329.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
