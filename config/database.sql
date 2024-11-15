-- Table users
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    telephone VARCHAR(15),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table trajets
CREATE TABLE trajets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    conducteur_id INT,
    point_depart VARCHAR(100),
    point_arrivee VARCHAR(100),
    date_depart DATE,
    heure_depart TIME,
    places_disponibles INT,
    FOREIGN KEY (conducteur_id) REFERENCES users(id)
);



-- Table reservations
CREATE TABLE reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    trajet_id INT,
    passager_id INT,
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (trajet_id) REFERENCES trajets(id),
    FOREIGN KEY (passager_id) REFERENCES users(id)
);


