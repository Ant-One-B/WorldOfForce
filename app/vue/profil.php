<?php include __DIR__ . '/headerView.php'; ?>

<h1>Profil de
    <?= $util['pseudoU'] ?>
</h1>
<section class="profil">
    <p><span>Email :</span>
        <?= $util['mailU'] ?>
    </p>

    <h2>pour mieux vous connaître</h2>
    <p><span>Région :</span>
        <?= $util['region'] ?>
    </p>
    <p><span>Description :</span>
        <?= $util['description'] ?>
    </p>
    <a href="?route=modifierprofil">
        Mettre à jour le profil
    </a>
</section>

<!-- Boîte de dialogue modale -->
<div id="confirmationModal" class="modal">
    <div class="modalContent">
        <p>Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.</p>
        <form id="deleteAccountForm" action="?route=profil" method="post">
            <button type="submit" class="btn delete" name="supprimerCompte">oui, supprimer mon compte</button>
            <button type="button" class="btn" id="cancelDelete">Annuler</button>
        </form>
    </div>
</div>

<!-- Bouton pour ouvrir la boîte de dialogue modale -->
<button id="openModal" class="btn delete" >Supprimer mon compte</button>



<?php include __DIR__ . '/footerView.php'; ?>