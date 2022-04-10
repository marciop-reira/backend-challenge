<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 *
 */
class StoreArticleRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:50'],
            'url' => ['required', 'min:10', 'max:255'],
            'imageUrl' => ['required', 'min:10', 'max:255'],
            'newsSite' => ['required', 'min:5', 'max:50'],
            'summary' => ['required', 'min:10', 'max:500'],
            'featured' => ['required', 'boolean'],
            'launches' => [Rule::requiredIf(!is_array(request()->get('launches') ?? null)), 'array'],
            'launches.*.id' => ['required'],
            'launches.*.provider' => ['required'],
            'events' => [Rule::requiredIf(!is_array(request()->get('events') ?? null)), 'array'],
            'events.*.id' => ['required'],
            'events.*.provider' => ['required'],
        ];
    }
}
