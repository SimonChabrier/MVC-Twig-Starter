<?php

namespace App\Controllers;
use App\Models\User;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;


class HomeController extends CoreController{

    public function __construct() 
    {
        parent::__construct();
        $this->user = new User();
    }


    /**
     * route /
     * Display home page
     * @return User
     */
    public function home()
    {
        $users = $this->user->findAll();
        $user = $this->user->findById(3);

        echo $this->twig->render('home/index.html.twig', compact('users', 'user')); 
    }

    /**
     * route /create
     * Display create page
     * @return void
     */
    public function create()
    {
        $user = new User();
    
        $user->setFirstname('John')
        ->setLastname('Doe')
        ->setUsername('johndoe')
        ->setEmail('user@user.fr')
        ->setPassword(password_hash('password', PASSWORD_DEFAULT))
        ->setRole('ROLE_USER')
       
        ->save();
        
        header('Location: /');
        exit();
        // $response = new RedirectResponse('/', 301);
        // return $response->send();
    }

    /**
     * route /delete/{id}
     * Display update page
     * @return void
     */
    public function delete (array $params) 
    {

        $this->user->findById($params['id']);
        $this->user->delete($params['id']);

        $response = new RedirectResponse('/', 301);
        return $response->send();
    }

    /**
     * route /update/{id}
     * Display update page
     * @return void
     */
    public function update (array $params) 
    {

        $this->user->findById($params['id'])

        ->setFirstname('Jean2')
        ->setLastname('Claude2')
        ->setUsername('jeanclaude2')
        ->setEmail('user@user.fr')
        ->setPassword(password_hash('password', PASSWORD_DEFAULT))
        ->setRole('ROLE_USER')

        ->update($params['id']);

        $response = new RedirectResponse('/', 301);
        return $response->send();

    }    

    /**
     * route /json
     * Send json users
     * @return json
     */
    public function sendJsonUsers()
    {
        foreach ($this->user->findAll() as $user) {

            $users[] = [
                'id' => $user->getId(),
                'firstname' => $user->getFirstname(),
                'lastname' => $user->getLastname(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'role' => $user->getRole(),
            ];
        }
        
        $response = new JsonResponse(['users' => $users]);
        return $response->send();
    }

    /**
     * route /json/{id}
     * Send json user
     * @return json
     */
    public function sendJsonUser(array $params)
    {
        $user = $this->user->findById($params['id']);

        $user = [
            'id' => $user->getId(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole(),
        ];

        $response = new JsonResponse(['user' => $user]);
        return $response->send();
    }
}