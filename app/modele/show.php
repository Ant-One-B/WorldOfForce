<?php
include __DIR__ . "/dbConnect.php";

// Ajouter une série dans la base de données
function addShow($titre, $acteur, $tmdb, $affiche)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        // Préparation de la requête
        $request = 'INSERT INTO serie (titreS, acteurS, ref_tmdb, afficheS) VALUES (:titreS, :acteurS, :ref_tmdb, :afficheS)';
        $statement = $conn->prepare($request);
        // Exécution de la requête avec les paramètres
        $statement->execute(['titreS' => $titre, 'acteurS' => $acteur, 'ref_tmdb' => $tmdb, 'afficheS' => $affiche]);
        return true;
    } catch (PDOException $e) {
        // Gestion des erreurs
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    }
}

// Fonction pour récupérer toutes les séries dans la base de données
function getAllShowsPoster()
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }

    try {
        // Requête pour récupérer les informations des séries
        $query = "SELECT id_serie, ref_tmdb, afficheS, titreS FROM serie";
        $statement = $conn->prepare($query);
        $statement->execute();
        // Récupération des données sous forme de tableau
        $shows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $shows;
    } catch (PDOException $e) {
        // Gestion des erreurs
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
}

// Récupérer toutes les infos d'une série par sa référence TMDB.
function getShowDetails($refTmdb)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }

    try {
        // Requête pour récupérer les détails d'une série
        $query = "SELECT * FROM serie WHERE ref_tmdb = :id";
        $statement = $conn->prepare($query);
        $statement->execute(['id' => $refTmdb]);
        // Récupération des données sous forme de tableau
        $show = $statement->fetch(PDO::FETCH_ASSOC);
        return $show;
    } catch (PDOException $e) {
        // Gestion des erreurs
        addError("Erreur de base de donnée, veuillez réessayer ultérieurement.");
        return false;
    }
}