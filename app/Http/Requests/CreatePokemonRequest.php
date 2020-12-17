<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePokemonRequest extends FormRequest
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
            'pr_ID' =>'required',
            'height' =>'required',
            'weight' =>'required',
            'group' =>'required',
            'place' =>'required',


        ];
    }
    public function messages()
    {
        return [
            "name.required"=>"名字必填",
            "pr_ID.required"=>"派系必填",
            "height.required"=>"身高必填",
            "weight.required"=>"體重必填",
            "group.required"=>"地區必填",
            "place.required"=>"出現場所必填"
        ];
    }

}
