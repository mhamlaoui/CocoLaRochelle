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
);



