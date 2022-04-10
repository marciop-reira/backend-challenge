<?php

namespace Tests\Unit;

use App\Models\Article;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class ArticleTest extends TestCase
{

    /**
     * @return void
     */
    public function test_check_if_article_fields_are_corrects()
    {
        $article = new Article();
        $expected = [
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

        $this->assertEquals($expected, $article->getFillable());
    }

    public function test_check_if_article_casted_fields_are_corrects()
    {
        $article = new Article();
        $expectedCasts = [
            'publishedAt' => 'datetime',
            'updatedAt' => 'datetime',
            'featured' => 'boolean',
            'launches' => 'array',
            'events' => 'array',
        ];

        $this->assertEquals($expectedCasts, $article->getCasts());
    }

}
