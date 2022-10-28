<?php
require_once 'DB.php';

class User
{
    private $id;
    private $name;
    private $password;
    private $email;
    private $role;

    public function __construct($id, $name, $password, $email, $role)
    {   
        $this->db = new DB();
        $this->table = "users";

        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }

    public function insert()
    {
        $sql = "INSERT INTO $this->table (name, password, email, role) VALUES(:name, :password, :email, :role)";
        try {
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute(['name' => $this->name, 'password' => $this->password, 'email' => $this->email, 'role' => $this->role]);
            $this->id = $this->db->connect()->lastInsertId();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function fetch($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        try {
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute(['id' => $id]);
            $row = $stm->fetch();

            $this->id = $row->id;
            $this->name = $row->name;
            $this->password = $row->password;
            $this->email = $row->email;
            $this->role = $row->role;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function fetchAll()
    {
        $sql ="SELECT * From users";
        try {
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute();
            $rows = $stm->fetchAll();
            return $rows;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update($id)
    {
        $sql = "UPDATE $this->table SET name = :name, password = :password, email = :email, role = :role WHERE id = :id";
        try {
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute(['name' => $this->name, 'password' => $this->password, 'email' => $this->email, 'role' => $this->role, 'id' => $id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete($id)
    {
        $sql="DELETE FROM $this->table WHERE id = :id";
        try {
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute(['id' => $id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function getId()
    {
        return $this->id;
    }

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
    public function getPassword()
    {
        return $this->password;
    }
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
   
