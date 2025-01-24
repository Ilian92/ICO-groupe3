-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 jan. 2025 à 02:43
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

--
-- Déchargement des données de la table `cards`
--

INSERT INTO `cards` (`id`, `pack_id_id`, `type_id_id`, `name`, `description`, `image`, `quantity`) VALUES
(1, 1, 1, 'Pirates', 'Leur but est d’empoisonner les marins sans se faire repérer, pour noyer les\r\nsoupçons, ils ont le choix entre une carte « ÎLE », ou une carte\r\n« POISON ». Ils connaissent leurs complices', 'assets/Carte/Pirate.png', 9),
(2, 1, 1, 'Marins', 'Leur but est de bien choisir leur équipage afin d’arriver sur l’île sans se faire empoisonner. Ils n’ont pas le choix et ne peuvent poser que des cartes “ÎLE”.\r\n\r\nIls doivent démasquer les pirates et identifier leurs alliés.', 'assets/Carte/Marin.png', 10),
(3, 1, 1, 'Sirène', 'La Sirène est une carte rôle à plusieurs options, elle ouvre les yeux en même\r\ntemps que les pirates mais eux ne savent qui est la sirène. Elle ne peut mettre que des cartes “ÎLE”.\r\n\r\nATTENTION : Elle n’a pas le droit de déclarer son rôle, si elle est trop explicite les joueurs peuvent mettre fin à la partie.\r\n\r\nSi les marins gagnent, elle gagne avec eux. Si les pirates gagnent, ils doivent\r\nvoter afin d’identifier la sirène, si la majorité se trompent la sirène gagne la\r\npartie seule.', 'assets/Carte/Sirene.png', 1),
(4, 1, 2, 'L’Île', 'Permet d’arriver à destination.\r\nS’il y a trois îles, la manche est gagnée pour les marins et la sirène.', 'assets/Carte/Ile.png', 6),
(5, 1, 2, 'Le Poison', 'L’équipage est empoisonné par les pirates.\r\n\r\nS’il y a au moins un poison, la manche est gagnée pour les pirates.\r\n\r\nAttention : S’il y a plusieurs poisons, un seul point est marqué et les pirates\r\nseront repérés plus facilement', 'assets/Carte/Poison.png', 6),
(6, 1, 3, 'Mal de mer', 'UTILISABLE SEULEMENT APRÈS LA PHASE DE VOTE ET L’ACCEPTATION DE L’ÉQUIPAGE.\r\n\r\nUn des joueurs a le mal de mer et ne peut pas partir avec l’équipage\r\n\r\nLa personne qui a le mal de mer l’aura jusqu’à la fin de la manche.', 'assets/Carte/Mal_de_mer.png', 1),
(7, 1, 3, 'Mer agitée', 'UTILISABLE TANT QU’AUCUN JOUEUR N’A POSÉ DE CARTE ACTION\r\n\r\nLa personne qui propose son équipage doit passer son tour, si l’équipage avait déjà été choisis, ils rendent leurs cartes.', 'assets/Carte/Mer_agitee.png', 1),
(8, 1, 3, 'Antidote', 'UTILISABLE SEULEMENT UNE FOIS QUE LES CARTES ACTIONS ONT ETE DEVOILÉES ET QU’UNE CARTE POISON AI ÉTÉ DECOUVERTE.\n\nSi une carte poison est trouvée, l’antidote permet de sauver l’équipage, le point pour les pirates est donc annulé, mais aucun point n’est gagné pour les marins.\n\nCette carte annule donc la manche.', 'assets/Carte/Antidote.png', 1),
(9, 1, 3, 'Observateur', 'UTILISABLE SEULEMENT UNE FOIS QUE LES CARTES ACTIONS ONT ÉTÉ DEVOILÉES :\r\n\r\nL’observateur peut demander à voir la carte non utilisée par un des joueurs,\r\nil est le seul à pouvoir la voir et a donc la possibilité de mentir.', 'assets/Carte/Observateur.png', 1),
(11, 1, 3, 'Malandrin', 'UTILISABLE À N’IMPORTE QUEL MOMENT\r\n\r\nLe malandrin choisis un joueur qui n’a pas encore posé sa carte bonus et la lui vole, il ne sait pas ce qu’il va avoir, mais s’il a prêté attention au jeu il peut en avoir une idée.', 'assets/Carte/Malandrin.png', 1),
(12, 1, 3, 'Voyage express', 'UTILISABLE AVANT LA FIN DE LA PHASE DE VOTE\r\n\r\nLe détenteur de cette carte choisis un équipage et aucun vote n’est requis, il peut s’inclure dans le voyage ou faire partir les autres joueurs. Il peut faire partir un voyage précédemment refusé, cette carte peut être utilisée pour faire valider l’équipage d’un autre joueur.\r\n\r\nATTENTION : SI DEUX DE VOS VOYAGES SONT REFUSES ET QUE VOUS N’AVEZ PAS UTILISER LA CARTE VOUS PASSEZ VOTRE TOUR', 'assets/Carte/Voyage_express.png', 1),
(13, 1, 3, 'Perroquet', 'UTILISABLE AVANT LA PHASE DE VOTE\r\n\r\nL’équipage qui a été choisi dans la manche précédente repart en mer.\r\nC’est la seule carte qui permet de choisir deux fois d’affilé le même équipage, vous passez votre tour après le voyage.\r\n\r\nAttention : Le résultat pourrait être différent, et le perroquet reproduit à\r\nl’identique le tour précèdent (s’il y a eu un mal de mer, ou un par-des-\r\nsus-bord, la manche se repassera dans les même conditions)', 'assets/Carte/Perroquet.png', 1),
(14, 1, 3, 'Charlatan', 'UTILISABLE À TOUT MOMENT\r\n\r\nTous les joueurs donnent leurs cartes bonus à la personne de gauche, si vous n’aviez plus de carte vous ne donnez rien et récupérer la carte de votre voisin de droite.\r\n\r\nLa personne qui a joué la carte charlatan jette sa carte, et récupère celle de son voisin de droite.', 'assets/Carte/Charlatan.png', 1),
(15, 1, 3, 'Médusa', 'UTILISABLE À TOUT MOMENT\r\n\r\nVous demandez à un joueur de dévoiler sa carte bonus à tout le monde.', 'assets/Carte/Medusa.png', 1),
(16, 1, 3, 'Troc', 'UTILISABLE AVANT QUE LES CARTES ACTIONS UTILISÉES NE SOIENT MÉLANGÉES\r\n\r\nVous demandez à un joueur qui a posé sa carte action, d’échanger sa carte avec celle qu’il n’a pas posé.', 'assets/Carte/Troc.png', 1);

--
-- Déchargement des données de la table `card_type`
--

INSERT INTO `card_type` (`id`, `name`) VALUES
(1, 'Personnage'),
(2, 'Action'),
(3, 'Bonus');

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250121144625', '2025-01-22 15:43:44', 21),
('DoctrineMigrations\\Version20250122154405', '2025-01-22 15:44:12', 66),
('DoctrineMigrations\\Version20250122210616', '2025-01-22 21:06:22', 528);

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `status_id_id`, `title`, `content`, `image`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Notre super site de carte est lancé !', 'Bonjour et bienvenue sur notre super site dédié à ICO.', '/assets/Jeu/ICO-Classic.png', '2025-01-24 12:12:00', '2025-01-26 12:12:00', '2025-01-22 00:49:00', NULL),
(2, 2, 'Un nouvel événement', 'Un nouvel événement est prévu ce week-end !', '/assets/Jeu/ICO-Classic.png', '2025-01-25 05:24:59', '2025-01-26 05:24:59', '2025-01-22 04:24:59', NULL);

--
-- Déchargement des données de la table `news_status`
--

INSERT INTO `news_status` (`id`, `name`) VALUES
(1, 'news'),
(2, 'event');

--
-- Déchargement des données de la table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'paid'),
(3, 'shipped'),
(4, 'cancelled');

--
-- Déchargement des données de la table `packs`
--

INSERT INTO `packs` (`id`, `name`, `description`, `price`, `image`, `created_at`, `fnac_link`, `amazon_link`) VALUES
(1, 'Ico Classic', 'Quelque part en pleine Mer, un groupe de Marins est chargé de transporter un Trésor, mais des pirates ont peut-être infiltré leur équipage afin de le voler.\r\n\r\nEntre tempête, mal de mer, sirènes, trahisons et autres dangers, le trésor arrivera-t-il à bon port ?', 25.99, 'assets/Jeu/ICO-Classic.png', '2025-01-22 02:17:14', NULL, 'https://www.amazon.fr/dp/B015VEU12G?tag=cartesico-21');

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `address`, `is_verified`, `created_at`, `roles`) VALUES
(2, 'rudy.vieira3@gmail.com', '$2y$13$MvDEhzaMS7i43EwurLZ2C.rTu5sN/BVpsLzUPvbEA3U40IJ1EqWea', 'Rudy', 'Vieira', 'abab', 1, '2025-01-23 21:43:04', '[\"ROLE_ADMIN\"]'),
(3, 'admin@admin', '$2y$13$hkSF3WyxuKETbvNIqS629.hfos9GOPUS78y4k4KZxvOxF6AHBw1FG', 'admin', 'admin', NULL, 1, '2025-01-24 02:39:30', '[\"ROLE_ADMIN\"]');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
