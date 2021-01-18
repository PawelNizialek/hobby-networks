<?php

require_once 'AppController.php';
require_once __DIR__ .'/../model/Hobby.php';
require_once __DIR__.'/../repository/HobbyRepository.php';

class HobbyController extends AppController {

    const MAX_FILE_SIZE = 800*800;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/upload/';

    private $hobbyRepository;

    public function __construct()
    {
            $this->hobbyRepository = new HobbyRepository();
    }

    public function hobbies() {
        $hobbies = $this->hobbyRepository->getHobbies();
        $this->render('mainpage',['hobbies' => $hobbies]);
    }


    public function addHobby(){
//        echo $_FILES['file']['tmp_name'];
        if (is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $hobby = new Hobby($_POST['title'], $_POST['description'], $_FILES['file']['name']);
            $this->hobbyRepository->addHobby($hobby);


            return $this->render('mainpage', ['messages' => $this->message, 'hobby'=>$hobby]);
        }
        return $this->render('add', ['messages' => $this->message]);
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }

}
