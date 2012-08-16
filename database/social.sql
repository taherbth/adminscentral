-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2012 at 10:59 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_list`
--

CREATE TABLE IF NOT EXISTS `address_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `address_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `address_list`
--

INSERT INTO `address_list` (`id`, `org_id`, `member_id`, `address_title`, `address`) VALUES
(1, 22, 0, 'MD kamal hossain', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214'),
(4, 22, 0, 'Md Imran hossain', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214'),
(3, 22, 0, 'MD kamal ahmed', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214'),
(6, 22, 0, 'MD Abdur karim', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214'),
(8, 22, 3, 'MD Hasan ahmed', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214'),
(11, 22, 0, 'v?gen', 'v?gen');

-- --------------------------------------------------------

--
-- Table structure for table `archive_article`
--

CREATE TABLE IF NOT EXISTS `archive_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `validity` varchar(100) NOT NULL,
  `date_of_creation` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `importance` int(100) NOT NULL,
  `expire_date` varchar(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_group` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `archive_article`
--

INSERT INTO `archive_article` (`id`, `title`, `post_id`, `text`, `validity`, `date_of_creation`, `created_by`, `importance`, `expire_date`, `member_id`, `org_id`, `member_group`, `status`) VALUES
(7, 'news', '9', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle o', '', '2012-02-15', '3', 0, '2012-02-29', 3, 22, '5', 2),
(8, 'Annual Meeting', '13', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '', '2012-02-18', '3', 0, '2012-02-29', 3, 22, '5', 1),
(9, 'paragraphs', '12', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable', '', '2012-02-18', '3', 0, '2012-02-29', 3, 22, '5', 1),
(26, 'summer vacation', '35', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop', '', '2012-05-01', '3', 0, '2012-05-31', 3, 22, '5', 2),
(22, 'This is a test POst', '27', 'This is a test POstThis is a test POstThis is a test POstThis is a test POstThis is a test POstThis is a test POstThis is a test POstThis is a test POst', '', '2012-04-21', '3', 0, '2012-04-30', 3, 22, '5', 2),
(23, 'test', '28', 'android app', '', '2012-04-23', '3', 0, '2012-04-30', 3, 22, '5', 2),
(24, 'dfdf', '32', 'dfdf', '', '2012-04-25', '4', 0, '2012-04-30', 4, 22, '5', 2),
(25, 'test1', '33', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage', '', '2012-05-01', '3', 0, '2012-05-31', 3, 22, '5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `article_comment`
--

CREATE TABLE IF NOT EXISTS `article_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date` varchar(100) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `article_comment`
--

INSERT INTO `article_comment` (`id`, `post_id`, `comment`, `comment_time`, `comment_date`, `posted_by`) VALUES
(1, '27', 'nice', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3'),
(2, '27', 'good', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3'),
(3, '28', 'nice', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3'),
(4, '28', 'we will develope android app', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4'),
(5, '29', 'fine', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3'),
(6, '29', 'very nice', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3'),
(18, '34', 'good', '0000-00-00 00:00:00', '2012-05-20', '3'),
(17, '35', 'fine', '0000-00-00 00:00:00', '2012-05-20', '3');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0284123ded44a37b3b95e9dce7c36f9f', '123.49.21.90', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335007702, ''),
('049e6a6d1d3a78873a162dc59f950c92', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335168357, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('04a9a2bbf92418eca14aa508c8545614', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335352970, 'a:13:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";s:10:"DX_user_id";s:1:"1";s:9:"DX_emp_id";s:0:"";s:11:"DX_username";s:5:"admin";s:10:"DX_role_id";s:1:"7";s:12:"DX_role_name";s:11:"Super Admin";s:18:"DX_parent_roles_id";a:0:{}s:20:"DX_parent_roles_name";a:0:{}s:13:"DX_permission";a:2:{s:4:"edit";s:1:"1";s:6:"delete";s:1:"1";}s:21:"DX_parent_permissions";a:0:{}s:12:"DX_logged_in";s:1:"1";}'),
('0b61caec322a5295108ef12efd2ec21f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/201001', 1336811639, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('10137307300fb501a1724f774f1a661a', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335351178, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('1efc2ec0614e2ed2488dfd1b54551a53', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/201001', 1337234987, 'a:6:{s:8:"username";s:3:"nur";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:9:"user_type";s:1:"4";s:8:"loggedin";s:1:"1";}'),
('236a9638694646def00d14273fa89bc7', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335178883, 'a:8:{s:8:"username";s:17:"nur2510@gmail.com";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:9:"user_type";s:1:"4";s:8:"loggedin";s:1:"1";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('275c19a4b1c8dc41fb1bbb688185654c', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335166682, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('2d363410e5e7d74d9a08c41ea168f64e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KH', 1337499146, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('3336128f1e7078405eb37685496e386f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KH', 1337414569, 'a:9:{s:8:"username";s:4:"nur1";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";s:2:"id";s:1:"4";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:9:"user_type";s:1:"5";s:4:"name";s:14:"MD Rahim ahmed";s:8:"loggedin";s:1:"1";}'),
('37e40ae622d1d7be5299b99bb7dd0a91', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/201001', 1337238650, 'a:9:{s:8:"username";s:17:"nur2510@gmail.com";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:9:"user_type";s:1:"4";s:4:"name";s:14:"MD Ahmed hasan";s:8:"loggedin";s:1:"1";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('493acba31654ef578541be61f8284bb5', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/201001', 1337166186, 'a:18:{s:8:"username";s:3:"nur";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";s:10:"DX_user_id";s:1:"1";s:9:"DX_emp_id";s:0:"";s:11:"DX_username";s:5:"admin";s:10:"DX_role_id";s:1:"7";s:12:"DX_role_name";s:11:"Super Admin";s:18:"DX_parent_roles_id";a:0:{}s:20:"DX_parent_roles_name";a:0:{}s:13:"DX_permission";a:2:{s:4:"edit";s:1:"1";s:6:"delete";s:1:"1";}s:21:"DX_parent_permissions";a:0:{}s:12:"DX_logged_in";s:1:"1";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:9:"user_type";s:1:"4";s:8:"loggedin";s:1:"1";}'),
('4ab8b0d684628dbd0964fff4af8dedce', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335337540, 'a:8:{s:8:"username";s:17:"nur2510@gmail.com";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:9:"user_type";s:1:"4";s:8:"loggedin";s:1:"1";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('6438d87960218abb1c1dd14650304ad1', '83.233.57.17', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19', 1335005310, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('64a10261dadc1a9f397c59b523ce9c5c', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335166690, ''),
('6d91c060d5a923bf4d6c2e8120fe12bb', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335258049, 'a:8:{s:8:"username";s:17:"nur2510@gmail.com";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:9:"user_type";s:1:"4";s:8:"loggedin";s:1:"1";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('6fdc9a4f3f4ffadb0ab8a6913fb27b41', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335178883, 'a:8:{s:8:"username";s:3:"nur";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:9:"user_type";s:1:"4";s:8:"loggedin";s:1:"1";}'),
('788301918d4547925142aebbb95f11a2', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335257530, ''),
('81ec4e11830c726b149e716c2ae318e0', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/201001', 1337242023, ''),
('85b976340968c585dd9b36ed5d437dd3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/201001', 1337240735, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('85ef0ac26b25ed7f506970010c3f0557', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.19 (K', 1335513222, ''),
('8e15780ada2db452277740b06300106d', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335174164, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('91c243342a9e3ad452c16d613e0b07b7', '123.49.21.90', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1335005698, ''),
('9e3ec5350cff83db0ec299f20d56bae2', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335335826, 'a:8:{s:8:"username";s:17:"nur2510@gmail.com";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:9:"user_type";s:1:"4";s:8:"loggedin";s:1:"1";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('a8e1faedc183232bb6c9f02d39d4c2a4', '83.233.57.17', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:11.0) G', 1335005279, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('b00999c9de6d8f24d52d0e9332759fcc', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335339457, 'a:10:{s:10:"DX_user_id";s:1:"1";s:9:"DX_emp_id";s:0:"";s:11:"DX_username";s:5:"admin";s:10:"DX_role_id";s:1:"7";s:12:"DX_role_name";s:11:"Super Admin";s:18:"DX_parent_roles_id";a:0:{}s:20:"DX_parent_roles_name";a:0:{}s:13:"DX_permission";a:2:{s:4:"edit";s:1:"1";s:6:"delete";s:1:"1";}s:21:"DX_parent_permissions";a:0:{}s:12:"DX_logged_in";s:1:"1";}'),
('d026de9435c8ad25cd5cd19ca74e741e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/201001', 1337252692, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('d516397aa0530e9b84afe909a830844f', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335258468, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('e41c4542f5f2f91a71cb907b7231869b', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335954644, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('f0a5506dac6a883d3d5b4ac9115f384d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.19 (K', 1337081661, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('f65e2a305d17eb267d51b65d36cba3d6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KH', 1337488119, 'a:3:{s:8:"username";s:17:"nur2510@gmail.com";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('f6b360da853ec882e589a55d2cb24d40', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/201001', 1337511454, 'a:19:{s:8:"username";s:17:"nur2510@gmail.com";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:9:"user_type";s:1:"4";s:4:"name";s:14:"MD Ahmed hasan";s:8:"loggedin";s:1:"1";s:10:"DX_user_id";s:1:"1";s:9:"DX_emp_id";s:0:"";s:11:"DX_username";s:5:"admin";s:10:"DX_role_id";s:1:"7";s:12:"DX_role_name";s:11:"Super Admin";s:18:"DX_parent_roles_id";a:0:{}s:20:"DX_parent_roles_name";a:0:{}s:13:"DX_permission";a:2:{s:4:"edit";s:1:"1";s:6:"delete";s:1:"1";}s:21:"DX_parent_permissions";a:0:{}s:12:"DX_logged_in";s:1:"1";s:7:"user_id";s:2:"22";s:9:"logged_in";s:1:"1";}'),
('fb230a6502503e09df9632541efa252d', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1336044862, 'a:6:{s:8:"username";s:3:"nur";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:9:"user_type";s:1:"4";s:8:"loggedin";s:1:"1";}'),
('fd2ee76ee7c12c713f7f3040ebbcdb27', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1335522148, 'a:6:{s:8:"username";s:3:"nur";s:2:"id";s:1:"3";s:10:"member_org";s:2:"22";s:12:"member_group";s:1:"5";s:9:"user_type";s:1:"4";s:8:"loggedin";s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `comment`, `posted_by`) VALUES
(1, '4', 'no feedback', '3'),
(2, '4', 'no feedback', '3'),
(3, '3', 'rrr', '3'),
(4, '4', 'I thinnk we need to arrange a meeting to solve this problem', '3'),
(5, '6', 'excelent', '3'),
(6, '6', 'fine', '7'),
(7, '6', 't is a long established fact that a reader will be distracted by the readable content of a page when', '3'),
(8, '6', 'We want to arrange a annual meeting ', '3'),
(9, '6', 'Good morning my dr friends', '3'),
(10, '8', 'fine', '3'),
(11, '10', 'fine', '3'),
(12, '10', 'If you are going to use a passage of Lorem Ipsum', '3'),
(13, '11', 'fine', '3'),
(14, '11', 'uruuuuu', '3'),
(15, '14', 'fine', '3'),
(16, '14', 'tesrt', '3');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE IF NOT EXISTS `contact_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(100) NOT NULL,
  `sender_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `message_date` varchar(100) NOT NULL,
  `photo1` varchar(100) NOT NULL,
  `message_status` int(10) NOT NULL COMMENT '1=read,2=unread',
  `sender_status` int(10) NOT NULL COMMENT '1=reg_member,2=internet user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `org_id`, `sender_id`, `name`, `email`, `subject`, `message`, `message_date`, `photo1`, `message_status`, `sender_status`) VALUES
(1, 22, 3, 'MD Ahmed hasan', 'nur25102@gmail.com', 'association Board update on may 17', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)', '2012-05-17', '5c2d6be13924f7e3e3987e829c5a7cd0.pdf', 1, 1),
(2, 22, 3, 'MD Ahmed hasan', 'nur25102@gmail.com', 'regarding php to exe convertion', 'he standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham', '2012-05-17', '09af104d57b3a8fec5bc973bdfa058e5.doc', 1, 1),
(3, 22, 3, 'MD Ahmed hasan', 'nur25102@gmail.com', 'association Board update on may 17', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)', '2012-05-17', '5c2d6be13924f7e3e3987e829c5a7cd0.pdf', 1, 1),
(4, 22, 3, 'MD Ahmed hasan', 'nur25102@gmail.com', 'regarding php to exe convertion', 'he standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham', '2012-05-17', '09af104d57b3a8fec5bc973bdfa058e5.doc', 1, 1),
(5, 22, 3, 'MD Ahmed hasan', 'nur25102@gmail.com', 'association Board update on may 17', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)', '2012-05-17', '5c2d6be13924f7e3e3987e829c5a7cd0.pdf', 1, 1),
(6, 22, 3, 'MD Ahmed hasan', 'nur25102@gmail.com', 'regarding php to exe convertion', 'he standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham', '2012-05-17', '09af104d57b3a8fec5bc973bdfa058e5.doc', 1, 1),
(7, 22, 3, 'MD Ahmed hasan', 'nur25102@gmail.com', 'association Board update on may 17', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)', '2012-05-17', '5c2d6be13924f7e3e3987e829c5a7cd0.pdf', 1, 1),
(8, 22, 3, 'MD Ahmed hasan', 'nur25102@gmail.com', 'regarding php to exe convertion', 'he standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham', '2012-05-17', '09af104d57b3a8fec5bc973bdfa058e5.doc', 1, 1),
(9, 22, 3, 'MD Ahmed hasan', 'nur25102@gmail.com', 'association Board update on may 17', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)', '2012-05-17', '5c2d6be13924f7e3e3987e829c5a7cd0.pdf', 1, 1),
(10, 22, 3, 'MD Ahmed hasan', 'nur25102@gmail.com', 'regarding php to exe convertion', 'he standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham', '2012-05-17', '09af104d57b3a8fec5bc973bdfa058e5.doc', 1, 1),
(11, 22, 0, 'nur', 'n@gmail.com', 'Request For membership', 'ext ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites', '', 'c6bb0edfd366f05cc89de3fdb3e0ca61.doc', 1, 2),
(12, 22, 0, 'masum', 'masum@gmail.com', 'association board', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"', '', 'ccebf81165337ec75635f5293b4055fd.png', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact_list`
--

CREATE TABLE IF NOT EXISTS `contact_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `contact_no` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `contact_list`
--

INSERT INTO `contact_list` (`id`, `org_id`, `member_id`, `name`, `contact_no`) VALUES
(5, 22, 0, 'ahmed', '8801922686268'),
(6, 22, 0, 'nur', '3258788787'),
(7, 22, 3, 'nur', '8801922686268'),
(10, 22, 0, 'masum', '8801673176511');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE IF NOT EXISTS `cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_cost` decimal(10,2) NOT NULL,
  `letter_cost` decimal(10,2) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`id`, `sms_cost`, `letter_cost`, `package_name`, `currency`) VALUES
(16, '7.00', '7.00', 'Globalcost', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `date_of_creation` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `expire_date` varchar(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_group` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `title`, `text`, `date_of_creation`, `created_by`, `expire_date`, `member_id`, `org_id`, `member_group`, `status`) VALUES
(8, 'Absolute Beginner Talk', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web site', '2012-02-29', '3', '2013-02-01', 3, 22, '5', 1),
(9, 'Access 2007 selected value on combobox not displaying on more than one record', 'dfdf', '2012-04-01', '3', '2012-04-29', 3, 22, '5', 1),
(10, 'Show viewcontroller as subview from displayed modal view controller', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2012-04-02', '3', '2012-04-30', 3, 22, '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum_archive`
--

CREATE TABLE IF NOT EXISTS `forum_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `archive_by` varchar(100) NOT NULL,
  `comment_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `forum_archive`
--

INSERT INTO `forum_archive` (`id`, `post_id`, `comment`, `posted_by`, `archive_by`, `comment_id`, `org_id`) VALUES
(16, '8', 'good', '3', '3', 23, 22),
(15, '8', 'fine', '3', '3', 22, 22);

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment`
--

CREATE TABLE IF NOT EXISTS `forum_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `comment_date` varchar(100) NOT NULL,
  `comment_time` time NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `forum_comment`
--

INSERT INTO `forum_comment` (`id`, `post_id`, `comment`, `comment_date`, `comment_time`, `posted_by`) VALUES
(24, '8', 'nice', '2012-05-20', '00:00:00', '3');

-- --------------------------------------------------------

--
-- Table structure for table `group_permission`
--

CREATE TABLE IF NOT EXISTS `group_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` tinyint(50) NOT NULL,
  `sending_email` tinyint(10) NOT NULL,
  `sending_sms` tinyint(10) NOT NULL,
  `sending_post` tinyint(10) NOT NULL,
  `profile` tinyint(10) NOT NULL,
  `message` tinyint(10) NOT NULL,
  `org_id` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `group_permission`
--

INSERT INTO `group_permission` (`id`, `group_id`, `sending_email`, `sending_sms`, `sending_post`, `profile`, `message`, `org_id`) VALUES
(4, 5, 1, 2, 1, 2, 1, 22),
(5, 7, 1, 1, 1, 1, 1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

CREATE TABLE IF NOT EXISTS `letter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(100) NOT NULL,
  `member_group` int(100) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `letter_header` text NOT NULL,
  `letter_footer` text NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `sending_date` varchar(100) NOT NULL,
  `admin_status` int(20) NOT NULL,
  `superadmin_status` int(20) NOT NULL,
  `letter_status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `letter`
--

INSERT INTO `letter` (`id`, `org_id`, `member_group`, `title`, `text`, `letter_header`, `letter_footer`, `sender_name`, `sending_date`, `admin_status`, `superadmin_status`, `letter_status`) VALUES
(73, 22, 5, '<p>dfd</p>', '<p>dd</p>', '6', '9', '3', '2012-04-03', 3, 1, 0),
(74, 22, 5, '<p>dd</p>', '<p>dd</p>', '6', '9', '3', '2012-04-03', 3, 1, 0),
(77, 22, 0, '<p>test</p>', '<p>here are many variations of passages of Lorem Ipsum available, but the  majority have suffered alteration in some form, by injected humour, or  randomised words which don''t look even slightly believable. If you are  going to use a passage of Lorem Ipsum, you need to be sure there isn''t  anything embarrassing hidden in the middle of text. All the Lorem Ipsum  generators on the Internet tend to repeat predefined chunks as  necessary, making this the first true generator on the Internet. It uses  a dictionary of over 200 Latin words, combined with a handful of model  sentence structures, to generate Lorem Ipsum which looks reasonable. The  generated Lorem Ipsum is therefore always free from repetition,  injected humour, or non-characteristic words etc.</p>', '6', '4', '', '2012-05-19', 2, 1, 0),
(78, 22, 5, 'test article letter', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop', '', '', '3', '2012-05-20', 2, 1, 0),
(79, 22, 5, 'ere', 'rere', '', '', '3', '2012-05-20', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `letter_archive`
--

CREATE TABLE IF NOT EXISTS `letter_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `letter_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_group` int(100) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `sending_date` varchar(100) NOT NULL,
  `admin_status` int(20) NOT NULL,
  `superadmin_status` int(20) NOT NULL,
  `letter_status` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `letter_archive`
--

INSERT INTO `letter_archive` (`id`, `letter_id`, `org_id`, `member_group`, `title`, `text`, `sender_name`, `sending_date`, `admin_status`, `superadmin_status`, `letter_status`) VALUES
(24, 76, 22, 5, '<p>ddf</p>', '<p>dfdf</p>', '3', '2012-04-05', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `letter_footer`
--

CREATE TABLE IF NOT EXISTS `letter_footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `letter_footer`
--

INSERT INTO `letter_footer` (`id`, `org_id`, `member_id`, `title`, `text`) VALUES
(9, 22, 3, 'custoom footer', '<p>powered by: ndjfkdf</p>'),
(4, 22, 0, 'standard footer', '<p><span style="color: #ff0000;">Sincerly,</span></p>\n<p><span style="color: #339966;">Date: 2011/12/12</span></p>\n<p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `letter_header`
--

CREATE TABLE IF NOT EXISTS `letter_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `letter_header`
--

INSERT INTO `letter_header` (`id`, `org_id`, `member_id`, `title`, `text`) VALUES
(14, 22, 0, 'dfdf', '<p>dfd</p>'),
(6, 22, 0, 'Standard Header', '<p><span style="color: #ff0000;">Organization name: r society</span></p>\n<p><span style="color: #00ff00;">Date:2011/12/03</span></p>'),
(10, 22, 4, 'dd', '<p>dd</p>'),
(13, 22, 3, 'custoom header', '<p>organization name: sports society</p>'),
(15, 22, 0, 'dfdf', '<p>hjyyjjdjhy</p>');

-- --------------------------------------------------------

--
-- Table structure for table `letter_send_request`
--

CREATE TABLE IF NOT EXISTS `letter_send_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `letter_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `admin_status` int(100) NOT NULL,
  `superadmin_status` int(100) NOT NULL,
  `sender_id` int(100) NOT NULL,
  `letter_status` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=412 ;

--
-- Dumping data for table `letter_send_request`
--

INSERT INTO `letter_send_request` (`id`, `letter_id`, `member_id`, `org_id`, `admin_status`, `superadmin_status`, `sender_id`, `letter_status`) VALUES
(391, 76, 11, 22, 2, 1, 3, 0),
(390, 76, 10, 22, 2, 1, 3, 0),
(389, 76, 9, 22, 2, 1, 3, 0),
(388, 76, 8, 22, 2, 1, 3, 0),
(387, 76, 7, 22, 2, 1, 3, 0),
(386, 76, 6, 22, 2, 1, 3, 0),
(385, 76, 5, 22, 2, 1, 3, 0),
(384, 76, 4, 22, 2, 1, 3, 0),
(383, 76, 3, 22, 2, 1, 3, 0),
(382, 75, 4, 22, 2, 2, 0, 0),
(381, 75, 3, 22, 2, 2, 0, 0),
(380, 74, 23, 22, 1, 1, 3, 0),
(379, 74, 22, 22, 1, 1, 3, 0),
(378, 74, 21, 22, 1, 1, 3, 0),
(377, 73, 23, 22, 1, 1, 3, 0),
(376, 73, 22, 22, 1, 1, 3, 0),
(375, 73, 21, 22, 1, 1, 3, 0),
(374, 72, 23, 22, 2, 2, 3, 0),
(373, 72, 22, 22, 2, 2, 3, 0),
(372, 72, 21, 22, 2, 2, 3, 0),
(371, 72, 3, 22, 2, 2, 3, 0),
(370, 71, 23, 22, 2, 1, 0, 0),
(369, 71, 22, 22, 2, 1, 0, 0),
(368, 71, 21, 22, 2, 1, 0, 0),
(367, 71, 5, 22, 2, 1, 0, 0),
(366, 71, 4, 22, 2, 1, 0, 0),
(365, 71, 3, 22, 2, 1, 0, 0),
(392, 77, 3, 22, 2, 1, 0, 0),
(393, 77, 4, 22, 2, 1, 0, 0),
(394, 77, 5, 22, 2, 1, 0, 0),
(395, 77, 6, 22, 2, 1, 0, 0),
(396, 77, 7, 22, 2, 1, 0, 0),
(397, 77, 8, 22, 2, 1, 0, 0),
(398, 77, 9, 22, 2, 1, 0, 0),
(399, 77, 10, 22, 2, 1, 0, 0),
(400, 77, 11, 22, 2, 1, 0, 0),
(401, 77, 32, 22, 2, 1, 0, 0),
(402, 78, 3, 22, 2, 1, 3, 0),
(403, 78, 4, 22, 2, 1, 3, 0),
(404, 78, 5, 22, 2, 1, 3, 0),
(405, 78, 6, 22, 2, 1, 3, 0),
(406, 78, 7, 22, 2, 1, 3, 0),
(407, 78, 8, 22, 2, 1, 3, 0),
(408, 78, 21, 22, 2, 1, 3, 0),
(409, 78, 22, 22, 2, 1, 3, 0),
(410, 79, 21, 22, 2, 1, 3, 0),
(411, 79, 22, 22, 2, 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(50) NOT NULL,
  `member_title` varchar(100) NOT NULL,
  `person_number` varchar(100) NOT NULL,
  `user_type` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `expire_date` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_message` varchar(100) NOT NULL,
  `bank_info` varchar(100) NOT NULL,
  `household_size` varchar(100) NOT NULL,
  `member_group` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo1` varchar(100) NOT NULL,
  `previlige_status` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `org_id`, `member_title`, `person_number`, `user_type`, `name`, `expire_date`, `address`, `phone`, `email`, `profile_message`, `bank_info`, `household_size`, `member_group`, `username`, `password`, `photo1`, `previlige_status`) VALUES
(3, 22, 'hasan', '58', 4, 'MD Ahmed hasan', '2012-12-29', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214', '8801922686268', 'nur2510@gmail.com', 'g', 'g', 'dd', 5, 'nur', 'MTIzNDU2', '', 1),
(4, 22, 'Rahim', '59', 5, 'MD Rahim ahmed', '2012-12-29', '25/12/1,House no #04, Road nO # 09, West kumalapur(Ground Floor),Dhaka-1214', '8801922686268', 'nur2410@gmail.com', 'kk', 'kk', 'kk', 5, 'nur1', 'MTIzNDU2', '', 2),
(5, 22, 'MD kamal Hossain', '60', 5, 'MD kamal Hossain', '2012-12-29', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214', '8801922686268', 'nur2610@gmail.com', 'kk', 'kkk', 'kkk', 5, 'nur2', 'MTIzNDU2', '', 1),
(6, 21, 'imran hossain', '61', 5, 'MD Imran hossain', '2012-12-29', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214', '8801922686268', 'nur2710@gmail.com', 'dkkk', '12222', '222', 5, 'nur6', 'MTIzNDU2Nzg=', '', 1),
(7, 22, 'nabil', '62', 6, 'MD Nabil Ahmed', '2012-12-29', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214', '8801922686268', 'nur2810@gmail.com', 'djfdf', 'jhjh', 'jhj', 5, 'nur06', 'MTIzNDU2', '', 0),
(8, 22, 'yeasin', '63', 6, 'MD Yeasin Hossain', '2012-12-29', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214', '8801922686268', 'nur110@gmail.com', 'dkfj', 'kjdfk', 'kjdkf', 5, 'yeasin', 'MTIzNDU2', '', 0),
(9, 22, 'arman', '64', 5, 'MD Arman Ahmed', '2012-12-29', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214', '8801922686268', 'nn@gmail.com', 'dkfk', 'jdkfj', 'kdjfk', 5, 'arman', 'MTIzNDU2', '', 0),
(10, 22, 'MD kamal Khan', '65', 6, 'kamal', '2012-05-16', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214', '8801922686268', 'rnnnn@gmail.com', 'dkfk', 'jdkfj', 'kdjfk', 5, 'nabil12', 'MTIzNDU2', '', 0),
(11, 22, 'kamal', '66', 4, 'Ismail hossainl', '2012-02-15', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214', '8801922686268', 'nn1@gmail.com', 'dkfk', 'jdkfj', 'kdjfk', 5, 'kamal123', 'MTIzNDU2', '', 0),
(21, 22, 'kamal', '67', 4, 'kamal', '2012-12-29', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214', '8801922686268', 'nkkn@gmail.com', '', '', '', 4, 'test123', 'MTIzNDU2', '', 0),
(22, 22, 'Rahman', '81', 4, 'MD Abdur Rahman', '2012-12-29', '132/12/1,House no #01, Road nO # 01, West kumalapur(Ground Floor),Dhaka-1214', '8801922686268', 'admin@gmail.com', 'title', 'klk', '45', 4, 'rahman', 'MTIzNDU2Nzg5MQ==', '', 0),
(32, 22, 'Chairman', '54664646', 4, 'abu', '2012-04-28', 'saaccaas', '+46727607048', 'tuhinshah12@gmail.com', 'xcasax', 'asacasdcascascaccaacasc', 'saascc', 5, 'taher', 'dGFoZXJAYnRoMTM=', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_info_previlize`
--

CREATE TABLE IF NOT EXISTS `member_info_previlize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(50) NOT NULL,
  `member_id` int(100) NOT NULL,
  `member_title` varchar(100) NOT NULL,
  `person_number` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `expire_date` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_message` varchar(100) NOT NULL,
  `bank_info` varchar(100) NOT NULL,
  `household_size` varchar(100) NOT NULL,
  `member_group` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `member_info_previlize`
--

INSERT INTO `member_info_previlize` (`id`, `org_id`, `member_id`, `member_title`, `person_number`, `name`, `expire_date`, `address`, `phone`, `email`, `profile_message`, `bank_info`, `household_size`, `member_group`, `username`) VALUES
(42, 22, 3, '2', '2', '2', '2', '2', 1, '1', '1', '2', '1', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `member_info_previlize_org`
--

CREATE TABLE IF NOT EXISTS `member_info_previlize_org` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(50) NOT NULL,
  `member_id` int(100) NOT NULL,
  `member_title` varchar(100) NOT NULL,
  `person_number` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `expire_date` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_message` varchar(100) NOT NULL,
  `bank_info` varchar(100) NOT NULL,
  `household_size` varchar(100) NOT NULL,
  `member_group` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `member_info_previlize_org`
--

INSERT INTO `member_info_previlize_org` (`id`, `org_id`, `member_id`, `member_title`, `person_number`, `name`, `expire_date`, `address`, `phone`, `email`, `profile_message`, `bank_info`, `household_size`, `member_group`, `username`) VALUES
(12, 22, 3, '3', '2', '3', '3', '2', 1, '1', '1', '2', '1', 1, '3');

-- --------------------------------------------------------

--
-- Table structure for table `member_post`
--

CREATE TABLE IF NOT EXISTS `member_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `validity` varchar(100) NOT NULL,
  `date_of_creation` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `importance` int(100) NOT NULL,
  `expire_date` varchar(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `member_group` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `member_post`
--

INSERT INTO `member_post` (`id`, `title`, `text`, `validity`, `date_of_creation`, `created_by`, `importance`, `expire_date`, `member_id`, `org_id`, `member_group`, `status`) VALUES
(29, 'How develope a  android application', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '', '2012-04-23', '3', 2, '2012-05-31', 3, 22, '5', 2),
(31, 'social network', 'social networksocial networksocial networksocial networksocial networksocial networksocial networksocial networksocial networksocial networksocial networksocial networksocial networksocial network', '', '2012-04-25', '4', 2, '2012-05-31', 4, 22, '5', 2),
(34, 'association', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi', '', '2012-05-01', '3', 4, '2012-05-31', 3, 22, '5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `member_previlige`
--

CREATE TABLE IF NOT EXISTS `member_previlige` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `mainboard_access_main` int(20) DEFAULT NULL,
  `mainboard_send_proposal` int(20) DEFAULT NULL,
  `mainboard_change_article` int(20) DEFAULT NULL,
  `mainboard_send_notification` int(20) DEFAULT NULL,
  `mainboard_sending_out` int(20) DEFAULT NULL,
  `mainboard_manually_archive` int(20) DEFAULT NULL,
  `forum_access` int(20) DEFAULT NULL,
  `forum_comments` int(20) DEFAULT NULL,
  `forum_delete_won_comments` int(20) DEFAULT NULL,
  `forum_delete_any_coments` int(20) DEFAULT NULL,
  `forum_manual_comments` int(20) DEFAULT NULL,
  `member_login_logout` int(20) DEFAULT NULL,
  `member_change_profile` int(20) DEFAULT NULL,
  `member_change_password` int(20) DEFAULT NULL,
  `configuration_view_org` int(20) DEFAULT NULL,
  `configuration_change_org` int(20) DEFAULT NULL,
  `configuration_visibility` int(20) DEFAULT NULL,
  `configuration_switching` int(20) DEFAULT NULL,
  `configuration_create_address` int(20) DEFAULT NULL,
  `communication_send_email` int(20) DEFAULT NULL,
  `communication_send_sms` int(20) DEFAULT NULL,
  `communication_send_letters` int(20) DEFAULT NULL,
  `economics_register` int(20) DEFAULT NULL,
  `economics_send_payment` int(20) DEFAULT NULL,
  `economics_check_complete` int(20) DEFAULT NULL,
  `economics_watch_total_income` int(20) DEFAULT NULL,
  `economics_watch_total_cost` int(20) DEFAULT NULL,
  `economics_watch_statistics` int(20) DEFAULT NULL,
  `history_access_articles` int(20) DEFAULT NULL,
  `history_access_comments` int(20) DEFAULT NULL,
  `history_user_actions` int(20) DEFAULT NULL,
  `history_old_letters` int(20) DEFAULT NULL,
  `history_old_sms` int(20) DEFAULT NULL,
  `history_old_emails` int(20) DEFAULT NULL,
  `members_decide` int(20) DEFAULT NULL,
  `members_add_change` int(20) DEFAULT NULL,
  `members_c_group` int(20) DEFAULT NULL,
  `members_add_user` int(20) DEFAULT NULL,
  `members_user_types` int(20) DEFAULT NULL,
  `members_add_usertype` int(20) DEFAULT NULL,
  `external_mainboard` int(20) NOT NULL,
  `external_presentation` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `member_previlige`
--

INSERT INTO `member_previlige` (`id`, `user_type`, `org_id`, `mainboard_access_main`, `mainboard_send_proposal`, `mainboard_change_article`, `mainboard_send_notification`, `mainboard_sending_out`, `mainboard_manually_archive`, `forum_access`, `forum_comments`, `forum_delete_won_comments`, `forum_delete_any_coments`, `forum_manual_comments`, `member_login_logout`, `member_change_profile`, `member_change_password`, `configuration_view_org`, `configuration_change_org`, `configuration_visibility`, `configuration_switching`, `configuration_create_address`, `communication_send_email`, `communication_send_sms`, `communication_send_letters`, `economics_register`, `economics_send_payment`, `economics_check_complete`, `economics_watch_total_income`, `economics_watch_total_cost`, `economics_watch_statistics`, `history_access_articles`, `history_access_comments`, `history_user_actions`, `history_old_letters`, `history_old_sms`, `history_old_emails`, `members_decide`, `members_add_change`, `members_c_group`, `members_add_user`, `members_user_types`, `members_add_usertype`, `external_mainboard`, `external_presentation`) VALUES
(9, 4, 22, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0),
(10, 5, 22, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0),
(11, 6, 22, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `org_cost`
--

CREATE TABLE IF NOT EXISTS `org_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(20) NOT NULL,
  `sms_cost` int(100) NOT NULL,
  `letter_cost` int(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `org_cost`
--

INSERT INTO `org_cost` (`id`, `org_id`, `sms_cost`, `letter_cost`, `currency`) VALUES
(1, 17, 10, 10, ''),
(4, 26, 3, 3, ''),
(6, 22, 3, 3, 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `org_external_previlige`
--

CREATE TABLE IF NOT EXISTS `org_external_previlige` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(100) NOT NULL,
  `external_mainboard` int(100) NOT NULL,
  `external_presentation` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `org_external_previlige`
--

INSERT INTO `org_external_previlige` (`id`, `org_id`, `external_mainboard`, `external_presentation`) VALUES
(4, 22, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `org_group`
--

CREATE TABLE IF NOT EXISTS `org_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `org_id` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `org_group`
--

INSERT INTO `org_group` (`id`, `group_name`, `org_id`) VALUES
(13, 'Dfdf', 0),
(5, 'Friend1', 22),
(4, 'Sss1', 22),
(7, 'developer', 26),
(9, 'Ddd', 21),
(10, 'Rtrt', 21),
(11, 'Dfdfd', 21),
(12, 'Developer', 22),
(14, 'Developer1', 0),
(15, 'Php expert', 22),
(17, 'Ssd', 22),
(18, 'A', 22);

-- --------------------------------------------------------

--
-- Table structure for table `org_member`
--

CREATE TABLE IF NOT EXISTS `org_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `person_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `org_member`
--

INSERT INTO `org_member` (`id`, `org_id`, `member_id`, `person_number`, `email`, `username`, `password`) VALUES
(11, 22, 3, '58', 'nur2510@gmail.com', 'nur', 'MTIzNDU2');

-- --------------------------------------------------------

--
-- Table structure for table `org_previlige`
--

CREATE TABLE IF NOT EXISTS `org_previlige` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(100) NOT NULL,
  `mainboard_access_main` int(20) DEFAULT NULL,
  `mainboard_send_proposal` int(20) DEFAULT NULL,
  `mainboard_change_article` int(20) DEFAULT NULL,
  `mainboard_send_notification` int(20) DEFAULT NULL,
  `mainboard_sending_out` int(20) DEFAULT NULL,
  `mainboard_manually_archive` int(20) DEFAULT NULL,
  `forum_access` int(20) DEFAULT NULL,
  `forum_comments` int(20) DEFAULT NULL,
  `forum_delete_won_comments` int(20) DEFAULT NULL,
  `forum_delete_any_coments` int(20) DEFAULT NULL,
  `forum_manual_comments` int(20) DEFAULT NULL,
  `member_login_logout` int(20) DEFAULT NULL,
  `member_change_profile` int(20) DEFAULT NULL,
  `member_change_password` int(20) DEFAULT NULL,
  `configuration_view_org` int(20) DEFAULT NULL,
  `configuration_change_org` int(20) DEFAULT NULL,
  `configuration_visibility` int(20) DEFAULT NULL,
  `configuration_switching` int(20) DEFAULT NULL,
  `configuration_create_address` int(20) DEFAULT NULL,
  `communication_send_email` int(20) DEFAULT NULL,
  `communication_send_sms` int(20) DEFAULT NULL,
  `communication_send_letters` int(20) DEFAULT NULL,
  `economics_register` int(20) DEFAULT NULL,
  `economics_send_payment` int(20) DEFAULT NULL,
  `economics_check_complete` int(20) DEFAULT NULL,
  `economics_watch_total_income` int(20) DEFAULT NULL,
  `economics_watch_total_cost` int(20) DEFAULT NULL,
  `economics_watch_statistics` int(20) DEFAULT NULL,
  `history_access_articles` int(20) DEFAULT NULL,
  `history_access_comments` int(20) DEFAULT NULL,
  `history_user_actions` int(20) DEFAULT NULL,
  `history_old_letters` int(20) DEFAULT NULL,
  `history_old_sms` int(20) DEFAULT NULL,
  `history_old_emails` int(20) DEFAULT NULL,
  `members_decide` int(20) DEFAULT NULL,
  `members_add_change` int(20) DEFAULT NULL,
  `members_c_group` int(20) DEFAULT NULL,
  `members_add_user` int(20) DEFAULT NULL,
  `members_user_types` int(20) DEFAULT NULL,
  `members_add_usertype` int(20) DEFAULT NULL,
  `external_mainboard` int(20) NOT NULL,
  `external_presentation` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `org_previlige`
--

INSERT INTO `org_previlige` (`id`, `org_id`, `mainboard_access_main`, `mainboard_send_proposal`, `mainboard_change_article`, `mainboard_send_notification`, `mainboard_sending_out`, `mainboard_manually_archive`, `forum_access`, `forum_comments`, `forum_delete_won_comments`, `forum_delete_any_coments`, `forum_manual_comments`, `member_login_logout`, `member_change_profile`, `member_change_password`, `configuration_view_org`, `configuration_change_org`, `configuration_visibility`, `configuration_switching`, `configuration_create_address`, `communication_send_email`, `communication_send_sms`, `communication_send_letters`, `economics_register`, `economics_send_payment`, `economics_check_complete`, `economics_watch_total_income`, `economics_watch_total_cost`, `economics_watch_statistics`, `history_access_articles`, `history_access_comments`, `history_user_actions`, `history_old_letters`, `history_old_sms`, `history_old_emails`, `members_decide`, `members_add_change`, `members_c_group`, `members_add_user`, `members_user_types`, `members_add_usertype`, `external_mainboard`, `external_presentation`) VALUES
(16, 22, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1),
(19, 21, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, 1, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `org_profile_previlize`
--

CREATE TABLE IF NOT EXISTS `org_profile_previlize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(100) NOT NULL,
  `org_number` int(10) NOT NULL,
  `org_name` int(10) NOT NULL,
  `first_name` int(10) NOT NULL,
  `last_name` int(10) NOT NULL,
  `org_primary_address` int(10) NOT NULL,
  `org_optional_address` int(10) NOT NULL,
  `org_type` int(10) NOT NULL,
  `address` int(10) NOT NULL,
  `package_name` int(10) NOT NULL,
  `no_of_member` int(10) NOT NULL,
  `duration` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_amount` int(10) NOT NULL,
  `area_name` int(10) NOT NULL,
  `org_phone` int(10) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `email` int(10) NOT NULL,
  `photo1` int(10) NOT NULL,
  `credit_card_info` int(10) NOT NULL,
  `card_no` int(10) NOT NULL,
  `expire_date` int(10) NOT NULL,
  `person_number` int(10) NOT NULL,
  `cvv2_no` int(10) NOT NULL,
  `name_on_card` int(10) NOT NULL,
  `bank_info` int(10) NOT NULL,
  `username` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `org_profile_previlize`
--

INSERT INTO `org_profile_previlize` (`id`, `org_id`, `org_number`, `org_name`, `first_name`, `last_name`, `org_primary_address`, `org_optional_address`, `org_type`, `address`, `package_name`, `no_of_member`, `duration`, `amount`, `payment_amount`, `area_name`, `org_phone`, `phone_no`, `email`, `photo1`, `credit_card_info`, `card_no`, `expire_date`, `person_number`, `cvv2_no`, `name_on_card`, `bank_info`, `username`) VALUES
(5, 22, 1, 1, 2, 2, 2, 2, 0, 2, 1, 1, 1, 1, 0, 2, 2, 2, 2, 0, 0, 2, 2, 0, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `org_type`
--

CREATE TABLE IF NOT EXISTS `org_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_type` varchar(100) NOT NULL,
  `status` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `org_type`
--

INSERT INTO `org_type` (`id`, `org_type`, `status`) VALUES
(12, 'S', 2),
(13, 'Game1', 2),
(14, 'Sports', 2),
(16, 'Rrrr', 2),
(18, 'W123', 0),
(21, 'Dfdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(100) NOT NULL,
  `no_of_member` int(50) NOT NULL,
  `amount` int(20) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `duration` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `package_name`, `no_of_member`, `amount`, `currency`, `duration`) VALUES
(13, 'Dbs', 50, 5, 'GBP', 5),
(16, 'Sls1', 500, 20, 'GBP', 2),
(17, 'Eeee', 3, 3, 'USD', 3),
(18, 'Dd', 44, 4, 'EUR', 4),
(20, 'Dfdf', 33, 33, 'USD', 3);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL,
  `data` text COLLATE utf8_bin,
  PRIMARY KEY (`id`),
  KEY `roles_permissions_FK` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=4 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `data`) VALUES
(1, 7, 'a:2:{s:4:"edit";s:1:"1";s:6:"delete";s:1:"1";}'),
(2, 1, 'a:3:{s:3:"uri";a:1:{i:0;s:9:"/backend/";}s:4:"edit";s:1:"1";s:6:"delete";s:0:"";}'),
(3, 5, 'a:3:{s:3:"uri";a:1:{i:0;s:1:"/";}s:4:"edit";s:1:"1";s:6:"delete";s:0:"";}');

-- --------------------------------------------------------

--
-- Table structure for table `post_tbl`
--

CREATE TABLE IF NOT EXISTS `post_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `send_from` varchar(100) NOT NULL,
  `send_to` varchar(100) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `send_by_email` int(20) NOT NULL,
  `status` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `post_tbl`
--

INSERT INTO `post_tbl` (`id`, `send_from`, `send_to`, `post_id`, `send_by_email`, `status`) VALUES
(47, '10', '10', '17', 1, 2),
(46, '10', '9', '17', 1, 2),
(45, '10', '8', '17', 1, 2),
(44, '10', '7', '17', 1, 2),
(43, '10', '5', '17', 1, 2),
(42, '10', '4', '17', 1, 2),
(41, '10', '3', '17', 1, 2),
(40, '3', '3', '15', 1, 1),
(39, '3', '9', '15', 1, 1),
(38, '3', '8', '15', 1, 1),
(37, '3', '7', '15', 1, 1),
(36, '3', '5', '15', 1, 1),
(48, '4', '3', '31', 1, 2),
(49, '4', '5', '31', 1, 2),
(50, '4', '7', '31', 1, 2),
(51, '4', '8', '31', 1, 2),
(52, '4', '9', '31', 1, 2),
(53, '4', '10', '31', 1, 2),
(54, '4', '11', '31', 1, 2),
(55, '4', '21', '31', 1, 2),
(56, '4', '22', '31', 1, 2),
(57, '4', '32', '31', 1, 2),
(58, '4', '4', '31', 1, 2),
(59, '4', '3', '32', 1, 2),
(60, '4', '5', '32', 1, 2),
(61, '4', '7', '32', 1, 2),
(62, '4', '8', '32', 1, 2),
(63, '4', '9', '32', 1, 2),
(64, '4', '10', '32', 1, 2),
(65, '4', '11', '32', 1, 2),
(66, '4', '21', '32', 1, 2),
(67, '4', '22', '32', 1, 2),
(68, '4', '32', '32', 1, 2),
(69, '4', '4', '32', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC AUTO_INCREMENT=8 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `parent_id`, `name`) VALUES
(1, 0, 'User'),
(5, 0, 'Admin'),
(7, 0, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

CREATE TABLE IF NOT EXISTS `signature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `signature`
--

INSERT INTO `signature` (`id`, `org_id`, `content`) VALUES
(3, '22', 'rsociety');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_id` varchar(100) NOT NULL,
  `sms_content` text NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `sender_contact_no` varchar(100) NOT NULL,
  `receiver_contact_no` varchar(100) NOT NULL,
  `sender_status` int(50) NOT NULL COMMENT '1=org , 2=member',
  `org_id` varchar(100) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `sending_date` varchar(100) NOT NULL,
  `status` int(20) NOT NULL COMMENT '1=internal,2=external',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `sms_id`, `sms_content`, `sender_name`, `sender_contact_no`, `receiver_contact_no`, `sender_status`, `org_id`, `receiver_name`, `sending_date`, `status`) VALUES
(131, '121', 'ddd', '3', '8801922686268', '8801922686268', 2, '22', '3', '2012-04-03', 1),
(130, '120', 's', '3', '8801922686268', '8801922686268', 2, '22', '7', '2012-04-03', 2),
(129, '119', 'dfdf', '3', '8801922686268', '8801922686268', 2, '22', '3', '2012-04-03', 1),
(128, '119', 'dfdf', '3', '8801922686268', '8801922686268', 2, '22', '22', '2012-04-03', 1),
(127, '119', 'dfdf', '3', '8801922686268', '8801922686268', 2, '22', '21', '2012-04-03', 1),
(126, '118', 'dddd', '22', '46707448223', '8801922686268', 1, '22', '5', '2012-04-03', 2),
(125, '', 'welcome to association board', '22', '46707448223', '8801922686268', 1, '22', '3', '2012-04-03', 1),
(124, '117', 'welcome to association board', '22', '46707448223', '8801922686268', 1, '22', '22', '2012-04-03', 1),
(123, '117', 'welcome to association board', '22', '46707448223', '8801922686268', 1, '22', '21', '2012-04-03', 1),
(132, '123', 'hi', '22', 'rsociety', '8801922686268', 1, '22', '5', '2012-04-23', 2),
(133, '124', 'hi', '22', 'rsociety', '8801922686268', 1, '22', '5', '2012-04-23', 2),
(134, '125', 'hi', '22', 'rsociety', '8801922686268', 1, '22', '3', '2012-04-23', 1),
(135, '126', 'hellow', '22', 'rsociety', '8801673176511', 1, '22', '10', '2012-05-17', 2),
(136, '127', 'hellow', '22', 'rsociety', '8801922686268', 1, '22', '5', '2012-05-17', 2),
(137, '127', 'hellow', '22', 'rsociety', '3258788787', 1, '22', '6', '2012-05-17', 2),
(138, '127', 'hellow', '22', 'rsociety', '8801673176511', 1, '22', '10', '2012-05-17', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sms_request`
--

CREATE TABLE IF NOT EXISTS `sms_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_id` text NOT NULL,
  `sms_content` text NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `sender_contact_no` varchar(100) NOT NULL,
  `receiver_contact_no` varchar(100) NOT NULL,
  `sender_status` int(50) NOT NULL COMMENT '1=org , 2=member',
  `org_id` varchar(100) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `sending_date` varchar(100) NOT NULL,
  `status` int(20) NOT NULL COMMENT '1=internal,2=external',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `sms_request`
--

INSERT INTO `sms_request` (`id`, `sms_id`, `sms_content`, `sender_name`, `sender_contact_no`, `receiver_contact_no`, `sender_status`, `org_id`, `receiver_name`, `sending_date`, `status`) VALUES
(119, '', 'dfdf', '', '', '', 0, '', '', '', 0),
(118, '', 'dddd', '', '', '', 0, '', '', '', 0),
(117, '', 'welcome to association board', '', '', '', 0, '', '', '', 0),
(120, '', 's', '', '', '', 0, '', '', '', 0),
(121, '', 'ddd', '', '', '', 0, '', '', '', 0),
(122, '', 'hi', '', '', '', 0, '', '', '', 0),
(123, '', 'hi', '', '', '', 0, '', '', '', 0),
(124, '', 'hi', '', '', '', 0, '', '', '', 0),
(125, '', 'hi', '', '', '', 0, '', '', '', 0),
(126, '', 'hellow', '', '', '', 0, '', '', '', 0),
(127, '', 'hellow', '', '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `total_letter`
--

CREATE TABLE IF NOT EXISTS `total_letter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sending_date` varchar(100) NOT NULL,
  `sender_name` int(100) NOT NULL,
  `no_of_letter` int(100) NOT NULL,
  `letter_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `status` int(10) NOT NULL COMMENT '1=member,2=org',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `total_letter`
--

INSERT INTO `total_letter` (`id`, `sending_date`, `sender_name`, `no_of_letter`, `letter_id`, `org_id`, `status`) VALUES
(27, '2012-04-03', 0, 2, 75, 22, 2),
(26, '2012-04-03', 3, 4, 74, 22, 3),
(28, '2012-04-05', 3, 10, 76, 22, 2),
(29, '2012-05-19', 0, 11, 77, 22, 2),
(30, '2012-05-20', 3, 8, 78, 22, 2),
(31, '2012-05-20', 3, 3, 79, 22, 2);

-- --------------------------------------------------------

--
-- Table structure for table `total_sms`
--

CREATE TABLE IF NOT EXISTS `total_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sending_date` varchar(100) NOT NULL,
  `sender_name` int(100) NOT NULL,
  `no_of_sms` int(100) NOT NULL,
  `sms_id` int(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  `status` int(10) NOT NULL COMMENT '1=member,2=org',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `total_sms`
--

INSERT INTO `total_sms` (`id`, `sending_date`, `sender_name`, `no_of_sms`, `sms_id`, `org_id`, `status`) VALUES
(4, '2012-04-03', 0, 1, 118, 22, 2),
(3, '2012-04-03', 0, 3, 117, 22, 2),
(5, '2012-04-03', 3, 3, 119, 22, 1),
(6, '2012-04-03', 3, 1, 120, 22, 1),
(7, '2012-04-03', 3, 1, 121, 22, 1),
(8, '2012-04-23', 0, 1, 123, 22, 2),
(9, '2012-04-23', 0, 1, 124, 22, 2),
(10, '2012-04-23', 0, 1, 125, 22, 2),
(11, '2012-05-17', 0, 1, 126, 22, 2),
(12, '2012-05-17', 0, 3, 127, 22, 2),
(13, '2012-05-20', 3, 3, 0, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL DEFAULT '1',
  `name` varchar(300) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `newpass` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `newpass_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `newpass_time` datetime DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `roles_users_FK` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=35 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `last_name`, `username`, `password`, `email`, `banned`, `ban_reason`, `newpass`, `newpass_key`, `newpass_time`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 7, '', '', 'admin', '$1$MR1.l0/.$1WCjSW825zngPffCZ.YkL/', 'admin@aomeifootwerar.com', 0, NULL, NULL, NULL, NULL, '127.0.0.1', '2012-05-20 05:26:19', '2008-11-30 04:56:32', '2012-05-20 11:26:19'),
(31, 7, 'nur', '', 'nur', '$1$Fc5.qR3.$GOv2B9qgIWbPluryGF7EK/', 'nur2510@gmail.com', 0, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2011-12-07 05:16:11', '2011-12-08 11:16:11'),
(32, 5, 'dfdf', '', 'dfd', '$1$sk5.FE0.$lZRTf98VSwigU0mLAvneO0', 'a@g.com', 0, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2012-04-24 10:12:58', '2012-04-24 16:12:58'),
(33, 5, 'dfd', '', 'dfdf', '$1$Ws0.n01.$/BnZ5oEgY4JtV.AZyPpa7/', 'df@gmail.com', 0, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2012-04-24 10:18:44', '2012-04-24 16:18:44'),
(34, 5, 'dfd', '', 'fdfdfdfd', '$1$nA..kP/.$c6z0q7gwHvt/pwmw6u/sy1', 'a2@g.com', 0, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2012-04-24 10:20:29', '2012-04-24 16:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_autologin`
--

INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('4e26e3eb15045de648fbf21fcdcd3491', 13, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.14) Gecko/2009082707 Dealio Toolbar 3.1 Firefox/3.0.14', '61.74.87.253', '2009-11-20 00:41:17'),
('6b942e62f46e4f6767001ff109bee59b', 20, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.22) Gecko/20110902 Firefox/3.6.22', '127.0.0.1', '2011-09-09 08:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_back`
--

CREATE TABLE IF NOT EXISTS `user_back` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_back`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_number` int(100) NOT NULL,
  `org_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `org_primary_address` varchar(100) NOT NULL,
  `org_optional_address` varchar(100) NOT NULL,
  `org_type` int(40) NOT NULL,
  `role_id` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `package_name` int(20) NOT NULL,
  `payment_amount` int(100) NOT NULL,
  `area_name` int(20) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `org_phone` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo1` varchar(100) NOT NULL,
  `credit_card_info` varchar(100) NOT NULL,
  `card_no` varchar(100) NOT NULL,
  `expire_date` varchar(100) NOT NULL,
  `person_number` varchar(100) NOT NULL,
  `flag` int(10) NOT NULL,
  `cvv2_no` int(100) NOT NULL,
  `name_on_card` varchar(100) NOT NULL,
  `bank_info` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_receive_by` tinyint(10) NOT NULL,
  `payment_status` tinyint(10) NOT NULL,
  `approval_status` tinyint(10) NOT NULL,
  `login_status` tinyint(10) NOT NULL,
  `previlige_status` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `org_number`, `org_name`, `first_name`, `last_name`, `org_primary_address`, `org_optional_address`, `org_type`, `role_id`, `address`, `package_name`, `payment_amount`, `area_name`, `phone_no`, `org_phone`, `email`, `photo1`, `credit_card_info`, `card_no`, `expire_date`, `person_number`, `flag`, `cvv2_no`, `name_on_card`, `bank_info`, `password`, `username`, `password_receive_by`, `payment_status`, `approval_status`, `login_status`, `previlige_status`) VALUES
(21, 25, 'sports society', 'ahmed', 'ahmed', '545', '54', 0, 7, '45', 13, 5, 31, '46707448223', '54', 'nur25100@gmail.com', '', '', '454', '545', '300', 0, 45, '78', '', 'MTE3MDk=', 'nur65', 1, 1, 2, 2, 2),
(22, 56, 'rahid society', 'rahid', 'hasan', 'Test adress', '122/12/1', 13, 7, '258/258', 16, 20, 32, '46707448223', '017585', 'nur2510@gmail.com', '7b4c7d3edc177f6d736e2c35bba994f7.jpg', '', '12', '2012-01-05', '400', 1, 4545, '45', 'eeee', 'MDEyMzQ1Njc4OQ==', 'ahmed01', 1, 2, 2, 2, 2),
(32, 99, 't society', 'kamal', 'hossain', 'dfdf', 'dfdfd', 0, 7, 'dfdf', 13, 5, 37, '0123654', '0125858585', 'nur2510@gmail.com', '', '', '33', '2012-04-30', '57', 0, 33, '33', '', 'a2ExMTIzMTU5ODM5', 'kamal', 2, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_temp`
--

CREATE TABLE IF NOT EXISTS `user_temp` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL DEFAULT '1',
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activation_key` varchar(50) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `roles_usertemp_FK` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_temp`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(100) NOT NULL,
  `org_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`, `org_id`) VALUES
(4, 'Anonyms', 22),
(5, 'Administrative', 22),
(6, 'Software', 22);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE IF NOT EXISTS `zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id`, `zone`) VALUES
(32, 'Gulshan1'),
(31, 'Nikaton'),
(37, 'Sss'),
(35, 'Dfdfd'),
(36, 'Sdsds');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
