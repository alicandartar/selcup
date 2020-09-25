-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 26 Eyl 2020, 01:11:50
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `selcup`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `shortdetail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `about`
--

INSERT INTO `about` (`id`, `title`, `details`, `shortdetail`) VALUES
(1, 'ABOUT OUR COMPANY', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Providing service to the textile industry for over 18 years, our company also shows the same success in packaging and paper cup sector.</p>\r\n<p>Our vending paper cups are produced by high &ndash; tech machines with flexographic printing technique and packaged under hygienic conditions.</p>\r\n<p>By following the technological developments and innovations closely and b blending its products meeting customer requirements with environmentally friendly production techniques, our company feels pleasure and has justified pride of giving a perfect service.</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Selcup is a manufacturer of disposable paper cups in Turkey</p>\r\n</body>\r\n</html>'),
(2, 'VISION', '<p>\r\n								To become the leader of our field by our innovative, rationalist, principled and responsible approaches.\r\n							</p>', ''),
(3, 'MISSION\r\n', '<p>\r\n								To continue to offer practical solutions for business world by taking customer satisfaction as the basis.\r\n							</p>', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `product` text NOT NULL,
  `catalog` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `catalog`
--

INSERT INTO `catalog` (`id`, `image`, `product`, `catalog`) VALUES
(1, 'uploads/SELCUP CATALOGr123_1.pdf', 'PRODUCT', 'CATALOG');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `image_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `certificate`
--

INSERT INTO `certificate` (`id`, `image`, `image_state`) VALUES
(1, 'uploads/pefc-lodsago.png', 1),
(2, 'uploads/compostable.jpg', 2),
(3, 'uploads/FSC_C155919_Promotional_with_text_Portrait_WhiteOnGreen_tm_EPsKbe.png', 3),
(4, 'uploads/iso-9001.jpg', 4),
(5, 'uploads/iso-22000.jpg', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `address` longtext NOT NULL,
  `hidden_address` longtext NOT NULL,
  `phone` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`id`, `address`, `hidden_address`, `phone`, `mobile`, `fax`, `email`) VALUES
(1, ' İkitelli Osb mah. Eski Turgut Özal Cd Haseyad 1.Kısım Sit No:26/C Başakşehir / İSTANBUL / TURKEY', 'I.O.S.B Mg. E.Turgut Özal Cd. Haseyad 1.Kısım Sit. No:26/C PK.: 34490 Basaksehir / ISTANBUL', ' +90 212 659 73 05 - 10 - 11', '+90 542 355 77 14', ' +90 212 659 73 12', 'info@selcup.com.tr');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cups_name`
--

CREATE TABLE `cups_name` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `shortdetail` text NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `cups_name`
--

INSERT INTO `cups_name` (`id`, `name`, `image`, `shortdetail`, `slug`) VALUES
(1, 'Paper Cups', 'uploads/paper-cups.png', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>We are proud to offer you a wide range of paper cups both for vending and coffee to go.</p>\r\n</body>\r\n</html>', 'paper-cups'),
(2, 'Customized Paper Cups', 'uploads/customized-paper-cups.png', '<p>Express your brand or advertisement by cutomizing your cups.</p>', 'customized-paper-cups'),
(3, 'BIO Paper Cups', 'uploads/bio-paper-cups.png', '<p>Keep one step ahead of your competitors by using fully Compostable cups.</p>', 'bio-paper-cups');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cups_size`
--

CREATE TABLE `cups_size` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `capacity` text NOT NULL,
  `product_code` text NOT NULL,
  `height` text NOT NULL,
  `brim_diameter` text NOT NULL,
  `pack_quantity` text NOT NULL,
  `case_quantity` text NOT NULL,
  `specification` text NOT NULL,
  `usage_place` longtext NOT NULL,
  `usage_place2` longtext NOT NULL,
  `content` text NOT NULL,
  `content2` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `status2` int(11) NOT NULL DEFAULT 1,
  `catalog` longtext NOT NULL,
  `cup_name_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `cups_size`
--

INSERT INTO `cups_size` (`id`, `name`, `capacity`, `product_code`, `height`, `brim_diameter`, `pack_quantity`, `case_quantity`, `specification`, `usage_place`, `usage_place2`, `content`, `content2`, `status`, `status2`, `catalog`, `cup_name_id`) VALUES
(1, '4 OZ / 100 ML', '100 ml', '1234', '62 mm', '62.5 mm', '100 pcs.', '3000 pcs.', '-', 'uploads/icon/icon_1.png', 'uploads/icon/icon_2.png', '-Suitable for “To Go” ', ' ', 1, 0, 'uploads/4oz.pdf', 1),
(2, '5 OZ / 160 ML', '160 ml', '1234', '70 mm', '70.3 mm', '100 pcs.', '3000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/5oz.pdf', 1),
(3, '6 OZ / 180 ML', '180 ml', '1234', '85 mm', '70.3 mm', '100 pcs.', '3000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/6oz.pdf', 1),
(4, '7.5 OZ / 200 ML', '200 ml', '1234', '90 mm', '70.3 mm', '100 pcs.', '3000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/7,5oz.pdf', 1),
(5, '8/9 OZ / 280 ML', '280 ml', '1234', '93 mm', '80 mm', '50 pcs.', '1000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/8-9oz.pdf', 1),
(6, '9 OZ / 250 ML', '250 ml', '1234', '105 mm', '73 mm', '80 pcs.', '2400 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/9oz.pdf', 1),
(7, '12 OZ / 300 ML', '300 ml', '1234', '118 mm', '80.2 mm', '100 pcs.', '2000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/12oz.pdf', 1),
(8, '4 OZ / 100 ML', '100 ml', '1234', '80 mm', '62.5 mm', '100 pcs.', '3000 pcs.', '2.000', 'uploads/icon/icon_1.png', 'uploads/icon/icon_2.png', '-Suitable for “To Go”', '', 1, 0, 'uploads/4oz.pdf', 2),
(9, '5 OZ / 160 ML', '160 ml', '1234', '90 mm', '70.3 mm', '100 pcs.', '3000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/5oz.pdf', 2),
(10, '6 OZ / 180 ML', '180 ml', '1234', '80 mm', '70.3 mm', '100 pcs.', '3000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/6oz.pdf', 2),
(11, '7.5 OZ / 200 ML', '200 ml', '1234', '85 mm', '70.3 mm', '101 pcs.', '3000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/7,5oz.pdf', 2),
(12, '8/9 OZ / 280 ML', '280 ml', '1234', '93 mm', '80 mm', '50 pcs.', '1000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/8-9oz.pdf', 2),
(13, '9 OZ / 250 ML', '250 ml', '1234', '105 mm', '73 mm', '80 pcs.', '2400 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/9oz.pdf', 2),
(14, '12 OZ / 300 ML', '300 ml', '1234', '118 mm', '80.2 mm', '100 pcs.', '2000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/12oz.pdf', 2),
(15, '4 OZ / 100 ML', '100 ml', '1234', '80 mm', '62.5 mm', '100 pcs.', '3000 pcs.', '2.000', 'uploads/icon/icon_1.png', 'uploads/icon/icon_2.png', '-Suitable for “To Go”', '', 1, 0, 'uploads/4oz.pdf', 3),
(16, '5 OZ / 160 ML', '160 ml', '1234', '70 mm', '70.3 mm', '100 pcs.', '3000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/5oz.pdf', 3),
(17, '6 OZ / 180 ML', '180 ml', '1234', '80 mm', '70.3 mm', '100 pcs.', '3000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/6oz.pdf', 3),
(18, '7.5 OZ / 200 ML', '100 ml', '1234', '90 mm', '70.3 mm', '101 pcs.', '3000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/7,5oz.pdf', 3),
(19, '8/9 OZ / 280 ML', '280 ml', '1234', '93 mm', '80 mm', '50 pcs.', '1000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/8-9oz.pdf', 3),
(20, '9 OZ / 250 ML', '250 ml', '1234', '105 mm', '73 mm', '80 pcs.', '2400 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/9oz.pdf', 3),
(21, '12 OZ / 300 ML', '300 ml', '1234', '118 mm', '80.2 mm', '100 pcs.', '2000 pcs.', '2.000', 'uploads/icon/icon_2.png', 'uploads/icon/icon_1.png', '-Suitable for “To Go”', '-Suitable for both Vending and “To Go”', 1, 1, 'uploads/12oz.pdf', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cups_slider`
--

CREATE TABLE `cups_slider` (
  `id` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `cups_slider`
--

INSERT INTO `cups_slider` (`id`, `image`, `slug`) VALUES
(1, 'uploads/b1.jpg', 'paper-cups'),
(2, 'uploads/selcup-header-1.jpg', 'customized-paper-cups'),
(3, 'uploads/selcup-header-2-1.jpg', 'bio-paper-cups');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cups_static`
--

CREATE TABLE `cups_static` (
  `id` int(11) NOT NULL,
  `statement` longtext NOT NULL,
  `cups_name_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `cups_static`
--

INSERT INTO `cups_static` (`id`, `statement`, `cups_name_id`) VALUES
(1, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>With an expanding demand on coffee to go, The use of vending machines in offices, hospitals, universities, coffee shops, public plasces and etc. has been increasing consistantly.</p>\r\n<p>To meet this demand, we are offering the highest quality paper cups with European raw material and modern technology.</p>\r\n</body>\r\n</html>', 1),
(2, '<p>\r\n								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc luctus nisl eros, at interdum lorem commodo quis. Duis non orci mollis, vehicula metus ac, venenatis velit. Aliquam faucibus tellus ac velit ornare viverra. \r\n							</p>\r\n							<p>\r\n								Vivamus vitae sem consectetur, convallis dui vitae, semper urna. Aliquam ultricies et odio eu pretium. Quisque odio urna, lobortis a pharetra condimentum, rhoncus ut leo. Curabitur vitae vestibulum diam. Integer venenatis dapibus lorem euismod mollis.\r\n							</p>', 1),
(3, '<p>\r\n							With an expanding demand on coffee to go,  The use of vending machines in offices, hospitals, universities, coffee shops, public plasces and etc. has been increasing consistantly.  \r\n						</p>\r\n						<p>\r\n							To meet this demand, we are offering the highest  quality paper cups with European raw material and modern rechnology.\r\n						</p>', 2),
(4, '<p>\r\n								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc luctus nisl eros, at interdum lorem commodo quis. Duis non orci mollis, vehicula metus ac, venenatis velit. Aliquam faucibus tellus ac velit ornare viverra. \r\n							</p>\r\n							<p>\r\n								Vivamus vitae sem consectetur, convallis dui vitae, semper urna. Aliquam ultricies et odio eu pretium. Quisque odio urna, lobortis a pharetra condimentum, rhoncus ut leo. Curabitur vitae vestibulum diam. Integer venenatis dapibus lorem euismod mollis.\r\n							</p>', 2),
(5, '<p>\r\n							With an expanding demand on coffee to go,  The use of vending machines in offices, hospitals, universities, coffee shops, public plasces and etc. has been increasing consistantly.  \r\n						</p>\r\n						<p>\r\n							To meet this demand, we are offering the highest  quality paper cups with European raw material and modern rechnology.\r\n						</p>', 3),
(6, '<p>\r\n								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc luctus nisl eros, at interdum lorem commodo quis. Duis non orci mollis, vehicula metus ac, venenatis velit. Aliquam faucibus tellus ac velit ornare viverra. \r\n							</p>\r\n							<p>\r\n								Vivamus vitae sem consectetur, convallis dui vitae, semper urna. Aliquam ultricies et odio eu pretium. Quisque odio urna, lobortis a pharetra condimentum, rhoncus ut leo. Curabitur vitae vestibulum diam. Integer venenatis dapibus lorem euismod mollis.\r\n							</p>', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `image` longtext NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `features`
--

INSERT INTO `features` (`id`, `title`, `content`, `image`, `position`) VALUES
(1, 'Consistency', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Perfect adaptation with different manufactues of vending machines.</p>\r\n</body>\r\n</html>', 'uploads/f-icon-1.png', 0),
(2, 'Unique design', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>The cups are customizable with flexo printing technology with water based ink up to 6 colors.</p>\r\n</body>\r\n</html>', 'uploads/f-icon-2.png', 0),
(3, 'High-quality paper cups', '<p>European production high-quality paper raw material satisfies the customers with defect-free structue.</p>', 'uploads/f-icon-3.png', 0),
(4, 'Impermeability', '<p>The cups doesn’t make leaking or stinking with its perfect sealing and</p>', 'uploads/f-icon-4.png', 1),
(5, 'Great Endurance', '<p>With the ideal thickness for each sizes, provides great endurance and strength</p>', 'uploads/f-icon-5.png', 1),
(6, 'Environmental', '<p>Suitable for recovery by Material Recycling (EN 13430) and energy recovery.</p>', 'uploads/f-icon-6.png', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `home_productsize`
--

CREATE TABLE `home_productsize` (
  `id` int(11) NOT NULL,
  `size` text NOT NULL,
  `width` text NOT NULL,
  `height` text NOT NULL,
  `image` longtext NOT NULL,
  `slug` text NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `home_productsize`
--

INSERT INTO `home_productsize` (`id`, `size`, `width`, `height`, `image`, `slug`, `sequence`) VALUES
(1, '4 oz / 100 ml', '62.5 mm', '62 mm', 'uploads/size-0.png', 'product/paper-cups', 1),
(2, '5 oz / 160 ml', '70,3 mm', '70 mm', 'uploads/size-1.png', 'product/paper-cups', 2),
(3, '6 oz / 180 ml', '70,3 mm', '80 mm', 'uploads/size-2.png', 'product/paper-cups', 3),
(4, '7.5 oz / 200 ml', '70,3 mm', '90 mm', 'uploads/size-3.png', 'product/paper-cups', 4),
(5, '8 oz / 280 ml', '80 mm', '93 mm', 'uploads/size-4.png', 'product/paper-cups', 5),
(6, '9 oz / 250 ml', '73 mm', '105 mm', 'uploads/size-5.png', 'product/paper-cups', 6),
(7, '12 oz / 300 ml', '80,2 mm', '118 mm', 'uploads/size-6.png', 'product/paper-cups', 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `home_slider`
--

CREATE TABLE `home_slider` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `statement` longtext NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `home_slider`
--

INSERT INTO `home_slider` (`id`, `image`, `statement`, `sequence`) VALUES
(1, 'uploads/b1.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>We produce Vending Carton Cups that are sensitive to the environment and human health.</p>\r\n</body>\r\n</html>', 1),
(2, 'uploads/Sustainability_slider5-min.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>REUSE<br /> REDUCE<br /> RECYCLE</p>\r\n</body>\r\n</html>', 2),
(3, 'uploads/b3.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Our vending paper cups are produced by high &ndash; tech machines with flexographic printing technique and packaged under hygienic conditions.</p>\r\n</body>\r\n</html>', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `manufacturing_process`
--

CREATE TABLE `manufacturing_process` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` longtext NOT NULL,
  `section_name` text NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `manufacturing_process`
--

INSERT INTO `manufacturing_process` (`id`, `title`, `image`, `section_name`, `sequence`) VALUES
(1, 'Contact us', 'uploads/icon-1.png', 'Manufacturing Process', 1),
(2, 'Choose your size', 'uploads/icon-2.png', 'Manufacturing Process', 2),
(3, 'Choose your design', 'uploads/icon-3.png', 'Manufacturing Process', 3),
(4, 'Printing', 'uploads/icon-4.png', 'Manufacturing Process', 4),
(5, 'Cuting', 'uploads/icon-5.png', 'Manufacturing Process', 5),
(6, 'Forming', 'uploads/icon-6.png', 'Manufacturing Process', 6),
(7, 'Testing', 'uploads/icon-7.png', 'Manufacturing Process', 7),
(8, 'Packing', 'uploads/icon-8.png', 'Manufacturing Process', 8),
(9, 'Delivering', 'uploads/icon-9.png', 'Manufacturing Process', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_state` int(11) NOT NULL,
  `menu_submenu_id` int(11) NOT NULL,
  `is_submenu` tinyint(10) NOT NULL DEFAULT 0,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `menu_state`, `menu_submenu_id`, `is_submenu`, `slug`) VALUES
(1, 'HOME', 1, 1, 0, 'main'),
(2, 'PRODUCTS', 2, 2, 1, 'paper-cups'),
(3, 'ABOUT US', 3, 3, 0, 'about'),
(4, 'SUSTAINABILITY', 4, 4, 0, 'sustainability'),
(5, 'NEWS', 5, 5, 0, 'news'),
(6, 'CONTACT', 6, 6, 0, 'contact');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `date` varchar(500) NOT NULL,
  `image` longtext NOT NULL,
  `title` text NOT NULL,
  `detail` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `date`, `image`, `title`, `detail`, `status`, `slug`) VALUES
(1, '1599339600', 'uploads/news.jpg', 'New 1 title', '<p>\r\n								DaLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ex turpis, elementum vel diam non, mattis efficitur arcu. Proin sagittis libero tortor, eu feugiat augue eleifend a. Mauris quam nisl, egestas nec sollicitudin at, ornare id lorem. Nam sollicitudin fringilla felis et faucibus. Integer convallis pellentesque lorem, ut eleifend mauris rhoncus a. Aliquam erat volutpat. Morbi ipsum dui, lacinia quis egestas a, condimentum eu magna. Donec eu lacinia felis, vel efficitur tortor. Quisque egestas ex lectus, a pellentesque nisl volutpat at. Maecenas imperdiet enim at arcu elementum iaculis. Donec dictum ipsum elit, dictum aliquet augue tempus in. Pellentesque sed ipsum orci. Etiam id elementum urna.\r\n							</p>\r\n							<p>\r\n								Nulla interdum felis et dui pulvinar euismod. Vestibulum varius dapibus pharetra. Morbi velit sapien, tristique luctus dolor ut, tristique laoreet tortor. Suspendisse lobortis purus eget nibh porttitor pharetra nec sed eros. Integer sollicitudin venenatis sem, vitae vehicula arcu facilisis at. Sed imperdiet lectus sapien, quis pellentesque mi blandit vitae. Quisque nisl turpis, molestie eu elementum ultricies, vestibulum quis elit. Donec eu facilisis arcu. Duis rhoncus augue sapien, in consectetur nulla finibus et. Praesent dignissim mauris gravida vulputate posuere. Mauris euismod semper felis in laoreet. Fusce in est arcu. Cras id euismod est.\r\n							</p>\r\n							<p>\r\n								Mauris consequat urna eget suscipit mollis. Donec elit lorem, faucibus eu suscipit quis, tempus quis nisl. Donec cursus venenatis consequat. Sed at massa nec magna accumsan consectetur. Praesent pretium ipsum nunc, vitae placerat lacus rhoncus quis. Vivamus vitae ex ullamcorper, vulputate dui et, pulvinar eros. Maecenas tincidunt efficitur laoreet. Nunc at suscipit ante. Duis blandit aliquam magna, at placerat mauris accumsan nec. Mauris eget orci massa. Sed pharetra elementum turpis non maximus.\r\n							</p>', 1, 'new-1-title'),
(2, '1599339600', 'uploads/news.jpg', 'New 2 title', '<p>\r\n								MALorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ex turpis, elementum vel diam non, mattis efficitur arcu. Proin sagittis libero tortor, eu feugiat augue eleifend a. Mauris quam nisl, egestas nec sollicitudin at, ornare id lorem. Nam sollicitudin fringilla felis et faucibus. Integer convallis pellentesque lorem, ut eleifend mauris rhoncus a. Aliquam erat volutpat. Morbi ipsum dui, lacinia quis egestas a, condimentum eu magna. Donec eu lacinia felis, vel efficitur tortor. Quisque egestas ex lectus, a pellentesque nisl volutpat at. Maecenas imperdiet enim at arcu elementum iaculis. Donec dictum ipsum elit, dictum aliquet augue tempus in. Pellentesque sed ipsum orci. Etiam id elementum urna.\r\n							</p>\r\n							<p>\r\n								Nulla interdum felis et dui pulvinar euismod. Vestibulum varius dapibus pharetra. Morbi velit sapien, tristique luctus dolor ut, tristique laoreet tortor. Suspendisse lobortis purus eget nibh porttitor pharetra nec sed eros. Integer sollicitudin venenatis sem, vitae vehicula arcu facilisis at. Sed imperdiet lectus sapien, quis pellentesque mi blandit vitae. Quisque nisl turpis, molestie eu elementum ultricies, vestibulum quis elit. Donec eu facilisis arcu. Duis rhoncus augue sapien, in consectetur nulla finibus et. Praesent dignissim mauris gravida vulputate posuere. Mauris euismod semper felis in laoreet. Fusce in est arcu. Cras id euismod est.\r\n							</p>\r\n							<p>\r\n								Mauris consequat urna eget suscipit mollis. Donec elit lorem, faucibus eu suscipit quis, tempus quis nisl. Donec cursus venenatis consequat. Sed at massa nec magna accumsan consectetur. Praesent pretium ipsum nunc, vitae placerat lacus rhoncus quis. Vivamus vitae ex ullamcorper, vulputate dui et, pulvinar eros. Maecenas tincidunt efficitur laoreet. Nunc at suscipit ante. Duis blandit aliquam magna, at placerat mauris accumsan nec. Mauris eget orci massa. Sed pharetra elementum turpis non maximus.\r\n							</p>', 1, 'new-2-title'),
(3, '1599339600', 'uploads/news.jpg', 'New 3 title', '<p>\r\n								WALorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ex turpis, elementum vel diam non, mattis efficitur arcu. Proin sagittis libero tortor, eu feugiat augue eleifend a. Mauris quam nisl, egestas nec sollicitudin at, ornare id lorem. Nam sollicitudin fringilla felis et faucibus. Integer convallis pellentesque lorem, ut eleifend mauris rhoncus a. Aliquam erat volutpat. Morbi ipsum dui, lacinia quis egestas a, condimentum eu magna. Donec eu lacinia felis, vel efficitur tortor. Quisque egestas ex lectus, a pellentesque nisl volutpat at. Maecenas imperdiet enim at arcu elementum iaculis. Donec dictum ipsum elit, dictum aliquet augue tempus in. Pellentesque sed ipsum orci. Etiam id elementum urna.\r\n							</p>\r\n							<p>\r\n								Nulla interdum felis et dui pulvinar euismod. Vestibulum varius dapibus pharetra. Morbi velit sapien, tristique luctus dolor ut, tristique laoreet tortor. Suspendisse lobortis purus eget nibh porttitor pharetra nec sed eros. Integer sollicitudin venenatis sem, vitae vehicula arcu facilisis at. Sed imperdiet lectus sapien, quis pellentesque mi blandit vitae. Quisque nisl turpis, molestie eu elementum ultricies, vestibulum quis elit. Donec eu facilisis arcu. Duis rhoncus augue sapien, in consectetur nulla finibus et. Praesent dignissim mauris gravida vulputate posuere. Mauris euismod semper felis in laoreet. Fusce in est arcu. Cras id euismod est.\r\n							</p>\r\n							<p>\r\n								Mauris consequat urna eget suscipit mollis. Donec elit lorem, faucibus eu suscipit quis, tempus quis nisl. Donec cursus venenatis consequat. Sed at massa nec magna accumsan consectetur. Praesent pretium ipsum nunc, vitae placerat lacus rhoncus quis. Vivamus vitae ex ullamcorper, vulputate dui et, pulvinar eros. Maecenas tincidunt efficitur laoreet. Nunc at suscipit ante. Duis blandit aliquam magna, at placerat mauris accumsan nec. Mauris eget orci massa. Sed pharetra elementum turpis non maximus.\r\n							</p>', 1, 'new-3-title'),
(4, '1599685200', 'uploads/news.jpg', 'New 4 title', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>RALorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ex turpis, elementum vel diam non, mattis efficitur arcu. Proin sagittis libero tortor, eu feugiat augue eleifend a. Mauris quam nisl, egestas nec sollicitudin at, ornare id lorem. Nam sollicitudin fringilla felis et faucibus. Integer convallis pellentesque lorem, ut eleifend mauris rhoncus a. Aliquam erat volutpat. Morbi ipsum dui, lacinia quis egestas a, condimentum eu magna. Donec eu lacinia felis, vel efficitur tortor. Quisque egestas ex lectus, a pellentesque nisl volutpat at. Maecenas imperdiet enim at arcu elementum iaculis. Donec dictum ipsum elit, dictum aliquet augue tempus in. Pellentesque sed ipsum orci. Etiam id elementum urna.</p>\r\n<p>Nulla interdum felis et dui pulvinar euismod. Vestibulum varius dapibus pharetra. Morbi velit sapien, tristique luctus dolor ut, tristique laoreet tortor. Suspendisse lobortis purus eget nibh porttitor pharetra nec sed eros. Integer sollicitudin venenatis sem, vitae vehicula arcu facilisis at. Sed imperdiet lectus sapien, quis pellentesque mi blandit vitae. Quisque nisl turpis, molestie eu elementum ultricies, vestibulum quis elit. Donec eu facilisis arcu. Duis rhoncus augue sapien, in consectetur nulla finibus et. Praesent dignissim mauris gravida vulputate posuere. Mauris euismod semper felis in laoreet. Fusce in est arcu. Cras id euismod est.</p>\r\n<p>Mauris consequat urna eget suscipit mollis. Donec elit lorem, faucibus eu suscipit quis, tempus quis nisl. Donec cursus venenatis consequat. Sed at massa nec magna accumsan consectetur. Praesent pretium ipsum nunc, vitae placerat lacus rhoncus quis. Vivamus vitae ex ullamcorper, vulputate dui et, pulvinar eros. Maecenas tincidunt efficitur laoreet. Nunc at suscipit ante. Duis blandit aliquam magna, at placerat mauris accumsan nec. Mauris eget orci massa. Sed pharetra elementum turpis non maximus.</p>\r\n</body>\r\n</html>', 1, 'new-4-title'),
(5, '1599339600', 'uploads/news.jpg', 'New 5 title', '<p>\r\n								PALorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ex turpis, elementum vel diam non, mattis efficitur arcu. Proin sagittis libero tortor, eu feugiat augue eleifend a. Mauris quam nisl, egestas nec sollicitudin at, ornare id lorem. Nam sollicitudin fringilla felis et faucibus. Integer convallis pellentesque lorem, ut eleifend mauris rhoncus a. Aliquam erat volutpat. Morbi ipsum dui, lacinia quis egestas a, condimentum eu magna. Donec eu lacinia felis, vel efficitur tortor. Quisque egestas ex lectus, a pellentesque nisl volutpat at. Maecenas imperdiet enim at arcu elementum iaculis. Donec dictum ipsum elit, dictum aliquet augue tempus in. Pellentesque sed ipsum orci. Etiam id elementum urna.\r\n							</p>\r\n							<p>\r\n								Nulla interdum felis et dui pulvinar euismod. Vestibulum varius dapibus pharetra. Morbi velit sapien, tristique luctus dolor ut, tristique laoreet tortor. Suspendisse lobortis purus eget nibh porttitor pharetra nec sed eros. Integer sollicitudin venenatis sem, vitae vehicula arcu facilisis at. Sed imperdiet lectus sapien, quis pellentesque mi blandit vitae. Quisque nisl turpis, molestie eu elementum ultricies, vestibulum quis elit. Donec eu facilisis arcu. Duis rhoncus augue sapien, in consectetur nulla finibus et. Praesent dignissim mauris gravida vulputate posuere. Mauris euismod semper felis in laoreet. Fusce in est arcu. Cras id euismod est.\r\n							</p>\r\n							<p>\r\n								Mauris consequat urna eget suscipit mollis. Donec elit lorem, faucibus eu suscipit quis, tempus quis nisl. Donec cursus venenatis consequat. Sed at massa nec magna accumsan consectetur. Praesent pretium ipsum nunc, vitae placerat lacus rhoncus quis. Vivamus vitae ex ullamcorper, vulputate dui et, pulvinar eros. Maecenas tincidunt efficitur laoreet. Nunc at suscipit ante. Duis blandit aliquam magna, at placerat mauris accumsan nec. Mauris eget orci massa. Sed pharetra elementum turpis non maximus.\r\n							</p>', 1, 'new-5-title'),
(6, '1599339600', 'uploads/news.jpg', 'New 6 title', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>KALorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ex turpis, elementum vel diam non, mattis efficitur arcu. Proin sagittis libero tortor, eu feugiat augue eleifend a. Mauris quam nisl, egestas nec sollicitudin at, ornare id lorem. Nam sollicitudin fringilla felis et faucibus. Integer convallis pellentesque lorem, ut eleifend mauris rhoncus a. Aliquam erat volutpat. Morbi ipsum dui, lacinia quis egestas a, condimentum eu magna. Donec eu lacinia felis, vel efficitur tortor. Quisque egestas ex lectus, a pellentesque nisl volutpat at. Maecenas imperdiet enim at arcu elementum iaculis. Donec dictum ipsum elit, dictum aliquet augue tempus in. Pellentesque sed ipsum orci. Etiam id elementum urna.</p>\r\n<p>Nulla interdum felis et dui pulvinar euismod. Vestibulum varius dapibus pharetra. Morbi velit sapien, tristique luctus dolor ut, tristique laoreet tortor. Suspendisse lobortis purus eget nibh porttitor pharetra nec sed eros. Integer sollicitudin venenatis sem, vitae vehicula arcu facilisis at. Sed imperdiet lectus sapien, quis pellentesque mi blandit vitae. Quisque nisl turpis, molestie eu elementum ultricies, vestibulum quis elit. Donec eu facilisis arcu. Duis rhoncus augue sapien, in consectetur nulla finibus et. Praesent dignissim mauris gravida vulputate posuere. Mauris euismod semper felis in laoreet. Fusce in est arcu. Cras id euismod est.</p>\r\n<p>Mauris consequat urna eget suscipit mollis. Donec elit lorem, faucibus eu suscipit quis, tempus quis nisl. Donec cursus venenatis consequat. Sed at massa nec magna accumsan consectetur. Praesent pretium ipsum nunc, vitae placerat lacus rhoncus quis. Vivamus vitae ex ullamcorper, vulputate dui et, pulvinar eros. Maecenas tincidunt efficitur laoreet. Nunc at suscipit ante. Duis blandit aliquam magna, at placerat mauris accumsan nec. Mauris eget orci massa. Sed pharetra elementum turpis non maximus.</p>\r\n</body>\r\n</html>', 1, 'new-6-title');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `other_slider`
--

CREATE TABLE `other_slider` (
  `id` int(11) NOT NULL,
  `pagename` text NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `other_slider`
--

INSERT INTO `other_slider` (`id`, `pagename`, `image`) VALUES
(1, 'paper-cups', 'uploads/selcup-header-2-1.jpg'),
(2, 'customized-paper-cups', 'uploads/selcup-header-3.jpg'),
(3, 'bio-paper-cups', 'uploads/Sustainability_slider.jpg'),
(5, 'about', 'uploads/selcup-header-1.jpg'),
(6, 'sustainability', 'uploads/sustainability-bg.jpg'),
(7, 'news', 'uploads/b3.jpg'),
(8, 'newsdetail', 'uploads/b3.jpg'),
(9, 'contact', 'uploads/b2.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `page_content`
--

CREATE TABLE `page_content` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` longtext NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `seo`
--

INSERT INTO `seo` (`id`, `content`, `updated_at`) VALUES
(1, '{\"homepage\":{\"title\":\"Selcup\",\"description\":\"Selcup is a manufacturer of disposable paper cups in Turkey\",\"keywords\":\"Selcup\",\"abstract\":\"Selcup\"},\"page\":{\"title\":\"Selcup | [PageTitle]\",\"description\":\"[PageTitle] hakk\\u0131nda t\\u00fcm bilgileri ve daha fazlas\\u0131n\\u0131 Selcup web sitesinde bulabilirsiniz. [PageTitle] Selcup\",\"keywords\":\"[PageTitle], Selcup\",\"abstract\":\"[PageTitle], Selcup\"}}', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `social_settings`
--

CREATE TABLE `social_settings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` enum('facebook','twitter','linkedin','google-plus','youtube','instagram') NOT NULL,
  `sort_sequence` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `social_settings`
--

INSERT INTO `social_settings` (`id`, `title`, `url`, `icon`, `sort_sequence`, `status`, `updated_at`, `created_at`) VALUES
(2, 'Twitter', '#', 'twitter', 1, '0', '2020-09-05 23:19:17', '2017-09-27 11:23:20'),
(4, 'Youtube', '#', 'youtube', 3, '0', '2020-09-05 23:19:21', '2017-10-26 13:47:17'),
(5, 'Instagram', '#', 'instagram', 4, '1', '2020-09-05 23:19:23', '2017-10-26 13:47:30'),
(6, 'Linkedin', 'https://www.linkedin.com/company/selcup', 'linkedin', 5, '1', '2020-09-23 07:07:17', '2017-10-26 13:47:47'),
(7, 'Facebook', '#', 'facebook', 0, '0', '2020-09-05 23:19:27', '2017-09-27 11:23:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `static`
--

CREATE TABLE `static` (
  `id` int(11) NOT NULL,
  `discover` text NOT NULL,
  `contactforinquiry` text NOT NULL,
  `adres` text NOT NULL,
  `contactnumber` text NOT NULL,
  `social` text NOT NULL,
  `getintouch` text NOT NULL,
  `moreabout` text NOT NULL,
  `compostable` text NOT NULL,
  `papercup` text NOT NULL,
  `findoutmore` text NOT NULL,
  `productsize` text NOT NULL,
  `details` text NOT NULL,
  `contactus` text NOT NULL,
  `allrightsreserved` text NOT NULL,
  `contactinfo` text NOT NULL,
  `contactform` text NOT NULL,
  `name` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `ihaveread` text NOT NULL,
  `selcup` text NOT NULL,
  `cupsize` text NOT NULL,
  `capacity` text NOT NULL,
  `product_code` text NOT NULL,
  `height` text NOT NULL,
  `brim_diameter` text NOT NULL,
  `pack_quantity` text NOT NULL,
  `case_quantity` text NOT NULL,
  `specification` text NOT NULL,
  `usage_place` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `static`
--

INSERT INTO `static` (`id`, `discover`, `contactforinquiry`, `adres`, `contactnumber`, `social`, `getintouch`, `moreabout`, `compostable`, `papercup`, `findoutmore`, `productsize`, `details`, `contactus`, `allrightsreserved`, `contactinfo`, `contactform`, `name`, `subject`, `message`, `ihaveread`, `selcup`, `cupsize`, `capacity`, `product_code`, `height`, `brim_diameter`, `pack_quantity`, `case_quantity`, `specification`, `usage_place`) VALUES
(1, 'DISCOVER', 'Contact For Inquiry', 'ADDRESS', 'CONTACT NUMBER', 'SOCİAL', 'GET IN TOUCH', 'MORE ABOUT', '%100 Compostable', 'Paper cups for all your needs', 'FIND OUT MORE', 'Product size', 'DETAILS', 'CONTACT US', 'All Rights Reserved.', 'Contact Information', 'Contact Form', 'Name Surname', 'Subject', 'Message', 'I have read and accept the', 'Selcup in the World', 'Cups Size', 'Capacity', 'Product Code', 'Height', 'Brim Diameter', 'Pack Quantity', 'Case Quantity', 'Specifications', 'Usage place');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `sub_menu_name` varchar(100) NOT NULL,
  `sub_menu_state` int(11) NOT NULL,
  `menu_submenu_id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `sub_menu_name`, `sub_menu_state`, `menu_submenu_id`, `slug`, `image`) VALUES
(1, 'Paper Cups', 1, 2, 'paper-cups', 'uploads/paper-cups.png'),
(2, 'Customized Paper Cups\r\n', 2, 2, 'customized-paper-cups', 'uploads/menu-customized-paper-cups.png'),
(3, 'BIO Paper Cups\r\n', 3, 2, 'bio-paper-cups', 'uploads/menu-bio-paper-cups.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sustainability`
--

CREATE TABLE `sustainability` (
  `id` int(11) NOT NULL,
  `statement` longtext NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sustainability`
--

INSERT INTO `sustainability` (`id`, `statement`, `image`) VALUES
(1, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h2>PEFC</h2>\r\n<p>All of our paperboard comes from The Programme for the Endorsement of Forest Certification (PEFC) certified sustainably managed forest.</p>\r\n<p>PEFC certified Polyethylene (PE) inner lining ensures that the cup is safe to use and ensures that it holds content safely, hot or cold.</p>\r\n</body>\r\n</html>', 'uploads/pefc.jpg'),
(2, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h2>COMPOSTABLE</h2>\r\n<p>100% Compostable, Biodegradable Eco-Friendly Paper Cups</p>\r\n<p>In order to satisfy the increasing need for biodegradable products, Selcup Paper Cup launched the Bio-Cup range in 2019. Selcup Bio-Cup are fully compostable and certified in accordance with EN 13432 standarts.</p>\r\n<p>Selcup Bio-Cup are a sustainable choice; with high-quality carton board designed especially for cups. It is food-safe, ecological and works smoothly and consistently in converting. It\'s also economical as the board\'s structure provides the required stiffness; resulting in light, yet functional cups. Selcup Bio-Cup are 100% compostable in industrial composting and can be collected together with food waste in most collecting schemes. It\'s also suitable for cold drinks.</p>\r\n<p>All Selcup Bio-Cup are allowed to carry European official compostable \"Seedling\" logo. This means that Bioware products degrade completely in industrial composting facilities in 12 weeks.</p>\r\n</body>\r\n</html>', 'uploads/compostable.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `terms`
--

INSERT INTO `terms` (`id`, `name`, `content`) VALUES
(1, 'Terms & Privacy Policy', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris orci orci, dignissim et odio in, interdum viverra quam. Nullam fringilla pellentesque risus, at porta risus sodales in. Praesent mattis vestibulum dolor. Donec nibh tortor, commodo vitae diam non, mollis finibus erat. Cras nibh libero, facilisis a blandit eu, pharetra vitae tellus. Aliquam accumsan mi eget enim lobortis venenatis. Aliquam tempor dapibus libero, sit amet malesuada eros ultricies eget. Ut aliquam dignissim odio, nec aliquam orci maximus non. Duis ullamcorper dictum dignissim.</p>\r\n<p>Mauris massa mi, tincidunt tempus aliquet ut, aliquam non urna. Morbi justo nisl, tincidunt at interdum at, placerat non risus. Nullam euismod sagittis lorem, ac rhoncus mi scelerisque eu. Sed sit amet sapien eu libero interdum imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque ut congue ipsum. Donec imperdiet auctor libero sed laoreet.</p>\r\n<p>Donec sed laoreet dui. Mauris sagittis non enim a finibus. Sed efficitur, leo ut finibus varius, odio massa fringilla lorem, ut ultricies erat mi eget mi. Vestibulum in metus quis erat tempor placerat non vel nulla. Praesent hendrerit eleifend tincidunt. Nullam vitae nunc sit amet nulla lobortis consectetur. Morbi eleifend suscipit sollicitudin. Phasellus pharetra tortor sed nunc placerat, et mollis urna ornare.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris orci orci, dignissim et odio in, interdum viverra quam. Nullam fringilla pellentesque risus, at porta risus sodales in. Praesent mattis vestibulum dolor. Donec nibh tortor, commodo vitae diam non, mollis finibus erat. Cras nibh libero, facilisis a blandit eu, pharetra vitae tellus. Aliquam accumsan mi eget enim lobortis venenatis. Aliquam tempor dapibus libero, sit amet malesuada eros ultricies eget. Ut aliquam dignissim odio, nec aliquam orci maximus non. Duis ullamcorper dictum dignissim.</p>\r\n<p>Mauris massa mi, tincidunt tempus aliquet ut, aliquam non urna. Morbi justo nisl, tincidunt at interdum at, placerat non risus. Nullam euismod sagittis lorem, ac rhoncus mi scelerisque eu. Sed sit amet sapien eu libero interdum imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque ut congue ipsum. Donec imperdiet auctor libero sed laoreet.</p>\r\n<p>Donec sed laoreet dui. Mauris sagittis non enim a finibus. Sed efficitur, leo ut finibus varius, odio massa fringilla lorem, ut ultricies erat mi eget mi. Vestibulum in metus quis erat tempor placerat non vel nulla. Praesent hendrerit eleifend tincidunt. Nullam vitae nunc sit amet nulla lobortis consectetur. Morbi eleifend suscipit sollicitudin. Phasellus pharetra tortor sed nunc placerat, et mollis urna ornare.</p>\r\n</body>\r\n</html>'),
(2, 'Terms of Use', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris orci orci, dignissim et odio in, interdum viverra quam. Nullam fringilla pellentesque risus, at porta risus sodales in. Praesent mattis vestibulum dolor. Donec nibh tortor, commodo vitae diam non, mollis finibus erat. Cras nibh libero, facilisis a blandit eu, pharetra vitae tellus. Aliquam accumsan mi eget enim lobortis venenatis. Aliquam tempor dapibus libero, sit amet malesuada eros ultricies eget. Ut aliquam dignissim odio, nec aliquam orci maximus non. Duis ullamcorper dictum dignissim.</p>\r\n<p>Mauris massa mi, tincidunt tempus aliquet ut, aliquam non urna. Morbi justo nisl, tincidunt at interdum at, placerat non risus. Nullam euismod sagittis lorem, ac rhoncus mi scelerisque eu. Sed sit amet sapien eu libero interdum imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque ut congue ipsum. Donec imperdiet auctor libero sed laoreet.</p>\r\n<p>Donec sed laoreet dui. Mauris sagittis non enim a finibus. Sed efficitur, leo ut finibus varius, odio massa fringilla lorem, ut ultricies erat mi eget mi. Vestibulum in metus quis erat tempor placerat non vel nulla. Praesent hendrerit eleifend tincidunt. Nullam vitae nunc sit amet nulla lobortis consectetur. Morbi eleifend suscipit sollicitudin. Phasellus pharetra tortor sed nunc placerat, et mollis urna ornare.</p>\r\n</body>\r\n</html>');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cups_name`
--
ALTER TABLE `cups_name`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cups_size`
--
ALTER TABLE `cups_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cup_name_id` (`cup_name_id`);

--
-- Tablo için indeksler `cups_slider`
--
ALTER TABLE `cups_slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cups_static`
--
ALTER TABLE `cups_static`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cups_name_id` (`cups_name_id`);

--
-- Tablo için indeksler `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `home_productsize`
--
ALTER TABLE `home_productsize`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `manufacturing_process`
--
ALTER TABLE `manufacturing_process`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_submenu_id` (`menu_submenu_id`),
  ADD UNIQUE KEY `menu_submenu_id_2` (`menu_submenu_id`),
  ADD KEY `menu_submenu_id_3` (`menu_submenu_id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `other_slider`
--
ALTER TABLE `other_slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `social_settings`
--
ALTER TABLE `social_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `static`
--
ALTER TABLE `static`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_submenu_id` (`menu_submenu_id`);

--
-- Tablo için indeksler `sustainability`
--
ALTER TABLE `sustainability`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `cups_name`
--
ALTER TABLE `cups_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `cups_size`
--
ALTER TABLE `cups_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `cups_slider`
--
ALTER TABLE `cups_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `cups_static`
--
ALTER TABLE `cups_static`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `home_productsize`
--
ALTER TABLE `home_productsize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `manufacturing_process`
--
ALTER TABLE `manufacturing_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `other_slider`
--
ALTER TABLE `other_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `page_content`
--
ALTER TABLE `page_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `social_settings`
--
ALTER TABLE `social_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `static`
--
ALTER TABLE `static`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `sustainability`
--
ALTER TABLE `sustainability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `cups_size`
--
ALTER TABLE `cups_size`
  ADD CONSTRAINT `cups_size_ibfk_1` FOREIGN KEY (`cup_name_id`) REFERENCES `cups_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `cups_static`
--
ALTER TABLE `cups_static`
  ADD CONSTRAINT `cups_static_ibfk_1` FOREIGN KEY (`cups_name_id`) REFERENCES `cups_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD CONSTRAINT `sub_menu_ibfk_1` FOREIGN KEY (`menu_submenu_id`) REFERENCES `menu` (`menu_submenu_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
