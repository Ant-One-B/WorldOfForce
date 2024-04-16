<?php include __DIR__ . '/headerView.php'; ?>

<h1>Les livres</h1>

<?php 
if (!$livres) {
    echo "<p class='nop'>Aucun livre trouvé.</p>";
}
?>
<div class="gridContainer">
    <div class="grid">
        <?php 
        if ($livres) {
            // Utilisation d'un foreach pour afficher toutes les couvertures de livres
            foreach ($livres as $livre) {
                // écriture de l'url pour avoir accés a l'id du livre sur la page suivante.
                echo "<a href='?route=livreUnique&id=" . $livre['id_livre'] . "'><img src='" . $livre['couvertureL'] . "' alt='" . $livre['titreL'] . "' class='poster'></a>";
            }
        } 
        ?>
    </div>
</div>

<?php include __DIR__ . '/footerView.php'; ?>