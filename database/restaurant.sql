-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 02 déc. 2021 à 16:44
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `Chicha`
--

CREATE TABLE `Chicha` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `score` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `heating_system` varchar(255) NOT NULL,
  `heating_system_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Chicha`
--

INSERT INTO `Chicha` (`id`, `name`, `image`, `score`, `status`, `price`, `heating_system`, `heating_system_image`) VALUES
(1, 'PACK CHICHA PREMIUM', 'https://www.el-badia.com/10646-large_default/maklaud-hero-x-gordi.jpg', 5, 'disponible', 15, 'FOYER THERMIQUE QUASAR RAAS', 'https://www.el-badia.com/6306-large_default/foyer-thermique-quasar-raas.jpg'),
(2, 'PACK CHICHA CLASSIQUE', 'https://www.el-badia.com/9177-large_default/chicha-el-badia-c5.jpg', 4, 'disponible', 10, 'KALOUD LOTUS I+ ® BLACK LOTUS', 'https://www.el-badia.com/10188-large_default/kaloud-lotus-i-black-lotus.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Contact`
--

CREATE TABLE `Contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Food_order`
--

CREATE TABLE `Food_order` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `food_order` json NOT NULL,
  `datetime` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Food_order`
--

INSERT INTO `Food_order` (`id`, `user`, `food_order`, `datetime`, `status`) VALUES
(2, 1, '{\"1\": \"Numéro 1\", \"2\": \"Numéro 2\"}', 'December 2, 2021, 1:52 pm', 'en attente'),
(3, 1, '[{\"name\": \"Pink Burger\", \"image\": \"https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg\", \"price\": \"14.75\", \"score\": \"3\", \"status\": \"disponible\"}, {\"name\": \"Cheese Burger\", \"image\": \"https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg\", \"price\": \"15\", \"score\": \"5\", \"status\": \"disponible\"}, {\"name\": \"Hot Burger\", \"image\": \"https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg\", \"price\": \"7.9\", \"score\": \"5\", \"status\": \"disponible\"}]', 'December 2, 2021, 2:56 pm', 'en attente'),
(4, 1, '[{\"name\": \"Pink Burger\", \"image\": \"https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg\", \"price\": \"14.75\", \"score\": \"3\", \"status\": \"disponible\"}, {\"name\": \"Cheese Burger\", \"image\": \"https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg\", \"price\": \"15\", \"score\": \"5\", \"status\": \"disponible\"}, {\"name\": \"Hot Burger\", \"image\": \"https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg\", \"price\": \"7.9\", \"score\": \"5\", \"status\": \"disponible\"}]', 'December 2, 2021, 3:13 pm', 'en attente'),
(5, 1, '[{\"name\": \"Pink Burger\", \"image\": \"https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg\", \"price\": \"14.75\", \"score\": \"3\", \"status\": \"disponible\"}, {\"name\": \"Cheese Burger\", \"image\": \"https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg\", \"price\": \"15\", \"score\": \"5\", \"status\": \"disponible\"}, {\"name\": \"Hot Burger\", \"image\": \"https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg\", \"price\": \"7.9\", \"score\": \"5\", \"status\": \"disponible\"}]', 'December 2, 2021, 3:15 pm', 'prête'),
(8, 1, '[{\"name\": \"Cheese Burger\", \"image\": \"https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg\", \"price\": \"15\", \"score\": \"5\", \"status\": \"disponible\"}, {\"name\": \"Pink Burger\", \"image\": \"https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg\", \"price\": \"14.75\", \"score\": \"3\", \"status\": \"disponible\"}, {\"name\": \"Burger dog\", \"image\": \"https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg\", \"price\": \"4\", \"score\": \"4\", \"status\": \"disponible\"}]', 'December 2, 2021, 4:33 pm', 'en attente');

-- --------------------------------------------------------

--
-- Structure de la table `Menu`
--

CREATE TABLE `Menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` float NOT NULL,
  `score` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Menu`
--

INSERT INTO `Menu` (`id`, `name`, `image`, `price`, `score`, `status`) VALUES
(1, 'Burger Cheddar', 'https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg', 20, 4, 'indisponible'),
(2, 'Cheese Burger', 'https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg', 15, 5, 'disponible'),
(3, 'Pink Burger', 'https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg', 14.75, 3, 'disponible'),
(4, 'Burger dog', 'https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg', 4, 4, 'disponible'),
(5, 'Hot Burger', 'https://cdn.shopify.com/s/files/1/0442/4276/3933/products/Burger3_1024x1024@2x.jpg', 7.9, 5, 'disponible');

-- --------------------------------------------------------

--
-- Structure de la table `Panier`
--

CREATE TABLE `Panier` (
  `id` int(11) NOT NULL,
  `panier` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Panier`
--

INSERT INTO `Panier` (`id`, `panier`, `user`) VALUES
(20, 93, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Panier_menu`
--

CREATE TABLE `Panier_menu` (
  `id` int(11) NOT NULL,
  `panier_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Reservation`
--

CREATE TABLE `Reservation` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `people` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Role`
--

CREATE TABLE `Role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Role`
--

INSERT INTO `Role` (`id`, `name`) VALUES
(2, 'ADMIN'),
(3, 'COOK'),
(1, 'USER');

-- --------------------------------------------------------

--
-- Structure de la table `Status`
--

CREATE TABLE `Status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Status`
--

INSERT INTO `Status` (`id`, `name`) VALUES
(6, 'annulée'),
(2, 'disponible'),
(7, 'en attente'),
(4, 'en cours de préparation'),
(3, 'indisponible'),
(5, 'prête'),
(8, 'terminée');

-- --------------------------------------------------------

--
-- Structure de la table `Taste`
--

CREATE TABLE `Taste` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `score` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Taste`
--

INSERT INTO `Taste` (`id`, `name`, `image`, `score`, `status`) VALUES
(1, 'ADALYA - Hawaii', 'https://www.kiosklino.ch/media/image/b0/3b/a6/Adalya-Tabak-Hawaii-200g588e527918351.png', 5, 'disponible'),
(2, 'ADALYA - LOVE 66', 'https://www.kiosklino.ch/media/image/62/20/b6/love_66_1kg.jpg', 4, 'disponible'),
(3, 'AL-FAKHER - Watermelon', 'https://cdn.shopify.com/s/files/1/0222/7018/1453/products/al_fakher_shisha_tabak_wassermelone59bf94b10835d-50g_300x.jpg', 2, 'disponible');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `role` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`id`, `name`, `firstname`, `email`, `password`, `phone`, `address`, `city`, `postal_code`, `role`) VALUES
(1, 'VASONE', 'Antoine', 'antoinevasone@outlook.com', 'AntoineAntoineAntoine', '0600000000', '21 quai de l\'Ourcq', 'Pantin', 93500, 'USER'),
(2, 'Fontaine', 'Ryan', 'ryanfontaine@outlook.com', 'RyanRyanRyan', '0600000001', '2 allée des Tulipes', 'Sevran', 93270, 'USER');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Chicha`
--
ALTER TABLE `Chicha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Chicha_status` (`status`);

--
-- Index pour la table `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Food_order`
--
ALTER TABLE `Food_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_order_user` (`user`),
  ADD KEY `food_order_status` (`status`);

--
-- Index pour la table `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_status` (`status`);

--
-- Index pour la table `Panier`
--
ALTER TABLE `Panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panier` (`panier`),
  ADD KEY `panier_user` (`user`);

--
-- Index pour la table `Panier_menu`
--
ALTER TABLE `Panier_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panier_menu_panier` (`panier_id`),
  ADD KEY `panier_menu_menu` (`menu_id`);

--
-- Index pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_status` (`status`),
  ADD KEY `reservation_user` (`user`);

--
-- Index pour la table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Index pour la table `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Index pour la table `Taste`
--
ALTER TABLE `Taste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Taste_status` (`status`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role` (`role`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Chicha`
--
ALTER TABLE `Chicha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Contact`
--
ALTER TABLE `Contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Food_order`
--
ALTER TABLE `Food_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Menu`
--
ALTER TABLE `Menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Panier`
--
ALTER TABLE `Panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `Panier_menu`
--
ALTER TABLE `Panier_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Role`
--
ALTER TABLE `Role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Status`
--
ALTER TABLE `Status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Taste`
--
ALTER TABLE `Taste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Chicha`
--
ALTER TABLE `Chicha`
  ADD CONSTRAINT `Chicha_status` FOREIGN KEY (`status`) REFERENCES `Status` (`name`);

--
-- Contraintes pour la table `Food_order`
--
ALTER TABLE `Food_order`
  ADD CONSTRAINT `food_order_status` FOREIGN KEY (`status`) REFERENCES `Status` (`name`),
  ADD CONSTRAINT `food_order_user` FOREIGN KEY (`user`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `Menu`
--
ALTER TABLE `Menu`
  ADD CONSTRAINT `menu_status` FOREIGN KEY (`status`) REFERENCES `Status` (`name`);

--
-- Contraintes pour la table `Panier`
--
ALTER TABLE `Panier`
  ADD CONSTRAINT `panier_user` FOREIGN KEY (`user`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `Panier_menu`
--
ALTER TABLE `Panier_menu`
  ADD CONSTRAINT `panier_menu_menu` FOREIGN KEY (`menu_id`) REFERENCES `Menu` (`id`),
  ADD CONSTRAINT `panier_menu_panier` FOREIGN KEY (`panier_id`) REFERENCES `Panier` (`panier`);

--
-- Contraintes pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `reservation_status` FOREIGN KEY (`status`) REFERENCES `Status` (`name`),
  ADD CONSTRAINT `reservation_user` FOREIGN KEY (`user`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `Taste`
--
ALTER TABLE `Taste`
  ADD CONSTRAINT `Taste_status` FOREIGN KEY (`status`) REFERENCES `Status` (`name`);

--
-- Contraintes pour la table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `user_role` FOREIGN KEY (`role`) REFERENCES `Role` (`name`);
