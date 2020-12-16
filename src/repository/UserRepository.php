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
}