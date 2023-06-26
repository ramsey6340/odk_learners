-- ########################################################################
-- ################### Base de données : `portail_odk` ####################
-- ########################################################################

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_adm` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `apprenant`
--

CREATE TABLE `apprenant` (
  `id_app` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_adm` int(11) NOT NULL,
  `matricule` varchar(6) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `age` int(2) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `num_tel` varchar(20) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `promotion` varchar(2) NOT NULL,
  `annee_cert` varchar(4) NOT NULL,
  FOREIGN KEY(id_adm) REFERENCES administrateur(id_adm)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;