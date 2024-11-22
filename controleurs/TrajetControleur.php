<?php

require_once 'modèles/Trajet.php';

class TrajetControleur {
    private $trajetModèle;

    public function __construct($pdo) {
        $this->trajetModèle = new Trajet($pdo);
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
            $nombre_passagers = $_POST['nombre_passagers'];
            $id_utilisateur = $_SESSION['id_utilisateur'];

            // Enregistrer le trajet dans la base de données
            $this->trajetModèle->ajouterTrajet($id_utilisateur, $depart, $destination, $date_trajet, $nombre_passagers);
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
        $trajets = $this->trajetModèle->obtenirTrajetsParUtilisateur($id_utilisateur);
        
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
}

