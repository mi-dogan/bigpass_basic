<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class ShiftDayUpdateRequest extends FormRequest
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
            'update_morning_entrance' => 'required|date_format:H:i',
            'update_morning_exit' => 'required|date_format:H:i',
            //'update_noon_entrance' => 'required|date_format:H:i',
            //'update_noon_exit' => 'required|date_format:H:i',
            'update_option' => 'required|date_format:H:i'
        ];
    }

    public function messages(): array
    {
        return [
            'update_morning_entrance.required' => 'Sabah giriş boş bırakılamaz.',
            'update_morning_entrance.date_format' => 'Lütfen geçerli bir format giriniz.',
            'update_morning_exit.required' => 'Sabah çıkış boş bırakılamaz.',
            'update_morning_exit.date_format' => 'Lütfen geçerli bir format giriniz.',
            'update_noon_entrance.required' => 'Öğlen giriş boş bırakılamaz.',
            'update_noon_entrance.date_format' => 'Lütfen geçerli bir format giriniz.',
            'update_noon_exit.required' => 'Öğlen giriş boş bırakılamaz.',
            'update_noon_exit.date_format' => 'Lütfen geçerli bir format giriniz.',
            'update_option.required' => 'Option boş bırakılamaz.',
            'update_option.date_format' => 'Lütfen geçerli bir format giriniz.'
        ];
    }
}
