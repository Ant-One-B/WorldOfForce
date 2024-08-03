<?php 
include __DIR__ . '/../modele/user.php';

try {
    // on défini la variable $pseudo grâce à la session
    if (!isset($_SESSION['id'])) {
        header('Location: ?route=404');
        exit;
    }
    $pseudo = $_SESSION['pseudo'];

    // on défini $util (utilisateur) grâce à $pseudo et la fonction
    $util = getUserByPseudo($pseudo);
    if (!$util) {
        throw new Exception("Erreur de base de données : utilisateur introuvable.");
    }

    // Vérifier si le formulaire de suppression de compte a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimerCompte'])) {
        // Appeler la fonction pour supprimer le compte
        if (deleteUser($pseudo)) {
            // Déconnecter l'utilisateur et le rediriger vers une page d'accueil par exemple
            unset($_SESSION['pseudo']);
            unset($_SESSION['role']);
            unset($_SESSION['id']);
            unset($_SESSION['mail']);
            header('Location: ?route=accueil');
            exit;
        } else {
            throw new Exception("Une erreur s'est produite lors de la suppression du compte. Veuillez réessayer.");
        }
    }
} catch (Exception $e) {
    addError($e->getMessage());
    $util = null;
}

include __DIR__ . '/../vue/profil.php';
?>