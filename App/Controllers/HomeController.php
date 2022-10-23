<?php

namespace App\Controllers;
use App\Models\User;

class HomeController extends CoreController{

    private $user;

    public function __construct() 
    {
        parent::__construct();
        $this->user = new User();
    }

    /**
     * Display home page
     * @return User
     */
    public function home()
    {
        $users = $this->user->findAll();
        $user = $this->user->findById(1);

        echo $this->twig->render('home/index.html.twig', compact('users', 'user')); 
    }

    /**
     * Display create page
     * @return void
     */
    public function create()
    {

        $user = new User();
        $user->setFirstname('Jean');
        $user->setLastname('Claude');
        $user->setUsername('jeanclaude');
        $user->setEmail('user@user.fr');
        $user->setPassword('password');
        $user->setRole('ROLE_USER');
        $user->save();

        return header('Location: /');
        exit;

    }

    /**
     * Display update page
     * @return void
     */
    public function delete (array $params) 
    {

        $user = $this->user->findById($params['id']);
        $user->delete($params['id']);

        return header('Location: /');
        exit;
    }

    /**
     * Display update page
     * @return void
     */
    public function update (array $params) 
    {

        $user = $this->user->findById($params['id']);
        
        $user->setFirstname('Jean2');
        $user->setLastname('Claude2');
        $user->setUsername('jeanclaude2');
        $user->setEmail('user@user.fr');
        $user->setPassword('password');
        $user->setRole('ROLE_USER');

        $user->update($params['id']);

        return header('Location: /');
        exit;

    }    

}