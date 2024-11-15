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
        // Page d'accueil
        include 'vues/accueil.php';
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
    default:
        // Page 404 pour les routes non trouvées
        http_response_code(404);
        echo "Page non trouvée.";
        break;
}
