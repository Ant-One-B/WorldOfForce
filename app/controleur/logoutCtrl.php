<?php

// si les informations de sessions existent :
if (isset($_SESSION['pseudo'])) {

    // on efface les données de session
    unset($_SESSION['pseudo']);
    unset($_SESSION['role']);
    unset($_SESSION['id']);
    unset($_SESSION['mail']);
}
// on redirige vers l'accueil
header("Location: ?route=accueil");
exit;