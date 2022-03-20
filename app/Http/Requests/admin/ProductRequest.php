<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "product_code" => "required|min:6",
            "product_name" => "required",
            "product_amount" => "required|integer",
            "product_price" => "required|integer"
        ];
    }
    public function messages()
    {
        return [
            "product_code.required" => ":attribute bắt buộc phải nhập",
            "product_code.min" => ":attribute không được nhỏ hơn :min kí tự",
            "product_name.required" => ":attribute bắt buộc phải nhập",
            "product_amount.required" => ":attribute bắt buộc phải nhập",
            "product_amount.integer" => ":attribute phải là số",
            "product_price.required" => ":attribute bắt buộc phải nhập",
            "product_price.integer" => ":attribute phải là số",
        ];
    }
    public function attributes()
    {
        return [
            "product_code" => "Mã sản phẩm",
            "product_name" => "Tên sản phẩm",
            "product_amount" => "Số lượng sản phẩm",
            "product_price" => "Giá sản phẩm"
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // if ($this->somethingElseIsInvalid()) {
            //     $validator->errors()->add('field', 'Something is wrong with this field!');
            // }
            // dd($validator);
        });
    }
}
