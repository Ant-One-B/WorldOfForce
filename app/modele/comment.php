<?php

function addMovieComment($filmId, $userId, $message)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }

    try {
        // Commence une transaction
        $conn->beginTransaction();

        // Ajout du commentaire dans la table commentaire
        $query = "INSERT INTO commentaire (messageC, dateC, id_utilisateur) VALUES (:message, NOW(), :user_id)";
        $statement = $conn->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->bindParam(':message', $message, PDO::PARAM_STR);
        $statement->execute();

        // Récupération de l'ID du commentaire ajouté
        $commentId = $conn->lastInsertId();

        // Ajout d'une entrée dans la table commentaire_film pour lier le commentaire au film
        $query = "INSERT INTO commentaire_film (id_commentaire, id_film) VALUES (:comment_id, :film_id)";
        $statement = $conn->prepare($query);
        $statement->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
        $statement->bindParam(':film_id', $filmId, PDO::PARAM_INT);
        $statement->execute();

        // Valide la transaction
        $conn->commit();

        return true;
    } catch (PDOException $e) {
        addError("Erreur de base de données : " . $e->getMessage());
        $conn->rollBack();
        return false;
    }
}

function getMovieComments($filmId)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }

    try {
        // Requête pour récupérer les commentaires d'un film
        $query = "SELECT c.*, u.pseudoU 
                  FROM commentaire c
                  INNER JOIN commentaire_film cf ON c.id_commentaire = cf.id_commentaire
                  INNER JOIN utilisateur u ON c.id_utilisateur = u.id_utilisateur
                  WHERE cf.id_film = :film_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':film_id', $filmId, PDO::PARAM_INT);
        $statement->execute();
        $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $comments;
    } catch (PDOException $e) {
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    }
}

function deleteMovieComment($commentId)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        // Commencer la transaction
        $conn->beginTransaction();

        // Supprimer d'abord les enregistrements associés dans la table commentaire_film
        $query = "DELETE FROM commentaire_film WHERE id_commentaire = :comment_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
        $statement->execute();

        // Ensuite, supprimer l'enregistrement dans la table commentaire
        $query = "DELETE FROM commentaire WHERE id_commentaire = :comment_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
        $success = $statement->execute();

        // Valider la transaction
        $conn->commit();

        return $success;
    } catch (PDOException $e) {
        // En cas d'erreur, annuler la transaction
        $conn->rollBack();
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    }
}
function addShowComment($serieId, $userId, $message)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }

    try {
        // Commence une transaction
        $conn->beginTransaction();

        // Ajout du commentaire dans la table commentaire
        $query = "INSERT INTO commentaire (messageC, dateC, id_utilisateur) VALUES (:message, NOW(), :user_id)";
        $statement = $conn->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->bindParam(':message', $message, PDO::PARAM_STR);
        $statement->execute();

        // Récupération de l'ID du commentaire ajouté
        $commentId = $conn->lastInsertId();

        // Ajout d'une entrée dans la table commentaire_film pour lier le commentaire au film
        $query = "INSERT INTO commentaire_serie (id_commentaire, id_serie) VALUES (:comment_id, :serie_id)";
        $statement = $conn->prepare($query);
        $statement->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
        $statement->bindParam(':serie_id', $serieId, PDO::PARAM_INT);
        $statement->execute();

        // Valide la transaction
        $conn->commit();

        return true;
    } catch (PDOException $e) {
        addError("Erreur de base de donnée, veuillez réessayer ultérieurement.");
        // En cas d'erreur, annule la transaction
        $conn->rollBack();
        return false;
    }
}

function getShowComments($serieId)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        // Requête pour récupérer les commentaires d'un film
        $query = "SELECT c.*, u.pseudoU 
                  FROM commentaire c
                  INNER JOIN commentaire_serie cs ON c.id_commentaire = cs.id_commentaire
                  INNER JOIN utilisateur u ON c.id_utilisateur = u.id_utilisateur
                  WHERE cs.id_serie = :serie_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':serie_id', $serieId, PDO::PARAM_INT);
        $statement->execute();
        $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $comments;
    } catch (PDOException $e) {
        addError("Erreur de base de donnée, veuillez réessayer ultérieurement.");
        return false;
    }
}

function deleteShowComment($commentId)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        // Commencer la transaction
        $conn->beginTransaction();

        // Supprimer d'abord les enregistrements associés dans la table commentaire_serie
        $query = "DELETE FROM commentaire_serie WHERE id_commentaire = :comment_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
        $statement->execute();

        // Ensuite, supprimer l'enregistrement dans la table commentaire
        $query = "DELETE FROM commentaire WHERE id_commentaire = :comment_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
        $success = $statement->execute();

        // Valider la transaction
        $conn->commit();

        return $success;
    } catch (PDOException $e) {
        // En cas d'erreur, annuler la transaction
        $conn->rollBack();
        addError("Erreur de base de donnée, veuillez réessayer ultérieurement.");
        return false;
    }
}
function addBookComment($livreId, $userId, $message)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        // Commence une transaction
        $conn->beginTransaction();

        // Ajout du commentaire dans la table commentaire
        $query = "INSERT INTO commentaire (messageC, dateC, id_utilisateur) VALUES (:message, NOW(), :user_id)";
        $statement = $conn->prepare($query);
        $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $statement->bindParam(':message', $message, PDO::PARAM_STR);
        $statement->execute();

        // Récupération de l'ID du commentaire ajouté
        $commentId = $conn->lastInsertId();

        // Ajout d'une entrée dans la table commentaire_film pour lier le commentaire au film
        $query = "INSERT INTO commentaire_livre (id_commentaire, id_livre) VALUES (:comment_id, :livre_id)";
        $statement = $conn->prepare($query);
        $statement->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
        $statement->bindParam(':livre_id', $livreId, PDO::PARAM_INT);
        $statement->execute();

        // Valide la transaction
        $conn->commit();

        return true;
    } catch (PDOException $e) {
        addError("Erreur de base de donnée, veuillez réessayer ultérieurement.");
        // En cas d'erreur, annule la transaction
        $conn->rollBack();
        return false;
    }
}

function getBookComments($livreId)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }

    try {
        // Requête pour récupérer les commentaires d'un film
        $query = "SELECT c.*, u.pseudoU 
                  FROM commentaire c
                  INNER JOIN commentaire_livre cl ON c.id_commentaire = cl.id_commentaire
                  INNER JOIN utilisateur u ON c.id_utilisateur = u.id_utilisateur
                  WHERE cl.id_livre = :livre_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':livre_id', $livreId, PDO::PARAM_INT);
        $statement->execute();
        $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $comments;
    } catch (PDOException $e) {
        addError("Erreur de base de donnée, veuillez réessayer ultérieurement.");
        return false;
    }
}

function deleteBookComment($commentId)
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }
    try {
        // Commencer la transaction
        $conn->beginTransaction();

        // Supprimer d'abord les enregistrements associés dans la table commentaire_livre
        $query = "DELETE FROM commentaire_livre WHERE id_commentaire = :comment_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
        $statement->execute();

        // Ensuite, supprimer l'enregistrement dans la table commentaire
        $query = "DELETE FROM commentaire WHERE id_commentaire = :comment_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':comment_id', $commentId, PDO::PARAM_INT);
        $success = $statement->execute();

        // Valider la transaction
        $conn->commit();

        return $success;
    } catch (PDOException $e) {
        // En cas d'erreur, annuler la transaction
        $conn->rollBack();
        addError("Erreur de base de donnée, veuillez réessayer ultérieurement.");
        return false;
    }
}


