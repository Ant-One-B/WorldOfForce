<?php
include __DIR__ . '/../modele/show.php';

$shows = getAllShowsPoster();

include __DIR__ . '/../vue/shows.php';