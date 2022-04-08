<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Manager\AuthorManager;

class AuthorController extends BaseController
{
    /**
     * Show all Authors
     */
    public static function executeGetAuthor()
    {
        $authorsList = AuthorManager::getAllAuthor();
        $authors = [];
        foreach($authorsList as $author){
            $authors[] = (array) $author;
        }
        echo(json_encode($authors));
    }

    public static function executeUserLogin($email)
    {
        $author = AuthorManager::userLogin($email);
        // echo(json_encode($author));


        return $author;
    }

    public static function distributeToken($username)
    {
        $token = AuthorManager::getToken($username);
        return $token['token'];
    }

    public static function checkToken($username)
    {
        $token = AuthorManager::getToken($username);
        return $token['token'];
    }
    
}