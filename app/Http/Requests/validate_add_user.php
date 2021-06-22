<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validate_add_user extends FormRequest
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
            'name' =>     'required|max:20',
            'email' =>    'required|email',
            'password' => 'required',
            'photo' =>    'required_without:null|image|max:20000,mimes:jpg,jpeg.png',
            'mobile' =>   'required',
        ];
    }
}
