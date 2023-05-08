-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 01:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `DEPTNO` int(11) NOT NULL,
  `DNAME` varchar(50) DEFAULT NULL,
  `LOC` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`DEPTNO`, `DNAME`, `LOC`) VALUES
(10, 'ACCOUNTING', 'NEW YORK'),
(20, 'RESEARCH', 'DALLAS'),
(30, 'SALES', 'CHICAGO'),
(40, 'OPERATIONS', 'BOSTON');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMPNO` int(11) NOT NULL,
  `ENAME` varchar(50) DEFAULT NULL,
  `JOB` varchar(30) DEFAULT NULL,
  `MGR` int(11) DEFAULT NULL,
  `HIREDATE` date DEFAULT NULL,
  `SAL` decimal(7,2) DEFAULT NULL,
  `COMM` decimal(7,2) DEFAULT NULL,
  `DEPTNO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPNO`, `ENAME`, `JOB`, `MGR`, `HIREDATE`, `SAL`, `COMM`, `DEPTNO`) VALUES
(7369, 'SMITH', 'CLERK', 7902, '1980-12-17', 800.00, NULL, 20),
(7499, 'ALLEN', 'SALESMAN', 7698, '1981-02-20', 1600.00, 300.00, 30),
(7521, 'WARD', 'SALESMAN', 7698, '1981-02-22', 1250.00, 500.00, 30),
(7566, 'JONES', 'MANAGER', 7839, '1981-04-02', 2975.00, NULL, 20),
(7654, 'MARTIN', 'SALESMAN', 7698, '1981-09-28', 1250.00, 1400.00, 30),
(7698, 'BLAKE', 'MANAGER', 7839, '1981-05-01', 2850.00, NULL, 30),
(7782, 'CLARK', 'MANAGER', 7839, '1981-06-09', 2450.00, NULL, 10),
(7839, 'KING', 'PRESIDENT', NULL, '1981-11-17', 5000.00, NULL, 10),
(7844, 'TURNER', 'SALESMAN', 7698, '1981-09-08', 1500.00, 0.00, 30),
(7876, 'ADAMS', 'CLERK', 7788, '1987-09-23', 1100.00, NULL, 20),
(7900, 'JAMES', 'CLERK', 7698, '1981-12-03', 950.00, NULL, 30),
(7902, 'FORD', 'ANALYST', 7566, '1981-12-03', 3000.00, NULL, 20),
(7934, 'MILLER', 'CLERK', 7782, '1982-01-23', 1300.00, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `mgr`
--

CREATE TABLE `mgr` (
  `MGRNO` int(11) NOT NULL,
  `MGRNAME` varchar(50) DEFAULT NULL,
  `DEPTNO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mgr`
--

INSERT INTO `mgr` (`MGRNO`, `MGRNAME`, `DEPTNO`) VALUES
(7566, 'JONES', 20),
(7698, 'BLAKE', 30),
(7782, 'CLARK', 10),
(7839, 'KING', 10);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `PROJNO` int(11) NOT NULL,
  `PROJNAME` varchar(50) DEFAULT NULL,
  `DEPTNO` int(11) DEFAULT NULL,
  `STARTDATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`PROJNO`, `PROJNAME`, `DEPTNO`, `STARTDATE`) VALUES
(1, 'Project X', 20, '1982-01-01'),
(2, 'Project Y', 30, '1982-02-01'),
(3, 'Project Z', 30, '1982-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `supervision`
--

CREATE TABLE `supervision` (
  `EMPNO` int(11) NOT NULL,
  `MGRNO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervision`
--

INSERT INTO `supervision` (`EMPNO`, `MGRNO`) VALUES
(7902, 7566),
(7499, 7698),
(7521, 7698),
(7654, 7698),
(7900, 7698),
(7369, 7782),
(7934, 7782),
(7566, 7839),
(7698, 7839);

-- --------------------------------------------------------

--
-- Table structure for table `works_on`
--

CREATE TABLE `works_on` (
  `EMPNO` int(11) NOT NULL,
  `PROJNO` int(11) NOT NULL,
  `HOURS` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `works_on`
--

INSERT INTO `works_on` (`EMPNO`, `PROJNO`, `HOURS`) VALUES
(7369, 1, 8.00),
(7499, 2, 10.00),
(7499, 3, 30.00),
(7521, 2, 10.00),
(7521, 3, 40.00),
(7566, 1, 4.00),
(7654, 3, 20.00),
(7698, 1, 12.00),
(7698, 2, 20.00),
(7698, 3, 5.00),
(7782, 1, 8.00),
(7782, 2, 10.00),
(7839, 1, 24.00),
(7900, 2, 5.00),
(7902, 1, 40.00),
(7934, 2, 10.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`DEPTNO`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPNO`),
  ADD KEY `FK_employee_dept` (`DEPTNO`);

--
-- Indexes for table `mgr`
--
ALTER TABLE `mgr`
  ADD PRIMARY KEY (`MGRNO`),
  ADD KEY `fk_mgr_dept` (`DEPTNO`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`PROJNO`),
  ADD KEY `fk_project_dept` (`DEPTNO`);

--
-- Indexes for table `supervision`
--
ALTER TABLE `supervision`
  ADD PRIMARY KEY (`EMPNO`),
  ADD KEY `fk_supervison_mgr` (`MGRNO`);

--
-- Indexes for table `works_on`
--
ALTER TABLE `works_on`
  ADD PRIMARY KEY (`EMPNO`,`PROJNO`),
  ADD KEY `fk_works_on_project` (`PROJNO`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_employee_dept` FOREIGN KEY (`DEPTNO`) REFERENCES `dept` (`DEPTNO`);

--
-- Constraints for table `mgr`
--
ALTER TABLE `mgr`
  ADD CONSTRAINT `fk_mgr_dept` FOREIGN KEY (`DEPTNO`) REFERENCES `dept` (`DEPTNO`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_project_dept` FOREIGN KEY (`DEPTNO`) REFERENCES `dept` (`DEPTNO`);

--
-- Constraints for table `supervision`
--
ALTER TABLE `supervision`
  ADD CONSTRAINT `fk_supervison_emp` FOREIGN KEY (`EMPNO`) REFERENCES `employee` (`EMPNO`),
  ADD CONSTRAINT `fk_supervison_mgr` FOREIGN KEY (`MGRNO`) REFERENCES `mgr` (`MGRNO`);

--
-- Constraints for table `works_on`
--
ALTER TABLE `works_on`
  ADD CONSTRAINT `fk_works_on_employee` FOREIGN KEY (`EMPNO`) REFERENCES `employee` (`EMPNO`),
  ADD CONSTRAINT `fk_works_on_project` FOREIGN KEY (`PROJNO`) REFERENCES `project` (`PROJNO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
