<?php

namespace App\Manager;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;

class AuthorManager extends BaseManager
{
  
    //GET ALL AUTHOR
    /**
     * @return Author[]
     */
    public static function getAllAuthor(): array
    {
        $requeteSql = "SELECT * FROM author";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->execute();
        $result = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        $authors = [];
        foreach ($result as $author) {
            $authors[] = new Author($author);
        }
        return $authors;
    }

    //GET AUTHOR BY ID
    public static function getAuthorById($id)
    {
        $requeteSql = "SELECT * FROM author WHERE id = :id";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':id', $id, \PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * @param Post $post
     * @return Post|bool
     */

    public static function createAuthor($username, $isAdmin, $password, $email)
    {
        $requeteSql = "INSERT INTO author (username, isAdmin, password, email) Values (:username, :isAdmin, :password, :email)";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':username', $username, \PDO::PARAM_STR);
        $prepare->bindValue(':isAdmin', $isAdmin, \PDO::PARAM_BOOL);
        $prepare->bindValue(':password', $password, \PDO::PARAM_STR);
        $prepare->bindValue(':email', $email, \PDO::PARAM_STR);
        $prepare->execute();
        return true;
    }

    public static function updateAuthor($id, $username, $email)
    {
        $requeteSql = "UPDATE author SET username = :username, email = :email  WHERE id = :id";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':id', $id, \PDO::PARAM_INT);
        $prepare->bindValue(':username', $username, \PDO::PARAM_STR);
        $prepare->bindValue(':email', $email, \PDO::PARAM_STR);
        $prepare->execute();
        return true;
    }

    public static function updateAuthorPassword($id, $password)
    {
        $requeteSql = "UPDATE author SET password = :password  WHERE id = :id";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':id', $id, \PDO::PARAM_INT);
        $prepare->bindValue(':password', $password, \PDO::PARAM_STR);
        $prepare->execute();
        return true;
    }

    public static function updateAuthoridAdmin($id, $isAdmin)
    {
        $requeteSql = "UPDATE author SET isAdmin = :isAdmin  WHERE id = :id";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':id', $id, \PDO::PARAM_INT);
        $prepare->bindValue(':isAdmin', $isAdmin, \PDO::PARAM_BOOL);
        $prepare->execute();
        return true;
    }

    /**
     * @param int $id
     * @return bool
     */

    public static function deleteAuthorById(int $id): bool
    {
        $requeteSql = "DELETE FROM author WHERE id = :id";
        $connexion = new PDOFactory();
        $prepare = $connexion->getMysqlConnection()->prepare($requeteSql);
        $prepare->bindValue(':id', $id, \PDO::PARAM_INT);
        $prepare->execute();
        return true;
    }
}