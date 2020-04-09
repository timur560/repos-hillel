<?php

require_once 'vendor/autoload.php';

//$collection->deleteOne(['id' => 1]);

//$pdo = new PDO('mysql:host=mysql;port=3306;dbname=blog', 'root', 'secret');
//$usersRepository = new \App\Repository\User\PdoUserRepository($pdo);

//$client = new MongoDB\Client('mongodb://root:example@mongo:27017');
//$usersRepository = new \App\Repository\User\MongoUserRepository($client);

//$service = new \App\Service\FindUserService($usersRepository);
//$user = $service->execute(1);
//var_dump($user);

$requestStr = $_SERVER['REQUEST_METHOD'] . ' ' . $_SERVER['REQUEST_URI'];

//var_dump($requestStr);


// (new UsersController())->showAction();

//$routes = [
//    [
//        'path' => '/users',
//        'controller' => \App\Controller\UsersController::class,
//        'action' => 'show',
//        'method' => 'GET',
//    ],
//    [
//        'path' => '/posts',
//        'controller' => \App\Controller\PostsController::class,
//        'action' => 'show',
//        'method' => 'GET',
//    ],
//];

// preg_match_all('/(?<method>[A-Z]{3,6}) (?<path>\/[a-z\/\d]*)/', $requestStr, $parts);

//preg_match_all('/(?<method>[A-Z]{3,6}) \/(?<controller>[a-zA-Z]*)\/(?<action>[a-zA-Z]*)/', $requestStr, $parts);
//// /users/show
//
//$controllerName = 'App\\Controller\\' . ucfirst($parts['controller'][0]) . 'Controller';
//
//$methodName = $parts['action'][0] . 'Action';
//
//(new $controllerName)->$methodName();
//
////
//var_dump($controllerName, $methodName);

//foreach ($routes as $route) {
//    if ($route['path'] === $parts['path'][0] && $route['method'] === $parts['method'][0]) {
//        $controller = new $route['controller'];
//        $methodName = $route['action'] . 'Action';
//        $controller->$methodName();
//    }
//}

$reflectionClass = new ReflectionClass(\App\Controller\UsersController::class);

foreach ($reflectionClass->getMethods() as $method) {
    $docComment = $method->getDocComment();
    preg_match('/@Route\("(?<path>[a-z\/]+)"\)/', $docComment, $matches);

    if ($matches['path'] === $_SERVER['REQUEST_URI']) {
        $method->invoke($reflectionClass->newInstance());
        break;
    }
}

