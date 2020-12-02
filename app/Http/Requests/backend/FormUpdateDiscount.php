<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class FormUpdateDiscount extends FormRequest
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
            'discount_name'=>'required',
            'discount_value'=>'required',
            'discount_end'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'discount_name.required'=>'Tên khuyến mãi không được trống',
            'discount_value.required'=>'Giá trị khuyến mãi trống',
            'discount_end.required'=>'Thời gian kết thúc khuyến mãi trống'
        ];
    }
}
