<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductFrontRequest extends Request
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
            'name' => 'required|max:20',
            'description' => 'required',
            'price' => 'required',
            'categories' => 'required',
            'image' => 'required|image'

        ];
    }
}
