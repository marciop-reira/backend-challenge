<?php

namespace App\Repositories\Contracts;

use Jenssegers\Mongodb\Eloquent\Model;

/**
 *
 */
interface ArticleRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getAllArticles();

    /**
     * @param string $id
     * @return mixed
     */
    public function getArticleById(string $id);

    /**
     * @param string $title
     * @return mixed
     */
    public function getArticleByTitle(string $title);

    /**
     * @param array $data
     * @return mixed
     */
    public function createArticle(array $data);

    /**
     * @param Model $article
     * @param array $data
     * @return mixed
     */
    public function updateArticle(Model $article, array $data);

    /**
     * @param Model $article
     * @return mixed
     */
    public function destroyArticle(Model $article);
}
