<?php

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: authorization');

// var_dump(getallheaders());

echo json_encode([
    'message' => $_SERVER,
    // 'message' => $_POST
]);

// echo json_encode([
//     'username' => $_SERVER['PHP_AUTH_USER'],
//     'password' => $_SERVER['PHP_AUTH_PW']
// ]);