<?php
// contrôleurs/UtilisateurControleur.php

require_once 'modèles/UtilisateurModel.php';

class UtilisateurControleur {
    private $utilisateurModèle;

    public function __construct($pdo) {
        $this->utilisateurModèle = new UtilisateurModel($pdo);
    }

    public function inscription() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom_utilisateur = $_POST['nom_utilisateur'];
            $email = $_POST['email'];
            $mot_de_passe = $_POST['mot_de_passe'];
            $telephone = $_POST['telephone'];

            if ($this->utilisateurModèle->inscription($nom_utilisateur, $email, $mot_de_passe, $telephone)) {
                header('Location: /connexion');
                exit;
            }
        }
        include 'vues/inscription.php';
    }

    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $mot_de_passe = $_POST['mot_de_passe'];
            $se_souvenir_de_moi = isset($_POST['se_souvenir_de_moi']);

            if ($this->utilisateurModèle->connexion($email, $mot_de_passe,$se_souvenir_de_moi)) {
                header('Location: /');
                exit;
            }else {
                $error_message = "Adresse e-mail ou mot de passe incorrect.";
            }
        }
        include 'vues/connexion.php';
    }

    
    public function verifierConnexionAutomatique() {
        $this->utilisateurModèle->verifierConnexionAutomatique();
    }


    public function afficherCompte() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->utilisateurModèle->deconnecter();
            header("Location: /");
            exit;
        }

        $utilisateur = $this->utilisateurModèle->obtenirUtilisateurParId($_SESSION['id_utilisateur']);
        include 'vues/compte.php';
    }
}

