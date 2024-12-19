<?php

require_once 'modèles/TrajetModel.php';
require_once 'modèles/ReservationModel.php';


class TrajetControleur {
    private $trajetModèle;
    private $reservatioModèle;

    public function __construct($pdo) {
        $this->trajetModèle = new TrajetModel($pdo);
        $this->reservatioModèle = new ReservationModel($pdo);
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

            // Enregistrer le trajet dans la base de données
            $this->trajetModèle->ajouterTrajet($id_utilisateur,$nom_utilisateur, $depart, $destination, $date_trajet,$heure_depart, $nombre_passagers);
            header('Location: /vos-trajets');
            exit;
            }
        include 'vues/publier_trajet.php';
    }
    public function afficherTrajetsUtilisateur() {
        
        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['id_utilisateur'])) {
            header('Location: /connexion');
            exit;
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
            // Récupérer les trajets depuis la session
            $trajets = $_SESSION['trajets'];
    
            // Afficher les trajets
            include 'vues/afficher_trajet.php';
        } else {
            // Si aucun trajet n'est disponible, rediriger vers la page d'accueil
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
                // Vérifier si l'utilisateur a déjà réservé ce trajet
                if ($this->reservatioModèle->verifierReservationExiste($id_utilisateur, $idTrajet)) {
                    throw new Exception("Vous avez déjà réservé ce trajet.");
                }

                // Ajouter la réservation
                $this->reservatioModèle->ajouterReservation($id_utilisateur, $idTrajet);

                // Mettre à jour les places disponibles!!!!!!!

                // Rediriger vers la page de vos trajets
                header('Location: /vos-trajets');
                exit;

            } catch (Exception $e) {
                // Si une exception se produit (par exemple, déjà réservé), afficher un message d'erreur
                $message = $e->getMessage();
                include 'vues/afficher_trajet.php'; // Vous pouvez afficher un message d'erreur ici
            }
        }
    }
}

