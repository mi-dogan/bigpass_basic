<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
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
            'name' => 'required|max:255|unique:roles,name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Rol adı boş bırakılamaz.',
            'name.max' => 'Rol adı en fazla 255 karakter olmalıdır.',
            'name.unique' => 'Rol sistemde kayıtlı.'
        ];
    }
}
