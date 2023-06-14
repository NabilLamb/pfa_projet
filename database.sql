-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 07:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `achats`
--

CREATE TABLE `achats` (
  `id_achat` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `date_achat` datetime DEFAULT current_timestamp(),
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achats`
--

INSERT INTO `achats` (`id_achat`, `id_utilisateur`, `id_produit`, `date_achat`, `quantite`) VALUES
(1, 1, 72, '2023-05-17 23:58:10', 1),
(2, 1, 73, '2023-05-18 00:19:45', 1),
(3, 1, 79, '2023-05-18 00:19:45', 1),
(4, 1, 68, '2023-05-18 00:19:45', 2),
(5, 1, 73, '2023-05-18 12:37:25', 1),
(6, 1, 89, '2023-05-19 10:46:55', 1),
(7, 1, 72, '2023-05-20 02:46:23', 3),
(8, 1, 84, '2023-05-20 02:46:23', 1),
(9, 1, 72, '2023-05-20 02:48:26', 1),
(10, 1, 73, '2023-05-21 15:22:18', 2),
(11, 1, 72, '2023-05-21 15:22:18', 1),
(12, 1, 73, '2023-05-21 19:32:22', 1),
(13, 1, 72, '2023-05-21 19:35:41', 1),
(14, 1, 73, '2023-05-21 19:43:45', 1),
(15, 1, 72, '2023-05-21 19:51:25', 1),
(16, 1, 72, '2023-05-21 20:44:44', 1),
(17, 1, 72, '2023-05-21 20:47:19', 1),
(18, 1, 73, '2023-05-21 21:26:38', 1),
(19, 1, 72, '2023-05-21 22:02:40', 1),
(20, 1, 73, '2023-05-21 22:13:04', 1),
(21, 1, 73, '2023-05-21 22:23:44', 1),
(22, 1, 72, '2023-05-21 22:25:47', 1),
(23, 1, 72, '2023-05-21 22:30:15', 2),
(24, 1, 72, '2023-05-21 22:32:45', 1),
(25, 1, 72, '2023-05-21 22:37:09', 1),
(26, 1, 73, '2023-05-23 15:23:52', 1),
(27, 1, 72, '2023-05-24 19:36:54', 1),
(28, 14, 74, '2023-05-24 19:51:48', 163),
(29, 14, 78, '2023-05-24 19:51:48', 107),
(30, 3, 72, '2023-05-24 19:51:48', 146),
(31, 13, 74, '2023-05-24 19:51:48', 182),
(32, 8, 69, '2023-05-24 19:51:48', 188),
(33, 5, 82, '2023-05-24 19:51:48', 75),
(34, 13, 78, '2023-05-24 19:51:48', 135),
(35, 13, 77, '2023-05-24 19:51:48', 139),
(36, 1, 67, '2023-05-24 19:51:48', 39),
(37, 12, 77, '2023-05-24 19:51:48', 162),
(38, 10, 67, '2023-05-24 19:51:48', 56),
(39, 3, 89, '2023-05-24 19:51:48', 48),
(40, 6, 68, '2023-05-24 19:51:48', 100),
(41, 2, 69, '2023-05-24 19:51:48', 64),
(42, 3, 88, '2023-05-24 19:51:48', 189),
(43, 1, 76, '2023-05-24 19:51:48', 175),
(44, 1, 72, '2023-05-24 19:53:33', 1),
(45, 1, 75, '2023-05-25 12:51:53', 2),
(46, 1, 72, '2023-05-25 16:42:19', 1),
(47, 1, 73, '2023-05-25 23:35:31', 1),
(48, 1, 72, '2023-05-26 10:33:58', 1),
(49, 1, 72, '2023-05-26 20:26:06', 2),
(50, 1, 73, '2023-05-26 20:55:53', 1),
(51, 1, 72, '2023-05-26 20:55:53', 1),
(52, 1, 76, '2023-05-26 20:55:53', 3),
(53, 1, 68, '2023-05-26 20:55:53', 3),
(54, 1, 77, '2023-05-26 20:55:53', 1),
(55, 1, 97, '2023-05-26 20:55:53', 1),
(56, 1, 72, '2023-05-26 21:15:56', 1),
(57, 1, 73, '2023-05-26 21:15:56', 1),
(58, 1, 81, '2023-05-26 21:15:56', 2),
(59, 1, 78, '2023-05-26 21:15:56', 2),
(60, 1, 94, '2023-05-26 21:15:56', 1),
(61, 1, 72, '2023-06-13 12:59:51', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `icone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `description`, `date_creation`, `icone`) VALUES
(1, 'Ordinateurs ', 'Matériel informatique utilisé pour le traitement des données.', '2023-05-16 17:24:06', 'fa-solid fa-laptop'),
(2, 'Smartphones ', 'Téléphones mobiles avancés avec des fonctionnalités étendues.', '2023-05-16 17:24:47', 'fa-solid fa-mobile-alt'),
(3, 'Téléviseurs ', 'Appareils permettant de recevoir et d\'afficher des programmes audiovisuels.', '2023-05-16 17:25:23', 'fa-solid fa-tv'),
(4, 'Appareils photo', 'Dispositifs pour capturer des images et des vidéos.', '2023-05-16 17:26:02', 'fa-solid fa-camera'),
(6, 'Casques audio', 'Accessoires pour écouter de la musique ou des sons de manière privée.', '2023-05-16 17:29:41', 'fa-solid fa-headphones'),
(7, 'Tablettes', 'Dispositifs portables avec écran tactile utilisés pour la navigation et la consommation de médias.', '2023-05-16 17:30:15', 'fa-solid fa-tablet-alt'),
(8, 'Consoles de jeux', 'Appareils dédiés aux jeux vidéo.', '2023-05-16 18:16:56', 'fa-solid fa-gamepad'),
(9, 'Écouteurs sans fil', 'Dispositifs audio portables sans fil pour l\'écoute personnelle.', '2023-05-16 18:17:31', 'fa-solid fa-headphones-alt'),
(10, 'Montres connectées', 'Accessoires portables qui offrent des fonctionnalités similaires à un smartphone.', '2023-05-16 18:18:04', 'fa-solid fa-watch'),
(11, 'Microphone', 'Description Microphone', '2023-06-13 12:53:32', 'fa-solid fa-microphone'),
(12, 'Imprimante', 'Description Imprimante', '2023-06-13 12:53:32', 'fa-solid fa-print'),
(13, 'Tablettes', 'Description Tablettes', '2023-06-13 12:53:32', 'fa-solid fa-tablet');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `total`, `date_creation`) VALUES
(134, 1, '1195', '2023-05-17 22:13:36'),
(135, 1, '1195', '2023-05-17 22:15:04'),
(136, 1, '1195', '2023-05-17 22:15:17'),
(137, 1, '3262', '2023-05-17 22:34:15'),
(138, 1, '1195', '2023-05-17 23:15:15'),
(139, 1, '5329', '2023-05-17 23:39:12'),
(140, 1, '3585', '2023-05-17 23:39:56'),
(141, 1, '6076', '2023-05-17 23:55:50'),
(142, 1, '872', '2023-05-17 23:58:10'),
(143, 1, '5348', '2023-05-18 00:19:45'),
(144, 1, '1195', '2023-05-18 12:37:25'),
(145, 1, '815', '2023-05-19 10:46:55'),
(146, 1, '2932', '2023-05-20 02:46:23'),
(147, 1, '872', '2023-05-20 02:48:26'),
(148, 1, '3262', '2023-05-21 15:22:18'),
(149, 1, '1195', '2023-05-21 19:32:22'),
(150, 1, '872', '2023-05-21 19:35:41'),
(151, 1, '1195', '2023-05-21 19:43:45'),
(152, 1, '872', '2023-05-21 19:51:25'),
(153, 1, '872', '2023-05-21 20:44:44'),
(154, 1, '872', '2023-05-21 20:47:19'),
(155, 1, '1195', '2023-05-21 21:26:38'),
(156, 1, '872', '2023-05-21 22:02:40'),
(157, 1, '1195', '2023-05-21 22:13:04'),
(158, 1, '1195', '2023-05-21 22:23:45'),
(159, 1, '872', '2023-05-21 22:25:47'),
(160, 1, '1744', '2023-05-21 22:30:15'),
(161, 1, '872', '2023-05-21 22:32:45'),
(162, 1, '872', '2023-05-21 22:37:09'),
(163, 1, '1195', '2023-05-23 15:23:52'),
(164, 1, '872', '2023-05-24 19:36:54'),
(165, 1, '872', '2023-05-24 19:53:33'),
(166, 1, '2908', '2023-05-25 12:51:53'),
(167, 1, '872', '2023-05-25 16:42:19'),
(168, 1, '1195', '2023-05-25 23:35:31'),
(169, 1, '872', '2023-05-26 10:33:58'),
(170, 1, '1744', '2023-05-26 20:26:06'),
(171, 1, '11959', '2023-05-26 20:55:53'),
(172, 1, '13387', '2023-05-26 21:15:56'),
(173, 1, '1744', '2023-06-13 12:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `sujet` varchar(150) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_message` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `id_utilisateur`, `sujet`, `message`, `date_message`) VALUES
(2, 2, 'test', 'testt', '2023-05-08 05:51:15'),
(3, 3, 'dlfa', 'daff', '2023-05-08 05:51:15'),
(4, 4, 'sdf', 'adf', '2023-05-08 05:51:15'),
(5, 5, 'dfa', 'adf', '2023-05-08 05:51:15'),
(6, 6, 'ad', 'dfa', '2023-05-08 05:51:15'),
(7, 7, 'aldf', 'aldj', '2023-05-08 05:51:15'),
(8, 8, 'bonjour ', 'el ahmar', '2023-05-09 11:34:42'),
(9, 9, 'test', 'massage test', '2023-05-12 11:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `idcommande` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `idcommande`, `idUtilisateur`, `rating`, `comment`, `created_at`) VALUES
(39, 162, 1, 3, 'c\'est un commentaire ', '2023-05-21 22:38:08'),
(40, 163, 1, 3, 'commentaire', '2023-05-23 15:24:04'),
(41, 1, 3, 4, 'Bon service, livraison rapide.', '2023-05-24 03:08:22'),
(42, 2, 8, 3, 'Produit de qualité moyenne.', '2023-05-24 03:08:22'),
(43, 3, 2, 5, 'Expérience d\'achat exceptionnelle', '2023-05-24 03:08:22'),
(44, 4, 6, 2, 'Service client peu satisfaisant.', '2023-05-24 03:08:22'),
(45, 5, 11, 4, 'Livraison bien emballée.', '2023-05-24 03:08:22'),
(46, 6, 4, 1, 'Produit endommagé lors de la livraison.', '2023-05-24 03:08:22'),
(47, 7, 9, 5, 'Le meilleur service que j\'ai jamais eu !', '2023-05-24 03:08:22'),
(48, 8, 13, 3, 'Temps de livraison plus long que prévu.', '2023-05-24 03:08:22'),
(49, 9, 5, 2, 'Mauvaise qualité du produit.', '2023-05-24 03:08:22'),
(50, 10, 1, 4, 'Satisfait de mon achat.', '2023-05-24 03:08:22'),
(51, 11, 7, 5, 'Expérience de magasinage fantastique.', '2023-05-24 03:08:22'),
(52, 12, 10, 3, 'Service client aimable et efficace.', '2023-05-24 03:08:22'),
(53, 13, 12, 1, 'Commande jamais reçue.', '2023-05-24 03:08:22'),
(54, 14, 14, 4, 'Produit conforme à la description.', '2023-05-24 03:08:22'),
(55, 15, 2, 2, 'Livraison retardée sans notification.', '2023-05-24 03:08:22'),
(56, 16, 6, 3, 'Rapport qualité-prix moyen.', '2023-05-24 03:08:22'),
(57, 17, 3, 5, 'Je recommande vivement ce vendeur !', '2023-05-24 03:08:22'),
(58, 18, 8, 4, 'Bon rapport qualité-prix.', '2023-05-24 03:08:22'),
(59, 19, 4, 1, 'Mauvaise expérience globale.', '2023-05-24 03:08:22'),
(60, 20, 11, 3, 'Livraison partiellement manquante.', '2023-05-24 03:08:22'),
(61, 21, 2, 4, 'Service client réactif et courtois.', '2023-05-24 03:08:22'),
(62, 22, 9, 3, 'Produit légèrement défectueux.', '2023-05-24 03:08:22'),
(63, 24, 1, 2, 'Livraison très lente.', '2023-05-24 03:08:22'),
(64, 25, 7, 4, 'Bon emballage, produit conforme.', '2023-05-24 03:08:22'),
(65, 26, 10, 1, 'Mauvaise communication du vendeur.', '2023-05-24 03:08:22'),
(66, 28, 14, 3, 'Retard dans le traitement de la commande.', '2023-05-24 03:08:22'),
(67, 29, 2, 2, 'Qualité du produit en dessous des attentes.', '2023-05-24 03:08:22'),
(68, 30, 6, 4, 'Service client serviable et poli.', '2023-05-24 03:08:22'),
(69, 31, 3, 5, 'Magasin en ligne hautement recommandé !', '2023-05-24 03:08:22'),
(70, 32, 8, 3, 'Produit légèrement endommagé.', '2023-05-24 03:08:22'),
(71, 33, 4, 1, 'Commande incorrecte, mauvais articles reçus.', '2023-05-24 03:08:22'),
(72, 34, 11, 4, 'Livraison rapide et efficace.', '2023-05-24 03:08:22'),
(73, 35, 7, 2, 'Problèmes de suivi de livraison.', '2023-05-24 03:08:22'),
(74, 36, 10, 3, 'Bonne expérience globale.', '2023-05-24 03:08:22'),
(75, 37, 13, 5, 'Excellent service client.', '2023-05-24 03:08:22'),
(76, 38, 5, 4, 'Produit de haute qualité.', '2023-05-24 03:08:22'),
(77, 39, 1, 1, 'Commande annulée sans explication.', '2023-05-24 03:08:22'),
(78, 40, 9, 4, 'Processus de retour simple et rapide.', '2023-05-24 03:08:22'),
(79, 41, 6, 3, 'Prix légèrement élevé pour la qualité.', '2023-05-24 03:08:22'),
(80, 42, 2, 5, 'Service client exceptionnel.', '2023-05-24 03:08:22'),
(81, 43, 11, 4, 'Livraison bien emballée.', '2023-05-24 03:08:22'),
(82, 44, 3, 2, 'Produit différent de la description.', '2023-05-24 03:08:22'),
(83, 45, 8, 4, 'Service de livraison fiable.', '2023-05-24 03:08:22'),
(84, 46, 14, 3, 'Réponse lente du service client.', '2023-05-24 03:08:22'),
(85, 47, 4, 5, 'Expérience d\'achat agréable.', '2023-05-24 03:08:22'),
(86, 48, 10, 2, 'Problèmes de paiement lors de la commande.', '2023-05-24 03:08:22'),
(87, 49, 12, 4, 'Produit conforme à mes attentes.', '2023-05-24 03:08:22'),
(88, 50, 13, 3, 'Délai de livraison plus long que prévu.', '2023-05-24 03:08:22'),
(89, 164, 1, 4, 'un bon produits !', '2023-05-24 19:37:08'),
(90, 165, 1, 3, 'un bon service\r\n', '2023-05-24 19:53:56'),
(91, 166, 1, 3, 'un Commentaire pour le test', '2023-05-25 12:52:22'),
(92, 167, 1, 4, 'sdfa', '2023-05-25 16:42:31'),
(93, 168, 1, 3, 'hghj', '2023-05-25 23:36:01'),
(94, 169, 1, 3, 'gh', '2023-05-26 10:34:20'),
(95, 170, 1, 3, 'Commentaire test ', '2023-05-26 20:28:07'),
(96, 171, 1, 3, 'Un commentaire pour le test ', '2023-05-26 20:56:17'),
(97, 172, 1, 3, 'Just un commentaire de test !', '2023-05-26 21:16:23'),
(98, 173, 1, 3, 'test', '2023-06-13 13:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id`, `id_produit`, `id_commande`, `prix`, `quantite`, `total`, `id_utilisateur`) VALUES
(4, 73, 136, '1195', 1, '1195', 1),
(5, 72, 137, '872', 1, '872', 1),
(6, 73, 137, '1195', 2, '2390', 1),
(7, 73, 138, '1195', 1, '1195', 1),
(8, 72, 139, '872', 2, '1744', 1),
(9, 73, 139, '1195', 3, '3585', 1),
(10, 73, 140, '1195', 3, '3585', 1),
(11, 69, 141, '1099', 1, '1099', 1),
(12, 73, 141, '1195', 1, '1195', 1),
(13, 78, 141, '3782', 1, '3782', 1),
(14, 72, 142, '872', 1, '872', 1),
(15, 68, 143, '999', 2, '1998', 1),
(16, 73, 143, '1195', 1, '1195', 1),
(17, 79, 143, '2155', 1, '2155', 1),
(18, 73, 144, '1195', 1, '1195', 1),
(19, 89, 145, '815', 1, '815', 1),
(20, 72, 146, '872', 3, '2616', 1),
(21, 84, 146, '316', 1, '316', 1),
(22, 72, 147, '872', 1, '872', 1),
(23, 72, 148, '872', 1, '872', 1),
(24, 73, 148, '1195', 2, '2390', 1),
(25, 73, 149, '1195', 1, '1195', 1),
(26, 72, 150, '872', 1, '872', 1),
(27, 73, 151, '1195', 1, '1195', 1),
(28, 72, 152, '872', 1, '872', 1),
(29, 72, 153, '872', 1, '872', 1),
(30, 72, 154, '872', 1, '872', 1),
(31, 73, 155, '1195', 1, '1195', 1),
(32, 72, 156, '872', 1, '872', 1),
(33, 73, 157, '1195', 1, '1195', 1),
(34, 73, 158, '1195', 1, '1195', 1),
(35, 72, 159, '872', 1, '872', 1),
(36, 72, 160, '872', 2, '1744', 1),
(37, 72, 161, '872', 1, '872', 1),
(38, 72, 162, '872', 1, '872', 1),
(39, 73, 163, '1195', 1, '1195', 1),
(40, 72, 164, '872', 1, '872', 1),
(41, 72, 165, '872', 1, '872', 1),
(42, 75, 166, '1454', 2, '2908', 1),
(43, 72, 167, '872', 1, '872', 1),
(44, 73, 168, '1195', 1, '1195', 1),
(45, 72, 169, '872', 1, '872', 1),
(46, 72, 170, '872', 2, '1744', 1),
(47, 68, 171, '999', 3, '2997', 1),
(48, 72, 171, '872', 1, '872', 1),
(49, 73, 171, '1195', 1, '1195', 1),
(50, 76, 171, '1959', 3, '5877', 1),
(51, 77, 171, '643', 1, '643', 1),
(52, 97, 171, '375', 1, '375', 1),
(53, 72, 172, '872', 1, '872', 1),
(54, 73, 172, '1195', 1, '1195', 1),
(55, 78, 172, '3782', 2, '7564', 1),
(56, 81, 172, '1631', 2, '3262', 1),
(57, 94, 172, '494', 1, '494', 1),
(58, 72, 173, '872', 2, '1744', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `discount`, `id_categorie`, `date_creation`, `description`, `image`) VALUES
(66, 'MacBook Pro 2022', '2499', 3, 1, '2023-05-16 00:00:00', 'Ordinateur portable puissant avec écran Retina et processeur Intel Core i7. ', '6463ec5ed9322téléchargement.jpg'),
(67, 'Dell XPS 15', '1899', 0, 1, '2023-05-16 00:00:00', 'Ordinateur portable haut de gamme avec écran tactile 4K et processeur Intel Core i9.', '6463edaa13f64co1.jpg'),
(68, 'HP Pavilion Gaming Desktop', '999', 0, 1, '2023-05-16 00:00:00', 'Ordinateur de bureau spécialement conçu pour le gaming avec processeur AMD Ryzen et carte graphique NVIDIA GeForce.', '6463ef2931c4bco3.jpg'),
(69, 'iPhone 13 Pro', '1099', 0, 2, '2023-05-16 00:00:00', 'Smartphone haut de gamme avec écran Super Retina XDR, puce A15 Bionic et triple caméra.', '6463fbb144c982(1).jpg'),
(70, 'Xiaomi Mi 11', '699', 0, 2, '2023-05-16 00:00:00', 'Smartphone haut de gamme avec écran AMOLED, processeur Qualcomm Snapdragon 888 et caméra triple.', '6463fc482ab37q1.jpg'),
(71, 'OnePlus 9 Pro', '899', 0, 2, '2023-05-16 00:00:00', 'Smartphone premium avec écran Fluid AMOLED, processeur Qualcomm Snapdragon 888 et triple.', '6463fc918db0fq2.jpg'),
(72, 'Google Pixel 6 Pro', '899', 3, 2, '2023-05-17 00:00:00', ' Smartphone Android avec écran OLED, processeur Google Tensor et double caméra.', '6463fcf1bef04q3.jpg'),
(73, 'Samsung Galaxy S21 Ultra', '1299', 8, 2, '2023-05-17 00:00:00', 'Smartphone phare avec écran Dynamic AMOLED 2X, processeur Exynos 2100 et caméra quadruple.', '6463fd57eb8fcq4.jpg'),
(74, 'LG OLED CX', '1799', 4, 3, '2023-05-17 00:00:00', 'LG OLED CX / 1799€ / Téléviseur OLED 4K avec taille d\'écran de 55 pouces, HDR Dolby Vision et système d\'exploitation webOS. ', '6463fdb585c99q5.jpg'),
(75, 'Sony Bravia X90J', '1499', 3, 3, '2023-05-17 00:00:00', 'Téléviseur LED 4K avec taille d\'écran de 65 pouces, compatibilité HDR10+ et système d\'exploitation Android TV. ', '6463fe16b4715q6.jpg'),
(76, 'Samsung QLED Q80A', '1999', 2, 3, '2023-05-17 00:00:00', 'Téléviseur QLED 4K avec taille d\'écran de 75 pouces, rétroéclairage Full Array et assistant vocal intégré', '6463fe51061b8q7.jpg'),
(77, 'TCL 6-Series', '699', 8, 3, '2023-05-17 00:00:00', ' / 699€ / Téléviseur QLED 4K avec taille d\'écran de 55 pouces, Dolby Vision et Roku TV intégré.', '6463ff03ddfaeq8.jpg'),
(78, ' Canon EOS R5', '3899', 3, 4, '2023-05-17 00:00:00', 'Appareil photo hybride plein format de 45 mégapixels avec enregistrement vidéo 8K et stabilisation d\'image intégrée', '6463ff4e82d39q9.jpg'),
(79, 'Sony Alpha a7 III', '2199', 2, 4, '2023-05-17 00:00:00', 'Appareil photo hybride plein format de 24,2 mégapixels avec enregistrement vidéo 4K et autofocus rapide.', '6463ffb03b1d5w1.jpg'),
(80, 'Nikon Z7 II', '3199', 4, 4, '2023-05-17 00:00:00', 'Appareil photo hybride plein format de 45,7 mégapixels avec enregistrement vidéo 4K et système de stabilisation d\'image.', '6463fff478723w2.jpg'),
(81, 'Fujifilm X-T4', '1699', 4, 4, '2023-05-17 00:00:00', 'Appareil photo sans miroir APS-C de 26,1 mégapixels avec enregistrement vidéo 4K et stabilisation d\'image sur cinq axes.', '64640043a650fw3.jpg'),
(82, 'Panasonic Lumix GH5', '1799', 0, 4, '2023-05-17 00:00:00', 'Appareil photo sans miroir Micro Four Thirds de 20,3 mégapixels avec enregistrement vidéo 4K et fonctionnalités professionnelles avancées', '646400938a4b2w4.jpg'),
(83, 'Sony WH-1000XM4', '379', 4, 6, '2023-05-17 00:00:00', 'Casque sans fil à réduction de bruit avec audio de haute résolution et autonomie de batterie prolongée.', '646400df16683w5.jpg'),
(84, 'Bose QuietComfort 45', '329', 4, 6, '2023-05-17 00:00:00', 'Casque sans fil à réduction de bruit avec son immersif et assistant vocal intégré', '64640133b8a25w6.jpg'),
(85, 'Sennheiser Momentum 3 Wireless', '399', 0, 6, '2023-05-17 00:00:00', 'Casque sans fil avec qualité audio supérieure, annulation active du bruit et contrôle tactile.', '646401845ee24w7.jpg'),
(86, 'Jabra Elite 85t', '229', 4, 6, '2023-05-17 00:00:00', 'Jabra Elite 85t / 229€ / Écouteurs sans fil avec annulation active du bruit ajustable et qualité audio exceptionnelle. ', '646401fe884f3w8.jpg'),
(87, ' Apple AirPods Pro', '279', 0, 6, '2023-05-17 00:00:00', 'Écouteurs sans fil avec réduction du bruit, résistance à l\'eau et intégration transparente avec les appareils Apple.', '6464023d48fa5w9.jpg'),
(88, 'iPad Pro (2021)', '899', 7, 7, '2023-05-17 00:00:00', 'Tablette haut de gamme avec écran Liquid Retina, puce M1 et prise en charge de l\'Apple Pencil.', '646402fa5b7bbe1.jpg'),
(89, 'Samsung Galaxy Tab S7+', '849', 4, 7, '2023-05-17 00:00:00', 'Tablette Android avec écran Super AMOLED, stylet S Pen et mode DeX pour une productivité accrue', '646403418bbd8e2.jpg'),
(90, 'Microsoft Surface Pro 7', '899', 0, 7, '2023-05-17 00:00:00', 'Tablette 2-en-1 avec écran tactile PixelSense, processeur Intel Core i5 et support pour le clavier Type Cover. ', '64640373b3266e3.jpg'),
(92, ' Lenovo Tab P11 Pro', '499', 0, 7, '2023-05-17 00:00:00', 'Tablette polyvalente avec écran OLED, processeur Qualcomm Snapdragon et compatibilité avec les accessoires Lenovo.', '646404151ad15e5.jpg'),
(93, 'PlayStation 5', '499', 8, 8, '2023-05-17 00:00:00', 'Console de jeu de nouvelle génération avec des performances graphiques avancées et une expérience de jeu immersive.', '646404f4e177ce7.jpg'),
(94, 'Xbox Series X', '499', 1, 8, '2023-05-17 00:00:00', ' / € / Console de jeu puissante avec un temps de chargement rapide, un ray tracing et une compatibilité avec les jeux Xbox précédents. ', '64640549e12dce8.jpg'),
(95, 'Nintendo Switch ', '329', 7, 8, '2023-05-17 00:00:00', 'Console de jeu hybride permettant de jouer à la fois en mode portable et sur un téléviseur avec des jeux exclusifs Nintendo.', '64640593d8a3ce9.jpg'),
(96, 'PlayStation 4 Pro', '399', 0, 8, '2023-05-17 00:00:00', ' / € / Console de jeu précédente génération avec des graphismes améliorés.', '646405db23d71r1.jpg'),
(97, 'Apple Watch Series 7', '399', 6, 10, '2023-05-17 00:00:00', 'Montre connectée avec écran toujours allumé, suivi avancé de la santé et intégration complète avec les appareils Apple.', '64640676927c2r2.jpg'),
(98, 'Apple Watch Series 7', '349', 0, 10, '2023-05-17 00:00:00', ' / € / Montre connectée basée sur Wear OS avec suivi de la condition physique, écran AMOLED et fonctionnalités avancées de suivi du sommeil.', '646406f9cbe43r3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produitsfavoris`
--

CREATE TABLE `produitsfavoris` (
  `id` int(11) NOT NULL,
  `idProduit` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produitsfavoris`
--

INSERT INTO `produitsfavoris` (`id`, `idProduit`, `idUtilisateur`, `dateAjout`) VALUES
(237, 78, 10, '2023-05-24 17:47:33'),
(238, 83, 8, '2023-05-24 17:47:33'),
(239, 80, 6, '2023-05-24 17:47:33'),
(240, 66, 14, '2023-05-24 17:47:33'),
(241, 88, 9, '2023-05-24 17:47:33'),
(243, 86, 14, '2023-05-24 17:47:33'),
(244, 77, 5, '2023-05-24 17:47:33'),
(245, 74, 11, '2023-05-24 17:47:33'),
(246, 80, 11, '2023-05-24 17:47:33'),
(247, 88, 4, '2023-05-24 17:47:33'),
(248, 80, 2, '2023-05-24 17:47:33'),
(249, 87, 13, '2023-05-24 17:47:33'),
(250, 66, 5, '2023-05-24 17:47:33'),
(252, 72, 5, '2023-05-24 17:47:33'),
(253, 83, 9, '2023-05-24 17:47:33'),
(254, 66, 3, '2023-05-24 17:47:33'),
(255, 88, 14, '2023-05-24 17:47:33'),
(256, 69, 11, '2023-05-24 17:47:33'),
(269, 73, 14, '2023-05-26 22:23:39'),
(272, 72, 1, '2023-06-13 10:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `reponse_admin`
--

CREATE TABLE `reponse_admin` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `sujet` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `reponse_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_creation` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `confirmation_token` varchar(255) NOT NULL,
  `confirmed` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `date_creation`, `name`, `role`, `confirmation_token`, `confirmed`) VALUES
(1, 'lambattannabil2000@gmail.com', 'Nabil2000', '2023-05-07', 'Nabil', 'user', 'cb71f66f1ad089117098f578bcb8177e18114effafee23287a3de0705e2d43cf', 1),
(2, 'Admin@gmail.com', '1258', '2023-05-10', 'Admin', 'admin', '', 0),
(3, 'nabil22lambattan@gmail.com', '789456123', '2023-05-11', 'nabilAdmin', 'admin', '7c2dda31c2e4b4570bf213d7d10cfe710444e86c2067b5445259cd51b39745c2', 0),
(4, 'lambattannabil2000@gmail.com', 'lambattannabil', '2023-05-11', 'nabil', 'admin', '879dd41f7abfaad6b468edeaca8ddf180afc0a28d356e45a5619092984586e41', 1),
(5, 'lambattannabil2000@gmail.com', '12345678', '2023-05-11', 'lambattan', 'admin', '3f39c8c9ba313b99706dea61a6e55f2f2ff048a24dacf36a591245873a4146b5', 0),
(6, 'lambattannabil2000@gmail.com', '12345678', '2023-05-11', 'lambattannabil2000', 'admin', '73aa66bb7f6df195ffdba33e9f9d21bb9d3a0ec0a5d3dc36ff3b1d798744529a', 0),
(7, 'lambattannabil2000@gmail.com', '12345678', '2023-05-11', 'lambattannabil2000', 'admin', '778bd2dfd8c56b80f7daa6687c5a342a69e5bfbb048929edc3954870609759d6', 0),
(8, 'lambattannabil2000@gmail.com', '123456789', '2023-05-11', 'lambattannabil', 'admin', '095af70e6072356efdd39dd5c1f8205a9a971dd34bee5df57059b2dff8e59350', 1),
(9, 'lambattannabil2000@gmail.com', '12345678', '2023-05-11', 'lambattannabil2000@gmail.com', 'admin', '4d1cfd2a17ce6736da4284fefd6b9b6898f29e13b8a6e99288bda6e7562a41c2', 0),
(10, 'lambattannabil2000@gmail.com', '12345678', '2023-05-11', 'lambattannabil2000m', 'admin', 'd63ed6f0a5f456d57a4d442dab0e74e91fd1e307fdba29c08439791f36649827', 0),
(11, 'lambattannabil2000@gmail.com', '12345678', '2023-05-11', 'lambattannabil2000com', 'admin', '5ae22296b53c4d47c5ec150c55b1f01c488d43ec6e4cdaa9fe31bf3741342eb9', 0),
(13, 'lambattannabil2000@gmail.com', '123456789', '2023-05-11', 'NabilAdmin', 'admin', '38b98475cae0350f78b1a758b0c621b157056019efdd25a624de12bd06b8ca78', 0),
(14, 'nabilnabil@gmail.com', 'nabilnabil', '2023-05-15', 'nabilnabil', 'user', '63b6efbdd7830ef2a7ace5dc42931f623e6da2fc2ae90da8711ce7ecc3553738', 0),
(15, 'nabil@gmail.com', '123456789', '2023-05-26', 'Nabil Lambattan', 'user', 'e67d5f8a32a7a499a05ff17033ea8bfabb0e43933d0406e12209b0e2b767a840', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achats`
--
ALTER TABLE `achats`
  ADD PRIMARY KEY (`id_achat`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_utilisateur_2` (`id_utilisateur`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `produitsfavoris`
--
ALTER TABLE `produitsfavoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProduit` (`idProduit`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Indexes for table `reponse_admin`
--
ALTER TABLE `reponse_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_contact` (`id_contact`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achats`
--
ALTER TABLE `achats`
  MODIFY `id_achat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `produitsfavoris`
--
ALTER TABLE `produitsfavoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `reponse_admin`
--
ALTER TABLE `reponse_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `ligne_commande_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `ligne_commande_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `ligne_commande_ibfk_3` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `produitsfavoris`
--
ALTER TABLE `produitsfavoris`
  ADD CONSTRAINT `produitsfavoris_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `produitsfavoris_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `reponse_admin`
--
ALTER TABLE `reponse_admin`
  ADD CONSTRAINT `reponse_admin_ibfk_1` FOREIGN KEY (`id_contact`) REFERENCES `contact` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
