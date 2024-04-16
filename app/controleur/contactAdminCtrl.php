<?php
// page inexistante pour les non administrateur
if (!isset($_SESSION['role']) || (isset($_SESSION['role']) && $_SESSION['role'] === 'Membre')) {
    include __DIR__ . "/../vue/404.php";
    exit;
}
include __DIR__ . '/../modele/contact.php'; // Inclure le modèle pour accéder aux fonctions du contact



try {
    // Récupérer tous les messages de contact depuis la base de données
    $messages = getAllContactMessagesWait();
   

    // Vérifier si le formulaire de mise à jour du statut a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateStatus'])) {
        // Vérifier si l'ID du message est présent dans la requête
        if (isset($_POST['messageId'])) {
            // Récupérer l'ID du message de contact
            $messageId = $_POST['messageId'];

            // Appel de la fonction pour mettre à jour le statut
            if (updateContactStatus($messageId)) {
                // Redirection vers la page d'administration des messages de contact
                header('location: ?route=contactadmin');
                addMessage('Message traité.');
                exit;
            } else {
                throw new Exception("Erreur lors de la mise à jour du statut.");
            }
        } else {
            throw new Exception("ID du message manquant dans la requête.");
        }
    }
} catch (Exception $e) {
    // Capturer l'exception et afficher le message d'erreur
    addError($e->getMessage());
}

include __DIR__ . '/../vue/contactAdmin.php';