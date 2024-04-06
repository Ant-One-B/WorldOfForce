<?php
include __DIR__ . '/../modele/book.php';

$livres = getAllBooksCover();
include __DIR__ . '/../vue/books.php';





