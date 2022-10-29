<?php
require_once 'DB.php';

class User
{
    private $id;
    private $name;
    private $password;
    private $email;
    private $role;

    protected $db, $table;

    public function __construct($name = null, $password = null, $email = null, $role = null)
    {
        $this->db = new DB();
        $this->table = "user";

        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }

    public function fetch($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        try {
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute(['email' => $email]);
            $row = $stm->fetch();
            if ($row) {
                $this->id = $row->id;
                $this->name = $row->name;
                $this->email = $row->email;
                $this->role = $row->role;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function fetchAll()
    {
        $sql = "SELECT * From users";
        try {
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute();
            $rows = $stm->fetchAll();

            $users = [];
            foreach ($rows as $row) {
                $user = new User($row->id, $row->name, $row->password, $row->email, $row->role);
                $users[] = $user;
            }
            return $users;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET name = :name, email = :email, role = :role WHERE id = :id";
        try {
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
                'id' => $this->id
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        try {
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute(['id' => $id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function register()
    {
        $sql = "INSERT INTO $this->table (name, password, email, role) VALUES(:name, :password, :email, :role)";
        try {
            $stm = $this->db->connect()->prepare($sql);
            $res = $stm->execute([
                'name' => $this->name,
                'password' => password_hash($this->password, PASSWORD_BCRYPT),
                'email' => $this->email,
                'role' => $this->role
            ]);
            if ($res) {
                $this->id = $this->db->connect()->lastInsertId();
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function login($email, $password)
    {
        $this->fetch($email);

        $res = password_verify($password, PASSWORD_BCRYPT);

        if ($res) {
            $_SESSION['auth'] = $this->id;
        }
    }

    public function logout()
    {
        unset($_SESSION['auth']);
        session_destroy();
    }

    public function getId()
    {
        return $this->id;
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

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
