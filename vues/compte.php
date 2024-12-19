
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte - CocoLaRochelle</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" href="public/css/compte.css">
    <script src="public/js/menu.js" defer></script>
    <script src="https://kit.fontawesome.com/3615041e3d.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require 'header.php'; ?>

    <main>
        <section class="profil">
            <img src="https://via.placeholder.com/150" alt="Photo de profil" class="profil__photo">
            <h2 class="profil__titre"><?=$utilisateur["nom"]?></h2>
            <p class="profil__champ">Email : <?=$utilisateur["email"]?></p>
            <button class="profil__bouton"><i class="fas fa-edit"></i> Modifier mes informations</button>
        </section>

        <!-- Section Gérer mon compte -->
        <section class="compte__section">
            <h2 class="compte__titre">Gérer mon compte</h2>
            <ul class="compte__liste">
                <li class="compte__item">
                    <a href="changer-mdp.php" class="compte__lien"><i class="fas fa-key"></i> Changer mon mot de passe</a>
                </li>
                <li class="compte__item">
                    <a href="supprimer-compte.php" class="compte__lien compte__lien--danger">
                        <i class="fas fa-trash-alt"></i> Supprimer mon compte
                    </a>
                </li>
            </ul>
            <form method="POST">
                <button type="submit" class="compte__bouton-deconnexion">
                    <i class="fas fa-sign-out-alt"></i> Se déconnecter
                </button>
            </form>
    </section>
    </main>

    <?php require 'footer.php'; ?>
</body>
</html>