-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2026 at 09:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `action`, `module`, `record_id`, `description`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 'CREATE', 'CUSTOMER', 1, 'Customer created successfully', '127.0.0.1', '2025-12-27 07:13:05', '2025-12-27 07:13:05'),
(2, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2025-12-27 07:13:26', '2025-12-27 07:13:26'),
(3, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2025-12-27 07:13:45', '2025-12-27 07:13:45'),
(4, 'CREATE', 'ITEM', 1, 'Item created successfully', '127.0.0.1', '2025-12-27 07:14:13', '2025-12-27 07:14:13'),
(5, 'CREATE', 'SQUARE_CONFIG', NULL, 'Square configuration created successfully', '127.0.0.1', '2025-12-27 07:15:11', '2025-12-27 07:15:11'),
(6, 'CREATE', 'INVOICE', 2, 'Invoice created with tax and Square payment link', '127.0.0.1', '2025-12-27 07:15:29', '2025-12-27 07:15:29'),
(7, 'PAYMENT', 'INVOICE', 2, 'Payment updated via Square webhook: COMPLETED', '127.0.0.1', '2025-12-27 07:15:46', '2025-12-27 07:15:46'),
(8, 'PAYMENT', 'INVOICE', 2, 'Payment updated via Square webhook: APPROVED', '127.0.0.1', '2025-12-27 07:15:48', '2025-12-27 07:15:48'),
(9, 'SYNC', 'INVOICE', 2, 'Invoice synced with Square payment status: COMPLETED', '127.0.0.1', '2025-12-27 07:18:26', '2025-12-27 07:18:26'),
(10, 'SMTP TEST', 'EMAIL', 3, 'Email configuration test successful', '127.0.0.1', '2025-12-27 08:19:29', '2025-12-27 08:19:29'),
(11, 'SMTP TEST', 'EMAIL', 3, 'Email configuration test successful', '127.0.0.1', '2025-12-27 08:21:34', '2025-12-27 08:21:34'),
(12, 'SMTP TEST', 'EMAIL', 3, 'Email configuration test successful', '127.0.0.1', '2025-12-27 08:24:07', '2025-12-27 08:24:07'),
(13, 'SYNC', 'INVOICE', 2, 'Invoice synced with Square payment status: COMPLETED', '127.0.0.1', '2026-01-01 00:18:01', '2026-01-01 00:18:01'),
(14, 'SMTP TEST', 'EMAIL', 3, 'Email configuration test successful', '127.0.0.1', '2026-01-01 00:18:47', '2026-01-01 00:18:47'),
(15, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2026-01-01 01:05:39', '2026-01-01 01:05:39'),
(16, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2026-01-01 01:05:45', '2026-01-01 01:05:45'),
(17, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2026-01-01 01:11:35', '2026-01-01 01:11:35'),
(18, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2026-01-01 01:12:13', '2026-01-01 01:12:13'),
(19, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2026-01-01 01:19:01', '2026-01-01 01:19:01'),
(20, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2026-01-01 01:19:22', '2026-01-01 01:19:22'),
(21, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2026-01-01 01:23:35', '2026-01-01 01:23:35'),
(22, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2026-01-01 01:24:34', '2026-01-01 01:24:34'),
(23, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2026-01-01 01:24:47', '2026-01-01 01:24:47'),
(24, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2026-01-01 01:24:47', '2026-01-01 01:24:47'),
(25, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2026-01-01 01:25:20', '2026-01-01 01:25:20'),
(26, 'UPDATE', 'CUSTOMER', 1, 'Customer updated successfully', '127.0.0.1', '2026-01-01 01:25:58', '2026-01-01 01:25:58'),
(27, 'CREATE', 'ITEM', 2, 'Item created successfully', '127.0.0.1', '2026-01-01 02:22:17', '2026-01-01 02:22:17'),
(28, 'CREATE', 'SQUARE_CONFIG', NULL, 'Square configuration created successfully', '127.0.0.1', '2026-01-01 02:31:02', '2026-01-01 02:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_code` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `phone_code`, `active`, `created_at`, `updated_at`) VALUES
(1, 'KUNAL CHAUDHARY', 'kunalchaudhary1331@gmail.com', '+91 9891322932', '+91', 1, '2025-12-27 07:13:05', '2026-01-01 01:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`id`, `customer_id`, `address_line1`, `address_line2`, `city`, `state`, `postal_code`, `country`, `created_at`, `updated_at`) VALUES
(1, 1, '31, Swaroop Park Lane', '31, Swaroop Park Lane', 'Ghaziabad', 'Uttar Pradesh', '201005', 'India', '2025-12-27 07:13:05', '2026-01-01 01:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `email_configurations`
--

CREATE TABLE `email_configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mailer` varchar(255) NOT NULL DEFAULT 'smtp',
  `host` varchar(255) NOT NULL,
  `port` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `encryption` varchar(255) DEFAULT NULL,
  `from_name` varchar(255) NOT NULL,
  `from_email` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_configurations`
--

INSERT INTO `email_configurations` (`id`, `mailer`, `host`, `port`, `username`, `password`, `encryption`, `from_name`, `from_email`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'smtp', 'smtp.mailosaur.net', 587, 'lfhnengh@mailosaur.net', 'enabaP5wFEKcOYeKLEin7fcupLpMcxhs', 'tls', 'Kunal Chaudhary', 'Kunalchaudhary1331@gmail.com', 1, '2025-12-27 08:13:10', '2025-12-27 08:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `email_layouts`
--

CREATE TABLE `email_layouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `header_html` longtext DEFAULT NULL,
  `footer_html` longtext DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_layouts`
--

INSERT INTO `email_layouts` (`id`, `name`, `header_html`, `footer_html`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'KUNAL CHAUDHARY', '<!-- Email Header -->\r\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color:#f8f9fa;padding:20px 0;\">\r\n    <tr>\r\n        <td align=\"center\">\r\n            <!-- Container -->\r\n            <table width=\"600\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color:#ffffff;border-radius:8px;\">\r\n                <tr>\r\n                    <td style=\"padding:20px;text-align:center;\">\r\n                        <!-- Logo -->\r\n                        <img src=\"https://avatars.githubusercontent.com/u/96905815?v=4\" \r\n                             alt=\"Company Logo\" width=\"150\" style=\"display:block;margin:auto;\">\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style=\"padding:10px 20px;text-align:center;font-family:Arial,sans-serif;color:#333333;\">\r\n                        <h1 style=\"margin:0;font-size:24px;\">Welcome to Our Service!</h1>\r\n                        <p style=\"margin:5px 0 0;font-size:14px;color:#555555;\">\r\n                            Delivering the best experience for your business.\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n            </table>\r\n            <!-- End Container -->\r\n        </td>\r\n    </tr>\r\n</table>\r\n<!-- End Email Header -->', '<!-- Email Footer -->\r\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color:#f8f9fa;padding:20px 0;\">\r\n    <tr>\r\n        <td align=\"center\">\r\n            <!-- Container -->\r\n            <table width=\"600\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"background-color:#ffffff;border-radius:8px;\">\r\n                <tr>\r\n                    <td style=\"padding:20px;text-align:center;font-family:Arial,sans-serif;color:#888888;font-size:12px;\">\r\n                        <p style=\"margin:0;\">\r\n                            &copy; 2025 Your Company Name. All rights reserved.\r\n                        </p>\r\n                        <p style=\"margin:5px 0 0;\">\r\n                            123 Business Street, City, Country\r\n                        </p>\r\n                        <p style=\"margin:5px 0 0;\">\r\n                            <a href=\"mailto:support@yourcompany.com\" style=\"color:#555555;text-decoration:none;\">support@yourcompany.com</a> |\r\n                            <a href=\"#\" style=\"color:#555555;text-decoration:none;\">Unsubscribe</a>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n            </table>\r\n            <!-- End Container -->\r\n        </td>\r\n    </tr>\r\n</table>\r\n<!-- End Email Footer -->', 1, '2025-12-27 09:17:05', '2025-12-27 09:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body_html` longtext NOT NULL,
  `variables` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`variables`)),
  `email_layout_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `body_html`, `variables`, `email_layout_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'INVOICE', 'Invoice Create Successfully', '<p>Hi hello ,</p>\r\n<p>&nbsp;</p>', '[\"invoice_number\"]', 3, 1, '2025-12-27 09:58:30', '2025-12-27 10:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `error_logs`
--

CREATE TABLE `error_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` varchar(255) NOT NULL,
  `error_type` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `trace` text DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `error_logs`
--

INSERT INTO `error_logs` (`id`, `module`, `error_type`, `message`, `trace`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 'INVOICE_CREATE', 'Exception', 'Square configuration or location ID missing', '#0 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php(46): App\\Http\\Controllers\\InvoiceController->store(Object(Illuminate\\Http\\Request))\n#1 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php(265): Illuminate\\Routing\\ControllerDispatcher->dispatch(Object(Illuminate\\Routing\\Route), Object(App\\Http\\Controllers\\InvoiceController), \'store\')\n#2 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php(211): Illuminate\\Routing\\Route->runController()\n#3 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(822): Illuminate\\Routing\\Route->run()\n#4 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Routing\\Router->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#5 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php(50): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#6 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Routing\\Middleware\\SubstituteBindings->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#7 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php(87): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#8 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#9 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php(48): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#10 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\View\\Middleware\\ShareErrorsFromSession->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#11 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php(120): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#12 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php(63): Illuminate\\Session\\Middleware\\StartSession->handleStatefulRequest(Object(Illuminate\\Http\\Request), Object(Illuminate\\Session\\Store), Object(Closure))\n#13 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Session\\Middleware\\StartSession->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#14 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php(36): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#15 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#16 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php(74): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#17 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Cookie\\Middleware\\EncryptCookies->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#18 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#19 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(821): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#20 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(800): Illuminate\\Routing\\Router->runRouteWithinStack(Object(Illuminate\\Routing\\Route), Object(Illuminate\\Http\\Request))\n#21 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(764): Illuminate\\Routing\\Router->runRoute(Object(Illuminate\\Http\\Request), Object(Illuminate\\Routing\\Route))\n#22 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(753): Illuminate\\Routing\\Router->dispatchToRoute(Object(Illuminate\\Http\\Request))\n#23 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(200): Illuminate\\Routing\\Router->dispatch(Object(Illuminate\\Http\\Request))\n#24 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Foundation\\Http\\Kernel->Illuminate\\Foundation\\Http\\{closure}(Object(Illuminate\\Http\\Request))\n#25 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#26 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php(31): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#27 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#28 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#29 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php(51): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#30 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\TrimStrings->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#31 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePostSize.php(27): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#32 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Http\\Middleware\\ValidatePostSize->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#33 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php(109): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#34 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#35 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\HandleCors.php(48): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#36 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Http\\Middleware\\HandleCors->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#37 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php(58): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#38 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Http\\Middleware\\TrustProxies->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#39 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks.php(22): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#40 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#41 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePathEncoding.php(26): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#42 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Http\\Middleware\\ValidatePathEncoding->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#43 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#44 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(175): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#45 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(144): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter(Object(Illuminate\\Http\\Request))\n#46 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1220): Illuminate\\Foundation\\Http\\Kernel->handle(Object(Illuminate\\Http\\Request))\n#47 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\public\\index.php(20): Illuminate\\Foundation\\Application->handleRequest(Object(Illuminate\\Http\\Request))\n#48 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\server.php(23): require_once(\'C:\\\\Users\\\\Kunal\\\\...\')\n#49 {main}', '127.0.0.1', '2025-12-27 07:15:01', '2025-12-27 07:15:01'),
(2, 'SMTP TEST', 'Symfony\\Component\\Mailer\\Exception\\TransportException', 'Connection could not be established with host \"ssl://smtp.mailosaur.net:587\": stream_socket_client(): SSL operation failed with code 1. OpenSSL Error messages:\nerror:0A00010B:SSL routines::wrong version number', '#0 [internal function]: Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\SocketStream->Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\{closure}(2, \'stream_socket_c...\', \'C:\\\\Users\\\\Kunal\\\\...\', 157)\n#1 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\symfony\\mailer\\Transport\\Smtp\\Stream\\SocketStream.php(157): stream_socket_client(\'ssl://smtp.mail...\', 0, \'\', 60.0, 4, Resource id #536)\n#2 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(268): Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\SocketStream->initialize()\n#3 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\app\\Http\\Controllers\\EmailController.php(57): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->start()\n#4 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php(46): App\\Http\\Controllers\\EmailController->test(\'3\')\n#5 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php(265): Illuminate\\Routing\\ControllerDispatcher->dispatch(Object(Illuminate\\Routing\\Route), Object(App\\Http\\Controllers\\EmailController), \'test\')\n#6 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php(211): Illuminate\\Routing\\Route->runController()\n#7 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(822): Illuminate\\Routing\\Route->run()\n#8 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Routing\\Router->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#9 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php(50): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#10 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Routing\\Middleware\\SubstituteBindings->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#11 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php(87): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#12 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#13 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php(48): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#14 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\View\\Middleware\\ShareErrorsFromSession->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#15 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php(120): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#16 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php(63): Illuminate\\Session\\Middleware\\StartSession->handleStatefulRequest(Object(Illuminate\\Http\\Request), Object(Illuminate\\Session\\Store), Object(Closure))\n#17 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Session\\Middleware\\StartSession->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#18 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php(36): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#19 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#20 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php(74): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#21 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Cookie\\Middleware\\EncryptCookies->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#22 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#23 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(821): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#24 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(800): Illuminate\\Routing\\Router->runRouteWithinStack(Object(Illuminate\\Routing\\Route), Object(Illuminate\\Http\\Request))\n#25 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(764): Illuminate\\Routing\\Router->runRoute(Object(Illuminate\\Http\\Request), Object(Illuminate\\Routing\\Route))\n#26 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(753): Illuminate\\Routing\\Router->dispatchToRoute(Object(Illuminate\\Http\\Request))\n#27 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(200): Illuminate\\Routing\\Router->dispatch(Object(Illuminate\\Http\\Request))\n#28 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Foundation\\Http\\Kernel->Illuminate\\Foundation\\Http\\{closure}(Object(Illuminate\\Http\\Request))\n#29 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#30 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php(31): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#31 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#32 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#33 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php(51): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#34 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\TrimStrings->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#35 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePostSize.php(27): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#36 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Http\\Middleware\\ValidatePostSize->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#37 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php(109): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#38 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#39 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\HandleCors.php(48): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#40 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Http\\Middleware\\HandleCors->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#41 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php(58): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#42 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Http\\Middleware\\TrustProxies->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#43 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks.php(22): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#44 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#45 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePathEncoding.php(26): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#46 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Http\\Middleware\\ValidatePathEncoding->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#47 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#48 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(175): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#49 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(144): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter(Object(Illuminate\\Http\\Request))\n#50 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1220): Illuminate\\Foundation\\Http\\Kernel->handle(Object(Illuminate\\Http\\Request))\n#51 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\public\\index.php(20): Illuminate\\Foundation\\Application->handleRequest(Object(Illuminate\\Http\\Request))\n#52 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\server.php(23): require_once(\'C:\\\\Users\\\\Kunal\\\\...\')\n#53 {main}', '127.0.0.1', '2025-12-27 08:17:09', '2025-12-27 08:17:09'),
(3, 'SMTP TEST', 'Symfony\\Component\\Mailer\\Exception\\TransportException', 'Connection could not be established with host \"ssl://smtp.mailosaur.net:587\": stream_socket_client(): SSL operation failed with code 1. OpenSSL Error messages:\nerror:0A00010B:SSL routines::wrong version number', '#0 [internal function]: Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\SocketStream->Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\{closure}(2, \'stream_socket_c...\', \'C:\\\\Users\\\\Kunal\\\\...\', 157)\n#1 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\symfony\\mailer\\Transport\\Smtp\\Stream\\SocketStream.php(157): stream_socket_client(\'ssl://smtp.mail...\', 0, \'\', 60.0, 4, Resource id #536)\n#2 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(268): Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\SocketStream->initialize()\n#3 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\app\\Http\\Controllers\\EmailController.php(57): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->start()\n#4 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php(46): App\\Http\\Controllers\\EmailController->test(\'3\')\n#5 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php(265): Illuminate\\Routing\\ControllerDispatcher->dispatch(Object(Illuminate\\Routing\\Route), Object(App\\Http\\Controllers\\EmailController), \'test\')\n#6 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php(211): Illuminate\\Routing\\Route->runController()\n#7 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(822): Illuminate\\Routing\\Route->run()\n#8 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Routing\\Router->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#9 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php(50): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#10 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Routing\\Middleware\\SubstituteBindings->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#11 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php(87): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#12 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#13 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php(48): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#14 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\View\\Middleware\\ShareErrorsFromSession->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#15 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php(120): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#16 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php(63): Illuminate\\Session\\Middleware\\StartSession->handleStatefulRequest(Object(Illuminate\\Http\\Request), Object(Illuminate\\Session\\Store), Object(Closure))\n#17 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Session\\Middleware\\StartSession->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#18 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php(36): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#19 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#20 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php(74): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#21 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Cookie\\Middleware\\EncryptCookies->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#22 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#23 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(821): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#24 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(800): Illuminate\\Routing\\Router->runRouteWithinStack(Object(Illuminate\\Routing\\Route), Object(Illuminate\\Http\\Request))\n#25 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(764): Illuminate\\Routing\\Router->runRoute(Object(Illuminate\\Http\\Request), Object(Illuminate\\Routing\\Route))\n#26 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(753): Illuminate\\Routing\\Router->dispatchToRoute(Object(Illuminate\\Http\\Request))\n#27 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(200): Illuminate\\Routing\\Router->dispatch(Object(Illuminate\\Http\\Request))\n#28 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Foundation\\Http\\Kernel->Illuminate\\Foundation\\Http\\{closure}(Object(Illuminate\\Http\\Request))\n#29 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#30 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php(31): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#31 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#32 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#33 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php(51): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#34 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\TrimStrings->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#35 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePostSize.php(27): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#36 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Http\\Middleware\\ValidatePostSize->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#37 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php(109): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#38 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#39 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\HandleCors.php(48): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#40 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Http\\Middleware\\HandleCors->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#41 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php(58): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#42 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Http\\Middleware\\TrustProxies->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#43 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks.php(22): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#44 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#45 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePathEncoding.php(26): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#46 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(219): Illuminate\\Http\\Middleware\\ValidatePathEncoding->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#47 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#48 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(175): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#49 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(144): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter(Object(Illuminate\\Http\\Request))\n#50 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1220): Illuminate\\Foundation\\Http\\Kernel->handle(Object(Illuminate\\Http\\Request))\n#51 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\public\\index.php(20): Illuminate\\Foundation\\Application->handleRequest(Object(Illuminate\\Http\\Request))\n#52 C:\\Users\\Kunal\\OneDrive\\Desktop\\invoice-system\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\server.php(23): require_once(\'C:\\\\Users\\\\Kunal\\\\...\')\n#53 {main}', '127.0.0.1', '2025-12-27 08:17:16', '2025-12-27 08:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `square_id` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('pending','paid','failed') NOT NULL DEFAULT 'pending',
  `receipt_path` varchar(255) DEFAULT NULL,
  `payment_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tax_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `grand_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `customer_id`, `invoice_number`, `sub_total`, `square_id`, `total`, `status`, `receipt_path`, `payment_link`, `created_at`, `updated_at`, `tax_total`, `grand_total`) VALUES
(2, 1, 'INV-20251227124525-386', 224.00, 'skk9m1LY3Hl8QKytSBImT3T6A8ZZY', 248.64, 'paid', 'invoices/Invoice-INV-20251227124525-386.pdf', 'https://sandbox.square.link/u/c00ZrZNI', '2025-12-27 07:15:25', '2025-12-27 07:15:47', 24.64, 248.64);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice_id`, `item_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 4, 56.00, '2025-12-27 07:15:26', '2025-12-27 07:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

CREATE TABLE `invoice_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_reference` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`payload`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_payments`
--

INSERT INTO `invoice_payments` (`id`, `invoice_id`, `amount`, `transaction_reference`, `status`, `payload`, `created_at`, `updated_at`) VALUES
(1, 2, 224.00, 'Z23nDizj0RPn43YBg7d8dWXK2pRZY', 'COMPLETED', '\"{\\\"id\\\":\\\"Z23nDizj0RPn43YBg7d8dWXK2pRZY\\\",\\\"created_at\\\":\\\"2025-12-27T12:45:43.819Z\\\",\\\"updated_at\\\":\\\"2025-12-27T12:45:43.946Z\\\",\\\"amount_money\\\":{\\\"amount\\\":22400,\\\"currency\\\":\\\"USD\\\"},\\\"total_money\\\":{\\\"amount\\\":22400,\\\"currency\\\":\\\"USD\\\"},\\\"status\\\":\\\"COMPLETED\\\",\\\"source_type\\\":\\\"EXTERNAL\\\",\\\"external_details\\\":{\\\"type\\\":\\\"CARD\\\",\\\"source\\\":\\\"Developer Control Panel\\\"},\\\"location_id\\\":\\\"LXXM7RAT2PWDR\\\",\\\"order_id\\\":\\\"skk9m1LY3Hl8QKytSBImT3T6A8ZZY\\\",\\\"capabilities\\\":[\\\"EDIT_AMOUNT_UP\\\",\\\"EDIT_AMOUNT_DOWN\\\",\\\"EDIT_TIP_AMOUNT_UP\\\",\\\"EDIT_TIP_AMOUNT_DOWN\\\"],\\\"receipt_number\\\":\\\"Z23n\\\",\\\"receipt_url\\\":\\\"https:\\\\\\/\\\\\\/squareupsandbox.com\\\\\\/receipt\\\\\\/preview\\\\\\/Z23nDizj0RPn43YBg7d8dWXK2pRZY\\\",\\\"application_details\\\":{\\\"square_product\\\":\\\"ECOMMERCE_API\\\",\\\"application_id\\\":\\\"sandbox-sq0idb-lky4CaPAWmDnHY3YtYxINg\\\"},\\\"version_token\\\":\\\"ACfxwg5aFpnGlGMh2fJ4QWwd2zkmTac0NFlfy6boHyJ6o\\\"}\"', '2025-12-27 07:15:46', '2026-01-01 00:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_taxes`
--

CREATE TABLE `invoice_taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `tax_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_taxes`
--

INSERT INTO `invoice_taxes` (`id`, `invoice_id`, `tax_id`, `amount`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 24.64, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `sku`, `description`, `price`, `quantity`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Item1', 'ITEM1', 'this is item 1', 56.00, 67, 1, '2025-12-27 07:14:13', '2025-12-27 07:14:13'),
(2, 'dsds', 'dsdsd', 'dsdsd', 0.02, 34, 1, '2026-01-01 02:22:17', '2026-01-01 02:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_20_111143_create_customer_table', 1),
(5, '2025_12_20_114602_create_activity_logs_table', 1),
(6, '2025_12_20_114623_create_error_logs_table', 1),
(7, '2025_12_20_124209_add_active_to_customer_table', 1),
(8, '2025_12_20_125436_create_items_table', 1),
(9, '2025_12_20_133126_create_square_configurations_table', 1),
(10, '2025_12_20_140014_create_invoices_table', 1),
(11, '2025_12_21_123552_add_square_id_to_invoices_table', 1),
(12, '2025_12_21_125636_add_square_and_receipt_to_invoices_table', 1),
(13, '2025_12_21_133322_create_company_settings_table', 1),
(14, '2025_12_21_142028_create_taxes_table', 1),
(15, '2025_12_21_142234_create_invoice_taxes_table', 1),
(16, '2025_12_21_142302_add_tax_columns_to_invoices', 1),
(17, '2025_12_27_130727_email_configuration', 2),
(18, '2025_12_27_135904_email_layouts', 3),
(19, '2025_12_27_163525_create_tinymce_configuration_table', 4),
(20, '2026_01_01_060322_add_phone_code_to_customer', 5),
(21, '2026_01_01_062422_create_notification_events_table', 6),
(22, '2026_01_01_062640_create_notification_event_templates_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notification_events`
--

CREATE TABLE `notification_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_events`
--

INSERT INTO `notification_events` (`id`, `key`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'invoice_created', 'INVOICE CREATED', 'send mail when invoice created', '2026-01-01 01:45:35', '2026-01-01 01:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `notification_event_templates`
--

CREATE TABLE `notification_event_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_event_id` bigint(20) UNSIGNED NOT NULL,
  `email_template_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_event_templates`
--

INSERT INTO `notification_event_templates` (`id`, `notification_event_id`, `email_template_id`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 1, '2026-01-01 01:54:05', '2026-01-01 01:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8a6OK2HxvZCFWBJnuULPECvYeno6iB0xNYSivSjJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWmNhVHE3cW1DUWNFaXNqTFRCejVwUXFaZ3JCSTRTMnhmYlVMUkprZyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFuc2FjdGlvbnM/MT0iO3M6NToicm91dGUiO3M6MTg6InRyYW5zYWN0aW9ucy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767256154);

-- --------------------------------------------------------

--
-- Table structure for table `square_configurations`
--

CREATE TABLE `square_configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_name` varchar(255) NOT NULL,
  `config` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`config`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `square_configurations`
--

INSERT INTO `square_configurations` (`id`, `merchant_name`, `config`, `created_at`, `updated_at`) VALUES
(1, 'square', '{\"access_token\":\"EAAAl9bGkUnWIIdd6YuJ76_W4ykpbFqd69qeF45H8l8fd2yNrKWoBAViH0nwS1Fu\",\"environment\":\"sandbox\",\"location_id\":\"LXXM7RAT2PWDR\"}', '2025-12-27 07:15:11', '2025-12-27 07:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `rate` decimal(8,2) NOT NULL,
  `type` enum('percent','fixed') NOT NULL DEFAULT 'percent',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `rate`, `type`, `active`, `created_at`, `updated_at`) VALUES
(1, 'GST', 11.00, 'percent', 1, '2025-12-27 07:14:47', '2025-12-27 10:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `tinymce_configuration`
--

CREATE TABLE `tinymce_configuration` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tinymce_configuration`
--

INSERT INTO `tinymce_configuration` (`id`, `api_key`, `created_at`, `updated_at`) VALUES
(1, 'mqc9critr261wkdx3fco0cv03guut7dvo3ap6xogpj8nv0oz', '2025-12-27 11:09:02', '2025-12-27 11:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_email_unique` (`email`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_address_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `email_configurations`
--
ALTER TABLE `email_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_layouts`
--
ALTER TABLE `email_layouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_templates_email_layout_id_foreign` (`email_layout_id`);

--
-- Indexes for table `error_logs`
--
ALTER TABLE `error_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`),
  ADD KEY `invoices_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_items_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_payments_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `invoice_taxes`
--
ALTER TABLE `invoice_taxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_taxes_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_taxes_tax_id_foreign` (`tax_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_events`
--
ALTER TABLE `notification_events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notification_events_key_unique` (`key`);

--
-- Indexes for table `notification_event_templates`
--
ALTER TABLE `notification_event_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_event_templates_notification_event_id_foreign` (`notification_event_id`),
  ADD KEY `notification_event_templates_email_template_id_foreign` (`email_template_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `square_configurations`
--
ALTER TABLE `square_configurations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `square_configurations_merchant_name_unique` (`merchant_name`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinymce_configuration`
--
ALTER TABLE `tinymce_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_configurations`
--
ALTER TABLE `email_configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_layouts`
--
ALTER TABLE `email_layouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `error_logs`
--
ALTER TABLE `error_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_taxes`
--
ALTER TABLE `invoice_taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notification_events`
--
ALTER TABLE `notification_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification_event_templates`
--
ALTER TABLE `notification_event_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `square_configurations`
--
ALTER TABLE `square_configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tinymce_configuration`
--
ALTER TABLE `tinymce_configuration`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD CONSTRAINT `email_templates_email_layout_id_foreign` FOREIGN KEY (`email_layout_id`) REFERENCES `email_layouts` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD CONSTRAINT `invoice_payments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_taxes`
--
ALTER TABLE `invoice_taxes`
  ADD CONSTRAINT `invoice_taxes_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_taxes_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_event_templates`
--
ALTER TABLE `notification_event_templates`
  ADD CONSTRAINT `notification_event_templates_email_template_id_foreign` FOREIGN KEY (`email_template_id`) REFERENCES `email_templates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_event_templates_notification_event_id_foreign` FOREIGN KEY (`notification_event_id`) REFERENCES `notification_events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
