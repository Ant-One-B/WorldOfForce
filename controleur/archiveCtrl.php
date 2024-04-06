<?php include __DIR__ . '/../modele/contact.php';

// récuperer tout les messages de contact
$messages = getAllContactMessages();

include __DIR__ . '/../vue/archive.php';
