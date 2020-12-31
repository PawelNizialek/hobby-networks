<?php
session_start();

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

//        $cookie_name = "user";
//        $cookie_value = "John Doe";
//        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

        $_SESSION['name'] = $login;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/mainpage");
    }
    public function register(){
        return $this->render('register');
    }
    public function addUser(){
        $email = $_POST['e-mail'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $userRepository = new UserRepository();
        $userRepository->setUser($name, $email, $password);
        $this->render('login');
    }
    public function logout(){
//        setcookie("user", "John Doe", time() - (86400 * 30), "/"); // 86400 = 1 day
        session_destroy();
        unset($_SESSION['name']);
        return $this->render('login');
    }
}