<?php

require_once 'Routing.php';
require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/HobbyController.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('mainpage', 'HobbyController');
Routing::get('test', 'DefaultController');
Routing::get('messenger', 'DefaultController');
Routing::get('upgrade', 'DefaultController');
Routing::get('groups', 'DefaultController');
Routing::get('saved', 'DefaultController');
Routing::get('settings', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('logout', 'SecurityController');
Routing::post('addHobby', 'HobbyController');
Routing::post('register', 'SecurityController');
Routing::post('addUser', 'SecurityController');
Routing::get('add', 'DefaultController');


Routing::run($path);