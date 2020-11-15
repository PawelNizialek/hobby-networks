<?php

    require_once 'AppController.php';

    class DefaultController extends AppController{

        public function index() {
            die("index method");
        }

        public function mainpage() {
            die("mainpage method");
        }
    }