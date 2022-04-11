<?php

namespace App\External\SpaceFlightNewsAPI\Services;

use App\External\SpaceFlightNewsAPI\Repositories\Contracts\ArticleRepositoryInterface;
use Illuminate\Http\Client\RequestException;

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

    public function getArticlesAmount(array $params = [])
    {
        try {
            return $this->articleRepository->getArticlesAmount($params);
        } catch (RequestException $e) {
            dd("Error");
        }
    }

    public function getAllArticles(array $params = [])
    {
        try {
            return collect($this->articleRepository->getAllArticles($params));
        } catch (RequestException $e) {
            dd("Error");
        }
    }
}
