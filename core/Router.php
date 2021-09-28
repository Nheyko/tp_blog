<?php

// Avec l'uri
// on récupère l'action du controller qui est lié

namespace App;

class Router {

    private $routes = [];

    public function __construct(private $url)
    {
        
    }

    public function get($path, $callabale) {
        $route = new Route($path, $callabale);
        // On pousse la nouvelle route dans un tableau
        $this->routes['GET'][] = $route;
    }

    public function post($path, $callabale) {
        $route = new Route($path, $callabale);
        // On pousse la nouvelle route dans un tableau
        $this->routes['POST'][] = $route;
    }
    
}

// Appliquer l'action