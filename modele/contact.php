<?php
include __DIR__ . "/dbConnect.php";

// récuprer les messages de contact avec un statut "wait"
function getAllContactMessagesWait()
{
    $conn = connectPDO();
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }

    try {
        $query = "SELECT * FROM contact WHERE statutF = 'wait' ";
        $statement = $conn->prepare($query);
        $statement->execute();
        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $messages;
    } catch (PDOException $e) {
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    }
}

// récupérer les messages
function getAllContactMessages()
{
    $conn = connectPDO();
    
    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }

    try {
        $query = "SELECT * FROM contact";
        $statement = $conn->prepare($query);
        $statement->execute();
        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $messages;
    } catch (PDOException $e) {
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    }
}

// enregistrer les messages du formulaire de contact
function saveContactMessage($mail, $objet, $message)
{
    $conn = connectPDO();

    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }

    try {
        $request = 'INSERT INTO contact (mailF, objetF, messageF) VALUES (:mailF, :objetF, :messageF)';
        $statement = $conn->prepare($request);
        $statement->execute(['mailF' => $mail, 'objetF' => $objet, 'messageF' => $message]);
        return true;
    } catch (PDOException $e) {
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    }
}

// mettre à jour les messages de contact 
function updateContactStatus($messageId)
{
    // Connexion à la base de données
    $conn = connectPDO();

    if (!$conn) {
        addError("Erreur de base de données : Connexion non établie.");
        return false;
    }

    try {
        // Préparer la requête SQL pour mettre à jour le statut du message
        $query = "UPDATE contact SET statutF = 'done' WHERE id_contact = :message_id";
        $statement = $conn->prepare($query);
        // Liaison de la valeur de l'ID du message
        $statement->bindValue(':message_id', $messageId, PDO::PARAM_INT);
        // Exécution de la requête
        $statement->execute();
        // Vérifier si la mise à jour a réussi
        if ($statement->rowCount() > 0) {
            return true; // Mise à jour réussie
        } else {
            return false; // Aucun enregistrement mis à jour
        }
    } catch (PDOException $e) {
        // Gérer les erreurs de base de données
        addError("Erreur de base de données : " . $e->getMessage());
        return false;
    }
}

