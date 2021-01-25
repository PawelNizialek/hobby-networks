<?php
require_once 'AppController.php';
require_once __DIR__ .'/../model/Hobby.php';
require_once __DIR__.'/../repository/HobbyRepository.php';

class SavedController extends AppController
{
    private $hobbyRepository;

    public function __construct()
    {
        $this->hobbyRepository = new HobbyRepository();
    }
    public function saved(){

    }
}