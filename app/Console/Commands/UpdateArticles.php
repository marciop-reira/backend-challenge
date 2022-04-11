<?php

namespace App\Console\Commands;

use App\External\SpaceFlightNewsAPI\Services\ArticleService as SFNArticleService;
use App\Services\ArticleService;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

/**
 *
 */
class UpdateArticles extends Command
{
    /**
     *
     */
    private const PER_PAGE = 100;

    /**
     * @var string
     */
    protected $signature = 'update:articles';

    /**
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @var SFNArticleService
     */
    private SFNArticleService $SFNArticleService;

    /**
     * @var ArticleService
     */
    private ArticleService $articleService;

    /**
     * @param SFNArticleService $SFNArticleService
     * @param ArticleService $articleService
     */
    public function __construct(SFNArticleService $SFNArticleService, ArticleService $articleService)
    {
        parent::__construct();
        $this->SFNArticleService = $SFNArticleService;
        $this->articleService = $articleService;
    }

    /**
     * @return void
     */
    public function handle()
    {
        $DBArticlesAmount = $this->articleService->getAllArticles()->total();
        $APIArticlesAmount = $this->SFNArticleService->getArticlesAmount();
        if ($DBArticlesAmount != $APIArticlesAmount) $this->updateArticles($DBArticlesAmount);
    }

    /**
     * @param int $start
     * @return void
     */
    private function updateArticles(int $start)
    {
        if ($response = $this->getLastArticleFromAPI()) {
            $lastArticleIdFromApi = $response->first();
            for ($i = $start + 1; $i <= $lastArticleIdFromApi['id']; $i += self::PER_PAGE) {
                $articles = $this->SFNArticleService->getAllArticles([
                    'id_gte' => $i,
                    'id_lt' => $i + self::PER_PAGE,
                    '_limit' => self::PER_PAGE
                ]);
                $articles->each(function ($article) use ($start) {
                    if (!$start || !$this->articleService->getArticleByTitle($article['title']))
                        $this->articleService->createArticle($article);
                });
                echo "Record articles from {$i} to " . ($i + self::PER_PAGE - 1) . "\n";
            }
        }
    }

    /**
     * @return mixed
     */
    private function getLastArticleFromAPI()
    {
        return $this->SFNArticleService->getAllArticles(['_limit' => 1]);
    }
}
