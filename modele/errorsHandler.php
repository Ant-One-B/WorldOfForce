<?php

// Fonction pour ajouter une erreur
function addError($errorMessage) {
    if (!isset($_SESSION['errors'])) {
        $_SESSION['errors'] = [];
    }
    $_SESSION['errors'][] = $errorMessage;
}

// Fonction pour récupérer les erreurs
function getErrors() {
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']); // Efface les erreurs après les avoir récupérées
        return $errors;
    }
    return [];
}
