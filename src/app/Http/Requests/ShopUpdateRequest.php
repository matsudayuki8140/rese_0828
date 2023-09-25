<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:191'],
            'area' => ['required', 'string'],
            'genre' => ['required', 'string'],
            'description' => ['required', 'string', 'max:512'],
            'imageURL' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:10000'],
        ];
    }
}
