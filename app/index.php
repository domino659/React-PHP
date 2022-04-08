<?php

require './vendor/autoload.php';

header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, HEAD');
header('Access-Control-Allow-Headers: authorization');

// echo json_encode([
//     // 'message' => $_SERVER,
//     // 'username' => $_SERVER['PHP_AUTH_USER']
// ]);

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Manager\AuthorManager;

$authorsList = AuthorManager::getAllAuthor();
$authors = [];
foreach($authorsList as $author){
    $authors[] = (array) $author;
}
echo(json_encode($authors));