<header class="entete">
    <a href="/" class="entete__lien-titre">
        <img src="logo.png" alt="" class="entete__logo">
        <h1>CocoLaRochelle</h1>
    </a>
    <nav class="entete__navigation">
        <ul class="entete__liste">
            <li class="entete__item"><a href="/publier-trajet" class="entete__lien">Publier un trajet</a></li>
            <li class="entete__item"><a href="/vos-trajets" class="entete__lien">Vos trajets</a></li>
            <?php if (isset($_SESSION['utilisateur_id'])): ?>
                <li class="entete__item"><a href="/compte" class="entete__lien">Compte</a></li>
            <?php else: ?>
                <li class="entete__item"><a href="/connexion" class="entete__lien">Se connecter</a></li>
                <li class="entete__item"><a href="/inscription" class="entete__lien">Inscription</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

