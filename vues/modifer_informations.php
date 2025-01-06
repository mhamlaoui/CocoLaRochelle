<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mes informations - CocoLaRochelle</title>
    <link rel="icon" href="public/COCO.png" type="image/png"> 
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/modifier_infomation.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <script src="public/js/menu.js" defer></script>
    <script src="https://kit.fontawesome.com/<?=$_ENV['FONTAWESOME_TOKEN']?>.js" crossorigin="anonymous"></script>
</head>
<body>
<?php require 'header.php'; ?>

<main>
    <section class="profil">
        <h2 class="profil__titre">Modifier mes informations</h2>

    
        <form method="POST" enctype="multipart/form-data" class="profil__formulaire">

            <!-- Photo de profil -->
            <label for="photo_profil" class="profil__label">Photo de profil</label>
            <input type="file" id="photo_profil" name="photo_profil" accept="image/*" class="profil__input">
            <p class="profil__info">Optionnel : Télécharger une nouvelle photo de profil.</p>

            <!-- Nom -->
            <label for="nom" class="profil__label">Nom</label>
            <input type="text" id="nom" name="nom" value="<?= $utilisateur['nom'] ?>" required class="profil__input">

            <!-- Email -->
            <label for="email" class="profil__label">Email</label>
            <input type="email" id="email" name="email" value="<?= $utilisateur['email'] ?>" required class="profil__input">

            <label for="telephone" class="profil__label">Numéro de téléphone</label>
            <input type="tel" id="telephone" name="telephone" value="<?= $utilisateur['telephone'] ?>" class="profil__input" pattern="[0-9]{10}" placeholder="Ex : 0123456789">
            <p class="profil__info">Entrez un numéro valide (10 chiffres, sans espaces ni tirets).</p>

            <p class="error"><?= $error_message ? $error_message : ""; ?></p>

            <button type="submit" class="profil__bouton" name="modifier_informations">Enregistrer les modifications</button>
        </form>
    </section>
</main>

<?php require 'footer.php'; ?>
</body>
</html>
