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
    public function executeGetAuthor()
    {
        $authorsList = AuthorManager::getAllAuthor();
        $authors = [];
        foreach($authorsList as $author){
            $authors[] = (array) $author;
        }
        echo(json_encode($authors));
    }
}