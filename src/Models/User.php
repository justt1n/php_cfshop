<?php

namespace MVC\Models;

use PDO;
use MVC\Core\PDOFactory;

class User
{
    private $pdo;
    private $id = -1;
    private $username;
    private $fullname;
    private $phone;
    private $password;
    private $password_hash;
    private $notes;
    private $created_at;
    private $updated_at;
    private $errors = [];
    public function __construct()
    {
        $this->pdo = PDOFactory::create();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserName()
    {
        return $this->username;
    }

    public function getFullName()
    {
        return $this->fullname;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function fill($user)
    {
        [
            'username' => $this->username,
            'fullname' => $this->fullname,
            'phone' => $this->phone,
            'password' => $this->password
        ] = $user;

        return $this;
    }

    public function fillFormDB($user)
    {
        [
            'id' => $this->id,
            'username' => $this->username,
            'fullname' => $this->fullname,
            'password_hash' => $this->password_hash,
            'phone' => $this->phone,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ] = $user;

        return $this;
    }
    public static function getAllUser()
    {
        $users = [];

        $statement = PDOFactory::create()->prepare('select * from users');
        $statement->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $user = new User();
            $user->fillFormDB($row);
            $users[] = $user;
        }
        return $users;
    }

    public function save()
    {
        $result = false;
        $this->hashPassword();
        if ($this->id >= 0) {
            $statement = $this->pdo->prepare('UPDATE users SET username = :username, fullname = :fullname, phone:=phone, password_hash = :password_hash, update_at = now() WHERE id=:id');
            $statement->execute([
                'username' => $this->username,
                'fullname' => $this->fullname,
                'phone' => $this->phone,
                'password_hash' => $this->password_hash,
                'id' => $this->id
            ]);
        } else {
            $statement = $this->pdo->prepare('INSERT INTO users(username, fullname, phone, password_hash, created_at, updated_at) VALUES (:username, :fullname, :phone, :password_hash, now(), now())');
            $statement->execute([
                'username' => $this->username,
                'fullname' => $this->fullname,
                'phone' => $this->phone,
                'password_hash' => $this->password_hash
            ]);
            $this->id = $this->pdo->lastInsertId();
        }

    }
    public function validate()
    {
        if (strlen(trim($this->username)) < 1) {
            $this->errors[] = "Username không hợp lệ";
        }

        if (strlen(trim($this->fullname)) < 1) {
            $this->errors[] = "Fullname không hợp lệ";
        }
        if (!preg_match('/^(0|84)(2(0[3-9]|1[0-6|8|9]|2[0-2|5-9]|3[2-9]|4[0-9]|5[1|2|4-9]|6[0-3|9]|7[0-7]|8[0-9]|9[0-4|6|7|9])|3[2-9]|5[5|6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])([0-9]{7})$/', $this->phone)) {
            $this->errors[] = "Số điện thoại không hợp lệ";
        }
        if (strlen($this->password) < 8) {
            $this->errors[] = "Password phải có ít nhất 8 kí tự";
        }
    }

    public function checkUsernameExists($username)
    {
        return $this->findByUsername($username) ? true : false;
    }

    public function checkPhoneExists($phone)
    {
        return $this->findByPhone($phone) ? true : false;
    }

    public function findByUsername($username)
    {
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
        $statement->execute([
            'username' => $username
        ]);

        if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $this->fillFormDB(($row));
            return $this;
        }
        return false;
    }

    public function findByPhone($phone)
    {
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE phone = :phone LIMIT 1');
        $statement->execute([
            'phone' => $phone
        ]);

        if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $this->fillFormDB(($row));
            return $this;
        }
        return false;
    }

    public function findById($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
        $statement->execute([
            'id' => $id
        ]);

        if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $this->fillFormDB(($row));
            return $this;
        }
        return false;
    }

    public function hashPassword()
    {
        $this->password_hash = password_hash($this->password, PASSWORD_DEFAULT);
        return $this;
    }

    public function authenticate($username, $password)
    {
        if ($this->findByUsername($username)) {
            if (password_verify($password, $this->password_hash)) {
                return $this;
            }
        }
        return false;
    }

    public function updateFullName($fullname)
    {
        $statement = $this->pdo->prepare('UPDATE users SET fullname = :fullname WHERE id = :id');
        $statement->execute([
            'fullname' => $fullname,
            'id' => $this->id
        ]);
        return $this;
    }

    public function updatePhone($phone)
    {
        $statement = $this->pdo->prepare('UPDATE users SET phone = :phone WHERE id = :id');
        $statement->execute([
            'phone' => $phone,
            'id' => $this->id
        ]);
        return $this;
    }

    public function updatePasswordHash($password_hash)
    {
        $statement = $this->pdo->prepare('UPDATE users SET password_hash = :password_hash WHERE id = :id');
        $statement->execute([
            'password_hash' => $password_hash,
            'id' => $this->id
        ]);
        return $this;
    }
}