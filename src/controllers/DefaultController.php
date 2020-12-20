<?php

    require_once 'AppController.php';

    class DefaultController extends AppController{

        public function index() {
            if (!isset($_SESSION["user"])){
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/mainpage");
            }
            $this->render('login');
        }

        public function mainpage() {
            $this->render('mainpage');
        }

        public function messenger() {
            $this->render('messenger');
        }

        public function test() {
            $this->render('test');
        }

        public function upgrade() {
            $this->render('upgrade');
        }

        public function groups() {
            $this->render('groups');
        }

        public function saved() {
            $this->render('saved');
        }

        public function settings() {
            $this->render('settings');
        }

        public function add() {
            $this->render('add');
        }
    }