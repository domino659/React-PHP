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

    public static function distributeCookie($id, $username)
    {
        // A REGARDER URGENT
        // ->->-> https://nouvelles.paxeditions.com/storage/app/media/uploaded-files/123481752_4259713964066981_2311521562410142096_n.jpg

        // TEMPORAIRE DESACIVE TOUT LES COOKIES
        // if (isset($_SERVER['HTTP_COOKIE'])) {
        //     $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        //     foreach($cookies as $cookie) {
        //         $parts = explode('=', $cookie);
        //         $name = trim($parts[0]);
        //         setcookie($name, '', time()-1000);
        //         setcookie($name, '', time()-1000, '/');
        //     }
        // }
        $cookie = AuthorManager::getCookie($id);
        setcookie($username, $cookie['cookie'], time()+3600);
    }
    
}