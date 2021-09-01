<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return[
                'title' => 'sometimes|string|min:3|max:100',
                'director' => 'sometimes|string',
                'releaseDate' => 'sometimes|date',
                'imageUrl' => 'sometimes|url',
                'genre' => 'sometimes|string',
                'duration' => 'sometimes|integer|min:15|max:240'
        ];
    }
}
