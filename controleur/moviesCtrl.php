<?php

include __DIR__ . '/../modele/movie.php';

$films = getAllMoviesPoster();
include __DIR__ . '/../vue/movies.php';