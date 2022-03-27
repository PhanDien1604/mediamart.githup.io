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
            "product_code" => "required|min:6|unique:products,code",
            "product_name" => "required",
            "product_price" => "required|integer"
        ];
    }
    public function messages()
    {
        return [
            "required" => ":attribute bắt buộc phải nhập",
            "min" => ":attribute không được nhỏ hơn :min kí tự",
            "integer" => ":attribute phải là số",
            "unique" => ":attribute đã tồn tại"
        ];
    }
    public function attributes()
    {
        return [
            "product_code" => "Mã sản phẩm",
            "product_name" => "Tên sản phẩm",
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
