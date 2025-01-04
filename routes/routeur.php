<?php

use Steampixel\Route;
use Controleurs\UtilisateurControleur;
use Controleurs\TrajetControleur;

// Instanciation des contrôleurs
$UtilisateurControleur = new UtilisateurControleur($pdo);
$UtilisateurControleur->verifierConnexionAutomatique();

$TrajetControleur = new TrajetControleur($pdo);

// Définition des routes avec méthodes HTTP

Route::add('/', function() use ($TrajetControleur) {
    $TrajetControleur->rechercherTrajets();
}, 'GET');

Route::add('/index.php', function() use ($TrajetControleur) {
    $TrajetControleur->rechercherTrajets();
}, 'GET');

Route::add('/recherche-trajets', function() use ($TrajetControleur) {
    $TrajetControleur->rechercherTrajets();
}, 'POST');

Route::add('/accueil', function() use ($TrajetControleur) {
    $TrajetControleur->rechercherTrajets();
}, 'GET');

// Inscription - Afficher le formulaire (GET)
Route::add('/inscription', function() use ($UtilisateurControleur) {
    $UtilisateurControleur->afficherFormulaireInscription();
}, 'GET');

// Inscription - Traiter le formulaire (POST)
Route::add('/inscription', function() use ($UtilisateurControleur) {
    $UtilisateurControleur->traiterInscription();
}, 'POST');

// Connexion - Afficher le formulaire (GET)
Route::add('/connexion', function() use ($UtilisateurControleur) {
    $UtilisateurControleur->afficherFormulaireConnexion();
}, 'GET');

// Connexion - Traiter le formulaire (POST)
Route::add('/connexion', function() use ($UtilisateurControleur) {
    $UtilisateurControleur->traiterConnexion();
}, 'POST');

// Route GET pour afficher le compte utilisateur
Route::add('/compte', function() use ($UtilisateurControleur) {
    $UtilisateurControleur->afficherCompte();
}, 'GET');

Route::add('/deconnexion', function() use ($UtilisateurControleur) {
        $UtilisateurControleur->deconnexion();
}, 'POST');

// Suppression de compte - Route POST
Route::add('/supprimer-compte', function() use ($UtilisateurControleur) {
        $UtilisateurControleur->supprimerCompte();
}, 'POST');

Route::add('/changer-mdp', function() use ($UtilisateurControleur) {
    $UtilisateurControleur->changerMotDePasse();
}, 'POST');

Route::add('/changer-mdp', function() use ($UtilisateurControleur) {
    $UtilisateurControleur->changerMotDePasse();
}, 'GET');

Route::add('/modifier_informations', function() use ($UtilisateurControleur) {
    $UtilisateurControleur->modifierInformations();
}, 'POST');

Route::add('/modifier_informations', function() use ($UtilisateurControleur) {
    $UtilisateurControleur->afficherFormulaireModification();
}, 'GET');

Route::add('/publier-trajet', function() use ($TrajetControleur) {
    $TrajetControleur->publierTrajet();
}, 'POST');

Route::add('/publier-trajet', function() use ($TrajetControleur) {
    $TrajetControleur->afficherFormulairePublication();
}, 'GET');

// Route GET pour afficher les trajets de l'utilisateur
Route::add('/vos-trajets', function() use ($TrajetControleur) {
    $TrajetControleur->afficherTrajetsUtilisateur();
}, 'GET');

// Route GET pour afficher les trajets trouvés
Route::add('/afficher-trajet', function() use ($TrajetControleur) {
    $TrajetControleur->afficherTrajetsTrouves();
}, 'GET');

// Route POST pour réserver un trajet
Route::add('/reserver-trajet', function() use ($TrajetControleur) {
    $TrajetControleur->reserverTrajet();
}, 'POST');



// Route pour gérer les erreurs 404
Route::pathNotFound(function() {
    header('HTTP/1.0 404 Not Found');
    require 'vues/404.php';
    exit();
});

// Lancement du routeur
Route::run('/');

?>
