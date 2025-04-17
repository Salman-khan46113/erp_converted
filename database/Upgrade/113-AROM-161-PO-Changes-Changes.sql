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

INSERT INTO `global_configuration` (`id`, `displayLabel`, `config_name`, `config_value`, `isActive`, `ARMUserOnly`, `note`, `canModify`, `updatedttm`, `updated_user`) VALUES (NULL, 'Po Pdf Logo', 'poPdfLogo', 'Yes', '1', '1', 'Po Pdf Logo Enable /Disable', '1', CURRENT_TIMESTAMP, '');

INSERT INTO `global_configuration` (`id`, `displayLabel`, `config_name`, `config_value`, `isActive`, `ARMUserOnly`, `note`, `canModify`, `updatedttm`, `updated_user`)
VALUES (NULL, 'Po Pdf Image Signature Enable', 'POPdfSignatureImgEnable', 'Yes', '1', '1', 'Po Pdf Image Signature Enable/Disable', '1', CURRENT_TIMESTAMP, ''),(NULL, 'Po Pdf Signature Image', 'PoPdfSignatureImg', '', '1', '1', 'Po Pdf Signature Image', '1', CURRENT_TIMESTAMP, '');

ALTER TABLE `new_po` ADD `target_delivery_date` DATE NULL AFTER `discount`;

COMMIT;

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
    'Triton Purchase Order Changes Enable',
    'TritonPurchaseOrderChange',
    'No',
    1,
    1,
    'Triton Purchase Order Changes Enable',
    1,
    CURRENT_TIMESTAMP,
    'arom'
);


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
    'Triton Purchase Order Billing Contact Person',
    'TritonPurchaseOrderBillingContactPerson',
    '',
    1,
    1,
    'Triton Purchase Order Billing Contact Person',
    1,
    CURRENT_TIMESTAMP,
    'arom'
);

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
    'Triton Purchase Order Shipping Contact Person',
    'TritonPurchaseOrderShippingContactPerson',
    '',
    1,
    1,
    'Triton Purchase Order Shipping Contact Person',
    1,
    CURRENT_TIMESTAMP,
    'arom'
);

COMMIT;

ALTER TABLE `supplier` CHANGE `mobile_no` `mobile_no` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;

INSERT INTO `DB_Upgrade` (`Script_name`, `updated_time`) VALUES ('113-AROM-161-PO-Changes-Changes.sql', CURRENT_TIMESTAMP);

COMMIT;