<?php 

include __DIR__ . '/headerView.php'; 



// Vérifier s'il y a des erreurs à afficher
$errors = getErrors();
if (!empty($errors)): ?>
    <div class="error-messages">
        <?php foreach ($errors as $error): ?>
            <p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if ($util): ?>
    <h1>Profil de <?= htmlspecialchars($util['pseudoU'], ENT_QUOTES, 'UTF-8') ?></h1>
    <section class="profil">
        <p><span>Email :</span> <?= htmlspecialchars($util['mailU'], ENT_QUOTES, 'UTF-8') ?></p>

        <h2>Pour mieux vous connaître</h2>
        <p><span>Région :</span> <?= htmlspecialchars($util['region'], ENT_QUOTES, 'UTF-8') ?></p>
        <p><span>Description :</span> <?= htmlspecialchars($util['description'], ENT_QUOTES, 'UTF-8') ?></p>
        <a href="?route=modifierprofil">Mettre à jour le profil</a>
    </section>

    <!-- Boîte de dialogue modale -->
    <div id="confirmationModal" class="modal">
        <div class="modalContent">
            <p>Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.</p>
            <form id="deleteAccountForm" action="?route=profil" method="post">
                <button type="submit" class="btn delete" name="supprimerCompte">Oui, supprimer mon compte</button>
                <button type="button" class="btn" id="cancelDelete">Annuler</button>
            </form>
        </div>
    </div>

    <!-- Bouton pour ouvrir la boîte de dialogue modale -->
    <button id="openModal" class="btn delete">Supprimer mon compte</button>
<?php else: ?>
    <p class="nop">Aucun profil à afficher.</p>
<?php endif; ?>

<?php include __DIR__ . '/footerView.php'; ?>