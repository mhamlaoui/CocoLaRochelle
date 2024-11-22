<?php
// modèles/Utilisateur.php

class Utilisateur {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenirUtilisateurParId($id_utilisateur) {
        $requete = $this->pdo->prepare("SELECT * FROM Utilisateur WHERE id_utilisateur = :id_utilisateur");
        $requete->execute([':id_utilisateur' => $id_utilisateur]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function inscription($nom_utilisateur, $email, $mot_de_passe, $telephone) {
        $motDePasseHash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $requete = $this->pdo->prepare("INSERT INTO Utilisateur (nom, email, mot_de_passe, telephone) VALUES (:nom, :email, :mot_de_passe, :telephone)");

        return $requete->execute([
            ':nom' => $nom_utilisateur,
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
            $_SESSION['id_utilisateur'] = $utilisateur['id_utilisateur'];

            // Définir le cookie "Se souvenir de moi" si l'option est choisie
            if ($se_souvenir_de_moi) {
                $dureeCookie = time() + (30 * 24 * 60 * 60);  
                setcookie('id_utilisateur', $utilisateur['id_utilisateur'], $dureeCookie, "/", "", true, true);
            }
                return true;
        }
        return false;
    }

    // Vérification automatique de la connexion via le cookie
    public function verifierConnexionAutomatique() {
        if (isset($_COOKIE['utilisateur_connexion']) && !isset($_SESSION['id_utilisateur'])) {
            $idUtilisateur = $_COOKIE['utilisateur_connexion'];

            $requete = $this->pdo->prepare("SELECT * FROM Utilisateur WHERE id_utilisateur = :id_utilisateur");
            $requete->execute([':id_utilisateur' => $idUtilisateur]);
            $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

            if ($utilisateur) {
                $_SESSION['id_utilisateur'] = $utilisateur['id_utilisateur'];
                return true;
            }
        }
        return false;
    }

    public function deconnecter() {
        session_unset();
        session_destroy();

        // Supprimer le cookie en réglant sa durée d'expiration dans le passé
        setcookie("id_utilisateur", "", time() - 3600, "/");
    }
}

