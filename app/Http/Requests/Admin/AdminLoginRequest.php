<?php


namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'admin_password' => 'required',
            'admin_email' => 'required|email    ',
        ];
    }

    public function messages()
    {
        return [
            'admin_password.required' => 'Vui lòng nhập mật khẩu',
            'admin_email.required' => 'Vui lòng nhập địa chỉ email',
            'admin_email.email' => 'Vui lòng nhập đúng định dạng địa chỉ email',
        ];
    }
}
