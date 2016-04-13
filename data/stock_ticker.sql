-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2016 at 11:54 AM
-- Server version: 5.6.26-log
-- PHP Version: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_ticker`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('11afa5c2c8630c47f8c53c4a2ed126c1b19ca9bd', '127.0.0.1', 1459360869, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435393336303631393b),
('1885688f57b16a423015ac3339f3c350740e4acf', '127.0.0.1', 1459365553, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435393336353235363b),
('24013bd0e4fcddfff08d4dd952e81910b6e65642', '127.0.0.1', 1459359455, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435393335393435353b757365726e616d657c733a353a2248656e7279223b656d61696c7c733a31353a2268656e727940676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('2db493a53fc4394e6eee607fa5beca1cd7d144f6', '127.0.0.1', 1459360929, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435393336303932393b),
('444114c304c74453a780091d56a6b978ecab9a00', '127.0.0.1', 1459359826, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435393335393832363b757365726e616d657c733a353a2248656e7279223b656d61696c7c733a31353a2268656e727940676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('4f32d79db610d5f3c232ef7ca8f9b509069af630', '127.0.0.1', 1459358462, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435393335383436303b757365726e616d657c733a353a2248656e7279223b656d61696c7c733a31353a2268656e727940676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('64d49c68630ed5b2db2d3a13d9052b3690a10063', '127.0.0.1', 1459363514, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435393336333436363b),
('8f0389be97277552dfd1601c883c24a3135928ed', '127.0.0.1', 1459361360, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435393336313334333b),
('afb3da6792c1822dbb36f882fae9d775cdca99b3', '127.0.0.1', 1459365231, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435393336343935313b7573657249447c733a313a2231223b757365726e616d657c733a363a226a7361696e69223b75736572526f6c657c733a363a22706c61796572223b6c6f676765645f696e7c623a313b),
('b4f3a87b5c8e90f8c03f85e3648e9915300b9b36', '127.0.0.1', 1459364249, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435393336343032333b),
('bf74561a36f17933aaf5a1f93fa345dc7812863e', '127.0.0.1', 1459364933, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435393336343634303b7573657249447c733a313a2231223b757365726e616d657c733a363a226a7361696e69223b75736572526f6c657c733a363a22706c61796572223b6c6f676765645f696e7c623a313b),
('cbdb9260125026cd7a9df1a59620f547c48a6104', '127.0.0.1', 1459961605, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435393936313630333b),
('e872913cd6827fd7fd48b5d001e4677709276d80', '127.0.0.1', 1459367003, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435393336363939393b7573657249447c733a313a2231223b757365726e616d657c733a363a226a7361696e69223b75736572526f6c657c733a363a22706c61796572223b6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `holdings`
--

CREATE TABLE `holdings` (
  `id` int(11) NOT NULL,
  `stock` varchar(40) NOT NULL,
  `player` varchar(40) NOT NULL,
  `quantity` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `holdings`
--

INSERT INTO `holdings` (`id`, `stock`, `player`, `quantity`, `username`) VALUES
(1, 'BOND', 'Donald', 100, ''),
(3, 'TECH', 'Donald', 100, ''),
(7, 'GOLD', 'Henry', 1000, ''),
(9, 'OIL', 'George', 600, ''),
(10, 'IND', 'George', 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `movements`
--

CREATE TABLE `movements` (
  `Datetime` varchar(19) DEFAULT NULL,
  `Code` varchar(4) DEFAULT NULL,
  `Action` varchar(4) DEFAULT NULL,
  `Amount` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movements`
--

INSERT INTO `movements` (`Datetime`, `Code`, `Action`, `Amount`) VALUES
('2016.02.01-09:01:00', 'BOND', 'down', 5),
('2016.02.01-09:01:02', 'IND', 'div', 5),
('2016.02.01-09:01:04', 'OIL', 'down', 10),
('2016.02.01-09:01:06', 'GOLD', 'div', 5),
('2016.02.01-09:01:08', 'BOND', 'up', 20),
('2016.02.01-09:01:10', 'GOLD', 'div', 5),
('2016.02.01-09:01:12', 'GOLD', 'down', 20),
('2016.02.01-09:01:14', 'IND', 'div', 10),
('2016.02.01-09:01:16', 'OIL', 'up', 20),
('2016.02.01-09:01:18', 'BOND', 'down', 5),
('2016.02.01-09:01:20', 'BOND', 'up', 5),
('2016.02.01-09:01:22', 'BOND', 'div', 20),
('2016.02.01-09:01:24', 'BOND', 'div', 20),
('2016.02.01-09:01:26', 'GOLD', 'div', 20),
('2016.02.01-09:01:28', 'IND', 'up', 20),
('2016.02.01-09:01:30', 'OIL', 'down', 20),
('2016.02.01-09:01:32', 'GRAN', 'down', 20),
('2016.02.01-09:01:34', 'BOND', 'up', 5),
('2016.02.01-09:01:36', 'GOLD', 'down', 20),
('2016.02.01-09:01:38', 'GOLD', 'down', 20),
('2016.02.01-09:01:40', 'TECH', 'down', 20),
('2016.02.01-09:01:42', 'TECH', 'up', 5),
('2016.02.01-09:01:44', 'OIL', 'up', 20),
('2016.02.01-09:01:46', 'BOND', 'up', 5),
('2016.02.01-09:01:48', 'GOLD', 'div', 10),
('2016.02.01-09:01:50', 'GOLD', 'down', 5),
('2016.02.01-09:01:52', 'GOLD', 'up', 20),
('2016.02.01-09:01:54', 'IND', 'down', 10),
('2016.02.01-09:01:56', 'GOLD', 'div', 20);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `Player` varchar(6) DEFAULT NULL,
  `Cash` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`Player`, `Cash`) VALUES
('Mickey', 1000),
('Donald', 3000),
('George', 2000),
('Henry', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `Code` varchar(4) DEFAULT NULL,
  `Name` varchar(10) DEFAULT NULL,
  `Category` varchar(1) DEFAULT NULL,
  `Value` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`Code`, `Name`, `Category`, `Value`) VALUES
('BOND', 'Bonds', 'B', 66),
('GOLD', 'Gold', 'B', 110),
('GRAN', 'Grain', 'B', 113),
('IND', 'Industrial', 'B', 39),
('OIL', 'Oil', 'B', 52),
('TECH', 'Tech', 'B', 37);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `DateTime` varchar(19) DEFAULT NULL,
  `Player` varchar(6) DEFAULT NULL,
  `Stock` varchar(4) DEFAULT NULL,
  `Trans` varchar(4) DEFAULT NULL,
  `Quantity` int(4) DEFAULT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`DateTime`, `Player`, `Stock`, `Trans`, `Quantity`, `username`) VALUES
('2016.02.01-09:01:00', 'Donald', 'BOND', 'buy', 100, ''),
('2016.02.01-09:01:05', 'Donald', 'TECH', 'sell', 1000, ''),
('2016.02.01-09:01:10', 'Henry', 'TECH', 'sell', 1000, ''),
('2016.02.01-09:01:15', 'Donald', 'IND', 'sell', 1000, ''),
('2016.02.01-09:01:20', 'George', 'GOLD', 'sell', 100, ''),
('2016.02.01-09:01:25', 'George', 'OIL', 'buy', 500, ''),
('2016.02.01-09:01:30', 'Henry', 'GOLD', 'sell', 100, ''),
('2016.02.01-09:01:35', 'Henry', 'GOLD', 'buy', 1000, ''),
('2016.02.01-09:01:40', 'Donald', 'TECH', 'buy', 100, ''),
('2016.02.01-09:01:45', 'Donald', 'OIL', 'sell', 100, ''),
('2016.02.01-09:01:50', 'Donald', 'TECH', 'sell', 100, ''),
('2016.02.01-09:01:55', 'George', 'OIL', 'buy', 100, ''),
('2016.02.01-09:01:60', 'George', 'IND', 'buy', 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(20) NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `avatar`) VALUES
(1, 'jsaini', '$2y$10$KsngnXrAlSQ9kQM/w5cSmumC/zdRxc0xdp5F43r70V8FWyNoOs13u', 'player', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `holdings`
--
ALTER TABLE `holdings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `holdings`
--
ALTER TABLE `holdings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
