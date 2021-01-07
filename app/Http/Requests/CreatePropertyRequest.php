<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePropertyRequest extends FormRequest
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
                'property' =>'required|string|max:3',
                'characteristic' =>'required|string|max:5',
                'home' =>'required|string|max:5',
                'weakness' =>'required|string|max:5',
        ];
    }

    public function messages()
    {
        return [
            "property.required"=>"屬性必填",
            "characteristic.required"=>"特性必填",
            "home.required"=>"主場必填",
            "weakness.required"=>"弱點屬性必填",

            "property.max"=>"屬性名稱最多3個字元",
            "characteristic.max"=>"特性最多為5個字元",
            "home.max"=>"主場最多為5個字元",
            "weakness.max"=>"弱點屬性最多為5個字元"

        ];
    }
}
