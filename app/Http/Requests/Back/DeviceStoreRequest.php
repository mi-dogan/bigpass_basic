<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class DeviceStoreRequest extends FormRequest
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
            'device_id' => 'required|max:255|unique:devices,device_id'
        ];
    }

    public function messages(): array
    {
        return [
            'device_id.required' => 'Cihaz ID boş bırakılamaz.',
            'device_id.max' => 'Cihaz ID en fazla 255 karakter olmalıdır.',
        ];
    }
}
