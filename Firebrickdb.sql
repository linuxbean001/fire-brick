
-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 166.62.8.52
-- Generation Time: Aug 30, 2019 at 05:24 AM
-- Server version: 5.5.51
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Firebrickdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `fb_blocks`
--

CREATE TABLE `fb_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `master_tag_id` varchar(11) NOT NULL,
  `meta_tag_id` varchar(50) NOT NULL,
  `task_assign_user` varchar(20) NOT NULL,
  `due_date_status` int(11) NOT NULL DEFAULT '0',
  `active_status` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `task_status` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `bucket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `BoardId` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '99999',
  `notify` int(11) NOT NULL DEFAULT '1',
  `task_deadline_time` time NOT NULL,
  `task_deadline_date` date NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `fb_blocks`
--

INSERT INTO `fb_blocks` VALUES(1, '', 'Three js', 'Hello\r\n', '5', '1,2,4', '3,4,2,5,8', 1, 1, 1, 0, 1, 5, 1, '1@admin.Firebrick', 3, 0, '11:32:00', '2018-06-28', '2018-06-05 08:04:25', '2019-08-29 20:35:09');
INSERT INTO `fb_blocks` VALUES(3, '', 'Node js', 'zxczxczx', '2', '3,1,4', '2,6,5,7,3,4', 1, 0, 1, 0, 1, 4, 1, '5@admin.Firebrick', 1, 0, '11:35:00', '2018-08-16', '2018-06-05 08:08:20', '2019-08-29 20:35:07');
INSERT INTO `fb_blocks` VALUES(4, '', 'HTML', 'cxzczxcz', '4', '3,6,1', '2,4,3,9', 0, 1, 1, 0, 1, 5, 1, '6@admin.Firebrick', 0, 0, '11:35:00', '2018-07-25', '2018-06-05 08:08:58', '2019-08-29 20:35:09');
INSERT INTO `fb_blocks` VALUES(5, '', 'CSS', '', '2', '', '4,2,3,38,40,44,9', 1, 0, 1, 0, 1, 2, 1, '5@admin.Firebrick', 0, 0, '12:31:00', '2018-07-27', '2018-07-03 09:02:27', '2019-08-29 20:35:06');
INSERT INTO `fb_blocks` VALUES(7, '', 'PHP', '', '5', '', '', 1, 0, 1, 0, 1, 5, 1, '7@admin.Firebrick', 5, 0, '11:19:00', '2018-07-26', '2018-07-12 07:49:45', '2019-08-29 20:35:09');
INSERT INTO `fb_blocks` VALUES(9, '', 'JAVA', '', '5', '', '4,5', 1, 0, 1, 0, 1, 5, 1, '9@admin.Firebrick', 2, 0, '01:04:00', '2018-07-18', '2018-07-17 09:35:36', '2019-08-29 20:35:09');
INSERT INTO `fb_blocks` VALUES(10, '', 'Archived Test', '', '5', '', '', 0, 0, 2, 1, 1, 4, 1, '10@admin.Firebrick', 3, 0, '01:50:00', '2018-07-18', '2018-07-17 10:21:22', '2018-07-17 13:38:10');
INSERT INTO `fb_blocks` VALUES(16, '', 'Hello', '', '5', '', '', 1, 0, 1, 1, 1, 5, 1, '16@admin.Firebrick', 4, 0, '01:15:00', '2018-08-04', '2018-07-18 09:45:52', '2019-08-29 20:35:09');
INSERT INTO `fb_blocks` VALUES(23, '', 'Test', '', '', '', '', 0, 1, 1, 0, 1, 4, 1, '23@admin.Firebrick', 2, 0, '03:06:00', '2018-07-22', '2018-07-21 11:36:34', '2019-08-29 20:35:08');
INSERT INTO `fb_blocks` VALUES(45, '5b62fc56a8ed7', 'Demo1', '', '', '', '4,5', 0, 0, 1, 1, 20, 0, 1, '45@admin.Firebrick', 99999, 1, '06:07:00', '2018-08-03', '2018-08-02 05:43:02', '2018-08-09 05:12:19');
INSERT INTO `fb_blocks` VALUES(46, '5b644e4bd96b0', 'dfgdf', 'dfvgdv', '', '3,4', '6,7,9,13', 0, 1, 1, 1, 1, 4, 1, '46@admin.Firebrick', 0, 0, '06:12:00', '2018-08-04', '2018-08-03 05:44:59', '2019-08-29 20:35:07');
INSERT INTO `fb_blocks` VALUES(47, '5ba1e7f97bc59', 'ttttttttttttttttttt', 'yyyyyyyyyyyyyyyyyyyyyyyyyyy', '3', '2,3,5', '4,5', 1, 1, 1, 0, 1, 5, 1, '5ba1e7f97bc59@admin.Firebrick', 1, 0, '11:38:00', '2018-09-20', '2018-09-18 11:08:57', '2019-08-29 20:35:09');
INSERT INTO `fb_blocks` VALUES(48, '5bd3822c23f26', 'tutyu', 'tfutftujf', '', '', '', 0, 1, 1, 1, 1, 4, 1, '5bd3822c23f26@admin.Firebrick', 3, 0, '08:04:00', '2018-10-28', '2018-10-26 02:07:56', '2019-08-29 20:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `fb_block_files`
--

CREATE TABLE `fb_block_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `ext` varchar(25) NOT NULL,
  `board_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `fb_block_files`
--

INSERT INTO `fb_block_files` VALUES(3, 'Hydrangeas.jpg', '.jpg', 3, 8, 1, '', '2018-06-19 08:34:30', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(4, 'Koala.jpg', '.jpg', 1, 9, 1, '', '2018-07-17 11:32:50', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(5, 'Tulips.jpg', '.jpg', 1, 1, 1, '', '2018-07-17 11:33:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(6, 'Hydrangeas.jpg', '.jpg', 1, 9, 1, '', '2018-07-18 09:10:51', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(7, 'Jellyfish.jpg', '.jpg', 1, 9, 1, '', '2018-07-18 09:13:37', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(8, 'Jellyfish.jpg', '.jpg', 1, 4, 1, '', '2018-07-18 09:14:45', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(9, 'firebrick PRD.pdf', '.pdf', 1, 9, 1, '', '2018-07-19 09:13:35', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(10, 'Firebrick server.docx', '.docx', 1, 4, 1, '', '2018-07-19 09:21:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(43, 'PHP codes', 'g_drive', 1, 1, 1, 'https://docs.google.com/document/d/12bMVzIzSwDAhWHK7j87rFP7HZkLsiizUrL8C7lIeH4o/edit?usp=drive_web', '2018-07-27 01:08:56', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(44, 'Untitled document', 'g_drive', 1, 1, 1, 'https://docs.google.com/document/d/1gBvLuQUemvu_bFjJkC9NyHR_-B8ePauvEMpdBOOfQts/edit?usp=drive_web', '2018-07-27 01:08:56', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(45, 'Google drive deatils', 'g_drive', 1, 1, 1, 'https://docs.google.com/document/d/155o5Tl0gvIui5diepQbAs8CKqN57eblsvWMS2WRu9No/edit?usp=drive_web', '2018-07-27 01:08:56', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(55, 'dilbar', 'link', 1, 1, 1, '$rootScope.bucket_list_data', '2018-07-30 01:39:13', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(56, 'link', 'link', 1, 1, 1, 'https://trello.com/c/t4KRkuWF/2-maje', '2018-07-30 01:40:03', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(57, 'sa', 'link', 1, 1, 1, 'as', '2018-07-30 02:59:40', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(58, 'google', 'link', 1, 7, 1, 'https://docs.google.com/document/d/11aJFVtJzl8LbY3Hz2u028fVRLNUCDEGiz0ShclSWthM/edit?ts=5b4f7bd1', '2018-07-31 03:15:39', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(59, '180511_Comments for upwork.pdf', 'g_drive', 1, 1, 1, 'https://drive.google.com/file/d/0BxXG2UuDKGTkUUFhVzJqWGJQZFpJcXhIRnliWnJub2w5cVNR/view?usp=drive_web', '2018-08-04 07:54:29', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(60, 'Mod4Lab.zip', 'g_drive', 1, 1, 1, 'https://drive.google.com/file/d/1QT7uWhmQUp8MLlSD-_fKeyaY6mML-tXb/view?usp=drive_web', '2018-08-04 07:54:29', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(61, 'Mod3Lab.zip', 'g_drive', 1, 1, 1, 'https://drive.google.com/file/d/1bd2cEU7cSyon5s2EqI3cLcHzWl0-GdwJ/view?usp=drive_web', '2018-08-04 07:54:29', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(62, '415Penguins.jpg', 'g_drive', 1, 23, 1, 'https://drive.google.com/file/d/1vaa-6UkaOQlm95lN6DganjKT6IrNoU3V/view?usp=drive_web', '2018-08-04 07:55:27', '0000-00-00 00:00:00');
INSERT INTO `fb_block_files` VALUES(63, 'PHP codes', 'g_drive', 1, 23, 1, 'https://docs.google.com/document/d/12bMVzIzSwDAhWHK7j87rFP7HZkLsiizUrL8C7lIeH4o/edit?usp=drive_web', '2018-08-04 07:55:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fb_block_stories`
--

CREATE TABLE `fb_block_stories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info` varchar(255) NOT NULL,
  `board_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=537 ;

--
-- Dumping data for table `fb_block_stories`
--

INSERT INTO `fb_block_stories` VALUES(22, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-08-01 04:14:26', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(23, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-08-01 04:14:27', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(24, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 04:58:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(25, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 04:58:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(26, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 04:58:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(27, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 04:58:09', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(28, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 04:58:09', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(29, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 04:58:10', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(30, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 04:58:10', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(31, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 04:58:11', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(32, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 04:58:11', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(33, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 04:58:12', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(34, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 04:58:12', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(35, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 04:58:13', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(36, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 04:58:14', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(37, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-08-02 05:27:44', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(38, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-08-02 05:27:45', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(39, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-08-02 05:27:45', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(40, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-08-02 05:27:46', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(41, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 05:27:47', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(42, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-08-02 05:27:47', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(43, 'Create Block', 20, 45, 1, 'fa fa-table', 1, '2018-08-02 05:43:02', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(44, 'Starred Block', 1, 23, 1, 'fa fa-table', 1, '2018-08-03 05:44:10', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(45, 'Starred Block', 1, 9, 1, 'fa fa-table', 1, '2018-08-03 05:44:13', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(46, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2018-08-03 05:44:28', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(47, 'Create Block', 1, 46, 1, 'fa fa-table', 1, '2018-08-03 05:44:59', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(48, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-08-03 05:46:34', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(49, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-08-03 05:46:36', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(50, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-08-03 05:46:37', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(51, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-08-03 06:02:59', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(52, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-08-03 06:03:00', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(53, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-08-03 06:03:01', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(54, 'Drag Block', 0, 3, 0, 'fa fa-table', 1, '2018-08-03 07:15:24', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(55, 'Update Block', 1, 1, 1, 'fa fa-table', 1, '2018-08-04 07:54:29', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(56, 'Update Block', 1, 23, 1, 'fa fa-table', 1, '2018-08-04 07:55:27', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(57, 'hello world', 1, 45, 1, 'fa fa-sticky-note', 3, '2018-08-09 05:12:19', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(58, 'Update Block', 1, 45, 1, 'fa fa-table', 1, '2018-08-09 05:12:19', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(59, 'Update Block', 1, 5, 1, 'fa fa-table', 1, '2018-08-09 05:54:56', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(60, 'hello world', 1, 4, 1, 'fa fa-sticky-note', 3, '2018-08-09 05:56:27', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(61, '@Raghav hello world', 1, 4, 1, 'fa fa-comment', 2, '2018-08-09 05:56:47', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(62, 'Update Block', 1, 4, 1, 'fa fa-table', 1, '2018-08-09 05:56:47', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(63, 'Archived Block', 1, 46, 1, 'fa fa-table', 1, '2018-08-09 06:23:03', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(64, 'Restore Block', 1, 46, 1, 'fa fa-table', 1, '2018-08-09 06:23:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(65, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2018-08-10 03:35:57', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(66, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2018-08-11 02:34:17', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(67, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-08-14 08:50:27', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(68, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-08-14 08:50:29', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(69, 'Drag Block', 0, 9, 0, 'fa fa-table', 1, '2018-08-17 07:06:55', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(70, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-08-20 03:20:26', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(71, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-08-20 03:20:29', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(72, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-08-20 03:20:32', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(73, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-08-20 03:20:34', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(74, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-08-20 11:34:42', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(75, 'Drag Block', 0, 23, 0, 'fa fa-table', 1, '2018-08-21 03:10:57', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(76, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-08-23 04:34:45', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(77, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-08-23 04:34:46', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(78, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2018-08-24 06:52:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(79, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2018-08-24 12:07:49', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(80, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-08-24 12:07:50', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(81, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2018-08-24 12:07:55', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(82, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-08-26 05:36:15', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(83, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2018-09-13 03:10:37', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(84, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-09-15 12:01:53', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(85, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-09-15 12:01:54', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(86, 'Create Block', 1, 47, 1, 'fa fa-table', 1, '2018-09-18 11:08:57', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(87, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-09-18 11:09:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(88, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-10-05 05:45:51', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(89, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2018-10-05 05:46:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(90, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2018-10-05 05:46:13', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(91, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-05 05:46:15', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(92, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-10-05 05:46:45', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(93, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-10-05 06:02:47', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(94, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-10-05 06:02:50', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(95, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-10-05 06:02:51', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(96, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-10-05 06:02:53', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(97, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2018-10-05 06:03:21', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(98, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-05 06:04:01', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(99, 'Drag Block', 3, 2, 1, 'fa fa-table', 1, '2018-10-05 06:05:31', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(100, 'Drag Block', 3, 2, 1, 'fa fa-table', 1, '2018-10-05 06:05:33', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(101, 'Drag Block', 3, 2, 1, 'fa fa-table', 1, '2018-10-05 06:05:35', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(102, 'Drag Block', 3, 7, 1, 'fa fa-table', 1, '2018-10-05 06:05:39', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(103, 'Drag Block', 3, 4, 1, 'fa fa-table', 1, '2018-10-05 06:05:41', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(104, 'Drag Block', 3, 3, 1, 'fa fa-table', 1, '2018-10-05 06:05:52', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(105, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-06 03:07:56', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(106, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-06 03:07:59', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(107, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2018-10-06 03:08:01', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(108, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2018-10-06 03:08:08', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(109, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-10-06 03:08:10', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(110, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-10-06 03:08:12', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(111, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-10-06 03:10:29', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(112, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-10-06 03:10:34', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(113, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-10-06 03:10:43', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(114, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-10-06 03:10:44', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(115, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-10-06 03:11:18', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(116, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-10-06 03:11:25', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(117, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-10-06 03:11:28', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(118, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-10-06 03:11:29', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(119, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-10-06 03:11:32', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(120, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2018-10-06 03:26:40', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(121, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-23 07:15:52', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(122, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-23 07:15:53', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(123, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-23 07:15:54', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(124, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-23 07:15:54', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(125, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-23 07:15:55', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(126, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-10-23 07:15:56', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(127, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-10-23 07:15:57', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(128, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-23 07:15:58', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(129, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-23 07:15:59', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(130, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-23 07:15:59', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(131, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-23 07:16:00', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(132, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-23 07:16:01', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(133, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-23 07:16:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(134, 'Archived Block', 1, 1, 1, 'fa fa-table', 1, '2018-10-23 07:16:15', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(135, 'Restore Block', 1, 1, 1, 'fa fa-table', 1, '2018-10-23 07:16:18', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(136, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-26 07:21:39', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(137, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-10-26 07:21:40', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(138, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-10-26 02:02:08', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(139, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-26 02:04:20', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(140, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-26 02:04:22', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(141, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-26 02:04:24', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(142, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-26 02:05:12', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(143, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-26 02:05:13', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(144, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-26 02:05:17', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(145, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-26 02:05:21', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(146, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-10-26 02:05:21', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(147, 'Create Block', 1, 48, 1, 'fa fa-table', 1, '2018-10-26 02:07:56', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(148, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2018-10-27 06:41:45', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(149, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2018-10-27 06:41:46', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(150, 'Unstarred Block', 1, 23, 1, 'fa fa-table', 1, '2018-10-27 06:41:52', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(151, 'Starred Block', 1, 23, 1, 'fa fa-table', 1, '2018-10-27 06:41:53', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(152, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2018-11-05 11:14:45', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(153, 'Drag Block', 1, 1, 8, 'fa fa-table', 1, '2018-11-12 10:57:50', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(154, 'Drag Block', 1, 1, 8, 'fa fa-table', 1, '2018-11-12 10:57:51', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(155, 'Drag Block', 1, 1, 8, 'fa fa-table', 1, '2018-11-12 10:58:00', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(156, 'Drag Block', 1, 48, 8, 'fa fa-table', 1, '2018-11-12 10:58:02', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(157, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-11-12 02:10:32', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(158, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2018-11-14 09:09:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(159, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2018-11-14 09:09:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(160, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-11-20 10:45:39', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(161, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-11-20 10:45:44', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(162, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-11-22 07:02:52', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(163, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-11-22 07:02:53', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(164, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-11-22 07:02:54', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(165, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-11-22 07:02:55', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(166, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-11-22 07:03:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(167, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-11-22 07:03:39', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(168, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2018-11-29 04:10:00', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(169, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-11-29 04:10:08', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(170, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-11-29 04:10:09', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(171, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-11-29 04:10:10', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(172, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2018-12-04 01:39:28', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(173, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-12-14 10:19:34', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(174, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2018-12-14 10:19:35', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(175, 'Starred Block', 1, 16, 1, 'fa fa-table', 1, '2018-12-14 10:19:37', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(176, 'Unstarred Block', 1, 16, 1, 'fa fa-table', 1, '2018-12-14 10:19:38', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(177, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2018-12-14 10:19:38', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(178, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2018-12-16 04:12:49', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(179, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-01-04 02:52:52', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(180, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-01-09 06:32:00', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(181, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-01-09 06:32:01', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(182, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-01-09 06:32:01', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(183, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-01-09 06:32:02', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(184, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-01-09 06:32:02', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(185, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-01-09 06:32:03', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(186, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-01-09 06:32:04', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(187, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-01-09 06:32:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(188, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-01-09 06:32:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(189, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-01-09 06:32:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(190, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-01-09 06:32:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(191, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-01-09 06:32:08', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(192, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-01-09 06:32:09', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(193, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-01-09 06:32:11', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(194, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-01-09 06:32:12', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(195, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-01-09 06:32:12', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(196, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-01-09 06:32:13', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(197, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-02-03 06:39:49', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(198, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-02-03 06:39:53', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(199, 'ghh', 1, 1, 1, 'fa fa-sticky-note', 3, '2019-02-03 06:41:47', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(200, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-02-03 06:42:28', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(201, 'Starred Block', 1, 47, 1, 'fa fa-table', 1, '2019-02-03 06:42:31', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(202, 'Unstarred Block', 1, 47, 1, 'fa fa-table', 1, '2019-02-03 06:42:32', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(203, 'Archived Block', 1, 47, 1, 'fa fa-table', 1, '2019-02-03 06:43:18', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(204, 'Restore Block', 1, 47, 1, 'fa fa-table', 1, '2019-02-03 06:43:21', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(205, 'Archived Block', 1, 47, 1, 'fa fa-table', 1, '2019-02-03 06:43:34', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(206, 'Restore Block', 1, 47, 1, 'fa fa-table', 1, '2019-02-03 06:43:37', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(207, 'Starred Block', 1, 47, 1, 'fa fa-table', 1, '2019-02-05 02:47:14', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(208, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-02-05 02:47:15', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(209, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-02-05 02:47:16', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(210, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-02-05 02:47:17', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(211, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-02-05 02:47:18', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(212, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-02-06 08:27:28', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(213, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-02-06 08:27:31', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(214, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-02-14 11:28:34', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(215, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-02-14 11:28:35', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(216, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-02-14 11:28:38', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(217, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-02-22 05:16:24', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(218, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-02-23 03:37:13', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(219, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-03-16 04:39:29', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(220, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-03-16 04:40:31', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(221, 'Starred Block', 1, 48, 1, 'fa fa-table', 1, '2019-03-16 04:40:33', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(222, 'Unstarred Block', 1, 48, 1, 'fa fa-table', 1, '2019-03-16 04:40:34', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(223, 'Archived Block', 1, 3, 1, 'fa fa-table', 1, '2019-03-16 04:40:45', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(224, 'Restore Block', 1, 3, 1, 'fa fa-table', 1, '2019-03-16 04:40:48', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(225, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-03-29 09:07:50', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(226, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-03-29 09:07:53', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(227, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-03-29 09:07:54', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(228, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-04-07 04:35:40', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(229, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-04-07 04:35:42', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(230, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-04-07 04:35:43', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(231, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-04-07 04:35:44', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(232, 'Drag Block', 2, 2, 1, 'fa fa-table', 1, '2019-04-16 03:07:45', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(233, 'Drag Block', 2, 2, 1, 'fa fa-table', 1, '2019-04-16 03:07:57', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(234, 'Drag Block', 2, 2, 1, 'fa fa-table', 1, '2019-04-16 03:08:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(235, 'Drag Block', 2, 2, 1, 'fa fa-table', 1, '2019-04-16 03:08:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(236, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-04-29 02:25:11', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(237, 'Drag Block', 11, 48, 1, 'fa fa-table', 1, '2019-04-29 02:25:17', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(238, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-04-29 11:50:35', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(239, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-04-29 11:50:36', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(240, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-04-29 11:50:42', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(241, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-04-29 11:50:43', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(242, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-04-29 11:50:44', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(243, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-04-29 11:50:44', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(244, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-04-29 11:50:46', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(245, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-04-29 11:50:47', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(246, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-04-29 11:50:47', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(247, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-04-29 11:50:49', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(248, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-04-29 11:50:50', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(249, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-04-29 11:51:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(250, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-04-30 12:49:57', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(251, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-04-30 12:56:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(252, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-04-30 12:56:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(253, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-04-30 12:56:09', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(254, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-04-30 12:56:10', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(255, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-04-30 12:56:12', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(256, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-04-30 12:56:13', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(257, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-04-30 12:56:16', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(258, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-04-30 12:56:17', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(259, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-05-14 04:06:59', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(260, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-05-14 04:07:00', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(261, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-05-14 04:07:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(262, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-05-14 04:07:42', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(263, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-05-14 04:07:43', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(264, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2019-05-14 08:06:01', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(265, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2019-05-14 08:06:04', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(266, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-05-18 07:33:15', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(267, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-05-19 02:15:11', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(268, 'Starred Block', 1, 48, 1, 'fa fa-table', 1, '2019-05-25 04:06:34', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(269, 'Unstarred Block', 1, 48, 1, 'fa fa-table', 1, '2019-05-25 04:06:36', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(270, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-05-25 04:06:38', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(271, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-05-25 04:06:49', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(272, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-05-25 04:06:52', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(273, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-05-27 01:57:37', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(274, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-06-12 07:40:02', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(275, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-06-13 11:02:33', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(276, 'Drag Block', 1, 4, 1, 'fa fa-table', 1, '2019-06-13 11:02:46', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(277, 'Unstarred Block', 1, 47, 1, 'fa fa-table', 1, '2019-06-13 11:03:00', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(278, 'Starred Block', 1, 47, 1, 'fa fa-table', 1, '2019-06-13 11:03:02', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(279, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-06-19 03:54:57', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(280, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-06-19 04:00:11', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(281, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-06-19 04:00:42', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(282, 'Update Block', 1, 9, 1, 'fa fa-table', 1, '2019-06-19 04:00:57', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(283, 'Update Block', 1, 9, 1, 'fa fa-table', 1, '2019-06-19 04:01:16', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(284, 'Unstarred Block', 1, 9, 1, 'fa fa-table', 1, '2019-06-19 04:01:21', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(285, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-06-19 04:01:32', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(286, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-06-19 04:01:34', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(287, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2019-06-20 03:21:53', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(288, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-06-20 03:21:59', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(289, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-06-20 03:22:01', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(290, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-01 01:39:21', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(291, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-01 01:39:22', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(292, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-01 01:39:23', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(293, 'Drag Block', 3, 8, 1, 'fa fa-table', 1, '2019-08-01 01:40:15', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(294, 'Drag Block', 3, 11, 1, 'fa fa-table', 1, '2019-08-01 01:40:22', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(295, 'Drag Block', 3, 11, 1, 'fa fa-table', 1, '2019-08-01 02:08:43', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(296, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-05 06:14:10', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(297, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-06 01:13:36', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(298, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-08 07:32:27', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(299, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-08 07:32:28', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(300, 'Drag Block', 1, 4, 1, 'fa fa-table', 1, '2019-08-08 07:32:36', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(301, 'Starred Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-08 07:32:39', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(302, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 04:49:04', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(303, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 04:49:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(304, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 04:49:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(305, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 04:49:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(306, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 04:49:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(307, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 04:49:08', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(308, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 04:49:10', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(309, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 04:49:14', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(310, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 04:49:16', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(311, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 04:49:16', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(312, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 04:49:17', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(313, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 04:49:18', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(314, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 04:49:20', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(315, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 04:49:21', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(316, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 04:49:22', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(317, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 04:49:23', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(318, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 04:52:57', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(319, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 04:52:58', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(320, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 04:52:58', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(321, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 04:52:58', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(322, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 04:52:59', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(323, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 04:53:01', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(324, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 04:53:01', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(325, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 04:53:02', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(326, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 04:55:33', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(327, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 04:55:34', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(328, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 04:55:35', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(329, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 04:55:35', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(330, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 04:55:36', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(331, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 04:55:37', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(332, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 04:57:40', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(333, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 04:57:41', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(334, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 04:57:41', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(335, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 04:57:42', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(336, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 04:57:43', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(337, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 04:57:43', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(338, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 04:57:44', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(339, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 05:13:23', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(340, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 05:13:24', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(341, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 05:13:24', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(342, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 05:13:24', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(343, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 05:13:25', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(344, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 05:13:26', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(345, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 05:13:26', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(346, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 05:13:27', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(347, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 05:40:04', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(348, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 05:40:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(349, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 05:40:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(350, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 05:40:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(351, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 05:40:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(352, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 05:40:08', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(353, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 05:40:08', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(354, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 05:40:08', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(355, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 05:40:09', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(356, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 05:40:10', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(357, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 05:42:08', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(358, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 05:42:09', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(359, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 05:42:11', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(360, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 05:42:12', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(361, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 05:44:26', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(362, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 05:44:27', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(363, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 05:44:28', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(364, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 05:44:29', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(365, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 05:44:29', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(366, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 05:44:30', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(367, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 05:44:31', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(368, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 05:57:16', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(369, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 05:57:16', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(370, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 05:57:17', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(371, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 05:57:17', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(372, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 05:57:18', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(373, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 05:57:19', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(374, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 05:57:20', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(375, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 05:57:21', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(376, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 06:04:12', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(377, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 06:04:13', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(378, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 06:04:14', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(379, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 06:04:14', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(380, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 06:04:15', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(381, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 06:04:16', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(382, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 06:04:17', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(383, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 06:04:18', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(384, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 06:04:18', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(385, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 06:04:19', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(386, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 06:04:20', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(387, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 06:04:21', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(388, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 06:04:22', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(389, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 06:04:22', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(390, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 06:22:50', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(391, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 06:22:50', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(392, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 06:22:51', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(393, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 06:22:52', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(394, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 06:22:52', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(395, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 06:22:53', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(396, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 06:22:54', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(397, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 06:22:54', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(398, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 06:22:55', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(399, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 06:40:15', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(400, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 06:40:16', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(401, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 06:40:16', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(402, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 06:40:17', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(403, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 06:40:18', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(404, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 06:40:18', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(405, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 06:40:19', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(406, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 06:42:14', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(407, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 06:42:15', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(408, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 06:42:15', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(409, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 06:44:00', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(410, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 06:44:00', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(411, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 06:44:01', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(412, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 06:44:02', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(413, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 06:44:03', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(414, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 07:03:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(415, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 07:03:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(416, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 07:03:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(417, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 07:03:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(418, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 07:03:08', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(419, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 07:03:09', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(420, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 07:03:09', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(421, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 07:03:10', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(422, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 07:03:10', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(423, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 07:05:08', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(424, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 07:05:09', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(425, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 07:05:10', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(426, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 07:05:11', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(427, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-28 07:28:42', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(428, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 07:28:43', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(429, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 07:28:44', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(430, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 07:28:45', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(431, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 07:28:46', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(432, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 07:28:47', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(433, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 07:39:23', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(434, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 07:39:24', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(435, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 07:39:25', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(436, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 07:39:26', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(437, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 07:39:26', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(438, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 07:39:27', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(439, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 07:39:28', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(440, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 07:41:31', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(441, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 07:41:32', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(442, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 07:41:33', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(443, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-28 07:41:33', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(444, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 07:41:33', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(445, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 07:41:34', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(446, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 07:41:35', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(447, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-28 07:43:36', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(448, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-28 07:45:02', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(449, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 07:45:02', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(450, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 07:45:02', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(451, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 07:45:03', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(452, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-28 07:45:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(453, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-28 07:45:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(454, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 07:45:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(455, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-28 07:45:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(456, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-28 07:45:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(457, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2019-08-28 07:46:11', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(458, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-28 07:47:35', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(459, 'Drag Block', 1, 4, 1, 'fa fa-table', 1, '2019-08-29 12:22:40', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(460, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2019-08-29 12:22:42', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(461, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-29 12:22:42', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(462, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-29 12:22:44', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(463, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-29 12:25:55', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(464, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-29 12:25:55', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(465, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-29 12:25:56', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(466, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-29 12:25:57', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(467, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-29 12:25:58', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(468, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-29 12:26:00', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(469, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-29 05:38:41', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(470, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-29 05:38:42', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(471, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-29 05:38:43', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(472, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2019-08-29 05:38:44', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(473, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-29 05:38:45', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(474, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-29 05:38:46', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(475, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-29 05:40:53', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(476, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-29 05:40:55', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(477, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-29 05:40:56', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(478, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2019-08-29 05:42:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(479, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-29 05:42:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(480, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-29 05:42:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(481, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-29 05:43:34', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(482, 'Drag Block', 1, 4, 1, 'fa fa-table', 1, '2019-08-29 05:48:03', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(483, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2019-08-29 05:48:04', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(484, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-29 05:48:05', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(485, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2019-08-29 05:48:07', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(486, 'Drag Block', 1, 4, 1, 'fa fa-table', 1, '2019-08-29 05:48:08', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(487, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-29 05:50:21', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(488, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-29 05:50:21', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(489, 'Drag Block', 1, 46, 1, 'fa fa-table', 1, '2019-08-29 05:50:22', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(490, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-29 05:52:48', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(491, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-29 05:52:49', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(492, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-29 05:52:52', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(493, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-29 05:52:53', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(494, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-29 05:52:54', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(495, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-29 06:19:01', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(496, 'Drag Block', 1, 4, 1, 'fa fa-table', 1, '2019-08-29 06:19:02', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(497, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-29 06:19:03', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(498, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2019-08-29 06:19:04', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(499, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-29 06:19:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(500, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-29 06:20:14', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(501, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-29 06:20:14', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(502, 'Archived Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-29 06:36:11', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(503, 'Restore Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-29 06:36:13', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(504, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2019-08-29 06:36:15', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(505, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-29 06:36:16', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(506, 'Drag Block', 1, 4, 1, 'fa fa-table', 1, '2019-08-29 06:36:17', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(507, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-29 06:36:18', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(508, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-29 06:36:18', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(509, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-29 06:36:19', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(510, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-29 06:36:19', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(511, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-29 06:36:20', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(512, 'Drag Block', 0, 47, 0, 'fa fa-table', 1, '2019-08-29 07:12:10', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(513, 'Drag Block', 0, 46, 0, 'fa fa-table', 1, '2019-08-29 07:12:11', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(514, 'Drag Block', 0, 1, 0, 'fa fa-table', 1, '2019-08-29 07:12:12', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(515, 'Drag Block', 0, 4, 0, 'fa fa-table', 1, '2019-08-29 07:12:13', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(516, 'Drag Block', 0, 5, 0, 'fa fa-table', 1, '2019-08-29 07:12:13', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(517, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-29 07:19:38', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(518, 'Drag Block', 1, 3, 1, 'fa fa-table', 1, '2019-08-29 07:19:40', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(519, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2019-08-29 07:19:41', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(520, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-29 07:19:43', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(521, 'Drag Block', 1, 5, 1, 'fa fa-table', 1, '2019-08-29 07:19:43', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(522, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-29 07:19:45', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(523, 'Drag Block', 1, 4, 1, 'fa fa-table', 1, '2019-08-29 07:25:52', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(524, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-29 07:25:53', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(525, 'Drag Block', 1, 23, 1, 'fa fa-table', 1, '2019-08-29 07:25:54', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(526, 'Drag Block', 1, 47, 1, 'fa fa-table', 1, '2019-08-29 07:25:55', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(527, 'Drag Block', 1, 1, 1, 'fa fa-table', 1, '2019-08-29 07:25:56', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(528, 'Drag Block', 1, 16, 1, 'fa fa-table', 1, '2019-08-29 07:25:57', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(529, 'Drag Block', 1, 7, 1, 'fa fa-table', 1, '2019-08-29 07:25:57', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(530, 'Drag Block', 1, 4, 1, 'fa fa-table', 1, '2019-08-29 08:34:27', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(531, 'Starred Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-29 08:35:02', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(532, 'Drag Block', 1, 48, 1, 'fa fa-table', 1, '2019-08-29 08:35:06', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(533, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-29 08:35:08', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(534, 'Drag Block', 1, 9, 1, 'fa fa-table', 1, '2019-08-29 08:35:09', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(535, 'Drag Block', 2, 8, 1, 'fa fa-table', 1, '2019-08-29 08:35:22', '0000-00-00 00:00:00');
INSERT INTO `fb_block_stories` VALUES(536, 'Drag Block', 2, 8, 1, 'fa fa-table', 1, '2019-08-29 08:35:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fb_boards`
--

CREATE TABLE `fb_boards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `fb_boards`
--

INSERT INTO `fb_boards` VALUES(1, '', 'Test123', 1, 0, '2018-07-23 23:04:46', '2019-08-08 07:32:54');
INSERT INTO `fb_boards` VALUES(11, '5b6182407bbf0', 'Agile Scrum', 1, 0, '2018-08-01 11:49:52', '2018-08-01 12:35:37');
INSERT INTO `fb_boards` VALUES(20, '5b619498422cd', 'Test', 1, 0, '2018-08-01 01:08:08', '0000-00-00 00:00:00');
INSERT INTO `fb_boards` VALUES(22, '5b9a37c419332', 'test', 1, 0, '2018-09-13 03:11:16', '0000-00-00 00:00:00');
INSERT INTO `fb_boards` VALUES(23, '5ba9e88f58ea8', 'terteyrtew', 1, 0, '2018-09-25 12:49:35', '0000-00-00 00:00:00');
INSERT INTO `fb_boards` VALUES(24, '5ba9e8ca4337e', 'fgdfgdfg', 1, 0, '2018-09-25 12:50:34', '0000-00-00 00:00:00');
INSERT INTO `fb_boards` VALUES(25, '5bd38203a63ee', 'testaaww', 1, 0, '2018-10-26 02:07:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fb_buckets`
--

CREATE TABLE `fb_buckets` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL,
  `lock_status` int(11) NOT NULL DEFAULT '0',
  `is_hide` int(11) NOT NULL DEFAULT '0',
  `board_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Create_date` datetime NOT NULL,
  `Update_date` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `fb_buckets`
--

INSERT INTO `fb_buckets` VALUES(1, 'New Bucket', 1, 0, 0, 1, 1, '2018-05-31 08:11:37', '2018-06-26 12:57:29');
INSERT INTO `fb_buckets` VALUES(2, 'IceBox', 1, 0, 0, 1, 1, '2018-05-31 08:11:42', '2019-08-04 11:53:09');
INSERT INTO `fb_buckets` VALUES(4, 'Doing', 1, 0, 0, 1, 1, '2018-05-31 08:11:50', '2019-06-13 23:02:56');
INSERT INTO `fb_buckets` VALUES(5, 'Done', 1, 0, 0, 1, 1, '2018-06-01 07:48:20', '2018-12-04 01:39:36');
INSERT INTO `fb_buckets` VALUES(8, 'Test', 1, 0, 0, 1, 1, '2018-07-21 11:37:07', '2018-07-23 16:22:45');
INSERT INTO `fb_buckets` VALUES(11, 'Hello', 1, 0, 0, 9, 1, '2018-08-01 08:36:06', '0000-00-00 00:00:00');
INSERT INTO `fb_buckets` VALUES(14, 'New Bucket', 1, 0, 0, 11, 1, '2018-08-01 11:49:52', '0000-00-00 00:00:00');
INSERT INTO `fb_buckets` VALUES(43, 'New Bucket', 1, 0, 0, 20, 1, '2018-08-01 01:08:08', '0000-00-00 00:00:00');
INSERT INTO `fb_buckets` VALUES(44, 'Test 1', 1, 0, 0, 20, 1, '2018-08-02 05:42:53', '0000-00-00 00:00:00');
INSERT INTO `fb_buckets` VALUES(46, 'New Bucket', 1, 0, 0, 22, 1, '2018-09-13 03:11:16', '0000-00-00 00:00:00');
INSERT INTO `fb_buckets` VALUES(47, 'New Bucket', 1, 0, 0, 23, 1, '2018-09-25 12:49:35', '0000-00-00 00:00:00');
INSERT INTO `fb_buckets` VALUES(48, 'New Bucket', 1, 0, 0, 24, 1, '2018-09-25 12:50:34', '0000-00-00 00:00:00');
INSERT INTO `fb_buckets` VALUES(49, 'New Bucket', 1, 0, 0, 25, 1, '2018-10-26 02:07:15', '0000-00-00 00:00:00');
INSERT INTO `fb_buckets` VALUES(50, '111', 1, 0, 0, 0, 8, '2018-11-12 10:57:24', '0000-00-00 00:00:00');
INSERT INTO `fb_buckets` VALUES(52, 'terwtewrewrewrwe', 1, 0, 0, 1, 1, '2019-02-03 06:44:21', '2019-02-03 06:44:30');
INSERT INTO `fb_buckets` VALUES(53, 'saddfr', 1, 0, 0, 1, 1, '2019-05-25 04:06:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fb_metatag`
--

CREATE TABLE `fb_metatag` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL,
  `color` varchar(10) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Create_date` datetime NOT NULL,
  `Update_date` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `fb_metatag`
--

INSERT INTO `fb_metatag` VALUES(1, 'urgent', 1, '#F7F9F9', 1, '2018-06-05 07:48:09', '0000-00-00 00:00:00');
INSERT INTO `fb_metatag` VALUES(2, 'call', 1, '#ABB2B9', 1, '2018-06-05 07:48:09', '0000-00-00 00:00:00');
INSERT INTO `fb_metatag` VALUES(3, 'invioce', 1, '#EDBB99', 1, '2018-06-05 07:54:50', '0000-00-00 00:00:00');
INSERT INTO `fb_metatag` VALUES(4, 'demo 2', 1, '#E5E7E9', 1, '2018-06-05 07:56:53', '0000-00-00 00:00:00');
INSERT INTO `fb_metatag` VALUES(5, 'test 1', 1, '#A3E4D7', 1, '2018-06-05 07:59:00', '0000-00-00 00:00:00');
INSERT INTO `fb_metatag` VALUES(6, 'test 2', 1, '#F5CBA7', 1, '2018-06-05 07:59:41', '0000-00-00 00:00:00');
INSERT INTO `fb_metatag` VALUES(7, 'demo1', 1, '#A9CCE3', 1, '2018-06-05 11:14:33', '0000-00-00 00:00:00');
INSERT INTO `fb_metatag` VALUES(8, 'test 3', 1, '#EDBB99', 1, '2018-06-05 11:14:33', '0000-00-00 00:00:00');
INSERT INTO `fb_metatag` VALUES(9, 'test 4\r\n', 1, '#EDBB99', 1, '2018-06-06 12:56:05', '0000-00-00 00:00:00');
INSERT INTO `fb_metatag` VALUES(10, 'test 5', 1, '#AED6F1', 1, '2018-06-12 10:42:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fb_person_bucket`
--

CREATE TABLE `fb_person_bucket` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL,
  `color` varchar(10) NOT NULL,
  `special_id` int(11) NOT NULL DEFAULT '0',
  `lock_status` int(11) NOT NULL DEFAULT '0',
  `is_hide` int(11) NOT NULL DEFAULT '0',
  `User_id` int(11) NOT NULL,
  `Create_date` datetime NOT NULL,
  `Update_date` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fb_person_bucket`
--

INSERT INTO `fb_person_bucket` VALUES(2, 'Designer', 1, '', 0, 0, 0, 1, '2018-05-31 08:06:25', '2018-07-21 08:19:54');
INSERT INTO `fb_person_bucket` VALUES(3, 'Developer', 1, '', 0, 0, 0, 1, '2018-05-31 08:07:47', '2018-06-26 13:32:00');
INSERT INTO `fb_person_bucket` VALUES(4, 'Imported contacts', 1, 'tag1', 1, 0, 0, 1, '2018-06-01 09:40:14', '2018-07-21 08:20:00');
INSERT INTO `fb_person_bucket` VALUES(5, 'Internal Stackholder', 1, 'tag2', 1, 0, 0, 1, '2018-06-01 09:40:31', '0000-00-00 00:00:00');
INSERT INTO `fb_person_bucket` VALUES(6, 'External Stackholder', 1, 'tag3', 1, 0, 0, 1, '2018-06-01 09:40:52', '2018-07-21 08:19:45');
INSERT INTO `fb_person_bucket` VALUES(7, 'Tester', 1, '', 0, 0, 0, 1, '2018-06-01 09:51:49', '0000-00-00 00:00:00');
INSERT INTO `fb_person_bucket` VALUES(8, 'Sale team', 1, '', 0, 0, 0, 2, '2018-06-01 10:09:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fb_per_blocks`
--

CREATE TABLE `fb_per_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `master_tag_id` varchar(11) NOT NULL,
  `meta_tag_id` varchar(11) NOT NULL,
  `task_assign_user` varchar(20) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0',
  `due_date_status` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `task_status` int(11) NOT NULL DEFAULT '0',
  `bucket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `perId` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '9999',
  `notify` int(11) NOT NULL DEFAULT '1',
  `task_deadline_date` date NOT NULL,
  `task_deadline_time` time NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `fb_per_blocks`
--

INSERT INTO `fb_per_blocks` VALUES(2, 'Arjun', 'xcvxcvxcvxcvxcvxvxcv', '2', '1,2', '1', 1, 0, 1, 1, 7, 1, '', 1, 0, '2018-06-27', '11:30:00', '2018-06-05 07:55:56', '2019-04-16 03:08:06');
INSERT INTO `fb_per_blocks` VALUES(3, 'Ankit', 'nvbnvbnvbnvbnvbn', '2', '1,3,4', '1,2', 1, 0, 1, 0, 3, 1, '', 1, 0, '2018-06-22', '11:30:00', '2018-06-05 07:56:53', '2019-08-29 20:35:22');
INSERT INTO `fb_per_blocks` VALUES(4, 'Raghav', 'vcxvxcvcxvxcvcxvxcvxc', '2', '1,2,4', '1,3', 1, 0, 1, 0, 3, 1, '', 0, 0, '2018-06-23', '11:30:00', '2018-06-05 07:57:38', '2019-08-29 20:35:22');
INSERT INTO `fb_per_blocks` VALUES(5, 'pradeep', 'nmnbmnbmnbmnbmb', '3', '3,5', '2,4', 1, 0, 1, 0, 7, 1, '', 0, 0, '2018-06-28', '11:30:00', '2018-06-05 08:01:33', '2019-04-16 03:08:05');
INSERT INTO `fb_per_blocks` VALUES(6, 'chetan', 'cvxcvcxv', '6', '1,3', '5,3', 1, 0, 1, 0, 8, 1, '', 0, 1, '2018-06-20', '11:45:00', '2018-06-05 08:02:17', '2018-07-03 08:34:26');
INSERT INTO `fb_per_blocks` VALUES(7, 'varun', 'cvxcvxcvxcvvcvxc', '7', '5,3,2', '2,6,4', 1, 0, 1, 0, 3, 1, '', 3, 0, '2018-06-28', '11:45:00', '2018-06-05 08:02:57', '2019-08-29 20:35:22');
INSERT INTO `fb_per_blocks` VALUES(8, 'vivek', 'cvxcvxcvxcvvcvxc', '6', '5,3,2', '2,6,4,3', 0, 0, 1, 0, 2, 1, '', 4, 0, '2018-06-19', '11:45:00', '2018-06-05 08:03:21', '2019-08-29 20:35:23');
INSERT INTO `fb_per_blocks` VALUES(9, 'Suresh', 'cvxcvxcvxcvvcvxc', '2', '5,3,2,4', '2,6,4', 1, 0, 1, 0, 3, 1, '', 2, 0, '2018-06-19', '11:45:00', '2018-06-05 08:03:40', '2019-08-29 20:35:22');
INSERT INTO `fb_per_blocks` VALUES(13, 'Manish', 'test', '2', '1,4,5', '', 0, 0, 1, 0, 8, 1, '13@admin.Firebrick', 1, 0, '2018-06-20', '01:30:00', '2018-06-06 09:56:13', '2019-02-03 06:48:41');
INSERT INTO `fb_per_blocks` VALUES(37, 'first', '', '', '', '', 0, 0, 1, 1, 4, 1, '37@admin.Firebrick', 0, 0, '2018-07-21', '04:28:00', '2018-07-20 12:58:22', '2018-07-21 14:57:45');
INSERT INTO `fb_per_blocks` VALUES(38, 'done', '', '', '', '', 0, 0, 1, 0, 2, 1, '38@admin.Firebrick', 0, 0, '2018-07-21', '05:00:00', '2018-07-20 01:26:10', '2019-08-29 20:35:23');
INSERT INTO `fb_per_blocks` VALUES(39, 'dfs', '', '', '', '', 0, 0, 1, 0, 2, 1, '39@admin.Firebrick', 1, 0, '2018-07-21', '05:00:00', '2018-07-20 01:30:38', '2019-08-29 20:35:23');
INSERT INTO `fb_per_blocks` VALUES(40, 'dasdasda', '', '2', '', '', 0, 0, 1, 0, 2, 1, '40@admin.Firebrick', 2, 0, '2018-07-22', '05:15:00', '2018-07-20 01:42:38', '2019-08-29 20:35:23');
INSERT INTO `fb_per_blocks` VALUES(42, 'aaa', '', '', '', '', 0, 0, 1, 0, 2, 1, '42@admin.Firebrick', 3, 0, '2018-07-22', '11:45:00', '2018-07-21 08:10:47', '2019-08-29 20:35:23');
INSERT INTO `fb_per_blocks` VALUES(43, 'helds', '', '', '', '', 0, 0, 1, 1, 4, 1, '43@admin.Firebrick', 0, 0, '2018-07-22', '03:44:00', '2018-07-21 12:16:05', '2018-07-24 08:10:34');
INSERT INTO `fb_per_blocks` VALUES(44, 'raju', '', '', '', '', 0, 0, 1, 1, 4, 1, '44@admin.Firebrick', 0, 0, '2018-07-22', '06:16:00', '2018-07-21 02:57:26', '2018-07-24 08:10:30');
INSERT INTO `fb_per_blocks` VALUES(45, 'ds', '', '', '', '', 0, 0, 1, 1, 4, 1, '45@admin.Firebrick', 0, 0, '2018-07-24', '12:05:00', '2018-07-23 08:35:36', '2018-07-24 08:10:26');
INSERT INTO `fb_per_blocks` VALUES(46, 'admindsfsd', 'sadasdas', '', '', '', 0, 0, 1, 0, 5, 5, '46@admindsfsd.Firebrick', 0, 1, '0000-00-00', '00:00:00', '2018-07-23 08:36:09', '0000-00-00 00:00:00');
INSERT INTO `fb_per_blocks` VALUES(47, 'dfgdfg', 'dfgdfg', '', '', '', 0, 0, 1, 0, 5, 6, '47@dfgdfg.Firebrick', 9999, 1, '0000-00-00', '00:00:00', '2018-08-20 07:33:56', '0000-00-00 00:00:00');
INSERT INTO `fb_per_blocks` VALUES(48, 'jjj', 'erwerew', '', '', '', 0, 0, 1, 0, 5, 7, '48@jjj.Firebrick', 9999, 1, '0000-00-00', '00:00:00', '2018-08-20 07:35:00', '0000-00-00 00:00:00');
INSERT INTO `fb_per_blocks` VALUES(49, 'sebastianmuntean@yahoo.com', 'Mr', '', '', '', 0, 0, 1, 0, 5, 8, '49@sebastianmuntean@yahoo.com.Firebrick', 9999, 1, '0000-00-00', '00:00:00', '2018-11-12 10:56:09', '0000-00-00 00:00:00');
INSERT INTO `fb_per_blocks` VALUES(50, 'dfsd', 'fdsfsd', '', '', '', 0, 0, 1, 0, 5, 9, '50@dfsd.Firebrick', 9999, 1, '0000-00-00', '00:00:00', '2019-02-03 06:51:20', '0000-00-00 00:00:00');
INSERT INTO `fb_per_blocks` VALUES(51, 'test123', 'Test', '', '', '', 0, 0, 1, 0, 5, 10, '51@test123.Firebrick', 9999, 1, '0000-00-00', '00:00:00', '2019-08-01 01:36:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fb_settings`
--

CREATE TABLE `fb_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting` text NOT NULL,
  `sort` varchar(50) NOT NULL,
  `board_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fb_settings`
--

INSERT INTO `fb_settings` VALUES(1, ' ', ' ', 1, 1, '2018-08-02 01:30:36', '2019-08-29 06:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `fb_tag_blocks`
--

CREATE TABLE `fb_tag_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `master_tag_id` varchar(20) NOT NULL DEFAULT '0',
  `meta_tag_id` varchar(50) NOT NULL,
  `task_assign_user` varchar(20) NOT NULL,
  `due_date_status` int(11) NOT NULL DEFAULT '0',
  `active_status` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `task_status` int(11) NOT NULL,
  `bucket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `TagId` varchar(100) NOT NULL,
  `notify` int(11) NOT NULL DEFAULT '1',
  `color` varchar(10) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '9999',
  `task_deadline_date` date NOT NULL,
  `task_deadline_time` time NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `fb_tag_blocks`
--

INSERT INTO `fb_tag_blocks` VALUES(1, 'story1', 'nvbnvbnvbn', '3', '1', '1', 0, 0, 1, 1, 5, 1, '1@admin.Firebrick', 0, '#4D5656', 0, '2018-06-07', '03:45:00', '2018-06-05 07:53:00', '2018-07-20 15:51:12');
INSERT INTO `fb_tag_blocks` VALUES(2, 'Story 2', 'bnvbnvb\r\n', '1', '1,3', '1,14', 0, 0, 1, 1, 3, 1, '2@admin.Firebrick', 0, '#7B7D7D', 1, '2018-06-07', '05:30:00', '2018-06-05 07:54:50', '2019-08-01 02:08:43');
INSERT INTO `fb_tag_blocks` VALUES(3, 'Angular1', 'dsfdsfdsfsdfs', '2', '1,3', '1,3,4,5', 0, 1, 1, 1, 2, 1, '3@admin.Firebrick', 0, '#186A3B', 1, '2018-06-06', '11:30:00', '2018-06-05 07:58:34', '2018-10-05 06:05:52');
INSERT INTO `fb_tag_blocks` VALUES(4, 'Angular 2', 'some info here\r\n \r\n\r\n', '3', '2,4,5', '4,2', 0, 0, 1, 0, 2, 1, '4@admin.Firebrick', 0, '#4A235A', 2, '2018-07-22', '05:15:00', '2018-06-05 07:59:00', '2018-10-05 06:05:52');
INSERT INTO `fb_tag_blocks` VALUES(5, 'client 1', 'xcxzczxczxc', '3', '3,5,6', '4,2', 0, 1, 1, 0, 3, 1, '5@admin.Firebrick', 0, '#784212', 0, '2018-06-27', '06:15:00', '2018-06-05 07:59:41', '2019-08-01 02:08:43');
INSERT INTO `fb_tag_blocks` VALUES(6, 'client2', 'bnvbnvb', '5', '1,4', '3,4', 0, 0, 1, 1, 4, 1, '6@admin.Firebrick', 0, '#1B4F72', 0, '2018-06-26', '11:30:00', '2018-06-05 08:00:13', '2019-08-01 01:40:22');
INSERT INTO `fb_tag_blocks` VALUES(7, 'Wordpress 1', 'vbnvbnvnvnvbn', '3', '5,3,2', '4,2', 0, 0, 1, 0, 2, 1, '7@admin.Firebrick', 0, '#0E6251', 0, '2018-07-22', '11:45:00', '2018-06-05 08:00:54', '2018-10-05 06:05:52');
INSERT INTO `fb_tag_blocks` VALUES(8, 'client 3', 'ghfghfghfghfghfghfg', '1', '3,7,8', '7,5', 0, 0, 1, 0, 4, 1, '8@admin.Firebrick', 0, '#7D6608', 1, '2018-06-20', '12:15:00', '2018-06-05 11:14:33', '2019-08-01 01:40:22');
INSERT INTO `fb_tag_blocks` VALUES(9, 'Story 3', 'dfg', '1', '2', '1', 0, 1, 1, 1, 5, 1, '9@admin.Firebrick', 0, '#7E5109', 1, '2018-06-14', '03:15:00', '2018-06-06 12:13:16', '2018-07-20 15:51:09');
INSERT INTO `fb_tag_blocks` VALUES(11, 'Angular 3', 'cfxvcx', '1', '2', '2', 0, 0, 1, 0, 2, 1, '11@admin.Firebrick', 0, '#0E6251', 3, '2018-06-07', '05:30:00', '2018-06-06 12:53:26', '2019-08-01 02:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `fb_tag_bucket`
--

CREATE TABLE `fb_tag_bucket` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL,
  `color` varchar(10) NOT NULL,
  `tagId` varchar(100) NOT NULL,
  `lock_status` int(11) NOT NULL DEFAULT '0',
  `User_id` int(11) NOT NULL,
  `is_hide` int(11) NOT NULL DEFAULT '0',
  `Create_date` datetime NOT NULL,
  `Update_date` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `fb_tag_bucket`
--

INSERT INTO `fb_tag_bucket` VALUES(1, 'New Bucket', 1, '#186A3B', '1@admin.Firebrick', 0, 1, 0, '2018-05-31 07:47:49', '0000-00-00 00:00:00');
INSERT INTO `fb_tag_bucket` VALUES(2, 'Angular', 1, '#7B7D7D', '2@admin.Firebrick', 0, 1, 0, '2018-05-31 07:47:51', '2018-07-12 12:05:49');
INSERT INTO `fb_tag_bucket` VALUES(3, 'Client', 1, '#4D5656', '3@admin.Firebrick', 0, 1, 0, '2018-06-01 12:29:25', '2018-06-19 07:52:15');
INSERT INTO `fb_tag_bucket` VALUES(4, 'Wordpress', 1, '#7E5109', '4@admin.Firebrick', 0, 1, 0, '2018-06-01 12:29:46', '2018-06-18 13:38:12');
INSERT INTO `fb_tag_bucket` VALUES(5, 'Story', 1, '#154360', '5@admin.Firebrick', 0, 1, 0, '2018-06-01 12:30:04', '2018-07-12 12:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `fb_user`
--

CREATE TABLE `fb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `user_role` int(11) NOT NULL DEFAULT '0',
  `profile_img` varchar(255) NOT NULL DEFAULT 'Penguins.jpg ',
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `fb_user`
--

INSERT INTO `fb_user` VALUES(1, 'admin', 'Ankiesh', 'Demo', 'Testing', '2018-06-18', 'anikesh.linuxbean@gmail.com', 2147483647, 'India', 'Lakshadweep', 'indore', 'e6e061838856bf47e1de730719fb2609', 1, 1, 'img.jpg ', '2018-06-01 09:57:45', '2019-08-29 08:34:21');
INSERT INTO `fb_user` VALUES(2, 'raghav', 'Raghav', 'Demo', 'Testing', '2018-06-18', 'raghav.linuxbean@gmail.com', 2147483647, 'India', 'Lakshadweep', 'indore', 'e6e061838856bf47e1de730719fb2609', 1, 1, 'image2.png ', '2018-06-01 09:59:56', '0000-00-00 00:00:00');
INSERT INTO `fb_user` VALUES(3, 'admin1', 'gfjl', 'ldfkgjdlsgjkl', 'ldfsgjdfklsj', '2018-06-21', 'dfljs@ljgfsjklds.dgfsjg', 2147483647, 'Afghanistan', 'Badakhshan', 'd', 'e6e061838856bf47e1de730719fb2609', 1, 1, ' ', '2018-06-21 08:14:05', '0000-00-00 00:00:00');
INSERT INTO `fb_user` VALUES(4, 'view', 'view', 'view', 'view', '2018-07-11', 'view@gmail.com', 2147483647, 'Afghanistan', 'Badakhshan', 'i', 'e6e061838856bf47e1de730719fb2609', 1, 4, ' ', '2018-07-11 04:37:54', '0000-00-00 00:00:00');
INSERT INTO `fb_user` VALUES(5, 'admindsfsd', 'dsadsa', 'sadasd', 'sadasdas', '2018-07-11', 'dsada@dsfdsfdsf.dsfdsfds', 2147483647, 'Bahamas', 'Acklins and Crooked ', 'dsfdsf', 'e6e061838856bf47e1de730719fb2609', 1, 1, ' ', '2018-07-23 08:36:09', '0000-00-00 00:00:00');
INSERT INTO `fb_user` VALUES(6, 'dfgdfg', 'cvbd', '45345', 'dfgdfg', '2018-08-21', '3453h', 2147483647, 'Algeria', 'Annaba', 'rtyry', '365ad742c414445573beda74fdffd979', 1, 1, ' ', '2018-08-20 07:33:56', '0000-00-00 00:00:00');
INSERT INTO `fb_user` VALUES(7, 'jjj', '1erwre', 'werwrew', 'erwerew', '2018-08-14', 'hgff', 1231231233, 'Afghanistan', 'Badghis', 'qweqwe', '3abf00fa61bfae2fff9133375e142416', 1, 1, ' ', '2018-08-20 07:35:00', '2018-08-20 07:35:10');
INSERT INTO `fb_user` VALUES(8, 'sebastianmuntean@yahoo.com', 'Sebastian', 'Muntean', 'Mr', '1970-06-08', 'sebastianmuntean@yahoo.com', 757801341, 'Romainia', 'Sibiu', 'Sibiu', '5203077b38807929f7fee304da6b8120', 1, 1, ' ', '2018-11-12 10:56:09', '2018-11-12 10:57:07');
INSERT INTO `fb_user` VALUES(9, 'dfsd', '5435435', 'fsdfsdf', 'fdsfsd', '2019-02-26', 'admin@gmail.com', 2147483647, 'Bahamas', 'Marsh Harbour', '543543', '9ce108a431b3dc0c88046b185e125ae4', 1, 1, ' ', '2019-02-03 06:51:20', '0000-00-00 00:00:00');
INSERT INTO `fb_user` VALUES(10, 'test123', 'Test', 'test', 'Test', '2019-08-05', 'layu@tmailcloud.net', 1234567899, 'Afghanistan', 'Badakhshan', 'test', 'a684683f54540aae7a258af5cc625754', 1, 1, 'test.txt ', '2019-08-01 01:36:12', '0000-00-00 00:00:00');
