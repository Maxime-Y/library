-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `author` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` VALUES (1,'Eiichiro Oda'),(2,'Akira Toriyama'),(3,'Tsugumi Oba'),(4,'Kentaro Miura'),(5,'Hiromu Arakawa'),(6,'Masashi Kishimoto'),(7,'Katsuhiro Otomo'),(8,'Hajime Isayama'),(9,'Yoshihiro Togashi'),(10,'Toru Fujisawa'),(11,'Tite Kubo'),(12,'Yusuke Murata'),(13,'Takehiko Inoue'),(14,'George Morikawa'),(15,'Masami Kurumada'),(16,'Shun Saeki'),(19,'Tetsuo Hara'),(21,'Rumiko Takahashi'),(22,'Tsukasa Hojo'),(23,'Naoki Urasawa'),(24,'Yukito Kishiro'),(25,'Tōkyō Gūru'),(26,'Kiseijū'),(27,'Kōhei Horikoshi'),(28,'Aishīrudo nijūichi'),(29,'Rurōni Kenshin'),(31,'Katsura Hoshino'),(32,'Masamune Shirow'),(33,'Koyoharu Gotōge'),(35,'Gege Akutami'),(36,'Tatsuki Fujimoto'),(37,'Hiroyuki Takei'),(38,'Yôichi Takahashi'),(39,'Kazuki Akane'),(40,'Daisuke Terasawa');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `publication_date` year NOT NULL,
  `description` longtext NOT NULL,
  `author_id` int NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_book_author_idx` (`author_id`),
  CONSTRAINT `fk_book_author` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'One Piece',1997,' Nous sommes à l\'ère des pirates. Luffy, un garçon espiègle, rêve de devenir le roi des pirates en trouvant le \"One Piece\", un fabuleux trésor. Seulement, Luffy a avalé un fruit du démon qui l\'a transformé en homme élastique. Depuis, il est capable de contorsionner son corps dans tous les sens, mais il a perdu la faculté de nager. Avec l\'aide de ses précieux amis, il va devoir affronter de redoutables pirates dans des aventures toujours plus rocambolesques.',1,'/pictures/one_piece.jpg'),(2,'Dragon ball',1984,'Son Goku, un enfant étrange vivant seul dans la forêt, rencontre Bulma, et décide de la suivre à travers le monde à la recherche de 7 boules de cristal appelées Dragon Ball.',2,'/pictures/dragon_ball.webp'),(3,'Death Note',2003,'Light Yagami ramasse un étrange carnet. Selon les instructions, la personne dont le nom est écrit dans les pages meurt dans les 40 secondes !',3,'/pictures/death_note.jpg'),(4,'Berserk',1989,'Dans un monde médiéval et fantastique, erre un guerrier solitaire nommé Guts, décidé à être seul maître de son destin. Autrefois contraint par un pari perdu à rejoindre les Faucons, une troupe de mercenaires dirigés par Griffith, Guts fut acteur de nombreux combats sanglants et témoin de sombres intrigues politiques. Mais il réalisa soudain que la fatalité n\'existe pas et qu\'il pouvait reprendre sa liberté s\'il le désirait vraiment...',4,'/pictures/berserk.jpg'),(5,'Full Metal Alchimist',2001,'En voulant ressusciter leur mère, Edward et Alphonse Elric vont utiliser une technique interdite relevant du domaine de l\'alchimie : la transmutation humaine. Seulement, l\'expérience va mal tourner : Edward perd un bras et une jambe et Alphonse son corps, son esprit se retrouvant prisonnier d\'une armure. Devenu un alchimiste d\'État, Edward, surnommé « Fullmetal Alchemist », se lance, avec l\'aide de son frère, à la recherche de la pierre philosophale, leur seule chance de retrouver leur état initial.',5,'/pictures/fullmetal_alchemist.webp'),(6,'Naruto',1999,' Naruto est un garçon un peu spécial. Il est toujours tout seul et son caractère fougueux ne l\'aide pas vraiment à se faire apprécier dans son village. Malgré cela, il garde au fond de lui une ambition: celle de devenir un maître Hokage, la plus haute distinction dans l\'ordre des ninjas, et ainsi obtenir la reconnaissance de ses pairs.',6,'/pictures/naruto.jpg'),(7,'Akira',1982,'Néo-Tokyo, an 2019. Nous sommes trente-huit ans après la Troisième Guerre mondiale. Le grand cataclysme a dévasté la planète. Depuis, le monde a entamé sa reconstruction. La capitale japonaise n\'est plus qu\'une espèce de gigantesque poubelle high-tech. Une nuit, une bande de jeunes motards fait une rencontre étrange : celle d\'un enfant au visage de vieillard, doté de bien curieux pouvoirs. Ils ne le savent pas encore, mais le processus de réveil d\'Akira vient de commencer... Sombre vision d\'un futur aux allures d\'apocalypse, Akira dépeint une société en perdition livrée aux enfants mutants, aux sectes religieuses et aux forces surnaturelles. Avec son sens du mouvement et de la vitesse, le dynamisme de son graphisme et son hyperréalisme, cette saga, entamée en 1982, est l\'une des ?uvres majeures de l\'histoire des mangas. Elle est née de l\'imagination de Katsuhiro Otomo, un auteur qui a largement contribué à faire reconnaître le genre hors des frontières de son pays natal.',7,'/pictures/akira.webp'),(8,'L\'attaque des titans',2009,'Eren est un jeune garçon rêvant de voyager dans le monde extérieur, mais cela est impossible car il vit dans une ville fortifiée aux murailles dépassant les 50 m de haut. Ces remparts sont nécessaires à la sécurité des habitants, qui sont les derniers représentants de l\'humanité, obligés de se cacher pour échapper aux titans qui ont massacré la majeure partie du genre humain un siècle plus tôt. Eren est têtu : il ne se doute pas de la violence des combats qui ont opposé les hommes aux titans. Il décide de poster sa candidature pour devenir éclaireur, car il s\'agit des seuls soldats autorisés à sortir de la ville pour en savoir plus sur les titans. Mais un beau jour, un géant parvient à détruire le mur qui protégeait la ville et ouvre la voie à plusieurs dizaines de ses congénères ! Eren assiste impuissant à la mort atroce de sa mère qui finit dévorée. Alors qu\'il fuit avec d\'autres survivants, il se jure de se venger et de détruire la race des titans jusqu\'à ce qu\'il n\'en reste plus un seul...',8,'/pictures/l_attaque_des_titans.jpg'),(9,'Hunter X Hunter',1998,'Dans les pas de son père, Gon quitte son village pour se présenter au difficile examen des hunters. En chemin, Gon se fera des amis. Mais survivront-ils à la première épreuve face à des participants particulièrement dangereux... ? Si quelques adversaires se montrent impitoyables dès le début, d\'autres comme Hisoka le magicien font preuve d\'un cruauté pour le moins inquiétante...',9,'/pictures/hunter_x_hunter.webp'),(10,'G.T.O.',1997,'Ancien voyou, chef de gang, Eikichi Onizuka décide un jour de devenir prof. Sa vocation n\'a rien de pédagogique. Ce qu\'il veut, c\'est pouvoir sortir avec les étudiantes du lycée où il travaille? Seulement, son sens de l\'honneur et de la justice risquent finalement d\'en faire un enseignant hors pair.',10,'/pictures/gto.webp'),(11,'Bleach',2001,'Adolescent de quinze ans, Ichigo Kurosaki possède un don particulier : celui de voir les esprits. Un jour, il croise la route d\'une belle Shinigami (un être spirituel) en train de pourchasser une « âme perdue », un esprit maléfique qui hante notre monde et n\'arrive pas à trouver le repos. Mise en difficulté par son ennemi, la jeune fille décide alors de prêter une partie de ses pouvoirs à Ichigo, mais ce dernier hérite finalement de toute la puissance du Shinigami. Contraint d\'assumer son nouveau statut, Ichigo va devoir gérer ses deux vies : celle de lycéen ordinaire, et celle de chasseur de démons...',11,'/pictures/bleach.webp'),(12,'One Punch Man',2012,' Aucune menace ne lui résiste, pour son plus grand malheur. Saitama, superhéros invincible, recherche désespérément un adversaire à sa hauteur...',12,'/pictures/one_punch_man.webp'),(13,'Slam Dunk',1990,'Sakuragi. Au collège, Hanamichi Sakuragi s\'est fait jeter par 50 filles. Il est ensuite entré au lycée, mais il est resté sous le choc du refus de la 50ème fille qui lui a répondu : « Je suis amoureuse d\'Oda du club de basket. » C\'est alors qu\'est apparue l\'âme salvatrice : Haruko Akagi. Il a suffit que, dans le couloir de l\'école, elle lui demande : « Tu aimes le basket ? » pour que son coeur s\'enflamme. Les choses ne sont malheureusement pas si simples puisqu\'elle est amoureuse d\'un garçon qui ne le sait pas: Kaede Rukawa. Ce garçon, véritable as du basket-ball du collège, va devenir le grand rival de Sakuragi.',13,'/pictures/slam_dunk.webp'),(14,'Ippo',1989,' Ippo Makunouchi est un lycéen timide souvent persécuté par les autres. Une rencontre avec le boxeur Takamura va lui faire découvrir la force insoupçonnée qui se cachait en lui... Depuis, Ippo caresse l\'espoir de devenir boxeur pro et cherche à se faire admettre dans le club de boxe de Kamogawa.',14,'/pictures/ippo.jpg'),(15,'Les chevaliers du zodiaques',1985,'Après de longues années d\'entraînement sous l\'égide de son maître Marine en Grèce, Seiya affronte Cassios dans un combat dont il sort victorieux. Il obtient ainsi le droit de revêtir l\'armure de bronze de Pégase et rentre dans son pays natal, le Japon. Il participe au tournoi galactique organisé par Saori Kido de la fondation Graad et terrasse le chevalier de bronze Geki de l\'Ours.',15,'/pictures/les_chevaliers_du_zodiaque.jpg'),(16,'Food Wars',2012,' Sôma a grandi dans les cuisines du restaurant familial et se prépare depuis toujours à prendre la succession. Mais son quotidien est bouleversé quand son père accepte un poste dans un palace new-yorkais. Le jeune garçon est alors envoyé dans une prestigieuse école culinaire. Bien décidé à ne pas décevoir sa famille, Sôma devra rivaliser de génie pour s\'imposer parmi les meilleurs espoirs.',16,'/pictures/food_wars.jpg'),(32,'Ken le survivant',1983,'Dans un monde ravagé par une guerre nucléaire, nombreux sont ceux qui errent à la recherche d\'eau et de nourriture. Les bandes armées terrorisent les villageois. Parmi ceux qui traversent ces terres dévastées : Ken, gardien d\'une technique de combat ancestrale et mortelle.',19,'/pictures/ken_le_survivant.jpg'),(33,'Ranma 1/2',1987,'Un jeune garçon et son père, tous deux adeptes des arts martiaux effectuent un voyage initiatique en Chine. Au cours d\'un de leurs exercices rituels, ils plongent malencontreusement dans un lac aux propriétés mystérieuses. Suite à cette baignade forcée, certains bouleversements vont s\'opérer dans leurs structures corporelles. Dorénavant, au contact de l\'eau chaude, ou de l\'eau froide, le père se métamorphose en Panda, et son fils en jeune fille. Dès lors toute une suite de quiproquos et d\'aventures imaginatives ne cessent de leur arriver...',21,'/pictures/ranma_1_2.webp'),(34,'City hunter',1985,'Ryô Saeba est un homme de l\'ombre, un nettoyeur. Filatures, protection rapprochée, parfois meurtres, il accepte n\'importe quel travail du moment que le cœur du client fasse vibrer le sien. Son partenaire Hideyuki Makimura, ancien policier, est un jour assassiné par le cartel Union Teope. Sa sœur, Kaori, décide de prendre la relève de son frère comme partenaire. Dès ce moment, Ryô s\'efforcera de ne plus tuer.',22,'/pictures/city_hunter.jpg'),(37,'Dragon ball Super',2015,'Les mois ont passé depuis le terrible affrontement entre Goku et Majin Boo… Mais après une période de paix, une nouvelle menace s’abat encore sur la Terre !! Et cette fois, les ennemis viennent de “l’univers 6”… Qu’est-ce que ça signifie ?',2,'/pictures/dragon_ball_super.jpg'),(39,'Dragon ball Z',1993,'Sur la planète Vegeta, un guerrier de classe inférieure, Baddack, est un exemple. Ses missions sont toutes couronnées de succès. De plus, il a récemment eu un garçon. Mais il n\'éprouve aucun amour pour lui car sa force de combat est seulement de 2 unités, ce qui est très faible, même pour un nourrisson, chez les Saiyans. Cet enfant porte le nom de Kakarotto. Un jour, alors qu\'il se reposait après avoir attaqué la planète Kanassa avec son équipe, il est frappé à la nuque par un survivant. Il lui annonce que le but n\'était pas de le tuer mais de lui jeter un sort, la préconnaissance. Baddack est alors assailli de visions de la planète explosant, Freezer jouissant de sa victoire et celle d\'un jeune garçon ressemblant à son fils. Il voit l\'avenir de son enfant Kakarotto, Son Goku, jusqu\'à sa rencontre avec le tyran Freezer.',2,'/pictures/dragon_ball_z.webp'),(41,'Pluto',2003,'Le très puissant robot Mont-Blanc a été détruit sans que l\'on sache par qui ou par quoi. Un des cadres du groupe de défense des lois est assassiné peu après. Deux affaires sans relation apparente ? Pourtant, sur les lieux du crime, c\'est le même ornement en forme de cornes qui a été retrouvé.',23,'/pictures/pluto.webp'),(42,'Monster',1994,'1986. Kenzo Tenma est un brillant neurochirurgien pratiquant son art à l\'hôpital Eisler de Düsseldorf. Tenma est comblé, il vient de sauver la vie d\'un chanteur d\'opéra célèbre... Promis à la belle Eva Heineman, la fille du directeur de l\'hôpital, son avenir est tout tracé. Tout lui sourit... Jusqu\'à la nuit où arrivent deux enfants, Anna et Johann Liebert, dont les parents ont été découverts sauvagement assassinés. En choisissant de sauver le petit garçon plutôt que le maire de la ville, le docteur perdra tout... Amour, gloire et honneur laisseront place à solitude, rupture et alcool... Surtout qu\'autour des deux enfants, les morts se multiplient. Tenma n\'aurait-il pas sauvé un monstre ?',23,'/pictures/monster.webp'),(43,'Gunnm',1990,'Gally est une androïde amnésique très attachante trouvée dans la Décharge, cet océan d\'ordures déversé par Zalem, la ville suspendue.',24,'/pictures/gunnm.jpg'),(44,'Tokyo Ghoul',2012,'À Tokyo, sévissent des goules, monstres cannibales se dissimulant parmi les humains pour mieux s’en nourrir. Étudiant timide, Ken Kaneki est plus intéressé par la jolie fille qui partage ses goûts pour la lecture que par ces affaires sordides, jusqu’au jour où il se fait attaquer par l’une de ces fameuses créatures. Mortellement blessé, il survit grâce à la greffe des organes de son agresseur… Remis de son opération, il réalise peu à peu qu’il est devenu incapable de se nourrir comme avant et commence à ressentir un appétit suspect envers ses congénères. C’est le début d’une descente aux enfers pour Kaneki, devenu malgré lui un hybride mi-humain, mi-goule.',25,'/pictures/tokyo_ghoul.jpg'),(45,'Parasite',1989,'Une nuit, des sphères de la taille d\'une balle de tennis tombent en nombre inconnu sur tout le Japon, il en sort des aliens à l\'apparence de serpents. Ils sont programmés pour prendre la place d\'un cerveau humain. Un de ceux-ci s\'attaque à Shin\'ichi et entre dans son corps en perforant sa main droite, mais le jeune lycéen l\'empêche de parvenir à son cerveau en serrant son bras droit avec le cordon de ses écouteurs. Le parasite, ne pouvant quitter son bras, fusionne finalement avec sa main droite. Pendant ce temps, d\'autres parasites, ayant réussi à prendre possession du cerveau de leur hôte, commencent à se nourrir d\'êtres humains. C\'est alors que le parasite et Shin\'ichi vont commencer à cohabiter, partant à la recherche des autres humains parasités pour les tuer et ainsi arrêter l\'invasion.',26,'/pictures/parasite.webp'),(46,'My Hero Academia',2014,'Dans un monde où 80% de la population possède un super‑pouvoir appelé alter, les héros font partie de la vie quotidienne. Et les super‑vilains aussi ! Face à eux se dresse l\'invincible All Might, le plus puissant des héros ! Le jeune Izuku Midoriya en est un fan absolu. Il n\'a qu\'un rêve : entrer à la Hero Academia pour suivre les traces de son idole. Le problème, c\'est qu\'il fait partie des 20 % qui n\'ont aucun pouvoir... Son destin est bouleversé le jour où sa route croise celle d\'All Might en personne ! Ce dernier lui offre une chance inespérée de voir son rêve se réaliser. Pour Izuku, le parcours du combattant ne fait que commencer !',27,'/pictures/my_hero_academia.jpg'),(47,'Eyeshield 21',2002,'Difficile de se faire respecter quand on est depuis toujours le souffre-douleur de ses camarades ! Sena le sait bien, lui qui est constamment chargé de faire le « coursier » pour tous ceux qui le briment. Pour cette rentrée scolaire, Sena veut tourner la page et se décide à rentrer dans un club. Malheureusement pour lui, il croise le chemin de Hiruma, le responsable du club de football américain, un être psychotique prêt à toutes les combines pour faire rentrer des joueurs dans son club. Lorsqu\'il découvre que Sena est doté d\'un jeu de jambe hors du commun, il décide de jeter son dévolu sur le pauvre garçon. Et ils n\'ont pas intérêt à tarder de recruter les onze autres joueurs manquants pour former une équipe, car le début du championnat inter lycéen débute... dans 24 heures !',28,'/pictures/eyeshield_21.jpg'),(48,'Kenshin le vagabond',1994,'À l\'aube de la restauration de Meiji, bravant la règle interdisant le port du sabre, un vagabond solitaire jadis assassin se lave de ses crimes en portant secours aux plus démunis, et en se jurant qu\'il ne tuera plus jamais personne...',29,'/pictures/kenshin_le_vagabond.jpg'),(50,'D.Gray-man',2004,'Le monde est sous la coupe d\'entités maléfiques, issues des expériences scientifiques d\'un génie malfaisant, le Comte Millénaire. Seule une lignée d\'exorcistes spécialement entraînés semble être en mesure de combattre ces créatures qui s\'attaquent aux humains. Allen Walker est l\'un d\'entre eux, et fait partie des plus jeunes recrues. Mais ses extraordinaires pouvoirs trahissent aussi un terrible secret : pourquoi sa main gauche est-elle celle d\'un démon ? Quelle est cette cicatrice qui le défigure, et quel lien possède-t-il avec le Comte ?',31,'/pictures/d_gray_man.webp'),(51,'Dr Slump',1980,'Dans le curieux village Pinguin, le génial savant Sembei Norimaki conçoit un robot ressemblant à une petite fille, à la force herculéenne : Aralé.',2,'/pictures/dr_slump.jpg'),(52,'Ghost in the Shell',1989,'Dans un Japon entièrement régi par des réseaux informatiques, voici les aventures du major Kusanagi et de Batou au sein de leur unité d\'intervention. Mettant en scène tous ses fantasmes, Shirow, l\'auteur des déjà célèbres Appleseed et Orion, nous entraîne une fois de plus dans son univers peuplé de mechas et de bioroïds, nous donnant son angoissante vision d\'un futur ne laissant aucune place pour les sentiments.',32,'/pictures/ghost_in_the_shell.webp'),(53,'Demon Slayer',2016,'Le Japon, au début du XXe siecle. Un petit marchand de charbon nommé Tanjiro vit une vie sans histoire dans les montagnes. Jusquau jour tragique où, après une courte absence, il retrouve son village et sa famille massacrés par un ogre ! La seule survivante de cette tragédie est sa jeune soeur Nezuko. Hélas, au contact de la bête, celle-ci sest à son tour métamorphosée en monstre... Afin de renverser le processus et de venger sa famille, Tanjiro décide de partir en quête de vérité. Pour le jeune héros et sa soeur, cest une longue aventure de sang et dacier qui commence !',33,'/pictures/demon_slayer.jpg'),(54,'YuYu Hakusho',1990,'Le turbulent et bagarreur élève qu\'est Yûsuke Urameshi meurt accidentellement en voulant sauver un petit garçon. Parce qu\'il n\'était pas prévu qu\'il trépasse si tôt, son âme erre sur terre. Il apprend ainsi qu\'il pourrait regagner son enveloppe charnelle s\'il faisait preuve de bonne volonté et d\'altruisme. Ainsi doit-il venir en aide aux âmes en peine de la terre.',9,'/pictures/yuyu_hakusho.jpg'),(55,'Jujutsu Kaisen',2018,'Yuuji est un jeune étudiant qui excelle dans le sport, notamment dans l\'athlétisme, mais qui a un immense poil dans la main. Du coup, au lieu de parfaire ses capacités physiques qui pourraient lui permettre de devenir le meilleur de l\'établissement, il s\'est inscrit au club de recherches occultes du lycée. Son petit train-train va changer du tout au tout lorsqu\'un véritable esprit malfaiteur vient menacer son école…',35,'/pictures/jujutsu_kaisen.jpg'),(56,'Chainsaw Man',2018,'Denji est quelqu\'un de pauvre, car son père est mort endetté. Un jour, il trouve un boulot qui consiste à tuer des démon. Accompagné de Pochita, un démon qui a une tronçonneuse sur la tête, quel sera le destin de Denji après avoir sacrifié sa vie et combattu pour ses dettes comme un chien ?',36,'/pictures/chainsaw_man.jpg'),(57,'Shaman King',1998,'Asakura Yoh débarque à Tokyo et tombe dans la classe de Oyamada Manta, qui va nous présenter une histoire étrange ! En effet, Yoh, son nouvel ami, est Shaman ! Il peut voir les fantômes, et même fusionner avec les esprits ! Il s\'allie avec Amidamaru, un samouraï mort il y a 600 ans, tout ça pour se lancer dans le Shaman Fight qui doit désigner le meilleur Shaman qui montrera le chemin à suivre à l\'humanité. De nombreux Shaman, amis ou ennemis, vont bientôt croiser leur route...',37,'/pictures/shaman_king.jpg'),(58,'Captain Tsubasa',1981,'Tsubasa est un garçon qui ne vit que pour le football. Nouvel arrivant dans la ville, il surprend deux écoles rivales sur le terrain de foot municipal.',38,'/pictures/captain_tsubasa.jpg'),(59,'Noein: To Your Other Self',2005,'La guerre perdure entre la dimension Lacryma et celle de Shangri-La. Lacryma, par des technologies avancées (quantiques), veut éradiquer la menace qui plane sur son monde, et Shangri-La annihile des dimensions toutes entières. Pour Lacryma, la seule issue se trouve dans \"la Torque du Dragon\", un artefact pouvant stopper la progression de Shangri-la sur Lacryma.',39,'/pictures/noein_to_your_other_self.jpg'),(60,'Mister Ajikko',1986,'Grand critique gastronomique, Genjirô Murata évalue restaurant sur restaurant quand sa route croise celle du jeune Yôichi Ajiyoshi. Surnommé le « Petit chef » par sa clientèle, ce dernier est aux fourneaux d’un établissement familial traditionnel qui ne paie pas de mine. Curieux, le gourmet professionnel goûte l’un de ses plats et... c’est la révélation! Conquis, il lui laisse sa carte de visite. Mais quelles aventures attendent donc Yoichi?',40,'/pictures/mister_ajikko.jpg');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_category`
--

DROP TABLE IF EXISTS `book_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_category` (
  `book_id` int NOT NULL,
  `category_id` int NOT NULL,
  KEY `fk_book_has_category_category1_idx` (`category_id`),
  KEY `fk_book_has_category_book1_idx` (`book_id`),
  CONSTRAINT `fk_book_has_category_book1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  CONSTRAINT `fk_book_has_category_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_category`
--

LOCK TABLES `book_category` WRITE;
/*!40000 ALTER TABLE `book_category` DISABLE KEYS */;
INSERT INTO `book_category` VALUES (1,1),(3,4),(4,3),(4,5),(5,1),(6,1),(8,1),(8,5),(9,1),(10,6),(12,1),(13,7),(14,7),(15,1),(16,8),(32,9),(32,3),(32,2),(33,1),(33,6),(34,6),(34,4),(37,9),(37,1),(11,1),(11,9),(39,9),(39,1),(41,2),(42,3),(42,4),(43,3),(43,2),(44,3),(44,1),(44,5),(45,1),(45,2),(2,1),(2,9),(46,9),(46,1),(47,9),(47,7),(48,9),(48,3),(50,1),(50,5),(51,9),(51,6),(52,3),(52,2),(53,9),(53,1),(54,9),(54,1),(55,3),(55,1),(55,5),(56,9),(56,3),(56,5),(57,9),(57,1),(58,7),(59,9),(59,2),(7,1),(7,2),(7,3),(60,8),(60,6);
/*!40000 ALTER TABLE `book_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'fantastique'),(2,'science fiction'),(3,'drame'),(4,'polar'),(5,'horreur'),(6,'humour'),(7,'sport'),(8,'gastronomie'),(9,'aventure');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'max','$2y$10$MRLMU7mm/DuEJbCrme7T.emol80WufYte0K0ky3hSKlq6bfxbB6sK','yehia.maxime@hotmail.fr'),(8,'kris','$2y$10$5Hzbwu0blpHOpUcLD6epH.3E6JKaLROEBUbu0gxMdbE2H.48vWT0m','yehia.maxime@gmail.fr');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-26 12:25:50
