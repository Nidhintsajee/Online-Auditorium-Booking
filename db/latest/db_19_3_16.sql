-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2016 at 06:57 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

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

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(10) NOT NULL,
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(25) NOT NULL,
  `userlevel` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `userid`, `password`, `userlevel`) VALUES
('nidhin', 2, '123456', 2),
('ashik', 3, '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_audiregi`
--

CREATE TABLE IF NOT EXISTS `tb_audiregi` (
  `aname` varchar(20) NOT NULL,
  `place` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(20) NOT NULL,
  `aimage` varchar(50) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_audiregi`
--

INSERT INTO `tb_audiregi` (`aname`, `place`, `address`, `contact`, `aid`, `owner`, `aimage`) VALUES
('Anugraha', 'Chalakudy', 'Pin:680302', 7558050884, 1, 'Nidhin', 'image2.jpg'),
('Parish', 'Mannuthy', 'Pin:798782', 8744564445, 2, 'Arjun', 'image3.jpg'),
('CVS', 'Amballur', 'Pin:652347', 7894561230, 3, 'Ashik', 'image4.jpg'),
('Adlux', 'Koratty', 'Pin:698325', 8563214789, 4, 'Fasil', 'image6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE IF NOT EXISTS `tb_booking` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bdate` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `eid` int(11) NOT NULL,
  `bstatus` int(11) NOT NULL DEFAULT '0',
  `adpay` bigint(20) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`bid`, `bdate`, `time`, `eid`, `bstatus`, `adpay`) VALUES
(1, '2016-03-31', '10 AM to 5 PM', 1, 2, 33250);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cancel`
--

CREATE TABLE IF NOT EXISTS `tb_cancel` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cdate` datetime NOT NULL,
  `todate` datetime NOT NULL,
  `reason` varchar(50) NOT NULL,
  `bid` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_cancel`
--

INSERT INTO `tb_cancel` (`cid`, `cdate`, `todate`, `reason`, `bid`) VALUES
(1, '2016-03-31 00:00:00', '2016-03-14 00:00:00', 'Death of Father', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_decoration`
--

CREATE TABLE IF NOT EXISTS `tb_decoration` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `dtid` int(11) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `damt` bigint(20) NOT NULL,
  `dtimage` varchar(20) NOT NULL,
  `aid` int(11) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_decoration`
--

INSERT INTO `tb_decoration` (`did`, `dtid`, `dname`, `damt`, `dtimage`, `aid`) VALUES
(1, 1, 'Jasmin', 250, 'download (1).jpg', 1),
(2, 2, 'Cloth', 300, 'images (7).jpg', 1),
(3, 2, 'Cloth', 300, 'images (8).jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dectype`
--

CREATE TABLE IF NOT EXISTS `tb_dectype` (
  `dtid` int(11) NOT NULL AUTO_INCREMENT,
  `dtype` varchar(50) NOT NULL,
  PRIMARY KEY (`dtid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_dectype`
--

INSERT INTO `tb_dectype` (`dtid`, `dtype`) VALUES
(1, 'Flower'),
(2, 'Arch'),
(3, 'Flower Chain');

-- --------------------------------------------------------

--
-- Table structure for table `tb_enquiery`
--

CREATE TABLE IF NOT EXISTS `tb_enquiery` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `bdate` datetime NOT NULL,
  `timefromto` varchar(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `aid` int(11) NOT NULL,
  `faid` int(11) NOT NULL,
  `hid` int(11) NOT NULL,
  `fuid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `foid` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '0',
  `adpay` bigint(20) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_enquiery`
--

INSERT INTO `tb_enquiery` (`eid`, `bdate`, `timefromto`, `uid`, `aid`, `faid`, `hid`, `fuid`, `did`, `foid`, `estatus`, `adpay`) VALUES
(1, '2016-03-31 00:00:00', '10 AM to 5 PM', 1, 1, 1, 1, 1, 1, 1, 1, 33250),
(3, '2016-03-20 00:00:00', '3 PM to 7 PM', 2, 2, 3, 3, 5, 3, 3, 0, 37800);

-- --------------------------------------------------------

--
-- Table structure for table `tb_facility`
--

CREATE TABLE IF NOT EXISTS `tb_facility` (
  `faid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `large` varchar(20) NOT NULL,
  `famt` bigint(20) NOT NULL,
  PRIMARY KEY (`faid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_facility`
--

INSERT INTO `tb_facility` (`faid`, `aid`, `large`, `famt`) VALUES
(1, 1, 'Large', 3500),
(2, 1, 'Medium', 3000),
(3, 2, 'Small', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_food`
--

CREATE TABLE IF NOT EXISTS `tb_food` (
  `foid` int(11) NOT NULL AUTO_INCREMENT,
  `fotid` int(11) NOT NULL,
  `foitem` varchar(50) NOT NULL,
  `aid` int(11) NOT NULL,
  PRIMARY KEY (`foid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_food`
--

INSERT INTO `tb_food` (`foid`, `fotid`, `foitem`, `aid`) VALUES
(1, 1, 'Fried Rice', 1),
(2, 1, 'Biriyani', 1),
(3, 2, 'Biriyani', 2),
(4, 3, 'Chilliy', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_fotype`
--

CREATE TABLE IF NOT EXISTS `tb_fotype` (
  `fotid` int(11) NOT NULL AUTO_INCREMENT,
  `ftype` varchar(50) NOT NULL,
  `foamt` bigint(20) NOT NULL,
  `foimage` varchar(50) NOT NULL,
  PRIMARY KEY (`fotid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_fotype`
--

INSERT INTO `tb_fotype` (`fotid`, `ftype`, `foamt`, `foimage`) VALUES
(1, 'NON', 2000, 'download.jpg'),
(2, 'VEG', 1000, 'images (1).jpg'),
(3, 'NON', 2000, 'images.jpg'),
(4, 'VEG', 1500, 'images (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_function`
--

CREATE TABLE IF NOT EXISTS `tb_function` (
  `fuid` int(11) NOT NULL AUTO_INCREMENT,
  `funame` varchar(30) NOT NULL,
  `fuamt` bigint(20) NOT NULL,
  `aid` int(11) NOT NULL,
  PRIMARY KEY (`fuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_function`
--

INSERT INTO `tb_function` (`fuid`, `funame`, `fuamt`, `aid`) VALUES
(1, 'Marriage', 25000, 1),
(2, 'Birthday', 15000, 1),
(4, 'Marriage', 20000, 2),
(5, 'Birthday', 30000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hall`
--

CREATE TABLE IF NOT EXISTS `tb_hall` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `hname` varchar(20) NOT NULL,
  `hcapa` bigint(20) NOT NULL,
  `hamt` bigint(20) NOT NULL,
  `aid` int(11) NOT NULL,
  `himage` varchar(50) NOT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_hall`
--

INSERT INTO `tb_hall` (`hid`, `hname`, `hcapa`, `hamt`, `aid`, `himage`) VALUES
(1, 'Marriage Hall', 250, 2500, 1, 'H1.jpg'),
(2, 'Fuction Hall', 200, 2000, 1, 'H2.jpg'),
(3, 'Birthday Hall', 300, 3000, 2, 'H3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE IF NOT EXISTS `tb_payment` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pdate` date NOT NULL,
  `amt` bigint(20) NOT NULL,
  `bid` int(11) NOT NULL,
  `cardname` varchar(50) NOT NULL,
  `cardid` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL,
  `pin` bigint(20) NOT NULL,
  `expdate` date NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `acno` bigint(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_payment`
--

INSERT INTO `tb_payment` (`pid`, `pdate`, `amt`, `bid`, `cardname`, `cardid`, `uid`, `pin`, `expdate`, `bankname`, `acno`) VALUES
(1, '2016-04-01', 60000, 1, 'Karthik', '4048 5639 3214 9854', 1, 2356, '2016-04-29', 'FEDRAL BANK', 12345678921);

-- --------------------------------------------------------

--
-- Table structure for table `tb_postponed`
--

CREATE TABLE IF NOT EXISTS `tb_postponed` (
  `poid` int(11) NOT NULL AUTO_INCREMENT,
  `ptime` varchar(50) NOT NULL,
  `pdate` date NOT NULL,
  `todate` date NOT NULL,
  `bid` int(11) NOT NULL,
  PRIMARY KEY (`poid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_postponed`
--

INSERT INTO `tb_postponed` (`poid`, `ptime`, `pdate`, `todate`, `bid`) VALUES
(1, '10 AM to 5 PM', '2016-04-10', '2016-03-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_uregi`
--

CREATE TABLE IF NOT EXISTS `tb_uregi` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `phno` bigint(20) NOT NULL,
  `emid` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_uregi`
--

INSERT INTO `tb_uregi` (`uid`, `uname`, `pwd`, `phno`, `emid`, `name`) VALUES
(1, 'nidhin', '123456', 7558050884, 'nidhintsajee@gmail.com', 'Nidhin'),
(2, 'ashik', '123', 8974565234, 'ashik123@gmail.com', 'Ashik');
