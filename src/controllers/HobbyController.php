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
        if(!$this->isLogged()){
            return $this->render('login');
        }
        $hobbies = $this->hobbyRepository->getThreeHobbies();
        $this->render('hobbies',['hobbies' => $hobbies]);
    }


    public function addHobby(){
        if (is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $hobby = new Hobby(0, $_POST['title'], $_POST['description'], $_FILES['file']['name']);
            $this->hobbyRepository->addHobby($hobby);

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/hobbies");
        }
        return $this->render('add', ['messages' => $this->message]);
    }

    public function description($id){
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/description");
    }

    public function setStar(int $id){
        $this->hobbyRepository->setStar($id);
        http_response_code(200);
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
    public function save(int $id){
        $this->hobbyRepository->save($id);
        http_response_code(200);
    }
    public function remove(int $id){
        $this->hobbyRepository->remove($id);
        http_response_code(200);
    }
    public function saved(){
        if(!$this->isLogged()){
            return $this->render('login');
        }
        $hobbies = $this->hobbyRepository->getSavedHobbies();
        $this->render('saved',['hobbies' => $hobbies]);
    }
    public function search(){
        $hobbies = $this->hobbyRepository->getSavedHobbies();
        $this->render('search',['hobbies' => $hobbies]);
    }
    public function searchHobbies(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->hobbyRepository->getHobbyByTitle($decoded['search']));
        }
    }
}
