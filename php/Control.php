<?php


/**
 * Description de Control
 * 
 * Ce fichier va etre chargée quand quelqu'un envoi un form, donc tous les forms auront
 * comme attribut action="chemin/vers/Control.php". On va utiliser la variable POST pour les forms de login et checkout
 * parce que ChatGPT dit qu'ils sont plus securisées, les GET on utiliser pour les creations des trajets car on aura besoin
 * d'envoyer directement les inputs vers un des APIs de Google.
 * 
 * CHOSES
 * - INSCRIPTION
 * - LOGIN
 * - le DELETE DE LES INFORMATIONS D'UNE PERSONNE A TOUT MOMENT (Quelque chose de CNIL je crois)
 * - Les demandes de requete quand on cree un trajet qui nous dit les informations qu'on trouvera dans les
 *  APIs qu'on utilisera de Google (Directions API et autres pour gerer balises d'input pour mettre les point de départ et arrivée).
 * 
 */


/**
 * Pour l'INSCRIPTION
 * - est-il dans la bdd?
 * - peux-t-il rentrer (age) ?
 * - autres checks (Ex : verification de mail, numéro, Auth0 ... )
 * 
 * 
 * Pour le LOGIN
 * - est-il dans la bdd?
 * - pin correcte + (optionellement autres types de authentification, comme Auth0) 
 * 
 * 
 * Pour la CREATION d'un TRAJET
 * - jsp :[
 * 
 */

require_once __DIR__ . '/../vendor/autoload.php';


// Javais un probleme avec ue autre facon de faire donc j'ai demande a chatGPT pour un parseur manuel
// pour aller chercher les variables d'enironnement (dans le .env)
function loadEnv($filePath)
{
    $envFile = $filePath . '/.env';
    if (!file_exists($envFile)) {
        throw new Exception("Environment file not found: $envFile");
    }

    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        list($name, $value) = explode('=', $line, 2);
        putenv(sprintf('%s=%s', trim($name), trim($value)));
    }
}

// manuellement va chercher les variables d'environnement avant meme commencer a charger la page
loadEnv(__DIR__ . '/../');  

// Debugging: Print environment variables to check if they are loaded
echo 'DB_HOST: ' . getenv('DB_HOST') . PHP_EOL;
echo 'DB_NAME: ' . getenv('DB_NAME') . PHP_EOL;
echo 'DB_USER: ' . getenv('DB_USER') . PHP_EOL;
echo 'DB_PASSWORD: ' . getenv('DB_PASSWORD') . PHP_EOL;



class Control
{

    private $pdo;
    private $instance = null;

    public function __construct()
    {

        $dsn = "pgsql:host=".getenv('DB_HOST').";port=5432;dbname=".getenv('DB_NAME').";user=".getenv('DB_USER'). ";password=" . getenv('DB_PASSWORD').";";        
        print($dsn);
        try {
            $this->pdo = new PDO($dsn);
        } catch (Exception $e) {
            die("Problemo be : " . $e->getMessage());
        }
    }


    // pour sulement avoir une class Control à la fois // Singleton Pattern
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Control();
        }
        return self::$instance; // qui est maintenant pas null
    }

    /**
     * Nous donnera le correct tableau comme ca on a pas besoin de hard-coder les forms dans le code
     */
    private function getFormArray(): array
    {
        // en plus on peut la cacher dans une autre fonction. Ex: pour INSCIPTION et LOGIN 
        // on demande dans les deux s'il existe dans la BDD, cela sera une fonction,
        // ou dedans ils se trouvera cette fonction
        return $_POST ?: $_GET; // operateur spécial, deamnde si a gauche il est null ou faux et s'il n'est pas retourne a droite
    }
    /**
     * on cherche juste récupérer le Mot de passe et Email pour faire un check de compte dans la bdd
     */
    private function justeMdpEtEmail(): array
    {
        $array = $this->getFormArray(); // on va chercher GET ou POST peu importe                       
        $usefulkeys = [];
        foreach ($array as $key => $value) {
            if ($key == 'mot_de_passe' || $key == 'email') {
                $usefulkeys[$key] = $value;
            }
        }
        return $usefulkeys;
    }

    private function IsInDB(): array
    {
        $array = $this->justeMdpEtEmail();
        
        // un select generique spécifiquement pour la table Utilisateur
        $sql = "SELECT * FROM Utilisateur WHERE ";

        $conditions = [];
        // formatter les elements de la clause WHERE
        foreach ($array as $key => $value) {
            $conditions[] = "$key = :$key";
        }

        // les ajouter a la requete finale
        $sql .= implode(" AND ", $conditions);

        // Preparer pour le laver (pour prevention d'attaques d'injection, et autres choses (jsp))
        $stmt = $this->pdo->prepare($sql);

        // Ici on va mettre l'input de l'utilisateur dans les elements de la clause WHERE
        // structure est WHERE nom = :nom et on passe a WHERE nom = <input> , qui ici est le $value
        foreach ($array as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        // run et cherche
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC); // option de le chercher en format d'un tableau associatif   
        // structure: tableau['colonne']                 
        return $result ?: []; // Si $result est false, renvoie un tableau vide
    }
    public function inscription(): string
{
    // Vérification si l'utilisateur existe déjà dans la base de données
    if (!empty($this->IsInDB())) {
        return '<p>Vous êtes déjà inscrit. Souhaitez-vous <a href="../html/log_in.html">vous connecter</a> ?</p>';
    }

    // Extraction des variables depuis $_POST
    extract($_POST);

    // Prépare la requête d'insertion
    $requete = $this->pdo->prepare("INSERT INTO Utilisateur (nom, email, mot_de_passe, telephone) VALUES (:nom, :email, :mot_de_passe, :telephone)");

    // Essaye d'exécuter la requête avec des valeurs sécurisées
    try {
        $requete->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':mot_de_passe' => password_hash($mot_de_passe, PASSWORD_DEFAULT), // Hash du mot de passe pour la sécurité
            ':telephone' => $telephone
        ]);
        return '<p>Inscription réussie ! Vous pouvez maintenant <a href="../html/log_in.html">vous connecter</a>.</p>';
    } catch (PDOException $e) {
        return '<p>Erreur lors de l\'inscription : ' . $e->getMessage() . '</p>';
    }
}


    public function doAll()
    { // d'ici va commencer la loqgique de l'appli            
        
        if (isset($_POST['action']) && $_POST['action'] === 'inscription') {
            echo $this->inscription();
        }
    }
}



// cette partie est pour faire marcher la page, cela fait la premiere instantiation de la classe Control, et l'appel
function main()
{    
    $control = new Control();
    $control->doAll();
}


main(); // note: Dans php il n'y a pas de fonction main de base comme en java, ici c'est juste une fonction qui 
// j'appele main