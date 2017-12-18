
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- client
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client`
(
    `idClient` INTEGER NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(255) NOT NULL,
    `prenom` VARCHAR(255) NOT NULL,
    `adresse` VARCHAR(1024),
    `codePostal` VARCHAR(5),
    `ville` VARCHAR(50),
    `pays` VARCHAR(50),
    `login` VARCHAR(25) NOT NULL,
    `email` VARCHAR(1024),
    `pass` VARCHAR(200) NOT NULL,
    `solde` FLOAT,
    `tel` DECIMAL(10,0),
    PRIMARY KEY (`idClient`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- administrateur
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `administrateur`;

CREATE TABLE `administrateur`
(
    `idAdministrateur` INTEGER NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(255) NOT NULL,
    `prenom` VARCHAR(255) NOT NULL,
    `adresse` VARCHAR(1024),
    `codePostal` VARCHAR(5),
    `ville` VARCHAR(50),
    `pays` VARCHAR(50),
    `login` VARCHAR(25) NOT NULL,
    `email` VARCHAR(1024),
    `pass` VARCHAR(25) NOT NULL,
    `hasPower` TINYINT(1) NOT NULL,
    `dateCreation` INTEGER NOT NULL,
    PRIMARY KEY (`idAdministrateur`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- commande
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `commande`;

CREATE TABLE `commande`
(
    `idCommande` INTEGER NOT NULL AUTO_INCREMENT,
    `etatCommande` TINYINT(1) NOT NULL,
    `date` DATE,
    `montant` FLOAT NOT NULL,
    `client_id` INTEGER NOT NULL,
    PRIMARY KEY (`idCommande`),
    INDEX `commande_FI_1` (`client_id`),
    CONSTRAINT `commande_FK_1`
        FOREIGN KEY (`client_id`)
        REFERENCES `client` (`idClient`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- panier
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `panier`;

CREATE TABLE `panier`
(
    `numPanier` INTEGER NOT NULL AUTO_INCREMENT,
    `quantite` INTEGER,
    `commande_id` INTEGER NOT NULL,
    `article_id` INTEGER NOT NULL,
    PRIMARY KEY (`numPanier`),
    INDEX `panier_FI_1` (`commande_id`),
    INDEX `panier_FI_2` (`article_id`),
    CONSTRAINT `panier_FK_1`
        FOREIGN KEY (`commande_id`)
        REFERENCES `commande` (`idCommande`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE,
    CONSTRAINT `panier_FK_2`
        FOREIGN KEY (`article_id`)
        REFERENCES `article` (`idArticle`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- article
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article`
(
    `idArticle` INTEGER NOT NULL AUTO_INCREMENT,
    `reference` VARCHAR(255) NOT NULL,
    `libelle` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `prixHT` FLOAT NOT NULL,
    `quantiteStock` INTEGER NOT NULL,
    `dateAjout` DATE,
    `categorie_id` INTEGER NOT NULL,
    `image` VARCHAR(255),
    `tauxTVA_id` INTEGER NOT NULL,
    PRIMARY KEY (`idArticle`),
    INDEX `article_FI_1` (`categorie_id`),
    INDEX `article_FI_2` (`tauxTVA_id`),
    CONSTRAINT `article_FK_1`
        FOREIGN KEY (`categorie_id`)
        REFERENCES `categorie` (`idCategorie`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE,
    CONSTRAINT `article_FK_2`
        FOREIGN KEY (`tauxTVA_id`)
        REFERENCES `tauxTVA` (`idTaux`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- tauxTVA
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tauxTVA`;

CREATE TABLE `tauxTVA`
(
    `idTaux` INTEGER NOT NULL AUTO_INCREMENT,
    `taux` FLOAT NOT NULL,
    PRIMARY KEY (`idTaux`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- categorie
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `categorie`;

CREATE TABLE `categorie`
(
    `idCategorie` INTEGER NOT NULL AUTO_INCREMENT,
    `libelle` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- facture
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `facture`;

CREATE TABLE `facture`
(
    `idFacture` INTEGER NOT NULL AUTO_INCREMENT,
    `moyenPaiement` VARCHAR(255) NOT NULL,
    `commande_id` INTEGER NOT NULL,
    PRIMARY KEY (`idFacture`),
    INDEX `facture_FI_1` (`commande_id`),
    CONSTRAINT `facture_FK_1`
        FOREIGN KEY (`commande_id`)
        REFERENCES `commande` (`idCommande`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE
) ENGINE=InnoDB CHARACTER SET='utf8';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
