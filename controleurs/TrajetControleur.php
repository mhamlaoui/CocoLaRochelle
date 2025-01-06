<?php
namespace Controleurs;

use Modeles\TrajetModel;
use Modeles\ReservationModel;


class TrajetControleur {
    private $trajetModèle;
    private $reservatioModèle;

    public function __construct($pdo) {
        $this->trajetModèle = new TrajetModel($pdo);
        $this->reservatioModèle = new ReservationModel($pdo);
    }
    public function afficherFormulairePublication() {
        include 'vues/publier_trajet.php';
    }

    public function publierTrajet() {

        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['id_utilisateur'])){
            header('Location: /connexion');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $depart = $_POST['depart'];
            $destination = $_POST['destination'];
            $date_trajet = $_POST['date_trajet'];
            $heure_depart = $_POST['heure_depart'];
            $nombre_passagers = $_POST['nombre_passagers'];
            $id_utilisateur = $_SESSION['id_utilisateur'];
            $nom_utilisateur = $_SESSION['nom_utilisateur'];

            $this->trajetModèle->ajouterTrajet($id_utilisateur,$nom_utilisateur, $depart, $destination, $date_trajet,$heure_depart, $nombre_passagers);
            header('Location: /vos-trajets');
            exit;
            }
    }
    public function afficherTrajetsUtilisateur() {
        
        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['id_utilisateur'])) {
            header('Location: /connexion');
            exit;
        }
        elseif(isset($_GET['action']) && $_GET['action'] === 'annuler_reservation'){
            $id_trajet = $_GET['id_trajet'];
            $id_utilisateur = $_SESSION['id_utilisateur'];
            $this->reservatioModèle->supprimerReservation($id_utilisateur,$id_trajet);
            $message = "Votre reservation a été annulé avec succès!";
        }

        $id_utilisateur = $_SESSION['id_utilisateur'];
        $trajetsPublier = $this->trajetModèle->obtenirTrajetsParUtilisateur($id_utilisateur);
        $trajetsReserver = $this->reservatioModèle->obtenirTrajetsReservesParUtilisateur($id_utilisateur);
        
        include 'vues/trajets_utilisateur.php';
    }
    public function rechercherTrajets() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

            $trajets = $this->trajetModèle->getTousTrajets();
            $_SESSION['trajets'] = $trajets;

            header('Location: /afficher-trajet');
            exit;
        }
        include 'vues/accueil.php';
    }
    
    
    public function afficherTrajetsTrouves() {
        // Vérifier si des trajets sont stockés dans la session
        if (isset($_SESSION['trajets'])) {
            $trajets = $_SESSION['trajets'];
    
            include 'vues/afficher_trajet.php';
        } else {
            header('Location: /accueil');
            exit;
        }
    }

    public function reserverTrajet() {
        if (!isset($_SESSION['id_utilisateur'])){
            header('Location: /connexion');
            exit;
        }
        if (isset($_POST['trajet_id'])) {
            $idTrajet = $_POST['trajet_id'];
            $id_utilisateur = $_SESSION['id_utilisateur'];
            try {
                if ($this->reservatioModèle->verifierReservationExiste($id_utilisateur, $idTrajet)) {
                    throw new Exception("Vous avez déjà réservé ce trajet.");
                }

                $this->reservatioModèle->ajouterReservation($id_utilisateur, $idTrajet);


                header('Location: /vos-trajets');
                exit;

            } catch (Exception $e) {
                $message = $e->getMessage();
                include 'vues/afficher_trajet.php'; 
            }
        }
    }
}

