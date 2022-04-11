<?php

namespace App\Services;

use App\Repositories\Contracts\ArticleRepositoryInterface;

/**
 *
 */
class ArticleService
{

    /**
     * @var ArticleRepositoryInterface
     */
    protected ArticleRepositoryInterface $articleRepository;

    /**
     * @param ArticleRepositoryInterface $articleRepository
     */
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @return mixed
     */
    public function getAllArticles()
    {
        return $this->articleRepository->getAllArticles();
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function getArticleById(string $id)
    {
        return $this->articleRepository->getArticleById($id);
    }

    /**
     * @param string $title
     * @return mixed
     */
    public function getArticleByTitle(string $title)
    {
        return $this->articleRepository->getArticleById($title);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createArticle(array $data)
    {
        return $this->articleRepository->createArticle($data);
    }

    /**
     * @param string $id
     * @param array $data
     * @return mixed
     */
    public function updateArticle(string $id, array $data)
    {
        $article = $this->getArticleById($id);
        return $this->articleRepository->updateArticle($article, $data);
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function destroyArticle(string $id)
    {
        $article = $this->getArticleById($id);
        return $this->articleRepository->destroyArticle($article);
    }

}
