<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class HolidayUpdateRequest extends FormRequest
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
            'update_name' => 'required|max:255|unique:holidays,name',
            'update_date' => 'required|date|unique:holidays,day'
        ];
    }


    public function messages(): array
    {
        return [
            'update_name.required' => 'Başlık boş bırakılamaz.',
            'update_name.max' => 'Başlık en fazla 255 karakter olmalıdır.',
            'update_name.unique' => 'Tatil sistemde kayıtlı.',
            'update_date.required' => 'Tarih boş bırakılamaz.',
            'update_date.date' => 'Lütfen geçerli bir tarih giriniz.',
            'update_date.unique' => 'Seçilen tarihte tatil zaten kayıtlı.',
        ];
    }
}
