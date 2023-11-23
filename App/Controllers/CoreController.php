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

    // add a token in user session
    protected function addTokenInSession($token) {
        $_SESSION['token'] = $token;
    }

    // get token from user session
    protected function getTokenFromSession() {
        return $_SESSION['token'];
    }

    // check if token in user session is the same as the one in the form
    protected function checkToken($token) {
        return $token === $this->getTokenFromSession();
    }

    // generate a token
    protected function generateToken() {
        return bin2hex(random_bytes(32));
    }

    // acl 
    protected function checkAuthorization() {
        if (empty($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }
    }

    

}