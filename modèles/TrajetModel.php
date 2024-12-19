<?php

class TrajetModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function ajouterTrajet($utilisateur_id,$nom_utilisateur, $depart, $destination, $date_trajet,$heure_depart, $nombre_passagers) {
        $requete = $this->pdo->prepare("INSERT INTO Trajet (id_utilisateur,nom_conducteur, depart, destination,heure_depart,date_trajet, nombre_passagers) VALUES (:id_utilisateur,:nom_conducteur, :depart, :destination,:heure_depart, :date_trajet, :nombre_passagers)");
        
        return $requete->execute([
            ':id_utilisateur' => $utilisateur_id,
            ':nom_conducteur' => $nom_utilisateur,
            ':depart' => $depart,
            ':destination' => $destination,
            ':heure_depart'  =>$heure_depart,
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


