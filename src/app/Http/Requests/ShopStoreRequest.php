<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:shops,name', 'max:191'],
            'area' => ['required', 'string'],
            'genre' => ['required', 'string'],
            'description' => ['required', 'string', 'max:512'],
            'imageURL' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10000'],
        ];
    }
}
