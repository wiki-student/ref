-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 12 2021 г., 16:03
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `iptv2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `adaptive_bandwidth` int(11) NOT NULL,
  `a_frames_decoded` int(11) NOT NULL,
  `a_frames_dropped` int(11) NOT NULL,
  `a_frames_failed` int(11) NOT NULL,
  `avg_bitrate` int(11) NOT NULL,
  `begin` bigint(11) NOT NULL,
  `discontinuties` int(11) NOT NULL,
  `end` bigint(11) NOT NULL,
  `id` int(11) NOT NULL,
  `proto` text NOT NULL,
  `timestamp` int(11) NOT NULL,
  `type` text NOT NULL,
  `url` text NOT NULL,
  `v_frames_decoded` int(11) NOT NULL,
  `v_frames_dropped` int(11) NOT NULL,
  `v_frames_failed` int(11) NOT NULL,
  `f_duplex` text NOT NULL,
  `f_gateway` text NOT NULL,
  `f_ip` text NOT NULL,
  `f_name` text NOT NULL,
  `f_netmask` text NOT NULL,
  `f_speed` int(11) NOT NULL,
  `f_s_received_bytes` bigint(11) NOT NULL,
  `f_s_received_discard_packets` int(11) NOT NULL,
  `f_s_received_error_packets` int(11) NOT NULL,
  `f_s_received_multicast_packets` int(11) NOT NULL,
  `f_s_received_total_packets` bigint(11) NOT NULL,
  `f_s_sent_bytes` bigint(11) NOT NULL,
  `f_s_sent_error_packets` int(11) NOT NULL,
  `f_s_sent_total_packets` int(11) NOT NULL,
  `f_timestamp` bigint(11) NOT NULL,
  `f_type` text NOT NULL,
  `t_duplex` text NOT NULL,
  `t_gateway` text NOT NULL,
  `t_ip` text NOT NULL,
  `t_name` text NOT NULL,
  `t_netmask` text NOT NULL,
  `t_speed` int(11) NOT NULL,
  `t_s_received_bytes` bigint(11) NOT NULL,
  `t_s_received_discard_packets` int(11) NOT NULL,
  `t_s_received_error_packets` int(11) NOT NULL,
  `t_s_received_multicast_packets` int(11) NOT NULL,
  `t_s_received_total_packets` bigint(11) NOT NULL,
  `t_s_sent_bytes` bigint(11) NOT NULL,
  `t_s_sent_error_packets` int(11) NOT NULL,
  `t_s_sent_total_packets` int(11) NOT NULL,
  `t_timestamp` bigint(11) NOT NULL,
  `t_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
