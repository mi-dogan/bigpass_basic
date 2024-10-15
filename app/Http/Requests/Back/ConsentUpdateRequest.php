<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class ConsentUpdateRequest extends FormRequest
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
            'update_employee_id.*' => 'integer|exists:employees,id',
            'update_starting_at' => 'required|date|after_or_equal:' . now()->format('Y-m'),
            'update_finished_at' => 'required|date|after_or_equal:' . now()->format('Y-m-d'),
        ];
    }

    public function messages(): array
    {
        return [
            'update_name.required' => 'Açıklama boş bırakılamaz.',
            'update_name.max' => 'Açıklama en fazla 255 karakter olmalıdır.',
            'update_starting_at.required' => 'Başlangıç tarihi boş bırakılamaz.',
            'update_starting_at.date' => 'Lütfen geçerli bir tarih giriniz.',
            'update_starting_at.after_or_equal' => 'Başlangıç tarihi bu aydan küçük olamaz.',
            'update_finished_at.required' => 'Bitiş tarihi boş bırakılamaz.',
            'update_finished_at.date' => 'Bitiş tarihi boş bırakılamaz.',
            'update_finished_at.after_or_equal' => 'Bitiş tarihi bugünden küçük olamaz.',
        ];
    }
}
