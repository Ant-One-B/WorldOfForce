<?php include __DIR__ . '/headerView.php'; ?>
<?php if (!$book): ?>
    <p class="nop"> Livre non répertorié</p>
<?php else: ?>
    <h1>
        <?= $book['titreL'] ?>
    </h1>

    <!-- Formatage de la date en jj/mm/aaaa -->
    <?php $formatted_date = date('d/m/Y', strtotime($book['sortieL'])); ?>
    <section class="details">
        <!-- insertion des informations voulues pour le livre selectionné -->
        <figure class="poster">
            <img src='<?= $book['couvertureL'] ?>' alt='Couverture de <?= $book['titreL'] ?>'>
        </figure>
        <p>Auteur :
            <?= $book['auteurL'] ?>
        </p>
        <p>Nombre de pages :
            <?= $book['nbrPagesL'] ?>
        </p>
        <p>Édition :
            <?= $book['editionL'] ?>
        </p>
        <p>Date de sortie :
            <?= $formatted_date ?>
        </p>
        <p>Synopsis :
            <?= nl2br($book['synopsisL']) ?>
        </p>
    </section>

    <?php
    // Récupérer l'identifiant du film à partir de la requête GET
    $livreId = $_GET['id'];

    // Appeler la fonction pour récupérer les commentaires du film
    $comments = getBookComments($livreId); ?>
    <section class="comments">
        <h2>commentaires</h2>
        <div class="comContainer">
            <?php if ($comments): ?>
                <?php foreach ($comments as $comment): ?>
                    <?php $formatted_date = date('d/m/Y', strtotime($comment['dateC'])); ?>
                    <div class="com">
                        <p class='pseudoC'><?= $comment['pseudoU'] ?> à écrit :</p>
                        <p class='comC'><?= nl2br($comment['messageC']) ?></p>
                        <p class='dateC'>le: <?= $formatted_date ?></p>
                        <?php if ((isset($_SESSION["role"]) && $_SESSION["role"] === "Admin" || (isset($_SESSION["pseudo"]) && $_SESSION["pseudo"] === $comment['pseudoU']))): ?>
                            <!-- Bouton de suppression -->
                            <form action="?route=livreUnique&id=<?= $_GET['id'] ?>" method="post">
                                <input type="hidden" name="commentId" value="<?= $comment['id_commentaire'] ?>">
                                <input type="submit" id="del" class="delCom btn" value="Supprimer">
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class='noCom'>Aucun commentaire pour ce livre.</p>
        <?php endif; ?>
    </section>
    <!-- Si la session est active avec un pseudo alors on affiche le formulaire de commentaire -->
    <?php if (isset($_SESSION["pseudo"])): ?>
        <form action="?route=livreUnique&id=<?= $_GET['id'] ?>" method="post">
            <input type="hidden" name="livreId" value="<?= $_GET['id'] ?>">
            <input type="hidden" name="userId" value="<?= $_SESSION['id'] ?>">
            <label for="message">Commentaire :</label><br>
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