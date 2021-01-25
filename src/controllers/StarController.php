<?php
require_once 'AppController.php';
require_once __DIR__.'/../repository/StarRepository.php';

class StarController extends AppController
{
    private $starRepository;
    public function __construct()
    {
        $this->starRepository = new StarRepository();
    }
    public function setStar(int $id){
        $this->starRepository->setStar($id);
        http_response_code(200);
    }
}