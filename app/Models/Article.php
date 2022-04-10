<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 *
 */
class Article extends Model
{

    use HasFactory;

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
