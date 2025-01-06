
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte - CocoLaRochelle</title>
    <link rel="icon" href="public/COCO.png" type="image/png"> 
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" href="public/css/compte.css">
    <script src="public/js/menu.js" defer></script>
    <script src="https://kit.fontawesome.com/<?=$_ENV['FONTAWESOME_TOKEN']?>.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require 'header.php'; ?>

    <main>
        <?= isset($message) ? "<p class='notification__message'>$message</p>" : '' ?>
        <section class="profil">
            <img src="<?= $utilisateur['photo_profil'] ? 'public/' . $utilisateur['photo_profil'] : 'https://via.placeholder.com/150' ?>" alt="Photo de profil" class="profil__photo">
            <h2 class="profil__titre"><?=$utilisateur["nom"]?></h2>
            <p class="profil__champ">Email : <?=$utilisateur["email"]?></p>
            <a href="/modifier_informations" class="profil__bouton"><i class="fas fa-edit"></i> Modifier mes informations</a>
        </section>

        <!-- Section Gérer mon compte -->
        <section class="compte__section">
            <h2 class="compte__titre">Gérer mon compte</h2>
            <ul class="compte__liste">
                <li class="compte__item">
                    <a href="/changer-mdp" class="compte__lien"><i class="fas fa-key"></i> Changer mon mot de passe</a>
                </li>
                <li class="compte__item">
                    <form method="POST" action="/supprimer-compte" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?');">
                        <button type="submit" name="supprimer_compte" class="compte__bouton-danger">
                            <i class="fas fa-trash-alt"></i> Supprimer mon compte
                        </button>
                    </form>
                </li>
            </ul>
            <form method="POST" action="/deconnexion">
                <button type="submit"  name="deconnexion" class="compte__bouton-deconnexion">
                    <i class="fas fa-sign-out-alt"></i> Se déconnecter
                </button>
            </form>
    </section>
    </main>

    <?php require 'footer.php'; ?>
</body>
</html>