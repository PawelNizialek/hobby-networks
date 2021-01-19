<?php
session_start();
require_once 'AppController.php';
require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../repository/UserRepository.php';


class SecurityController extends AppController
{
    public function login(){
        if (!$this->isPost()) {
            return $this->render('login');
        }
//        $url = "http://$_SERVER[HTTP_HOST]";
//        header("Location: {$url}/hobbies");

        $userRepository = new UserRepository();

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
        $_SESSION["user"] = $user->getName();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/hobbies");
    }
    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        //TODO try to use better hash function
        $user = new User($email, md5($password), $name, $surname);
        $user->setPhone($phone);

        $userRepository = new UserRepository();
        $userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}