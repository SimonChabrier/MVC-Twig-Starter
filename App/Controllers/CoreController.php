<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;


abstract class CoreController {

    private $loader;
    protected $twig;
    
    public function __construct() {

        $this->loader = new FilesystemLoader(ROOT . '/templates'); // Twig Loader
        $this->twig = new Environment($this->loader, ['debug' => true]); // Twig Environment
        $this->twig->addExtension(new DebugExtension()); // To use dump() in twig - need to set debug parameter to true
    }

}