-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 11 déc. 2023 à 16:21
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprentissage`
--

DROP TABLE IF EXISTS `apprentissage`;
CREATE TABLE IF NOT EXISTS `apprentissage` (
  `ext_id_projet` int NOT NULL,
  `skill` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `apprentissage`
--

INSERT INTO `apprentissage` (`ext_id_projet`, `skill`) VALUES
(1, 'Développer en PHP'),
(1, 'Créer des bases de données'),
(1, 'Utiliser GitHub'),
(1, 'Imaginer une charte graphique cohérente'),
(1, 'Utiliser le localStorage en JavaScript'),
(2, 'Importer des données depuis un fichier JSON'),
(2, 'Faire des menus accordéons en JavaScript'),
(2, 'Envoyer un appel à une API pour stocker des données'),
(2, 'Héberger un site'),
(2, 'Créer une archive zip'),
(1, 'Exporter/importer des bases de données'),
(4, 'Utiliser GitHub de manière collaborative'),
(4, 'Création d\'issues sur GitHub'),
(4, 'Initiation à NodeJS'),
(4, 'Utilisation de la library discordJS'),
(4, 'Utilisation de PostgreSQL'),
(5, 'Utilisation de la library D3JS'),
(5, 'Création d\'un jeu de données'),
(5, 'Rédaction de bonnes mentions légales'),
(5, 'Création d\'infobulles'),
(6, 'Utilisation des caméras'),
(6, 'Utilisation des éclairages'),
(6, 'Faire de la prise de son'),
(6, 'Gestion de la composition du cadre'),
(6, 'Rédaction d\'une interview'),
(6, 'Utilisation de Première Pro'),
(6, 'Gestion des paramètres d\'export de la vidéo'),
(7, 'Travailler et collaborer au sein d\'une très grande équipe'),
(7, 'Travailler sous fatigue'),
(7, 'Créer un site dans un temps très limité'),
(7, 'Passer tout de même un bon moment malgré les précédents points'),
(3, 'Utilisation d\'After Effects'),
(3, 'Création de dérives à partir d\'une base (plusieurs versions de l\'animation)');

-- --------------------------------------------------------

--
-- Structure de la table `contexte`
--

DROP TABLE IF EXISTS `contexte`;
CREATE TABLE IF NOT EXISTS `contexte` (
  `ext_id_projet` int NOT NULL,
  `nom_contexte` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contexte`
--

INSERT INTO `contexte` (`ext_id_projet`, `nom_contexte`) VALUES
(1, 'semestre&nbsp;2'),
(2, 'semestre&nbsp;1'),
(3, 'personnel'),
(4, 'personnel'),
(5, 'semestre&nbsp;3'),
(6, 'semestre&nbsp;1'),
(7, 'pour concours');

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE IF NOT EXISTS `groupes` (
  `ext_id_projet` int NOT NULL,
  `ext_id_membre` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`ext_id_projet`, `ext_id_membre`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 4),
(6, 1),
(6, 5),
(6, 6),
(6, 7),
(7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id_membre` int NOT NULL AUTO_INCREMENT,
  `identite` varchar(255) NOT NULL,
  `url_linkedin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `identite`, `url_linkedin`) VALUES
(1, 'Morgan&nbsp;ZARKA', 'https://www.linkedin.com/in/morgan-zarka/'),
(2, 'Benjamin&nbsp;VIGNOT', 'https://www.linkedin.com/in/benjaminvignot/'),
(3, 'Laura&nbsp;Grondin', 'https://www.linkedin.com/in/laura-g-46765219b/'),
(4, 'Waldi&nbsp;FIAGA', 'https://www.linkedin.com/in/waldi-fiaga-b96392251/'),
(5, 'Arthur&nbsp;Zachary', 'https://www.linkedin.com/in/arthur-zachary/'),
(6, 'Nahina&nbsp;Boireau', 'https://www.linkedin.com/in/nahina-boireau-13aa04254/'),
(7, 'Alina&nbsp;Zhyla', 'https://www.linkedin.com/in/alina-zhyla-894469269/'),
(8, 'Moi Meaux\'che et mé\'Champs', 'https://docs.google.com/document/d/1UQwRzS-Eo6GLgU8GaXIe1iBU2fwMfPw7uPfSa01t_PQ/edit?usp=sharing');

-- --------------------------------------------------------

--
-- Structure de la table `moyens`
--

DROP TABLE IF EXISTS `moyens`;
CREATE TABLE IF NOT EXISTS `moyens` (
  `ext_id_projet` int NOT NULL,
  `ext_id_techno` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `moyens`
--

INSERT INTO `moyens` (`ext_id_projet`, `ext_id_techno`) VALUES
(1, 4),
(1, 2),
(1, 3),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(3, 6),
(3, 7),
(4, 3),
(4, 5),
(4, 8),
(4, 9),
(5, 1),
(5, 2),
(5, 3),
(5, 11),
(5, 10),
(2, 11),
(6, 12),
(6, 13),
(6, 15),
(6, 14),
(7, 1),
(7, 2),
(7, 3),
(7, 11);

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id_projet` int NOT NULL AUTO_INCREMENT,
  `nom_projet` varchar(255) NOT NULL,
  `description_rapide` text NOT NULL,
  `description_totale` text NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `note_perso` int NOT NULL,
  `note_finale` float DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `url_image` text,
  `lien_github` text,
  PRIMARY KEY (`id_projet`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id_projet`, `nom_projet`, `description_rapide`, `description_totale`, `date_debut`, `date_fin`, `note_perso`, `note_finale`, `url`, `url_logo`, `url_image`, `lien_github`) VALUES
(1, 'Fructus & legumina', 'Fructus & legumina est un projet qui consistait en la création d\'un site de réservation, en PHP.', 'Ce site a été créer dans le cadre du projet resaweb (SAÉ&nbsp;2.03). Le but de ce projet était de créer un site de réservation. J\'ai donc eu l\'idée de faire un site qui permet de fictivement réserver des paniers de fruits et légumes.<br>\nPour ce projet la maîtrise du PHP et SQL a été très importante. <br>J\'ai également décider de faire un système de panier. Cette features a été un peu plus complexe à implémenter car mélange le localStorage avec les sessions PHP (les informations du localStorage sont envoyés au serveur via un requête AJAX au moment où le panier est validé).', '2023-02-08', '2023-06-05', 5, 18.33, 'https://fructusetlegumina.morganzarka.dev', 'resaweb.svg', 'resawebScreen.png', 'https://github.com/Suzoka/Resaweb'),
(2, 'Portrait chinois', 'Pour mon premier projet dev en MMI, j\'ai dû faire mon portrait chinois sous la forme d\'une page web.', 'Ce projet est le premier projet de développement que j\'ai eu à faire durant mon BUT MMI. Il consiste en la création d\'un portrait chinois, en utilisant du HTML, CSS et JavaScript. <br>Les différentes données sont stockés dans un fichier JSON.<br>Pour les différentes sections, j\'ai opté pour des menus accordéons. j\'ai fait seul ces accordéons, sans aide externe, ce qui explique qu\'ils n\'aient pas été faits de la plus optimal des manières. ', '2022-10-19', '2023-01-12', 4, 17.75, 'https://portrait-chinois.morganzarka.dev', 'filigrane.svg', 'portraitChinois.png', 'https://github.com/Suzoka/Portrait-chinois'),
(3, 'Animation d\'une signature', 'Petite animation de mes initiales, pour un usage multiple.', 'À la base créée pour clôturer mon CV vidéo, je me suis dit, content de mon travail, que cette animation pouvait être réutilisée pour d\'autres usages (vous aurez par exemple pu la voir en introduction de ce portfolio)<br><br>Pour obtenir ce résultat, j\'ai travaillé sur After Effects, en exploitant des tracés que j\'avais fait auparavant sur Illustrator. J\'ai joué sur le lissage des vitesses, et ai joué avec les courbes pour obtenir le résultat que je souhaitais.', '2023-09-19', '2023-10-03', 5, NULL, NULL, 'logoSeul.gif', 'logoSeul.gif', NULL),
(4, 'Bouteille à la mer', 'Codévelopper sur un projet de bot discord de discussions anonymes', 'Bouteille à la mer est un serveur discord permettant d\'avoir des discussions avec d\'autres personnes de manière anonyme. Pour permettre cela, il fonctionne grâce à un bot discord nommé Facteur. Je suis l\'un des codévelopper de ce projet, ajoutant par moment des nouvelles features, et patchant des bugs par d\'autres moments. ', '2022-07-20', NULL, 5, NULL, 'https://discord.gg/hUUCeKHpye', 'bam.png', 'bamScreen.png', NULL),
(5, 'MMIViz', 'Projet de datavisualisation sur le thème du festival MMI.', 'MMIViz est née dans le cadre du projet dataviz (SAÉ 3.03). Le but était de créer un site permettant de visualiser des données. Nous avons donc travailler avec D3.js pour manipuler facilement une zone SVG dans laquelle nous traçons nos graphiques. Comme il n\'y avais pas de jeu de donnée déjà existant sur notre thème, nous avons de nous même rédigé le fichier JSON.', '2023-09-20', '2023-11-20', 5, NULL, 'https://mmiviz.morganzarka.dev', 'datavizlogo.png', 'mmivizScreen.png', 'https://github.com/Suzoka/MMIViz'),
(6, 'Création d\'une interview', 'Interview d\'une habilleuse travaillant dans le spectacle vivant', 'Ce projet a vraiment été intéressant en touts points ! <br> Pour commencer, nous avons dû apprendre à paramétrer et utiliser les caméras. Secondement, la gestion des éclairages, et Troisièmement la prise de son. Une fois avoir appris tout cela, nous avons tourner l\'interview avec madame Coudreuse Karine. Une fois celle ci finis, j\'ai dû passer à une phase de dérushage et enfin de montage. <br>Malheureusement, nous n\'avions pas assez monté la puissance des lights au moment du tournage, donc j\'ai essayé de rattraper cela avec l\'étalonnage, mais n\'étant pas un expert de l\'étalonnage, cela à générer un peu de bruit.', '2022-09-09', '2023-01-07', 4, 13.55, 'https://www.youtube.com/watch?v=iegN0R2j4dQ', 'interview.png', 'miniatureInterview.png', NULL),
(7, 'Vision', 'Site créé lors de ma participation à l\'édition <span class=\"bold\">2023</span> de <span class=\"bold\">la nuit de l\'info</span>.', 'Lors de cette nuit de l\'info, concours national consistant en la création d\'un site internet sur un thème donné en une nuit. <br>Lors de cette édition, le sujet était de mettre en avant des mythes sur l\'écologie. C\'est à dire parler de choses que nous pensons être bien, mais qui finalement ne l\'est pas tant que ça.\n<br>Nous étions une équipe de 15 personnes, que nous avons partagées en deux équipes : l\'une pour une vidéo, l\'autre pour le site internet. Je faisais partie de l\'équipe de développement du site.\n<br>Le site a été fait en HTML, CSS et JS. ', '2023-12-07', '2023-12-08', 3, NULL, 'https://vision.morganzarka.dev/', 'vision.png', 'visionScreen.png', 'https://github.com/Suzoka/Nuit-de-l-info');

-- --------------------------------------------------------

--
-- Structure de la table `technologies`
--

DROP TABLE IF EXISTS `technologies`;
CREATE TABLE IF NOT EXISTS `technologies` (
  `id_techno` int NOT NULL AUTO_INCREMENT,
  `nom_techno` varchar(255) NOT NULL,
  `couleur_techno` varchar(6) NOT NULL,
  PRIMARY KEY (`id_techno`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `technologies`
--

INSERT INTO `technologies` (`id_techno`, `nom_techno`, `couleur_techno`) VALUES
(1, 'HTML', 'ff9933'),
(2, 'CSS', '33ffff'),
(3, 'JavaScript', 'ffff33'),
(4, 'PHP', '9999ff'),
(5, 'SQL', '3366ff'),
(6, 'After Effects', 'cca6f9'),
(7, 'Motion design', 'ffffff'),
(8, 'DiscordJS', '515fa9'),
(9, 'NodeJS', '6ba552'),
(10, 'D3.js', 'da714c'),
(11, 'JSON', 'C107F0'),
(12, 'Vidéo', '828282'),
(13, 'Son', '84D75B'),
(14, 'Premiere Pro', 'ea77ff'),
(15, 'Montage', '911993');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
