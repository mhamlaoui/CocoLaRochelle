<?php

class Trajet {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function ajouterTrajet($utilisateur_id, $depart, $destination, $date_trajet, $nombre_passagers) {
        $requete = $this->pdo->prepare("INSERT INTO Trajet (id_utilisateur, depart, destination,  date_trajet, nombre_passagers) VALUES (:id_utilisateur, :depart, :destination, :date_trajet, :nombre_passagers)");
        
        return $requete->execute([
            ':id_utilisateur' => $utilisateur_id,
            ':depart' => $depart,
            ':destination' => $destination,
            ':date_trajet' =>  $date_trajet,
            ':nombre_passagers' => $nombre_passagers,
        ]);
    }

    public function obtenirTrajetsParUtilisateur($utilisateur_id) {
        $requete = $this->pdo->prepare("SELECT * FROM trajet WHERE id_utilisateur = :id_utilisateur ORDER BY date_trajet DESC");
        $requete->execute([':id_utilisateur' => $utilisateur_id]);
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTousTrajets() {
        $requete = $this->pdo->query("SELECT * FROM Trajet");
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}


