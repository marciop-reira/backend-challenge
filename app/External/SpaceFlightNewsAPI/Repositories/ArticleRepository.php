<?php

namespace App\External\SpaceFlightNewsAPI\Repositories;

use App\External\SpaceFlightNewsAPI\Repositories\Contracts\ArticleRepositoryInterface;
use Illuminate\Http\Client\RequestException;

/**
 *
 */
class ArticleRepository extends ApiRepository implements ArticleRepositoryInterface
{
    /**
     * @return int
     * @throws RequestException
     */
    public function getArticlesAmount(array $params = []): int
    {
        return $this->get('/articles/count', $params);
    }

    /**
     * @param array $params
     * @return array|mixed
     * @throws RequestException
     */
    public function getAllArticles(array $params = [])
    {
        return $this->get('/articles', $params);
    }
}
