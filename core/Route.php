<?php

namespace App;

class Route {

    public function __construct(private $path, private $callable)
    {
        
    }
}