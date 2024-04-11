<?php include __DIR__ . '/headerView.php'; ?>

<h1>Les films</h1>

<?php 
if (!$films) {
    echo "<p class='nop'>Aucun film trouvé.</p>";
}
?>

<div class="gridContainer">
    <div class="grid">
        <?php 
        if ($films) {
            // utilisation de foreach pour afficher les affiches des films présent dans la base de donnée
            foreach ($films as $film) {
                // Ajout de id et ref à l'url pour récupérer l'id et la ref en GET sur la page du film.
                echo "<a href='?route=filmUnique&id=" . $film['id_film'] . "&ref=" . $film['ref_tmdb'] . "'><img src='" . $film['afficheF'] . "' alt='" . $film['titreF'] . "' class='poster'></a>";
            }
        }
        ?>
    </div>
</div>

<?php include __DIR__ . '/footerView.php'; ?>
