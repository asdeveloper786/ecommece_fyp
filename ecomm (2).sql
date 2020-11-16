-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 07:49 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('Admin','Sub Admin') NOT NULL DEFAULT 'Admin',
  `categories_view_access` tinyint(4) NOT NULL,
  `categories_edit_access` tinyint(4) NOT NULL,
  `categories_full_access` tinyint(4) NOT NULL,
  `products_access` tinyint(4) NOT NULL,
  `orders_access` tinyint(4) NOT NULL,
  `users_access` tinyint(4) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `type`, `categories_view_access`, `categories_edit_access`, `categories_full_access`, `products_access`, `orders_access`, `users_access`, `status`, `created_at`, `updated_at`) VALUES
(4, 'test', '417833c5fd04356a0b9e95ffad37fca9', 'Sub Admin', 1, 0, 0, 1, 0, 0, 1, '2020-06-24 19:01:38.000000', '2020-06-24 14:09:22.000000'),
(8, 'admin', '794fd8df6686e85e0d8345670d2cd4ae', 'Admin', 0, 0, 0, 0, 0, 0, 1, '2020-06-24 20:51:15.000000', '2020-08-14 19:37:13.026602'),
(9, 'ahsan', '3d68b18bd9042ad3dc79643bde1ff351', 'Sub Admin', 1, 1, 1, 1, 1, 1, 1, '2020-08-13 20:36:00.000000', '2020-08-13 15:36:00.000000'),
(10, 'subadmin', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Sub Admin', 0, 0, 0, 0, 0, 0, 1, '2020-08-13 23:53:34.000000', '2020-08-13 18:53:34.000000'),
(11, 'ahtisham', '25f9e794323b453885f5181f1b624d0b', 'Sub Admin', 1, 0, 0, 0, 0, 0, 1, '2020-08-16 22:40:19.000000', '2020-08-16 17:40:19.000000');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'The Mythbuster’s Guide to Saving Money on Energy Bills', 'The Mythbuster’s Guide to Saving Money on Energy Bills', 'How to Save Money on Energy Bills: Beginner Level\r\n\r\nDon an extra jumper.\r\nInsulate your loft.\r\nHave a shower, not a bath.\r\nOnly boil as much water as you need in your kettle.\r\nPut off turning on your central heating for as long as you can.\r\nTurn the light off when you leave a room.\r\nUnplug all your devices at the wall, because standby mode costs money.\r\nPah! This is beginner level energy-saving. You can push it much further than that – but how far are you prepared to go?', '93198.jpg', 1, '2020-06-21', '2020-06-21 15:37:01'),
(2, 'What can you do with an old pound coin? Here are 5 great ideas.', 'What can you do with an old pound coin? Here are 5 great ideas.', 'Here are five other ways to spend your old pound coins:\r\n\r\n1. You can use your old pound coin in supermarket trolleys. \r\nCertain supermarkets have not upgraded their trolleys, so the round pound coins will still work. Earlier this month, Sainsburys and Tesco both admitted they hadn’t yet modified their trolleys to take the new pound coins, blaming ‘internal logistical problems.’\r\n\r\n \r\n\r\n2. You can donate your old pound coin to the Poppy Appeal.\r\nThe Royal British Legion is accepting old one pound coins as donations to its 2017 Poppy Appeal, which runs until 12 November 2017.\r\n\r\nClaire Rowcliffe, director of fundraising for the Royal British Legion, has said: “We’d be delighted to turn your out-of-date pounds into poppies, commemorating the fallen while enabling us to offer vital assistance to all members of the Armed Forces community, young and old.”\r\n\r\n \r\n\r\n3. You can donate your old pound coin to Pudsey’s Round Pound Countdown.\r\nAnother charity that would be grateful for your old one pound coins in 2017 is Children in Need. It’s called Pudsey’s Round Pound Countdown.', '56255.jpg', 1, '2020-06-21', '2020-06-21 15:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `blogs_comments`
--

CREATE TABLE `blogs_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `approve` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs_comments`
--

INSERT INTO `blogs_comments` (`id`, `blog_id`, `name`, `comment`, `approve`, `created_at`, `updated_at`) VALUES
(1, 2, 'test', 'test', 1, '2020-06-22 08:22:49', '2020-06-24 14:48:12'),
(2, 1, 'rawdr', 'jasdsad', 1, '2020-08-16 10:26:29', '2020-08-16 10:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `product_color`, `product_code`, `size`, `quantity`, `user_email`, `session_id`, `price`, `created_at`, `updated_at`) VALUES
(8, 21, 'Lawn-03', 'Maroon', '011', 'small', 1, 'wazah.ahmad@yahoo.com', 'X7QvbNRo9Ae4LzPSHKx8EsaCKQjw5jwOsV7ZHU9u', 1000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 0, 'Men Wear', 'Men Wear', 'MenWear', 1, '2020-07-16 11:04:17', '2020-08-16 11:04:17', NULL),
(8, 0, 'Women Wear', 'WomenWear', 'Womenwear', 1, '2020-06-16 11:05:07', '2020-08-16 11:05:07', NULL),
(9, 0, 'Men Shoes', 'Men Shoes', 'MenShoes', 1, '2020-06-16 11:05:45', '2020-08-16 11:05:45', NULL),
(10, 0, 'Women Shoes', 'WomenShoes', 'WomenShoes', 1, '2020-07-16 11:06:24', '2020-08-16 11:06:24', NULL),
(11, 0, 'Kids Clothes', 'KidsClothes', 'KidsClothes', 1, '2020-06-16 11:07:25', '2020-08-16 11:07:25', NULL),
(12, 0, 'Other Accessories', 'Other Accessories', 'OtherAccessories', 1, '2020-08-16 11:08:13', '2020-08-16 11:08:13', NULL),
(14, 7, 'casual shirts', 'casual shirts', 'casual shirts', 1, '2020-07-16 11:10:48', '2020-08-16 11:10:48', NULL),
(15, 7, 'T-shirts', 'T-shirts', 'T-shirts', 1, '2020-08-16 11:12:13', '2020-08-16 11:12:13', NULL),
(16, 8, 'Lawn', 'Lawn', 'Lawn', 1, '2020-08-16 11:12:47', '2020-08-16 11:12:47', NULL),
(17, 8, 'Chifon', 'Chifon', 'Chifon', 1, '2020-08-16 11:13:15', '2020-08-16 11:13:15', NULL),
(18, 9, 'Sandals', 'Sandals', 'Sandals', 1, '2020-08-16 11:13:48', '2020-08-16 11:13:48', NULL),
(19, 9, 'Slippers', 'Slippers', 'Slippers', 1, '2020-08-16 11:14:15', '2020-08-16 11:14:15', NULL),
(20, 10, 'Heels', 'Heels', 'Heels', 1, '2020-08-16 11:14:48', '2020-08-16 11:14:48', NULL),
(21, 10, 'Snikers', 'Snikers', 'Snikers', 1, '2020-08-16 11:15:15', '2020-08-16 11:15:15', NULL),
(22, 11, 'Baby Boys', 'Baby Boys', 'BabyBoys', 1, '2020-08-16 11:15:46', '2020-08-16 11:15:46', NULL),
(23, 11, 'Baby Girls', 'Baby Girls', 'Baby Girls', 0, '2020-08-16 11:16:18', '2020-08-16 11:16:18', NULL),
(24, 12, 'Purse', 'Purse', 'Purse', 1, '2020-08-16 11:16:59', '2020-08-16 11:16:59', NULL),
(25, 12, 'Shawls', 'Shawls', 'Shawls', 1, '2020-08-16 11:17:25', '2020-08-16 11:17:25', NULL),
(26, 12, 'Wallet', 'Wallet', 'Wallet', 1, '2020-08-16 11:17:53', '2020-08-16 11:17:53', NULL),
(27, 12, 'Watches', 'Watches', 'Watches', 1, '2020-08-16 11:18:20', '2020-08-16 11:18:20', NULL),
(28, 11, 'Baby Girls', 'Baby Girls', 'Baby Girls', 1, '2020-08-16 11:19:47', '2020-08-16 11:19:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` int(255) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 10, 'wazah.ahmad@yahoo.com', 'test', 'sadsa', 'dsadas', 'dasdasd', 'Argentina', '2', '21321', '2020-08-16 16:19:19.713040', '2020-08-16 16:19:19.000000'),
(2, 14, 'dgskill1122@gmail.com', 'ahsan', 'Hafizabad Road, Gujranwala, Pakistan', 'Gujranwala', 'Punjab', 'Afghanistan', '52250', '06235622990', '2020-08-16 16:55:04.000000', '2020-08-16 16:55:04.000000');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'sadsd', 'sad@dse', 'asdas', 'test', '2020-06-21 21:34:23.000000', '2020-06-21 16:34:23.000000'),
(2, 'asdas', 'ad@dsd', 'das', 'sadsad', '2020-06-21 21:36:23.000000', '2020-06-21 16:36:23.000000'),
(3, 'ahsan', 'wazah.ahmad@yahoo.com', 'Product', 'Hello we need a product which is out of stock', '2020-08-16 22:07:42.000000', '2020-08-16 17:07:42.000000');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_13_113851_create_category_table', 1),
(5, '2020_05_13_163900_create_products_table', 2),
(6, '2020_05_14_205234_create_products_attributes_table', 3),
(7, '2020_05_18_213441_create_products_images_table', 4),
(8, '2020_05_20_112821_create_cart_table', 5),
(9, '2020_06_08_125641_create_blogs_table', 6),
(10, '2020_06_08_171127_create_products_comments_table', 7),
(11, '2020_06_08_212150_create_blogs_comments_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `shipping_charges` float NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `grand_total` float NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `pincode`, `country`, `mobile`, `shipping_charges`, `order_status`, `payment_method`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 10, 'wazah.ahmad@yahoo.com', 'test', 'sadsa', 'dsadas', 'dasdasd', '2', 'Pakistan', '21321', 0, 'Delivered', 'Paypal', 4000, '2020-08-11', '2020-08-16 17:32:21.495624'),
(2, 10, 'wazah.ahmad@yahoo.com', 'wazah', 'Hafizabad Road, Gujranwala, Pakistan', 'Gujranwala', 'Punjab', '52250', 'Pakistan', '06235622990', 0, 'Delivered', 'Paypal', 2000, '2020-06-15', '2020-08-16 17:30:48.372532'),
(3, 10, 'wazah.ahmad@yahoo.com', 'test', 'sadsa', 'dsadas', 'dasdasd', '2', 'Argentina', '21321', 0, 'Delivered', 'Paypal', 1800, '2020-07-16', '2020-08-16 17:31:08.531839'),
(4, 14, 'dgskill1122@gmail.com', 'ahsan', 'Hafizabad Road, Gujranwala, Pakistan', 'Gujranwala', 'Punjab', '52250', 'Afghanistan', '06235622990', 0, 'New', 'COD', 900, '2020-06-16', '2020-08-16 17:31:41.971876');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_size`, `product_color`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 2, 'AT-2-L', 'Athletic Shoes 1', 'Large', 'orange', '2000', 2, '2020-06-21 20:58:08.000000', '2020-06-21 15:58:08.000000'),
(2, 2, 10, 2, 'AT-2-L', 'Athletic Shoes 1', 'Large', 'orange', '2000', 1, '2020-08-13 20:56:17.000000', '2020-08-13 15:56:17.000000'),
(3, 3, 10, 10, '02-1', 'Casual red', 'small', 'Red', '900', 2, '2020-08-16 21:21:30.000000', '2020-08-16 16:21:30.000000'),
(4, 4, 14, 10, '02-1', 'Casual red', 'small', 'Red', '900', 1, '2020-08-16 21:55:26.000000', '2020-08-16 16:55:26.000000');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `care` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `feature_item` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_code`, `product_color`, `description`, `care`, `price`, `image`, `video`, `status`, `feature_item`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Athletic shoes', 'AT-1', 'white', 'éS Skateboarding Accel OG shoes.\r\n\r\n- STI Open Cell foam for foot contact, board feel, cushioning and control. \r\n- Premium suede in high quality made for skateboarding.\r\n- 400 NBS rubber sole for long durability.\r\n- Alternative input holes for the lacing.', 'Material:\r\nUpper: Suede.\r\nLining: Textile.\r\nSole: Rubber.', 2000.00, '39676.jpg', 'videoplayback.mp4', 1, 1, '2020-06-21 15:13:23', '2020-08-16 10:59:27', '2020-08-16 10:59:27'),
(2, 2, 'Athletic Shoes 1', 'AT-2', 'orange', 'éS Skateboarding Accel OG shoes.\r\n\r\n- STI Open Cell foam for foot contact, board feel, cushioning and control. \r\n- Premium suede in high quality made for skateboarding.\r\n- 400 NBS rubber sole for long durability.\r\n- Alternative input holes for the lacing.', 'Material:\r\nUpper: Suede.\r\nLining: Textile.\r\nSole: Rubber.', 2000.00, '5869.png', '', 1, 1, '2020-06-21 15:23:38', '2020-08-16 10:59:38', '2020-08-16 10:59:38'),
(3, 5, 'T-shirt', 'TS-1', 'Pink', 'éS Skateboarding Accel OG shoes.\r\n\r\n- STI Open Cell foam for foot contact, board feel, cushioning and control. \r\n- Premium suede in high quality made for skateboarding.\r\n- 400 NBS rubber sole for long durability.\r\n- Alternative input holes for the lacing.', 'éS Shoes - Accel OG\r\nSALE -30%\r\néS Shoes - Accel OG\r\nSALE -30%\r\néS Shoes - Accel OG\r\nSALE -30%\r\néS Shoes - Accel OG\r\nSALE -30%\r\néS Shoes - Accel OG\r\nSALE -30%\r\n\r\nView all Sneakers from éS\r\nView all Sneakers\r\nView all products from éS\r\néS\r\nShoes - Accel OG\r\nColor: Black\r\nArticle no: 1008650201\r\néS Skateboarding Accel OG shoes.\r\n\r\n- STI Open Cell foam for foot contact, board feel, cushioning and control. \r\n- Premium suede in high quality made for skateboarding.\r\n- 400 NBS rubber sole for long durability.\r\n- Alternative input holes for the lacing.\r\n\r\nMaterial:\r\nUpper: Suede.\r\nLining: Textile.\r\nSole: Rubber.', 2000.00, '16031.jpg', '', 1, 1, '2020-06-21 15:28:19', '2020-08-16 10:59:48', '2020-08-16 10:59:48'),
(4, 5, 'T-shirt1', 'TS-2', 'Sea-Green', '', '', 2000.00, '5440.jpg', '', 1, 1, '2020-06-21 15:30:36', '2020-06-23 15:29:42', '2020-06-23 15:29:42'),
(5, 2, 'test', 'test', 'test', '', '', 12.00, '', '', 0, 0, '2020-06-24 08:34:41', '2020-06-24 09:12:41', '2020-06-24 09:12:41'),
(6, 5, 'T-shirt', 'TS-2', 'Sea-Green', '', '', 2000.00, '58752.jpg', '', 1, 1, '2020-06-24 17:31:38', '2020-08-16 10:59:58', '2020-08-16 10:59:58'),
(7, 2, 'sadsa', 'as34asdsaasd', 'saddas', '', '', 243.00, '', '', 0, 0, '2020-08-15 14:49:41', '2020-08-16 11:00:07', '2020-08-16 11:00:07'),
(8, 14, 'asd', 'dad', 'asdsad', '', '', 434.00, '57792.jpg', '', 1, 0, '2020-08-16 11:33:54', '2020-08-16 12:23:06', '2020-08-16 12:23:06'),
(9, 14, 'asas', '01', 'sas', '', '', 223.00, '96781.jpg', '', 1, 0, '2020-08-16 11:38:50', '2020-08-16 12:20:01', '2020-08-16 12:20:01'),
(10, 14, 'Casual red', '02', 'Red', 'casual shirt is the opposite of the formal shirt, which is usually a boring shirt that you tuck in your pants and wear under a blazer when you\'re going to work. On the contrary, the casual shirt is more versatile: you can tuck it in your pants or not, and wear it at work or during week-ends.', 'polyster', 1000.00, '35627.jpg', '', 1, 0, '2020-08-16 12:22:26', '2020-08-16 12:22:26', NULL),
(11, 14, 'casual Red', '02', 'Red', 'casual shirt is the opposite of the formal shirt, which is usually a boring shirt that you tuck in your pants and wear under a blazer when you\'re going to work. On the contrary, the casual shirt is more versatile: you can tuck it in your pants or not, and wear it at work or during week-ends.', 'cotton', 700.00, '90928.jpg', '', 1, 1, '2020-08-16 13:24:03', '2020-08-16 13:30:15', '2020-08-16 13:30:15'),
(12, 14, 'Casual Yellow', '03', 'yellow', 'casual shirt is the opposite of the formal shirt, which is usually a boring shirt that you tuck in your pants and wear under a blazer when you\'re going to work. On the contrary, the casual shirt is more versatile: you can tuck it in your pants or not, and wear it at work or during week-ends.', 'cotton', 700.00, '90655.jpg', '', 1, 0, '2020-08-16 13:25:35', '2020-08-16 13:25:35', NULL),
(13, 15, 'T-Shirt grey', '04', 'Grey', 'casual shirt is the opposite of the formal shirt, which is usually a boring shirt that you tuck in your pants and wear under a blazer when you\'re going to work. On the contrary, the casual shirt is more versatile: you can tuck it in your pants or not, and wear it at work or during week-ends.', 'cotton', 300.00, '75806.jpg', '', 1, 0, '2020-08-16 13:26:54', '2020-08-16 13:33:24', NULL),
(14, 15, 'T-Shirts Grey', '05', 'Grey', 'casual shirt is the opposite of the formal shirt, which is usually a boring shirt that you tuck in your pants and wear under a blazer when you\'re going to work. On the contrary, the casual shirt is more versatile: you can tuck it in your pants or not, and wear it at work or during week-ends.', 'cotton', 800.00, '7663.jpg', '', 1, 0, '2020-08-16 13:28:14', '2020-08-16 13:28:55', '2020-08-16 13:28:55'),
(15, 15, 'T-shirt black', '04', 'black', 'A T-shirt, or tee shirt, is a style of fabric shirt named after the T shape of its body and sleeves. Traditionally, it has short sleeves and a round neckline, known as a crew neck, which lacks a collar. T-shirts are generally made of a stretchy, light and inexpensive fabric and are easy to clean.', 'cotton', 400.00, '82069.jpg', '', 1, 1, '2020-07-16 13:46:20', '2020-08-16 13:46:20', NULL),
(16, 17, 'Chifon 01', '05', 'plum', 'hiffon is a lightweight plain-woven fabric with mesh like weave that gives it transparent appearance.', 'chifon', 4000.00, '28953.jpg', '', 1, 0, '2020-07-16 13:48:31', '2020-08-16 13:48:31', NULL),
(17, 17, 'chifon 03', '06', 'orange', 'hiffon is a lightweight plain-woven fabric with mesh like weave that gives it transparent appearance.', 'chifon', 45000.00, '55269.jpg', '', 1, 1, '2020-07-16 13:49:31', '2020-08-16 13:49:31', NULL),
(18, 17, 'chifon-03', '07', 'marble', 'hiffon is a lightweight plain-woven fabric with mesh like weave that gives it transparent appearance.', 'chifon', 56000.00, '86838.jpg', '', 1, 0, '2020-06-16 13:50:23', '2020-08-16 13:50:23', NULL),
(19, 16, 'Lawn-01', '08', 'Red', 'lawn is an area of soil-covered land planted with grasses and other durable', 'Lawn', 3000.00, '98714.jpg', '', 1, 0, '2020-08-16 13:51:44', '2020-08-16 13:51:44', NULL),
(20, 16, 'Lawn-02', '010', 'green', 'lawn is an area of soil-covered land planted with grasses and other durable', 'Cotton', 7000.00, '11147.jpg', '', 1, 1, '2020-08-16 13:52:54', '2020-08-16 15:06:01', NULL),
(21, 16, 'Lawn-03', '011', 'Maroon', 'lawn is an area of soil-covered land planted with grasses and other durable', 'cotton', 42000.00, '28677.jpg', '', 1, 0, '2020-07-16 13:54:27', '2020-08-16 13:54:27', NULL),
(22, 18, 'Sandal-01', '012', 'black', 'Sandals are an open type of footwear, consisting of a sole held to the wearer\'s foot by straps going over the instep and, sometimes, around the ankle. Sandals can also have a heel.', 'leather', 2000.00, '96904.jpg', '', 1, 0, '2020-07-16 13:59:15', '2020-08-16 13:59:15', NULL),
(23, 18, 'sandal-02', '013', 'brown', 'Sandals are an open type of footwear, consisting of a sole held to the wearer\'s foot by straps going over the instep and, sometimes, around the ankle. Sandals can also have a heel.', 'leather', 6000.00, '58184.jpg', '', 1, 0, '2020-08-16 13:59:56', '2020-08-16 13:59:56', NULL),
(24, 18, 'sandal-03', '014', 'camel color', 'Sandals are an open type of footwear, consisting of a sole held to the wearer\'s foot by straps going over the instep and, sometimes, around the ankle. Sandals can also have a heel.', 'leather', 5000.00, '57161.jpg', '', 1, 0, '2020-08-16 14:01:04', '2020-08-16 14:01:04', NULL),
(25, 19, 'Sliper-01', '015', 'brown', 'Slipers are an open type of footwear, consisting of a sole held to the wearer\'s foot by straps going over the instep and, sometimes, around the ankle.', 'leather', 4000.00, '37802.jpg', '', 1, 0, '2020-08-16 14:04:46', '2020-08-16 14:04:46', NULL),
(26, 19, 'Sliper-02', '016', 'camel', 'Slipers are an open type of footwear, consisting of a sole held to the wearer\'s foot by straps going over the instep and, sometimes, around the ankle.', 'cotton', 2000.00, '55907.jpg', '', 1, 0, '2020-08-16 14:05:24', '2020-08-16 14:05:24', NULL),
(27, 20, 'Heel-01', '020', 'red', 'heels are an open type of footwear, consisting of a sole held to the wearer\'s foot by straps going over the instep and, sometimes, around the ankle.', 'leather', 9000.00, '89604.jpg', '', 1, 0, '2020-08-16 14:06:55', '2020-08-16 14:06:55', NULL),
(28, 20, 'Heel-03', '023', 'black', 'heels are an open type of footwear, consisting of a sole held to the wearer\'s foot by straps going over the instep and, sometimes, around the ankle.', 'leather', 7999.00, '42682.jpg', '', 1, 0, '2020-08-16 14:08:03', '2020-08-16 14:08:03', NULL),
(29, 20, 'heel-03', '024', 'brown', 'heels are an open type of footwear, consisting of a sole held to the wearer\'s foot by straps going over the instep and, sometimes, around the ankle.', 'leather', 8000.00, '38860.jpg', '', 1, 0, '2020-08-16 14:08:42', '2020-08-16 14:08:42', NULL),
(30, 21, 'Sniker-01', '090', 'grey', 'Sneakers are made for exercise and sports, but they\'re also very popular everyday', 'leather', 8000.00, '37481.jpg', '', 1, 1, '2020-08-16 14:11:25', '2020-08-16 15:07:35', NULL),
(31, 21, 'sneakers-02', '070', 'blue', 'Sneakers are made for exercise and sports, but they\'re also very popular everyday', 'leather', 80000.00, '89194.jpg', '', 1, 0, '2020-08-16 14:12:16', '2020-08-16 14:12:16', NULL),
(32, 22, 'Baby Boy-01', '099', 'red', 'boys in dresses was toilet training, or the lack thereof. The change was probably made once boys', 'cotton', 5000.00, '54598.jpg', '', 1, 0, '2020-08-16 14:14:14', '2020-08-16 14:14:14', NULL),
(33, 22, 'baby boy-02', '008', 'white', 'boys in dresses was toilet training, or the lack thereof. The change was probably made once boys', 'cotton', 6000.00, '30893.jpg', '', 1, 0, '2020-08-16 14:15:15', '2020-08-16 14:15:15', NULL),
(34, 22, 'baby boy-03', '097', 'black', 'boys in dresses was toilet training, or the lack thereof. The change was probably made once boys', 'cotton', 7000.00, '96871.jpg', '', 1, 0, '2020-08-16 14:16:08', '2020-08-16 14:16:08', NULL),
(35, 23, 'baby girl-01', '066', 'white', 'girls in dresses was toilet training, or the lack thereof. The change was probably made once girls.', 'cotton', 7600.00, '30648.jpg', '', 1, 0, '2020-08-16 14:17:47', '2020-08-16 14:17:47', NULL),
(36, 23, 'baby girl-03', '0445', 'black', 'boys in dresses was toilet training, or the lack thereof. The change was probably made once boys', 'cotton', 800.00, '75018.jpg', '', 1, 0, '2020-08-16 14:18:58', '2020-08-16 14:18:58', NULL),
(37, 24, 'purse-04', '087', 'black', 'American English typically uses the terms purse and handbag interchangeably.', 'leather', 7000.00, '54422.jpg', '', 1, 0, '2020-08-16 14:22:31', '2020-08-16 14:22:31', NULL),
(38, 24, 'purse-02', '89', 'brown', 'American English typically uses the terms purse and handbag interchangeably.', 'leather', 600.00, '60763.jpg', '', 1, 0, '2020-08-16 14:23:18', '2020-08-16 14:23:18', NULL),
(39, 26, 'wallet-01', '0100', 'black', 'A wallet is a small, flat case that can be used to carry such small personal', 'leather', 7000.00, '57024.jpg', '', 1, 0, '2020-08-16 14:24:31', '2020-08-16 14:24:31', NULL),
(40, 26, 'wallet-02', '0900', 'brown', 'A wallet is a small, flat case that can be used to carry such small personal', 'leather', 80000.00, '89752.jpg', '', 1, 0, '2020-08-16 14:25:30', '2020-08-16 14:25:30', NULL),
(41, 27, 'watch-01', '09009', 'black', 'watch is a portable timepiece intended to be carried or worn by a person. .', 'Rado', 8787.00, '79011.jpg', '', 1, 0, '2020-08-16 14:26:45', '2020-08-16 14:26:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'AT-1-S', 'Small', 1500.00, 9, '2020-06-21 15:14:21', '2020-06-24 09:12:01'),
(2, 1, 'AT-1-L', 'Large', 2000.00, 10, '2020-06-21 15:15:23', '2020-06-24 09:12:01'),
(3, 1, 'AT-1-M', 'Medium', 1700.00, 10, '2020-06-21 15:15:23', '2020-06-24 09:12:01'),
(4, 2, 'AT-2-L', 'Large', 2000.00, 7, '2020-06-21 15:26:04', '2020-08-13 15:56:17'),
(5, 2, 'AT-2-M', 'Medium', 1700.00, 0, '2020-06-21 15:26:04', '2020-06-21 15:26:04'),
(6, 10, '02-1', 'small', 900.00, 7, '2020-08-16 12:24:19', '2020-08-16 16:55:26'),
(7, 10, '02-2', 'medium', 1000.00, 10, '2020-08-16 12:24:19', '2020-08-16 12:24:19'),
(8, 12, '031', 'small', 900.00, 10, '2020-08-16 14:32:35', '2020-08-16 14:32:35'),
(9, 12, '032', 'medium', 900.00, 10, '2020-08-16 14:33:18', '2020-08-16 14:33:18'),
(10, 12, '033', 'large', 1000.00, 10, '2020-08-16 14:34:09', '2020-08-16 14:34:09'),
(11, 13, '041', 'medium', 700.00, 6, '2020-08-16 14:36:58', '2020-08-16 14:36:58'),
(12, 13, '042', 'large', 800.00, 8, '2020-08-16 14:36:58', '2020-08-16 14:36:58'),
(13, 16, '051', 'small', 600.00, 17, '2020-08-16 14:39:48', '2020-08-16 14:39:48'),
(14, 16, '052', 'medium', 700.00, 6, '2020-08-16 14:39:48', '2020-08-16 14:39:48'),
(15, 16, '054', 'large', 800.00, 20, '2020-08-16 14:39:48', '2020-08-16 14:39:48'),
(16, 17, '061', 'small', 700.00, 20, '2020-08-16 14:40:38', '2020-08-16 14:40:38'),
(17, 17, '062', 'medium', 800.00, 7, '2020-08-16 14:40:38', '2020-08-16 14:40:38'),
(18, 17, '063', 'large', 900.00, 0, '2020-08-16 14:40:38', '2020-08-16 14:40:38'),
(19, 19, '081', 'small', 500.00, 55, '2020-08-16 14:42:09', '2020-08-16 14:42:09'),
(20, 19, '082', 'medium', 700.00, 10, '2020-08-16 14:42:09', '2020-08-16 14:42:09'),
(21, 19, '0825', 'large', 800.00, 8, '2020-08-16 14:42:09', '2020-08-16 14:42:09'),
(22, 20, '0102', 'small', 1000.00, 8, '2020-08-16 14:43:03', '2020-08-16 14:43:03'),
(23, 21, '011', 'small', 1000.00, 8, '2020-08-16 14:43:29', '2020-08-16 14:43:29'),
(24, 22, '0121', 'small', 600.00, 11, '2020-08-16 14:44:50', '2020-08-16 14:44:50'),
(25, 22, '0124', 'large', 500.00, 10, '2020-08-16 14:44:51', '2020-08-16 14:44:51'),
(26, 23, '0131', 'small', 700.00, 10, '2020-08-16 14:45:27', '2020-08-16 14:45:27'),
(27, 23, '0132', 'medium', 7000.00, 19, '2020-08-16 14:45:27', '2020-08-16 14:45:27'),
(28, 24, '0141', 'medium', 700.00, 1, '2020-08-16 14:45:40', '2020-08-16 14:45:40'),
(29, 24, '0142', 'large', 700.00, 6, '2020-08-16 14:45:54', '2020-08-16 14:45:54'),
(30, 25, '0151', 'small', 700.00, 32, '2020-08-16 14:46:21', '2020-08-16 14:46:21'),
(31, 26, '016', 'small', 900.00, 8, '2020-08-16 14:46:43', '2020-08-16 14:46:43'),
(32, 26, '0162', 'medium', 1000.00, 10, '2020-08-16 14:46:43', '2020-08-16 14:46:43'),
(33, 28, '0231', 'small', 700.00, 8, '2020-08-16 14:47:40', '2020-08-16 14:47:40'),
(34, 30, '0901', 'small', 900.00, 10, '2020-08-16 14:48:36', '2020-08-16 14:48:36'),
(35, 30, '09012', 'large', 1000.00, 6, '2020-08-16 14:48:36', '2020-08-16 14:48:36'),
(36, 31, '071', 'small', 1000.00, 6, '2020-08-16 14:49:03', '2020-08-16 14:49:03'),
(37, 31, '0712', 'medium', 1100.00, 15, '2020-08-16 14:49:03', '2020-08-16 14:49:03'),
(38, 32, '0991', 'small', 1000.00, 32, '2020-08-16 14:49:31', '2020-08-16 14:49:31'),
(39, 32, '09912', 'large', 1200.00, 12, '2020-08-16 14:49:31', '2020-08-16 14:49:31'),
(40, 29, '024', 'small', 1000.00, 6, '2020-08-16 14:49:58', '2020-08-16 14:49:58'),
(41, 29, '0241', 'medium', 1200.00, 15, '2020-08-16 14:49:58', '2020-08-16 14:49:58'),
(42, 33, '0081', 'small', 1000.00, 10, '2020-08-16 14:53:14', '2020-08-16 14:53:14'),
(43, 33, '0082', 'medium', 1100.00, 11, '2020-08-16 14:53:14', '2020-08-16 14:53:14'),
(44, 34, '0971', 'small', 1000.00, 1, '2020-08-16 14:53:41', '2020-08-16 14:53:41'),
(45, 34, '0972', 'medium', 1200.00, 12, '2020-08-16 14:53:41', '2020-08-16 14:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `products_comments`
--

CREATE TABLE `products_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `approve` tinyint(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_comments`
--

INSERT INTO `products_comments` (`id`, `product_id`, `name`, `rating`, `comment`, `approve`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test', '5', 'Test', 1, '2020-06-21 15:18:40', '2020-08-16 17:42:47'),
(2, 2, 'test', '1', 'test', 1, '2020-06-22 11:42:26', '2020-06-24 14:53:31'),
(3, 12, 'AhsanAli', '3', 'good product', 0, '2020-08-16 15:54:58', '2020-08-16 15:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '46337.jpg', '2020-06-21 15:15:55', '2020-06-21 15:15:55'),
(2, 1, '91563.jpg', '2020-06-21 15:16:02', '2020-06-21 15:16:02'),
(3, 1, '98141.jpg', '2020-06-21 15:16:10', '2020-06-21 15:16:10'),
(4, 2, '75094.png', '2020-06-21 15:26:25', '2020-06-21 15:26:25'),
(5, 2, '2814.png', '2020-06-21 15:26:47', '2020-06-21 15:26:47'),
(7, 3, '21834.jpg', '2020-06-21 15:29:03', '2020-06-21 15:29:03'),
(8, 4, '10906.jpg', '2020-06-21 15:31:20', '2020-06-21 15:31:20'),
(9, 4, '99469.jpg', '2020-06-21 15:31:28', '2020-06-21 15:31:28'),
(11, 3, '80607.jpg', '2020-06-24 09:56:42', '2020-06-24 09:56:42'),
(12, 10, '94573.jpg', '2020-08-16 14:59:19', '2020-08-16 14:59:19'),
(13, 10, '88072.jpg', '2020-08-16 15:01:22', '2020-08-16 15:01:22'),
(14, 12, '73407.jpg', '2020-08-16 15:34:37', '2020-08-16 15:34:37'),
(15, 13, '15496.jpg', '2020-08-16 15:35:14', '2020-08-16 15:35:14'),
(16, 15, '30386.jpg', '2020-08-16 15:35:52', '2020-08-16 15:35:52'),
(17, 16, '83718.jpg', '2020-08-16 15:38:17', '2020-08-16 15:38:17'),
(18, 17, '62605.jpg', '2020-08-16 15:39:09', '2020-08-16 15:39:09'),
(19, 18, '10598.jpg', '2020-08-16 15:39:21', '2020-08-16 15:39:21'),
(20, 19, '65385.jpg', '2020-08-16 15:40:04', '2020-08-16 15:40:04'),
(21, 20, '62877.jpg', '2020-08-16 15:40:27', '2020-08-16 15:40:27'),
(22, 21, '49955.jpg', '2020-08-16 15:40:38', '2020-08-16 15:40:38'),
(23, 22, '13227.jpg', '2020-08-16 15:42:38', '2020-08-16 15:42:38'),
(24, 23, '21935.jpg', '2020-08-16 15:43:25', '2020-08-16 15:43:25'),
(25, 24, '3896.jpg', '2020-08-16 15:43:32', '2020-08-16 15:43:32'),
(26, 25, '54899.jpg', '2020-08-16 15:43:48', '2020-08-16 15:43:48'),
(27, 26, '82385.jpg', '2020-08-16 15:43:58', '2020-08-16 15:43:58'),
(28, 27, '55900.jpg', '2020-08-16 15:45:40', '2020-08-16 15:45:40'),
(29, 28, '29101.jpg', '2020-08-16 15:45:48', '2020-08-16 15:45:48'),
(30, 29, '43080.jpg', '2020-08-16 15:45:58', '2020-08-16 15:45:58'),
(31, 30, '76842.jpg', '2020-08-16 15:46:23', '2020-08-16 15:46:23'),
(32, 31, '38274.jpg', '2020-08-16 15:46:31', '2020-08-16 15:46:31'),
(33, 32, '62763.jpg', '2020-08-16 15:48:11', '2020-08-16 15:48:11'),
(34, 33, '45499.jpg', '2020-08-16 15:48:28', '2020-08-16 15:48:28'),
(35, 34, '8785.jpg', '2020-08-16 15:48:38', '2020-08-16 15:48:38'),
(36, 35, '83138.jpg', '2020-08-16 15:49:00', '2020-08-16 15:49:00'),
(37, 36, '56048.jpg', '2020-08-16 15:49:09', '2020-08-16 15:49:09'),
(38, 37, '98005.jpg', '2020-08-16 15:51:21', '2020-08-16 15:51:21'),
(39, 38, '35323.jpg', '2020-08-16 15:51:29', '2020-08-16 15:51:29'),
(40, 39, '3860.jpg', '2020-08-16 15:51:47', '2020-08-16 15:51:47'),
(41, 40, '57669.jpg', '2020-08-16 15:52:06', '2020-08-16 15:52:06'),
(42, 41, '5303.jpg', '2020-08-16 15:52:28', '2020-08-16 15:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google2fa_secret` text COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `status`, `image`, `email_verified_at`, `password`, `google2fa_secret`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'test', 'sadsa', 'dsadas', 'dasdasd', 'Armenia', '2', '21321', 'wazah.ahmad@yahoo.com', 1, '7037.PNG', NULL, '$2y$10$.acP5NJxgPwdDNGJ/E0wv.bKpdLAnY1MBF8SiSIrKPViMbx5WiSPO', NULL, NULL, '2020-06-08 10:15:47', '2020-08-16 16:19:19'),
(11, 'ahsan', '', '', '', '', '', '', 'ahsan@gmail.com', 0, '', NULL, '$2y$10$JmDlU7pwuLkVxXU2.OGICO9lkDXlJzoTZXsLv4MVNhHrIORvjTUp6', NULL, NULL, '2020-08-13 15:47:55', '2020-08-13 15:47:55'),
(12, 'talha', '', '', '', '', '', '', 'talha@gmail.com', 0, '', NULL, '$2y$10$a3oRlsHpf17wiZdi8PzaL.jmu3UcyGkGJL8p0vza3HTHEGVoJq0A6', NULL, NULL, '2020-08-13 15:49:32', '2020-08-13 15:49:32'),
(13, 'ahtisham', '', '', '', '', '', '', 'bt16210@pugc.edu.pk', 0, NULL, NULL, '$2y$10$YRUWktJ9Sxs971EI05pUtOLprcMq5FON9/0lgOm2xqzhFOxs9L5qC', NULL, NULL, '2020-08-16 16:44:25', '2020-08-16 16:44:25'),
(14, 'ahsan', 'Hafizabad Road, Gujranwala, Pakistan', 'Gujranwala', 'Punjab', 'Afghanistan', '52250', '06235622990', 'dgskill1122@gmail.com', 1, NULL, NULL, '$2y$10$XGzA73cGSZUlP5Lw82ddoukhe9i1xjJ3KtoMbmrG8i7Wit74QJs12', NULL, NULL, '2020-08-16 16:48:36', '2020-08-16 16:59:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs_comments`
--
ALTER TABLE `blogs_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_comments`
--
ALTER TABLE `products_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs_comments`
--
ALTER TABLE `blogs_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products_comments`
--
ALTER TABLE `products_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
