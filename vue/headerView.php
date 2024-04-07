<?php
require_once __DIR__ . '/headView.php';
?>

<body>
        <header>
                <nav class="menus">
                        <figure class="logo">
                                <a href="?route=accueil"> <img src="statics/images/logos/logowof02.png" width="120" height="119"
                                                alt="Logo World of Force"></a>
                        </figure>
                        <div class="menuToggle">
                                <input type="checkbox" id="menuToggleCheckbox">
                                <label for="menuToggleCheckbox" class="menuIcon">&#9776;</label>
                                <ul class="menuP">
                                        <li><a href="?route=accueil">Accueil</a></li>
                                        <li><a href="?route=livres">livres</a></li>
                                        <li><a href="?route=films">films</a></li>
                                        <li><a href="?route=series">serie</a></li>
                                        <li><a href="?route=contact">contact</a></li>
                                        <!-- si une session n'a pas de pseudo défini : -->
                                        <?php if (!isset($_SESSION["pseudo"])): ?>
                                                <li><a href="?route=inscription">S'inscrire</a></li>
                                                <li><a href="?route=connexion">Se&nbsp;connecter</a></li>
                                        <?php endif; ?>
                                        <!-- Si une session à un pseudo défini : -->
                                        <?php if (isset($_SESSION["pseudo"])): ?>
                                                <li><a href="?route=profil">Profil</a></li>
                                                <li><a href="?route=deconnexion">Se&nbsp;deconnecter</a></li>
                                        <?php endif; ?>
                                </ul>
                                <!-- si une session à un role Admin défini alor on affiche -->
                                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] === "Admin"): ?>
                                        <ul class="menuS">
                                                <li><a href="?route=adminlivre">Ajouter un livre</a></li>
                                                <li><a href="?route=adminfilm">Ajouter un film</a></li>
                                                <li><a href="?route=adminserie">Ajouter&nbsp;une&nbsp;serie</a></li>
                                                <li><a href="?route=contactadmin">Message reçus</a></li>
                                        </ul>
                                <?php endif; ?>
                        </div>
                </nav>


        </header>
        <main>
       <?php  include_once __DIR__ . '/../controleur/errorsCtrl.php';?>