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

UPDATE `widget` SET `widget_type` = 'Table' WHERE `widget`.`widget_id` = 5;
INSERT INTO `widget` (`widget_id`, `tab_name`, `widget_name`, `widget_type`, `widget_funtion`, `status`) VALUES (NULL, 'Production', 'CURRENT_MONTH_PLAN_PRODUCTION', 'Table', 'get_current_month_plan', 'Active');

INSERT INTO `global_configuration`(
    `displayLabel`,
    `config_name`,
    `config_value`,
    `isActive`,
    `ARMUserOnly`,
    `note`,
    `canModify`,
    `updatedttm`,
    `updated_user`
)
VALUES(
    'monthly Schedule Send Email',
    'MontlyScheduleSenderEmail',
    '',
    1,
    1,
    'User for monthly schedule send email',
    1,
    CURRENT_TIMESTAMP,
    'arom'
);


INSERT INTO `DB_Upgrade` (`Script_name`, `updated_time`) 
VALUES ('114-AROM-161-PO-Changes-Changes.sql', CURRENT_TIMESTAMP);

COMMIT;
