<?php

namespace App\Fram\Factories;

use PDO;

class PDOFactory
{
    public static function getMysqlConnection()
    {
        $host = getenv('HOST');
        $dbname = getenv('DBNAME');

        $dsn = `mysql:host=${host};dbname=${dbname}`;
        $user = getenv('DATABASE_USER');;
        $pwd = getenv('DATABASE_PASSWORD');;
        try {
             return  new PDO($dsn, $user, $pwd);
         } catch (Exception $e) {
             die('Erreur : ' . $e->getMessage());
         }
    }
}