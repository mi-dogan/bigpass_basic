<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class PositionUpdateRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return [
            'update_name.required' => 'Pozisyon adı boş bırakılamaz.',
            'update_name.max' =>  'Pozisyon adı en fazla 255 karakter olmalıdır.',
        ];
    }
}
