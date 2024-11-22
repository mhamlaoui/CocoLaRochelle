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
    depart VARCHAR(255) NOT NULL, 
    destination VARCHAR(255) NOT NULL, 
    latitude_depart DOUBLE PRECISION, 
    longitude_depart DOUBLE PRECISION, 
    latitude_destination DOUBLE PRECISION, 
    longitude_destination DOUBLE PRECISION, 
    date_trajet TIMESTAMP NOT NULL, 
    nombre_passagers INT NOT NULL, 
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur (id_utilisateur) 
);


-- Table reservations
CREATE TABLE reservations (
    id SERIAL PRIMARY KEY,
    trajet_id INT,
    passager_id INT,
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (trajet_id) REFERENCES trajets(id),
    FOREIGN KEY (passager_id) REFERENCES Utilisateur(id)
);


-- Utilisateur 1
INSERT INTO Utilisateur (nom, email, mot_de_passe, telephone)
VALUES ('Jean Dupont', 'jean.dupont@example.com', 'password123', '0123456789');

-- Utilisateur 2
INSERT INTO Utilisateur (nom, email, mot_de_passe, telephone)
VALUES ('Marie Lefevre', 'marie.lefevre@example.com', 'password456', '0987654321');

-- Utilisateur 3
INSERT INTO Utilisateur (nom, email, mot_de_passe, telephone)
VALUES ('Pierre Martin', 'pierre.martin@example.com', 'password789', '0147258369');

-- Utilisateur 4
INSERT INTO Utilisateur (nom, email, mot_de_passe, telephone)
VALUES ('Sophie Durand', 'sophie.durand@example.com', 'password321', '0176482910');

-- Utilisateur 5
INSERT INTO Utilisateur (nom, email, mot_de_passe, telephone)
VALUES ('Alexandre Bernard', 'alexandre.bernard@example.com', 'password654', '0164782930');

-- Trajet 1 : Vieux Port -> Parc Charruyer
INSERT INTO Trajet (id_utilisateur, depart, destination, latitude_depart, longitude_depart, latitude_destination, longitude_destination, date_trajet, nombre_passagers)
VALUES (1, 'Vieux Port, 17000 La Rochelle, France', 'Parc Charruyer, 17000 La Rochelle, France', 46.1603, -1.1511, 46.1560, -1.1565, '2024-11-22 08:00:00', 2);

-- Trajet 2 : Place de Verdun -> La Rochelle Gare
INSERT INTO Trajet (id_utilisateur, depart, destination, latitude_depart, longitude_depart, latitude_destination, longitude_destination, date_trajet, nombre_passagers)
VALUES (2, 'Place de Verdun, 17000 La Rochelle, France', 'Gare SNCF de La Rochelle, 17000 La Rochelle, France', 46.1581, -1.1514, 46.1567, -1.1516, '2024-11-22 09:00:00', 3);

-- Trajet 3 : Aquarium La Rochelle -> Phare de la Baleine
INSERT INTO Trajet (id_utilisateur, depart, destination, latitude_depart, longitude_depart, latitude_destination, longitude_destination, date_trajet, nombre_passagers)
VALUES (3, 'Aquarium La Rochelle, Quai Louis Prunier, 17000 La Rochelle, France', 'Phare de la Baleine, 17590 Île de Ré, France', 46.1577, -1.1538, 46.1951, -1.5089, '2024-11-22 10:00:00', 4);

-- Trajet 4 : La Rochelle Gare -> Vieux Port
INSERT INTO Trajet (id_utilisateur, depart, destination, latitude_depart, longitude_depart, latitude_destination, longitude_destination, date_trajet, nombre_passagers)
VALUES (4, 'Gare SNCF de La Rochelle, 17000 La Rochelle, France', 'Vieux Port, 17000 La Rochelle, France', 46.1567, -1.1516, 46.1603, -1.1511, '2024-11-22 11:00:00', 1);

-- Trajet 5 : Parc Charruyer -> Place de Verdun
INSERT INTO Trajet (id_utilisateur, depart, destination, latitude_depart, longitude_depart, latitude_destination, longitude_destination, date_trajet, nombre_passagers)
VALUES (5, 'Parc Charruyer, 17000 La Rochelle, France', 'Place de Verdun, 17000 La Rochelle, France', 46.1560, -1.1565, 46.1581, -1.1514, '2024-11-22 12:00:00', 2);
