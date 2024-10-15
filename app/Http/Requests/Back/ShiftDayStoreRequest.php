<?php

namespace App\Http\Requests\back;

use Illuminate\Foundation\Http\FormRequest;

class ShiftDayStoreRequest extends FormRequest
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
            'type' => 'required',
            'morning_entrance' => 'required|date_format:H:i',
            'morning_exit' => 'required|date_format:H:i',
           // 'noon_entrance' => 'required|date_format:H:i',
            //'noon_exit' => 'required|date_format:H:i',
            'option' => 'required|date_format:H:i'
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'Gün boş bırakılamaz.',
            'morning_entrance.required' => 'Sabah giriş boş bırakılamaz.',
            'morning_entrance.date_format' => 'Lütfen geçerli bir format giriniz.',
            'morning_exit.required' => 'Sabah çıkış boş bırakılamaz.',
            'morning_exit.date_format' => 'Lütfen geçerli bir format giriniz.',
            'noon_entrance.required' => 'Öğlen giriş boş bırakılamaz.',
            'noon_entrance.date_format' => 'Lütfen geçerli bir format giriniz.',
            'noon_exit.required' => 'Öğlen giriş boş bırakılamaz.',
            'noon_exit.date_format' => 'Lütfen geçerli bir format giriniz.',
            'option.required' => 'Option boş bırakılamaz.',
            'option.date_format' => 'Lütfen geçerli bir format giriniz.'
        ];
    }
}
