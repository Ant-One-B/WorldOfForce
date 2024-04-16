<?php
include_once __DIR__ . '/messageHandler.php';

// connection à la base de donnée, les options d'environnement sont dans le fichier .env
function connectPDO()
{
    try {
        $conn = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        addError("Erreur de base de donnée, veuillez réessayer ultérieurement.");
        return false;
    }
}