<?php
include __DIR__ . '/../modele/contact.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Récupérer les données du formulaire
        $mail = htmlspecialchars($_POST['mail'] ?? '', ENT_QUOTES, 'UTF-8');
        $objet = htmlspecialchars($_POST['objet'] ?? '', ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');

        // Valider les données du formulaire
        if (empty($mail) || empty($objet) || empty($message)) {
            throw new Exception("Tous les champs du formulaire sont obligatoires.");
        }

        // Vérifier si les caractères interdits sont présents dans le mail, l'objet et le message
        if (preg_match("/[<>\{\}\[\]\/\\\\]/", $mail)) {
            throw new Exception("L'adresse e-mail ne peut pas contenir les caractères : <>{[]}\/");
        }

        if (preg_match("/[<>\{\}\[\]\/\\\\]/", $objet)) {
            throw new Exception("L'objet ne peut pas contenir les caractères : <>{[]}\/");
        }

        if (preg_match("/[<>\{\}\[\]\/\\\\]/", $message)) {
            throw new Exception("Le message ne peut pas contenir les caractères : <>{[]}\/");
        }

        // Appeler la fonction du modèle pour enregistrer le message
        if (saveContactMessage($mail, $objet, $message)) {
            // Rediriger l'utilisateur vers une page de confirmation
            header('Location: ?route=confirmation');
            exit;
        } else {
            // Lancer une exception en cas d'échec de l'enregistrement
            throw new Exception("Erreur lors de l'enregistrement du message. Veuillez réessayer.");
        }
    } catch (Exception $e) {
        // Capturer l'exception et afficher le message d'erreur
        addError($e->getMessage());
    }
}

// Afficher le formulaire de contact (vue contactForm.php)
include __DIR__ . '/../vue/contactForm.php';