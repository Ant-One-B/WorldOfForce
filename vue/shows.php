<?php include_once __DIR__ . '/headerView.php'; ?>

<h1>Les séries</h1>

<?php 
if (!$shows) {
    echo "<p class='nop'>Aucune série trouvé.</p>";
}
?>
<div class="gridContainer">
    <div class="grid">
        <?php 
        if ($shows) {
            // utilisation de foreach pour afficher les affiches des séries présentes dans la base de donnée
            foreach ($shows as $shows) {
                // Ajout de id et ref à l'url pour récupérer l'id et la ref en GET sur la page de la série.
                echo "<p><a href='?route=serieUnique&id=" . $shows['id_serie'] . "&ref=" . $shows['ref_tmdb'] . "'><img src='" . $shows['afficheS'] . "' alt='" . $shows['titreS'] . "' class='poster'></a></p>";
            }
        }
        ?>
    </div>
</div>

<?php include_once __DIR__ . '/footerView.php'; ?>