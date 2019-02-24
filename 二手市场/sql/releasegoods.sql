-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-07-11 21:26:18
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
-- 表的结构 `releasegoods`
--

CREATE TABLE `releasegoods` (
  `id` int(5) NOT NULL COMMENT 'AUTO_INCREMENT',
  `username` varchar(40) CHARACTER SET utf8 NOT NULL,
  `goods` varchar(60) CHARACTER SET utf8 NOT NULL,
  `title` varchar(60) CHARACTER SET utf8 NOT NULL,
  `describegoods` text CHARACTER SET utf8 NOT NULL,
  `phonenum` varchar(15) NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `datatime` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `releasegoods`
--

INSERT INTO `releasegoods` (`id`, `username`, `goods`, `title`, `describegoods`, `phonenum`, `img`, `datatime`) VALUES
(1, 'user', '华硕飞行堡垒', '八成新的飞行堡垒，无损', '八成新的无损华硕飞行堡垒，用了两三个月，打算换新的，出售价格电话联系', '123456', '/admin/images/20180711/ef9f660e7824d1b20fc5a21d588d5f88.jpg', '2018-07-11 20:43:12'),
(2, 'user', '金士顿32G U盘', '九成新的金士顿U盘，32G的', '九成新的金士顿 32G U盘，没有什么刮痕，只用过两三次', '123456', '/admin/images/20180711/de5723b71691bdf9ecf3249d5f7297fc.jpg', '2018-07-11 20:45:30'),
(3, 'aaa', 'GTX1080显卡', '出售GTX1080显卡一个，九成新', '想要升级电脑配置，出售一个GTX1080显卡，只用了一个多月', '147258', '/admin/images/20180711/3e6a007ebbf1de9dab65d1496afb82b2.jpg', '2018-07-11 20:51:30'),
(4, 'aaa', 'ipad平板', '七成新ipad平板', '出售一本黑色ipad平板，用了半年，很少刮痕', '147258', '/admin/images/20180711/6a4c88948820346870ed3183318605ca.jpg', '2018-07-11 20:53:02'),
(5, 'asd', '闪迪32g U盘', '出售32g 闪迪U盘', '32g USB3.0 的闪迪U盘，U盘太多，这个用不上，几乎全新的', '147369', '/admin/images/20180711/89d0de0e3337a0163118bdc907e4df7d.jpg', '2018-07-11 20:57:59'),
(6, 'asd', '华硕败家之眼路由器', '出售败家之眼路由器一个', '华硕的败家之眼路由器，用了半年左右', '147369', '/admin/images/20180711/d25f20678e08150c9ba7e59f2588a07e.jpg', '2018-07-11 20:59:15'),
(7, 'jsj', '篮球', '有纪念意义的篮球', '限量版的篮球，几乎全新，有意者请联系', '258369', '/admin/images/20180711/1a7656286156c281e944d68e79011809.jpg', '2018-07-11 21:02:55'),
(8, 'jsj', '足球', '有纪念意义的足球', '有纪念意义的足球，也是限量版的，', '258369', '/admin/images/20180711/92fb8b379f1f5dc7ddf13093c4bcded9.jpg', '2018-07-11 21:03:56'),
(9, 'jsj', '小米5', '九成新小米5', '九成新的小米5，用了一个月刮痕很少', '258369', '/admin/images/20180711/1b4ebacd3a6ef000540c40a89adb0bcd.jpg', '2018-07-11 21:09:05'),
(10, 'zxc', '网球拍', '出售网球拍一个', '买了之后发现对网球没兴趣，几乎全新的网球拍', '369258', '/admin/images/20180711/6a41395667f939f16ff96e5225cb4345.jpg', '2018-07-11 21:12:18'),
(11, 'zxc', '捷安特山地车', '出售七成新捷安特山地车', '七成新的捷安特山地车，骑了半年，总体上还行', '369258', '/admin/images/20180711/0f1b7c5e3c2709bc2979f15ef31a4275.jpg', '2018-07-11 21:13:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `releasegoods`
--
ALTER TABLE `releasegoods`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `releasegoods`
--
ALTER TABLE `releasegoods`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
