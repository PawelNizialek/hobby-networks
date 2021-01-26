<?php
require_once 'Repository.php';

class StarRepository extends Repository
{
    public function setStar(int $id){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO stars (id_user, id_assigned_by)
            VALUES (?, ?)
        ');
        $stmt->execute([
            $_SESSION["user-id"],
            $id,
        ]);
    }
    public function getStar(int $id){

    }
}