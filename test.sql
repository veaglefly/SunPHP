-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2013 年 09 月 15 日 06:20
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wenjuan`
--

-- --------------------------------------------------------

--
-- 表的结构 `sun_admin`
--

CREATE TABLE IF NOT EXISTS `sun_admin` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `gid` tinyint(4) NOT NULL,
  `email` varchar(40) NOT NULL,
  `lastdatetime` datetime NOT NULL,
  `lastip` varchar(20) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `sun_admin`
--

INSERT INTO `sun_admin` (`aid`, `account`, `password`, `gid`, `email`, `lastdatetime`, `lastip`) VALUES
(1, 'admin', 'df8dede7add178420f25efbe333adf62', 1, 'admin@admin.com', '2013-09-15 11:45:30', '::1');

-- --------------------------------------------------------

--
-- 表的结构 `sun_questionnaire`
--

CREATE TABLE IF NOT EXISTS `sun_questionnaire` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zongping` tinyint(3) unsigned NOT NULL COMMENT '总评价',
  `sifeng` text NOT NULL COMMENT '四风建议',
  `liyi` text NOT NULL COMMENT '利益建议',
  `fazhan` text NOT NULL COMMENT '发展建议',
  `ip` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
