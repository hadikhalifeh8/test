<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
            'customer_id' =>'required,'.$this->id,
            'product_id' =>'required,'.$this->id,

        ];
    }


    public function messages()
    {
        return [
            'customer_id.required' => 'please Enter a customer',
            'product_id.required' => 'please Enter a product',

        ];
    }
}
