<?php

require_once 'Repository.php';
require_once __DIR__.'/../model/User.php';

class UserRepository extends Repository{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE name = :name
        ');
        $stmt->bindParam(':name', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name']
        );
    }
    public function setUser(string $name, string $email, string $password){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password)
            VALUES ()
        ');

        //TODO you should get this value from logged user session
        $assignedById = 10;

        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}