-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 09 月 23 日 15:15
-- 伺服器版本： 10.1.40-MariaDB
-- PHP 版本： 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `article`
--

CREATE TABLE `article` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '文章 id',
  `title` varchar(30) NOT NULL DEFAULT '' COMMENT '標題',
  `category` varchar(50) NOT NULL DEFAULT '' COMMENT '分類',
  `content` text NOT NULL COMMENT '內文',
  `publish` tinyint(1) NOT NULL COMMENT '是否發布',
  `create_date` datetime NOT NULL COMMENT '建立日期',
  `modify_date` datetime DEFAULT NULL COMMENT '修改日期',
  `creater_id` int(11) DEFAULT NULL COMMENT '建立者id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT '使用者id',
  `username` varchar(30) NOT NULL COMMENT '登⼊帳號',
  `password` varchar(100) NOT NULL COMMENT '使用者密碼',
  `name` varchar(30) NOT NULL COMMENT '名字'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', 'c98f7accb7085721d179609382a1509e', 'Andy');

-- --------------------------------------------------------

--
-- 資料表結構 `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL COMMENT '作品 id',
  `intro` text NOT NULL COMMENT '簡介',
  `image_path` text COMMENT '圖⽚路徑',
  `video_path` text COMMENT '影⽚路徑',
  `publish` tinyint(1) NOT NULL COMMENT '是否發布',
  `upload_date` datetime NOT NULL COMMENT '上傳時間',
  `create_user_id` int(11) NOT NULL COMMENT '誰上傳的(建⽴立者id)',
  `modify_date` datetime DEFAULT NULL COMMENT '修改日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文章 id';

--
-- 使用資料表自動增長(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '使用者id', AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '作品 id';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
