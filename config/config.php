<?php

// Enregistre l'origine du dossier dans une variable nommée ROOT
define('ROOT', dirname(__DIR__));

// Enregistre le chemin jusqu'à view dans une variable nommée TEMPLATES
define('TEMPLATES', __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "views");
//dump(TEMPLATES);