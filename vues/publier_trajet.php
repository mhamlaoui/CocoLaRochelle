<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un Trajet - CocoLaRochelle</title>
    <link rel="icon" href="public/COCO.png" type="image/png">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/publier.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <script src="public/js/autocomplete.js" defer></script>
    <script src="public/js/menu.js" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?=$_ENV['GOOGLE_MAPS_API_KEY']?>&libraries=places" 
    async defer></script>
    <script src="https://kit.fontawesome.com/<?=$_ENV['FONTAWESOME_TOKEN']?>.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require 'header.php'; ?>
    <main>
    <h1 class="titre">Publier un Nouveau Trajet</h1>
    <form class="formulaire" id="formulaire-trajet" action="#" method="POST">
        <!-- Titre -->

        <!-- Informations générales -->
        <fieldset class="formulaire__fieldset">
            <legend class="formulaire__legend">Informations du trajet</legend>

            <label class="formulaire__label" for="depart">
                <i class="fas fa-map-marker-alt"></i>Lieu de départ
            </label>
            <input class="formulaire__champ" type="text" id="depart" name="depart" placeholder="Exemple : Paris Gare de Lyon" required>
            <span class="formulaire__erreur" id="erreur-depart">Veuillez entrer un lieu de départ valide.</span>

            <label class="formulaire__label" for="destination">
                <i class="fas fa-map-marker-alt"></i>Lieu de destination
            </label>
            <input class="formulaire__champ" type="text" id="destination" name="destination" placeholder="Exemple : Marseille Saint-Charles" required>
            <span class="formulaire__erreur" id="erreur-destination">Veuillez entrer une destination valide.</span>
        </fieldset>

        <!-- Horaires -->
        <fieldset class="formulaire__fieldset">
            <legend class="formulaire__legend">Horaires</legend>

            <label class="formulaire__label" for="heure">
                <i class="fas fa-clock"></i>Heure de départ
            </label>
            <input class="formulaire__champ" type="time" id="heure" name="heure_depart" required>

            <label class="formulaire__label" for="date">
                <i class="fas fa-calendar-alt"></i>Date du trajet
            </label>
            <input class="formulaire__champ"  type="date" id="date" name="date_trajet" required>
        </fieldset>
        

        <!-- Places disponibles -->
        <fieldset class="formulaire__fieldset">
            <legend class="formulaire__legend">Disponibilités</legend>

            <label class="formulaire__label" for="nombre">
                <i class="fas fa-users"></i>Nombre de places disponibles
            </label>
            <select class="formulaire__select" id="nombre" name="nombre_passagers" required>
                <option value="" disabled selected>Choisissez</option>
                <option value="1">1 place</option>
                <option value="2">2 places</option>
                <option value="3">3 places</option>
                <option value="4">4 places</option>
            </select>
        </fieldset>


        <!-- Bouton d'envoi -->
        <button class="formulaire__bouton" type="submit">
            <i class="fas fa-paper-plane"></i> Proposer ce trajet
        </button>
    </form>

    </main>
    <?php require 'footer.php'; ?>
</body>
</html>
