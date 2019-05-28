DROP TABLE interagir;
CREATE TABLE interagir(
                        idInteragir INT AUTO_INCREMENT,
                        id_utilisateur INT,
                        id_demande INT,
                        action VARCHAR(20),
                        CONSTRAINT fk_user FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(identifiant),
                        CONSTRAINT fk_demande FOREIGN KEY (id_demande) REFERENCES demande(identifiant),
                        PRIMARY KEY (idInteragir)
);