<?php


namespace App\Http\Requests\Product;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'product_name' => 'required',
            'product_image' => 'required',
            'product_price' => 'required|integer',
            'product_sale_price' => 'required|integer',
            'product_so_luong' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Vui lòng nhập tên sản phẩm',
            'product_image.required' => 'Vui lòng chọn ảnh',
            'product_price.required' => 'Vui lòng nhập giá gốc',
            'product_price.integer' => 'Vui lòng nhập đúng định dạng',
            'product_sale_price.required' => 'Vui lòng nhập giá bán',
            'product_sale_price.integer' => 'Vui lòng nhập đúng định dạng',
            'product_so_luong.required' => 'Vui lòng nhập số lượng',
            'product_so_luong.integer' => 'Vui lòng nhập đúng định dạng',
        ];
    }
}
