<?php

namespace App\Dao;

use App\Model\Article;
use PDO;

class ArticleDao implements ArticleDaoInterface
{
    public function getAll(): array
    {
        // Requeter la BDD
        $pdo = new PDO(
            "mysql:host=localhost;dbname=blog;charset=UTF8",
            "root",
            "root",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
        // pour récupérer tous les articles

        $req = $pdo->query("SELECT * FROM article");
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        // Parser les données récupérer
        // et en faire un tableau d'Article
        foreach ($result as $key => $article) {
            $result[$key] = (new Article())->setId($article['id'])
                ->setTitle($article['title'])
                ->setContent($article['content'])
                ->setCreatedAt($article['created_at']);
        }

        return $result;
    }

    public function getById(int $id): Article
    {
        // Requeter la BDD
        $pdo = new PDO(
            "mysql:host=localhost;dbname=blog;charset=UTF8",
            "root",
            "root",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
        // pour récupérer tous les articles

        $req = $pdo->prepare("SELECT * FROM article WHERE id = :id");
        $req->execute(array(
            ":id" => $id
        ));
        $result = $req->fetch(PDO::FETCH_ASSOC);

        $article = (new Article())->setId($result['id'])
            ->setTitle($result['title'])
            ->setContent($result['content'])
            ->setCreatedAt($result['created_at']);

        return $article;
    }

    public function new(Article $article): void
    {
        // Requeter la BDD
        $pdo = new PDO(
            "mysql:host=localhost;dbname=blog;charset=UTF8",
            "root",
            "root",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );

        $req = $pdo->prepare("INSERT INTO article (title, content) VALUES (:title,:content)");
        $req->execute(array(
            ":title" => $article->getTitle(),
            ":content" => $article->getContent()
        ));
    }

    public function edit(Article $article): void
    {
        // Requeter la BDD
        $pdo = new PDO(
            "mysql:host=localhost;dbname=blog;charset=UTF8",
            "root",
            "root",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );

        $req = $pdo->prepare("UPDATE article SET title =:title, content=:content WHERE id=:id");
        $req->execute(array(
            ":title" => $article->getTitle(),
            ":content" => $article->getContent(),
            ":id" => $article->getId()
        ));
    }

    public function deleteById(int $id): void
    {
        // Requeter la BDD
        $pdo = new PDO(
            "mysql:host=localhost;dbname=blog;charset=UTF8",
            "root",
            "root",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );

        $req = $pdo->prepare("DELETE FROM  article WHERE id = :id");
        $req->execute(array(
            ":id" => $id
        ));
    }
}
