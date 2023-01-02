<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
            'bill_no'    => [
                'nullable',
                'string'
            ],
            'product_id'    => [
                'nullable',
                'string'
            ],
            'gross_amount'  => [
                'nullable',
                'string'
            ],
            'service_charge'  => [
                'nullable',
                'string'
            ],

            'net_amount'  => [
                'nullable',
                'string'
            ],
            'discount'  => [
                'nullable',
                'string'
            ],
            'post_status'  => [
                'nullable',
                'string'
            ],
        ];
    }
}
