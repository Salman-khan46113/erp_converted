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
INSERT INTO global_configuration (displayLabel, config_name, config_value, isActive, ARMUserOnly, note, canModify, updatedttm, updated_user, category, type) VALUES
('RM Count', 'RMCount', 'Yes', 1, 1, 'RM Count', 1, '2025-03-09 16:12:31', 'arom', 'PO', 'input');
ALTER TABLE grn_details ADD route_count INT NULL AFTER qty;
ALTER TABLE grn_details ADD verified_route_count INT NULL DEFAULT '0' AFTER verified_qty;
ALTER TABLE grn_details ADD accept_route_count INT NOT NULL DEFAULT '0' AFTER reject_qty;
ALTER TABLE child_part_stock ADD route_count INT NOT NULL DEFAULT '0' AFTER stock;
ALTER TABLE stock_changes ADD route INT NOT NULL DEFAULT '0' AFTER qty;
ALTER TABLE stock_changes ADD accepted_route_qty INT NOT NULL DEFAULT '0' AFTER accepted_qty;

INSERT INTO `DB_Upgrade` (`Script_name`, `updated_time`) 
VALUES ('116-AROM-95-RM-Count.sql', CURRENT_TIMESTAMP);

COMMIT;
