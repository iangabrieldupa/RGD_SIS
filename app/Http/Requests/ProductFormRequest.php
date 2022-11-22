<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'product_name'    => [
                'required',
                'string'
            ],
            'sku'  => [
                'nullable',
                'string'
            ],
            'product_unit_price'  => [
                'nullable',
                'string'
            ],
            'quantity'  => [
                'nullable',
                'string'
            ],
            'product_image'  => [
                'nullable',
                'string'
            ],
            'product_description'  => [
                'nullable',
                'string'
            ],
            'brand_id'  => [
                'nullable',
                'string'
            ],
            'category_id'  => [
                'nullable',
                'string'
            ],
            'unit_id'  => [
                'nullable',
                'string'
            ],
            'vat_type'  => [
                'nullable',
                'string'
            ],
        ];
    }
}
