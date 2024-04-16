<?php
    session_start();
    
   

require_once(__DIR__ . '/vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


// Vérifier si l'utilisateur a accepté les cookies
if (isset($_POST['acceptCookies'])) {
    // Créer un cookie de consentement valide pendant 365 jours
    setcookie('cookiesAccepted', 'true', time() + (365 * 24 * 60 * 60), '/');
}



require __DIR__ . '/app/controleur/route.php';



