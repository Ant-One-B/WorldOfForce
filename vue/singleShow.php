<?php include_once __DIR__ . '/headerView.php'; ?>



<h1>
    <?= $show['titreS'] ?>
</h1>

<section id="detailsS" class="details">

    <figure class="poster">
        <p><img src='<?= $show['afficheS'] ?>' alt='Affiche de <?= $show['titreS'] ?>'></p>
    </figure>
    <p>Acteurs :
        <?= $show['acteurS'] ?>
    </p>
</section>

<?php
// Récupérer l'identifiant du film à partir de la requête GET
$serieId = $_GET['id'];

// Appeler la fonction pour récupérer les commentaires du film
$comments = getShowComments($serieId); ?>
<section class="comments">
    <h2>commentaires</h2>

    <?php if ($comments): ?>
        
        <?php foreach ($comments as $comment): ?>
            <div class="com">
                <p class='pseudoC'>Par :
                    <?= $comment['pseudoU'] ?>
                </p>
                <p class='comC'>
                    <?= $comment['messageC'] ?>
                </p>
                <p class='dateC'>Date :
                    <?= $comment['dateC'] ?>
                </p>
                <?php if ((isset($_SESSION["role"]) && $_SESSION["role"] === "Admin" || (isset($_SESSION["pseudo"]) && $_SESSION["pseudo"] === $comment['pseudoU']))): ?>
                    <!-- Bouton de suppression -->
                    <form action="?route=serieUnique&id=<?= $_GET['id'] ?>&ref=<?= $_GET['ref'] ?>" method="post" >
                        <input type="hidden" name="commentId" value="<?= $comment['id_commentaire'] ?>">
                        <input type="submit" id="del" class="delCom" value="Supprimer">
                    </form>
                <?php endif; ?>
            </div>
        <?php endforeach;
    else: ?>
        <p class='noCom'>Aucun commentaire pour ce film.</p>
    <?php endif; ?>

    <?php if (isset($_SESSION["pseudo"])): ?>
        <!-- Si la session est active avec un pseudo alors on affiche le formulaire de commentaire -->
        <form action="?route=serieUnique&id=<?= $_GET['id'] ?>&ref=<?= $_GET['ref'] ?>" method="post">
    <input type="hidden" name="serieId" value="<?= $_GET['id'] ?>"> <!-- Utilisation de $_GET['id'] pour l'identifiant de la série -->
    <input type="hidden" name="userId" value="<?= $_SESSION['id'] ?>">
    <label for="message">Laissez un commentaire :</label><br>
    <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Ajouter un commentaire" class="btn">
</form>
    <?php endif; ?>
</section>
<?php include_once __DIR__ . '/footerView.php'; ?>