<?php
include __DIR__ . "/dbConnect.php";

// Ajouter un film dans la base de données
function addMovie($titre, $acteur, $tmdb, $affiche)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        // Préparation de la requête
        $request = 'INSERT INTO film (titreF, acteurF, ref_tmdb, afficheF) VALUES (:titreF, :acteurF, :ref_tmdb, :afficheF)';
        $statement = $conn->prepare($request);
        // Exécution de la requête avec les paramètres
        $statement->execute(['titreF' => $titre, 'acteurF' => $acteur, 'ref_tmdb' => $tmdb, 'afficheF' => $affiche]);
        return true;
    } catch (PDOException $e) {
        // Gestion des erreurs
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    }
}

// Fonction pour récupérer les informations des films
function getAllMoviesPoster()
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        // Requête pour récupérer les informations des films
        $query = "SELECT id_film, ref_tmdb, afficheF, titreF FROM film";
        $statement = $conn->prepare($query);
        $statement->execute();
        // Récupération des données sous forme de tableau
        $movies = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $movies;
    } catch (PDOException $e) {
        // Gestion des erreurs
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    }
}

// Obtenir tous les détails d'un film via sa référence TMDB
function getMovieDetails($refTmdb)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        // Requête pour récupérer les détails d'un film
        $query = "SELECT * FROM film WHERE ref_tmdb = :id";
        $statement = $conn->prepare($query);
        $statement->execute(['id' => $refTmdb]);
        // Récupération des données sous forme de tableau
        $movie = $statement->fetch(PDO::FETCH_ASSOC);
        return $movie;
    } catch (PDOException $e) {
        // Gestion des erreurs
        addError("Erreur de base de données : référence introuvable ");
        return false;
    }
}