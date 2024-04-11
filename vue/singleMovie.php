<?php include __DIR__ . '/headerView.php'; ?>


<?php if (!$movie) :?>
    <p class="nop"> Film non répertorié</p>
    <?php else : ?>
<h1>
    <?= $movie['titreF'] ?>
</h1>

<section id="details" class="details">
    <!-- insertion des informations voulues pour le film selectionné -->
    <figure class="poster">
        <p><img src='<?= $movie['afficheF'] ?>' alt='Affiche de <?= $movie['titreF'] ?>'></p>
    </figure>
    <p>Acteurs :
        <?= $movie['acteurF'] ?>
    </p>
</section>

<?php
// Récupérer l'identifiant du film à partir de la requête GET
$filmId = $_GET['id'];

// Appeler la fonction pour récupérer les commentaires du film
$comments = getMovieComments($filmId);

// Vérifier si des commentaires ont été trouvés
    ?>
<section class="comments">
    <h2>commentaires</h2>
    <div class="comContainer">
        <?php if ($comments): ?>
            <?php foreach ($comments as $comment): ?>
                <?php $formatted_date = date('d/m/Y', strtotime($comment['dateC'])); ?>
                <div class="com">
                    <p class='pseudoC'>
                        <?= $comment['pseudoU'] ?> à écrit :
                    </p>
                    <p class='comC'>
                        <?= $comment['messageC'] ?>
                    </p>
                    <p class='dateC'>le :
                        <?= $formatted_date ?>
                    </p>
                    <?php if ((isset($_SESSION["role"]) && $_SESSION["role"] === "Admin" || (isset($_SESSION["pseudo"]) && $_SESSION["pseudo"] === $comment['pseudoU']))): ?>
                        <!-- Bouton de suppression -->
                        <form action="?route=filmUnique&id=<?= $_GET['id'] ?>&ref=<?= $_GET['ref'] ?>" method="post">
                            <input type="hidden" name="commentId" value="<?= $comment['id_commentaire'] ?>">
                            <input type="submit" id="del" class="delCom btn" value="Supprimer">
                        </form>

                    <?php endif; ?>
                </div>

            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class='noCom'>Aucun commentaire pour ce film.</p>
    <?php endif; ?>



</section>
    <?php if (isset($_SESSION["pseudo"])): ?>

        <!-- Si la session est active avec un pseudo alors on affiche le formulaire de commentaire -->
        <form action="?route=filmUnique&id=<?= $_GET['id'] ?>&ref=<?= $_GET['ref'] ?>" method="post">
            <input type="hidden" name="filmId" value="<?= $_GET['id'] ?>">
            <input type="hidden" name="userId" value="<?= $_SESSION['id'] ?>">
            <label for="message">Laissez un commentaire :</label><br>
            <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Ajouter un commentaire" class="btn">
        </form>
    <?php endif; ?>

<?php if (!isset($_SESSION["pseudo"])): ?>
<div id="connect">
   <a href="?route=connexion"class = "btn">connecter vous pour pouvoir commenter</a>
</div>   
<?php endif; ?>
<?php endif; ?>
<?php include __DIR__ . '/footerView.php'; ?>