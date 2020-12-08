<?php
require './../autoload.php';


$app = new core\App();

$app->startApp();

$app->route([
    '/' => 'HelloController@index',
    '/hello/<name>' => 'HelloController@hello',
    '/login' => 'UserController@login'
]);

