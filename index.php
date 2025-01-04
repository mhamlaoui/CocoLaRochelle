<?php
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

session_start();

// Charger les variables d'environnement
$dotenv = Dotenv::createImmutable(__DIR__)->load();

$dbConnection = $_ENV['DB_CONNECTION'];
$dbHost = $_ENV['DB_HOST'];
$dbName = $_ENV['DB_NAME'];
$dbUser = $_ENV['DB_USER'];
$dbPassword = $_ENV['DB_PASSWORD'];



$dsn = $dbConnection. ':host=' . $dbHost . ';dbname=' . $dbName;


try {
    // Connexion PDO à la base de données
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Active les exceptions pour les erreurs
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Définit le mode de récupération par défaut
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
    exit;
}

require_once 'routes/routeur.php';
