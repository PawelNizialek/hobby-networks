<?php
require_once 'Repository.php';

class StarRepository extends Repository
{
    public function setStar(int $id){
////        die("dziala");
//        $stmt = $this->database->connect()->prepare('
//            UPDATE hobbies SET "star" = "star" + 1 WHERE id = :id
//        ');
//        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
//        $stmt->execute();
//

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