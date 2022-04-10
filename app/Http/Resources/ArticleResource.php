<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 */
class ArticleResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'url' => $this->url,
            'imageUrl' => $this->imageUrl,
            'newsSite' => $this->newsSite,
            'summary' => $this->summary,
            'publishedAt' => $this->publishedAt,
            'updatedAt' => $this->updatedAt,
            'featured' => $this->featured,
            'launches' => $this->launches,
            'events' => $this->events,
        ];
    }
}
