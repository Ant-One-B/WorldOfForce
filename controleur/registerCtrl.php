<?php
include __DIR__ . '/../modele/loginUser.php';


// Vérifier si des données ont été envoyées via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pseudo = htmlspecialchars($_POST['pseudo'] ?? '', ENT_QUOTES, 'UTF-8');
        $mail = htmlspecialchars($_POST['mail'] ?? '', ENT_QUOTES, 'UTF-8');
        $password = $_POST['password'] ?? '';

        // Validation des données d'entrée
        if (!preg_match("/^[a-zA-Z0-9_]{3,20}$/", $pseudo)) {
            throw new Exception("Pseudo invalide.");
        }

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Adresse email invalide.");
        }

        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
            throw new Exception("Mot de passe invalide.Le mot de passe doit obligatoirement contenir 1 majuscule, 1 minuscule, 1 caractére sépcial tel que : @$!%*?& et 1 chiffre");
        }

        // Vérifier si le pseudo est déjà utilisé
        if (checkIfPseudoExist($pseudo)) {
            throw new Exception("Ce pseudo est déjà utilisé.");
        }

        // Créer un nouvel utilisateur grâce à la fonction
        if (createUser($pseudo, $mail, $password)) {
            header('Location: ?route=connexion');
            exit;
        } else {
            throw new Exception("Une erreur est survenue lors de l'inscription. Veuillez réessayer.");
        }
    } catch (Exception $e) {
        // Capturer l'exception et afficher le message d'erreur
        addError($e->getMessage());
    }
}
include __DIR__ . '/../vue/register.php';