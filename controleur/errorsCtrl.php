<?php 

include_once __DIR__ . "/../modele/errorsHandler.php";

$errors = getErrors();

include __DIR__ . '/../vue/errorsView.php';
