<?php

NAMESPACE Modeles;

use PDO;
class ReservationModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function ajouterReservation($idUtilisateur, $idTrajet) {
        $requete = $this->pdo->prepare("INSERT INTO Reservation (id_utilisateur, id_trajet, date_reservation)
                VALUES (:id_utilisateur, :id_trajet, NOW())");
        return $requete->execute([
            ':id_utilisateur' => $idUtilisateur,
            ':id_trajet' => $idTrajet
        ]);
    }

    public function verifierReservationExiste($idUtilisateur, $idTrajet) {
        $requete = $this->pdo->prepare("SELECT COUNT(*) as count FROM Reservation WHERE id_utilisateur = :id_utilisateur AND id_trajet = :id_trajet");
        $requete->execute([
            ':id_utilisateur' => $idUtilisateur,
            ':id_trajet' => $idTrajet
        ]);

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        return $resultat['count'] > 0;
    }

    public function obtenirTrajetsReservesParUtilisateur($utilisateur_id) {
        $requete = $this->pdo->prepare("SELECT t.* FROM Trajet t JOIN Reservation r ON t.id_trajet = r.id_trajet WHERE r.id_utilisateur = :id_utilisateur");
        $requete->execute([':id_utilisateur' => $utilisateur_id]);
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    public function supprimerReservation($idUtilisateur, $idTrajet) {
        $requete = $this->pdo->prepare("DELETE FROM Reservation WHERE id_utilisateur = :id_utilisateur AND id_trajet = :id_trajet");

        return $requete->execute([
            ':id_utilisateur' => $idUtilisateur,
            ':id_trajet' => $idTrajet
        ]);
    }
}
