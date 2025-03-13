-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 12:01 PM
-- Server version: 8.0.40-0ubuntu0.20.04.1
-- PHP Version: 7.0.33-75+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

ALTER TABLE customer ADD tds DECIMAL(15,2) NOT NULL DEFAULT '0' AFTER emailId;
INSERT INTO `widget` (`tab_name`, `widget_name`, `widget_type`, `widget_funtion`, `status`) VALUES
('Account', 'TOTAL_TDS', 'Block', 'get_total_receivable_tds', 'Active');

ALTER TABLE `receivable_report` ADD `debit_amount` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `tds_amount`;


INSERT INTO `DB_Upgrade` (`Script_name`, `updated_time`) 
VALUES ('112-AROM-23B-Receivable-Report-Changes.sql', CURRENT_TIMESTAMP);

COMMIT;