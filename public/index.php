<?php

require_once __DIR__ . './../vendor/autoload.php';

use app\controllers\AboutController;
use app\controllers\SiteController;
use app\core\Application;

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];



$app = new Application(dirname(__DIR__), $config);

// echo($app->name . " cong chuoi");

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/register', [SiteController::class, 'register']);
$app->router->post('/register', [SiteController::class, 'register']);
$app->router->get('/login', [SiteController::class, 'login']);
$app->router->post('/login', [SiteController::class, 'login']);
$app->router->get('/logout', [SiteController::class, 'logout']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/about', [AboutController::class, 'index']);
$app->router->get('/profile', [SiteController::class, 'profile']);





// $app->on(Application::EVENT_BEFORE_REQUEST, function(){
//     echo "Su kien xay ra truoc khi truy cap trang about";
// });

$app->run();

