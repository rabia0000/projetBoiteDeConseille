-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 13 mars 2024 à 08:34
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boite_de_conseille`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_login` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_password` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_login`, `admin_password`) VALUES
(3, 'Freddy', 'freddy@mail.fr', '$2y$10$/u176BZSaRbZwSK7VNeZveleT8Ibq.AkR/sivgXfTaR9.lhtO5szy'),
(4, '', 'admin@admin.fr', '$2y$10$QP30xij3FvNZkWxfCXIaJ.T/dFYrau9zD0PpgPD3NeQ4RTXeOSisa');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `article_id` int NOT NULL,
  `article_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `article_description` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `article_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `to_register`
--

CREATE TABLE `to_register` (
  `training_id` int NOT NULL,
  `user_id` int NOT NULL,
  `authorized_training` tinyint NOT NULL,
  `completed_training` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `to_register`
--

INSERT INTO `to_register` (`training_id`, `user_id`, `authorized_training`, `completed_training`) VALUES
(83, 25, 1, 0),
(83, 26, 1, 1),
(84, 1, 0, 0),
(85, 1, 0, 0),
(85, 26, 0, 1),
(86, 1, 1, 1),
(86, 26, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `training`
--

CREATE TABLE `training` (
  `training_id` int NOT NULL,
  `training_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `training_url` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `training_description` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `training_date` date NOT NULL,
  `training_max` int NOT NULL,
  `training_archived` tinyint NOT NULL,
  `type_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `training`
--

INSERT INTO `training` (`training_id`, `training_name`, `training_url`, `training_description`, `training_date`, `training_max`, `training_archived`, `type_id`) VALUES
(83, 'javascript', 'javascript', 'cours de javascript du 04/12 au 07/12/2023', '2023-12-04', 4, 1, 5),
(84, 'python', 'python', 'cours de python du 15/01 au 18/01/2024', '2024-01-15', 5, 1, 5),
(85, 'HTML', 'HTML.com', 'Formation HTML du 04/09 au 15/09/2023', '2023-09-04', 5, 0, 5),
(86, 'PHP', 'php.com', 'Formation PHP du 18/12 au 15/01/2024', '2023-12-18', 5, 0, 5);

-- --------------------------------------------------------

--
-- Structure de la table `type_training`
--

CREATE TABLE `type_training` (
  `type_id` int NOT NULL,
  `type_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_training`
--

INSERT INTO `type_training` (`type_id`, `type_name`) VALUES
(1, 'Cloud'),
(2, 'IA'),
(3, 'Data'),
(4, 'Reseau'),
(5, 'developpement');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_lastname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_firstname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_mail` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_lastname`, `user_firstname`, `user_mail`, `user_password`) VALUES
(1, 'DOE', 'Jane', 'jane-doe@mail.com', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(2, 'DUPONT', 'Joe', 'joe-dupont@mail.com', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(3, 'MAURICE', 'Lisa', 'lisa-maurice@mail.com', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(4, 'DUFOUR', 'Lauthy', 'lauthy-dufour@mail.com', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(5, 'CHALOUX', 'Richard', 'richard-chaloux@mail.com', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(6, 'DESCHENE', 'Jeanine', 'jeanine-deschene@mail.com', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(7, 'Martin', 'Alice', 'alice.martin@example.com', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(8, 'Durand', 'Lucas', 'lucas.durand@example.net', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(9, 'Leroy', 'Sophie', 'sophie.leroy@example.org', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(10, 'Leclercq', 'Suzanne', 'odelahaye@remy.org', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(11, 'Buisson', 'Antoinette', 'etienne91@yahoo.fr', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(12, 'Royer', 'Claudine', 'cecileleveque@noos.fr', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(13, 'Reynaud', 'Josette', 'warnaud@alves.net', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(14, 'Dupont', 'paula', 'paula-dupont@mail.fr', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(15, 'BROU', 'Freddy', 'fred@mail.fr', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(20, 'Lorenzo', 'Maria', 'maria-lorenzo@mail.fr', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(24, 'mennai', 'rabia', 'rabia_mennai@mail.fr', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(25, 'moi', 'moi', 'moi@mail.fr', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(26, 'mennai', 'rabia', 'rabia_mennai@hotmail.fr', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK'),
(27, 'toototot', 'paul', 'aaa@mail.fr', '$2y$10$hURWHcpVFEQt0cKl62xLzeCP6TBgz64sKaT7kEoVF6VZYIv8bdOtK');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_login` (`admin_login`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Index pour la table `to_register`
--
ALTER TABLE `to_register`
  ADD PRIMARY KEY (`training_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`training_id`),
  ADD KEY `type_id_` (`type_id`);

--
-- Index pour la table `type_training`
--
ALTER TABLE `type_training`
  ADD PRIMARY KEY (`type_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `training`
--
ALTER TABLE `training`
  MODIFY `training_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT pour la table `type_training`
--
ALTER TABLE `type_training`
  MODIFY `type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `to_register`
--
ALTER TABLE `to_register`
  ADD CONSTRAINT `to_register_ibfk_1` FOREIGN KEY (`training_id`) REFERENCES `training` (`training_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `to_register_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_training` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
