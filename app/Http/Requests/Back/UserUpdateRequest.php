<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'update_name' => 'required|max:255',
            //            'update_email' => 'required|email|max:255|unique:users,email,'.$this->id.',id',
            'update_email' => 'required|email|max:255',
            'update_password' => 'nullable|min:6|max:255|confirmed',
            //            'update_department_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'update_name.required' => 'Ad soyad boş bırakılamaz.',
            'update_name.max' => 'Ad soyad en fazla 255 karakter olmalıdır.',
            'update_email.required' => 'E-posta adresi boş bırakılamaz.',
            'update_email.email' => 'Lütfen geçerli bir e-posta adresi giriniz.',
            'update_email.max' => 'E-posta adresi en fazla 255 karakter olmalıdır.',
            // 'update_email.unique' => 'E-posta adresi sistemde kayıtlı.',
            'update_password.required' => 'Şifre boş bırakılamaz.',
            'update_password.min' => 'Şifre en az 6 karakter olmalıdır.',
            'update_password.max' => 'Şifre en fazla 255 karakter olmalıdır.',
            'update_password.confirmed' => 'Şifreler uyuşmuyor.',
            'update_department_id.required' => 'Departman boş bırakılamaz.',
            'update_department_id.exists' => 'Departman bulunamadı.'
        ];
    }
}
