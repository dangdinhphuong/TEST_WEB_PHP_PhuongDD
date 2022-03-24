<?php

namespace App\Http\Requests\Admin\Prodcuts;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required',
            'category_id'=> 'required|min:1',
            'price'=> 'required|numeric|min:1',
            'amount'=> 'required|numeric|min:1',
            'image'=> 'mimetypes:image/jpeg,image/png|max:2048'
        ];
    }
}
