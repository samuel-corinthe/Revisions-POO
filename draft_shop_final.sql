-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 13 oct. 2025 à 13:37
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `draft_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `createdAt`, `updatedAt`) VALUES
(1, 'Vêtements', 'Tous les vêtements', '2025-10-08 14:16:36', '2025-10-08 14:16:36'),
(2, 'Électronique', 'Appareils électroniques', '2025-10-08 14:16:36', '2025-10-08 14:16:36');

-- --------------------------------------------------------

--
-- Structure de la table `clothing`
--

DROP TABLE IF EXISTS `clothing`;
CREATE TABLE IF NOT EXISTS `clothing` (
  `product_id` int NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `material_fee` int DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clothing`
--

INSERT INTO `clothing` (`product_id`, `size`, `color`, `type`, `material_fee`) VALUES
(18, 'M', 'Bleu', 'T-shirt', 300),
(20, 'M', 'Bleu', 'T-shirt', 300),
(22, 'M', 'Bleu', 'T-shirt', 300),
(24, 'M', 'Bleu', 'T-shirt', 300),
(26, 'M', 'Bleu', 'T-shirt', 300),
(28, 'M', 'Bleu', 'T-shirt', 300),
(30, 'M', 'Bleu', 'T-shirt', 300),
(32, 'M', 'Bleu', 'T-shirt', 300),
(34, 'M', 'Bleu', 'T-shirt', 300),
(36, 'M', 'Bleu', 'T-shirt', 300),
(38, 'M', 'Bleu', 'T-shirt', 300),
(40, 'M', 'Bleu', 'T-shirt', 300),
(42, 'M', 'Bleu', 'T-shirt', 300),
(44, 'M', 'Bleu', 'T-shirt', 300),
(46, 'M', 'Bleu', 'T-shirt', 300),
(48, 'M', 'Bleu', 'T-shirt', 300),
(50, 'M', 'Bleu', 'T-shirt', 300),
(52, 'M', 'Bleu', 'T-shirt', 300),
(54, 'M', 'Bleu', 'T-shirt', 300),
(56, 'M', 'Bleu', 'T-shirt', 300),
(59, 'L', 'Bleu', 'Pull', 5),
(61, 'L', 'Bleu', 'Pull', 5),
(64, 'L', 'Rouge', 'T-Shirt', 5),
(66, 'L', 'Rouge', 'T-Shirt', 5),
(68, 'L', 'Rouge', 'T-Shirt', 5),
(70, 'L', 'Rouge', 'T-Shirt', 5),
(72, 'L', 'Rouge', 'T-Shirt', 5),
(74, 'L', 'Rouge', 'T-Shirt', 5),
(76, 'L', 'Rouge', 'T-Shirt', 5),
(78, 'L', 'Rouge', 'T-Shirt', 5),
(80, 'L', 'Rouge', 'T-Shirt', 5),
(82, 'L', 'Rouge', 'T-Shirt', 5),
(84, 'L', 'Rouge', 'T-Shirt', 5),
(86, 'L', 'Rouge', 'T-Shirt', 5),
(88, 'L', 'Rouge', 'T-Shirt', 5),
(90, 'L', 'Rouge', 'T-Shirt', 5),
(92, 'L', 'Rouge', 'T-Shirt', 5),
(93, 'M', 'Bleu', 'T-shirt', 300),
(96, 'L', 'Rouge', 'T-shirt', 5),
(98, 'L', 'Rouge', 'T-shirt', 5),
(100, 'L', 'Rouge', 'T-shirt', 5),
(102, 'L', 'Rouge', 'T-shirt', 5),
(104, 'L', 'Rouge', 'T-shirt', 5),
(106, 'L', 'Rouge', 'T-shirt', 5),
(108, 'L', 'Rouge', 'T-shirt', 5),
(124, 'M', 'Bleu', 'T-shirt', 300),
(126, 'M', 'Bleu', 'T-shirt', 300),
(128, 'M', 'Bleu', 'T-shirt', 300),
(130, 'M', 'Bleu', 'T-shirt', 300),
(132, 'M', 'Bleu', 'T-shirt', 300),
(134, 'M', 'Bleu', 'T-shirt', 300),
(136, 'M', 'Bleu', 'T-shirt', 300),
(138, 'M', 'Bleu', 'T-shirt', 300),
(140, 'M', 'Bleu', 'T-shirt', 300),
(142, 'M', 'Bleu', 'T-shirt', 300),
(144, 'M', 'Bleu', 'T-shirt', 300);

-- --------------------------------------------------------

--
-- Structure de la table `electronic`
--

DROP TABLE IF EXISTS `electronic`;
CREATE TABLE IF NOT EXISTS `electronic` (
  `product_id` int NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `warranty_fee` int DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `electronic`
--

INSERT INTO `electronic` (`product_id`, `brand`, `warranty_fee`) VALUES
(19, 'TechCorp', 1500),
(21, 'TechCorp', 1500),
(23, 'TechCorp', 1500),
(25, 'TechCorp', 1500),
(27, 'TechCorp', 1500),
(29, 'TechCorp', 1500),
(31, 'TechCorp', 1500),
(33, 'TechCorp', 1500),
(35, 'TechCorp', 1500),
(37, 'TechCorp', 1500),
(39, 'TechCorp', 1500),
(41, 'TechCorp', 1500),
(43, 'TechCorp', 1500),
(45, 'TechCorp', 1500),
(47, 'TechCorp', 1500),
(49, 'TechCorp', 1500),
(51, 'TechCorp', 1500),
(53, 'TechCorp', 1500),
(55, 'TechCorp', 1500),
(57, 'TechCorp', 1500),
(60, 'Samsung', 30),
(62, 'Samsung', 30),
(63, 'TestBrand', 50),
(65, 'TestBrand', 50),
(67, 'TestBrand', 50),
(69, 'TestBrand', 50),
(71, 'TestBrand', 50),
(73, 'TestBrand', 50),
(75, 'TestBrand', 50),
(77, 'TestBrand', 50),
(79, 'TestBrand', 50),
(81, 'TestBrand', 50),
(83, 'TestBrand', 50),
(85, 'TestBrand', 50),
(87, 'TestBrand', 50),
(89, 'TestBrand', 50),
(91, 'TestBrand', 50),
(94, 'TechCorp', 1500),
(95, 'TestBrand', 50),
(97, 'TestBrand', 50),
(99, 'TestBrand', 50),
(101, 'TestBrand', 50),
(103, 'TestBrand', 50),
(105, 'TestBrand', 50),
(107, 'TestBrand', 50),
(125, 'TechCorp', 1500),
(127, 'TechCorp', 1500),
(129, 'TechCorp', 1500),
(131, 'TechCorp', 1500),
(133, 'TechCorp', 1500),
(135, 'TechCorp', 1500),
(137, 'TechCorp', 1500),
(139, 'TechCorp', 1500),
(141, 'TechCorp', 1500),
(143, 'TechCorp', 1500),
(145, 'TechCorp', 1500);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `photos` text,
  `price` int NOT NULL,
  `description` text,
  `quantity` int NOT NULL DEFAULT '1',
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `photos`, `price`, `description`, `quantity`, `createdAt`, `updatedAt`, `category_id`) VALUES
(1, 'Sweat-shirt', '[\"sweat1.jpg\",\"sweat2.jpg\"]', 20, 'Sweat confortable', 10, '2025-10-08 14:15:52', '2025-10-08 14:15:52', 1),
(2, 'Smartphone', '[\"phone1.jpg\",\"phone2.jpg\"]', 450, 'Dernier modèle', 5, '2025-10-08 14:15:52', '2025-10-08 14:15:52', 2),
(7, 'Chaussures de sport', '[\"chaussure1.jpg\",\"chaussure2.jpg\"]', 75, 'Chaussures confortables et stylées', 15, '2025-10-08 15:03:54', '2025-10-08 15:03:54', 1),
(8, 'T-shirt', '[\"tshirt1.jpg\",\"tshirt2.jpg\"]', 15, 'T-shirt coton confortable', 20, '2025-10-08 16:12:42', '2025-10-08 16:12:42', 1),
(9, 'Jean', '[\"jean1.jpg\",\"jean2.jpg\"]', 40, 'Jean slim', 15, '2025-10-08 16:12:42', '2025-10-08 16:12:42', 1),
(10, 'Veste', '[\"jacket1.jpg\"]', 60, 'Veste chaude', 10, '2025-10-08 16:12:42', '2025-10-08 16:12:42', 1),
(11, 'Laptop', '[\"laptop1.jpg\"]', 1200, 'Laptop performant', 5, '2025-10-08 16:12:42', '2025-10-08 16:12:42', 2),
(12, 'Casque Audio', '[\"headphones1.jpg\"]', 150, 'Casque Bluetooth', 12, '2025-10-08 16:12:42', '2025-10-08 16:12:42', 2),
(13, 'Montre Connectée', '[\"watch1.jpg\"]', 200, 'Montre connectée dernière génération', 8, '2025-10-08 16:12:42', '2025-10-08 16:12:42', 2),
(14, 'Casquette bleue', '[\"https://picsum.photos/200/301\"]', 25, 'Casquette stylée pour l\'été', 15, '2025-10-10 07:38:32', '2025-10-10 07:38:32', 1),
(15, 'Casquette bleue', '[\"https://picsum.photos/200/301\"]', 25, 'Casquette stylée pour l\'été', 15, '2025-10-10 07:40:26', '2025-10-10 07:40:26', 1),
(16, 'T-shirt 238', '[\"https://picsum.photos/200/300\"]', 1500, 'A beautiful T-shirt', 24, '2025-10-10 07:57:47', '2025-10-13 13:08:00', 1),
(17, 'T-shirt 232', '[\"https://picsum.photos/200/300\"]', 1000, 'A beautiful T-shirt', 24, '2025-10-10 07:59:18', '2025-10-10 07:59:18', 1),
(18, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:23:23', '2025-10-10 08:23:23', 1),
(19, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:23:23', '2025-10-10 08:23:23', 2),
(20, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:23:25', '2025-10-10 08:23:25', 1),
(21, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:23:25', '2025-10-10 08:23:25', 2),
(22, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:23:25', '2025-10-10 08:23:25', 1),
(23, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:23:25', '2025-10-10 08:23:25', 2),
(24, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:24:31', '2025-10-10 08:24:31', 1),
(25, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:24:31', '2025-10-10 08:24:31', 2),
(26, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:24:31', '2025-10-10 08:24:31', 1),
(27, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:24:31', '2025-10-10 08:24:31', 2),
(28, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:24:32', '2025-10-10 08:24:32', 1),
(29, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:24:32', '2025-10-10 08:24:32', 2),
(30, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:24:56', '2025-10-10 08:24:56', 1),
(31, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:24:56', '2025-10-10 08:24:56', 2),
(32, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:24:57', '2025-10-10 08:24:57', 1),
(33, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:24:57', '2025-10-10 08:24:57', 2),
(34, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:24:57', '2025-10-10 08:24:57', 1),
(35, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:24:57', '2025-10-10 08:24:57', 2),
(36, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:25:10', '2025-10-10 08:25:10', 1),
(37, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:25:10', '2025-10-10 08:25:10', 2),
(38, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:26:28', '2025-10-10 08:26:28', 1),
(39, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:26:28', '2025-10-10 08:26:28', 2),
(40, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:26:36', '2025-10-10 08:26:36', 1),
(41, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:26:36', '2025-10-10 08:26:36', 2),
(42, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:26:36', '2025-10-10 08:26:36', 1),
(43, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:26:36', '2025-10-10 08:26:36', 2),
(44, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:26:36', '2025-10-10 08:26:36', 1),
(45, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:26:36', '2025-10-10 08:26:36', 2),
(46, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:26:36', '2025-10-10 08:26:36', 1),
(47, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:26:36', '2025-10-10 08:26:36', 2),
(48, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:26:36', '2025-10-10 08:26:36', 1),
(49, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:26:36', '2025-10-10 08:26:36', 2),
(50, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:26:36', '2025-10-10 08:26:36', 1),
(51, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:26:36', '2025-10-10 08:26:36', 2),
(52, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:26:37', '2025-10-10 08:26:37', 1),
(53, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:26:37', '2025-10-10 08:26:37', 2),
(54, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:26:37', '2025-10-10 08:26:37', 1),
(55, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:26:37', '2025-10-10 08:26:37', 2),
(56, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-10 08:26:37', '2025-10-10 08:26:37', 1),
(57, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-10 08:26:37', '2025-10-10 08:26:37', 2),
(58, 'T-shirt bleu', '[\"img1.jpg\",\"img2.jpg\"]', 1999, 'Un t-shirt bleu 100% coton', 10, '2025-10-13 07:17:19', '2025-10-13 07:17:19', 1),
(59, 'Pull en laine', '[\"pull1.jpg\",\"pull2.jpg\"]', 45, 'Pull chaud et confortable', 15, '2025-10-13 07:21:34', '2025-10-13 07:21:34', 1),
(60, 'Smartphone Galaxy X', '[\"galaxy1.jpg\",\"galaxy2.jpg\"]', 799, 'Smartphone dernière génération', 8, '2025-10-13 07:21:34', '2025-10-13 07:21:34', 2),
(61, 'Pull en laine', '[\"pull1.jpg\",\"pull2.jpg\"]', 45, 'Pull chaud et confortable', 15, '2025-10-13 07:24:10', '2025-10-13 07:24:10', 1),
(62, 'Smartphone Galaxy X', '[\"galaxy1.jpg\",\"galaxy2.jpg\"]', 799, 'Smartphone dernière génération', 8, '2025-10-13 07:24:10', '2025-10-13 07:24:10', 2),
(143, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-13 13:10:25', '2025-10-13 13:10:25', 2),
(132, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-13 13:10:24', '2025-10-13 13:10:24', 1),
(133, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-13 13:10:24', '2025-10-13 13:10:24', 2),
(134, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-13 13:10:25', '2025-10-13 13:10:25', 1),
(135, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-13 13:10:25', '2025-10-13 13:10:25', 2),
(136, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-13 13:10:25', '2025-10-13 13:10:25', 1),
(137, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-13 13:10:25', '2025-10-13 13:10:25', 2),
(138, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-13 13:10:25', '2025-10-13 13:10:25', 1),
(139, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-13 13:10:25', '2025-10-13 13:10:25', 2),
(140, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-13 13:10:25', '2025-10-13 13:10:25', 1),
(141, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-13 13:10:25', '2025-10-13 13:10:25', 2),
(142, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-13 13:10:25', '2025-10-13 13:10:25', 1),
(121, 'Casquette bleue', '[\"https://picsum.photos/200/301\"]', 25, 'Casquette stylée pour l\'été', 15, '2025-10-13 12:50:36', '2025-10-13 12:50:36', 1),
(122, 'Casquette bleue', '[\"https://picsum.photos/200/301\"]', 25, 'Casquette stylée pour l\'été', 15, '2025-10-13 12:51:28', '2025-10-13 12:51:28', 1),
(123, 'Iphone', '[\"https://picsum.photos/200/301\"]', 25, 'Iphone stylée pour l\'été', 15, '2025-10-13 12:52:19', '2025-10-13 12:52:19', 2),
(124, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-13 13:09:49', '2025-10-13 13:09:49', 1),
(125, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-13 13:09:49', '2025-10-13 13:09:49', 2),
(126, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-13 13:09:52', '2025-10-13 13:09:52', 1),
(127, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-13 13:09:52', '2025-10-13 13:09:52', 2),
(128, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-13 13:09:57', '2025-10-13 13:09:57', 1),
(129, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-13 13:09:57', '2025-10-13 13:09:57', 2),
(130, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-13 13:10:24', '2025-10-13 13:10:24', 1),
(131, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-13 13:10:24', '2025-10-13 13:10:24', 2),
(93, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-13 09:58:40', '2025-10-13 09:58:40', 1),
(94, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-13 09:58:40', '2025-10-13 09:58:40', 2),
(144, 'T-shirt bleu', '[\"https://picsum.photos/200\"]', 1500, 'Un beau t-shirt en coton bio', 12, '2025-10-13 13:10:25', '2025-10-13 13:10:25', 1),
(145, 'Smartphone X12', '[\"https://picsum.photos/300\"]', 99900, 'Téléphone dernière génération', 5, '2025-10-13 13:10:25', '2025-10-13 13:10:25', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
