<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;
use OpenApi\Attributes as OA;

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
     * @OA\Get(
     *   path="/articles",
     *   summary="list all articles",
     *   @OA\Response(
     *     response=200,
     *     description="A list with articles",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Schema(
     *           type="array",
     *           @OA\Items(ref="#/components/schemas/Article")
     *        ),
     *     )
     *   ),
     *   @OA\Response(
     *     response="404",
     *     description="Article not found",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Schema(
     *          type="array",
     *          @OA\Items(
     *            @OA\Property(
     *              property="message",
     *              type="string"
     *            )
     *          )
     *        )
     *     )
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function index()
    {
        $articles = $this->articleService->getAllArticles();
        return ArticleResource::collection($articles);
    }

    /**
     * @OA\Post(
     *   path="/articles",
     *   summary="create a nem article",
     *   description="",
     *   @OA\RequestBody(
     *     description="Article to create",
     *     required=true,
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Schema(
     *          type="array",
     *          @OA\Items(
     *            @OA\Property(
     *              property="title",
     *              type="string",
     *              minimum=3,
     *              maximum=50
     *            ),
     *            @OA\Property(
     *              property="url",
     *              type="string",
     *              minimum=10,
     *              maximum=255
     *            ),
     *            @OA\Property(
     *              property="imageUrl",
     *              type="string",
     *              minimum=10,
     *              maximum=255
     *            ),
     *            @OA\Property(
     *              property="newsSite",
     *              type="string",
     *              minimum=5,
     *              maximum=50
     *            ),
     *            @OA\Property(
     *              property="summary",
     *              type="string",
     *              minimum=10,
     *              maximum=500
     *            ),
     *            @OA\Property(
     *              property="featured",
     *              type="boolean"
     *            ),
     *            @OA\Property(
     *              property="launches",
     *              type="array",
     *              @OA\Items(
     *                @OA\Property(
     *                  property="id",
     *                  type="string"
     *                ),
     *              @OA\Property(
     *                property="provider",
     *                type="string"
     *              )
     *             )
     *            ),
     *            @OA\Property(
     *              property="events",
     *              type="array",
     *              @OA\Items(
     *                @OA\Property(
     *                  property="id",
     *                  type="string"
     *                ),
     *                @OA\Property(
     *                  property="provider",
     *                  type="string"
     *                )
     *              )
     *            ),
     *            required={"title","url","imageUrl","newsSite","featured","launches","events"}
     *          )
     *        )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="New created article",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Schema(ref="#/components/schemas/Article")
     *     )
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function store(StoreArticleRequest $request)
    {
        $article = $this->articleService->createArticle($request->validated());
        return new ArticleResource($article);
    }

    /**
     * @OA\Get(
     *   path="/articles/{id}",
     *   summary="get article by id",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="article",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Schema(ref="#/components/schemas/Article")
     *     )
     *   ),
     *   @OA\Response(
     *     response="404",
     *     description="Article not found",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Schema(
     *          type="array",
     *          @OA\Items(
     *            @OA\Property(
     *              property="message",
     *              type="string"
     *            )
     *          )
     *        )
     *     )
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function show(string $id)
    {
        $article = $this->articleService->getArticleById($id);
        return new ArticleResource($article);
    }

    /**
     * @OA\Put(
     *   path="/articles/{id}",
     *   summary="update article by id",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true
     *   ),
     *   @OA\RequestBody(
     *     description="Article to create",
     *     required=false,
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Schema(
     *          type="array",
     *          @OA\Items(
     *            @OA\Property(
     *              property="title",
     *              type="string",
     *              minimum=3,
     *              maximum=50
     *            ),
     *            @OA\Property(
     *              property="url",
     *              type="string",
     *              minimum=10,
     *              maximum=255
     *            ),
     *            @OA\Property(
     *              property="imageUrl",
     *              type="string",
     *              minimum=10,
     *              maximum=255
     *            ),
     *            @OA\Property(
     *              property="newsSite",
     *              type="string",
     *              minimum=5,
     *              maximum=50
     *            ),
     *            @OA\Property(
     *              property="summary",
     *              type="string",
     *              minimum=10,
     *              maximum=500
     *            ),
     *            @OA\Property(
     *              property="featured",
     *              type="boolean"
     *            ),
     *            @OA\Property(
     *              property="launches",
     *              type="array",
     *              @OA\Items(
     *                @OA\Property(
     *                  property="id",
     *                  type="string"
     *                ),
     *              @OA\Property(
     *                property="provider",
     *                type="string"
     *              )
     *             )
     *            ),
     *            @OA\Property(
     *              property="events",
     *              type="array",
     *              @OA\Items(
     *                @OA\Property(
     *                  property="id",
     *                  type="string"
     *                ),
     *                @OA\Property(
     *                  property="provider",
     *                  type="string"
     *                )
     *              )
     *            ),
     *            required={}
     *          )
     *        )
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="article",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Schema(ref="#/components/schemas/Article")
     *     )
     *   ),
     *   @OA\Response(
     *     response="404",
     *     description="Article not found",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Schema(
     *          type="array",
     *          @OA\Items(
     *            @OA\Property(
     *              property="message",
     *              type="string"
     *            )
     *          )
     *        )
     *     )
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        return $this->articleService->updateArticle($id, $request->validated());
    }

    /**
     * @OA\Delete(
     *   path="/articles/{id}",
     *   summary="delete article by id",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="article",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Schema(
     *          type="array",
     *          @OA\Items(
     *            @OA\Property(
     *              property="message",
     *              type="string"
     *            )
     *          )
     *        )
     *     )
     *   ),
     *   @OA\Response(
     *     response="404",
     *     description="Article not found",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Schema(
     *          type="array",
     *          @OA\Items(
     *            @OA\Property(
     *              property="message",
     *              type="string"
     *            )
     *          )
     *        )
     *     )
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function destroy($id)
    {
        $this->articleService->destroyArticle($id);
        return response()->json([
            'message' => 'Resource has been deleted.'
        ]);
    }
}
