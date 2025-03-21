-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 09:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------


ALTER TABLE `new_sales`
DROP FOREIGN KEY new_sales_fk5;

ALTER TABLE `new_sales` 
DROP INDEX `new_sales_fk5`;

COMMIT;


ALTER TABLE `new_sales`
  DROP `tally_category`;
  
COMMIT;
    
ALTER TABLE `new_sales` 
ADD `tally_category` INT NULL DEFAULT NULL 
COMMENT 'Tally sales category' AFTER `distance`;

COMMIT;

ALTER TABLE `new_sales`
ADD CONSTRAINT new_sales_fk5 FOREIGN KEY (tally_category)
REFERENCES sales_category (sales_category_id)
ON UPDATE CASCADE ON DELETE SET NULL;

COMMIT;

-- --------------------------------------------------------------
INSERT INTO `DB_Upgrade`(`Script_name`, `updated_time`)
       VALUES('104-AROM-140A-Tally-Sales-Category-updates.sql', CURRENT_TIMESTAMP);
	   
COMMIT;	   
