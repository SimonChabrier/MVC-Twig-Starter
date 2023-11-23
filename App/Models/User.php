<?php

namespace App\Models;
use App\Utils\PdoConnect;
use PDO;
use DateTime;
class User extends CoreModel {

    private int $id;
    private string $firstname;
    private string $lastname;
    private string $username;
    private string $email;
    private string $password;
    private string $role;
    private $created_at;
    private $updated_at;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set the value of id
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }
    /**
     * Set the value of firstname
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }


    // Méthodes de CoreModel
    
    public function findById(int $id) {

        $pdo = PdoConnect::getPDO();

        $query = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $query->execute(['id' => $id]);
        $result = $query->fetchObject(self::class);
        return $result;
    }

    public function findAll() {

        $pdo = PdoConnect::getPDO();

        $query = $pdo->prepare('SELECT * FROM users');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS, self::class);
      
        return $result;
    }

    public function save(){

        $pdo = PdoConnect::getPDO();

        $query = $pdo->prepare(
                "INSERT INTO `users` (firstname, lastname, username, email, password, role) 
                VALUES (:firstname, :lastname, :username, :email, :password, :role)"
            );
    
            $query->bindValue(':firstname', $this->firstname);
            $query->bindValue(':lastname', $this->lastname);
            $query->bindValue(':username', $this->username);
            $query->bindValue(':email', $this->email);
            $query->bindValue(':password', $this->password);
            $query->bindValue(':role', $this->role);
            
            $query->execute();
    
            $this->id = $pdo->lastInsertId();
            return $this;
    }

    public function update(int $id) {

        $pdo = PdoConnect::getPDO();
        
        $query = $pdo->prepare('UPDATE `users` SET `firstname` = :firstname, `lastname` = :lastname, `username` = :username, `email` = :email, `password` = :password, `role` = :role WHERE id = :id');
        
        $query->bindValue(':firstname', $this->firstname);
        $query->bindValue(':lastname', $this->lastname);
        $query->bindValue(':username', $this->username);
        $query->bindValue(':email', $this->email);
        $query->bindValue(':password', $this->password);
        $query->bindValue(':role', $this->role);
        $query->bindValue(':id', $id);
        
        $query->execute();

        return $this;

    }

    public function delete(int $id) {
        $pdo = PdoConnect::getPDO();
        $query = $pdo->prepare('DELETE FROM users WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
    }



}