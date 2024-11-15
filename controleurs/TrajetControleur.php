<?php

require_once 'modèles/Trajet.php';

class TrajetControleur {
    private $trajetModèle;

    public function __construct($pdo) {
        $this->trajetModèle = new Trajet($pdo);
    }

    public function publierTrajet() {

        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['utilisateur_id'])){
            header('Location: /connexion');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $depart = $_POST['depart'];
            $destination = $_POST['destination'];
            $date = $_POST['date'];
            $nombre_passagers = $_POST['nombre_passagers'];
            $utilisateur_id = $_SESSION['utilisateur_id'];

            // Enregistrer le trajet dans la base de données
            $this->trajetModèle->ajouterTrajet($utilisateur_id, $depart, $destination, $date, $nombre_passagers);
            header('Location: /vos-trajets');
            exit;
            }
        include 'vues/publier_trajet.php';
    }
    public function afficherTrajetsUtilisateur() {
        
        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['utilisateur_id'])) {
            header('Location: /connexion');
            exit;
        }

        $utilisateur_id = $_SESSION['utilisateur_id'];
        $trajets = $this->trajetModèle->obtenirTrajetsParUtilisateur($utilisateur_id);
        
        include 'vues/trajets_utilisateur.php';
    }
}

