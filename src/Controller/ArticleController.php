<?php

namespace App\Controller;

use App\Dao\ArticleDao;
use App\Model\Article;
use PDOException;

class ArticleController
{
    public function index(): void
    {
        // Récupérer tous les articles
        try {
            $articles = (new ArticleDao())->getAll();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }

        // Appeler (inclure) la vue
        require TEMPLATES . DIRECTORY_SEPARATOR . "article" . DIRECTORY_SEPARATOR . "index.html.php";

        // ob_start();
        // require __DIR__ . "../views";
        // $content = ob_get_clean();

        // // Appeler le layout
        // require "layout.html.php";
    }

    public function show(int $id): void
    {
        // Récupérer tous les articles
        try {
            $article = (new ArticleDao())->getById($id);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }

        require TEMPLATES . DIRECTORY_SEPARATOR . "article" . DIRECTORY_SEPARATOR . "show.html.php";
    }

    public function new(): void
    {
        require TEMPLATES . DIRECTORY_SEPARATOR . "article" . DIRECTORY_SEPARATOR . "add.html.php";

        if (isset($_POST['title'])) {

            if (
                !empty($_POST['title']) &&
                !empty($_POST['content'])
            ) {

                $article = new Article();
                $article->setTitle(htmlspecialchars($_POST['title']));
                $article->setContent(htmlspecialchars($_POST['content']));

                try {
                    (new ArticleDao())->new($article);

                    $_SESSION['successMsg'] = "Votre article a été crée !";

                    header('Location: /');
                    exit;
                } catch (PDOException $e) {
                    var_dump($e->getMessage());
                }
            }
        }
    }

    public function edit(int $id): void
    {
        // Récupérer les infos de l'article
        try {
            $article = (new ArticleDao())->getById($id);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }

        require TEMPLATES . DIRECTORY_SEPARATOR . "article" . DIRECTORY_SEPARATOR . "edit.html.php";

        if (isset($_POST['title'])) {

            if (
                !empty($_POST['title']) &&
                !empty($_POST['content'])
            ) {
                $article->setId($id);
                $article->setTitle(htmlspecialchars($_POST['title']));
                $article->setContent(htmlspecialchars($_POST['content']));

                try {
                    (new ArticleDao())->edit($article);

                    $_SESSION['successMsg'] = "Votre article a été édité !";

                    header("Location: /");
                    exit;
                } catch (PDOException $e) {
                    var_dump($e->getMessage());
                }
            }
        }
    }

    public function delete(int $id): void
    {
        try {
            $article = (new ArticleDao())->deleteById($id);

            $_SESSION['successMsg'] = "Votre article a été supprimé !";

            header("Location: /");
            exit;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
