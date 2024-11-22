<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CocoLaRochelle</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <script src="public/js/autocomplete.js" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSbbhf3uE49J5vqiClmNzkVjmEe7bMous&libraries=places" 
    async defer></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="principal">
        <section class="recherche">
            <h1 class="recherche__titre">Trouvez un covoiturage depuis La Rochelle</h1>
            <p class="recherche__description">Réservez vos trajets en toute simplicité.</p>
            <form class="recherche__formulaire" action="/recherche-trajets" method="POST">
                <fieldset class="recherche__groupe">
                    <label for="depart" class="recherche__label">Adresse de départ</label>
                    <input type="text" id="depart" name="depart" class="recherche__champ" placeholder="Adresse de départ" required>
                </fieldset>

                <fieldset class="recherche__groupe">
                    <label for="arrivee" class="recherche__label">Adresse d'arrivée</label>
                    <input type="text" id="destination" name="arrivee" class="recherche__champ" placeholder="Adresse d'arrivée" required>
                </fieldset>

                <fieldset class="recherche__groupe">
                    <label for="date" class="recherche__label">Date</label>
                    <input type="date" id="date" name="date_trajet" class="recherche__champ" required>
                </fieldset>

                <fieldset class="recherche__groupe">
                    <label for="passagers" class="recherche__label">Passagers</label>
                    <select id="passagers" name="passagers" class="recherche__selecteur">
                        <option value="1">1 adulte</option>
                        <option value="2">2 adultes</option>
                        <option value="3">3 adultes</option>
                    </select>
                </fieldset>

                <button type="submit" class="recherche__bouton">Rechercher</button>
            </form>
        </section>
    </main>

    <aside class="infos">
        <section>
            <article>
                <h2 class="infos__titre">Pourquoi CocoLaRochelle?</h2>
                <p class="infos__texte">Voyagez simplement et économisez tout en étant écoresponsable.</p>
            </article>
            <article>
                <h2 class="infos__titre">Sécurité avant tout</h2>
                <p class="infos__texte">Tous nos conducteurs sont vérifiés pour votre sécurité.</p>
            </article>
            <article>
                <h2 class="infos__titre">Options flexibles</h2>
                <p class="infos__texte">Personnalisez votre trajet selon vos besoins.</p>
            </article>
        </section>
    </aside>

    <?php include 'footer.php'; ?>
</body>
</html>
