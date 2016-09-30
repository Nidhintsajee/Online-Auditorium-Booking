-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2016 at 11:10 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `userid`, `password`, `userlevel`) VALUES
('nidhin', 1, '123456', 2),
('arjun', 8, '123', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_audiregi`
--

INSERT INTO `tb_audiregi` (`aname`, `place`, `address`, `contact`, `aid`, `owner`) VALUES
('Anugraha', 'Chalakudy', '680302', 7558050884, 1, 'Nidhin'),
('Parish', 'Manuuthy', '678354', 9876544321, 2, 'Arjun');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`bid`, `bdate`, `time`, `faid`, `did`, `eid`) VALUES
(1, '2016-02-02', '10-12', 1, 7, 1),
(2, '2016-02-02', '10-12', 1, 7, 1),
(3, '2016-02-01', '10-12', 1, 7, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_decoration`
--

INSERT INTO `tb_decoration` (`did`, `dtid`, `dname`, `damt`, `dtimage`, `aid`) VALUES
(7, 1, 'FG', 798, 'images (7).jpg', 1),
(8, 1, 'FGDFG', 798546, 'images (8).jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dectype`
--

CREATE TABLE `tb_dectype` (
  `dtid` int(11) NOT NULL auto_increment,
  `dtype` varchar(50) NOT NULL,
  PRIMARY KEY  (`dtid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_dectype`
--

INSERT INTO `tb_dectype` (`dtid`, `dtype`) VALUES
(1, 'Flower');

-- --------------------------------------------------------

--
-- Table structure for table `tb_enquiery`
--

CREATE TABLE `tb_enquiery` (
  `eid` int(11) NOT NULL auto_increment,
  `date` datetime NOT NULL,
  `timefromto` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `faid` int(11) NOT NULL,
  `hid` int(11) NOT NULL,
  PRIMARY KEY  (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_enquiery`
--

INSERT INTO `tb_enquiery` (`eid`, `date`, `timefromto`, `uid`, `aid`, `faid`, `hid`) VALUES
(1, '2016-02-03 00:00:00', '10-12', 0, 1, 0, 1),
(2, '2016-02-03 00:00:00', '10-12', 0, 1, 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_facility`
--

INSERT INTO `tb_facility` (`faid`, `aid`, `large`, `famt`) VALUES
(1, 1, 'a/c,50 chairs', 2500),
(2, 2, 'non/ac,60chairs', 3500);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_food`
--

INSERT INTO `tb_food` (`foid`, `fotid`, `foitem`, `aid`) VALUES
(1, 5, 'fdsg', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_fotype`
--

INSERT INTO `tb_fotype` (`fotid`, `ftype`, `foamt`, `foimage`) VALUES
(3, 'FDG', 786, 'download.jpg'),
(5, 'DFSG', 456, 'images.jpg');

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
(1, 'Marriage', 2500, 1),
(2, 'Engagemnt', 3500, 2),
(3, 'Birthday', 5000, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_hall`
--

INSERT INTO `tb_hall` (`hid`, `hname`, `hcapa`, `hamt`, `aid`, `himage`) VALUES
(1, 'H1', 200, 2000, 1, 'H1.jpg'),
(2, 'H2', 300, 3000, 1, 'H2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `pid` int(11) NOT NULL auto_increment,
  `pdate` date NOT NULL,
  `pay` bigint(20) NOT NULL,
  `bid` int(11) NOT NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_payment`
--

INSERT INTO `tb_payment` (`pid`, `pdate`, `pay`, `bid`) VALUES
(1, '2016-02-02', 2121, 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_postponed`
--

INSERT INTO `tb_postponed` (`poid`, `ptime`, `pdate`, `todate`, `bid`) VALUES
(1, '10.30', '2016-02-02', '2016-02-15', 3),
(2, '10.30', '2016-02-02', '2016-02-15', 3);

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
  `userlevel` int(11) NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_uregi`
--

INSERT INTO `tb_uregi` (`uid`, `uname`, `pwd`, `phno`, `emid`, `name`, `userlevel`) VALUES
(2, 'nidhin', '123456', 98, '656', 'nidhin', 2),
(8, 'arjun', '123', 4414, 'fggf', 'arjun', 2);
