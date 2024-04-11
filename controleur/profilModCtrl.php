<?php

include __DIR__ . "/../modele/dbUser.php";

// on défini la variable $pseudo grâce à la session
$pseudo = $_SESSION['pseudo'];
// on défini $util (utilisateur) grâce à $pseudo et la fonction 
$util = getUserByPseudo($pseudo);

// Vérifier si des données ont été envoyées via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Vérifier si les champs région et description sont définis dans la requête
        if (isset($_POST['region'], $_POST['description'])) {
            // Récupérer les données saisies par l'utilisateur
            $region = htmlspecialchars($_POST['region'], ENT_QUOTES, 'UTF-8');
            $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');

               
            // Mettre à jour la région et la description de l'utilisateur dans la base de données
            $pseudo = $_SESSION['pseudo'];
            $success = updateUserInfo($pseudo, $region, $description);

            // Rediriger l'utilisateur en fonction du résultat de la mise à jour
            if ($success) {
                header("Location: ?route=profil");
                exit();
            } else {
                throw new Exception("Une erreur s'est produite lors de la mise à jour du profil.");
            }
        } else {
            throw new Exception("Tous les champs du formulaire sont obligatoires.");
        }
    } catch (Exception $e) {
        // Capturer l'exception et afficher le message d'erreur
        addError($e->getMessage());
    }
}



include __DIR__ . "/../vue/profilMod.php";