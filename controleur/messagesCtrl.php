<?php 

include_once __DIR__ . "/../modele/messageHandler.php";

$errors = getErrors();
$mess = getMessages();

include __DIR__ . '/../vue/messagesView.php';
