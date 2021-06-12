<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|min:10|max:255',
            'origin_price' => 'required|numeric|min:1000|max:1000000000',
            'sale_price' => 'required|numeric',
        ];
    }

    public function messages()
    {

        return[
            'name.required' => 'Không được để trống!',
            'name.min' => 'Tên phải có ít nhất 10 kí tự!',
            'name.max' => 'Tên có tối đa 50 kí tự!',
            'origin_price.required' => 'Không được để trống!',
            'origin_price.max' => '<1.000.000.000!',
            'origin_price.min' => '>1.000!',
            'origin_price.numeric' => 'Yêu cầu nhập số!',
            'sale_price.required' => 'Không được để trống!',
            'sale_price.numeric' => 'Yêu cầu nhập số!',
        ];
    }

    public function attributes(){
        return [
            'name' => 'Tên',
            'sale_price' => 'giá gốc',
            'origin_price' => 'giá bán',
        ];
    }
}
