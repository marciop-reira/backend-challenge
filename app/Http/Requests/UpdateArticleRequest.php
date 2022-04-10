<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return \string[][]
     */
    public function rules()
    {
        return [
            'title' => ['min:3', 'max:50'],
            'url' => ['min:10', 'max:255'],
            'imageUrl' => ['min:10', 'max:255'],
            'newsSite' => ['min:5', 'max:50'],
            'summary' => ['min:10', 'max:500'],
            'featured' => ['boolean'],
            'launches' => ['array'],
            'launches.*.id' => ['required'],
            'launches.*.provider' => ['required'],
            'events' => ['array'],
            'events.*.id' => ['required'],
            'events.*.provider' => ['required'],
        ];
    }
}
