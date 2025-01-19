-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 08:27 AM
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
-- Database: `db_job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Finance', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(2, 'Marketing', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(3, 'IT', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(4, 'Sales', 1, '2024-12-15 21:04:28', '2024-12-19 05:36:31'),
(5, 'HR', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(6, 'Operations', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(7, 'Legal', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(8, 'R&D', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(9, 'Logistics', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(10, 'Consulting', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(11, 'Customer Support', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(12, 'Public Relations', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(13, 'Engineering', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(14, 'Design', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(15, 'Healthcare', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(16, 'Education', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(17, 'Real Estate', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(18, 'Construction', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(19, 'Media', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(20, 'Government', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `job_type_id` bigint(20) UNSIGNED NOT NULL,
  `vacancy` int(11) NOT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `responsibility` text DEFAULT NULL,
  `qualification` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `experience` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_location` varchar(255) DEFAULT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `isFeatured` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `user_id`, `category_id`, `job_type_id`, `vacancy`, `salary`, `location`, `description`, `benefits`, `responsibility`, `qualification`, `keywords`, `experience`, `company_name`, `company_location`, `company_website`, `status`, `isFeatured`, `created_at`, `updated_at`) VALUES
(1, 'General Job Role', 1, 14, 4, 5, '3000-5000', 'New York', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '5', 'Tech Solutions Inc.', 'New York', 'https://www.techsolutionsinc..com', 1, 1, '2024-12-15 21:11:45', '2024-12-15 21:11:45'),
(3, 'General Job Role', 3, 4, 2, 2, '2000-3300', 'Charlotte', 'Drive sales and engage with clients to meet targets and deliver customer satisfaction.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'sales, representative, customer engagement, targets, business development', '3', 'Sales Drive', 'Charlotte', 'https://www.salesdrive.com', 1, 1, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(4, 'Network Engineer - Contract', 2, 3, 4, 2, '2700-4000', 'San Diego', 'Work with the IT and network teams to support, develop, and maintain infrastructure.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'IT, network engineer, support, infrastructure, technology', '2', 'Finance Experts', 'San Diego', 'https://www.financeexperts.com', 1, 1, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(5, 'General Job Role', 2, 6, 1, 3, '3000-4200', 'Dallas', 'Assist in operations, logistics, and overall organizational productivity.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'operations, logistics, management, productivity, processes', '5', 'Marketing Wizards', 'Dallas', 'https://www.marketingwizards.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(6, 'General Job Role', 1, 10, 2, 10, '2500-4000', 'Los Angeles', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '4', 'Bright Future LLC', 'Los Angeles', 'https://www.brightfuturellc.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(7, 'General Job Role', 3, 12, 2, 5, '2800-4300', 'San Francisco', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '1', 'Customer Care', 'San Francisco', 'https://www.customercare.com', 1, 1, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(8, 'General Job Role', 2, 18, 2, 5, '2500-3700', 'San Jose', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '5', 'IT Gurus', 'San Jose', 'https://www.itgurus.com', 1, 1, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(9, 'General Job Role', 3, 15, 5, 1, '2700-4000', 'Indianapolis', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '1', 'Real Estate Pros', 'Indianapolis', 'https://www.realestatepros.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(10, 'General Job Role', 1, 16, 2, 8, '2000-3500', 'Chicago', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '4', 'Innovatech Co.', 'Chicago', 'https://www.innovatechco..com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(11, 'General Job Role', 3, 14, 3, 3, '3000-4500', 'Seattle', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '3', 'Legal Pathways', 'Seattle', 'https://www.legalpathways.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(12, 'General Job Role', 1, 8, 1, 3, '1500-2500', 'Houston', 'Contribute to the development of research projects and technological advancements.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'R&D, research, development, specialist, innovation', '2', 'Green Energy Corp.', 'Houston', 'https://www.greenenergycorp..com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(13, 'General Job Role', 3, 12, 1, 4, '3200-4800', 'Denver', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '4', 'Engineering Works', 'Denver', 'https://www.engineeringworks.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(14, 'General Job Role', 3, 20, 2, 2, '2800-4500', 'Washington', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '4', 'R&D Innovators', 'Washington', 'https://www.r&dinnovators.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(15, 'Operations Intern', 3, 6, 3, 5, '2600-4000', 'Boston', 'Assist in operations, logistics, and overall organizational productivity.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'operations, logistics, management, productivity, processes', '1', 'Health Heroes', 'Boston', 'https://www.healthheroes.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(16, 'Operations Intern', 2, 6, 3, 4, '2000-3000', 'Austin', 'Assist in operations, logistics, and overall organizational productivity.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'operations, logistics, management, productivity, processes', '5', 'Education Stars', 'Austin', 'https://www.educationstars.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(17, 'General Job Role', 1, 20, 3, 7, '2800-4500', 'Phoenix', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '5', 'HealthCare Plus', 'Phoenix', 'https://www.healthcareplus.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(18, 'Financial Advisor - Contract', 3, 1, 4, 2, '2400-3600', 'El Paso', 'Join our financial team to manage projects and assist with strategic financial goals.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'finance, advisor, analyst, strategic planning, financial goals', '4', 'Construction Power', 'El Paso', 'https://www.constructionpower.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(19, 'General Job Role', 3, 20, 2, 4, '3100-5000', 'Detroit', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '4', 'Creative Media', 'Detroit', 'https://www.creativemedia.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(20, 'General Job Role', 2, 8, 2, 4, '3500-5500', 'Jacksonville', 'Contribute to the development of research projects and technological advancements.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'R&D, research, development, specialist, innovation', '2', 'Government Solutions', 'Jacksonville', 'https://www.governmentsolutions.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(21, 'General Job Role', 3, 8, 1, 5, '2800-4300', 'Nashville', 'Contribute to the development of research projects and technological advancements.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'R&D, research, development, specialist, innovation', '4', 'Operations Experts', 'Nashville', 'https://www.operationsexperts.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(22, 'General Job Role', 2, 14, 1, 1, '1800-2600', 'Fort Worth', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '4', 'Media Masters', 'Fort Worth', 'https://www.mediamasters.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(23, 'General Job Role', 1, 15, 5, 4, '3200-5000', 'Philadelphia', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '4', 'BuildIt Construction', 'Philadelphia', 'https://www.builditconstruction.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(24, 'General Job Role', 3, 20, 4, 2, '2900-4600', 'Portland', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '1', 'Consulting Champs', 'Portland', 'https://www.consultingchamps.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(25, 'General Job Role', 1, 13, 2, 6, '4000-6000', 'San Antonio', 'Work with our team on exciting projects tailored to your expertise.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'general, job, role, work, opportunity', '5', 'Creative Minds', 'San Antonio', 'https://www.creativeminds.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(26, 'General Job Role', 3, 8, 4, 3, '2600-3800', 'Las Vegas', 'Contribute to the development of research projects and technological advancements.', 'Health insurance, paid time off, retirement plans, and professional development.', 'Coordinate with team members, manage project deadlines, and ensure quality of work.', 'Bachelor\'s degree in a related field and relevant work experience.', 'R&D, research, development, specialist, innovation', '5', 'Startup Boost', 'Las Vegas', 'https://www.startupboost.com', 1, 0, '2024-12-15 21:25:33', '2024-12-15 21:25:33'),
(27, 'Sales Representative - Internship', 2, 4, 3, 1, NULL, 'Rogahnchester', 'Drive sales and engage with clients to meet targets and deliver customer satisfaction.', NULL, NULL, NULL, 'sales, representative, customer engagement, targets, business development', '1', 'Otto Wintheiser', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(28, 'General Job Role', 3, 12, 2, 1, NULL, 'Kelsiburgh', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '4', 'Mrs. Ellen Moore Jr.', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(29, 'General Job Role', 3, 10, 3, 1, NULL, 'Cliffordton', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '1', 'Zoila Williamson', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(30, 'Design Consultant - Freelance', 3, 9, 5, 5, NULL, 'Alfonzoburgh', 'Work on creative designs, graphics, and visual storytelling for projects.', NULL, NULL, NULL, 'design, graphics, creative, consultant, visual storytelling', '2', 'Autumn Schaden V', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(31, 'General Job Role', 2, 20, 2, 1, NULL, 'Parisianfort', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '6', 'Green Wyman', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(32, 'General Job Role', 1, 15, 5, 1, NULL, 'North Seanhaven', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '6', 'Keven Schaden', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(33, 'General Job Role', 3, 19, 5, 4, NULL, 'Morissettemouth', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '3', 'Karen Friesen', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(34, 'General Job Role', 1, 18, 3, 2, NULL, 'Eugeniabury', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '6', 'Garnet Quigley', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(35, 'General Job Role', 1, 9, 1, 2, NULL, 'New Dayna', 'Work on creative designs, graphics, and visual storytelling for projects.', NULL, NULL, NULL, 'design, graphics, creative, consultant, visual storytelling', '7', 'Lucinda Schaden', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(36, 'General Job Role', 1, 1, 5, 3, NULL, 'New Eduardofurt', 'Join our financial team to manage projects and assist with strategic financial goals.', NULL, NULL, NULL, 'finance, advisor, analyst, strategic planning, financial goals', '7', 'Ladarius Turcotte', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(37, 'General Job Role', 2, 11, 2, 4, NULL, 'Shieldsside', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '8', 'Kattie Cassin', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(38, 'General Job Role', 3, 20, 4, 2, NULL, 'East Bo', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '6', 'Prof. Isabel Crona Jr.', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(39, 'General Job Role', 1, 11, 1, 3, NULL, 'Harrisbury', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '10', 'Emile Mertz', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(40, 'General Job Role', 2, 5, 1, 4, NULL, 'West Lemuelland', 'Support HR activities, employee relations, and recruitment processes.', NULL, NULL, NULL, 'human resources, HR, recruitment, employee relations, training', '1', 'Prof. Elbert Becker', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(41, 'General Job Role', 3, 16, 4, 3, NULL, 'East Sean', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '2', 'Stephanie Block', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(42, 'General Job Role', 2, 8, 2, 5, NULL, 'New Tannerland', 'Contribute to the development of research projects and technological advancements.', NULL, NULL, NULL, 'R&D, research, development, specialist, innovation', '4', 'Daphnee Hermiston', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(43, 'General Job Role', 1, 9, 3, 4, NULL, 'Harrismouth', 'Work on creative designs, graphics, and visual storytelling for projects.', NULL, NULL, NULL, 'design, graphics, creative, consultant, visual storytelling', '8', 'Mrs. Tanya Schmeler V', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(44, 'General Job Role', 3, 13, 5, 1, NULL, 'South Collinhaven', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '10', 'Dimitri Crona', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(45, 'General Job Role', 2, 5, 1, 2, NULL, 'Hettingerside', 'Support HR activities, employee relations, and recruitment processes.', NULL, NULL, NULL, 'human resources, HR, recruitment, employee relations, training', '2', 'Otha Ernser', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(46, 'General Job Role', 1, 8, 5, 2, NULL, 'Harrisonburgh', 'Contribute to the development of research projects and technological advancements.', NULL, NULL, NULL, 'R&D, research, development, specialist, innovation', '2', 'Modesta Cummings', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(47, 'Operations Intern', 3, 6, 3, 1, NULL, 'East Averyfort', 'Assist in operations, logistics, and overall organizational productivity.', NULL, NULL, NULL, 'operations, logistics, management, productivity, processes', '7', 'Elnora Barton', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(48, 'General Job Role', 1, 4, 5, 2, NULL, 'North Franco', 'Drive sales and engage with clients to meet targets and deliver customer satisfaction.', NULL, NULL, NULL, 'sales, representative, customer engagement, targets, business development', '1', 'Prof. Laverne Douglas I', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(49, 'General Job Role', 2, 11, 1, 2, NULL, 'South Hans', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '3', 'Dr. Amara Braun DDS', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(50, 'General Job Role', 2, 14, 3, 4, NULL, 'Hanetown', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '6', 'Shanie Mosciski DDS', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(51, 'General Job Role', 3, 8, 5, 5, NULL, 'New Karinaburgh', 'Contribute to the development of research projects and technological advancements.', NULL, NULL, NULL, 'R&D, research, development, specialist, innovation', '2', 'Drake Labadie', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(52, 'General Job Role', 1, 12, 3, 1, NULL, 'Arloview', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '5', 'Prof. Hollis DuBuque DVM', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(53, 'General Job Role', 3, 12, 4, 4, NULL, 'Brekkemouth', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '9', 'Gregorio Gerhold', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(54, 'General Job Role', 1, 14, 3, 5, NULL, 'East Addieland', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '10', 'Prof. Krista Schulist DVM', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(55, 'General Job Role', 2, 10, 2, 3, NULL, 'Naomiview', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '6', 'Mr. Jonathon Little Jr.', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(56, 'General Job Role', 3, 17, 4, 1, NULL, 'West Kyla', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '10', 'Mrs. Deborah Steuber DDS', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(57, 'General Job Role', 1, 10, 5, 1, NULL, 'Adolphusside', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '7', 'Trinity Koch PhD', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(58, 'General Job Role', 3, 6, 1, 4, NULL, 'Port Duane', 'Assist in operations, logistics, and overall organizational productivity.', NULL, NULL, NULL, 'operations, logistics, management, productivity, processes', '3', 'Dr. Ariel Reinger', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(59, 'General Job Role', 2, 18, 3, 4, NULL, 'East Maybell', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '4', 'Manuel Jacobson', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(60, 'IT Support Specialist - Part-Time', 2, 3, 2, 4, NULL, 'Lake Hoytberg', 'Work with the IT and network teams to support, develop, and maintain infrastructure.', NULL, NULL, NULL, 'IT, network engineer, support, infrastructure, technology', '1', 'Miss Tierra Ebert', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(61, 'General Job Role', 2, 16, 4, 3, NULL, 'Keltonfort', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '1', 'Hilda Prohaska', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(62, 'Research Assistant - Part-Time', 3, 7, 2, 1, NULL, 'North Domenica', 'Conduct innovative research and analysis as part of our R&D team.', NULL, NULL, NULL, 'research, scientist, innovation, analysis, experiments', '2', 'Roberto Paucek I', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(63, 'Sales Executive - Full-Time', 3, 4, 1, 4, NULL, 'Abbottshire', 'Drive sales and engage with clients to meet targets and deliver customer satisfaction.', NULL, NULL, NULL, 'sales, representative, customer engagement, targets, business development', '9', 'Skylar Eichmann', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(64, 'HR Assistant - Internship', 3, 5, 3, 4, NULL, 'Daisymouth', 'Support HR activities, employee relations, and recruitment processes.', NULL, NULL, NULL, 'human resources, HR, recruitment, employee relations, training', '6', 'Prof. Ashtyn Gulgowski', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(65, 'General Job Role', 2, 19, 5, 1, NULL, 'Okunevaland', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '8', 'Domenico Tromp', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(66, 'General Job Role', 3, 16, 5, 2, NULL, 'Hillhaven', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '2', 'Martine Conn DDS', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(67, 'General Job Role', 3, 15, 2, 1, NULL, 'Josianeborough', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '10', 'Maci Reichel', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(68, 'General Job Role', 3, 12, 5, 3, NULL, 'Connellymouth', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '7', 'Della Tromp', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(69, 'General Job Role', 2, 15, 3, 1, NULL, 'Leannontown', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '10', 'Miss Faye Stamm', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(70, 'General Job Role', 2, 9, 2, 4, NULL, 'West Robertahaven', 'Work on creative designs, graphics, and visual storytelling for projects.', NULL, NULL, NULL, 'design, graphics, creative, consultant, visual storytelling', '5', 'Dr. Cleta Cartwright', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(71, 'General Job Role', 1, 6, 5, 5, NULL, 'New Norwood', 'Assist in operations, logistics, and overall organizational productivity.', NULL, NULL, NULL, 'operations, logistics, management, productivity, processes', '7', 'Jade DuBuque', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(72, 'General Job Role', 2, 15, 3, 2, NULL, 'East Myrl', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '2', 'Aniya Zulauf DDS', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(73, 'General Job Role', 1, 7, 5, 3, NULL, 'Powlowskifurt', 'Conduct innovative research and analysis as part of our R&D team.', NULL, NULL, NULL, 'research, scientist, innovation, analysis, experiments', '5', 'Eloisa Johnson', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(74, 'General Job Role', 2, 7, 3, 4, NULL, 'Teaganbury', 'Conduct innovative research and analysis as part of our R&D team.', NULL, NULL, NULL, 'research, scientist, innovation, analysis, experiments', '6', 'Karianne Nader', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(75, 'General Job Role', 3, 10, 5, 5, NULL, 'Lake Clydebury', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '1', 'Eileen Shields', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07'),
(76, 'General Job Role', 1, 12, 4, 4, NULL, 'North Kobyton', 'Work with our team on exciting projects tailored to your expertise.', NULL, NULL, NULL, 'general, job, role, work, opportunity', '1', 'Dr. Caroline Hills V', NULL, NULL, 1, 0, '2024-12-17 07:46:07', '2024-12-17 07:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `applied_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `job_id`, `user_id`, `employer_id`, `applied_date`, `created_at`, `updated_at`) VALUES
(9, 15, 1, 2, '2024-12-18 14:58:32', '2024-12-18 09:11:02', '2024-12-18 09:11:02'),
(10, 15, 3, 2, '2024-12-18 14:59:07', '2024-12-18 09:12:34', '2024-12-18 09:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Full Time', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(2, 'Part Time', 1, '2024-12-15 21:04:28', '2024-12-19 05:34:56'),
(3, 'Internship', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(4, 'Contract', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(5, 'Freelance', 1, '2024-12-15 21:04:28', '2024-12-15 21:04:28'),
(6, 'Others', 1, '2024-12-16 23:23:28', '2024-12-16 23:23:28');

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
(2, '2024_12_15_072341_create_categories_table', 1),
(3, '2024_12_15_072413_create_job_types_table', 1),
(4, '2024_12_15_072446_create_jobs_table', 1),
(5, '2024_12_13_124316_job_applications_table', 2),
(6, '2024_12_13_124349_saved_jobs_table', 2),
(7, '2024_12_19_092001_alter_users_table', 3);

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
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_jobs`
--

INSERT INTO `saved_jobs` (`id`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-12-18 04:32:40', '2024-12-18 04:32:40'),
(3, 3, 4, '2024-12-18 22:17:49', '2024-12-18 22:17:49');

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
('tyfKBJmushAaJWaKZ9F38QqSJ8do3MSC0aKgiKRl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicnlHSzA0a1gwN05rV0RGYUt4OWxhWDBtcUFHUjZQdm1DbXUxOHdWdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2NvdW50L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737271611);

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
  `image` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `designation`, `mobile`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test Account', 'Test@test.com', NULL, '$2y$12$qjRDIwz6cht7pXBtjFUMoe.RjQI30AkRXP80YhMDFLVdveWQNJNMW', NULL, 'Test Mode', NULL, 'user', NULL, '2024-12-15 21:07:17', '2024-12-18 20:41:50'),
(2, 'Test2', 'agarwaltarun777@gmail.com', NULL, '$2y$12$qjRDIwz6cht7pXBtjFUMoe.RjQI30AkRXP80YhMDFLVdveWQNJNMW', NULL, NULL, NULL, 'user', NULL, '2024-12-15 21:24:46', '2024-12-15 21:24:46'),
(3, 'Test3', 'Test3@test.com', NULL, '$2y$12$qjRDIwz6cht7pXBtjFUMoe.RjQI30AkRXP80YhMDFLVdveWQNJNMW', NULL, NULL, NULL, 'user', NULL, '2024-12-15 21:25:01', '2024-12-18 10:28:59'),
(4, 'TBC Admin', 'atarun21@tbc.edu.np', NULL, '$2y$12$qjRDIwz6cht7pXBtjFUMoe.RjQI30AkRXP80YhMDFLVdveWQNJNMW', '4-1734580887.jpg', 'Admin', NULL, 'admin', NULL, '2024-12-18 22:15:54', '2024-12-18 22:17:20'),
(5, 'Test', 'test2@test.com', NULL, '$2y$12$qjRDIwz6cht7pXBtjFUMoe.RjQI30AkRXP80YhMDFLVdveWQNJNMW', NULL, NULL, NULL, 'user', NULL, '2025-01-19 01:40:28', '2025-01-19 01:40:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`),
  ADD KEY `jobs_category_id_foreign` (`category_id`),
  ADD KEY `jobs_job_type_id_foreign` (`job_type_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`),
  ADD KEY `job_applications_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saved_jobs_job_id_foreign` (`job_id`),
  ADD KEY `saved_jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_job_type_id_foreign` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD CONSTRAINT `saved_jobs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `saved_jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
