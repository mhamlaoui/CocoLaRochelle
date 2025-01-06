<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CocoLaRochelle</title>
    <link rel="icon" href="public/COCO.png" type="image/png"> 
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" href="public/css/connexion.css">
</head>
<body>
    <main>
        <form method="POST">
            <h2>Se connecter</h2>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
            
            <label for="motdepasse">Mot de passe</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Entrez votre mot de passe" required>
            
            <label for="souvenir">
            <input type="checkbox" id="se_souvenir_de_moi" name="se_souvenir_de_moi">
            Se souvenir de moi
            </label>
            
            <p class="error"><?= $error_message ? $error_message : ""; ?></p>

            <button type="submit">Se connecter</button>

        </form>
    </main>
</body>
</html>
