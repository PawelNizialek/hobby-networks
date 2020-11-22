<?php

require_once 'AppController.php';
require_once __DIR__.'/../model/User.php';


class SecurityController extends AppController
{
    public function login(){
        $user = new User("admin", "admin", "admin", "admin");

        if($this->isPost()){
            return $this->login('login');
        }


        $login = $_POST['login'];
        $password = $_POST['password'];

        if ($user->getName() !== $login){
            return $this->render('login', ["message"=>"User with this login not exists"]);
        }

        if($user->getPassword() !== $password){
            return $this->render('login', ["message"=>"Wrong password"]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/mainpage");
    }
}