-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2018-10-02 17:50:00
-- 服务器版本： 5.5.47
-- PHP 版本： 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `shop1`
--

-- --------------------------------------------------------

--
-- 表的结构 `sw_auth`
--

CREATE TABLE `sw_auth` (
  `auth_id` smallint(6) UNSIGNED NOT NULL,
  `auth_name` varchar(20) NOT NULL COMMENT '名称',
  `auth_pid` smallint(6) UNSIGNED NOT NULL COMMENT '父id',
  `auth_c` varchar(32) NOT NULL DEFAULT '' COMMENT '模块',
  `auth_a` varchar(32) NOT NULL DEFAULT '' COMMENT '操作方法',
  `auth_path` varchar(32) NOT NULL COMMENT '全路径',
  `auth_level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '基别'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sw_auth`
--

INSERT INTO `sw_auth` (`auth_id`, `auth_name`, `auth_pid`, `auth_c`, `auth_a`, `auth_path`, `auth_level`) VALUES
(1, '商品管理', 0, '', '', '1', 0),
(2, '商品列表', 1, 'Goods', 'showlist', '1-2', 1),
(3, '添加商品', 1, 'Goods', 'add', '1-3', 1),
(4, '用户评论', 1, 'User', 'pinglun', '1-4', 1),
(5, '订单管理', 0, '', '', '5', 0),
(6, '订单列表', 5, 'Order', 'showlist', '5-6', 1),
(7, '订单查询', 5, 'Order', 'view', '5-7', 1),
(8, '文章管理', 0, '', '', '8', 0),
(9, '文章列表', 8, 'Article', 'showlist', '8-9', 1),
(10, '权限管理', 0, '', '', '10', 0),
(11, '管理员列�\�', 10, 'Manager', 'showlist', '10-11', 1),
(12, '角色管理', 10, 'Role', 'showlist', '10-12', 1),
(13, '权限管理', 10, 'Auth', 'showlist', '10-13', 1),
(23, '商品类型', 1, 'Goods', 'type', '1-23', 1),
(24, '促销管理', 0, '', '', '24', 0),
(26, '商品删除', 2, 'Goods', 'del', '1-2-26', 2),
(27, '增加订单', 6, 'Order', 'add', '5-6-27', 2),
(28, '会员管理', 0, 'User', 'showlist', '28', 0),
(29, '商品回收�\�', 1, 'Goods', 'huishou', '1-29', 1),
(30, '商品修改', 2, 'Goods', 'upd', '1-2-30', 2);

-- --------------------------------------------------------

--
-- 表的结构 `sw_category`
--

CREATE TABLE `sw_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sw_category`
--

INSERT INTO `sw_category` (`cat_id`, `cat_name`) VALUES
(1, '手机'),
(2, '电脑'),
(3, '相机'),
(4, '耳机'),
(5, '电池');

-- --------------------------------------------------------

--
-- 表的结构 `sw_goods`
--

CREATE TABLE `sw_goods` (
  `goods_id` int(11) NOT NULL COMMENT '自增id',
  `goods_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_weight` int(11) NOT NULL DEFAULT '0' COMMENT '重量',
  `goods_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `goods_number` int(11) NOT NULL DEFAULT '100' COMMENT '数量',
  `goods_category_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类',
  `goods_brand_id` int(11) NOT NULL DEFAULT '0' COMMENT '品牌',
  `goods_introduce` text COLLATE utf8_unicode_ci COMMENT '详细介绍',
  `goods_big_img` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '商品图片',
  `goods_small_img` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '商品小图',
  `goods_create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `goods_last_time` int(11) NOT NULL DEFAULT '0',
  `abc` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品表';

--
-- 转存表中的数据 `sw_goods`
--

INSERT INTO `sw_goods` (`goods_id`, `goods_name`, `goods_weight`, `goods_price`, `goods_number`, `goods_category_id`, `goods_brand_id`, `goods_introduce`, `goods_big_img`, `goods_small_img`, `goods_create_time`, `goods_last_time`, `abc`) VALUES
(2, '路虎V18', 0, '2000.00', 2, 0, 0, NULL, 'upload/2018-09-29/5baf2e490aff4.jpg', '', 0, 0, ''),
(3, '小米NOTE 3', 0, '2000.00', 4, 0, 0, NULL, 'upload/2018-09-30/5bb070154a928.png', '', 0, 0, ''),
(4, '3Dconnexion 3DX-700028 ', 0, '1280.00', 5, 0, 0, NULL, 'upload/2018-09-30/5bb07030aa7b3.jpg', '', 0, 0, ''),
(5, 'iPhone 8', 0, '6499.00', 80, 0, 0, NULL, 'upload/2018-09-30/5bb0704c185fa.jpg', '', 0, 0, ''),
(7, 'Huawei/华为 P20 Pro', 0, '2999.00', 40, 0, 0, NULL, 'upload/2018-09-30/5bb0706beefa4.jpg', '', 0, 0, ''),
(8, 'Mad Catz 美加�\�', 0, '1999.00', 80, 0, 0, NULL, 'upload/2018-09-30/5bb07083407a3.jpg', '', 0, 0, ''),
(10, '罗技 G900', 0, '899.00', 12, 0, 0, NULL, 'upload/2018-09-30/5bb070997cc06.jpg', '', 0, 0, ''),
(11, '3Dconnexion 3D鼠标', 0, '2999.00', 2, 0, 0, NULL, 'upload/2018-09-30/5bb070b0b850a.jpg', '', 0, 0, ''),
(12, '持剑者魔剑�\�', 0, '599.00', 600, 0, 0, NULL, 'upload/2018-09-30/5bb070c5c13b5.jpg', '', 0, 0, ''),
(13, 'Griffin PowerMate USB多媒体控制器', 0, '550.00', 132, 0, 0, NULL, 'upload/2018-09-30/5bb070d6bb3e5.jpg', '', 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `sw_manager`
--

CREATE TABLE `sw_manager` (
  `mg_id` int(11) NOT NULL,
  `mg_name` varchar(32) NOT NULL,
  `mg_pwd` varchar(32) NOT NULL,
  `mg_time` int(10) UNSIGNED NOT NULL COMMENT '时间',
  `mg_role_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '角色id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sw_manager`
--

INSERT INTO `sw_manager` (`mg_id`, `mg_name`, `mg_pwd`, `mg_time`, `mg_role_id`) VALUES
(1, 'admin', '123456', 0, 0),
(2, 'tom', '123456', 0, 1),
(3, 'linken', '123456', 0, 2),
(4, 'mary', '123456', 1387785044, 2),
(5, 'yuehan', '123456', 1387785056, 2);

-- --------------------------------------------------------

--
-- 表的结构 `sw_role`
--

CREATE TABLE `sw_role` (
  `role_id` smallint(6) UNSIGNED NOT NULL,
  `role_name` varchar(20) NOT NULL COMMENT '角色名称',
  `role_auth_ids` varchar(128) NOT NULL DEFAULT '' COMMENT '权限ids,1,2,5',
  `role_auth_ac` text COMMENT '模块-操作'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sw_role`
--

INSERT INTO `sw_role` (`role_id`, `role_name`, `role_auth_ids`, `role_auth_ac`) VALUES
(1, '经理', '1,2,30,3,4,23,5,6,7', 'Goods-showlist,Goods-add,User-pinglun,Order-showlist,Order-view,Goods-type,Goods-upd'),
(2, '员工', '1,2,3,4,7,8,9', 'Goods-showlist,Goods-add,User-pinglun,Order-view,Article-showlist');

-- --------------------------------------------------------

--
-- 表的结构 `sw_user`
--

CREATE TABLE `sw_user` (
  `user_id` int(11) NOT NULL COMMENT '自增id',
  `username` varchar(128) NOT NULL DEFAULT '' COMMENT '登录名',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '登录密码',
  `user_email` varchar(64) NOT NULL DEFAULT '' COMMENT '邮箱',
  `user_sex` tinyint(4) NOT NULL DEFAULT '1' COMMENT '性别',
  `user_qq` varchar(32) NOT NULL DEFAULT '' COMMENT 'qq',
  `user_tel` varchar(32) NOT NULL DEFAULT '' COMMENT '手机',
  `user_xueli` tinyint(4) NOT NULL DEFAULT '1' COMMENT '学历',
  `user_hobby` varchar(32) NOT NULL DEFAULT '' COMMENT '爱好',
  `user_introduce` text COMMENT '简介',
  `user_time` int(11) DEFAULT NULL,
  `last_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员表';

--
-- 转存表中的数据 `sw_user`
--

INSERT INTO `sw_user` (`user_id`, `username`, `password`, `user_email`, `user_sex`, `user_qq`, `user_tel`, `user_xueli`, `user_hobby`, `user_introduce`, `user_time`, `last_time`) VALUES
(1, 'zhangsanff', '1234', 'zhangsan@163.com', 1, '', '', 1, '', '', NULL, 0),
(133, 'jacd', 'abc', '840983928@qq.com', 3, '840983928', '1324564561', 5, '', 'I am jack', NULL, 0),
(134, '', '', '', 1, '', '', 1, '', '', NULL, 0),
(135, 'tom', '12345', 'tom@qq.com', 2, '', '1324564561', 5, '', 'I am tom', NULL, 0),
(136, 'jack1', '123456', 'tom@qq.com', 2, '', '1324564561', 5, '1,3', 'I am tom', NULL, 0),
(137, 'admin', 'admin', 'admin@qq.com', 1, '', '15899602670', 5, '1,3', 'I am admin', NULL, 0),
(138, 'admin', 'admin', '', 1, '', '', 5, '2,3', '', NULL, 0),
(139, 'admin1', 'admin', 'admin1@qq.com', 2, '', '1324564561', 5, '2,3', '', NULL, 0),
(140, 'dawei', 'dawei', 'dawei@qq.com', 1, '', '1324564561', 5, '1,2', '', NULL, 0),
(141, 'admin', 'admin', '', 1, '', '', 5, '1,2', '', NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tencent_qq`
--

CREATE TABLE `tencent_qq` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转储表的索引
--

--
-- 表的索引 `sw_auth`
--
ALTER TABLE `sw_auth`
  ADD PRIMARY KEY (`auth_id`);

--
-- 表的索引 `sw_category`
--
ALTER TABLE `sw_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- 表的索引 `sw_goods`
--
ALTER TABLE `sw_goods`
  ADD PRIMARY KEY (`goods_id`);

--
-- 表的索引 `sw_manager`
--
ALTER TABLE `sw_manager`
  ADD PRIMARY KEY (`mg_id`);

--
-- 表的索引 `sw_role`
--
ALTER TABLE `sw_role`
  ADD PRIMARY KEY (`role_id`);

--
-- 表的索引 `sw_user`
--
ALTER TABLE `sw_user`
  ADD PRIMARY KEY (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `sw_auth`
--
ALTER TABLE `sw_auth`
  MODIFY `auth_id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 使用表AUTO_INCREMENT `sw_category`
--
ALTER TABLE `sw_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `sw_goods`
--
ALTER TABLE `sw_goods`
  MODIFY `goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id', AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `sw_manager`
--
ALTER TABLE `sw_manager`
  MODIFY `mg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `sw_role`
--
ALTER TABLE `sw_role`
  MODIFY `role_id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `sw_user`
--
ALTER TABLE `sw_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id', AUTO_INCREMENT=142;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
