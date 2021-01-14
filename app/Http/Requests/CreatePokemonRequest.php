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
              'name' =>'required|string|max:10',
            'pr_ID' =>'required|numeric|max:20',
            'height' =>'required|numeric',
            'weight' =>'required|numeric',
            'growing'=>'required|string|max:1',
            'group' =>'required|string|max:10',
            'place' =>'required|string|max:10',


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
            "place.required"=>"出現場所必填",

            "pr_ID.numeric"=>"派系編號只能是數字",
            "height.numeric"=>"身高只能是數字",
            "weight.numeric"=>"體重只能是數字",

            "name.max" =>"名稱最多10個字元",
            "growing.max"=>"進化可能最多1個字元",
            "group"=>"地區最多10個字元",
            "place"=>"場所最多10個字元",
            "pr_ID.max"=>"派系編號最多為15",




        ];
    }

}
