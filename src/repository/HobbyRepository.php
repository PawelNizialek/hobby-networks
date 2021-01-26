<?php

require_once 'Repository.php';
require_once __DIR__.'/../model/Hobby.php';

class HobbyRepository extends Repository{
    const USER_ROLE = "user";
    public function getHobby(int $id): ?Hobby
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.hobbies WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $hobby = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($hobby == false) {
            return null;
        }

        return new Hobby(
            $hobby['title'],
            $hobby['description'],
            $hobby['image'],
            0
        );
    }

    public function addHobby(Hobby $hobby): void {
        $date = new DateTime();
        $assignedById = $_SESSION['user-id'];
        $stmt = $this->database->connect()->prepare('
            INSERT INTO hobbies (title, description, image, created_at, id_assigned_by)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $hobby->getTitle(),
            $hobby->getDescription(),
            $hobby->getImage(),
            $date->format('Y-m-d'),
            $assignedById,
        ]);
    }

    public function getHobbies(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM hobbies
        ');
        $stmt->execute();
        $hobbies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($hobbies as $hobby){
            $result[] = new Hobby(
                $hobby['title'],
                $hobby['description'],
                $hobby['image'],
                $hobby['star']
            );
        }

        return $result;
    }
    public function getThreeHobbies(): array
    {
        $result = [];
        $loggedUserId = $_SESSION['user-id'];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM hobbies h JOIN users u on h.id_assigned_by=u.user_id 
            where id_assigned_by != :loggedUserId 
            order by random() limit 3;
        ');
        $stmt->bindParam(":loggedUserId", $loggedUserId, PDO::PARAM_INT);
        $stmt->execute();
        $hobbies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($hobbies as $hobby){
            $result[] = new Hobby(
                $hobby['id'],
                $hobby['title'],
                $hobby['description'],
                $hobby['image'],
                $hobby['star'],
                $hobby['name'],
                $hobby['created_at']
            );
        }

        return $result;
    }
    public function setStar(int $id){
        $stmt = $this->database->connect()->prepare('
            UPDATE hobbies SET "star" = "star" + 1 WHERE id = :id
        ');
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
            INSERT INTO stars (id_user, id_assigned_by)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $_SESSION["user-id"],
            $id,
        ]);
        die($_SESSION['id-user']);
    }
    public function save($id){
        $loggedUser = $_SESSION["user-id"];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_hobbies WHERE id_user = :loggedUser and id_project = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':loggedUser', $loggedUser, PDO::PARAM_STR);
        $stmt->execute();

        $savedHobby = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($savedHobby == true) {
            return null;
        }
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT *  FROM public.users_hobbies uh JOIN hobbies h on uh.id_project=h.id  where uh.id_user = :loggedUser;
        ');
        $stmt->bindParam(':loggedUser', $loggedUser, PDO::PARAM_STR);
        $stmt->execute();
        $hobbies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($hobbies)==3 && $_SESSION['user-role']==USER_ROLE){
            return null;
        }

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_hobbies (id_user, id_project)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $_SESSION["user-id"],
            $id,
        ]);
    }
    public function remove($id){
        $loggedUser = $_SESSION["user-id"];
        $stmt = $this->database->connect()->prepare('
            Delete FROM public.users_hobbies WHERE id_user = :loggedUser and id_project = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':loggedUser', $loggedUser, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getSavedHobbies(){
        $loggedUser = $_SESSION["user-id"];
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT *  FROM public.users_hobbies uh JOIN hobbies h on uh.id_project=h.id  where uh.id_user = :loggedUser;
        ');
        $stmt->bindParam(':loggedUser', $loggedUser, PDO::PARAM_STR);
        $stmt->execute();
        $hobbies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($hobbies as $hobby){
            $result[] = new Hobby(
                $hobby['id'],
                $hobby['title'],
                $hobby['description'],
                $hobby['image'],
                $hobby['star'],
                $hobby['name'],
                $hobby['created_at']
            );
        }

        return $result;
    }
    public function getHobbyByTitle(string $searchString){
        $searchString = '%'.strtolower($searchString).'%';
        $stmt = $this->database->connect()->prepare('
            select * from hobbies where lower(title) like :search or lower(description) like :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}