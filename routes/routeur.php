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
    default:
        // Page 404 pour les routes non trouvées
        http_response_code(404);
        echo "Page non trouvée.";
        break;
}
