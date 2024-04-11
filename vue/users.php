<?php include __DIR__ . '/headerView.php'; ?>

<h1>Liste des Utilisateurs</h1>
<div class="tableContainer">
    <table>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?= $user['id_utilisateur'] ?>
                    </td>
                    <td>
                        <?= $user['pseudoU'] ?>
                    </td>
                    <td>
                        <?= $user['mailU'] ?>
                    </td>
                    <td>
                        <?= $user['role'] ?>
                    </td>
                    <td>
                        <form action="?route=users" method="post">
                            <input type="hidden" name="userId" value="<?= $user['id_utilisateur'] ?>">
                            <input type="hidden" name="newRole"
                                value="<?= $user['role'] === 'Membre' ? 'Admin' : 'Membre' ?>">
                            <button type="submit" class="btn">
                                <?= $user['role'] === 'Membre' ? 'Passer en Admin' : 'Passer en Membre' ?>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="?route=users" method="post">
                            <input type="hidden" name="pseudoToDelete" value="<?= $user['pseudoU'] ?>">
                            <button type="submit" id="del" class="btn">Bannir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include __DIR__ . '/footerView.php'; ?>