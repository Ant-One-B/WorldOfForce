<?php include __DIR__ . '/../modele/user.php';


// on défini la variable $pseudo grace à la session
$pseudo = $_SESSION['pseudo'];
// on défini $util (utilisateur) grace à $pseudo et la fonction 
$util = getUserByPseudo($pseudo);
// Vérifier si le formulaire de suppression de compte a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimerCompte'])) {
    // Récupérer le pseudo de l'utilisateur à partir de la session
    $pseudo = $_SESSION['pseudo'];

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
        // Rediriger l'utilisateur vers la page de profil
        header('Location: ?route=profil');
        // En cas d'erreur lors de la suppression du compte, afficher un message d'erreur
        addError("Une erreur s'est produite lors de la suppression du compte. Veuillez réessayer.");
        exit;
    }
}
include __DIR__ . '/../vue/profil.php';

