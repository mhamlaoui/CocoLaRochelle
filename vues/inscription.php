<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CocoLaRochelle</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/inscription.css">
    <link rel="stylesheet" href="public/css/responsive.css">
</head>
<body>
    <main class="principal">
        <section class="inscription">
            <h2 class="inscription__titre">Inscription</h2>
                <form class="inscription__formulaire" method="POST">
                <fieldset class="inscription__groupe">
                    <label for="nom_utilisateur" class="inscription__label">Nom d'utilisateur :</label>
                    <input type="text" name="nom_utilisateur" class="inscription__champ" required>
                </fieldset>
                
                <fieldset class="inscription__groupe">
                    <label for="mdp" class="inscription__label">Mot de passe :</label>
                    <input type="password" name="mot_de_passe" class="inscription__champ" required>
                </fieldset>
                
                <fieldset class="inscription__groupe">
                    <label for="telephone" class="inscription__label">Téléphone :</label>
                    <input type="text" name="telephone" class="inscription__champ">
                </fieldset>
                
                <fieldset class="inscription__groupe">
                    <label for="email" class="inscription__label">Email :</label>
                    <input type="email" name="email" class="inscription__champ" required>
                </fieldset>
                <fieldset class="inscription__groupe">
                    <label for="date_naissance" class="inscription__label">Date of Birth:</label>
                    <input type="date" name="date_naissance" class="inscription__champ">
                </fieldset>
                <input type="hidden" name="action" value="inscription">
                <button type="submit" class="inscription__bouton" id="send_inscription">Sign Up</button>
            </form>
            <p>Déjà inscrit ? <a href="connexion">Connectez-vous ici</a></p>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>