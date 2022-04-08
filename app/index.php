<?php

require './vendor/autoload.php';

use App\Fram\Factories\PDOFactory;
use App\Controller\AuthorController;

header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, HEAD');
header('Access-Control-Allow-Headers: authorization');

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
  case 'POST' && $_POST['action'] == 'login':
    $answer = AuthorController::executeUserLogin($_SERVER['PHP_AUTH_USER']);
    $cookie = AuthorController::distributeCookie($answer['id'], $answer['username']);
    echo json_encode([
      'test' => $answer['email'],
      'COOKIE' => $_COOKIE,
      'server' => $_SERVER,
      'mail' => $_SERVER['PHP_AUTH_USER'],
      'password' => $_SERVER['PHP_AUTH_PW'],
      'body' => $_POST['action'],
      'answer' => $answer
  ]);
  // case 'POST' && $_POST['action'] == 'checkCookie':
}

