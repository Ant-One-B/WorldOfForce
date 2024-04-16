<?php

// Fonction pour ajouter une erreur
function addError($errorMessage)
{
    if (!isset($_SESSION['errors'])) {
        $_SESSION['errors'] = [];
    }
    $_SESSION['errors'][] = $errorMessage;
}

// Fonction pour récupérer les erreurs
function getErrors()
{
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']); // Efface les erreurs après les avoir récupérées
        return $errors;
    }
    return [];
}

// Fonction pour ajouter un message
function addMessage($message)
{
    if (!isset($_SESSION['messages'])) {
        $_SESSION['messages'] = [];
    }
    $_SESSION['messages'][] = $message;
}

// Fonction pour récupérer les messages
function getMessages()
{
    if (isset($_SESSION['messages'])) {
        $messages = $_SESSION['messages'];
        unset($_SESSION['messages']); // Efface les messages après les avoir récupérés
        return $messages;
    }
    return [];
}