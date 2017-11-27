-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 27 nov. 2017 à 16:07
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(200) NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateModification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `titre`, `auteur`, `chapo`, `contenu`, `dateCreation`, `dateModification`) VALUES
(19, 'la formation opemclassroom', 'magalie', 'mon avis sur la formation dÃ©velopper web ', 'Cette formation et sympa et trÃ¨s biens faite, dans son ensemble je suis satisfaite. Elle ma permise de dÃ©velopper mon esprit dâ€™analyse en plus de m\'apporter des compÃ©tence complÃ©mentaire.\r\nJâ€™espÃ¨re pouvoir la valider bientÃ´t.      ', '2017-11-09 16:25:39', '2017-11-09 16:25:39'),
(17, 'le php orientation objet', 'vincent', 'poo', 'le php est loin dâ€™Ãªtre facile a appliquer ', '2017-11-09 16:18:47', '2017-11-09 16:18:47'),
(75, 'Mon Avis sur la formation OpenClassRoom', 'Japlou67', 'Se je pense de cette formation a distance', 'Des cours rÃ©aliser a la perfection, trÃ¨s bien pour se prÃ©parer dans le cas d\'une formation ou d\'un job. En plus des certificat sont remis une fois que le cours choisi et terminÃ© et maÃ®trisÃ©. trÃ¨s bien pour les passionnÃ©s souhaitant dÃ©veloppÃ©s leurs connaissances', '2017-11-17 19:58:16', '2017-11-17 19:58:16'),
(71, 'Mon expÃ©rience du php ', 'magalie', 'Programmez en orientÃ© objet en PHP', 'J\'ai commencÃ© Ã  travailler le projet 5  de la formation chez OpenClassRoo, il y a plus 1 mois maintenant.Sur comment crÃ©e un blog en programme orientÃ© objet, j\'ai trouvÃ© que ce projet Ã©tÃ© trÃ¨s intÃ©ressant mais la mÃ©thode de la POO est trÃ¨s difficile Ã  apprendre beaucoup de concept et encore flou dans ma tÃªte. Je pense avoir compris l\'essentielle du cours. A voir si mon projet sera validÃ©', '2017-11-17 18:44:07', '2017-11-17 18:44:07'),
(77, 'La formation opemclassroom', 'Jean55', 'Les formation a distance ', 'Voici un article que je souhaite vous faire partager:\r\n\r\nLe site de cours en ligne OpenClassrooms propose dÃ¨s la rentrÃ©e une formation en alternance. Une premiÃ¨re en France.\r\nTravailler en alternance sans aller Ã  lâ€™Ã©cole, ce sera bientÃ´t possible pour la premiÃ¨re fois en France Ã  partir du mois dâ€™octobre. La plateforme de cours en ligne OpenClassrooms vient en effet de sâ€™associer Ã  lâ€™entreprise de services numÃ©riques Capgemini pour offrir Ã  20 Ã©tudiants la possibilitÃ© de travailler pendant 15 mois au sein de lâ€™entreprise et de se former chez eux, Ã  distance.\r\nLes Ã©tudiants sÃ©lectionnÃ©s recevront ainsi un enseignement Ã  la fois pratique et thÃ©orique pour devenir dÃ©veloppeur Java EE, soit en intÃ©grant une Ã©quipe en rÃ©gion parisienne, Ã  Suresnes, soit Ã  Toulouse.\r\nTrois mois de cours en ligne avant de rejoindre l\'entreprise\r\nLa formation dÃ©bute par trois mois de cours en ligne Ã  temps plein, dâ€™octobre Ã  dÃ©cembre. Puis, Ã  partir de janvier 2018, les alternants travailleront quatre jours par semaine en entreprise et une journÃ©e chez eux pour se former.\r\nAu programme de la formation thÃ©orique : des cours au format MOOC avec des vidÃ©os et des exercices. Mais aussi dix â€œprojets professionnelsâ€ Ã  rÃ©aliser en lien avec les besoins de lâ€™entreprise. Le tout avec lâ€™aide individualisÃ©e dâ€™un mentor, chargÃ© de suivre votre progression. â€œCâ€™est la mise Ã  disposition dâ€™un mentor unique par Ã©tudiant qui fait vraiment la qualitÃ© de cette formationâ€, prÃ©cise Pierre Dubuc, le PDG dâ€™OpenClassrooms.\r\nUne garantie d\'embauche\r\nPour ce dernier, cette formation dâ€™un genre nouveau constitue  â€œun grand pas vers plus de flexibilitÃ©â€, autant pour lâ€™entreprise que pour lâ€™apprenti. Dâ€™un cÃ´tÃ©, Capgemini peut faire venir les meilleurs Ã©tudiants sans se prÃ©occuper du lieu oÃ¹ ils Ã©tudient. Mais surtout le contenu des cours en ligne a Ã©tÃ© Ã©laborÃ© directement avec lâ€™entreprise : â€œCâ€™est Capgemini qui a exprimÃ© le besoin dâ€™une formation particuliÃ¨re car ils ne parvenaient pas Ã  recruter sur ce poste. On a donc prÃ©parÃ© avec eux en amont le contenu des cours selon les compÃ©tences dont ils avaient besoinâ€.\r\nLes Ã©tudiants y trouvent aussi leur compte puisquâ€™ils se forment chez eux, Ã  leur rythme. Mais en plus ils se voient offrir la promesse dâ€™Ãªtre embauchÃ©s Ã  lâ€™issue de leurs 15 mois en entreprise Et si, lâ€™essai nâ€™est pas transformÃ© avec Capgemini,, â€œOpenClassrooms sâ€™engage Ã  leur trouver un emploiâ€, affirme Pierre Dubuc, conformÃ©ment Ã  la politique de cette startup de l\'e-education, qui promet une embauche dans les six mois pour toutes leurs formations.\r\nUn diplÃ´me reconnu par l\'Etat\r\nPar ailleurs les Ã©tudiants obtiennent Ã©galement Ã  lâ€™issue du cursus le titre dâ€™ â€œExpert en IngÃ©nierie Informatiqueâ€, reconnu par lâ€™Ã‰tat et de niveau bac+5. Enfin, comme dans la majoritÃ© des formations en apprentissage, les frais de scolaritÃ© sont pris en charge par lâ€™entreprise.\r\nUne sÃ©rie dâ€™avantages qui a dÃ©jÃ  convaincu 500 Ã©tudiants Ã  postuler dÃ¨s les deux premiers jours de la sÃ©lection, qui sâ€™achÃ¨vera fin aoÃ»t. Face Ã  un tel succÃ¨s, Pierre Dubuc envisage dÃ©jÃ  de se rapprocher dâ€™autres entreprises et dâ€™Ã©tendre le dispositif dâ€™alternance Ã  dâ€™autres formations en ligne.\r\n', '2017-11-22 10:49:44', '2017-11-22 10:49:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
