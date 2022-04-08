<?php

require './vendor/autoload.php';

use App\Fram\Factories\PDOFactory;
use App\Controller\AuthorController;

header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, HEAD');
header('Access-Control-Allow-Headers: authorization');

// $token = md5(time() . mt_rand());
// var_dump($token);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'POST' && $_POST['action'] == 'login':
    $answer = AuthorController::executeUserLogin($_SERVER['PHP_AUTH_USER']);
    
    echo json_encode([
      'server' => $_SERVER,
      'mail' => $_SERVER['PHP_AUTH_USER'],
      'password' => $_SERVER['PHP_AUTH_PW'],
      'body' => $_POST['action'],
      'answer' => $answer
  ]);
}

