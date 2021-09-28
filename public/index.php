<?php

use App\Controller\ArticleController;

session_start();

// require_once __DIR__ . "/../vendor/autoload.php";
// require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";

require_once implode(DIRECTORY_SEPARATOR, [__DIR__, "..", "vendor", "autoload.php"]);
require_once implode(DIRECTORY_SEPARATOR, [__DIR__, "..", "config", "config.php"]);

// Récupérer la uri/url
$uri = filter_input(INPUT_SERVER, "REQUEST_URI");

//$router = new App\Router($_GET['url']);

// $router->get('/posts', function() {echo 'Tous les articles'; });
// $router->get('/posts/:id', function($id) {echo 'Tous les article ' . $id;});
// $router->post('/posts/:id', function($id) {echo 'Poster pour l\'article ' . $id;});

// Envoyer l'uri au router
if (preg_match("#^/$#", $uri)) { // "/article"
    (new ArticleController())->index();
}

if(preg_match("#^/article/([0-9]+)/show$#", $uri, $matches)) {

    (new ArticleController())->show($matches[1]);
}

if(preg_match("#^/article/new$#", $uri)) {
    (new ArticleController())->new();
}

if(preg_match("#^/article/([0-9]+)/edit$#", $uri, $matches)) {

    (new ArticleController())->edit($matches[1]);
}

if(preg_match("#^/article/([0-9]+)/delete$#", $uri, $matches)) {

    (new ArticleController())->delete($matches[1]);
}

// Appliquer l'action