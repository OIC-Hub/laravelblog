<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'title' => 'required|string|max:40|unique:posts',
            'body' => 'required|string'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The blog title is required',
            'title.string' => 'Blog title must be a valid string',
            'body.required' => 'Blog content is required',
        ];
    }
}
