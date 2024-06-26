<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolePlayRequest extends FormRequest
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
            'name' => 'required|min:5|max:150|string',
            'slug' => 'required|min:5|max:15|string'
        ];
    }
}
