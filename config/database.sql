-- Table Utilisateur
CREATE TABLE Utilisateur (
    id_utilisateur SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    telephone VARCHAR(15),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table trajets
CREATE TABLE Trajet (
    id_trajet SERIAL PRIMARY KEY, 
    id_utilisateur INT NOT NULL,
    nom_conducteur VARCHAR(255) NOT NULL, 
    depart VARCHAR(255) NOT NULL, 
    destination VARCHAR(255) NOT NULL,
    heure_depart TIME NOT NULL,
    latitude_depart DOUBLE PRECISION, 
    longitude_depart DOUBLE PRECISION, 
    latitude_destination DOUBLE PRECISION, 
    longitude_destination DOUBLE PRECISION, 
    date_trajet TIMESTAMP NOT NULL, 
    nombre_passagers INT NOT NULL, 
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur (id_utilisateur)
        ON DELETE CASCADE                                   -- Supprimer les trajets si le conducteur est supprimé 
);



CREATE TABLE Reservation (
    id_reservation SERIAL PRIMARY KEY, 
    id_utilisateur INT NOT NULL,                           
    id_trajet INT NOT NULL,                              
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur (id_utilisateur) 
        ON DELETE CASCADE,                                 -- Supprimer les réservations si l'utilisateur est supprimé
    FOREIGN KEY (id_trajet) REFERENCES Trajet (id_trajet) 
        ON DELETE CASCADE,                                 -- Supprimer les réservations si le trajet est supprimé
    UNIQUE (id_utilisateur, id_trajet)                    -- Un utilisateur ne peut réserver un trajet qu'une seule fois
);

-- Ajouter des utilisateurs
INSERT INTO Utilisateur (nom, email, mot_de_passe, telephone)
VALUES 
('Alice Dupont', 'alice@example.com', 'motdepasse123', '0612345678'),
('Bob Martin', 'bob@example.com', 'motdepasse456', '0698765432');

-- Ajouter des trajets
INSERT INTO Trajet (id_utilisateur, nom_conducteur, depart, destination, heure_depart, latitude_depart, longitude_depart, latitude_destination, longitude_destination, date_trajet, nombre_passagers)
VALUES 
(1, 'Alice Dupont', 'Paris', 'Lyon', '10:00', 48.8566, 2.3522, 45.7640, 4.8357, '2024-12-20 10:00:00', 3),
(2, 'Bob Martin', 'Marseille', 'Nice', '14:30', 43.2965, 5.3698, 43.7102, 7.2620, '2024-12-21 14:30:00', 4);

-- Ajouter des réservations
INSERT INTO Reservation (id_utilisateur, id_trajet)
VALUES 
(2, 1), -- Bob réserve un trajet de Paris à Lyon
(1, 2); -- Alice réserve un trajet de Marseille à Nice
