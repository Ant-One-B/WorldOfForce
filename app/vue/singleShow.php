<?php include __DIR__ . '/headerView.php'; ?>


<?php if (!$show): ?>
    <p class="nop"> Série non répertoriée</p>
<?php else: ?>
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
    $comments = getShowComments($serieId);
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
                            <?= nl2br($comment['messageC']) ?>
                        </p>
                        <p class='dateC'>Le :
                            <?= $formatted_date ?>
                        </p>
                        <?php if ((isset($_SESSION["role"]) && $_SESSION["role"] === "Admin" || (isset($_SESSION["pseudo"]) && $_SESSION["pseudo"] === $comment['pseudoU']))): ?>
                            <!-- Bouton de suppression -->
                            <form action="?route=serieUnique&id=<?= $_GET['id'] ?>&ref=<?= $_GET['ref'] ?>" method="post">
                                <input type="hidden" name="commentId" value="<?= $comment['id_commentaire'] ?>">
                                <input type="submit" id="del" class="delCom btn" value="Supprimer">
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class='noCom'>Aucun commentaire pour cette série.</p>
        <?php endif; ?>
    </section>
    <?php if (isset($_SESSION["pseudo"])): ?>
        <!-- Si la session est active avec un pseudo alors on affiche le formulaire de commentaire -->
        <form action="?route=serieUnique&id=<?= $_GET['id'] ?>&ref=<?= $_GET['ref'] ?>" method="post">
            <input type="hidden" name="serieId" value="<?= $_GET['id'] ?>">
            <!-- Utilisation de $_GET['id'] pour l'identifiant de la série -->
            <input type="hidden" name="userId" value="<?= $_SESSION['id'] ?>">
            <label for="message">Laissez un commentaire :</label><br>
            <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Ajouter un commentaire" class="btn">
        </form>
    <?php endif; ?>

    <?php if (!isset($_SESSION["pseudo"])): ?>
        <div id="connect">
            <a href="?route=connexion" class="btn">connecter vous pour pouvoir commenter</a>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php include __DIR__ . '/footerView.php'; ?>