<?php
// modèles/Utilisateur.php

class Utilisateur {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenirUtilisateurParId($id_user) {
        $requete = $this->pdo->prepare("SELECT * FROM Utilisateur WHERE id_user = :id_user");
        $requete->execute([':id_user' => $id_user]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function inscription($nom_utilisateur, $email, $mot_de_passe, $telephone) {
        $motDePasseHash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $requete = $this->pdo->prepare("INSERT INTO Utilisateur (nom_utilisateur, email, mot_de_passe, telephone) VALUES (:nom_utilisateur, :email, :mot_de_passe, :telephone)");

        return $requete->execute([
            ':nom_utilisateur' => $nom_utilisateur,
            ':email' => $email,
            ':mot_de_passe' => $motDePasseHash,
            ':telephone' => $telephone
        ]);
    }
    public function connexion($email, $mot_de_passe, $se_souvenir_de_moi) {
        $requete = $this->pdo->prepare("SELECT * FROM Utilisateur WHERE email = :email");
        $requete->execute([':email' => $email]);
        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
            $_SESSION['utilisateur_id'] = $utilisateur['id_user'];

            // Définir le cookie "Se souvenir de moi" si l'option est choisie
            if ($se_souvenir_de_moi) {
                $dureeCookie = time() + (30 * 24 * 60 * 60);  
                setcookie('utilisateur_id', $utilisateur['id_user'], $dureeCookie, "/", "", true, true);
            }
                return true;
        }
        return false;
    }

    // Vérification automatique de la connexion via le cookie
    public function verifierConnexionAutomatique() {
        if (isset($_COOKIE['utilisateur_connexion']) && !isset($_SESSION['utilisateur_id'])) {
            $idUtilisateur = $_COOKIE['utilisateur_connexion'];

            $requete = $this->pdo->prepare("SELECT * FROM Utilisateur WHERE id_user = :id_user");
            $requete->execute([':id_user' => $idUtilisateur]);
            $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

            if ($utilisateur) {
                $_SESSION['utilisateur_id'] = $utilisateur['id_user'];
                return true;
            }
        }
        return false;
    }

    public function deconnecter() {
        session_unset();
        session_destroy();

        // Supprimer le cookie en réglant sa durée d'expiration dans le passé
        setcookie("utilisateur_id", "", time() - 3600, "/");
    }
}

