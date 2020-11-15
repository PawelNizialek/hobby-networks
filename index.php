<?php

require_once 'Routing.php';
require_once 'src/controllers/DefaultController.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('mainpage', 'DefaultController');
Routing::run($path);