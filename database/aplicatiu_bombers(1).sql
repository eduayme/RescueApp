-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 11:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplicatiu_bombers`
--

-- --------------------------------------------------------

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-permissions', 'Create Permissions', 'This allows you to create permissions', '2020-03-04 11:35:42', '2020-03-04 11:35:42'),
(2, 'edit-permissions', 'Create Permissions', 'This allows you to edit permissions', '2020-03-04 11:35:42', '2020-03-04 11:35:42'),
(3, 'delete-permissions', 'Create Permissions', 'This allows you to delete permissions', '2020-03-04 11:35:42', '2020-03-04 11:35:42'),
(4, 'create-roles', 'Create Roles', 'This allows you to create roles', '2020-03-04 11:35:42', '2020-03-04 11:35:42'),
(5, 'edit-roles', 'Create Roles', 'This allows you to edit roles', '2020-03-04 11:35:42', '2020-03-04 11:35:42'),
(6, 'delete-roles', 'Create Roles', 'This allows you to delete roles', '2020-03-04 11:35:42', '2020-03-04 11:35:42');

-- --------------------------------------------------------

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Super Administrator', 'This is the administrator of our app', '2020-03-04 10:01:58', '2020-03-05 08:09:34'),
(2, 'admin', 'Admin', 'This user assists the administrator but has restricted access.', '2020-03-04 10:03:54', '2020-03-04 10:03:54'),
(3, 'firefighter', 'firefighter', 'The daring firefighter', '2020-03-04 10:06:11', '2020-03-04 10:06:11');


-- --------------------------------------------------------

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(1, 4, 'App\\User'),
(1, 5, 'App\\User'),
(1, 6, 'App\\User');

-- --------------------------------------------------------


--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(3, 3, 'App\\User');

-- --------------------------------------------------------
