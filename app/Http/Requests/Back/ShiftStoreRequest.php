<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class ShiftStoreRequest extends FormRequest
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
            'type' => 'required',
            'type.*' => 'integer|between:1,7',
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
            'name.required' => 'Vardiya adı boş bırakılamaz.',
            'name.max' => 'Vardiya adı en fazla 255 karakter olmalıdır.',
            'type.required' => 'Günler boş bırakılamaz.',
            'type.*.integer' => 'Günler integer türünde olmalıdır.',
            'type.*.between' => 'Günler 1 ila 7 arasında olmalıdır.',
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
