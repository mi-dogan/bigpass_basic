<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class HolidayStoreRequest extends FormRequest
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
            'name' => 'required|max:255|unique:holidays,name',
            'date' => 'required|date|unique:holidays,day'
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Başlık boş bırakılamaz.',
            'name.max' => 'Başlık en fazla 255 karakter olmalıdır.',
            'name.unique' => 'Tatil sistemde kayıtlı.',
            'date.required' => 'Tarih boş bırakılamaz.',
            'date.date' => 'Lütfen geçerli bir tarih giriniz.',
            'date.unique' => 'Seçilen tarihte tatil zaten kayıtlı.',
        ];
    }
}
