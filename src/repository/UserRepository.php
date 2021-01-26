<?php

require_once 'Repository.php';
require_once __DIR__.'/../model/User.php';

class UserRepository extends Repository{
    public function getLoggedUserId($user){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email AND password = :password
        ');
        $email = $user->getEmail();
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $password = $user->getPassword();
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }
    public function setRole(){
        $loggedUser = $_SESSION["user-id"];
        $newRole = "premium";
        $_SESSION['user-role'] = $newRole;
        $stmt = $this->database->connect()->prepare('
            UPDATE users_details SET role = :newRole from public.users u 
            JOIN users_details ud on u.id_user_details=ud.id where u.user_id=:loggedUser
        ');
        $stmt->bindParam(':loggedUser', $loggedUser, PDO::PARAM_INT);
        $stmt->bindParam(':newRole', $newRole, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users u JOIN users_details ud on u.id_user_details=ud.id WHERE name = :name;
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
            $user['name'],
            $user['firstname'],
            $user['lastname'],
            $user['user_id'],
            $user['role']
        );
    }
    public function addUser(User $user){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users u JOIN users_details ud on u.id_user_details=ud.id WHERE name = :username;
        ');
        $name = $user->getName();
        $stmt->bindParam(':username', $name, PDO::PARAM_STR);
        $stmt->execute();

        $searchedUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($searchedUser == true) {
            return null;
        }

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_details (role, points, created_at, firstname, lastname)
            VALUES (?, ?, ?, ?, ?)
        ');
        $date = new DateTime();
        $stmt->execute([
            "user",
            0,
            $date->format('Y-m-d'),
            $user->getFirstname(),
            $user->getLastname()
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (name, email, password, id_user_details, enabled)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $name,
            $user->getEmail(),
            $user->getPassword(),
            $this->getUserDetailsId($user),
            true
        ]);
        return true;
    }
    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_details WHERE firstname = :firstname AND lastname = :lastname
        ');
        $firstname = $user->getFirstname();
        $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $lastname = $user->getLastname();
        $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }
}