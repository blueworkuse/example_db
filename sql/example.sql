

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫: `example`
--

-- --------------------------------------------------------

--
-- 資料庫新增 users 表格：使用者
--
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號 ( 流水號 )',
  `account` varchar(20) DEFAULT '' COMMENT '帳號',
  `password` varchar(50) DEFAULT '' COMMENT '密碼 ( 使用 MD5 加密 )',
  `name` varchar(255) DEFAULT '' COMMENT '姓名',
  `sex` char(1) DEFAULT '' COMMENT '性別 ( M.男 / F.女 )',
  `birthday` date DEFAULT '0000-00-00' COMMENT '生日',
  `email` varchar(255) DEFAULT '' COMMENT '信箱',
  `tel` varchar(10) DEFAULT '' COMMENT '電話',
  `phone` varchar(10) DEFAULT '' COMMENT '手機',
  `address` varchar(255) DEFAULT '' COMMENT '地址',
  `idCard` varchar(10) DEFAULT '' COMMENT '身份證',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='使用者';

--
-- 資料庫新增 users 資料
--
INSERT INTO users VALUES 
('1','admin','21232F297A57A5A743894A0E4A801FC3','陳先生','M','1963/10/21','jon@gmail.com','061234567','0912345678','台南市',''),
('2','account','E268443E43D93DAB7EBEF303BBE9642F','黃小姐','F','1959/02/20','amy@gmail.com','037654321','0987654321','台中市','');



--
-- 資料庫新增 members 表格：會員
--
DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  PRIMARY KEY (`memberID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='會員';

--
-- 資料庫新增 members 資料
--
INSERT INTO members VALUES 
('1','jon','48BC893FCBC0A33ED3AD2CF2D5D57CFE','jon@gmail.com','yes','','no'),
('2','Hannah','705DA23959FA17C5D11D7A53A6157A19','amy@gmail.com','no','','no');




--
-- 資料庫新增 article 表格：文章
--
DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `articleID` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號 ( 流水號 )',
  `title` varchar(100) DEFAULT '' COMMENT '標題',
  `content` text COMMENT '說明',
  `imgPath` varchar(255) DEFAULT '' COMMENT '圖片位址',
  `refUrl` varchar(255) DEFAULT '' COMMENT '參考網址',
  `createDate` DATETIME  DEFAULT '0000-00-00 00:00:00' COMMENT '建立日期',
  `updateDate` DATETIME  DEFAULT '0000-00-00 00:00:00' COMMENT '修改日期',
  PRIMARY KEY (`articleID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章';

--
-- 資料庫新增 article 資料
--
INSERT INTO article VALUES 
('1','柴犬','柴犬Nana和阿楞的一天','article/nana.jpg','https://zh-tw.facebook.com/Nanavsmedia/','2018-05-01 11:22:33','2018-05-01 11:22:33'),
('2','柯基','連環泡有芒果','article/liquor.jpg','https://zh-tw.facebook.com/taiwanlianhuanpao/','2018-04-01 11:22:33','2018-04-01 11:22:33'),
('3','米克斯','黃阿瑪的後宮生活','article/amma.jpg','https://zh-tw.facebook.com/fumeancats/','2018-03-01 11:22:33','2018-03-01 11:22:33'),
('4','哈士奇','哈Dog Life','article/haDogLife.jpg','https://zh-tw.facebook.com/HaDogLife/','2018-02-01 11:22:33','2018-02-01 11:22:33'),
('5','法鬥','我是法國鬥牛犬Bibi不是Vivi','article/bibi.jpg','https://zh-tw.facebook.com/%E6%88%91%E6%98%AF%E6%B3%95%E5%9C%8B%E9%AC%A5%E7%89%9B%E7%8A%ACBibi%E4%B8%8D%E6%98%AFVivi-564523133673557/','2018-01-01 11:22:33','2018-01-01 11:22:33');



--
-- 資料庫新增 products 表格：產品
--
DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號 ( 流水號 )',
  `barcode` varchar(20) DEFAULT '' COMMENT '國際條碼',
  `name` varchar(255) DEFAULT '' COMMENT '名稱',
  `description` text COMMENT '描述',
  `price` float DEFAULT '0' COMMENT '價格',
  `storage` int(11) DEFAULT '0' COMMENT '庫存量',
  `imgPath` varchar(255) DEFAULT '' COMMENT '圖片位址',
  `refUrl` varchar(255) DEFAULT '' COMMENT '參考網址',
  PRIMARY KEY (`productID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='產品';

--
-- 資料庫新增 products 資料
--
INSERT INTO products VALUES 
('1','1234567891234','衣服','材質：棉65%，聚酯35%','294','3','product/01.jpg','https://global.rakuten.com/zh-tw/store/idog/item/out-3517-/'),
('2','3456789876543','2頓飯分','材料：塑料','1132','1','product/02.jpg','https://global.rakuten.com/zh-tw/store/utopia/item/petsafe0010/'),
('3','2938928392893','帆布背包','材料：聚酯','1627','4','product/03.jpg','https://global.rakuten.com/zh-tw/store/kurosu/item/55102174ku/'),
('4','2323232323232','狗糧','15kg飼養員包','1087','11','product/04.jpg','https://global.rakuten.com/zh-tw/store/net-ryohin/item/inu-011/'),
('5','9878767689878','稻草人寵物補充','容量：140 毫克 x 120tablets','2191','43','product/05.jpg','https://global.rakuten.com/zh-tw/store/poodle-smile/item/ta05-17-001/'),
('6','3454656767454','手巾紙','成分：水','19','22','product/06.jpg','https://global.rakuten.com/zh-tw/store/pluspet/item/petsheet_100/'),
('7','2338488595938','消味劑','成分：植物精油','434','22','product/07.jpg','https://global.rakuten.com/zh-tw/store/carezza/item/10001522/'),
('8','3434343434343','天婦羅','材料：聚酯','186','4','product/08.jpg','https://global.rakuten.com/zh-tw/store/besteverjapan/item/31628/'),
('9','3434343422112','玩具飛鏢','材料：牛皮','136','2','product/09.jpg','https://global.rakuten.com/zh-tw/store/kurosu/item/33113988ku/'),
('10','232354565756','平原項圈','材料：義大利油皮革','765','1','product/10.jpg','https://global.rakuten.com/zh-tw/store/colletto/item/plane_collar/');



--
-- 資料庫新增 orders 表格：訂購單主檔
--
DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `orderID` varchar(20) NOT NULL COMMENT '編號 ( 流水號 )',
  `orderDate` DATETIME  DEFAULT '0000-00-00 00:00:00' COMMENT '訂購日期',
  `memberID` varchar(20) DEFAULT '' COMMENT '會員編號',
  `description` text NOT NULL COMMENT '描述',
  `serviceFee` int(10) NOT NULL DEFAULT '0' COMMENT '服務費',
  `shippingFee` int(10) NOT NULL DEFAULT '0' COMMENT '運費',
  `cartTotal` int(10) NOT NULL DEFAULT '0' COMMENT '商品總金額',
  `orderTotal` int(10) NOT NULL DEFAULT '0' COMMENT '總金額',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '狀態',
  PRIMARY KEY (`orderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='訂購單主檔';

--
-- 資料庫新增 orders 資料
--
INSERT INTO orders VALUES 
('1','2018-01-01','1','','0','0','588','588','0'),
('2','2018-01-01','2','','0','0','1273','1273','0');



--
-- 資料庫新增 ordersdetail 表格：訂購單明細檔
--
DROP TABLE IF EXISTS `ordersdetail`;

CREATE TABLE `ordersdetail` (
  `orderDetailID` int(11) NOT NULL DEFAULT '1' COMMENT '編號 ( 流水號 )',
  `orderID` varchar(20) NOT NULL COMMENT '訂購單編號',
  `productID` int(11) NOT NULL DEFAULT '0' COMMENT '產品編號',
  `num` int(11) DEFAULT '0' COMMENT '數量',
  `price` float DEFAULT '0' COMMENT '價格',
  `total` float DEFAULT '0' COMMENT '總金額',
  PRIMARY KEY (`orderDetailID`,`orderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='訂購單明細檔';

--
-- 資料庫新增 ordersdetail 資料
--
INSERT INTO ordersdetail VALUES 
('1','1','1','2','294','588'),
('1','2','4','1','1087','1087'),
('2','2','8','1','186','186');

