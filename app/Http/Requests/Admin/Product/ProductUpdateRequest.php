<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MaxProductImage;

class ProductUpdateRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
        ];

        if ($this->hasFile('images')) {
            $rules = array_merge($rules, [
                'images.*' => ['image','nullable','mimes:jpg,jpeg,png','max:2000', new MaxProductImage],
            ]);
        }

        return $rules;
    }
}
