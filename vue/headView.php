<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World of force</title>
    <!-- lien vers la feuille de style -->
    <link rel="stylesheet" href="statics/styles/css/style.css">
    <!-- liens vers les scripts -->
    <?php if (isset($_GET['route']) && $_GET['route'] == 'accueil'):?>
    <script src="statics/scripts/script.js" defer></script>
    <?php endif; ?>
    <?php if (isset($_GET['route']) && $_GET['route'] == 'serieUnique'):?>
    <script src="statics/scripts/scriptSeries.js" defer></script>
    <?php endif; ?>
    <?php if (isset($_GET['route']) && $_GET['route'] == 'filmUnique'):?>
    <script src="statics/scripts/scriptFilms.js" defer></script>
    <?php endif; ?>
    <?php if (isset($_GET['route']) && $_GET['route'] == 'profil'):?>
    <script src="statics/scripts/scriptDelete.js" defer></script>
    <?php endif; ?>
    

</head>