<?php

namespace App\Fram\Factories;

use PDO;

class PDOFactory
{
    public static function getMysqlConnection()
    {
        $dsn = `mysql:host=${host};dbname=${dbname}`;
        $user = `${user}`;
        $pwd = `${pwd}`;
        try {
             return  new PDO($dsn, $user, $pwd);
         } catch (Exception $e) {
             die('Erreur : ' . $e->getMessage());
         }
    }
}

// A refaire nom de data et proteger dns user pwd