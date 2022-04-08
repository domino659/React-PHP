<?php

require './vendor/autoload.php';

use App\Fram\Factories\PDOFactory;
use App\Controller\AuthorController;

header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: POST, GET, HEAD');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: authorization');

$date = (time()+3600);

$method = $_SERVER['REQUEST_METHOD'];
switch (true) {
  case  $method == 'POST' && $_POST['action'] == 'checkToken' && isset($_POST['token']) && $_POST['token'] != "":
    $request_token = $_POST['token'];
    $fullToken = explode("=", $request_token);
    $username = $fullToken[0];
    $front_token = $fullToken[1];

    $back_token = AuthorController::checkToken($username);
    
    if ($back_token == $front_token)
      echo json_encode([
        'statue' => "true",
      ]);
    else
      echo json_encode([
        'statue' => "false",
      ]);
    
    break;
  case $method == 'POST' && $_POST['action'] == 'login':
    
    $answer = AuthorController::executeUserLogin($_SERVER['PHP_AUTH_USER']);
    $token = AuthorController::distributeToken($answer['username']);
    
    header("Set-Cookie: {$answer['username']}={$token}; EXPIRES{$date};");

    echo json_encode([
      'answer' => $answer,
      'cookie' => $_COOKIE,
      'server' => $_SERVER
    ]);
    break;
  default:
    echo json_encode([
      'log' => "Error, no condition was fulfilled.",
    ]);
}

