<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validate_add_category extends FormRequest
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
            'name_ar' => 'required|max:10',
            'name_en' => 'required|max:10',
            'photo' => 'required|image|max:20000,mimes:jpg,jpeg.png',
        ];
    }
}
