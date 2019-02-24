-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-07-11 21:26:07
-- 服务器版本： 5.7.20-0ubuntu0.17.10.1
-- PHP Version: 7.1.15-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jsj16103`
--

-- --------------------------------------------------------

--
-- 表的结构 `buygoods`
--

CREATE TABLE `buygoods` (
  `id` int(5) NOT NULL COMMENT 'AUTO_INCREMENT',
  `username` varchar(40) CHARACTER SET utf8 NOT NULL,
  `goods` varchar(40) CHARACTER SET utf8 NOT NULL,
  `title` varchar(60) CHARACTER SET utf8 NOT NULL,
  `describegoods` varchar(300) NOT NULL,
  `phonenum` varchar(15) NOT NULL,
  `datatime` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `buygoods`
--

INSERT INTO `buygoods` (`id`, `username`, `goods`, `title`, `describegoods`, `phonenum`, `datatime`) VALUES
(1, 'user', 'U盘', '收购一个64g U盘', '收购一个64g U盘，品牌限制是金士顿或者闪迪，必须是USB 3.0', '123456', '2018-07-11 20:47:10'),
(2, 'user', '山地车', '想收购一辆山地车', '收购一辆山地车，可21速或者24速，品牌不想', '123456', '2018-07-11 20:48:16'),
(3, 'aaa', '苹果x', '收购白色苹果x', '收购一台白色苹果x，要求用的时间不长而且刮痕不多', '147258', '2018-07-11 20:54:28'),
(4, 'aaa', '尤尼克斯羽毛球拍', '收购一对尤尼克斯羽毛球拍', '收购一对尤尼克斯羽毛球拍，可以是只有羽毛球拍的拍框', '147258', '2018-07-11 20:56:04'),
(5, 'asd', '篮球', '收购篮球几个', '因为训练需要，要收购几个篮球，', '147369', '2018-07-11 21:00:30'),
(6, 'asd', '足球', '收购足球几个', '还是因为训练需要要收购足球几个', '147369', '2018-07-11 21:01:06'),
(7, 'jsj', '小米2', '想收购一台神机小米2', '好几年前的一代神机小米2已经很难找得到，有意出售请联系', '258369', '2018-07-11 21:06:04'),
(8, 'jsj', '机械键盘', '收购一个不太贵的机械键盘', '旧键盘坏了看上机械键盘又太贵，想看看有没有人想出售二手机械键盘', '258369', '2018-07-11 21:07:46'),
(9, 'jsj', '液晶电视', '收购液晶电视', '电视坏了，收购一台七成新以上的64寸液晶电视', '258369', '2018-07-11 21:10:33'),
(10, 'zxc', '吉他', '收购一个吉他', '想学学吉他，先买个二手吉他试试手', '369258', '2018-07-11 21:14:44'),
(11, 'zxc', '康佳相机', '收购二手康佳相机', '要去穷游拍照，没相机怎么过得去', '369258', '2018-07-11 21:15:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buygoods`
--
ALTER TABLE `buygoods`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `buygoods`
--
ALTER TABLE `buygoods`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
