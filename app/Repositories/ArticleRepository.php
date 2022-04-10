<?php

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\Contracts\ArticleRepositoryInterface;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 *
 */
class ArticleRepository implements ArticleRepositoryInterface
{

    /**
     * @var Article
     */
    protected Article $entity;

    /**
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->entity = $article;
    }

    /**
     * @return mixed
     */
    public function getAllArticles()
    {
        return $this->entity->paginate();
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function getArticleById(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    /**
     * @param array $data
     * @return Article|null
     */
    public function createArticle(array $data): ?Article
    {
        return $this->entity->create($data);
    }

    /**
     * @param Model $article
     * @param array $data
     * @return Model
     */
    public function updateArticle(Model $article, array $data)
    {
        $article->update($data);
        return $article;
    }

    /**
     * @param Model $article
     * @return bool|null
     */
    public function destroyArticle(Model $article): ?bool
    {
        return $article->delete();
    }
}
