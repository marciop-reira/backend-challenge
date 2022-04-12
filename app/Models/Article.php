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
     * @var string
     *
     * @OA\Property(
     *   property="id",
     *   type="string"
     * )
     */
    private string $id;

    /**
     * @var string
     *
     * @OA\Property(
     *   property="title",
     *   type="string"
     * )
     */
    private string $title;

    /**
     * @var string
     *
     * @OA\Property(
     *   property="url",
     *   type="string"
     * )
     */
    private string $url;

    /**
     * @var string
     *
     * @OA\Property(
     *   property="imageUrl",
     *   type="string"
     * )
     */
    private string $imageUrl;

    /**
     * @var string
     *
     * @OA\Property(
     *   property="newsSite",
     *   type="string"
     * )
     */
    private string $newsSite;

    /**
     * @var string
     *
     * @OA\Property(
     *   property="summary",
     *   type="string"
     * )
     */
    private string $summary;

    /**
     * @var string
     *
     * @OA\Property(
     *   property="publishedAt",
     *   type="string"
     * )
     */
    private string $publishedAt;

    /**
     * @var string
     *
     * @OA\Property(
     *   property="updatedAt",
     *   type="string"
     * )
     */
    private string $updatedAt;

    /**
     * @var bool
     *
     * @OA\Property(
     *   property="featured",
     *   type="boolean"
     * )
     */
    private bool $featured;

    /**
     * @var array
     *
     * @OA\Property(
     *   property="launches",
     *   type="array",
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
    private array $launches;

    /**
     * @var array
     *
     * @OA\Property(
     *   property="events",
     *   type="array",
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
    private array $events;

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
