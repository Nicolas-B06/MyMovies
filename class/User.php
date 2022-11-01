<?php

namespace MyMovies;

use Exception;

require_once 'Connection.php';

class User
{
    private $id;
    private $name;
    private $password;
    private $email;
    private $role;

    public function __construct($id = null, $password = null, $name = null, $email = null, $role = null)
    {
        $this->$id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }
}
