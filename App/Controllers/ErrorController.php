<?php

namespace App\Controllers;

class ErrorController extends CoreController
{
    public function __construct() 
    {
        parent::__construct();
    }

    /**
     * Méthode gérant l'affichage de la page 404
     * @return void
     */
    public function error404()
    {   
        header('HTTP/1.0 404 Not Found');
        echo $this->twig->render('error/404.html.twig');
        exit();
        
    }

    /**
     * Méthode gérant une 403
     * @return void
     */
    public function err403()
    {
        header('HTTP/1.1 403 Forbidden');
        echo $this->twig->render('error/403.html.twig');
        exit();
    }
}
