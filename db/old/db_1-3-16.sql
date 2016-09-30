-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2016 at 06:58 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `userid`, `password`, `userlevel`) VALUES
('nidhin', 1, '123456', 1),
('nidhin', 2, '123456', 2);

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
('Anugraha', 'Chalakudy', 'PIN:680302', 7558050884, 1, 'Nidhin'),
('Parish', 'Amballur', 'Pin:456789', 987654321, 2, 'Arjun');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `bid` int(11) NOT NULL auto_increment,
  `bdate` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `eid` int(11) NOT NULL,
  `bstatus` int(11) NOT NULL default '0',
  `adpay` bigint(20) NOT NULL,
  PRIMARY KEY  (`bid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`bid`, `bdate`, `time`, `eid`, `bstatus`, `adpay`) VALUES
(1, '2016-03-02', '10 AM to 5 PM', 1, 3, 2500);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_cancel`
--

INSERT INTO `tb_cancel` (`cid`, `cdate`, `todate`, `reason`, `bid`) VALUES
(1, '2016-03-10 00:00:00', '2016-03-01 00:00:00', 'death', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_decoration`
--

INSERT INTO `tb_decoration` (`did`, `dtid`, `dname`, `damt`, `dtimage`, `aid`) VALUES
(1, 1, 'Jasmin', 250, 'Water lilies.jpg', 1),
(2, 2, 'colors', 250, 'img2.jpg', 2);

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
(1, 'Flower'),
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
  `estatus` int(11) NOT NULL default '0',
  `adpay` bigint(20) NOT NULL,
  PRIMARY KEY  (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_enquiery`
--

INSERT INTO `tb_enquiery` (`eid`, `bdate`, `timefromto`, `uid`, `aid`, `faid`, `hid`, `fuid`, `did`, `foid`, `estatus`, `adpay`) VALUES
(1, '2016-03-02 00:00:00', '10 AM to 5 PM', 1, 1, 1, 1, 1, 1, 1, 1, 2500);

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
(1, 1, '250 Chairs,250Benche', 2500),
(2, 2, '300 Chairs,300 Bench', 3000);

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
(1, 1, 'Biriyani', 1),
(2, 2, 'Biriyani', 2);

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
(1, 'NON', 2000, 'download (1).jpg'),
(2, 'Veg', 1000, 'fu_i2.gif');

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
(1, 'Marriage', 25000, 1),
(2, 'Birthday', 35000, 2),
(3, 'Birthday', 15000, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_hall`
--

INSERT INTO `tb_hall` (`hid`, `hname`, `hcapa`, `hamt`, `aid`, `himage`) VALUES
(1, 'H1', 250, 2500, 1, 'adlux1.jpg'),
(2, 'H2', 200, 2000, 2, 'Amani-Auditorium-568x336.jpg'),
(3, 'H2', 300, 3000, 1, 'audi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `pid` int(11) NOT NULL auto_increment,
  `pdate` date NOT NULL,
  `amt` bigint(20) NOT NULL,
  `bid` int(11) NOT NULL,
  `cardname` varchar(50) NOT NULL,
  `cardid` bigint(20) NOT NULL,
  `uid` int(11) NOT NULL,
  `pin` bigint(20) NOT NULL,
  `expdate` date NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `acno` bigint(20) NOT NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_payment`
--

INSERT INTO `tb_payment` (`pid`, `pdate`, `amt`, `bid`, `cardname`, `cardid`, `uid`, `pin`, `expdate`, `bankname`, `acno`) VALUES
(1, '2016-03-02', 25000, 1, 'smart', 15456, 1, 565, '2016-03-16', 'corp', 65432);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_postponed`
--

INSERT INTO `tb_postponed` (`poid`, `ptime`, `pdate`, `todate`, `bid`) VALUES
(1, '10 AM to 6pm', '2016-03-10', '2016-03-01', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_uregi`
--

INSERT INTO `tb_uregi` (`uid`, `uname`, `pwd`, `phno`, `emid`, `name`) VALUES
(1, 'nidhin', '123456', 7558050884, 'nidhintsajee@gmail.com', 'Nidhin');
