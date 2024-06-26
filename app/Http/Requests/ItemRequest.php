<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'category_id' => 'required|numeric',
            'name' => 'required|min:5|max:100|string',
            'maxDurability' => 'required|numeric',
            'priceBase' => 'required|numeric',
            'weight' => 'required|numeric',
            'description' => 'required|min:5|max:255|string'
        ];
    }
}
