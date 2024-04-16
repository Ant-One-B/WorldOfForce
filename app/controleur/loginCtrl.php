<?php
include __DIR__ . "/../modele/loginUser.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pseudo = htmlspecialchars($_POST['pseudo'] ?? '', ENT_QUOTES, 'UTF-8'); // Échapper les données HTML
        $password = $_POST['password'] ?? '';

        // Validation des données d'entrée
        if (!preg_match("/^[a-zA-Z0-9_]{3,20}$/", $pseudo)) { // Validation du pseudo avec une regex
            throw new Exception("Pseudo invalide.");
        }

        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) { // Validation du mot de passe avec une regex
            throw new Exception("Mot de passe invalide.");
        }

        // Vérification des informations d'identification de l'utilisateur


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = htmlspecialchars($_POST['pseudo'] ?? '', ENT_QUOTES, 'UTF-8');
            $password = $_POST['password'] ?? '';

            // Vérifier les informations d'identification de l'utilisateur
            if (login($pseudo, $password)) {
                // Authentification réussie, rediriger vers l'accueil
                header('Location: ?route=accueil');
                exit;
            } else {
                // Authentification échouée, afficher un message d'erreur
                throw new Exception("Authentification échoué.");
            }
        } else {
            // Afficher le formulaire de connexion
            include __DIR__ . "/loginCtrl.php";
        }
    } catch (Exception $e) {
        // Capturer l'exception et afficher le message d'erreur
        addError($e->getMessage());
    }
}
include __DIR__ . '/../vue/login.php';