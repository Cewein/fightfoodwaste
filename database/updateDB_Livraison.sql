CREATE TABLE IF NOT EXISTS `livraison` (
  `identifiant` int(11) NOT NULL AUTO_INCREMENT,
  `id_beneficiaire` int(11) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_livraison` date DEFAULT NULL,
  `n_tournee` int(11) DEFAULT NULL,
  `etat` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`identifiant`),
  KEY `id_beneficiaire` (`id_beneficiaire`)
);

ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`id_beneficiaire`) REFERENCES `beneficiaire` (`identifiant`);
COMMIT;


ALTER TABLE `produit` ADD `id_livraison` INT NULL AFTER `id_utilisateur`, ADD INDEX (`id_livraison`);

ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_4` FOREIGN KEY (`id_livraison`) REFERENCES `livraison` (`identifiant`);
COMMIT;

DROP TABLE `livrer`;