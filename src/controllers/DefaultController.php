<?php

    require_once 'AppController.php';

    class DefaultController extends AppController{

        public function index() {
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
    }