<?php

class Trajet {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function ajouterTrajet($utilisateur_id, $depart, $destination, $date, $nombre_passagers) {
        $requete = $this->pdo->prepare("INSERT INTO Trajets (utilisateur_id, depart, destination, date, nombre_passagers) VALUES (:utilisateur_id, :depart, :destination, :date, :nombre_passagers)");
        
        return $requete->execute([
            ':utilisateur_id' => $utilisateur_id,
            ':depart' => $depart,
            ':destination' => $destination,
            ':date' => $date,
            ':nombre_passagers' => $nombre_passagers,
        ]);
    }

    public function obtenirTrajetsParUtilisateur($utilisateur_id) {
        $requete = $this->pdo->prepare("SELECT * FROM trajets WHERE utilisateur_id = :utilisateur_id ORDER BY date DESC");
        $requete->execute([':utilisateur_id' => $utilisateur_id]);
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}
