-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 22 jan. 2025 à 08:39
-- Version du serveur : 8.2.0
-- Version de PHP : 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ico`
--

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_id_id` int NOT NULL,
  `type_id_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4C258FDCDB01426` (`pack_id_id`),
  KEY `IDX_4C258FD714819A0` (`type_id_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cards`
--

INSERT INTO `cards` (`id`, `name`, `description`, `image`, `pack_id_id`, `type_id_id`) VALUES
(1, 'Pirates', 'Leur but est d’empoisonner les marins sans se faire repérer, pour noyer les\r\nsoupçons, ils ont le choix entre une carte « ÎLE », ou une carte\r\n« POISON ». Ils connaissent leurs complices', 'assets/Carte/Pirate.png', 1, 1),
(2, 'Marins', 'Leur but est de bien choisir leur équipage afin d’arriver sur l’île sans se faire empoisonner. Ils n’ont pas le choix et ne peuvent poser que des cartes “ÎLE”.\r\n\r\nIls doivent démasquer les pirates et identifier leurs alliés.', 'assets/Carte/Marin.png', 1, 1),
(3, 'Sirène', 'La Sirène est une carte rôle à plusieurs options, elle ouvre les yeux en même\r\ntemps que les pirates mais eux ne savent qui est la sirène. Elle ne peut mettre que des cartes “ÎLE”.\r\n\r\nATTENTION : Elle n’a pas le droit de déclarer son rôle, si elle est trop explicite les joueurs peuvent mettre fin à la partie.\r\n\r\nSi les marins gagnent, elle gagne avec eux. Si les pirates gagnent, ils doivent\r\nvoter afin d’identifier la sirène, si la majorité se trompent la sirène gagne la\r\npartie seule.', 'assets/Carte/Sirene.png', 1, 1),
(4, 'L’Île', 'Permet d’arriver à destination.\r\nS’il y a trois îles, la manche est gagnée pour les marins et la sirène.', 'assets/Carte/Ile.png', 1, 2),
(5, 'Le Poison', 'L’équipage est empoisonné par les pirates.\r\n\r\nS’il y a au moins un poison, la manche est gagnée pour les pirates.\r\n\r\nAttention : S’il y a plusieurs poisons, un seul point est marqué et les pirates\r\nseront repérés plus facilement', 'assets/Carte/Poison.png', 1, 2),
(6, 'Mal de mer', 'UTILISABLE SEULEMENT APRÈS LA PHASE DE VOTE ET L’ACCEPTATION DE L’ÉQUIPAGE.\r\n\r\nUn des joueurs a le mal de mer et ne peut pas partir avec l’équipage\r\n\r\nLa personne qui a le mal de mer l’aura jusqu’à la fin de la manche.', 'assets/Carte/Mal_de_mer.png', 1, 3),
(7, 'Mer agitée', 'UTILISABLE TANT QU’AUCUN JOUEUR N’A POSÉ DE CARTE ACTION\r\n\r\nLa personne qui propose son équipage doit passer son tour, si l’équipage avait déjà été choisis, ils rendent leurs cartes.', 'assets/Carte/Mer_agitee.png', 1, 3),
(8, 'Antidote', 'UTILISABLE SEULEMENT UNE FOIS QUE LES CARTES ACTIONS ONT ETE DEVOILÉES ET QU’UNE CARTE POISON AI ÉTÉ DECOUVERTE.\n\nSi une carte poison est trouvée, l’antidote permet de sauver l’équipage, le point pour les pirates est donc annulé, mais aucun point n’est gagné pour les marins.\n\nCette carte annule donc la manche.', 'assets/Carte/Antidote.png', 1, 3),
(9, 'Observateur', 'UTILISABLE SEULEMENT UNE FOIS QUE LES CARTES ACTIONS ONT ÉTÉ DEVOILÉES :\r\n\r\nL’observateur peut demander à voir la carte non utilisée par un des joueurs,\r\nil est le seul à pouvoir la voir et a donc la possibilité de mentir.', 'assets/Carte/Observateur.png', 1, 3),
(10, 'Tribord', 'UTILISABLE À LA FIN D’UNE MANCHE AVANT QUE LA PROCHAINE PERSONNE CHOISISSE SON ÉQUIPAGE\r\n\r\nLe jeu change de sens.', 'assets/Carte/Tribord.png', 1, 3),
(11, 'Malandrin', 'UTILISABLE À N’IMPORTE QUEL MOMENT\r\n\r\nLe malandrin choisis un joueur qui n’a pas encore posé sa carte bonus et la lui vole, il ne sait pas ce qu’il va avoir, mais s’il a prêté attention au jeu il peut en avoir une idée.', 'assets/Carte/Malandrin.png', 1, 3),
(12, 'Voyage express', 'UTILISABLE AVANT LA FIN DE LA PHASE DE VOTE\r\n\r\nLe détenteur de cette carte choisis un équipage et aucun vote n’est requis, il peut s’inclure dans le voyage ou faire partir les autres joueurs. Il peut faire partir un voyage précédemment refusé, cette carte peut être utilisée pour faire valider l’équipage d’un autre joueur.\r\n\r\nATTENTION : SI DEUX DE VOS VOYAGES SONT REFUSES ET QUE VOUS N’AVEZ PAS UTILISER LA CARTE VOUS PASSEZ VOTRE TOUR', 'assets/Carte/Voyage_express.png', 1, 3),
(13, 'Perroquet', 'UTILISABLE AVANT LA PHASE DE VOTE\r\n\r\nL’équipage qui a été choisi dans la manche précédente repart en mer.\r\nC’est la seule carte qui permet de choisir deux fois d’affilé le même équipage, vous passez votre tour après le voyage.\r\n\r\nAttention : Le résultat pourrait être différent, et le perroquet reproduit à\r\nl’identique le tour précèdent (s’il y a eu un mal de mer, ou un par-des-\r\nsus-bord, la manche se repassera dans les même conditions)', 'assets/Carte/Perroquet.png', 1, 3),
(14, 'Charlatan', 'UTILISABLE À TOUT MOMENT\r\n\r\nTous les joueurs donnent leurs cartes bonus à la personne de gauche, si vous n’aviez plus de carte vous ne donnez rien et récupérer la carte de votre voisin de droite.\r\n\r\nLa personne qui a joué la carte charlatan jette sa carte, et récupère celle de son voisin de droite.', 'assets/Carte/Charlatan.png', 1, 3),
(15, 'Médusa', 'UTILISABLE À TOUT MOMENT\r\n\r\nVous demandez à un joueur de dévoiler sa carte bonus à tout le monde.', 'assets/Carte/Medusa.png', 1, 3),
(16, 'Troc', 'UTILISABLE AVANT QUE LES CARTES ACTIONS UTILISÉES NE SOIENT MÉLANGÉES\r\n\r\nVous demandez à un joueur qui a posé sa carte action, d’échanger sa carte avec celle qu’il n’a pas posé.', 'assets/Carte/Troc.png', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `card_type`
--

DROP TABLE IF EXISTS `card_type`;
CREATE TABLE IF NOT EXISTS `card_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `card_type`
--

INSERT INTO `card_type` (`id`, `name`) VALUES
(1, 'Personnage'),
(2, 'Action'),
(3, 'Bonus');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250121141055', '2025-01-21 15:46:34', 83),
('DoctrineMigrations\\Version20250121141114', '2025-01-21 14:11:22', 35),
('DoctrineMigrations\\Version20250121142731', '2025-01-21 14:27:54', 35),
('DoctrineMigrations\\Version20250121145646', '2025-01-21 14:56:54', 16),
('DoctrineMigrations\\Version20250121154618', '2025-01-21 15:46:34', 59),
('DoctrineMigrations\\Version20250121161808', '2025-01-21 16:18:14', 504),
('DoctrineMigrations\\Version20250121162039', '2025-01-21 16:20:44', 54);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `end_date` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `status_id_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1DD39950881ECFA7` (`status_id_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `start_date`, `end_date`, `created_at`, `updated_at`, `status_id_id`) VALUES
(1, 'Notre super site de carte est lancé !', 'Bonjour et bienvenue sur notre super site dédié à ICO.', 'https://icon-icons.com/icons2/9/PNG/256/game_playing-cards_card_cards_poker_1488.png', NULL, NULL, '2025-01-22 00:49:09', NULL, 1),
(2, 'Un nouvel événement', 'Un nouvel événement est prévu ce week-end !', 'https://icon-icons.com/icons2/9/PNG/256/game_playing-cards_card_cards_poker_1488.png', '2025-01-25 05:24:59', '2025-01-26 05:24:59', '2025-01-22 04:24:59', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `news_status`
--

DROP TABLE IF EXISTS `news_status`;
CREATE TABLE IF NOT EXISTS `news_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `news_status`
--

INSERT INTO `news_status` (`id`, `name`) VALUES
(1, 'news'),
(2, 'event');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `total_price` decimal(5,2) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `status_id_id` int NOT NULL,
  `user_id_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E52FFDEE881ECFA7` (`status_id_id`),
  KEY `IDX_E52FFDEE9D86650F` (`user_id_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  `order_id_id` int NOT NULL,
  `pack_id_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_62809DB0FCDAEAAA` (`order_id_id`),
  KEY `IDX_62809DB0CDB01426` (`pack_id_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
CREATE TABLE IF NOT EXISTS `order_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'paid'),
(3, 'shipped'),
(4, 'cancelled');

-- --------------------------------------------------------

--
-- Structure de la table `packs`
--

DROP TABLE IF EXISTS `packs`;
CREATE TABLE IF NOT EXISTS `packs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `packs`
--

INSERT INTO `packs` (`id`, `name`, `description`, `price`, `image`, `created_at`) VALUES
(1, 'Ico Classic', 'Quelque part en pleine Mer, un groupe de Marins est chargé de transporter un Trésor, mais des pirates ont peut-être infiltré leur équipage afin de le voler.\r\n\r\nEntre tempête, mal de mer, sirènes, trahisons et autres dangers, le trésor arrivera-t-il à bon port ?', 25.99, 'assets/Jeu/ICO-Classic.png', '2025-01-22 02:17:14');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rules`
--

DROP TABLE IF EXISTS `rules`;
CREATE TABLE IF NOT EXISTS `rules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_id_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_899A993CCDB01426` (`pack_id_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rules`
--

INSERT INTO `rules` (`id`, `content`, `pack_id_id`) VALUES
(1, '<h2>Les règles du jeu <small>(7 à 20 personnes)</small></h2>\r\n\r\n<h2>Sommaire</h2>\r\n\r\n<ol type=\"I\">\r\n    <li><a href=\"#But\">But du jeu</a></li>\r\n    <li><a href=\"#Materiel\">Matériel</a></li>\r\n    <li><a href=\"#Cartes\">Les Cartes</a></li>\r\n    <li><a href=\"#Distribution\">Distribution des cartes</a></li>\r\n    <li><a href=\"#Partie\">Déroulement d’une partie</a></li>\r\n    <ol>\r\n        <li><a href=\"#Place\">Mise en place</a></li>\r\n        <li><a href=\"#Voyage\">Premier Voyage</a></li>\r\n        <li><a href=\"#Suite\">Suite de la partie</a></li>\r\n        <li><a href=\"#Conditions\">Conditions de Victoire</a></li>\r\n    </ol>\r\n</ol>\r\n\r\n<p>\r\nQuelque part en pleine Mer, un groupe de Marins est chargé de transporter un Trésor, mais des pirates ont peut-être infiltré leur équipage afin de le voler.\r\n<br>\r\nEntre tempête, mal de mer, sirènes, trahisons et autres dangers, le trésor arrivera-t-il à bon port ?\r\n</p>\r\n\r\n<h3 id=\"But\">But du jeu</h3>\r\n<ul>\r\n    <li>Pour les Marins et la Sirène : Identifier les pirates afin de choisir le bon équipage, pour pouvoir mettre le trésor en lieu sûr</li>\r\n    <li>Pour les Pirates : Gagner la confiance des Marins et les empoisonner afin de voler le trésor</li>\r\n</ul>\r\n\r\n<h3 id=\"Materiel\">Matériel (54 Cartes dont deux cartes «règle du jeu»)</h3>\r\n\r\n<table>\r\n    <thead>\r\n        <tr>\r\n            <th>Quantité</th>\r\n            <th>Éléments</th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td>10</td>\r\n            <td>Marins</td>\r\n        </tr>\r\n        <tr>\r\n            <td>6</td>\r\n            <td>Îles</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Antidote</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Voyage express</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Mal de mer</td>\r\n        </tr>\r\n        <tr>\r\n            <td>9</td>\r\n            <td>Pirates</td>\r\n        </tr>\r\n        <tr>\r\n            <td>6</td>\r\n            <td>Poissons</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Tribord</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Par-dessus bord</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Perroquet</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Sirène</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Mer agitée</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Amarrage</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Observateur</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Troc</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Charlatan</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Carte au trésor</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Double</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Malandrin</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Léviathan</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Typhon</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Chanceux</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Marchand</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Médusa</td>\r\n        </tr>\r\n        <tr>\r\n            <td>1</td>\r\n            <td>Solitaire</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n\r\n<h3 id=\"Cartes\">Cartes</h3>\r\n<!-- Insérer un lien vers les cartes -->\r\n\r\n<h3 id=\"Distribution\">Distribution des cartes</h3>\r\n<table>\r\n    <thead>\r\n        <tr>\r\n            <th>Joueurs</th>\r\n            <th>Pirates</th>\r\n            <th>Marins</th>\r\n            <th>Sirène</th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr><td>7</td><td>3</td><td>3</td><td>1</td></tr>\r\n        <tr><td>8</td><td>3</td><td>4</td><td>1</td></tr>\r\n        <tr><td>9</td><td>4</td><td>4</td><td>1</td></tr>\r\n        <tr><td>10</td><td>4</td><td>5</td><td>1</td></tr>\r\n        <tr><td>11</td><td>5</td><td>5</td><td>1</td></tr>\r\n        <tr><td>12</td><td>5</td><td>6</td><td>1</td></tr>\r\n        <tr><td>13</td><td>6</td><td>6</td><td>1</td></tr>\r\n        <tr><td>14</td><td>6</td><td>7</td><td>1</td></tr>\r\n        <tr><td>15</td><td>7</td><td>7</td><td>1</td></tr>\r\n        <tr><td>16</td><td>7</td><td>8</td><td>1</td></tr>\r\n        <tr><td>17</td><td>8</td><td>8</td><td>1</td></tr>\r\n        <tr><td>18</td><td>8</td><td>9</td><td>1</td></tr>\r\n        <tr><td>19</td><td>9</td><td>9</td><td>1</td></tr>\r\n        <tr><td>20</td><td>9</td><td>10</td><td>1</td></tr>\r\n    </tbody>\r\n</table>\r\n\r\n<p>Il faut également donner une carte bonus à chaque joueur</p>\r\n\r\n<h3 id=\"Partie\">Déroulement d’une partie</h3>\r\n\r\n<h4 id=\"Place\">Mise en place</h4>\r\n\r\n<ul>\r\n    <li>Les joueurs désignent ou tirent au sort le capitaine, il dirigera le début de la partie et jouera également.</li>\r\n    <li>Le capitaine distribue à chaque joueur une carte rôle et une carte bonus. Chaque joueur regarde discrètement son rôle et sa carte bonus puis repose ses cartes face cachées devant lui.</li>\r\n    <li>Le capitaine demande aux joueurs de fermer les yeux. Tous les joueurs baissent la tête et ferment les yeux (le capitaine aussi). Puis il appelle les pirates et à la sirène à ouvrir les yeux (le capitaine ouvrira les yeux s’il a un de ses rôles) et leur laisse suffisamment de temps pour se regarder.</li>\r\n    <li>Il demande à tout le monde de fermer les yeux.</li>\r\n    <li>Et pour finir il va demander à tout le monde de réouvrir les yeux.</li>\r\n</ul>\r\n<p>Attention : Vous ne fermerez plus les yeux par la suite, retenez bien qui a ouvert les yeux.</p>\r\n\r\n<h4 id=\"Voyage\">Premier voyage</h4>\r\n<p>Le capitaine choisi un équipage de trois personnes (dont il peut faire parti), il faut maintenant donner une carte poison et une carte île à chaque personne de l’équipage.</p>\r\n<p>Chaque participant choisit la carte qu’il veut poser et la met au milieu en face cachée, il place la carte non utilisée devant lui, toujours en face cachée.</p>\r\n<p>Un joueur mélange les cartes mises en jeu et les retournes.</p>\r\n<p>S’il y a au moins une carte poison les pirates marquent un point, s’il y a trois cartes îles c’est les marins et la sirène qui remportent le point.</p>\r\n<p>Le résultat étant connu, il faut récupérer toutes les cartes en face cachée, les mélanger et les redistribuer lors du prochain voyage.</p>\r\n\r\n<h4 id=\"Suite\">Suite de la partie</h4>\r\n<p>C’est le joueur suivant, dans le sens des aiguilles d’une montre, qui doit à nouveau choisir un équipage de trois personnes.</p>\r\n\r\n<p><b>ATTENTION !</b> A partir de ce tour et jusqu’à la fin de la partie il y aura un vote lorsque trois personnes seront proposées. (La personne qui propose l’équipage est forcément pour)</p>\r\n\r\n<p>Si la majorité des joueurs (ou au moins la moitié en cas de joueurs pair) est contre, l’équipage ne part pas et la personne peut proposer un nouvel équipage, qui sera différent d’au moins une personne.</p>\r\n\r\n<p>Si l’équipage est à nouveau refusé, la personne qui les a choisis passera son tour.</p>\r\n\r\n<p>Vous pouvez maintenant réitérer ce schéma jusqu’à la victoire d’une équipe, sans oublié d’utiliser vos cartes bonus à bon escient.</p>\r\n\r\n<h4 id=\"Conditions\">Conditions de Victoire</h4>\r\n<p>Une équipe gagne dès qu’elle remporte dix manches.\r\n<br>\r\n<p>Si les marins gagnent, la Sirène gagne avec eux. Si les pirates gagnent, ils doivent voter afin d’identifier la sirène, si la majorité se trompent la sirène gagne la partie seule.</p></p>', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(320) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(72) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `role_id_id` int NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1483A5E988987678` (`role_id_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_role`
--

INSERT INTO `user_role` (`id`, `name`) VALUES
(1, 'client'),
(2, 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `FK_4C258FD714819A0` FOREIGN KEY (`type_id_id`) REFERENCES `card_type` (`id`),
  ADD CONSTRAINT `FK_4C258FDCDB01426` FOREIGN KEY (`pack_id_id`) REFERENCES `packs` (`id`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_1DD39950881ECFA7` FOREIGN KEY (`status_id_id`) REFERENCES `news_status` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_E52FFDEE881ECFA7` FOREIGN KEY (`status_id_id`) REFERENCES `order_status` (`id`),
  ADD CONSTRAINT `FK_E52FFDEE9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `FK_62809DB0CDB01426` FOREIGN KEY (`pack_id_id`) REFERENCES `packs` (`id`),
  ADD CONSTRAINT `FK_62809DB0FCDAEAAA` FOREIGN KEY (`order_id_id`) REFERENCES `orders` (`id`);

--
-- Contraintes pour la table `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `FK_899A993CCDB01426` FOREIGN KEY (`pack_id_id`) REFERENCES `packs` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E988987678` FOREIGN KEY (`role_id_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
