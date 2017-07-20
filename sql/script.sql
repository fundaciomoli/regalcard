-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Servidor: db577667753.db.1and1.com
-- Tiempo de generación: 20-07-2017 a las 17:20:49
-- Versión del servidor: 5.5.55-0+deb7u1-log
-- Versión de PHP: 5.4.45-0+deb7u8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db577667753`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rc_card_list`
--

CREATE TABLE IF NOT EXISTS `rc_card_list` (
  `card_list_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `card_id` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `balance_init` decimal(10,2) DEFAULT NULL,
  `date_begin` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `card_active` tinyint(1) DEFAULT '0',
  `date_init` datetime DEFAULT NULL,
  `card_finish` tinyint(1) DEFAULT NULL,
  `email_gift` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `invoice_card` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `payments_card` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `shop_card` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ticket_card` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cashier_card` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `employer_card` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `minimal_buy` decimal(10,2) NOT NULL DEFAULT '0.00',
  `percentage_card` int(3) NOT NULL,
  `customer_card` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  UNIQUE KEY `card_list_id` (`card_list_id`),
  UNIQUE KEY `card_list_unique` (`card_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2053 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rc_invoice_number`
--

CREATE TABLE IF NOT EXISTS `rc_invoice_number` (
  `invoice_id` int(11) NOT NULL,
  `valecard_id` int(11) NOT NULL,
  `fidelcard_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rc_purchase_list`
--

CREATE TABLE IF NOT EXISTS `rc_purchase_list` (
  `purchase_list_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `card_id` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `date_purchase` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `shop` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `ticket` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `cashier` varchar(3) CHARACTER SET latin1 DEFAULT NULL,
  `employer` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `total_ticket` decimal(10,2) DEFAULT NULL,
  UNIQUE KEY `purchase_list_id` (`purchase_list_id`),
  UNIQUE KEY `purchase_unique` (`card_id`,`date_purchase`,`shop`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1327 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
