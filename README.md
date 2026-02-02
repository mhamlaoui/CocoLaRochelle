# CocoLaRochelle

**CocoLaRochelle** est une plateforme de covoiturage locale conçue spécifiquement pour les habitants de La Rochelle. Le projet vise à offrir une solution pour les déplacements sur la commune de La Rochelle.

---

## Fonctionnalités principales

- **Recherche de trajets** : Trouvez rapidement des trajets en covoiturage en fonction de votre point de départ, de votre destination et de la date.
- **Publication de trajets** : Proposez vos trajets pour aider les autres et réduire vos coûts de déplacement.
- **Profil utilisateur** : Gérez vos informations, modifiez votre mot de passe et consultez vos trajets publiés.
- **Communauté locale** : Connectez-vous avec les habitants de La Rochelle partageant les mêmes trajets.

---

## Installation et configuration

### Prérequis

- **PHP** >= 7.4.
- **Composer** (gestionnaire de dépendances PHP).
- Serveur web.
- Une base de données.

### Étapes d'installation

1. **Cloner le projet** :

   ```
   git clone https://gitlab.univ-lr.fr/projets-l2-2024/lesgentlemen/cocolarochelle.git
   cd cocolarochelle
   ```

2. **Installer les dépendances** :

   ```
   composer install
   ```

3. **Configurer les variables d'environnement** :

   - Dupliquez le fichier `.env.example` et renommez-le `.env`.
   - Renseignez les valeurs de configuration, par exemple :

     ```env
     DB_CONNECTION=pgsql
     DB_HOST=localhost
     DB_NAME=covoiturage
     DB_USER=root
     DB_PASSWORD=your_password
     GOOGLE_MAPS_API_KEY=your_api_key
     FONTAWESOME_TOKEN=your_fontawesome_token
     ```

4. **Initialiser la base de données** :

   - Importez le fichier `config/database.sql` dans votre base de données PostgreSQL pour créer les tables nécessaires.

5. **Lancer le projet en local** (serveur PHP intégré) :

   ```bash
   php -S localhost:8000
   ```

6. **Accéder au projet** :

   - Ouvrez votre navigateur et rendez-vous sur [http://localhost:8000](http://localhost:8000).

---

## Dépendances

Voici les bibliothèques et outils utilisés dans ce projet :

- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) : Gestion des variables d'environnement.
- [steampixel/simple-php-router](https://github.com/steampixel/simplePHPRouter) : Routeur léger et flexible.
- [Leaflet.js](https://leafletjs.com/) : Affichage de cartes interactives.
- [FontAwesome](https://fontawesome.com/) : Icônes modernes et fonctionnelle.
- [Google Places API](https://developers.google.com/maps/documentation/places/web-service/overview) : Autocomplétion des adresses pour les formulaires.

---

## Architecture du projet

### Structure des dossiers

- **`controleurs/`** : Contient les fichiers des contrôleurs pour gérer les requêtes et la logique.
- **`modèles/`** : Contient les fichiers des modèles pour interagir avec la base de données.
- **`vues/`** : Contient les fichiers HTML et PHP pour les interfaces utilisateur.
- **`public/`** : Contient les fichiers accessibles publiquement, comme les CSS, JS et les images.
- **`config/`** : Contient le fichier de configuration de l'application.
- **`routes/`** : Contient le fichier de définition des routes pour l'application.

### Chargement automatique PSR-4

Le projet utilise **PSR-4** pour le chargement automatique des classes, configuré dans `composer.json`. Cette approche permet une organisation des fichiers et une automatisation en fonction des namespaces.

---

## Technologies utilisées

### Frontend

- **HTML5** et **CSS3** : Structure et design des pages web.
- **Responsive design** : Mise en page adaptative pour tous les appareils via `responsive.css`.
- **Leaflet.js** : Affichage de cartes interactives.
- **FontAwesome** : Icônes modernes et fonctionnelles.
- **Google Places API** : Autocomplétion des adresses dans les formulaires.

### Backend

- **PHP** >= 7.4 : Langage principal utilisé pour le développement côté serveur.
- **Simple PHP Router** : Gestion des routes HTTP.
- **Sessions PHP** : Gestion sécurisée de l'authentification et des données utilisateur.
- **dotenv** : Gestion des variables d'environnement via [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv), permettant une configuration centralisée et sécurisée.
- **PSR-4 Autoloading** : Chargement automatique des classes basé sur les namespaces,

### Base de données

- **PostgreSQL** : Base de données utilisée pour gérer les utilisateurs, trajets et réservation.

---

## Fonctionnement du routeur

Le projet utilise [Simple PHP Router](https://github.com/steampixel/simplePHPRouter) pour définir les routes. Voici quelques exemples :

- `/` : Page d'accueil.
- `/connexion` : Page pour se connecter
- `/publier-trajet` : Publication d'un trajet.
- `/compte` : Gestion du compte utilisateur.

---

## Licence

Ce projet est sous licence **MIT**. Vous êtes libre de l'utiliser, le modifier et le distribuer.

---



**Pirate Roberts**  
Email : [pirate.roberts@example.com](mailto:pirate.roberts@example.com)

