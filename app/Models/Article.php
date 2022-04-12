<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class Article extends Model
{

    use HasFactory;

    /**
     * The article id
     * @var string
     *
     * @OA\Property(
     *   property="id",
     *   type="string",
     *   description="The article id"
     * )
     */
    public string $id;

    /**
     * The article title
     * @var string
     *
     * @OA\Property(
     *   property="title",
     *   type="string",
     *   description="The article title"
     * )
     */
    public string $title;

    /**
     * The article url
     * @var string
     *
     * @OA\Property(
     *   property="url",
     *   type="string",
     *   description="The article url"
     * )
     */
    public string $url;

    /**
     * The article imageUrl
     * @var string
     *
     * @OA\Property(
     *   property="imageUrl",
     *   type="string",
     *   description="The article imageUrl"
     * )
     */
    public string $imageUrl;

    /**
     * The article newsSite
     * @var string
     *
     * @OA\Property(
     *   property="newsSite",
     *   type="string",
     *   description="The article newsSite"
     * )
     */
    public string $newsSite;

    /**
     * The article summary
     * @var string
     *
     * @OA\Property(
     *   property="summary",
     *   type="string",
     *   description="The article summary"
     * )
     */
    public string $summary;

    /**
     * The article publishedAt
     * @var string
     *
     * @OA\Property(
     *   property="publishedAt",
     *   type="string",
     *   description="The article publishedAt"
     * )
     */
    public string $publishedAt;

    /**
     * The article updatedAt
     * @var string
     *
     * @OA\Property(
     *   property="updatedAt",
     *   type="string",
     *   description="The article updatedAt"
     * )
     */
    public string $updatedAt;

    /**
     * The article featured
     * @var bool
     *
     * @OA\Property(
     *   property="featured",
     *   type="boolean",
     *   description="The article featured"
     * )
     */
    public bool $featured;

    /**
     * The article launches
     * @var array
     *
     * @OA\Property(
     *   property="launches",
     *   type="array",
     *   description="The article launches",
     *   @OA\Items(
     *     @OA\Property(
     *       property="id",
     *       type="string"
     *     ),
     *     @OA\Property(
     *       property="provider",
     *       type="string"
     *     )
     *   )
     * )
     */
    public array $launches;

    /**
     * The article events
     * @var array
     *
     * @OA\Property(
     *   property="events",
     *   type="array",
     *   description="The article events",
     *   @OA\Items(
     *     @OA\Property(
     *       property="id",
     *       type="string"
     *     ),
     *     @OA\Property(
     *       property="provider",
     *       type="string"
     *     )
     *   )
     * )
     */
    public array $events;

    /**
     *
     */
    const CREATED_AT = 'publishedAt';

    /**
     *
     */
    const UPDATED_AT = 'updatedAt';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'url',
        'imageUrl',
        'newsSite',
        'summary',
        'publishedAt',
        'updatedAt',
        'featured',
        'launches',
        'events',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'publishedAt' => 'datetime',
        'updatedAt' => 'datetime',
        'featured' => 'boolean',
        'launches' => 'array',
        'events' => 'array',
    ];

}
