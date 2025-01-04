<?php
// contrôleurs/UtilisateurControleur.php
namespace Controleurs;

use Modeles\UtilisateurModel;

class UtilisateurControleur {
    private $utilisateurModèle;

    public function __construct($pdo) {
        $this->utilisateurModèle = new UtilisateurModel($pdo);
    }
    public function afficherFormulaireInscription() {
        include 'vues/inscription.php';
    }

    public function traiterInscription() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom_utilisateur = $_POST['nom_utilisateur'];
            $email = $_POST['email'];
            $mot_de_passe = $_POST['mot_de_passe'];
            $telephone = $_POST['telephone'];

            if ($this->utilisateurModèle->inscription($nom_utilisateur, $email, $mot_de_passe, $telephone)) {
                header('Location: /connexion');
                exit;
            }else{
                $error_message = "Adresse e-mail.";
                include 'vues/inscription.php';
            }
        }
    }
    public function afficherFormulaireConnexion() {
        include 'vues/connexion.php';
    }

    public function traiterConnexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $mot_de_passe = $_POST['mot_de_passe'];
            $se_souvenir_de_moi = isset($_POST['se_souvenir_de_moi']);

            if ($this->utilisateurModèle->connexion($email, $mot_de_passe,$se_souvenir_de_moi)) {
                header('Location: /');
                exit;
            }else {
                $error_message = "Adresse e-mail ou mot de passe incorrect.";
                include 'vues/connexion.php';
            }
        }
    }

    
    public function verifierConnexionAutomatique() {
        $this->utilisateurModèle->verifierConnexionAutomatique();
    }


    public function afficherCompte() {
        if (isset($_GET['success']) && $_GET['success'] === 'mdp_mise_a_jour') {
            $message = "Votre mot de passe a été mis à jour avec succès!";
        }

        $utilisateur = $this->utilisateurModèle->obtenirUtilisateurParId($_SESSION['id_utilisateur']);
        include 'vues/compte.php';
    }
    public function deconnexion() {
        if (isset($_POST['deconnexion'])) {
            $this->utilisateurModèle->deconnecter();
            header("Location: /");
            exit;
        }
    }
    public function supprimerCompte() {
        if (isset($_POST['supprimer_compte'])) {
            $this->utilisateurModèle->supprimerUtilisateur($_SESSION['id_utilisateur']);
            $this->utilisateurModèle->deconnecter();
            header("Location: /");
            exit;
        }
    }

    public function changerMotDePasse() {
        if (isset($_POST['changer_mdp'])) {
            $motDePasseActuel = $_POST['mot_de_passe_actuel'];
            $nouveauMotDePasse = $_POST['nouveau_mot_de_passe'];
            $confirmerMotDePasse = $_POST['confirmer_mot_de_passe'];

            // Vérifier si le mot de passe actuel est correct
            if ($this->utilisateurModèle->verifierMotDePasse($_SESSION['id_utilisateur'], $motDePasseActuel)) {
                if ($nouveauMotDePasse === $confirmerMotDePasse) {
                    $this->utilisateurModèle->mettreAJourMotDePasse($_SESSION['id_utilisateur'], $nouveauMotDePasse);
                    header("Location: /compte?success=mdp_mise_a_jour");
                    exit;
                } else {
                    $error_message = "Les mots de passe ne correspondent pas.";
                }
            } else {
                $error_message = "Le mot de passe actuel est incorrect.";
            }
        }

        include 'vues/changer-mdp.php';
    }
    public function afficherFormulaireModification() {
        $utilisateur = $this->utilisateurModèle->obtenirUtilisateurParId($_SESSION['id_utilisateur']);
        include 'vues/modifer_informations.php'; 
    }
    public function modifierInformations() {
        // Vérification de la soumission du formulaire de modification
        if (isset($_POST['modifier_informations'])) {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $telephone=$_POST['telephone'];
            $updated = $this->utilisateurModèle->modifierInformations($_SESSION['id_utilisateur'], $nom, $email,$telephone);
            if ($updated) {
                header("Location: /compte?success=informations_mise_a_jour");
                exit;
            } else {
                $error_message = "Une erreur est survenue lors de la mise à jour de vos informations.";
            }
        }
        $utilisateur = $this->utilisateurModèle->obtenirUtilisateurParId($_SESSION['id_utilisateur']);
        include 'vues/modifer_informations.php';
    }
}

