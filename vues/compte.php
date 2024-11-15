
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte - CocoLaRochelle</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/responsive.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="principal">
        <section class="compte">
            <h1 class="compte__titre">Bonjour <?= $utilisateur['nom']; ?></h1>

            <section class="compte__infos">
                <h2>Informations personnelles</h2>
                <p>Email : <?= $utilisateur['email']; ?></p>
            </section>

            <section class="compte__actions">
                <h2>Gérer mon compte</h2>
                <ul>
                    <li><a href=".php" class="compte__lien">Modifier mes informations</a></li>
                    <li><a href=".php" class="compte__lien">Changer mon mot de passe</a></li>
                    <li><a href=".php" class="compte__lien compte__lien--danger">Supprimer mon compte</a></li>
                </ul>
                <form method="POST">
                    <button type="submit" class="compte__bouton-deconnexion">Se déconnecter</button>
                </form>
            </section>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>