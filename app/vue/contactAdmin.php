<?php include __DIR__ . '/headerView.php'; ?>



<h1>Messages de contact</h1>
<?php if (!empty($messages)): ?>
    <div class="tableContainer">
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
                        <td class="text">
                            <?= nl2br($message['messageF']) ?>
                        </td>
                        <td>
                            <?= $formatted_date ?>
                        </td>

                        <td>

                            <form action="?route=contactadmin" method="post">
                                <!-- récupération de l'id du message à traiter -->
                                <input type="hidden" name="messageId" value="<?= $message['id_contact'] ?>">
                                <!-- traitement du message -->
                                <input type="submit" name="updateStatus" class="btn" value="Marquer comme fait">
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <p class="nop">Aucun message de contact trouvé.</p>
<?php endif; ?>

<?php include __DIR__ . '/footerView.php'; ?>