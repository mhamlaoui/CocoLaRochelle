CREATE TABLE Utilisateur     (
    id_user SERIAL PRIMARY KEY,
    nom_utilisateur VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    telephone VARCHAR(20)
);

CREATE TABLE trajets (
    id SERIAL PRIMARY KEY,             
    utilisateur_id INT NOT NULL,       
    depart VARCHAR(255) NOT NULL,     
    destination VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
	nombre_passagers INT NOT NULL
);