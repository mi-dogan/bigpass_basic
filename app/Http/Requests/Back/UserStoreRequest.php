<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6|max:255|confirmed',
            //            'department_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ad soyad boş bırakılamaz.',
            'name.max' => 'Ad soyad en fazla 255 karakter olmalıdır.',
            'email.required' => 'E-posta adresi boş bırakılamaz.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi giriniz.',
            'email.max' => 'E-posta adresi en fazla 255 karakter olmalıdır.',
            'email.unique' => 'E-posta adresi sistemde kayıtlı.',
            'password.required' => 'Şifre boş bırakılamaz.',
            'password.min' => 'Şifre en az 6 karakter olmalıdır.',
            'password.max' => 'Şifre en fazla 255 karakter olmalıdır.',
            'password.confirmed' => 'Şifreler uyuşmuyor.',
            'department_id.required' => 'Departman boş bırakılamaz.',
            'department_id.exists' => 'Departman bulunamadı.'
        ];
    }
}
