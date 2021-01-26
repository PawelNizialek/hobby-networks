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
        $userRepository = new UserRepository();

        $login = $_POST['login'];
        $password = $_POST['password'];

        $password = md5($password);

        $user = $userRepository->getUser($login);

        if(!$user){
            return $this->render('login', ["message"=>"User not exists"]);
        }


        if ($user->getName() !== $login){
            return $this->render('login', ["message"=>"User with this login not exists"]);
        }

        if($password !== $user->getPassword()){
            return $this->render('login', ["message"=>"Wrong password"]);
        }
        setcookie("user", "admin", time() + 86400);
        $_SESSION["user"] = $user->getName();
        $_SESSION["user-id"] = $user->getId();
        $_SESSION["user-role"] = $user->getRole();

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
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $user = new User($email, md5($password), $name, $firstname, $lastname,0);

        $userRepository = new UserRepository();
        if($userRepository->addUser($user)==null){
            return $this->render('register', ['messages' => ['already exists']]);
        }

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
    public function logout(){
        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }
    public function setRole($role){
        $userRepository = new UserRepository();
        $userRepository->setRole($role);
        return $this->render('upgrade', ["message"=>"Congratulations you have a premium account!"]);
    }
}