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
        <form method="POST">
            <h2>Inscription</h2>

            <label for="nom_utilisateur">Nom d'utilisateur</label>
            <input type="text" id="nom_utilisateur" name="nom_utilisateur" placeholder="Entrez votre nom d'utilisateur" required>

            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre e-mail" required>

            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Entrez votre mot de passe" required>

            <p class="error"><?= $error_message ? $error_message : ""; ?></p>

            <input type="submit" value="S'inscrire">
            <p class="deja-inscrit">Déjà inscrit ? <a href="connexion">Connectez-vous ici</a></p>
        </form>
    </main>

</body>
</html>