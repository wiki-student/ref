-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 17 2021 г., 16:26
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `IP` int(11) unsigned NOT NULL,
  `adaptive_bandwidth` int(11) NOT NULL,
  `a_frames_decoded` int(11) NOT NULL,
  `a_frames_dropped` int(11) NOT NULL,
  `a_frames_failed` int(11) NOT NULL,
  `avg_bitrate` int(11) NOT NULL,
  `begin` int(11) NOT NULL,
  `discontinuties` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `type` text NOT NULL,
  `v_frames_decoded` int(11) NOT NULL,
  `v_frames_dropped` int(11) NOT NULL,
  `v_frames_failed` int(11) NOT NULL,
  `duplex` text NOT NULL,
  `gateway` int(11) unsigned NOT NULL,
  `IP_inner` int(11) unsigned NOT NULL,
  `name` text NOT NULL,
  `netmask` int(11) unsigned NOT NULL,
  `speed` int(11) NOT NULL,
  `received_bytes` bigint(11) NOT NULL,
  `received_discard_packets` int(11) NOT NULL,
  `received_error_packets` int(11) NOT NULL,
  `received_multicast_packets` int(11) NOT NULL,
  `received_total_packets` bigint(11) NOT NULL,
  `sent_bytes` bigint(11) NOT NULL,
  `sent_error_packets` int(11) NOT NULL,
  `sent_total_packets` int(11) NOT NULL,
  `timestamp_net` int(11) NOT NULL,
  `type_net` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
