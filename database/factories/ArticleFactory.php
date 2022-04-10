<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 *
 */
class ArticleFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'url' => $this->faker->url,
            'imageUrl' => $this->faker->imageUrl,
            'newsSite' => $this->faker->domainName,
            'summary' => $this->faker->text('400'),
            'featured' => $this->faker->boolean,
            'launches' => [
                'id' => $this->faker->uuid,
                'provider' => $this->faker->title
            ],
            'events' => [
                'id' => $this->faker->randomDigit(),
                'provider' => $this->faker->title
            ],
        ];
    }
}
