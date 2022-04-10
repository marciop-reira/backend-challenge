<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Tests\TestCase;

/**
 *
 */
class ArticleTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @var array
     */
    private array $sampleRequestBody;

    /**
     * @param string|null $name
     * @param array $data
     * @param $dataName
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->sampleRequestBody = [
            'title' => "Fake title",
            'url' => "fake-url.com.br",
            'imageUrl' => "fake-url.com.br/fake-image",
            'newsSite' => "Fake Site News",
            'summary' => "Fake Summary",
            'featured' => false,
            'launches' => [],
            'events' => [],
        ];
    }

    /**
     * @return void
     */
    public function test_get_all_articles()
    {
        $response = $this->getJson('/articles');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_get_all_articles_with_total()
    {
        Article::factory()->count(10)->create();
        $response = $this->getJson('/articles');
        $response->assertStatus(200)
            ->assertJsonCount(10, 'data');;
    }

    /**
     * @return void
     */
    public function test_get_article()
    {
        $article = Article::factory()->create();
        $response = $this->get("/articles/$article->id");
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_get_article_not_found()
    {
        $response = $this->get('/articles/fake-id');
        $response->assertNotFound();
    }

    /**
     * @return void
     */
    public function test_create_article()
    {
        $response = $this->postJson('/articles', $this->sampleRequestBody);
        $response->assertStatus(201);
    }

    /**
     * @return void
     */
    public function test_create_article_without_body()
    {
        $response = $this->postJson('/articles', []);
        $response->assertStatus(422);
    }

    /**
     * @return void
     */
    public function test_create_article_without_title()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'title'));
        $response->assertJsonValidationErrorFor('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_without_url()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'url'));
        $response->assertJsonValidationErrorFor('url')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_without_image_url()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'imageUrl'));
        $response->assertJsonValidationErrorFor('imageUrl')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_without_news_site()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'newsSite'));
        $response->assertJsonValidationErrorFor('newsSite')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_without_news_summary()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'summary'));
        $response->assertJsonValidationErrorFor('summary')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_without_news_featured()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'featured'));
        $response->assertJsonValidationErrorFor('featured')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_without_news_launches()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'launches'));
        $response->assertJsonValidationErrorFor('launches')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_without_news_events()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'events'));
        $response->assertJsonValidationErrorFor('events')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches');
    }

    /**
     * @return void
     */
    public function test_create_article_with_title_size_less_than_3()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'title') + ['title' => '']);
        $response->assertJsonValidationErrorFor('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_with_title_size_greater_than_50()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'title') + ['title' => Str::random(51)]);
        $response->assertJsonValidationErrorFor('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_with_url_size_less_than_10()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'url') + ['url' => '']);
        $response->assertJsonValidationErrorFor('url')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_with_url_size_greater_than_255()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'url') + ['url' => Str::random(256)]);
        $response->assertJsonValidationErrorFor('url')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_with_image_url_size_less_than_10()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'imageUrl') + ['imageUrl' => '']);
        $response->assertJsonValidationErrorFor('imageUrl')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_with_image_url_size_greater_than_255()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'imageUrl') + ['imageUrl' => Str::random(256)]);
        $response->assertJsonValidationErrorFor('imageUrl')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_with_news_site_size_less_than_10()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'newsSite') + ['newsSite' => '']);
        $response->assertJsonValidationErrorFor('newsSite')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_with_news_site_size_greater_than_255()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'newsSite') + ['newsSite' => Str::random(51)]);
        $response->assertJsonValidationErrorFor('newsSite')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_with_summary_size_less_than_10()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'summary') + ['summary' => '']);
        $response->assertJsonValidationErrorFor('summary')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_with_summary_size_greater_than_500()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'summary') + ['summary' => Str::random(501)]);
        $response->assertJsonValidationErrorFor('summary')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_with_invalid_featured()
    {
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'featured') + ['featured' => 'fake-featured']);
        $response->assertJsonValidationErrorFor('featured')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('launches')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_with_invalid_launches()
    {
        $invalidData = [['fake-id']];
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'launches') + ['launches' => $invalidData]);
        $response->assertJsonValidationErrorFor('launches.0.id')
            ->assertJsonValidationErrorFor('launches.0.provider')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('events');
    }

    /**
     * @return void
     */
    public function test_create_article_with_invalid_events()
    {
        $invalidData = [['fake-id']];
        $response = $this->postJson('/articles', Arr::except($this->sampleRequestBody, 'events') + ['events' => $invalidData]);
        $response->assertJsonValidationErrorFor('events.0.id')
            ->assertJsonValidationErrorFor('events.0.provider')
            ->assertJsonMissingValidationErrors('title')
            ->assertJsonMissingValidationErrors('url')
            ->assertJsonMissingValidationErrors('imageUrl')
            ->assertJsonMissingValidationErrors('newsSite')
            ->assertJsonMissingValidationErrors('summary')
            ->assertJsonMissingValidationErrors('featured')
            ->assertJsonMissingValidationErrors('launches');
    }

    /**
     * @return void
     */
    public function test_update_article()
    {
        $article = Article::factory()->create();
        $data = [
            'title' => 'Test'
        ];
        $response = $this->putJson("/articles/$article->id", $data);
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_update_article_not_found()
    {
        $response = $this->putJson("/article/fake-id");
        $response->assertNotFound();
    }

    /**
     * @return void
     */
    public function test_update_article_with_title_size_less_than_3()
    {
        $article = Article::factory()->create();
        $data = [
            'title' => ''
        ];
        $response = $this->putJson("/articles/{$article->id}", $data);
        $response->assertJsonValidationErrorFor('title');
    }

    /**
     * @return void
     */
    public function test_update_article_with_title_size_greater_than_50()
    {
        $article = Article::factory()->create();
        $data = [
            'title' => Str::random(51)
        ];
        $response = $this->putJson("/articles/{$article->id}", $data);
        $response->assertJsonValidationErrorFor('title');
    }

    /**
     * @return void
     */
    public function test_update_article_with_url_size_less_than_10()
    {
        $article = Article::factory()->create();
        $data = [
            'url' => ''
        ];
        $response = $this->putJson("/articles/{$article->id}", $data);
        $response->assertJsonValidationErrorFor('url');
    }

    /**
     * @return void
     */
    public function test_update_article_with_url_size_greater_than_255()
    {
        $article = Article::factory()->create();
        $data = [
            'url' => Str::random(256)
        ];
        $response = $this->putJson("/articles/{$article->id}", $data);
        $response->assertJsonValidationErrorFor('url');
    }

    /**
     * @return void
     */
    public function test_update_article_with_image_url_size_less_than_10()
    {
        $article = Article::factory()->create();
        $data = [
            'imageUrl' => ''
        ];
        $response = $this->putJson("/articles/{$article->id}", $data);
        $response->assertJsonValidationErrorFor('imageUrl');
    }

    /**
     * @return void
     */
    public function test_update_article_with_image_url_size_greater_than_255()
    {
        $article = Article::factory()->create();
        $data = [
            'imageUrl' => Str::random(256)
        ];
        $response = $this->putJson("/articles/{$article->id}", $data);
        $response->assertJsonValidationErrorFor('imageUrl');
    }

    /**
     * @return void
     */
    public function test_update_article_with_news_site_size_less_than_10()
    {
        $article = Article::factory()->create();
        $data = [
            'newsSite' => ''
        ];
        $response = $this->putJson("/articles/{$article->id}", $data);
        $response->assertJsonValidationErrorFor('newsSite');
    }

    /**
     * @return void
     */
    public function test_update_article_with_news_site_size_greater_than_255()
    {
        $article = Article::factory()->create();
        $data = [
            'newsSite' => Str::random(51)
        ];
        $response = $this->putJson("/articles/{$article->id}", $data);
        $response->assertJsonValidationErrorFor('newsSite');
    }

    /**
     * @return void
     */
    public function test_update_article_with_summary_size_less_than_10()
    {
        $article = Article::factory()->create();
        $data = [
            'summary' => ''
        ];
        $response = $this->putJson("/articles/{$article->id}", $data);
        $response->assertJsonValidationErrorFor('summary');
    }

    /**
     * @return void
     */
    public function test_update_article_with_summary_size_greater_than_500()
    {
        $article = Article::factory()->create();
        $data = [
            'summary' => Str::random(501)
        ];
        $response = $this->putJson("/articles/{$article->id}", $data);
        $response->assertJsonValidationErrorFor('summary');
    }

    /**
     * @return void
     */
    public function test_update_article_with_invalid_featured()
    {
        $article = Article::factory()->create();
        $data = [
            'featured' => 'fake-featured'
        ];
        $response = $this->putJson("/articles/{$article->id}", $data);
        $response->assertJsonValidationErrorFor('featured');
    }

    /**
     * @return void
     */
    public function test_update_article_with_invalid_launches()
    {
        $article = Article::factory()->create();
        $invalidData = ['launches' => ['fake-id']];
        $response = $this->putJson("/articles/{$article->id}", $invalidData);
        $response->assertJsonValidationErrorFor('launches.0.id')
            ->assertJsonValidationErrorFor('launches.0.provider');
    }

    /**
     * @return void
     */
    public function test_update_article_with_invalid_events()
    {
        $article = Article::factory()->create();
        $invalidData = ['events' => ['fake-id']];
        $response = $this->putJson("/articles/{$article->id}", $invalidData);
        $response->assertJsonValidationErrorFor('events.0.id')
            ->assertJsonValidationErrorFor('events.0.provider');
    }

    /**
     * @return void
     */
    public function test_destroy_article()
    {
        $article = Article::factory()->create();
        $response = $this->deleteJson("/articles/$article->id");
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_destroy_article_not_found()
    {
        $response = $this->deleteJson("/article/fake-id");
        $response->assertNotFound();
    }
}
