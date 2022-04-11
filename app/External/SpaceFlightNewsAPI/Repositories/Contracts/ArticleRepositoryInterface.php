<?php

namespace App\External\SpaceFlightNewsAPI\Repositories\Contracts;

/**
 *
 */
interface ArticleRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getArticlesAmount(array $params = []);

    /**
     * @param array $params
     * @return mixed
     */
    public function getAllArticles(array $params = []);
}
