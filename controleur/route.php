<?php

// création des routes pour afficher els différentes pages du site.

if (isset($_GET["route"])) {
    $route = $_GET['route'] ?? '';

    switch ($route) {
        case 'accueil':
            $route = include __DIR__ . '/homeCtrl.php';
            break;
        case 'inscription':
            $route = include __DIR__ . '/registerCtrl.php';
            break;
        case 'connexion':
            $route = include __DIR__ . '/loginCtrl.php';
            break;
        case "deconnexion":
            $action = include __DIR__ . '/logoutCtrl.php';
            break;
        case 'adminlivre':
            $route = include __DIR__ . '/adminLivreCtrl.php';
            break;
        case 'adminfilm':
            $route = include __DIR__ . '/adminFilmCtrl.php';
            break;
        case 'adminserie':
            $route = include __DIR__ . '/adminSerieCtrl.php';
            break;
        case 'livres':
            $route = include __DIR__ . '/booksCtrl.php';
            break;
        case 'films':
            $route = include __DIR__ . '/moviesCtrl.php';
            break;
        case 'series':
            $route = include __DIR__ . '/showsCtrl.php';
            break;
        case 'livreUnique':
            $route = include __DIR__ . '/singleBookCtrl.php';
            break;
        case 'filmUnique':
            $route = include __DIR__ . '/singleMovieCtrl.php';
            break;
        case 'serieUnique':
            $route = include __DIR__ . '/singleShowCtrl.php';
            break;
        case 'contact':
            $route = include __DIR__ . '/formContactCtrl.php';
            break;
        case 'contactadmin':
            $route = include __DIR__ . '/contactAdminCtrl.php';
            break;
        case 'confirmation':
            $route = include __DIR__ . '/../vue/confirm.php';
            break;
        case 'profil':
            $route = include __DIR__ . '/profilCtrl.php';
            break;
        case 'modifierprofil':
            $route = include __DIR__ . '/profilModCtrl.php';
            break;
        case 'archive':
            $route = include __DIR__ . '/archiveCtrl.php';
            break;
        case 'users':
            $route = include __DIR__ . '/usersCtrl.php';
            break;
        case 'mentions':
            $route = include __DIR__ . '/../vue/mentions.php';
            break;
        default:
            // route inexistante
            include __DIR__ . '/../vue/404.php';
            break;
    }
} else {
    // aucune route choisie 
     include __DIR__ . '/homeCtrl.php';
}
