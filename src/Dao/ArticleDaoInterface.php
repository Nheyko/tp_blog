<?php

namespace App\Dao;

use App\Model\Article;

interface ArticleDaoInterface {

    public function getAll(): array;
    public function getById(int $id): Article;
    public function new(Article $article): void;
    public function edit(Article $article): void;
    public function deleteById(int $id): void;
}