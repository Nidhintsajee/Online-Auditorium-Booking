-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2016 at 11:09 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_auditorium`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(10) NOT NULL,
  `userid` int(11) NOT NULL auto_increment,
  `password` varchar(25) NOT NULL,
  `userlevel` int(11) NOT NULL,
  PRIMARY KEY  (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `userid`, `password`, `userlevel`) VALUES
('nidhin', 1, '123456', 2),
('arjun', 8, '123', 2),
('ashik', 9, '123', 2),
('arjun', 10, '12', 1),
('2', 11, 'j', 0),
('h', 12, '2', 0),
('h', 13, '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_audiregi`
--

CREATE TABLE `tb_audiregi` (
  `aname` varchar(20) NOT NULL,
  `place` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `aid` int(11) NOT NULL auto_increment,
  `owner` varchar(20) NOT NULL,
  PRIMARY KEY  (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_audiregi`
--

INSERT INTO `tb_audiregi` (`aname`, `place`, `address`, `contact`, `aid`, `owner`) VALUES
('Anugraha', 'Chalakudy', '650897', 7558050884, 1, 'Arjun'),
('Parish', 'Mannuthy', '234567', 987654321, 2, 'Ashik'),
('CVS', 'Kuttenellur', '343556', 987654123, 3, 'Arul');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `bid` int(11) NOT NULL auto_increment,
  `bdate` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `faid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  PRIMARY KEY  (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_booking`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_cancel`
--

CREATE TABLE `tb_cancel` (
  `cid` int(11) NOT NULL auto_increment,
  `cdate` datetime NOT NULL,
  `todate` datetime NOT NULL,
  `reason` varchar(50) NOT NULL,
  `bid` int(11) NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_cancel`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_decoration`
--

CREATE TABLE `tb_decoration` (
  `did` int(11) NOT NULL auto_increment,
  `dtid` int(11) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `damt` bigint(20) NOT NULL,
  `dtimage` varchar(20) NOT NULL,
  `aid` int(11) NOT NULL,
  PRIMARY KEY  (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_decoration`
--

INSERT INTO `tb_decoration` (`did`, `dtid`, `dname`, `damt`, `dtimage`, `aid`) VALUES
(1, 1, 'Jasmin', 200, 'download (1).jpg', 1),
(2, 2, 'Red', 200, 'H1.jpg', 2),
(3, 2, 'Blue', 250, 'images (7).jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dectype`
--

CREATE TABLE `tb_dectype` (
  `dtid` int(11) NOT NULL auto_increment,
  `dtype` varchar(50) NOT NULL,
  PRIMARY KEY  (`dtid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_dectype`
--

INSERT INTO `tb_dectype` (`dtid`, `dtype`) VALUES
(1, 'Flowers'),
(2, 'Paint');

-- --------------------------------------------------------

--
-- Table structure for table `tb_enquiery`
--

CREATE TABLE `tb_enquiery` (
  `eid` int(11) NOT NULL auto_increment,
  `bdate` datetime NOT NULL,
  `timefromto` varchar(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `aid` int(11) NOT NULL,
  `faid` int(11) NOT NULL,
  `hid` int(11) NOT NULL,
  `fuid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `foid` int(11) NOT NULL,
  `bstatus` int(11) NOT NULL default '0',
  PRIMARY KEY  (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_enquiery`
--

INSERT INTO `tb_enquiery` (`eid`, `bdate`, `timefromto`, `uid`, `aid`, `faid`, `hid`, `fuid`, `did`, `foid`, `bstatus`) VALUES
(1, '2016-02-01 00:00:00', '10-12', 2, 1, 1, 4, 1, 1, 1, 1),
(2, '2016-02-01 00:00:00', '10-12', 2, 1, 1, 4, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_facility`
--

CREATE TABLE `tb_facility` (
  `faid` int(11) NOT NULL auto_increment,
  `aid` int(11) NOT NULL,
  `large` varchar(20) NOT NULL,
  `famt` bigint(20) NOT NULL,
  PRIMARY KEY  (`faid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_facility`
--

INSERT INTO `tb_facility` (`faid`, `aid`, `large`, `famt`) VALUES
(1, 1, 'A/c,50', 5000),
(2, 2, 'Non/Ac', 6000),
(3, 1, 'A/c', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_food`
--

CREATE TABLE `tb_food` (
  `foid` int(11) NOT NULL auto_increment,
  `fotid` int(11) NOT NULL,
  `foitem` varchar(50) NOT NULL,
  `aid` int(11) NOT NULL,
  PRIMARY KEY  (`foid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_food`
--

INSERT INTO `tb_food` (`foid`, `fotid`, `foitem`, `aid`) VALUES
(1, 1, 'Biriyani,Chicken', 1),
(2, 2, 'Biriyani,Rice', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_fotype`
--

CREATE TABLE `tb_fotype` (
  `fotid` int(11) NOT NULL auto_increment,
  `ftype` varchar(50) NOT NULL,
  `foamt` bigint(20) NOT NULL,
  `foimage` varchar(50) NOT NULL,
  PRIMARY KEY  (`fotid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_fotype`
--

INSERT INTO `tb_fotype` (`fotid`, `ftype`, `foamt`, `foimage`) VALUES
(1, 'Non', 250, 'images (1).jpg'),
(2, 'veg', 150, 'images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_function`
--

CREATE TABLE `tb_function` (
  `fuid` int(11) NOT NULL auto_increment,
  `funame` varchar(30) NOT NULL,
  `fuamt` bigint(20) NOT NULL,
  `aid` int(11) NOT NULL,
  PRIMARY KEY  (`fuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_function`
--

INSERT INTO `tb_function` (`fuid`, `funame`, `fuamt`, `aid`) VALUES
(1, 'Mariage', 25000, 1),
(2, 'Birthday', 30000, 2),
(3, 'Mariage', 20000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hall`
--

CREATE TABLE `tb_hall` (
  `hid` int(11) NOT NULL auto_increment,
  `hname` varchar(20) NOT NULL,
  `hcapa` bigint(20) NOT NULL,
  `hamt` bigint(20) NOT NULL,
  `aid` int(11) NOT NULL,
  `himage` varchar(50) NOT NULL,
  PRIMARY KEY  (`hid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_hall`
--

INSERT INTO `tb_hall` (`hid`, `hname`, `hcapa`, `hamt`, `aid`, `himage`) VALUES
(4, 'H1 A/C', 23, 234, 1, 'image6.jpg'),
(5, 'H2 NON A/C', 30, 3000, 2, 'image2.jpg'),
(6, 'H3 A/C', 30, 256, 1, 'image3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `pid` int(11) NOT NULL auto_increment,
  `pdate` date NOT NULL,
  `amt` bigint(20) NOT NULL,
  `bid` int(11) NOT NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_payment`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_postponed`
--

CREATE TABLE `tb_postponed` (
  `poid` int(11) NOT NULL auto_increment,
  `ptime` varchar(50) NOT NULL,
  `pdate` date NOT NULL,
  `todate` date NOT NULL,
  `bid` int(11) NOT NULL,
  PRIMARY KEY  (`poid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_postponed`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_uregi`
--

CREATE TABLE `tb_uregi` (
  `uid` int(11) NOT NULL auto_increment,
  `uname` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `phno` bigint(20) NOT NULL,
  `emid` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_uregi`
--

INSERT INTO `tb_uregi` (`uid`, `uname`, `pwd`, `phno`, `emid`, `name`) VALUES
(2, 'nidhin', '123456', 98, '656', 'nidhin'),
(8, 'arjun', '123', 4414, 'fggf', 'arjun'),
(9, 'ashik', '123', 987654321, 'nidhintsajee@gmail.com', 'Ashik');
