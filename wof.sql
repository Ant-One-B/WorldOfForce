-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 06 avr. 2024 à 11:19
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wof`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `messageC` text DEFAULT NULL,
  `dateC` date DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `messageC`, `dateC`, `id_utilisateur`) VALUES
(1, 'ejzgbzgbzigvuizevg', '2024-03-30', 2),
(2, 'test1234', '2024-03-30', 2),
(3, 'rehrehtjztrzj', '2024-03-30', 2),
(4, 'test', '2024-03-31', 2),
(5, 'test', '2024-03-31', 2),
(6, 'test', '2024-03-31', 2),
(7, 'gerhre', '2024-03-31', 2),
(11, 'bhezufvezgvoze', '2024-04-06', 2),
(16, 'jezgbezpgba', '2024-04-06', 2),
(17, 'regrehtzhtz', '2024-04-06', 2),
(18, 'eztgezgrega', '2024-04-06', 2),
(19, 'areetrgra', '2024-04-06', 2),
(20, 'rehrezhz', '2024-04-06', 2),
(21, 'sqafzafaegagagea', '2024-04-06', 2),
(22, 'ezreztezt', '2024-04-06', 2),
(24, 'jbeuipgzbzirhbirzb', '2024-04-06', 2);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_film`
--

CREATE TABLE `commentaire_film` (
  `id_commentaire` int(11) NOT NULL,
  `id_film` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire_film`
--

INSERT INTO `commentaire_film` (`id_commentaire`, `id_film`) VALUES
(2, 4),
(3, 4),
(18, 5),
(11, 7);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_livre`
--

CREATE TABLE `commentaire_livre` (
  `id_commentaire` int(11) NOT NULL,
  `id_livre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire_livre`
--

INSERT INTO `commentaire_livre` (`id_commentaire`, `id_livre`) VALUES
(6, 4),
(7, 4),
(5, 5),
(20, 5);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_serie`
--

CREATE TABLE `commentaire_serie` (
  `id_commentaire` int(11) NOT NULL,
  `id_serie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire_serie`
--

INSERT INTO `commentaire_serie` (`id_commentaire`, `id_serie`) VALUES
(24, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `mailF` varchar(100) DEFAULT NULL,
  `objetF` varchar(100) DEFAULT NULL,
  `messageF` text DEFAULT NULL,
  `dateF` date DEFAULT current_timestamp(),
  `statutF` varchar(50) DEFAULT 'wait'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `mailF`, `objetF`, `messageF`, `dateF`, `statutF`) VALUES
(1, 'antoine.boeraeve@gmail.com', 'test', 'test', '2024-03-31', 'done'),
(2, 'antoine.boeraeve@gmail.com', 'Test 2 ', 'test 2', '2024-03-31', 'done'),
(3, 'antoine.boeraeve@gmail.com', 'Test', 'test', '2024-03-31', 'done'),
(4, 'antoine.boeraeve@gmail.com', 'test', 'test', '2024-03-31', 'done'),
(5, 'antoine.boeraeve@gmail.com', 'Test', 'test', '2024-03-31', 'done'),
(6, 'antoine.boeraeve@gmail.com', 'Test', 'test', '2024-03-31', 'done'),
(7, 'antoine.boeraeve@gmail.com', 'test', 'test', '2024-04-02', 'done'),
(8, 'antoine.boeraeve@gmail.com', 'test', 'test', '2024-04-02', 'done'),
(9, 'antoine.boeraeve@gmail.com', 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed.', '2024-04-02', 'wait'),
(10, 'antoine.boeraeve@gmail.com', 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.', '2024-04-02', 'wait');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `titreF` varchar(50) DEFAULT NULL,
  `acteurF` text DEFAULT NULL,
  `ref_tmdb` int(11) DEFAULT NULL,
  `afficheF` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titreF`, `acteurF`, `ref_tmdb`, `afficheF`) VALUES
(4, 'La Guerre des étoiles', 'Mark Hamill -\r\nHarrison Ford - \r\nCarrie Fisher -\r\nPeter Cushing - \r\nAlec Guinness -\r\nAnthony Daniels - \r\nKenny Baker -\r\nPeter Mayhew - \r\nDavid Prowse -\r\nJames Earl Jones. ', 11, 'statics/images/upload/episodeIV.jpg'),
(5, 'L&#039;Empire contre-attaque', 'Mark Hamill -\r\nHarrison Ford -\r\nCarrie Fisher -\r\nBilly Dee Williams -\r\nAnthony Daniels -\r\nDavid Prowse -\r\nJames Earl Jones -\r\nPeter Mayhew -\r\nKenny Baker -\r\nFrank Oz -\r\nAlec Guinness -\r\nJeremy Bulloch.', 1891, 'statics/images/upload/episodeV.jpg'),
(6, 'Le Retour du Jedi', 'Mark Hamill -\r\nHarrison Ford -\r\nCarrie Fisher -\r\nBilly Dee Williams -\r\nAnthony Daniels -\r\nPeter Mayhew -\r\nSebastian Shaw -\r\nIan McDiarmid -\r\nFrank Oz -\r\nJames Earl Jones.', 1892, 'statics/images/upload/episodeVI.jpg'),
(7, 'Star Wars, épisode I - La Menace fantôme', 'Liam Neeson -\r\nEwan McGregor -\r\nNatalie Portman -\r\nJake Lloyd -\r\nIan McDiarmid -\r\nPernilla August -\r\nOliver Ford Davies -\r\nHugh Quarshie -\r\nAhmed Best -\r\nAnthony Daniels -\r\nKenny Baker -\r\nFrank Oz -\r\nTerence Stamp .', 1893, 'statics/images/upload/episodeI.jpg'),
(8, 'Star Wars, épisode II - L&#039;Attaque des clones', 'Ewan McGregor -\r\nNatalie Portman -\r\nHayden Christensen -\r\nChristopher Lee -\r\nSamuel L. Jackson -\r\nFrank Oz -\r\nIan McDiarmid -\r\nPernilla August -\r\nTemuera Morrison -\r\nDaniel Logan -\r\nJimmy Smits -\r\nJack Thompson -\r\nLeeanna Walsman -\r\nAhmed Best.', 1894, 'statics/images/upload/episodeII.jpg'),
(9, 'Star Wars, épisode III - La Revanche des Sith', 'Ewan McGregor -\r\nNatalie Portman -\r\nHayden Christensen -\r\nIan McDiarmid -\r\nSamuel L. Jackson -\r\nJimmy Smits -\r\nFrank Oz -\r\nAnthony Daniels -\r\nChristopher Lee -\r\nKeisha Castle-Hughes -\r\nSilas Carson -\r\nJay Laga&#039;aia.', 1895, 'statics/images/upload/episodeIII.jpg'),
(10, 'Star Wars : Le Réveil de la Force', 'Daisy Ridley -\r\nJohn Boyega -\r\nAdam Driver -\r\nHarrison Ford -\r\nOscar Isaac -\r\nCarrie Fisher -\r\nPeter Mayhew -\r\nDomhnall Gleeson -\r\nLupita Nyong&#039;o -\r\nAndy Serkis -\r\nMax von Sydow -\r\nGwendoline Christie -\r\nAnthony Daniels -\r\nMark Hamill.', 140607, 'statics/images/upload/episodeVII.jpg'),
(11, 'Star Wars : Les Derniers Jedi', 'Daisy Ridley -\r\nMark Hamill -\r\nAdam Driver -\r\nJohn Boyega -\r\nOscar Isaac -\r\nKelly Marie Tran -\r\nCarrie Fisher -\r\nJoonas Suotamo et Peter Mayhew (consultant) : Chewbacca\r\nBenicio del Toro -\r\nLaura Dern -\r\nGwendoline Christie -\r\nAndy Serkis -\r\nDomhnall Gleeson -\r\nAnthony Daniels -\r\nBrian Herring.\r\n', 181808, 'statics/images/upload/episodeVIII.jpg'),
(12, 'Star Wars : L&#039;Ascension de Skywalker', 'Daisy Ridley -\r\nAdam Driver -\r\nJohn Boyega -\r\nOscar Isaac -\r\nIan McDiarmid16 -\r\nKelly Marie Tran -\r\nBilly Dee Williams -\r\nJoonas Suotamo -\r\nAnthony Daniels -\r\nCarrie Fisher -\r\nMark Hamill -\r\nHassan Taj et Lee Towersey.\r\n', 181812, 'statics/images/upload/episodeIX.jpg'),
(13, 'Solo: A Star Wars Story', 'Alden Ehrenreich -\r\nEmilia Clarke -\r\nWoody Harrelson -\r\nDonald Glover -\r\nJoonas Suotamo -\r\nThandiwe Newton -\r\nPhoebe Waller-Bridge -\r\nJon Favreau -\r\nPaul Bettany -\r\nRay Park -\r\nSam Witwer -\r\nErin Kellyman -\r\nWarwick Davis.', 348350, 'statics/images/upload/solo.jpg'),
(14, 'Rogue One - A Star Wars Story', 'Felicity Jones -\r\nDiego Luna -\r\nAlan Tudyk -\r\nDonnie Yen -\r\nJiang Wen -\r\nBen Mendelsohn -\r\nForest Whitaker -\r\nMads Mikkelsen -\r\nRiz Ahmed -\r\nGuy Henry -\r\nSpencer Wilding -\r\nJames Earl Jones -\r\nGenevieve O&#039;Reilly -\r\nAlistair Petrie.', 330459, 'statics/images/upload/rogueOne.jpg'),
(15, 'Au temps de la guerre des étoiles', 'Harrison Ford -\r\nPeter Mayhew -\r\nMark Hamill -\r\nCarrie Fisher -\r\nAnthony Daniels -\r\nMickey Morton -\r\nPatty Maloney -\r\nPaul Gale -\r\nBeatrice Arthur -\r\nArt Carney -\r\nD2-R2 -\r\nDavid Prowse -\r\nJames Earl Jones -\r\nClaude Woolman -\r\nDiahann Carroll -\r\nJefferson Starship -\r\nDon Francks -\r\nArt James.', 74849, 'statics/images/upload/holidaySpecial.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id_livre` int(11) NOT NULL,
  `titreL` varchar(50) DEFAULT NULL,
  `auteurL` varchar(50) DEFAULT NULL,
  `nbrPagesL` varchar(50) DEFAULT NULL,
  `editionL` varchar(50) DEFAULT NULL,
  `sortieL` date DEFAULT NULL,
  `synopsisL` text DEFAULT NULL,
  `couvertureL` varchar(255) DEFAULT NULL,
  `idS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `titreL`, `auteurL`, `nbrPagesL`, `editionL`, `sortieL`, `synopsisL`, `couvertureL`, `idS`) VALUES
(4, 'Star wars : Vent de trahison', 'James Luceno', '418', 'Fleuve noir', '2002-10-24', 'La déchéance d&#039;un seul homme pourrait bien sonner le glas de la République ! Le Chancelier Valorum est le maître suprême de la galaxie. Pauvre pouvoir que le sien, ligoté qu&#039;il est par des milliers de lois, des millions de privilèges et des milliards de complots. Dans cette république, le destin du chef est d&#039;être détesté, contesté, voué à perdre ses fonctions et à basculer dans la mort symbolique de l&#039;anonymat. Partout grondent les opposants au régime ; mais des forces mystérieuses agissent dans l&#039;ombre, guettant l&#039;instant fatal où elles apparaîtront pour tirer le meilleur parti de la crise. Valorum convoque sur la planète Eriadu une conférence de la dernière chance ; des Jedi vont sur place organiser la sécurité des délégués. Mais les dés sont pipés ; les terroristes sont prêts.', 'statics/images/upload/vent-de-trahison.jpg', 4),
(5, 'Star Wars : Padawan', 'Kiersten White', '384', 'Pocket', '2024-02-08', 'Le jeune Obi-Wan Kenobi face au vertige existentielle de l&#039;adolescence !\r\nNouvel apprenti de Qui-Gon Jinn depuis peu, Obi-Wan Kenobi ne peut s&#039;empêcher de se demander si leur association n&#039;est pas une erreur. Le Padawan excelle au maniement du sabre laser, mais Qui-Gon veut surtout qu&#039;il travaille la méditation. Et tandis que d&#039;autres Padawans accompagnent leur maître pour des missions lointaines et passionnantes, Qui-Gon et son élève restent sur Coruscant. Aussi, lorsqu&#039;Obi-Wan découvre des indices concernant une affaire restée en suspens sur une planète mystérieuse, il convainc Qui-Gon d&#039;aller y enquêter. Mais le matin du départ, son maître demeure introuvable. Furieux et blessé, Obi-Wan décide de partir seul pour accomplir cette mission.\r\n Arrivé sur Lenahra, il découvre que les seuls habitants de la planète sont de jeunes utilisateurs de la Force. Plus il passe de temps avec eux, loin du quotidien du Temple, plus il doit affronter sa plus grande crainte : peut-être n&#039;a-t-il jamais été destiné à devenir un Jedi ? Pourtant il ne peut s&#039;empêcher de sentir que quelque chose ne va pas sur Lenahra. Obi-Wan parviendra-t-il à rétablir son lien avec la Force à temps pour se sauver, ainsi que tous ceux qui l&#039;entourent ?', 'statics/images/upload/padawan.jpg', 5),
(6, 'Star Wars - Jedi : Battle Scars Poche', 'Sam Maggs', '416', 'Pocket', '2024-04-25', 'Roman racontant les aventures de Cal Kestis situées entre les évènements des jeux vidéo Jedi : Fallen Order (2019) et Jedi : Survivor (2023) Cal Kestis s&#039;est forgé une nouvelle vie auprès de l&#039;équipage du Stinger Mantis. Ensemble, ils ont abattu des chasseurs de primes, vaincu des Inquisiteurs et même réussi à échapper à Dark Vador en personne. Plus important encore, Merrin, Cere, Greez et le fidèle BD-1 sont, ce qui se rapproche le plus d&#039;une famille pour Cal depuis la chute de l&#039;Ordre Jedi.\r\nAu cours d&#039;une mission de routine, ils font la rencontre d&#039;une stormtrooper qui a besoin de leur aide pour déserter. En échange de leur soutien, elle leur apprend l&#039;existence d&#039;un outil puissant et d&#039;une valeur potentiellement inestimable dans leur combat. Mieux encore, elle peut les aider à le récupérer. Seul inconvénient, le retrouver les mettra sur la route d&#039;un des plus dangereux serviteurs de l&#039;Empire : l&#039;Inquisiteur connu sous le nom du Cinquième Frère. \r\n', 'statics/images/upload/battle-scars.jpg', 6),
(7, 'Le Manuel du Jedi', 'Daniel Wallace', '160', 'Hachette Heroes', '2019-04-17', 'Transmis de Maître à Apprentis, le Manuel des Jedi est un très ancien ouvrage de formation qui a éduqué et éclairé des générations de Jedi. \r\n\r\nDans ses pages, les Jedi-instructeurs découvriront  l&#039;histoire et les traditions de l&#039;Ordre Jedi, l&#039;utilisation de la Force, les nuances subtiles du combat au sabre laser et  les dangers du côté obscur. \r\n\r\nSeul exemplaire existant, cet ouvrage est annoté par la main de Yoda, Luke Skywalker, le comte Dooku  et Dark Sidious, entre autres.\r\n\r\nLe Manuel du Jedi est maintenant entre vos mains.\r\nFaites-en bon usage.\r\nQue la force soit avec vous!\r\n', 'statics/images/upload/manuel-du-jedi.jpg', 7),
(8, 'La Trilogie Dark Bane - intégrale', 'Drew Karpyshyn', '1008', 'Pocket', '2017-11-09', 'AN - 1020\r\n\r\nIl y a bien longtemps, dans une galaxie lointaine, très lointaine....\r\nPour échapper à un sinistre destin dans les mines d&#039;Apatros, Dessel, un mineur à la constitution exceptionnelle, décide de rejoindre les rangs de l&#039;armée Sith.\r\nSa vivacité d&#039;esprit, sa remarquable maîtrise de la Force et ses faits d&#039;armes brillants attirent sur lui l&#039;attention des Maîtres du Côté Obscur qui l&#039;envoient sur Korriban, berceau des Sith. Il y poursuit son enseignement et embrasse alors sa nouvelle identité : Bane, apprenti hors pair et esprit dissident, dont le seul but est d&#039;anéantir l&#039;Ordre Jedi et de créer une nouvelle ère de pouvoir absolu.\r\n', 'statics/images/upload/darkBane.jpg', 8),
(9, 'Star Wars Dark Droids N°01 : Le fléau des droïdes', 'Charles Soule', '192', 'Panini', '2024-04-20', 'La saga Dark Droids débute ici ! Retrouvez tous les mois la série principale Dark Droids mais aussi les séries Star Wars, Dark Vador, Bounty Hunters et Doctor Aphra elles aussi bouleversées par le soulèvement des droïdes. Les comics Star Wars se déroulant entre L&#039;Empire Contre-Attaque et Le Retour du Jedi sont proposées dans de copieux volumes (mensuels ou bimestriels) depuis le début de War of the Bounty Hunters. La trilogie de l&#039;Aube Écarlate (qui se conclut avec Hidden Empire) laisse la place à une saga qui va nous dévoiler la face cachée des droïdes…', 'statics/images/upload/darkDroids.jpg', 9),
(10, 'Le Livre des Sith', 'Daniel Wallace', '160', 'Hachette Heroes', '2019-04-17', 'Dans sa quête de domination totale,  Dark Sidious a compilé six textes légendaires du côté obscur, détaillant l&#039;histoire et la philosophie des Sith et écrits par Sorzus Syn, Dark Malgus, Dark Bane, Mère Talzin, Dark Plagueis et lui-même. Ensemble, ces documents forment le Livre des Sith. Au fil des siècles, ces textes sont passés entre les mains d&#039;utilisateurs de la Force - notamment, Dark Vador, Yoda, Mace Windu et Luke Skywalker - qui y ont laissé notes manuscrites et annotations dans les gares.\r\n\r\nCompilés par Daniel Wallace, ces textes ont été illustrés par de talentueux dessinateurs. Cet ouvrage introduit de nouveaux personnages et des histoires jusqu&#039;ici inconnues et approfondit la compréhension de la philosophie et des méthodes du côté obscur de la Force.', 'statics/images/upload/livre-des-siths.jpg', 10),
(11, 'Star Wars Dark Droids : Prologue', 'Charles Soule', '176', 'Panini', '2024-02-21', 'Alors que les Rebelles découvrent la construction d’une deuxième Etoile de la Mort, Dark Vador semble avoir besoin du Docteur Aphra pour reprendre le contrôle de la Force. Pendant ce temps, Valance fait de nouveau équipe avec les plus dangereux chasseurs de prime de l’univers dont… Boba Fett !', 'statics/images/upload/darkDroidsPrologue.jpg', 11),
(12, 'Star Wars : Le péril de la reine', 'Emily Kate Johnston', '288', 'Pocket', '2022-11-10', ' Depuis son élection à 14 ans jusqu&#039;à l&#039;invasion de sa planète, Padmé découvre ce qu&#039;il en coûte d&#039;être reine de Naboo.\r\n\r\nLorsque Padmé Naberrie remporte l&#039;élection de reine de Naboo à l&#039;âge de 14 ans, elle adopte le nom d&#039;Amidala et quitte sa famille pour le Palais Royal. Pour sa sécurité, elle aura besoin d&#039;un groupe d&#039;habiles suivantes qui lui serviront d&#039;assistantes, de confidentes, de protectrices et de doublures. Chaque jeune fille est sélectionnée pour ses talents particuliers, mais ce sera à Padmé de créer l&#039;unité entre elles. Lorsque Naboo est envahie par les forces de la Fédération du Commerce, la Reine Amidala et ses suivantes vont faire face à leur plus grand défi.\r\n', 'statics/images/upload/peril-de-la-reine.jpg', 12);

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

CREATE TABLE `serie` (
  `id_serie` int(11) NOT NULL,
  `titreS` varchar(50) DEFAULT NULL,
  `acteurS` text DEFAULT NULL,
  `ref_tmdb` int(11) DEFAULT NULL,
  `afficheS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `serie`
--

INSERT INTO `serie` (`id_serie`, `titreS`, `acteurS`, `ref_tmdb`, `afficheS`) VALUES
(1, 'Star Wars : The Clone Wars', 'Emmanuel Garijo -\r\nOlivia Luccioni -\r\nBruno Choël -\r\nSerge Biavan -\r\nJean Lescot -\r\nSylvie Jacob -\r\nJean-Paul Pitolin -\r\nPierre Dourlens -\r\nRoger Carel -\r\nJean-Luc Kayser -\r\nGeorges Claisse.', 4194, 'statics/images/upload/theCloneWars.jpg'),
(2, 'Star Wars : The Bad Batch', 'Serge Biavan -\r\nSylvain Agaësse -\r\nFrédéric Souterelle -\r\nEmmylou Homs -\r\nGérard Surugue -\r\nMarie Zidi -\r\nChristophe Desmottes -\r\nFabrice Lelyon -\r\nGunther Germain -\r\nJérôme Wiggins -\r\nMarie-Martine -\r\nPierre Laurent -\r\nVirginie Emane -\r\nThierry Kazazian -\r\nDaria Levannier.\r\n', 105971, 'statics/images/upload/theBadBatch.jpg'),
(3, 'Star Wars : Andor ', 'Diego Luna -\r\nStellan Skarsgård -\r\nKyle Soller -\r\nAdria Arjona -\r\nGenevieve O&#039;Reilly -\r\nDenise Gough -\r\nElizabeth Dulau -\r\nFaye Marsay -\r\nVarada Sethu.', 83867, 'statics/images/upload/andor.jpg'),
(4, 'Star Wars Visions', 'Emmanuel Garijo -\r\nOlivia Luccioni -\r\nBruno Choël -\r\nSerge Biavan -\r\nJean Lescot -\r\nSylvie Jacob -\r\nJean-Paul Pitolin -\r\nPierre Dourlens -\r\nRoger Carel -\r\nJean-Luc Kayser -\r\nGeorges Claisse.', 114478, 'statics/images/upload/vision.jpg'),
(5, 'Star Wars Résistance', 'Damien Locqueneux -\r\nFabian Finkels -\r\nJean-Marc Delhausse -\r\nHéléna Coppejans -\r\nFranck Dacquin -\r\nMarie Braam -\r\nNathalie Hons -\r\nPhilippe Résimont -\r\nAlain Eloy -\r\nMichelangelo Marchese -\r\nCélia Torrens -\r\nSophie Landresse -\r\nPhilippe Tasquin -\r\nBenoît Van Dorslaer -\r\nSimon Duprez -\r\nOlivier Prémel -\r\nDelphine Moriau -\r\nAlexis Flamant -\r\nMonia Douieb.\r\n', 79093, 'statics/images/upload/resistance.jpg'),
(6, 'Ahsoka', 'Rosario Dawson -\r\nNatasha Liu Bordizzo -\r\nMary Elizabeth Winstead -\r\nEman Esfandi -\r\nLars Mikkelsen -\r\nRay Stevenson -\r\nIvanna Sakhno -\r\nDiana Lee Inosanto -\r\nDavid Tennant.', 114461, 'statics/images/upload/ashoka.jpg'),
(7, 'Obi-wan Kenobi', 'Ewan McGregor -\r\nVivien Lyra Blair -\r\nMoses Ingram -\r\nHayden Christensen -\r\nOliver Ho -\r\nJonathan Ho -\r\nJames Earl Jones.', 92830, 'statics/images/upload/obi-wan.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudoU` varchar(50) NOT NULL,
  `mailU` varchar(50) NOT NULL,
  `mdpU` varchar(255) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'Membre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudoU`, `mailU`, `mdpU`, `region`, `description`, `role`) VALUES
(1, 'marion', 'divers.autres@outlook.fr', '$2y$10$viDfxx.q5o2cfMI/LF35wuLDxgtcifrcSJguAQjozYDKFa3l4dc5.', NULL, NULL, 'Membre'),
(2, 'Fenrae', 'antoine.boeraeve@gmail.com', '$2y$10$jZUmGILlLcdmW.WMNjfFxe063MVElBJTvQmFcyR5uKYMMW9ZDtfnC', 'Morbihan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.', 'Admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `commentaire_film`
--
ALTER TABLE `commentaire_film`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_film` (`id_film`);

--
-- Index pour la table `commentaire_livre`
--
ALTER TABLE `commentaire_livre`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `commentaire_serie`
--
ALTER TABLE `commentaire_serie`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_serie` (`id_serie`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD UNIQUE KEY `ref_tmdb` (`ref_tmdb`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id_livre`),
  ADD UNIQUE KEY `idS` (`idS`);

--
-- Index pour la table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id_serie`),
  ADD UNIQUE KEY `ref_tmdb` (`ref_tmdb`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `pseudoU` (`pseudoU`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `serie`
--
ALTER TABLE `serie`
  MODIFY `id_serie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `commentaire_film`
--
ALTER TABLE `commentaire_film`
  ADD CONSTRAINT `commentaire_film_ibfk_1` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaire` (`id_commentaire`),
  ADD CONSTRAINT `commentaire_film_ibfk_2` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`);

--
-- Contraintes pour la table `commentaire_livre`
--
ALTER TABLE `commentaire_livre`
  ADD CONSTRAINT `commentaire_livre_ibfk_1` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaire` (`id_commentaire`),
  ADD CONSTRAINT `commentaire_livre_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id_livre`);

--
-- Contraintes pour la table `commentaire_serie`
--
ALTER TABLE `commentaire_serie`
  ADD CONSTRAINT `commentaire_serie_ibfk_1` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaire` (`id_commentaire`),
  ADD CONSTRAINT `commentaire_serie_ibfk_2` FOREIGN KEY (`id_serie`) REFERENCES `serie` (`id_serie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
