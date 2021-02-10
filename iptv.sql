-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 10 2021 г., 17:21
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `iptv`
--

-- --------------------------------------------------------

--
-- Структура таблицы `stat`
--

CREATE TABLE IF NOT EXISTS `stat` (
  `m_timestamp` int(11) NOT NULL,
  `url` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `avg_bitrate` int(11) NOT NULL,
  `begin` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `v_frames_decoded` int(11) NOT NULL,
  `v_frames_dropped` int(11) NOT NULL,
  `v_frames_failed` int(11) NOT NULL,
  `a_frames_decoded` int(11) NOT NULL,
  `a_frames_dropped` int(11) NOT NULL,
  `a_frames_failed` int(11) NOT NULL,
  `n_timestamp` int(11) NOT NULL,
  `duplex` text NOT NULL,
  `speed` int(11) NOT NULL,
  `received_bytes` int(11) NOT NULL,
  `received_discard_packets` int(11) NOT NULL,
  `received_error_packets` int(11) NOT NULL,
  `received_multicast_packets` int(11) NOT NULL,
  `received_total_packets` int(11) NOT NULL,
  `sent_bytes` int(11) NOT NULL,
  `sent_error_packets` int(11) NOT NULL,
  `sent_total_packets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
