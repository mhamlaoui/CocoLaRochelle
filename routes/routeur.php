<?php

require_once 'controleurs/UtilisateurControleur.php';
require_once 'controleurs/TrajetControleur.php';


$UtilisateurControleur = new UtilisateurControleur($pdo);
$UtilisateurControleur->verifierConnexionAutomatique();

$TrajetControleur = new TrajetControleur($pdo);

// Récupérer l'URL demandée
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
    case '/index.php':
    case '/recherche-trajets':
    case '/accueil':
        // Page d'accueil
        $TrajetControleur->rechercherTrajets();
        break;

    case '/inscription':
        // Appeler le contrôleur pour gérer l'inscription
        $UtilisateurControleur->inscription();
        break;

    case '/connexion':
        // Appeler le contrôleur pour gérer la connexion
        $UtilisateurControleur->connexion();
        break;
    case '/compte':
        $UtilisateurControleur->afficherCompte();
        break;
    case '/publier-trajet':
        $TrajetControleur->publierTrajet();
        break;
    case '/vos-trajets':
        $TrajetControleur->afficherTrajetsUtilisateur();
        break;
    case '/afficher-trajet':
        $TrajetControleur->afficherTrajetsTrouves();
        break;
    case '/reserver-trajet':
        $TrajetControleur->reserverTrajet();
        break;
    default:
        // Page 404 pour les routes non trouvées
        header('Location: vues/404.php');
        exit();
        break;
}
