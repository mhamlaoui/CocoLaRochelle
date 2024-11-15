<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Trajets</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" href="public/css/trajet.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <h1 class="trajet-tritre">Mes Trajets Conducteur</h1>
    <section class="liste-trajets">
        <?php if (!empty($trajets)) : ?>
            <?php foreach ($trajets as $trajet) : ?>
                <article class="trajet">
                    <header class="trajet-header">
                        <h2><?= ($trajet['depart']) ?> ➔ <?= ($trajet['destination']) ?></h2>
                        <time class="trajet-date"><?= ($trajet['date']) ?></time>
                    </header>
                    <section class="trajet-info">
                        <p class="trajet-destination">Départ : <?= ($trajet['depart']) ?></p>
                        <p class="trajet-destination">Destination : <?= ($trajet['destination']) ?></p>
                        <p class="trajet-passagers">Passagers : <?= ($trajet['nombre_passagers']) ?></p>
                    </section>
                    <footer class="button-container">
                        <a href="#" class="btn-reserver">Voir le Trajet</a>
                    </footer>
                </article>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Aucun trajet trouvé.</p>
        <?php endif; ?>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>
