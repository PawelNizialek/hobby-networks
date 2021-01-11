<?php

require_once 'Repository.php';
require_once __DIR__.'/../model/Hobby.php';

class HobbyRepository extends Repository{
    public function getHobby(int $id): ?Hobby
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM project WHERE id = :id
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
            $hobby['image']
        );
    }

    public function addHobby(Hobby $hobby): void{
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO hobbies (title, description, created_at, id_assigned_by, image) 
            VALUES (?, ?, ?, ?, ?)
        ');

        $assignedById = 1;

        $stmt->execute([
            $hobby -> getTitle(),
            $hobby -> getDescription(),
            $date -> format('Y-m-d'),
            $assignedById,
            $hobby->getImage()

        ]);
    }
    public function getHobbies(): array{
        $result = [];

        $stmt = $this->database->connect()->prepare('
            select * from hobbies
        ');
        $stmt->execute();
        $hobbies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($hobbies as $hobby) {
            $result[] = new Hobby(
              $hobby['title'],
              $hobby['description'],
              $hobby['image']
            );
        }

        return $result;
    }
}