<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un Trajet - La Rochelle</title>

    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <script src="public/js/autocomplete.js" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSbbhf3uE49J5vqiClmNzkVjmEe7bMous&libraries=places" 
    async defer></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <h1>Publier un Trajet depuis La Rochelle</h1>
        <form action="/publier-trajet" method="POST">
            <label for="depart">Adresse de départ :</label>
            <input type="text" id="depart" name="depart" placeholder="Adresse de départ" required>

            <label for="destination">Destination :</label>
            <input type="text" id="destination" name="destination" placeholder="Adresse d'arrivée" required>

            <label for="date">Date :</label>
            <input type="date" id="date" name="date_trajet" required>

            <label for="nombre_passagers">Nombre de passagers :</label>
            <input type="number" id="nombre_passagers" name="nombre_passagers" min="1" max="10" required>

            <button type="submit">Publier le Trajet</button>
        </form>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
