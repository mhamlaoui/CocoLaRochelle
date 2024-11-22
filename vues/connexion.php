<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" href="public/css/connexion.css">
</head>
<body>
    <main class="principal">
        <section class="Log_In">
            <h2>Connexion</h2>
            <form method="POST">
                <fieldset class="inscription__groupe">
                    <label for="email" class="inscription__label">Email:</label>
                    <input type="email" id="email" name="email" class="inscription__champ" required>
                </fieldset>
                
                <fieldset class="inscription__groupe">
                    <label for="mot_de_passe" class="inscription__label">Password:</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" class="inscription__champ" required>
                </fieldset>
                <fieldset class="inscription__groupe">
                    <label for="se_souvenir_de_moi">
                        <input type="checkbox" name="se_souvenir_de_moi" id="se_souvenir_de_moi"> Se souvenir de moi
                    </label>
                </fieldset>
                <button type="submit" class="inscription__bouton">Connexion</button>
            </form>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>