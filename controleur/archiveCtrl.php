<?php include __DIR__ . '/../modele/contact.php';

if (!isset($_SESSION['role']) || (isset($_SESSION['role']) && $_SESSION['role'] === 'Membre')) {
    include __DIR__ . "/../vue/404.php";
    exit;
}

// récuperer tout les messages de contact
$messages = getAllContactMessages();

include __DIR__ . '/../vue/archive.php';
