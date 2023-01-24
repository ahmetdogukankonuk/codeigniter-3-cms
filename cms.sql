-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 24 Oca 2023, 01:04:55
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cms`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `text_tr` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `about`
--

INSERT INTO `about` (`id`, `text`, `text_tr`, `createdAt`, `updatedAt`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.x', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.x', '2022-11-01 13:32:13', '2022-11-02 12:04:24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `text_tr` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `address`
--

INSERT INTO `address` (`id`, `text`, `text_tr`, `createdAt`, `updatedAt`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.x', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.x', '2022-11-01 13:32:24', '2022-11-02 12:04:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `userID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_tr` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `text_tr` text DEFAULT NULL,
  `imgUrl` varchar(255) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `isOnMain` tinyint(4) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`id`, `rank`, `userID`, `title`, `title_tr`, `text`, `text_tr`, `imgUrl`, `isActive`, `isOnMain`, `createdAt`, `updatedAt`) VALUES
(1, 0, 0, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.', 'default.png', 1, 1, '2022-11-01 13:35:14', '2022-11-01 15:48:13'),
(2, 0, 1, 'Lorem ipsum dolor', 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'default1.png', 1, 1, '2022-11-01 15:45:41', '2022-11-01 15:45:41'),
(3, 0, 0, 'x', 'x', 'xxxLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'xxxLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'default2.png', 1, 0, '2022-11-01 15:47:20', '2022-11-01 15:48:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `postID` int(11) NOT NULL DEFAULT 1,
  `userID` int(11) DEFAULT 1,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `postID`, `userID`, `title`, `text`, `isActive`, `createdAt`, `updatedAt`) VALUES
(1, 1, 1, 'Lorem ipsum dolor', 'Lorem ipsum dolor', 1, '2022-11-01 14:49:23', '2022-11-01 15:49:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `rank` tinyint(4) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `title_tr` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `description_tr` text DEFAULT NULL,
  `imgUrl` varchar(255) DEFAULT 'default.png',
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `isOnMain` tinyint(4) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `rank`, `title`, `title_tr`, `description`, `description_tr`, `imgUrl`, `isActive`, `isOnMain`, `createdAt`, `updatedAt`) VALUES
(1, 0, 'Lorem ipsum dolor', 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'default.png', 1, 0, '2022-11-01 15:17:23', '2022-11-01 15:17:36');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `company_info`
--

CREATE TABLE `company_info` (
  `id` int(11) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `companyMotto` varchar(255) DEFAULT NULL,
  `mail1` varchar(255) DEFAULT NULL,
  `mail2` varchar(255) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `fax1` varchar(255) DEFAULT NULL,
  `fax2` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `company_info`
--

INSERT INTO `company_info` (`id`, `companyName`, `companyMotto`, `mail1`, `mail2`, `phone1`, `phone2`, `fax1`, `fax2`, `createdAt`, `updatedAt`) VALUES
(1, 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'info@company.comx', 'info@company.comx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', '2022-11-01 15:14:49', '2022-11-02 12:03:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `company_references`
--

CREATE TABLE `company_references` (
  `id` int(11) NOT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `isOnMain` tinyint(4) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contactform`
--

CREATE TABLE `contactform` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `isActive`) VALUES
(1, 'AF', 'AFGHANISTAN', 1),
(2, 'AL', 'ALBANIA', 1),
(3, 'DZ', 'ALGERIA', 1),
(4, 'AS', 'AMERICAN SAMOA', 1),
(5, 'AD', 'ANDORRA', 1),
(6, 'AO', 'ANGOLA', 1),
(7, 'AI', 'ANGUILLA', 1),
(8, 'AQ', 'ANTARCTICA', 1),
(9, 'AG', 'ANTIGUA AND BARBUDA', 1),
(10, 'AR', 'ARGENTINA', 1),
(11, 'AM', 'ARMENIA', 1),
(12, 'AW', 'ARUBA', 1),
(13, 'AU', 'AUSTRALIA', 1),
(14, 'AT', 'AUSTRIA', 1),
(15, 'AZ', 'AZERBAIJAN', 1),
(16, 'BS', 'BAHAMAS', 1),
(17, 'BH', 'BAHRAIN', 1),
(18, 'BD', 'BANGLADESH', 1),
(19, 'BB', 'BARBADOS', 1),
(20, 'BY', 'BELARUS', 1),
(21, 'BE', 'BELGIUM', 1),
(22, 'BZ', 'BELIZE', 1),
(23, 'BJ', 'BENIN', 1),
(24, 'BM', 'BERMUDA', 1),
(25, 'BT', 'BHUTAN', 1),
(26, 'BO', 'BOLIVIA', 1),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 1),
(28, 'BW', 'BOTSWANA', 1),
(29, 'BV', 'BOUVET ISLAND', 1),
(30, 'BR', 'BRAZIL', 1),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 1),
(32, 'BN', 'BRUNEI DARUSSALAM', 1),
(33, 'BG', 'BULGARIA', 1),
(34, 'BF', 'BURKINA FASO', 1),
(35, 'BI', 'BURUNDI', 1),
(36, 'KH', 'CAMBODIA', 1),
(37, 'CM', 'CAMEROON', 1),
(38, 'CA', 'CANADA', 1),
(39, 'CV', 'CAPE VERDE', 1),
(40, 'KY', 'CAYMAN ISLANDS', 1),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 1),
(42, 'TD', 'CHAD', 1),
(43, 'CL', 'CHILE', 1),
(44, 'CN', 'CHINA', 1),
(45, 'CX', 'CHRISTMAS ISLAND', 1),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 1),
(47, 'CO', 'COLOMBIA', 1),
(48, 'KM', 'COMOROS', 1),
(49, 'CG', 'CONGO', 1),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 1),
(51, 'CK', 'COOK ISLANDS', 1),
(52, 'CR', 'COSTA RICA', 1),
(53, 'CI', 'COTE D\'IVOIRE', 1),
(54, 'HR', 'CROATIA', 1),
(55, 'CU', 'CUBA', 1),
(56, 'CY', 'CYPRUS', 1),
(57, 'CZ', 'CZECH REPUBLIC', 1),
(58, 'DK', 'DENMARK', 1),
(59, 'DJ', 'DJIBOUTI', 1),
(60, 'DM', 'DOMINICA', 1),
(61, 'DO', 'DOMINICAN REPUBLIC', 1),
(62, 'EC', 'ECUADOR', 1),
(63, 'EG', 'EGYPT', 1),
(64, 'SV', 'EL SALVADOR', 1),
(65, 'GQ', 'EQUATORIAL GUINEA', 1),
(66, 'ER', 'ERITREA', 1),
(67, 'EE', 'ESTONIA', 1),
(68, 'ET', 'ETHIOPIA', 1),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 1),
(70, 'FO', 'FAROE ISLANDS', 1),
(71, 'FJ', 'FIJI', 1),
(72, 'FI', 'FINLAND', 1),
(73, 'FR', 'FRANCE', 1),
(74, 'GF', 'FRENCH GUIANA', 1),
(75, 'PF', 'FRENCH POLYNESIA', 1),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 1),
(77, 'GA', 'GABON', 1),
(78, 'GM', 'GAMBIA', 1),
(79, 'GE', 'GEORGIA', 1),
(80, 'DE', 'GERMANY', 1),
(81, 'GH', 'GHANA', 1),
(82, 'GI', 'GIBRALTAR', 1),
(83, 'GR', 'GREECE', 1),
(84, 'GL', 'GREENLAND', 1),
(85, 'GD', 'GRENADA', 1),
(86, 'GP', 'GUADELOUPE', 1),
(87, 'GU', 'GUAM', 1),
(88, 'GT', 'GUATEMALA', 1),
(89, 'GN', 'GUINEA', 1),
(90, 'GW', 'GUINEA-BISSAU', 1),
(91, 'GY', 'GUYANA', 1),
(92, 'HT', 'HAITI', 1),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 1),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 1),
(95, 'HN', 'HONDURAS', 1),
(96, 'HK', 'HONG KONG', 1),
(97, 'HU', 'HUNGARY', 1),
(98, 'IS', 'ICELAND', 1),
(99, 'IN', 'INDIA', 1),
(100, 'ID', 'INDONESIA', 1),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 1),
(102, 'IQ', 'IRAQ', 1),
(103, 'IE', 'IRELAND', 1),
(104, 'IL', 'ISRAEL', 1),
(105, 'IT', 'ITALY', 1),
(106, 'JM', 'JAMAICA', 1),
(107, 'JP', 'JAPAN', 1),
(108, 'JO', 'JORDAN', 1),
(109, 'KZ', 'KAZAKHSTAN', 1),
(110, 'KE', 'KENYA', 1),
(111, 'KI', 'KIRIBATI', 1),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 1),
(113, 'KR', 'KOREA, REPUBLIC OF', 1),
(114, 'KW', 'KUWAIT', 1),
(115, 'KG', 'KYRGYZSTAN', 1),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 1),
(117, 'LV', 'LATVIA', 1),
(118, 'LB', 'LEBANON', 1),
(119, 'LS', 'LESOTHO', 1),
(120, 'LR', 'LIBERIA', 1),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 1),
(122, 'LI', 'LIECHTENSTEIN', 1),
(123, 'LT', 'LITHUANIA', 1),
(124, 'LU', 'LUXEMBOURG', 1),
(125, 'MO', 'MACAO', 1),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 1),
(127, 'MG', 'MADAGASCAR', 1),
(128, 'MW', 'MALAWI', 1),
(129, 'MY', 'MALAYSIA', 1),
(130, 'MV', 'MALDIVES', 1),
(131, 'ML', 'MALI', 1),
(132, 'MT', 'MALTA', 1),
(133, 'MH', 'MARSHALL ISLANDS', 1),
(134, 'MQ', 'MARTINIQUE', 1),
(135, 'MR', 'MAURITANIA', 1),
(136, 'MU', 'MAURITIUS', 1),
(137, 'YT', 'MAYOTTE', 1),
(138, 'MX', 'MEXICO', 1),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 1),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 1),
(141, 'MC', 'MONACO', 1),
(142, 'MN', 'MONGOLIA', 1),
(143, 'MS', 'MONTSERRAT', 1),
(144, 'MA', 'MOROCCO', 1),
(145, 'MZ', 'MOZAMBIQUE', 1),
(146, 'MM', 'MYANMAR', 1),
(147, 'NA', 'NAMIBIA', 1),
(148, 'NR', 'NAURU', 1),
(149, 'NP', 'NEPAL', 1),
(150, 'NL', 'NETHERLANDS', 1),
(151, 'AN', 'NETHERLANDS ANTILLES', 1),
(152, 'NC', 'NEW CALEDONIA', 1),
(153, 'NZ', 'NEW ZEALAND', 1),
(154, 'NI', 'NICARAGUA', 1),
(155, 'NE', 'NIGER', 1),
(156, 'NG', 'NIGERIA', 1),
(157, 'NU', 'NIUE', 1),
(158, 'NF', 'NORFOLK ISLAND', 1),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 1),
(160, 'NO', 'NORWAY', 1),
(161, 'OM', 'OMAN', 1),
(162, 'PK', 'PAKISTAN', 1),
(163, 'PW', 'PALAU', 1),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 1),
(165, 'PA', 'PANAMA', 1),
(166, 'PG', 'PAPUA NEW GUINEA', 1),
(167, 'PY', 'PARAGUAY', 1),
(168, 'PE', 'PERU', 1),
(169, 'PH', 'PHILIPPINES', 1),
(170, 'PN', 'PITCAIRN', 1),
(171, 'PL', 'POLAND', 1),
(172, 'PT', 'PORTUGAL', 1),
(173, 'PR', 'PUERTO RICO', 1),
(174, 'QA', 'QATAR', 1),
(175, 'RE', 'REUNION', 1),
(176, 'RO', 'ROMANIA', 1),
(177, 'RU', 'RUSSIAN FEDERATION', 1),
(178, 'RW', 'RWANDA', 1),
(179, 'SH', 'SAINT HELENA', 1),
(180, 'KN', 'SAINT KITTS AND NEVIS', 1),
(181, 'LC', 'SAINT LUCIA', 1),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 1),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 1),
(184, 'WS', 'SAMOA', 1),
(185, 'SM', 'SAN MARINO', 1),
(186, 'ST', 'SAO TOME AND PRINCIPE', 1),
(187, 'SA', 'SAUDI ARABIA', 1),
(188, 'SN', 'SENEGAL', 1),
(189, 'CS', 'SERBIA AND MONTENEGRO', 1),
(190, 'SC', 'SEYCHELLES', 1),
(191, 'SL', 'SIERRA LEONE', 1),
(192, 'SG', 'SINGAPORE', 1),
(193, 'SK', 'SLOVAKIA', 1),
(194, 'SI', 'SLOVENIA', 1),
(195, 'SB', 'SOLOMON ISLANDS', 1),
(196, 'SO', 'SOMALIA', 1),
(197, 'ZA', 'SOUTH AFRICA', 1),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 1),
(199, 'ES', 'SPAIN', 1),
(200, 'LK', 'SRI LANKA', 1),
(201, 'SD', 'SUDAN', 1),
(202, 'SR', 'SURINAME', 1),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 1),
(204, 'SZ', 'SWAZILAND', 1),
(205, 'SE', 'SWEDEN', 1),
(206, 'CH', 'SWITZERLAND', 1),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 1),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 1),
(209, 'TJ', 'TAJIKISTAN', 1),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 1),
(211, 'TH', 'THAILAND', 1),
(212, 'TL', 'TIMOR-LESTE', 1),
(213, 'TG', 'TOGO', 1),
(214, 'TK', 'TOKELAU', 1),
(215, 'TO', 'TONGA', 1),
(216, 'TT', 'TRINIDAD AND TOBAGO', 1),
(217, 'TN', 'TUNISIA', 1),
(218, 'TR', 'TURKEY', 1),
(219, 'TM', 'TURKMENISTAN', 1),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 1),
(221, 'TV', 'TUVALU', 1),
(222, 'UG', 'UGANDA', 1),
(223, 'UA', 'UKRAINE', 1),
(224, 'AE', 'UNITED ARAB EMIRATES', 1),
(225, 'GB', 'UNITED KINGDOM', 1),
(226, 'US', 'UNITED STATES', 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 1),
(228, 'UY', 'URUGUAY', 1),
(229, 'UZ', 'UZBEKISTAN', 1),
(230, 'VU', 'VANUATU', 1),
(231, 'VE', 'VENEZUELA', 1),
(232, 'VN', 'VIET NAM', 1),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 1),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 1),
(235, 'WF', 'WALLIS AND FUTUNA', 1),
(236, 'EH', 'WESTERN SAHARA', 1),
(237, 'YE', 'YEMEN', 1),
(238, 'ZM', 'ZAMBIA', 1),
(239, 'ZW', 'ZIMBABWE', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(11) NOT NULL,
  `protocol` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `isActive` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logos`
--

CREATE TABLE `logos` (
  `id` int(11) NOT NULL,
  `navbarLogo` varchar(255) DEFAULT NULL,
  `navbarLogoSize` int(11) NOT NULL DEFAULT 1,
  `footerLogo` varchar(255) DEFAULT NULL,
  `footerLogoSize` int(11) NOT NULL DEFAULT 1,
  `favicon` varchar(255) DEFAULT NULL,
  `faviconSize` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `logos`
--

INSERT INTO `logos` (`id`, `navbarLogo`, `navbarLogoSize`, `footerLogo`, `footerLogoSize`, `favicon`, `faviconSize`) VALUES
(1, 'logo.png', 150, 'logo1.png', 150, 'logo2.png', 150);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mission`
--

CREATE TABLE `mission` (
  `id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `text_tr` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `mission`
--

INSERT INTO `mission` (`id`, `text`, `text_tr`, `createdAt`, `updatedAt`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.x', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.x', '2022-11-01 13:32:47', '2022-11-02 12:04:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addressTitle` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `postCode` varchar(55) NOT NULL,
  `address` text NOT NULL,
  `orderTotal` float(9,2) NOT NULL DEFAULT 1.00,
  `orderTime` datetime NOT NULL,
  `orderType` varchar(255) NOT NULL,
  `orderNotes` text DEFAULT NULL,
  `orderPayment` tinyint(4) NOT NULL,
  `orderSituation` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`id`, `userID`, `name`, `surname`, `companyName`, `phone`, `email`, `addressTitle`, `country`, `city`, `town`, `postCode`, `address`, `orderTotal`, `orderTime`, `orderType`, `orderNotes`, `orderPayment`, `orderSituation`, `createdAt`, `updatedAt`) VALUES
(1, 2, 'Joe', 'Doe', 'Joe Doe\'s Company', '+111111', 'joedoe@gmail.com', 'Joe Doe\'s Home', 'UNITED STATES', 'California', 'Los Angeles', 'ITSLABABYX', 'Lorem ipsum dolor sit amet.', 70.00, '2022-11-02 15:16:53', 'Credit Card', 'Lorem ipsum dolor sit amet.', 1, 'Order Completed', '2022-11-02 14:19:53', '2022-11-02 15:16:53'),
(2, 2, 'Joe', 'Doe', 'Joe Doe\'s Company', '+111111', 'joedoe@gmail.com', 'Joe Doe\'s Home', 'UNITED STATES', 'California', 'Los Angeles', 'ITSLABABYX', 'Lorem ipsum dolor sit amet.', 129.90, '2022-11-02 15:16:53', 'Credit Card', 'Lorem ipsum dolor sit amet.', 1, 'Order Has Been Cancelled', '2022-11-02 14:19:53', '2022-11-02 15:16:53'),
(3, 2, 'Joe', 'Doe', 'Joe Doe\'s Company', '+111111', 'joedoe@gmail.com', 'Joe Doe\'s Home', 'UNITED STATES', 'California', 'Los Angeles', 'ITSLABABYX', 'Lorem ipsum dolor sit amet.', 70.00, '2022-11-02 15:16:53', 'Credit Card', 'Lorem ipsum dolor sit amet.', 1, 'Order is On Progress', '2022-11-02 14:19:53', '2022-11-02 15:16:53'),
(4, 2, 'Joe', 'Doe', 'Joe Doe\'s Company', '+111111', 'joedoe@gmail.com', 'Joe Doe\'s Home', 'UNITED STATES', 'California', 'Los Angeles', 'ITSLABABYX', 'Lorem ipsum dolor sit amet.', 129.90, '2022-11-02 15:16:53', 'Credit Card', 'Lorem ipsum dolor sit amet.', 1, 'Order Completed', '2022-11-02 14:19:53', '2022-11-02 15:16:53'),
(5, 2, 'Joe', 'Doe', 'Joe Doe\'s Company', '+111111', 'joedoe@gmail.com', 'Joe Doe\'s Home', 'UNITED STATES', 'California', 'Los Angeles', 'ITSLABABYX', 'Lorem ipsum dolor sit amet.', 129.90, '2022-11-02 15:16:53', 'Credit Card', 'Lorem ipsum dolor sit amet.', 1, 'Order Completed', '2022-11-02 14:19:53', '2022-11-02 15:16:53'),
(6, 2, 'Joe', 'Doe', 'Joe Doe\'s Company', '+111111', 'joedoe@gmail.com', 'Joe Doe\'s Home', 'UNITED STATES', 'California', 'Los Angeles', 'ITSLABABYX', 'Lorem ipsum dolor sit amet.', 70.00, '2022-11-02 15:16:53', 'Credit Card', 'Lorem ipsum dolor sit amet.', 1, 'Order is On Progress', '2022-11-02 14:19:53', '2022-11-02 15:16:53'),
(7, 2, 'Joe', 'Doe', 'Joe Doe\'s Company', '+111111', 'joedoe@gmail.com', 'Joe Doe\'s Home', 'UNITED STATES', 'California', 'Los Angeles', 'ITSLABABYX', 'Lorem ipsum dolor sit amet.', 70.00, '2022-11-02 15:16:53', 'Credit Card', 'Lorem ipsum dolor sit amet.', 1, 'Order Has Been Cancelled', '2022-11-02 14:19:53', '2022-11-02 15:16:53'),
(8, 2, 'Joe', 'Doe', 'Joe Doe\'s Company', '+111111', 'joedoe@gmail.com', 'Joe Doe\'s Home', 'UNITED STATES', 'California', 'Los Angeles', 'ITSLABABYX', 'Lorem ipsum dolor sit amet.', 129.90, '2022-11-02 15:16:53', 'Credit Card', 'Lorem ipsum dolor sit amet.', 1, 'Order Has Been Cancelled', '2022-11-02 14:19:53', '2022-11-02 15:16:53'),
(9, 2, 'Joe', 'Doe', 'Joe Doe\'s Company', '+111111', 'joedoe@gmail.com', 'Joe Doe\'s Home', 'UNITED STATES', 'California', 'Los Angeles', 'ITSLABABYX', 'Lorem ipsum dolor sit amet.', 70.00, '2022-11-02 15:16:53', 'Credit Card', 'Lorem ipsum dolor sit amet.', 1, 'Order is On Progress', '2022-11-02 14:19:53', '2022-11-02 15:16:53'),
(10, 2, 'Joe', 'Doe', 'Joe Doe\'s Company', '+111111', 'joedoe@gmail.com', 'Joe Doe\'s Home', 'UNITED STATES', 'California', 'Los Angeles', 'ITSLABABYX', 'Lorem ipsum dolor sit amet.', 129.90, '2022-11-02 15:16:53', 'Credit Card', 'Lorem ipsum dolor sit amet.', 1, 'Order Completed', '2022-11-02 14:19:53', '2022-11-02 15:16:53'),
(11, 2, 'Joe', 'Doe', 'Joe Doe\'s Company', '+111111', 'joedoe@gmail.com', 'Joe Doe\'s Home', 'UNITED STATES', 'California', 'Los Angeles', 'ITSLABABYX', 'Lorem ipsum dolor sit amet.', 129.90, '2022-11-02 15:16:53', 'Credit Card', 'Lorem ipsum dolor sit amet.', 1, 'Order Completed', '2022-11-02 14:19:53', '2022-11-02 15:16:53'),
(12, 2, 'Joe', 'Doe', 'Joe Doe\'s Company', '+111111', 'joedoe@gmail.com', 'Joe Doe\'s Home', 'UNITED STATES', 'California', 'Los Angeles', 'ITSLABABYX', 'Lorem ipsum dolor sit amet.', 70.00, '2022-11-02 15:16:53', 'Credit Card', 'Lorem ipsum dolor sit amet.', 1, 'Order is On Progress', '2022-11-02 14:19:53', '2022-11-02 15:16:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` float(9,2) NOT NULL DEFAULT 1.00,
  `productQuantity` int(11) NOT NULL DEFAULT 1,
  `subTotal` float(9,2) NOT NULL DEFAULT 1.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `title_tr` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `description_tr` text NOT NULL,
  `video` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `companyWebsite` varchar(255) DEFAULT NULL,
  `companyPhone` varchar(255) DEFAULT NULL,
  `companyMail` varchar(255) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `isOnMain` tinyint(4) NOT NULL DEFAULT 0,
  `isSuggested` tinyint(4) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `portfolio`
--

INSERT INTO `portfolio` (`id`, `date`, `title`, `title_tr`, `description`, `description_tr`, `video`, `companyName`, `companyWebsite`, `companyPhone`, `companyMail`, `isActive`, `isOnMain`, `isSuggested`, `createdAt`, `updatedAt`) VALUES
(1, '2012-12-11', 'Lorem ipsum dolor', 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'https://www.youtube.com/watch?v=aEh0cJCwmTc', 'Lorem ipsum dolor', 'Lorem ipsum dolor', '+1111111', 'info@company.com', 1, 1, 1, '2022-11-02 16:08:57', '2022-11-01 16:11:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolio_images`
--

CREATE TABLE `portfolio_images` (
  `id` int(11) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `portfolioID` int(11) NOT NULL,
  `imgUrl` varchar(255) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `isCover` tinyint(4) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `portfolio_images`
--

INSERT INTO `portfolio_images` (`id`, `rank`, `portfolioID`, `imgUrl`, `isActive`, `isCover`, `createdAt`) VALUES
(1, 0, 1, 'default.png', 1, 1, '2022-11-02 14:29:37'),
(2, 0, 1, 'default1.png', 1, 0, '2022-11-02 14:29:37');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `privacypolicy`
--

CREATE TABLE `privacypolicy` (
  `id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `text_tr` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `privacypolicy`
--

INSERT INTO `privacypolicy` (`id`, `text`, `text_tr`, `createdAt`, `updatedAt`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.x', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.x', '2022-11-01 13:33:01', '2022-11-02 12:04:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `categoryID` int(11) NOT NULL DEFAULT 1,
  `title` varchar(255) NOT NULL,
  `title_tr` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `description_tr` text DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `price` float(9,2) NOT NULL DEFAULT 1.00,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `isSuggested` tinyint(4) NOT NULL DEFAULT 0,
  `isOnMain` tinyint(4) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `rank`, `categoryID`, `title`, `title_tr`, `description`, `description_tr`, `video`, `price`, `isActive`, `isSuggested`, `isOnMain`, `createdAt`, `updatedAt`) VALUES
(1, 0, 1, 'Lorem ipsum dolor', 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'https://www.youtube.com/watch?v=y3mVbF3Fr-g', 99.00, 0, 1, 1, '2022-11-01 15:19:17', '2022-11-01 15:19:26'),
(2, 0, 1, 'Lorem ipsum dolor', 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'https://www.youtube.com/watch?v=y3mVbF3Fr-g', 99.00, 0, 1, 1, '2022-11-01 15:19:17', '2022-11-01 15:19:26'),
(3, 0, 1, 'Lorem ipsum dolor', 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'https://www.youtube.com/watch?v=y3mVbF3Fr-g', 99.00, 1, 1, 1, '2022-11-01 15:19:17', '2022-11-01 15:19:26'),
(4, 0, 1, 'Lorem ipsum dolor', 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae lorem elementum, molestie nibh nec, ultrices urna. Morbi erat diam, congue sed laoreet nec, lacinia ac odio. Nulla varius mi tempor fringilla varius. Pellentesque tempor leo nec nunc consectetur, ut viverra orci congue. Morbi et faucibus dolor. Sed consequat, lacus vel imperdiet tempor, enim sapien commodo ex, rutrum tempus elit tellus vitae ante. Etiam et lorem sapien. Vivamus eleifend neque erat. In eu neque condimentum, elementum odio a, porta odio. Curabitur ligula arcu, sagittis id metus vel, vestibulum suscipit ipsum. Suspendisse ullamcorper magna ligula. Sed tempor dolor rhoncus varius tristique.', 'https://www.youtube.com/watch?v=y3mVbF3Fr-g', 99.00, 1, 1, 1, '2022-11-01 15:19:17', '2022-11-01 15:19:26'),
(5, 0, 1, 'deneme', 'deneme', 'deneme', 'deneme', '', 1.00, 1, 0, 0, '2023-01-17 20:02:05', '2023-01-17 20:02:05'),
(6, 0, 1, 'deneme', 'deneme', 'deneme', 'deneme', '', 2.00, 1, 0, 0, '2023-01-17 20:03:46', '2023-01-17 20:03:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `productID` int(11) NOT NULL,
  `imgUrl` varchar(255) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `isCover` tinyint(4) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `product_images`
--

INSERT INTO `product_images` (`id`, `rank`, `productID`, `imgUrl`, `isActive`, `isCover`, `createdAt`) VALUES
(1, 0, 1, 'default.png', 1, 0, '2022-11-02 14:29:46'),
(2, 0, 1, 'default1.png', 1, 0, '2022-11-02 14:29:46'),
(3, 0, 1, 'default2.png', 1, 1, '2022-11-02 14:29:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `returnpolicy`
--

CREATE TABLE `returnpolicy` (
  `id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `text_tr` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `returnpolicy`
--

INSERT INTO `returnpolicy` (`id`, `text`, `text_tr`, `createdAt`, `updatedAt`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.', '2022-11-01 13:33:13', '2022-11-01 14:33:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `buttonTitle` varchar(255) NOT NULL,
  `buttonLink` varchar(255) NOT NULL,
  `imgUrl` varchar(255) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sliders`
--

INSERT INTO `sliders` (`id`, `rank`, `title`, `buttonTitle`, `buttonLink`, `imgUrl`, `isActive`, `createdAt`, `updatedAt`) VALUES
(1, 0, 'Lorem ipsum', 'Click for a surprise', 'https://www.youtube.com/watch?v=-E0tF2zna3A', 'default1.png', 1, '2022-11-01 16:05:08', '2022-11-01 16:05:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `social`
--

INSERT INTO `social` (`id`, `facebook`, `instagram`, `twitter`, `linkedin`, `pinterest`, `youtube`, `tiktok`, `whatsapp`, `createdAt`, `updatedAt`) VALUES
(1, 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', '2022-11-01 15:15:07', '2022-11-02 12:04:08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `text_tr` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `story`
--

INSERT INTO `story` (`id`, `text`, `text_tr`, `createdAt`, `updatedAt`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.', '2022-11-01 13:33:25', '2022-11-01 14:33:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `text_tr` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `terms`
--

INSERT INTO `terms` (`id`, `text`, `text_tr`, `createdAt`, `updatedAt`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.x', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.x', '2022-11-01 13:33:36', '2022-11-02 12:04:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userRoleID` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addressTitle` varchar(255) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postCode` varchar(55) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `isAuthority` tinyint(4) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `userRoleID`, `name`, `surname`, `email`, `password`, `addressTitle`, `companyName`, `country`, `city`, `town`, `address`, `postCode`, `isActive`, `isAuthority`, `createdAt`, `updatedAt`) VALUES
(1, 2, 'Jane', 'Doe', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', '', '', 1, 1, '2022-11-01 13:24:49', '2022-11-01 16:00:19'),
(2, 1, 'Joe', 'Doe', 'joedoe@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'x', NULL, 'ZAMBIA', 'x', 'x', 'x', 'x', 1, 1, '2022-11-01 16:02:02', '2022-11-09 13:54:38'),
(7, 2, 'Ahmet', 'Konuk', 'ahmetdogukankonuk@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Fetih Mahallesi Aslanlıkışla Caddesi Karşehir Sitesi Ferhat Apartman 263/18 Konya/Karatay', NULL, 'TURKEY', 'Karatay', 'Karatay', 'Fetih Mahallesi Aslanlıkışla Caddesi Karşehir Sitesi Ferhat Apartman 263/18 Konya/Karatay', '42030', 1, 1, '2023-01-24 00:39:39', '2023-01-24 00:39:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `permissions` text NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `user_roles`
--

INSERT INTO `user_roles` (`id`, `title`, `permissions`, `isActive`, `createdAt`, `updatedAt`) VALUES
(1, 'Admin', '{\"users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"product_categories\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"portfolio\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"blog\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"orders\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"userop\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"products\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"sliders\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"settings\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 1, '2022-11-01 13:26:32', '2022-11-01 16:00:36'),
(2, 'CEO', '{\"users\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"product_categories\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"portfolio\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"blog\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"orders\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"userop\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"products\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"user_roles\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"sliders\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"settings\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 1, '2022-11-01 13:27:04', '2022-11-01 14:26:37'),
(3, 'Personel', '{\"product_categories\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"dashboard\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"products\":{\"read\":\"on\",\"write\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 1, '2023-01-13 20:05:24', '2023-01-13 20:05:24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vision`
--

CREATE TABLE `vision` (
  `id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `text_tr` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `vision`
--

INSERT INTO `vision` (`id`, `text`, `text_tr`, `createdAt`, `updatedAt`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.x', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed dapibus ipsum, vitae rutrum diam. Integer sodales sed magna id bibendum. Curabitur pharetra ante vel risus blandit, sed venenatis purus viverra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In suscipit tellus urna, et eleifend diam bibendum iaculis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla blandit ac orci at placerat.x', '2022-11-01 13:33:44', '2022-11-02 12:04:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `websiteTitle` varchar(255) DEFAULT NULL,
  `websiteDescription` text DEFAULT NULL,
  `websiteAuthor` varchar(255) DEFAULT NULL,
  `websiteOwner` varchar(255) DEFAULT NULL,
  `websiteKeywords` varchar(255) DEFAULT NULL,
  `websiteCopyright` varchar(255) DEFAULT NULL,
  `googleVerification` varchar(255) DEFAULT NULL,
  `pinterestVerification` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `website`
--

INSERT INTO `website` (`id`, `websiteTitle`, `websiteDescription`, `websiteAuthor`, `websiteOwner`, `websiteKeywords`, `websiteCopyright`, `googleVerification`, `pinterestVerification`, `createdAt`, `updatedAt`) VALUES
(1, 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', 'Lorem ipsum dolorx', '2022-11-01 15:13:52', '2022-11-02 12:03:43');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfolio_images`
--
ALTER TABLE `portfolio_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `privacypolicy`
--
ALTER TABLE `privacypolicy`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `returnpolicy`
--
ALTER TABLE `returnpolicy`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `vision`
--
ALTER TABLE `vision`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- Tablo için AUTO_INCREMENT değeri `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `mission`
--
ALTER TABLE `mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `portfolio_images`
--
ALTER TABLE `portfolio_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `privacypolicy`
--
ALTER TABLE `privacypolicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `returnpolicy`
--
ALTER TABLE `returnpolicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `vision`
--
ALTER TABLE `vision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
