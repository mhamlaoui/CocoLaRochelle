<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Trajets</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" href="public/css/afficher_trajet.css">
    <script src="public/js/menu.js" defer></script>
    <script src="https://kit.fontawesome.com/3615041e3d.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <h2>Mes trajets publiés</h2>
<?php if (!empty($trajetsPublier)): ?>
    <?php foreach ($trajetsPublier as $trajet): ?>
        <section class="trajet-card">
            <header class="trajet-header">
                <i class="fas fa-car-side"></i><?= $trajet['date_trajet'] ?>. <?= $trajet['voiture'] ?> · <?= $trajet['nombre_passagers'] ?> places restantes
            </header>
            <article class="trajet-info">
                <time class="trajet-hour" datetime="<?=$trajet['heure_depart'] ?>"><?= $trajet['heure_depart']?></time>
                <address class="trajet-location"><?= $trajet['depart'] ?></address>
                <time class="trajet-hour" datetime="<?= $trajet['heure_arrivee'] ?>"><?= $trajet['heure_arrivee'] ?></time>
                <address class="trajet-location"><?= $trajet['destination'] ?></address>
            </article>
            <footer class="trajet-footer">
                <span class="conducteur">
                    <i class="fas fa-user"></i> Conducteur : <?= $trajet['nom_conducteur']?>
                </span>
                <span>
                    <button class="tajet-btn" data-id-trajet="<?= $trajet['id_trajet'] ?>">Voir le trajet</button>
                </span>
            </footer>
        </section>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun trajet publié.</p>
<?php endif; ?>

<h2>Mes trajets réservés</h2>
<?php if (!empty($trajetsReserver)): ?>
    <?php foreach ($trajetsReserver as $trajet): ?>
        <section class="trajet-card">
            <header class="trajet-header">
                <i class="fas fa-car-side"></i><?= $trajet['date_trajet'] ?>. <?= $trajet['voiture'] ?> · <?= $trajet['nombre_passagers'] ?> places restantes
            </header>
            <article class="trajet-info">
                <time class="trajet-hour" datetime="<?=$trajet['heure_depart'] ?>"><?= $trajet['heure_depart']?></time>
                <address class="trajet-location"><?= $trajet['depart'] ?></address>
                <time class="trajet-hour" datetime="<?= $trajet['heure_arrivee'] ?>"><?= $trajet['heure_arrivee'] ?></time>
                <address class="trajet-location"><?= $trajet['destination'] ?></address>
            </article>
            <footer class="trajet-footer">
                <span class="conducteur">
                    <i class="fas fa-user"></i> Conducteur : <?= $trajet['nom_conducteur']?>
                </span>
                <span>
                    <a href="index.php?action=annuler_reservation&id_trajet=<?= $trajet['id_trajet'] ?>" class="annuler-btn">Annuler la réservation</a>
                </span>
            </footer>
        </section>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun trajet réservé.</p>
<?php endif; ?>
    <?php include 'footer.php'; ?>
</body>
</html>
