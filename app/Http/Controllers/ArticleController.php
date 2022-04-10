<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;

/**
 *
 */
class ArticleController extends Controller
{

    /**
     * @var ArticleService
     */
    private ArticleService $articleService;

    /**
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $articles = $this->articleService->getAllArticles();
        return ArticleResource::collection($articles);
    }

    /**
     * @param StoreArticleRequest $request
     * @return ArticleResource
     */
    public function store(StoreArticleRequest $request)
    {
        $article = $this->articleService->createArticle($request->validated());
        return new ArticleResource($article);
    }

    /**
     * @param string $id
     * @return ArticleResource
     */
    public function show(string $id)
    {
        $article = $this->articleService->getArticleById($id);
        return new ArticleResource($article);
    }

    /**
     * @param UpdateArticleRequest $request
     * @param string $id
     * @return mixed
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        return $this->articleService->updateArticle($id, $request->validated());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->articleService->destroyArticle($id);
        return response()->json([
            'message' => 'Resource has been deleted.'
        ]);
    }
}
