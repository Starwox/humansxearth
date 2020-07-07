-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 07, 2020 at 08:40 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hxe`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenge`
--

CREATE TABLE `challenge` (
  `id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_know` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `step_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenge`
--

INSERT INTO `challenge` (`id`, `content`, `to_know`, `step_id`) VALUES
(1, 'Aujourd\'hui limite le papier !', '35 kilos de déchets par an sont évités en mettant l’autocollant Stop-Pub.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `challenge_news`
--

CREATE TABLE `challenge_news` (
  `challenge_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenge_news`
--

INSERT INTO `challenge_news` (`challenge_id`, `news_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `challenge_tips`
--

CREATE TABLE `challenge_tips` (
  `challenge_id` int(11) NOT NULL,
  `tips_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenge_tips`
--

INSERT INTO `challenge_tips` (`challenge_id`, `tips_id`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200625101816', '2020-06-25 10:18:30'),
('20200625102344', '2020-06-25 10:23:49'),
('20200625114613', '2020-06-25 11:47:48'),
('20200625115009', '2020-06-25 11:50:13'),
('20200626103739', '2020-06-26 10:37:44'),
('20200629085736', '2020-06-29 08:58:47'),
('20200629091336', '2020-06-29 09:16:38'),
('20200630105541', '2020-06-30 10:56:28'),
('20200630110018', '2020-06-30 11:00:22'),
('20200630110059', '2020-06-30 11:01:17'),
('20200702103258', '2020-07-02 10:33:02'),
('20200702110040', '2020-07-02 11:00:51'),
('20200702110205', '2020-07-02 11:02:08'),
('20200702143100', '2020-07-02 14:31:04'),
('20200706073943', '2020-07-06 07:39:46'),
('20200706135303', '2020-07-06 13:53:30'),
('20200706135534', '2020-07-06 13:55:49'),
('20200706163603', '2020-07-06 16:36:07'),
('20200706205721', '2020-07-06 20:57:35'),
('20200706210141', '2020-07-06 21:01:45'),
('20200706211441', '2020-07-06 21:20:57'),
('20200706212850', '2020-07-06 21:47:36'),
('20200706215337', '2020-07-06 21:53:40'),
('20200706232458', '2020-07-06 23:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `tags_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `tags_id`, `name`, `content`, `link`, `author`) VALUES
(1, 2, 'Ecologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis purus a justo lacinia viverra nec sit amet risus. Integer aliquam ex sit amet velit eleifend varius. Vestibulum a dictum nunc, at blandit sem. Maecenas sit amet nulla ultrices, molestie felis in, porttitor turpis. Nullam viverra eros in risus tristique aliquet. Cras ipsum nisi, feugiat et commodo non, efficitur id diam. Vivamus placerat ante sit amet velit tempus, sit amet lobortis lacus fringilla. Proin mattis ornare augue, eget facilisis neque fermentum ac. Sed consequat nec orci ut condimentum. Ut sed elit ut mi suscipit placerat a sed justo.\n            Duis sagittis lacinia arcu, sit amet mattis nulla placerat nec. Sed tincidunt nibh non ex auctor ultrices. Donec eleifend, urna auctor tempus congue, ante nisi hendrerit leo, nec pellentesque justo nibh in ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ipsum arcu, tempus at nisi vehicula, tincidunt accumsan turpis. Nunc tincidunt enim id nisi pretium, elementum pharetra mi rhoncus. Phasellus pharetra pretium dui id sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse potenti. Sed ut odio mollis, hendrerit urna eget, gravida purus. Phasellus pulvinar erat enim, vitae egestas dui tincidunt at. Sed id molestie metus. Ut eget orci blandit, egestas enim at, fermentum nibh.\n            Curabitur aliquam, leo non ultricies feugiat, ligula diam accumsan ipsum, in sagittis quam purus in ligula. Morbi at dictum turpis, id iaculis turpis. Aenean quis felis ornare purus eleifend suscipit. Vivamus iaculis, ligula quis fringilla suscipit, nibh lacus sodales velit, nec sollicitudin justo turpis sit amet ipsum. Nullam id iaculis nibh. Etiam dignissim, est non semper condimentum, augue turpis malesuada urna, vel finibus odio est a purus. Morbi sagittis vehicula augue.\n            Donec at rhoncus tellus. Ut ultricies faucibus metus, vel egestas nunc scelerisque nec. Donec sem arcu, fermentum sit amet efficitur vitae, sagittis in nisl. Etiam efficitur lacus eleifend massa lacinia, et euismod lectus ultrices. Suspendisse est risus, ultrices sed imperdiet iaculis, mattis eget erat. Suspendisse egestas, odio vel aliquet porta, nibh orci lobortis ipsum, non blandit neque neque quis quam. Aliquam lobortis imperdiet ligula a sodales.\n            Donec erat odio, tempus quis pulvinar sed, faucibus a velit. Quisque ultricies aliquam elit, quis dignissim sapien tristique in. Morbi nec tincidunt orci. Aliquam eleifend mi quis ex tincidunt, sed congue lacus gravida. Ut a fringilla sem, convallis auctor ligula. Vivamus ultrices nisl vel massa suscipit, eget auctor ex venenatis. Praesent ac felis eleifend neque ornare pellentesque eu vel elit. Pellentesque aliquet augue nisi, ut fringilla purus lobortis ut. Nulla iaculis purus at libero auctor, ut scelerisque libero ultrices. Cras neque nisi, ultricies tincidunt vulputate quis, lobortis nec leo. Phasellus ut auctor sapien. Aliquam at nulla lacus. Sed efficitur finibus nisi, nec pretium velit pharetra eu. Quisque quis condimentum ipsum, at aliquet diam. Donec commodo lobortis massa, id ullamcorper ligula interdum sed.    \n        ', 'https://www.lesechos.fr/2016/04/le-top-10-des-dechets-collectes-sur-les-plages-205477', 'Test'),
(2, 2, 'Pollution', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis purus a justo lacinia viverra nec sit amet risus. Integer aliquam ex sit amet velit eleifend varius. Vestibulum a dictum nunc, at blandit sem. Maecenas sit amet nulla ultrices, molestie felis in, porttitor turpis. Nullam viverra eros in risus tristique aliquet. Cras ipsum nisi, feugiat et commodo non, efficitur id diam. Vivamus placerat ante sit amet velit tempus, sit amet lobortis lacus fringilla. Proin mattis ornare augue, eget facilisis neque fermentum ac. Sed consequat nec orci ut condimentum. Ut sed elit ut mi suscipit placerat a sed justo.\n            Duis sagittis lacinia arcu, sit amet mattis nulla placerat nec. Sed tincidunt nibh non ex auctor ultrices. Donec eleifend, urna auctor tempus congue, ante nisi hendrerit leo, nec pellentesque justo nibh in ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ipsum arcu, tempus at nisi vehicula, tincidunt accumsan turpis. Nunc tincidunt enim id nisi pretium, elementum pharetra mi rhoncus. Phasellus pharetra pretium dui id sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse potenti. Sed ut odio mollis, hendrerit urna eget, gravida purus. Phasellus pulvinar erat enim, vitae egestas dui tincidunt at. Sed id molestie metus. Ut eget orci blandit, egestas enim at, fermentum nibh.\n            Curabitur aliquam, leo non ultricies feugiat, ligula diam accumsan ipsum, in sagittis quam purus in ligula. Morbi at dictum turpis, id iaculis turpis. Aenean quis felis ornare purus eleifend suscipit. Vivamus iaculis, ligula quis fringilla suscipit, nibh lacus sodales velit, nec sollicitudin justo turpis sit amet ipsum. Nullam id iaculis nibh. Etiam dignissim, est non semper condimentum, augue turpis malesuada urna, vel finibus odio est a purus. Morbi sagittis vehicula augue.\n            Donec at rhoncus tellus. Ut ultricies faucibus metus, vel egestas nunc scelerisque nec. Donec sem arcu, fermentum sit amet efficitur vitae, sagittis in nisl. Etiam efficitur lacus eleifend massa lacinia, et euismod lectus ultrices. Suspendisse est risus, ultrices sed imperdiet iaculis, mattis eget erat. Suspendisse egestas, odio vel aliquet porta, nibh orci lobortis ipsum, non blandit neque neque quis quam. Aliquam lobortis imperdiet ligula a sodales.\n            Donec erat odio, tempus quis pulvinar sed, faucibus a velit. Quisque ultricies aliquam elit, quis dignissim sapien tristique in. Morbi nec tincidunt orci. Aliquam eleifend mi quis ex tincidunt, sed congue lacus gravida. Ut a fringilla sem, convallis auctor ligula. Vivamus ultrices nisl vel massa suscipit, eget auctor ex venenatis. Praesent ac felis eleifend neque ornare pellentesque eu vel elit. Pellentesque aliquet augue nisi, ut fringilla purus lobortis ut. Nulla iaculis purus at libero auctor, ut scelerisque libero ultrices. Cras neque nisi, ultricies tincidunt vulputate quis, lobortis nec leo. Phasellus ut auctor sapien. Aliquam at nulla lacus. Sed efficitur finibus nisi, nec pretium velit pharetra eu. Quisque quis condimentum ipsum, at aliquet diam. Donec commodo lobortis massa, id ullamcorper ligula interdum sed.    \n        ', 'https://www.lesechos.fr/2016/04/le-top-10-des-dechets-collectes-sur-les-plages-205477', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `step`
--

CREATE TABLE `step` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `step`
--

INSERT INTO `step` (`id`, `tag_id`, `name`) VALUES
(1, 1, 'La plage'),
(2, 1, 'Les emballages'),
(3, 1, 'Le ramassage'),
(4, 1, 'Le recyclage'),
(5, 1, 'Se limiter'),
(6, 2, 'Se déplacer'),
(7, 2, 'S\'habiller'),
(8, 2, 'La créativité'),
(9, 2, 'La soif'),
(10, 2, 'Le sport'),
(11, 2, 'La fête'),
(12, 3, 'La viande'),
(13, 3, 'Les saisons'),
(14, 3, 'Acheter local'),
(15, 3, 'Le nettoyage'),
(16, 3, 'L\'hygiène'),
(17, 3, 'La cuisine'),
(18, 4, 'Le chauffage'),
(19, 4, 'La nourriture'),
(20, 4, 'L\'électricité'),
(21, 4, 'Se laver'),
(22, 4, 'L\'eau'),
(23, 4, 'Le composteur'),
(24, 5, 'La pollution'),
(25, 5, 'Au travail'),
(26, 5, 'Le streaming'),
(27, 5, 'Les données'),
(28, 5, 'L\'obsolescence'),
(29, 5, 'Le téléphone');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'Déchets'),
(2, 'Style de vie'),
(3, 'À la maison'),
(4, 'Consommation'),
(5, 'Numérique');

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`id`, `step_id`, `content`) VALUES
(1, 2, 'Mets un autocollant Stop-Pub sur ta boîte aux lettres'),
(2, 2, 'Mets un autocollant Stop-Pub sur ta boîte aux lettres'),
(3, 2, 'Mets un autocollant Stop-Pub sur ta boîte aux lettres');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `created_at`, `name`) VALUES
(7, 'test@gmail.com', '92c0c3b05314b36d3aca20aa1b64e0e3366922bee25af526307218391ffe53a1', '2020-07-06 15:15:46', ''),
(8, 'tester@gmail.com', '92c0c3b05314b36d3aca20aa1b64e0e3366922bee25af526307218391ffe53a1', '2020-07-06 15:16:26', ''),
(9, 'admintest@gmail.com', '92c0c3b05314b36d3aca20aa1b64e0e3366922bee25af526307218391ffe53a1', '2020-07-07 01:27:50', 'Test admin'),
(10, 'oui@gmail.com', '92c0c3b05314b36d3aca20aa1b64e0e3366922bee25af526307218391ffe53a1', '2020-07-07 01:29:40', 'Test admin'),
(11, 'non@gmail.com', '92c0c3b05314b36d3aca20aa1b64e0e3366922bee25af526307218391ffe53a1', '2020-07-07 01:31:12', 'Test admin'),
(12, 'non2@gmail.com', '92c0c3b05314b36d3aca20aa1b64e0e3366922bee25af526307218391ffe53a1', '2020-07-07 01:31:36', 'Test admin'),
(13, 'non3@gmail.com', '92c0c3b05314b36d3aca20aa1b64e0e3366922bee25af526307218391ffe53a1', '2020-07-07 01:31:53', 'Test admin'),
(14, 'non4@gmail.com', '92c0c3b05314b36d3aca20aa1b64e0e3366922bee25af526307218391ffe53a1', '2020-07-07 01:32:15', 'Test admin'),
(15, 'non5@gmail.com', '92c0c3b05314b36d3aca20aa1b64e0e3366922bee25af526307218391ffe53a1', '2020-07-07 01:32:34', 'Test admin'),
(16, 'oui2@gmail.com', '92c0c3b05314b36d3aca20aa1b64e0e3366922bee25af526307218391ffe53a1', '2020-07-07 01:32:56', 'Test admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_step`
--

CREATE TABLE `user_step` (
  `user_id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tag`
--

CREATE TABLE `user_tag` (
  `user_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D709895173B21E9C` (`step_id`);

--
-- Indexes for table `challenge_news`
--
ALTER TABLE `challenge_news`
  ADD PRIMARY KEY (`challenge_id`,`news_id`),
  ADD KEY `IDX_147C9ED698A21AC6` (`challenge_id`),
  ADD KEY `IDX_147C9ED6B5A459A0` (`news_id`);

--
-- Indexes for table `challenge_tips`
--
ALTER TABLE `challenge_tips`
  ADD PRIMARY KEY (`challenge_id`,`tips_id`),
  ADD KEY `IDX_6D83468E98A21AC6` (`challenge_id`),
  ADD KEY `IDX_6D83468EB3E8864B` (`tips_id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1DD399508D7B4FB4` (`tags_id`);

--
-- Indexes for table `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_43B9FE3CBAD26311` (`tag_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_642C410873B21E9C` (`step_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_step`
--
ALTER TABLE `user_step`
  ADD PRIMARY KEY (`user_id`,`step_id`),
  ADD KEY `IDX_3938B2F5A76ED395` (`user_id`),
  ADD KEY `IDX_3938B2F573B21E9C` (`step_id`);

--
-- Indexes for table `user_tag`
--
ALTER TABLE `user_tag`
  ADD PRIMARY KEY (`user_id`,`tag_id`),
  ADD KEY `IDX_E89FD608A76ED395` (`user_id`),
  ADD KEY `IDX_E89FD608BAD26311` (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `step`
--
ALTER TABLE `step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tips`
--
ALTER TABLE `tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `challenge`
--
ALTER TABLE `challenge`
  ADD CONSTRAINT `FK_D709895173B21E9C` FOREIGN KEY (`step_id`) REFERENCES `step` (`id`);

--
-- Constraints for table `challenge_news`
--
ALTER TABLE `challenge_news`
  ADD CONSTRAINT `FK_147C9ED698A21AC6` FOREIGN KEY (`challenge_id`) REFERENCES `challenge` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_147C9ED6B5A459A0` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `challenge_tips`
--
ALTER TABLE `challenge_tips`
  ADD CONSTRAINT `FK_6D83468E98A21AC6` FOREIGN KEY (`challenge_id`) REFERENCES `challenge` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6D83468EB3E8864B` FOREIGN KEY (`tips_id`) REFERENCES `tips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_1DD399508D7B4FB4` FOREIGN KEY (`tags_id`) REFERENCES `tag` (`id`);

--
-- Constraints for table `step`
--
ALTER TABLE `step`
  ADD CONSTRAINT `FK_43B9FE3CBAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);

--
-- Constraints for table `tips`
--
ALTER TABLE `tips`
  ADD CONSTRAINT `FK_642C410873B21E9C` FOREIGN KEY (`step_id`) REFERENCES `step` (`id`);

--
-- Constraints for table `user_step`
--
ALTER TABLE `user_step`
  ADD CONSTRAINT `FK_3938B2F573B21E9C` FOREIGN KEY (`step_id`) REFERENCES `step` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3938B2F5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_tag`
--
ALTER TABLE `user_tag`
  ADD CONSTRAINT `FK_E89FD608A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E89FD608BAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE;
