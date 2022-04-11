<?php

namespace App\External\SpaceFlightNewsAPI\Services;

use App\External\SpaceFlightNewsAPI\Repositories\Contracts\ArticleRepositoryInterface;
use App\Mail\AlertMail;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Mail;

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
     * @param array $params
     * @return mixed|void
     */
    public function getArticlesAmount(array $params = [])
    {
        try {
            return $this->articleRepository->getArticlesAmount($params);
        } catch (RequestException $e) {
            Mail::send(new AlertMail());
        }
    }

    /**
     * @param array $params
     * @return \Illuminate\Support\Collection|void
     */
    public function getAllArticles(array $params = [])
    {
        try {
            return collect($this->articleRepository->getAllArticles($params));
        } catch (RequestException $e) {
            Mail::send(new AlertMail());
        }
    }
}
