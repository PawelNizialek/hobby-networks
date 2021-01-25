<?php

require_once 'Routing.php';
require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/HobbyController.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('hobbies', 'HobbyController');
Routing::get('test', 'DefaultController');
Routing::get('messenger', 'DefaultController');
Routing::get('upgrade', 'DefaultController');
Routing::get('groups', 'DefaultController');
Routing::get('saved', 'HobbyController');
Routing::get('settings', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('addHobby', 'HobbyController');
Routing::get('add', 'DefaultController');
Routing::get('logout', 'SecurityController');
Routing::get('', 'HobbyController');
Routing::get('setStar', 'StarController');
Routing::get('save', 'HobbyController');
Routing::get('remove', 'HobbyController');
Routing::get('description', 'HobbyController');
Routing::get('setRole', 'SecurityController');
Routing::get('search', 'HobbyController');
Routing::get('searchHobbies', 'HobbyController');


Routing::run($path);