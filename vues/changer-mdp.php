<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CocoLaRochelle</title>
    <link rel="icon" href="public/COCO.png" type="image/png"> 
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/mdp.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <script src="https://kit.fontawesome.com/<?=$_ENV['FONTAWESOME_TOKEN']?>.js" crossorigin="anonymous"></script>
</head>
<body>

<main>
    <section class="reinitialisation-mot-de-passe">
        <h1 class="reinitialisation-mot-de-passe__titre">Réinitialiser le mot de passe</h1>
        <form class="reinitialisation-mot-de-passe__formulaire" method="POST">
            <label for="mot-de-passe-actuel" class="reinitialisation-mot-de-passe__label">
                <i class="fas fa-lock reinitialisation-mot-de-passe__icone"></i> Mot de passe actuel
            </label>
            <input type="password" id="mot-de-passe-actuel" name="mot_de_passe_actuel" class="reinitialisation-mot-de-passe__input" placeholder="Entrez votre mot de passe actuel" required>

            <label for="nouveau-mot-de-passe" class="reinitialisation-mot-de-passe__label">
                <i class="fas fa-key reinitialisation-mot-de-passe__icone"></i> Nouveau mot de passe
            </label>
            <input type="password" id="nouveau-mot-de-passe" name="nouveau_mot_de_passe" class="reinitialisation-mot-de-passe__input" placeholder="Entrez votre nouveau mot de passe" required>

            <label for="confirmation-mot-de-passe" class="reinitialisation-mot-de-passe__label">
                <i class="fas fa-check-circle reinitialisation-mot-de-passe__icone"></i> Confirmer le mot de passe
            </label>
            <input type="password" id="confirmation-mot-de-passe" name="confirmer_mot_de_passe" class="reinitialisation-mot-de-passe__input" placeholder="Confirmez votre nouveau mot de passe" required>

            <p class="error"><?= $error_message ? $error_message : ""; ?></p>

            <button type="submit" class="reinitialisation-mot-de-passe__soumettre" name="changer_mdp">Réinitialiser le mot de passe</button>
        </form>
    </section>
</main>
</body>
</html>
