<?php

require_once 'AppController.php';
require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../repository/UserRepository.php';


class SecurityController extends AppController
{
    public function login(){
        $userRepository = new UserRepository();

        if($this->isPost()){
            return $this->login('login');
        }


        $login = $_POST['login'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($login);

        if(!$user){
            return $this->render('login', ["message"=>"User not exists"]);
        }


        if ($user->getName() !== $login){
            return $this->render('login', ["message"=>"User with this login not exists"]);
        }

        if($user->getPassword() !== $password){
            return $this->render('login', ["message"=>"Wrong password"]);
        }
        setcookie("user", "admin", time() + 86400);
        $_SESSION["user"] = "admin";

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/mainpage");
    }
}