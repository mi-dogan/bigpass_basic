<?php

namespace App\Http\Requests\Back;
use Illuminate\Foundation\Http\FormRequest;

class ConsentStoreRequest extends FormRequest
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
            'employee_id' => 'required',
            'employee_id.*' => 'integer|exists:employees,id',
            'starting_at' => 'required|date|after_or_equal:'.now()->format('Y-m-d'),
            'finished_at' => 'required|date|after_or_equal:'.now()->format('Y-m-d'),
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Açıklama boş bırakılamaz.',
            'name.max' => 'Açıklama en fazla 255 karakter olmalıdır.',
            'employee_id.required' => 'Çalışan boş bırakılamaz.',
            'employee_id.*.integer' => 'Lütfen geçerli bir çalışan seçiniz.',
            'employee_id.exists' => 'Çalışan bulunamadı.',
            'starting_at.required' => 'Başlangıç tarihi boş bırakılamaz.',
            'starting_at.date' => 'Lütfen geçerli bir tarih giriniz.',
            'starting_at.after_or_equal' => 'Başlangıç tarihi bugünden küçük olamaz.',
            'finished_at.required' => 'Bitiş tarihi boş bırakılamaz.',
            'finished_at.date' => 'Bitiş tarihi boş bırakılamaz.',
            'finished_at.after_or_equal' => 'Bitiş tarihi bugünden küçük olamaz.',
        ];
    }
}
