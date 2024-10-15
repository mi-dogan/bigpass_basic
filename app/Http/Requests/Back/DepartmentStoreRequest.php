<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentStoreRequest extends FormRequest
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
            'branch_id' => 'required|exists:branches,id'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Departman adı boş bırakılamaz.',
            'name.max' => 'Departman adı en fazla 255 karakter olmalıdır.',
            'branch_id.required' => 'Şube boş bırakılamaz.',
            'branch_id.exists' => 'Şube bulunamadı.'
        ];
    }
}
