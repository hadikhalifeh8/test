<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
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
                 'name' =>'required',
                 'email'=>'required|email|unique:customers,email,'.$this->id,
                 'phone'=>'required|unique:customers,phone,'.$this->id,
          
        ];
    }



    public function messages()
    {
        return [
            'name.required' => 'please Enter the name',

            'email.required' => 'please your email address',
            'email.email' => 'Email Must Be an Email Address @',
            'email.unique' => 'This Email already Exist, Please Enter a New Email Address',

            'phone.required' => 'please Enter the Phone Number',
            'phone.unique' => 'This Phone Number already Exist, Please Enter a New Phone Number',

           

        ];
    }
}
