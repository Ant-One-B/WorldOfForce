<?php
include __DIR__ . '/../modele/dbUser.php';

try {
    // Appeler la fonction pour récupérer la liste des utilisateurs avec leurs rôles
    $users = getUsersWithRoles();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['userId'], $_POST['newRole'])) {
            // Mise à jour du rôle de l'utilisateur
            $userId = intval($_POST['userId']);
            $newRole = $_POST['newRole']; // Assurez-vous que le nouveau rôle est valide

            // Appeler la fonction pour mettre à jour le rôle de l'utilisateur
            if (updateUserRole($userId, $newRole)) {
                // Mise à jour réussie
                header("Location: ?route=users"); // Redirection vers la liste des utilisateurs après la mise à jour
                exit();
            } else {
                throw new Exception("Une erreur s'est produite lors de la mise à jour du rôle de l'utilisateur.");
            }
        } if (isset($_POST['pseudoToDelete'])) {
            // Suppression d'un compte utilisateur
            $deleteUserPseudo = $_POST['pseudoToDelete'];
            
            // Appeler la fonction pour supprimer l'utilisateur
            if (deleteUser($deleteUserPseudo)) {
                // Suppression réussie
                header("Location: ?route=users"); // Redirection vers la liste des utilisateurs après la suppression
                exit();
            } else {
                throw new Exception("Une erreur s'est produite lors de la suppression du compte utilisateur.");
            }
        }
    }
} catch (Exception $e) {
    addError($e->getMessage());
}

// Inclure la vue pour afficher la liste des utilisateurs avec leurs rôles
include __DIR__ . '/../vue/users.php';