<?php include_once __DIR__ . '/headerView.php'; ?>



<h1>Messages de contact</h1>
<?php if (!empty($messages)): ?>
    <table>
        <tbody>
            <!-- affichage de tout les messages ayant le statut : "wait" -->
            <?php foreach ($messages as $message): ?>
                <tr>
                    <?php $formatted_date = date('d/m/Y', strtotime($message['dateF'])); ?>
                    <td>
                        <?= $message['id_contact'] ?>
                    </td>
                    <td>
                        <?= $message['mailF'] ?>
                    </td>
                    <td>
                        <?= $message['objetF'] ?>
                    </td>
                    <td>
                        <?= $message['messageF'] ?>
                    </td>
                    <td>
                        <?= $formatted_date ?>
                    </td>

                    <td>
                        <?php if ($message['statutF'] === 'wait'): ?>
                            <form action="?route=contactadmin" method="post">
                                <!-- récupération de l'id du message à traiter -->
                                <input type="hidden" name="messageId" value="<?= $message['id_contact'] ?>">
                                <!-- traitement du message -->
                                <input type="submit" name="updateStatus" class="btn" value="Marquer comme fait">
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="noCom">Aucun message de contact trouvé.</p>
<?php endif; ?>

<?php include_once __DIR__ . '/footerView.php'; ?>